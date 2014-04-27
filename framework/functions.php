<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        themingstrap
 * @license        license.txt
 * @link           http://codex.wordpress.org/Theme_Development#Functions_File
 * @since          available since Release 1.0
 */
?>
<?php

require_once (get_template_directory() . "/framework/hooks.php");
require_once (get_template_directory() . "/framework/admin/theme-options.php");
/*
 * Globalize Theme options
 */
$themingstrap_options = themingstrap_get_options();
/*
 * Hook options
 */
add_action( 'admin_init', 'themingstrap_theme_options_init' );
add_action( 'admin_menu', 'themingstrap_theme_options_add_page' );
/**
 * Retrieve Theme option settings
 */
function themingstrap_get_options() {
	// Globalize the variable that holds the Theme options
	global $themingstrap_options;
	// Parse array of option defaults against user-configured Theme options
	$themingstrap_options = wp_parse_args( get_option( 'themingstrap_theme_options', array() ) );
	// Return parsed args array
	return $themingstrap_options;
}
/**
 * Helps file locations in child themes. If the file is not being overwritten by the child theme then
 * return the parent theme location of the file. Great for images.
 *
 * @param $dir string directory
 *
 * @return string complete uri
 */
function themingstrap_child_uri( $dir ) {
	if ( is_child_theme() ) {
		$directory = get_stylesheet_directory() . $dir;
		$test      = is_file( $directory );
		if ( is_file( $directory ) ) {
			$file = get_stylesheet_directory_uri() . $dir;
		} else {
			$file = get_template_directory_uri() . $dir;
		}
	} else {
		$file = get_template_directory_uri() . $dir;
	}

	return $file;
}

/**
 * Fire up the engines boys and girls let's start theme setup.
 */
add_action( 'after_setup_theme', 'themingstrap_setup' );

if ( !function_exists( 'themingstrap_setup' ) ):

	function themingstrap_setup() {

		global $content_width;

		$template_directory = get_template_directory();

		/**
		 * Global content width.
		 */
		if ( !isset( $content_width ) ) {
			$content_width = 550;
		}

		/**
		 * themingstrap is now available for translations.
		 * The translation files are in the /languages/ directory.
		 * Translations are pulled from the WordPress default lanaguge folder
		 * then from the child theme and then lastly from the parent theme.
		 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
		 */

		$domain = 'themingstrap';

		/**
		 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
		 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
		 */
		add_editor_style();

		/**
		 * This feature enables post and comment RSS feed links to head.
		 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * This feature enables post-thumbnail support for a theme.
		 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * This feature enables woocommerce support for a theme.
		 * @see http://www.woothemes.com/2013/02/last-call-for-testing-woocommerce-2-0-coming-march-4th/
		 */
		add_theme_support( 'woocommerce' );

		/**
		 * This feature enables custom-menus support for a theme.
		 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
		 */
		register_nav_menus( array(
								'top-menu'        => __( 'Top Menu', 'themingstrap' ),
								'footer-menu'     => __( 'Footer Menu', 'themingstrap' )
							)
		);

		add_theme_support( 'custom-background' );

		
		// While upgrading set theme option front page toggle not to affect old setup.
		$themingstrap_options = get_option( 'themingstrap_theme_options' );
		if ( $themingstrap_options && isset( $_GET['activated'] ) ) {

			// If front_page is not in theme option previously then set it.
			if ( !isset( $themingstrap_options['front_page'] ) ) {

				// Get template of page which is set as static front page
				$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );

				// If static front page template is set to default then set front page toggle of theme option to 1
				if ( 'page' == get_option( 'show_on_front' ) && $template == 'default' ) {
					$themingstrap_options['front_page'] = 1;
				} else {
					$themingstrap_options['front_page'] = 0;
				}
				update_option( 'themingstrap_theme_options', $themingstrap_options );
			}
		}
	}

endif;

/**
 * Set a fallback menu that will show a home link.
 */

function themingstrap_fallback_menu() {
	$args    = array(
		'depth'       => 0,
		'sort_column' => 'menu_order, post_title',
		'menu_class'  => 'menu',
		'include'     => '',
		'exclude'     => '',
		'echo'        => false,
		'show_home'   => true,
		'link_before' => '',
		'link_after'  => ''
	);
	$pages   = wp_page_menu( $args );
	$prepend = '<div class="main-nav">';
	$append  = '</div>';
	$output  = $prepend . $pages . $append;
	echo $output;
}

/**
 * This function removes .menu class from custom menus
 * in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 *
 * Marko Heijnen Contribution
 *
 */
class themingstrap_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}

	public function menu_different_class( $settings, $widget ) {
		if ( $widget instanceof WP_Nav_Menu_Widget ) {
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
		}

		return $settings;
	}

	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );

		if ( 'menu' == $args['menu_class'] ) {
			$args['menu_class'] = apply_filters( 'themingstrap_menu_widget_class', 'menu-widget' );
		}

		return $args;
	}
}

$GLOBALS['nav_menu_widget_classname'] = new themingstrap_widget_menu_class();

/**
 * Removes div from wp_page_menu() and replace with ul.
 */
function themingstrap_wp_page_menu( $page_markup ) {
	preg_match( '/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches );
	$divclass   = $matches[1];
	$replace    = array( '<div class="' . $divclass . '">', '</div>' );
	$new_markup = str_replace( $replace, '', $page_markup );
	$new_markup = preg_replace( '/^<ul>/i', '<ul class="' . $divclass . '">', $new_markup );

	return $new_markup;
}

add_filter( 'wp_page_menu', 'themingstrap_wp_page_menu' );

/**
 * wp_title() Filter for better SEO.
 *
 * Adopted from Twenty Twelve
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 *
 */
if ( !function_exists( 'themingstrap_wp_title' ) && !defined( 'AIOSEOP_VERSION' ) ) :

	function themingstrap_wp_title( $title, $sep ) {
		global $page, $paged;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'themingstrap' ), max( $paged, $page ) );
		}

		return $title;
	}

	add_filter( 'wp_title', 'themingstrap_wp_title', 10, 2 );

endif;

/**
 * Filter 'get_comments_number'
 *
 * Filter 'get_comments_number' to display correct
 * number of comments (count only comments, not
 * trackbacks/pingbacks)
 *
 * Chip Bennett Contribution
 */
function themingstrap_comment_count( $count ) {
	if ( !is_admin() ) {
		global $id;
		$comments         = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $comments );

		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

add_filter( 'get_comments_number', 'themingstrap_comment_count', 0 );

/**
 * wp_list_comments() Pings Callback
 *
 * wp_list_comments() Callback function for
 * Pings (Trackbacks/Pingbacks)
 */
function themingstrap_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}

/**
 * Sets the post excerpt length to 40 words.
 * Adopted from Coraline
 */
function themingstrap_excerpt_length( $length ) {
	return 40;
}

add_filter( 'excerpt_length', 'themingstrap_excerpt_length' );

/**
 * Returns a "Read more" link for excerpts
 */
function themingstrap_read_more() {
	return '<div class="read-more"><a href="' . get_permalink() . '">' . __( 'Read more &#8250;', 'themingstrap' ) . '</a></div><!-- end of .read-more -->';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and themingstrap_read_more_link().
 */
function themingstrap_auto_excerpt_more( $more ) {
	return '<span class="ellipsis">&hellip;</span>' . themingstrap_read_more();
}

add_filter( 'excerpt_more', 'themingstrap_auto_excerpt_more' );

/**
 * Adds a pretty "Read more" link to custom post excerpts.
 */
function themingstrap_custom_excerpt_more( $output ) {
	if ( has_excerpt() && !is_attachment() ) {
		$output .= themingstrap_read_more();
	}

	return $output;
}

add_filter( 'get_the_excerpt', 'themingstrap_custom_excerpt_more' );

/**
 * This function removes inline styles set by WordPress gallery.
 */
function themingstrap_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}

add_filter( 'gallery_style', 'themingstrap_remove_gallery_css' );

/**
 * This function removes default styles set by WordPress recent comments widget.
 */
function themingstrap_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
}

add_action( 'widgets_init', 'themingstrap_remove_recent_comments_style' );

/**
 * This function prints post meta data.
 *
 * Ulrich Pogson Contribution
 *
 */
if ( !function_exists( 'themingstrap_post_meta_data' ) ) {

	function themingstrap_post_meta_data() {
		printf( __( '<span class="%1$s">Posted on </span>%2$s<span class="%3$s"> by </span>%4$s', 'themingstrap' ),
				'meta-prep meta-prep-author posted',
				sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s">%4$s</time></a>',
						 esc_url( get_permalink() ),
						 esc_attr( get_the_title() ),
						 esc_html( get_the_date('c')),
						 esc_html( get_the_date() )
				),
				'byline',
				sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
						 get_author_posts_url( get_the_author_meta( 'ID' ) ),
						 sprintf( esc_attr__( 'View all posts by %s', 'themingstrap' ), get_the_author() ),
						 esc_attr( get_the_author() )
				)
		);
	}

}

/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 *
 */
function themingstrap_category_rel_removal( $output ) {
	$output = str_replace( ' rel="category tag"', '', $output );

	return $output;
}

add_filter( 'wp_list_categories', 'themingstrap_category_rel_removal' );
add_filter( 'the_category', 'themingstrap_category_rel_removal' );

/**
 * Breadcrumb Lists
 * Load the plugin from the plugin that is installed.
 *
 */
function get_themingstrap_breadcrumb_lists() {
	$themingstrap_options = get_option( 'themingstrap_theme_options' );
	$yoast_options = get_option( 'wpseo_internallinks' );
	if ( 1 == $themingstrap_options['breadcrumb'] ) {
		return;
	} elseif ( function_exists( 'bcn_display' ) ) {
		bcn_display();
	} elseif ( function_exists( 'breadcrumb_trail' ) ) {
		breadcrumb_trail();
	} elseif ( function_exists( 'yoast_breadcrumb' ) && true === $yoast_options['breadcrumbs-enable'] ) {
		yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
	} elseif ( ! is_search() ) {
		themingstrap_breadcrumb_lists();
	}
}

/**
 * Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 * Adopted from Dimox
 *
 */
if ( !function_exists( 'themingstrap_breadcrumb_lists' ) ) {

	function themingstrap_breadcrumb_lists() {

		/* === OPTIONS === */
		$text['home']     = __( 'Home', 'themingstrap' ); // text for the 'Home' link
		$text['category'] = __( 'Archive for %s', 'themingstrap' ); // text for a category page
		$text['search']   = __( 'Search results for: %s', 'themingstrap' ); // text for a search results page
		$text['tag']      = __( 'Posts tagged %s', 'themingstrap' ); // text for a tag page
		$text['author']   = __( 'View all posts by %s', 'themingstrap' ); // text for an author page
		$text['404']      = __( 'Error 404', 'themingstrap' ); // text for the 404 page

		$show['current'] = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$show['home']    = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show

		$delimiter = ' <span class="chevron">&#8250;</span> '; // delimiter between crumbs
		$before    = '<span class="breadcrumb-current">'; // tag before the current crumb
		$after     = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		$home_link   = home_url( '/' );
		$before_link = '<span class="breadcrumb" typeof="v:Breadcrumb">';
		$after_link  = '</span>';
		$link_att    = ' rel="v:url" property="v:title"';
		$link        = $before_link . '<a' . $link_att . ' href="%1$s">%2$s</a>' . $after_link;

		$post      = get_queried_object();
		$parent_id = isset( $post->post_parent ) ? $post->post_parent : '';

		$html_output = '';

		if ( is_front_page() ) {
			if ( 1 == $show['home'] ) {
				$html_output .= '<div class="breadcrumb-list"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
			}

		} else {
			$html_output .= '<div class="breadcrumb-list" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf( $link, $home_link, $text['home'] ) . $delimiter;

			if ( is_home() ) {
				if ( 1 == $show['current'] ) {
					$html_output .= $before . get_the_title( get_option( 'page_for_posts', true ) ) . $after;
				}

			} elseif ( is_category() ) {
				$this_cat = get_category( get_query_var( 'cat' ), false );
				if ( 0 != $this_cat->parent ) {
					$cats = get_category_parents( $this_cat->parent, true, $delimiter );
					$cats = str_replace( '<a', $before_link . '<a' . $link_att, $cats );
					$cats = str_replace( '</a>', '</a>' . $after_link, $cats );
					$html_output .= $cats;
				}
				$html_output .= $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;

			} elseif ( is_search() ) {
				$html_output .= $before . sprintf( $text['search'], get_search_query() ) . $after;

			} elseif ( is_day() ) {
				$html_output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
				$html_output .= sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $delimiter;
				$html_output .= $before . get_the_time( 'd' ) . $after;

			} elseif ( is_month() ) {
				$html_output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
				$html_output .= $before . get_the_time( 'F' ) . $after;

			} elseif ( is_year() ) {
				$html_output .= $before . get_the_time( 'Y' ) . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( 'post' != get_post_type() ) {
					$post_type    = get_post_type_object( get_post_type() );
					$archive_link = get_post_type_archive_link( $post_type->name );
					$html_output .= sprintf( $link, $archive_link, $post_type->labels->singular_name );
					if ( 1 == $show['current'] ) {
						$html_output .= $delimiter . $before . get_the_title() . $after;
					}
				} else {
					$cat  = get_the_category();
					$cat  = $cat[0];
					$cats = get_category_parents( $cat, true, $delimiter );
					if ( 0 == $show['current'] ) {
						$cats = preg_replace( "#^(.+)$delimiter$#", "$1", $cats );
					}
					$cats = str_replace( '<a', $before_link . '<a' . $link_att, $cats );
					$cats = str_replace( '</a>', '</a>' . $after_link, $cats );
					$html_output .= $cats;
					if ( 1 == $show['current'] ) {
						$html_output .= $before . get_the_title() . $after;
					}
				}

			} elseif ( !is_single() && !is_page() && !is_404() && 'post' != get_post_type() ) {
				$post_type = get_post_type_object( get_post_type() );
				$html_output .= $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post( $parent_id );
				$cat    = get_the_category( $parent->ID );

				if ( isset( $cat[0] ) ) {
					$cat = $cat[0];
				}

				if ( $cat ) {
					$cats = get_category_parents( $cat, true, $delimiter );
					$cats = str_replace( '<a', $before_link . '<a' . $link_att, $cats );
					$cats = str_replace( '</a>', '</a>' . $after_link, $cats );
					$html_output .= $cats;
				}

				$html_output .= sprintf( $link, get_permalink( $parent ), $parent->post_title );
				if ( 1 == $show['current'] ) {
					$html_output .= $delimiter . $before . get_the_title() . $after;
				}

			} elseif ( is_page() && !$parent_id ) {
				if ( 1 == $show['current'] ) {
					$html_output .= $before . get_the_title() . $after;
				}

			} elseif ( is_page() && $parent_id ) {
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page_child    = get_page( $parent_id );
					$breadcrumbs[] = sprintf( $link, get_permalink( $page_child->ID ), get_the_title( $page_child->ID ) );
					$parent_id     = $page_child->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					$html_output .= $breadcrumbs[$i];
					if ( $i != count( $breadcrumbs ) - 1 ) {
						$html_output .= $delimiter;
					}
				}
				if ( 1 == $show['current'] ) {
					$html_output .= $delimiter . $before . get_the_title() . $after;
				}

			} elseif ( is_tag() ) {
				$html_output .= $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;

			} elseif ( is_author() ) {
				$user_id  = get_query_var( 'author' );
				$userdata = get_the_author_meta( 'display_name', $user_id );
				$html_output .= $before . sprintf( $text['author'], $userdata ) . $after;

			} elseif ( is_404() ) {
				$html_output .= $before . $text['404'] . $after;

			}

			if ( get_query_var( 'paged' ) || get_query_var( 'page' ) ) {
				$page_num = get_query_var( 'page' ) ? get_query_var( 'page' ) : get_query_var( 'paged' );
				$html_output .= $delimiter . sprintf( __( 'Page %s', 'themingstrap' ), $page_num );

			}

			$html_output .= '</div>';

		}

		echo $html_output;

	} // end themingstrap_breadcrumb_lists

}

/**
 * A safe way of adding stylesheets to a WordPress generated page.
 */


function Colorpicker(){ 
  wp_enqueue_style( 'wp-color-picker');
  wp_enqueue_script( 'wp-color-picker');
  wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'Colorpicker');

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */


/**
 * A comment reply.
 */
function themingstrap_enqueue_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'themingstrap_enqueue_comment_reply' );

/**
 * Theme options upgrade bar
 */
function themingstrap_upgrade_bar() {
	?>
	<div class="framework-wrap">

<?php
}

add_action( 'themingstrap_theme_options', 'themingstrap_upgrade_bar', 1 );

/**
 * Theme Options Support and Information
 */
function themingstrap_theme_support() {
	?>

	<div id="info-box-wrapper" class="grid col-940">
		<div class="info-box notice">

			<a class="button" href="<?php echo esc_url( 'http://themingstrap.com/portfolio/themingstrap-responsive-theme-framework-options/' ); ?>" title="<?php esc_attr_e( 'Theme Details', 'themingstrap' ); ?>" target="_blank">
				<?php _e( 'Instructions', 'themingstrap' ); ?></a>

			<a class="button button-primary" href="<?php echo esc_url( 'http://themingstrap.com/support/' ); ?>" title="<?php esc_attr_e( 'Help', 'themingstrap' ); ?>" target="_blank">
				<?php _e( 'Help', 'themingstrap' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'http://demo.themingstrap.com/themingstrap-lite/' ); ?>" title="<?php esc_attr_e( 'Demo', 'themingstrap' ); ?>" target="_blank">
				<?php _e( 'Demo', 'themingstrap' ); ?></a>

			

			

		</div>
	</div>

<?php
}

add_action( 'themingstrap_theme_options', 'themingstrap_theme_support', 2 );

/**
 * Front Page function starts here. The Front page overides WP's show_on_front option. So when show_on_front option changes it sets the themes front_page to 0 therefore displaying the new option
 */
function themingstrap_front_page_override( $new, $orig ) {
	global $themingstrap_options;

	if ( $orig !== $new ) {
		$themingstrap_options['front_page'] = 0;

		update_option( 'themingstrap_theme_options', $themingstrap_options );
	}

	return $new;
}

add_filter( 'pre_update_option_show_on_front', 'themingstrap_front_page_override', 10, 2 );

/**
 * Funtion to add CSS class to body
 */


/*
 * Add notification to Reading Settings page to notify if Custom Front Page is enabled.
 *
 * @since    1.9.4.0
 */
function themingstrap_front_page_reading_notice() {
	$screen             = get_current_screen();
	$themingstrap_options = themingstrap_get_options();
	if ( 'options-reading' == $screen->id ) {
		$html = '<div class="updated">';
		if ( 1 == $themingstrap_options['front_page'] ) {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is enabled. You can disable it in the <a href="%1$s">theme settings</a>.', 'themingstrap' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		} else {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is disabled. You can enable it in the <a href="%1$s">theme settings</a>.', 'themingstrap' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		}
		$html .= '</div>';
		echo $html;
	}
}

add_action( 'admin_notices', 'themingstrap_front_page_reading_notice' );

/**
 * Use shortcode_atts_gallery filter to add new defaults to the WordPress gallery shortcode.
 * Allows user input in the post gallery shortcode.
 *
 */

/*
 * Create image sizes for the galley
 */
add_image_size( 'themingstrap-100', 100, 9999 );
add_image_size( 'themingstrap-150', 150, 9999 );
add_image_size( 'themingstrap-200', 200, 9999 );
add_image_size( 'themingstrap-300', 300, 9999 );
add_image_size( 'themingstrap-450', 450, 9999 );
add_image_size( 'themingstrap-600', 600, 9999 );
add_image_size( 'themingstrap-900', 900, 9999 );

/*
 * Get social icons.
 *
 * @since    1.9.4.9
 */
function themingstrap_get_option_defaults() {
	$defaults = array(
		'headermenu'                      => false,
		'cta_button'                      => false,
		'minified_css'                    => false,
		'front_page'                      => 1,
		'home_headline'                   => null,
		'home_subheadline'                => null,
		'home_content_area'               => null,
		'cta_text'                        => null,
		'cta_url'                         => null,
		'featured_content'                => null,
		'google_site_verification'        => '',
		'bing_site_verification'          => '',
		'yahoo_site_verification'         => '',
		'site_statistics_tracker'         => '',
		'twitter_uid'                     => '',
		'facebook_uid'                    => '',
		'linkedin_uid'                    => '',
		'youtube_uid'                     => '',
		'stumble_uid'                     => '',
		'rss_uid'                         => '',
		'google_plus_uid'                 => '',
		'instagram_uid'                   => '',
		'pinterest_uid'                   => '',
		'yelp_uid'                        => '',
		'vimeo_uid'                       => '',
		'foursquare_uid'                  => '',
		'hemingway_inline_css'           => '',
		'hemingway_inline_js_head'       => '',
		'hemingway_inline_css_js_footer' => '',
		'static_page_layout_default'      => 'default',
		'single_post_layout_default'      => 'default',
		'blog_posts_index_layout_default' => 'default',
	);

	return apply_filters( 'themingstrap_option_defaults', $defaults );
}

function get_theme_option( $key = '' ) {
	// Globalize the variable that holds the Theme options
	global $themingstrap_options;	
	$themingstrap_options = themingstrap_get_options();	
	if( ! empty( $themingstrap_options[$key] ) )
		return $themingstrap_options[$key];		
	else
		return false;
}	





/*********************************************************************************************

Register Social Media widget

*********************************************************************************************/
class ThemingStrap_socialmedia_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'ThemingStrap Social Media Widget', array( 'description' => 'This widget adds list of social media profile URLs to your side bar.' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
		if( $instance ){
			$widget_title = esc_attr( $instance['widget_title'] );
		}
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'ThemingStrap') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php if( isset($widget_title) ) echo $widget_title; ?>" />
        </p>
        <?php
    }

    /*
     * Renders the widget in the sidebar
     */
    function widget( $args, $instance ) {
        echo $args['before_widget'];
        ?>
        <!-- start link widget -->
					<div class="socialshare widgets">
		<?php if(get_theme_option('facebook_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('facebook_uid')); ?>"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			<?php if(get_theme_option('twitter_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('twitter_uid')); ?>"><i class="fa fa-twitter"></i></a>
			<?php } ?>
			<?php if(get_theme_option('google_plus_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('google_plus_uid')); ?>"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			<?php if(get_theme_option('linkedin_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('linkedin_uid')); ?>"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			<?php if(get_theme_option('youtube_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('youtube_uid')); ?>"><i class="fa fa-youtube"></i></a>
			<?php } ?>
			<?php if(get_theme_option('pinterest_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('pinterest_uid')); ?>"><i class="fa fa-pinterest"></i> </a>
			<?php } ?>
			<?php if(get_theme_option('rss_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('rss_uid')); ?>"><i class="fa fa-rss"></i></a>
			<?php } ?>		
		</div>
        <!-- end link widget -->

        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "ThemingStrap_socialmedia_widget" );' ) );
