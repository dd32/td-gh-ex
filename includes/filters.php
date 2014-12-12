<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
//  __ added - 12/11/14

// ============================================= >>> CALLBACK: weaverx_page_menu <<< ======================================

function weaverx_page_menu( $args = array() ) {

    // this is the callback for the default menu

	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'wvrx-menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );
	$menu = '';
	$list_args = $args;
    if (weaverx_getopt('menu_nohome'))
		$args['show_home'] = false;
	else
		$args['show_home'] = true;

        // look for pages to hide from menu
	$ex_list = '';
	$hide_pages = get_pages(array('hierarchical' => 0, 'meta_key' => '_pp_hide_on_menu'));	// get list of excluded pages
	if (!empty($hide_pages)) {
		foreach ($hide_pages as $page) {
			$ex_list .= $page->ID . ',';	/* trailing , doesn't matter */
		}
	}

	if ($ex_list != '') {
        if ( !empty( $list_args['exclude'] ) ) {
            $list_args['exclude'] .= ',';
        } else {
			$list_args['exclude'] = '';
		}
		$list_args['exclude'] .=  $ex_list;
    }


	// Show Home in the menu
	if ( $args['show_home'] ) {
		$text = __( 'Home', 'weaver-xtreme' );

		$class = '';
        if ( is_home() || is_front_page() ) $class = 'class="current_page_item"';

		$menu .= '<li ' . $class . '><a href="' . esc_url( home_url( '/' ) ). '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';

		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';

	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages( $list_args) );

    $left = weaverx_getopt('m_primary' . '_html_left');
    $right = weaverx_getopt('m_primary' . '_html_right');

    if ( $left ) {
        $hide = ' ' . weaverx_getopt('m_primary_hide_left');
        $left = '<span class="wvrx-menu-html wvrx-menu-left' . $hide .'">' . do_shortcode( $left ) . '</span>';
    }

    if ( $right ) {
        $hide = ' ' . weaverx_getopt('m_primary_hide_right');
        $right = '<span class="wvrx-menu-html wvrx-menu-right ' . $hide . '">' . do_shortcode( $right ) . '</span>';
    } else {
        $right = '<span class="wvrx-menu-clear"></span>';
    }

	if ( $menu )
		$menu = $left . $right . '<div class="wvrx-menu-clear"></div><ul class="' . esc_attr( $args['menu_class'] ) . '">'
        . $menu . '</ul><div class="clear-menu-end" style="clear:both;"></div>';

    // add the styling classes here

	$menu = '<div class="' . esc_attr( $args['container_class'] ) . '">' . $menu . "</div>\n";

	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}
//--


// =============================== >>> FILTER: weaverx_featured_image_info <<< ================================

add_filter('admin_post_thumbnail_html','weaverx_featured_image_info');

function weaverx_featured_image_info($text) {
    // Show additional information on the FI Admin box

	return $text .
'<p><small>' .
 __('Please see Weaver X\'s <em>Main Options&rarr;Content Areas</em> and <em>Main Options&rarr;Post Specifics</em> for options to display Featured Images.','weaver-xtreme') . '</small></p>';

}
//--



// =============================== >>> FILTER: weaverx_body_classes <<< ================================

add_filter( 'body_class', 'weaverx_body_classes' );

function weaverx_body_classes( $classes ) {
/**
 * Add classes to body depending of page type to make sidebar templates work.
 */
	$pwp = in_array('page-template-paget-posts-php',$classes);
    $has_posts = false;

	if ( $pwp ) {                // page with posts - add stuff like blog
		$classes[] = 'blog';
        $has_posts = true;
    }

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && !$pwp ) {   // don't make pwp singular
		$classes[] = 'singular';
    }

	if (!is_user_logged_in())
		$classes[] = 'not-logged-in';

	$classes[] = 'weaverx-theme-body';

	if (weaverx_get_per_page_value('_pp_bodyclass') != '')	// add body class per page
		$classes[] = weaverx_get_per_page_value('_pp_bodyclass');

    if ( isset( $GLOBALS['weaverx_page_who'] ) ) {
        if ( $GLOBALS['weaverx_page_is_archive'] ) {
            $sb_layout = weaverx_sb_layout_archive( $GLOBALS['weaverx_page_who'] );
            if ( $GLOBALS['weaverx_page_who'] != '404' )
                $has_posts = true;
        }
        else
            $sb_layout = weaverx_sb_layout( $GLOBALS['weaverx_page_who'] );

        $classes[] = 'weaverx-page-' . $GLOBALS['weaverx_page_who'];
        $GLOBALS['weaverx_sb_layout'] = $sb_layout;
        $classes[] = 'weaverx-sb-' . $sb_layout;
        if ( $has_posts || $GLOBALS['weaverx_page_who'] == 'single' || $GLOBALS['weaverx_page_who'] == 'blog')
            $classes[] = 'has-posts';
    }

	return $classes;
}
//--



// =============================== >>> FILTER: excerpt_length <<< ================================

add_filter( 'excerpt_length', 'weaverx_excerpt_length' );

function weaverx_excerpt_length( $length ) {
/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
	$val = weaverx_t_get('excerpt_length');
	if (!$val)
		$val = weaverx_getopt('excerpt_length');
	if ($val > 0 || $val === '0')
		return $val;
	return 40;
}
//--


// =============================== >>> FILTER: weaverx_unlink_page <<< ================================
add_filter('page_link', 'weaverx_unlink_page', 10, 2);		// for stay on page

function weaverx_unlink_page($link, $id) {	// filter definition
	$stay = get_post_meta($id, '_pp_stay_on_page', true);
	if ($stay) {
		return "#";
	} else {
		return $link;
	}
}
//--



// =============================== >>> FILTER: weaverx_wp_title <<< ================================
add_filter('wp_title', 'weaverx_wp_title', 10, 1);		// filter the title

function weaverx_wp_title($title) {	// filter definition

	if (function_exists('wpseo_get_value'))
		return $title;		// this is compatible with SEO plugins

	/*
	 * Print the <title> tag based on what is being viewed. THIS CODE DIRECTLY FROM TWENTY ELEVEN
	 */
	global $page, $paged;

	$t = '';

	if ($title) {
		$title = trim(str_replace('&raquo;','',$title));
		$t = $title . ' | ';
	}

	$t .= get_bloginfo('name');

	/* Add the blog description for the home/front page. */
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$t .= " | $site_description";

	/* Add a page number if necessary: */
	if ( $paged >= 2 || $page >= 2 )
		$t .= ' | ' . sprintf( __( 'Page %s','weaver-xtreme'), max( $paged, $page ) );

	return $t;
}
//--



// =============================== >>> FILTER: admin_post_thumbnail_html <<< ================================
// Change what's hidden by default - show Custom Fields and Discussion by default!
add_filter('default_hidden_meta_boxes', 'weaverx_hidden_meta_boxes', 10, 2);

function weaverx_hidden_meta_boxes($hidden, $screen) {	// filter definition
	if ( 'post' == $screen->base || 'page' == $screen->base )
		$hidden = array('slugdiv', 'trackbacksdiv', 'postexcerpt', 'commentsdiv', 'authordiv', 'revisionsdiv');
		// removed 'postcustom', 'commentstatusdiv',
	return $hidden;
}
//--



// =============================== >>> FILTER: weaverx_get_wp_title_rss <<< ================================
add_filter('get_wp_title_rss', 'weaverx_get_wp_title_rss',10,1);

function weaverx_get_wp_title_rss($title) {		// filter definition
	/* need to fix our add a | blog name to wp_title */
	$ft = str_replace(' | ','',$title);
	return str_replace(get_bloginfo('name'),'',$ft);
}
//--



// =============================== >>> FILTER: weaverx_xtra_type_filter <<< ================================
add_filter('weaverx_xtra_type', 'weaverx_xtra_type_filter');
function weaverx_xtra_type_filter( $type ) {
    if ( $type[0] == '+') {
        return 'inactive';
    }
    return $type;
}
//--


// =============================== >>> FILTER: weaverx_replace_widget_area <<< ================================
add_filter('weaverx_replace_widget_area', 'weaverx_replace_widget_area_filter');

function weaverx_replace_widget_area_filter( $area_name ) {
    // If a replacement widget area has been specified, then use it instead.
    $replace = weaverx_get_per_page_value( '_' . $area_name );

    if ( $replace ) {       // see if the replacement widget area actually exists...

        if ( ! is_active_sidebar( $replace ) ) {
?>
        <h3><?php _e('Notice: Widget Area Not Found:','weaver-xtreme'); ?> <em><?php echo $replace; ?></em></h3>
        <p><?php _e('You probably have not defined it as a Per Page Widget area at the bottom of the Weaver Xtreme
        <em>Main Options &rarr; Sidebars &amp; Layout</em> tab, or you may need to add
        widgets to the area.','weaver-xtreme'); ?></p>
<?php
            return $area_name;
        }

        return $replace;
    }
    return $area_name;
}
//--



// =============================== >>> ACTION: weaverx_disable_visual_editor <<< ================================
add_action('load-page.php', 'weaverx_disable_visual_editor');
add_action('load-post.php', 'weaverx_disable_visual_editor');

function weaverx_disable_visual_editor() {
  global $wp_rich_edit;

  if (!isset($_GET['post']))
	return;
  $post_id = $_GET['post'];
  $value = get_post_meta($post_id, '_pp_hide_visual_editor', true);
  $raw = get_post_meta($post_id, '_pp_raw_html', true);
  if($value == 'on' || $raw == 'on')
    $wp_rich_edit = false;
}
//--



// =============================== >>> ACTION: weaverx_nav_action <<< ================================
if (!has_action('weaverx_nav'))                         // plugin can override
	add_action( 'weaverx_nav', 'weaverx_nav_action');

function weaverx_nav_action($where) {
    // displays primary and secondary menus in the proper place

    switch ( $where ) {
        case 'top':
            if ( ! weaverx_getopt ('m_secondary_move') )
                get_template_part('templates/menu','secondary');

            if ( weaverx_getopt ('m_primary_move') )
                get_template_part('templates/menu','primary');
            break;

        case 'bottom':
        default:
            if ( weaverx_getopt ('m_secondary_move') )
                get_template_part('templates/menu','secondary');

            if ( !weaverx_getopt ('m_primary_move') )
                get_template_part('templates/menu','primary');

            break;
    }
}
//--



// =============================== >>> FILTER: weaverx_mce_css <<< ================================
add_filter('mce_css','weaverx_mce_css');

/* route tinyMCE to our stylesheet */
function weaverx_mce_css($default_style) {
	/* replace the default editor-style.css with custom CSS generated on the fly by the php version */
	if (weaverx_getopt('_hide_editor_style'))
		return $default_style;

	$mce_css_file = trailingslashit(get_template_directory()) . 'editor-style-css.php';
	$mce_css_dir = trailingslashit(get_template_directory_uri()) . 'editor-style-css.php';
	if (!@file_exists($mce_css_file)) {	// see if it is there
		return $default_style;
	}
	/* do we need to do anything about rtl? */

	/* if we have a custom style file, return that instead of the default */
	// Build the overrides
	$put = '?mce=1';	// cheap way to start with ?

	if ( ( $twidth = weaverx_getopt_default( 'theme_width_int', 940 ) ) ) {
	/*  figure out a good width - we will please most of the users, most of the time
		We're going to assume that mostly people will use the default layout -
		we can't actually tell if the editor will be for a page or a post at this point.
		And let's just assume the default sidebar widths.
	*/
		$sb_layout = weaverx_getopt_default('layout_default', 'right');
        switch ( $sb_layout ) {
            case 'left':
            case 'left-top':
                $sb_width = weaverx_getopt_default( 'left_sb_width_int', 25 );
                break;
            case 'split':
            case 'split-top':
                $sb_width = weaverx_getopt_default( 'left_split_sb_width_int', 25 )
                            + weaverx_getopt_default( 'right_split_sb_width_int', 25 );
                break;
            case 'one-column':
                $sb_width = 0;
                break;
            default:            // right
                $sb_width = weaverx_getopt_default( 'right_sb_width_int', 25 );
                break;
        }

        $content_w = $twidth - ( $twidth * (float)( $sb_width / 95.0 ) );   // .95 by trial and error

        //  calculate theme width based on default layout and width of sidebars.

		$put .= '&twidth=' . urlencode( $content_w );

	}

	if (($val = weaverx_getopt('site_fontsize_int')))	// base font size
		$put .= '&fontsize=' . urlencode($val);


    $val = weaverx_getopt_default('content_font_family', 'default');
    if ( $val == 'default' )
        $val = weaverx_getopt_default('container_font_family', 'default' );
    if ( $val == 'default' )
        $val = weaverx_getopt('wrapper_font_family');
	if ( $val != 'default' ) {    	// found a font {

        // these are not translatable - the values are used to define the actual font definition
        $fonts = array(
            'sans-serif' => 'Arial,sans-serif',
            'arialBlack' => '"Arial Black",sans-serif',
            'arialNarrow' => '"Arial Narrow",sans-serif',
            'lucidaSans' => '"Lucida Sans",sans-serif',
            'trebuchetMS' => '"Trebuchet MS", "Lucida Grande",sans-serif',
            'verdana' => 'Verdana, Geneva,sans-serif',
            'serif' => 'TimesNewRoman, "Times New Roman",serif',
            'cambria' => 'Cambria,serif',
            'garamond' => 'Garamond,serif',
            'georgia' => 'Georgia,serif',
            'lucidaBright' => '"Lucida Bright",serif',
            'palatino' => '"Palatino Linotype",Palatino,serif',
            'monospace' => '"Courier New",Courier,monospace',
            'consolas' => 'Consolas,monospace',
            'papyrus' => 'Papyrus,cursive,serif',
            'comicSans' => '"Comic Sans MS",cursive,serif'
            );

        if ( isset($fonts[$val]) ) {
            $font = $fonts[$val];
        } else {
            $font = "Arial,'Helvetica Neue',Helvetica,sans-serif";   // fallback
            // scan Google Fonts
            $gfonts = weaverx_getopt_array('fonts_added');
            if ( !empty($gfonts) ) {
                foreach ($gfonts as $gfont) {
                    $slug = sanitize_title($gfont['name']);
                    if ( $slug == $val ) {
                        $font = str_replace('font-family:','',$gfont['family']);//'Papyrus';
                        break;
                    }
                }
            }
        }
		$put .= '&fontfamily=' . urlencode($font);
	}

	/* need to handle bg color of content area - need to do the cascade ourself */
	if ( ($val = weaverx_getopt('editor_bgcolor')) && strcasecmp($val,'transparent') != 0) {	        /* alt bg color */
		$put .= '&bg=' . urlencode($val);
	} else if ( ($val = weaverx_getopt('content_bgcolor')) && strcasecmp($val,'transparent') != 0) {	/* #content */
		$put .= '&bg=' . urlencode($val);
	} else if ( ($val = weaverx_getopt('container_bgcolor') ) && strcasecmp($val,'transparent') != 0) { /* #container */
		$put .= '&bg=' . urlencode($val);
	} else if (($val = weaverx_getopt('wrapper_bgcolor')) && strcasecmp($val,'transparent') != 0) {    /* #wrapper */
		$put .= '&bg=' . urlencode($val);
	} else if (($name = weaverx_getopt('themename')) && strcasecmp($name,'Transparent Dark') === 0) {
		$put .= '&bg=' . urlencode('#222');
	} else if (($name = weaverx_getopt('themename')) && strcasecmp($name,'Transparent Light') === 0) {
		$put .= '&bg=' . urlencode('#ccc');
	}

	if (($val = weaverx_getopt('content_color')) ) {	        // text color
		$put .= '&textcolor=' . urlencode($val);
	} elseif (($val = weaverx_getopt('container_color')) ) {	// text color
		$put .= '&textcolor=' . urlencode($val);
	} elseif (($val = weaverx_getopt('wrapper_color')) ) {	    // text color
		$put .= '&textcolor=' . urlencode($val);
	}

	if (($val = weaverx_getopt('input_bgcolor')) ) {	// input area
		$put .= '&inbg=' . urlencode($val);
	}
	if (($val = weaverx_getopt('input_color')) ) {
		$put .= '&incolor=' . urlencode($val);
	}

	if (($val = weaverx_getopt('contentlink_color')) ) {	// link
		$put .= '&a=' . urlencode($val);
	}
	if (($val = weaverx_getopt('contentlink_hover_color')) ) {
		$put .= '&ahover=' . urlencode($val);
	}

	if (($val = weaverx_getopt('weaverx_tables')) ) {	// table type
		$put .= '&table=' . urlencode($val);
	}

	if (($val = weaverx_getopt('contentlist_bullet')) ) {	// list bullet
		$put .= '&list=' . urlencode($val);
	}

	// images
	if (($val = weaverx_getopt('caption_color')) ) {	// image caption, border color, width
		$put .= '&imgcapt=' . urlencode($val);
	}
	if (($val = weaverx_getopt('media_lib_border_color')) ) {
		$put .= '&imgbcolor=' . urlencode($val);
	}
	if (($val = weaverx_getopt('media_lib_border_int')) ) {
		$put .= '&imgbwide=' . urlencode($val);
	}

	return $default_style . ',' . $mce_css_dir . $put;
}
//--

?>
