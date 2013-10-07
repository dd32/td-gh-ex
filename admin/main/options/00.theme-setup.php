<?php
/**
 * Theme setup functions.
 *
 * @package ThinkUpThemes
 */


//----------------------------------------------------------------------------------
//	ADD CUSTOM HOOKS
//----------------------------------------------------------------------------------

// Used at top if header.php
function thinkup_hook_header() { 
	do_action('thinkup_hook_header');
}

// Used at top if header.php within the body tag
function thinkup_bodystyle() { 
	do_action('thinkup_bodystyle');
}


//----------------------------------------------------------------------------------
//	ADD THEME PLUGINS - CREDIT ATTRIBUTABLE TO http://tgmpluginactivation.com/
//----------------------------------------------------------------------------------

require_once( get_template_directory() . '/lib/plugins/theme-plugin-activation.php');
add_action( 'tgmpa_register', 'thinkup_theme_register_required_plugins' );

function thinkup_theme_register_required_plugins() {
 
    $plugins = array(
	array(
		'name' 		=> 'SlideDeck 2 (Lite)',
		'slug' 		=> 'slidedeck2',
		'required' 	=> false,
	),
	array(
		'name' 		=> 'Contact Form 7',
		'slug' 		=> 'contact-form-7',
		'required' 	=> false,
	),
	array(
		'name' 		=> 'Google Maps',
		'slug' 		=> 'comprehensive-google-map-plugin',
		'required' 	=> false,
	),
    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'afzaal-theme';
    $config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      =>  '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'Plugin(s) installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
        )
    );
    tgmpa( $plugins, $config );
}


//----------------------------------------------------------------------------------
//	ADD FEATURES META BOX TO POST AREA - PREMIUM FEATURE
//----------------------------------------------------------------------------------


//----------------------------------------------------------------------------------
//	CORRECT Z-INDEX OF OEMBED OBJECTS
//----------------------------------------------------------------------------------
function thinkup_fix_oembed( $embed ) {
	if ( strpos( $embed, '<param' ) !== false ) {
   		$embed = str_replace( '<embed', '<embed wmode="transparent" ', $embed );
   		$embed = preg_replace( '/param>/', 'param><param name="wmode" value="transparent" />', $embed, 1);
	}
	return $embed;
}
add_filter( 'embed_oembed_html', 'thinkup_fix_oembed', 1 );


//----------------------------------------------------------------------------------
//	CHANGE TITLE AND DESCRIPTION OF PORTFOLIO EXTRACT BOX - PREMIUM FEATURE
//----------------------------------------------------------------------------------


//----------------------------------------------------------------------------------
//	ADD BREADCRUMBS FUNCTIONALITY
//----------------------------------------------------------------------------------

function wp_bac_breadcrumb() {
$thinkup_general_breadcrumbdelimeter = thinkup_var ( 'thinkup_general_breadcrumbdelimeter' );


	if ( empty( $thinkup_general_breadcrumbdelimeter ) ) {
		$delimiter = '<span class="delimiter">/</span>';
	}
	else if ( ! empty( $thinkup_general_breadcrumbdelimeter ) ) {
		$delimiter = '<span class="delimiter"> ' . $thinkup_general_breadcrumbdelimeter . ' </span>';
	}

	$delimiter_inner   =   '<span class="delimiter_core"> &bull; </span>';
	$main              =   'Home';
	$maxLength         =   30;

	// Archive variables
	$arc_year       =   get_the_time('Y');
	$arc_month      =   get_the_time('F');
	$arc_day        =   get_the_time('d');
	$arc_day_full   =   get_the_time('l');  

	// URL variables
	$url_year    =   get_year_link($arc_year);
	$url_month   =   get_month_link($arc_year,$arc_month);

	// Display breadcumbs if NOT the home page
	if ( !is_home() ) {
		echo '<div id="breadcrumbs"><div id="breadcrumbs-core">';
		global $post, $cat;
		$homeLink = home_url( '/' );
		echo '<a href="' . $homeLink . '">' . $main . '</a>' . $delimiter;    

		// Display breadcrumbs for single post
		if ( is_single() ) {
			$category = get_the_category();
			$num_cat = count($category);
			if ($num_cat <=1) {
				echo ' ' . get_the_title();
			} else {
				echo the_category( $delimiter_inner, multiple);
				if (strlen(get_the_title()) >= $maxLength) {
					echo ' ' . $delimiter . trim(substr(get_the_title(), 0, $maxLength)) . ' ...';
				} else {
					echo ' ' . $delimiter . get_the_title();
				}
			}
		} elseif (is_category()) {
			echo 'Archive Category: ' . get_category_parents($cat, true,' ' . $delimiter . ' ') ;
		} elseif ( is_tag() ) {
			echo 'Posts Tagged: "' . single_tag_title("", false) . '"';
		} elseif ( is_day()) {
			echo '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . ' ';
			echo '<a href="' . $url_month . '">' . $arc_month . '</a> ' . $delimiter . $arc_day . ' (' . $arc_day_full . ')';
		} elseif ( is_month() ) {
			echo '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . $arc_month;
		} elseif ( is_year() ) {
			echo $arc_year;
		} elseif ( is_search() ) {
			echo 'Search Results for: "' . get_search_query() . '"';
		} elseif ( is_page() && !$post->post_parent ) {
			echo get_the_title();
		} elseif ( is_page() && $post->post_parent ) {
			$post_array = get_post_ancestors( $post );
			krsort( $post_array ); 
			foreach( $post_array as $key=>$postid ){
				$post_ids = get_post( $postid );
				$title = $post_ids->post_title;
				echo '<a href="' . get_permalink($post_ids) . '">' . $title . '</a>' . $delimiter;
			}
			the_title();
		} elseif ( is_author() ) {
			global $author;
			$user_info = get_userdata($author);
			echo  'Archived Article(s) by Author: ' . $user_info->display_name ;
		} elseif ( is_404() ) {
			echo  'Error 404 - Not Found.';
		} elseif ( is_post_type_archive( $portfolio )	) {
			echo  'Portfolio';
		}
       echo '</div></div>';
    }
}

//----------------------------------------------------------------------------------
//	ADD PAGINATION FUNCTIONALITY
//----------------------------------------------------------------------------------
function thinkup_input_pagination( $pages = "", $range = 2 ) {
global $paged;
global $wp_query;
		
	$showitems = ($range * 2)+1;  

	if(empty($paged)) $paged = 1;

	if($pages == "") {
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo '<ul class="pag">';
		
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
				echo '<li class="pag-first"><a href="' . get_pagenum_link(1). '">&laquo;</a></li>';
			if($paged > 1 && $showitems < $pages) 
				echo '<li class="pag-previous"><a href="' . get_pagenum_link($paged - 1). '">&lsaquo; Prev</a></li>';

			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					echo ($paged == $i)? '<li class="current"><span>' . $i . '</span></li>':'<li><a href="' . get_pagenum_link($i) . '">'. $i . '</a></li>';
				}
			}

			if ($paged < $pages && $showitems < $pages) 
				echo '<li class="pag-next"><a href="' . get_pagenum_link($paged + 1) . '">Next &rsaquo;</i></a></li>';
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
				echo '<li class="pag-last" ><a href="' . get_pagenum_link($pages) . '">&raquo;</a></li>';

		echo '</ul>';
     }
}


//----------------------------------------------------------------------------------
//	REMOVE NON VALID REL CATEGORY TAGS
//----------------------------------------------------------------------------------

function add_nofollow_cat( $text ) { 
	$text = str_replace( 'rel="category"', "", $text );
	return $text; 
};
add_filter( 'the_category', 'add_nofollow_cat' );  


//----------------------------------------------------------------------------------
//	DELAY AUTOP
//----------------------------------------------------------------------------------

// Delay autop to avoid shortcode issues
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);


//----------------------------------------------------------------------------------
//	ADD CUSTOM FEATURED IMAGE SIZES
//----------------------------------------------------------------------------------

function thinkup_input_addimagesizes() {

	// 1 Column Layout
	add_image_size( 'column1-1/1', 960, 960, true );
	add_image_size( 'column1-1/2', 960, 480, true );
	add_image_size( 'column1-1/3', 960, 320, true );
	add_image_size( 'column1-2/3', 960, 640, true );
	add_image_size( 'column1-1/4', 960, 240, true );
	add_image_size( 'column1-3/4', 960, 720, true );
	add_image_size( 'column1-1/5', 960, 192, true );
	add_image_size( 'column1-2/5', 960, 384, true );
	add_image_size( 'column1-3/5', 960, 576, true );
	add_image_size( 'column1-4/5', 960, 768, true );

	// 2 Column Layout
	add_image_size( 'column2-1/1', 480, 480, true );
	add_image_size( 'column2-1/2', 480, 240, true );
	add_image_size( 'column2-1/3', 480, 160, true );
	add_image_size( 'column2-2/3', 480, 320, true );
	add_image_size( 'column2-1/4', 480, 120, true );
	add_image_size( 'column2-3/4', 480, 360, true );
	add_image_size( 'column2-1/5', 480, 96, true );
	add_image_size( 'column2-2/5', 480, 192, true );
	add_image_size( 'column2-3/5', 480, 288, true );
	add_image_size( 'column2-4/5', 480, 384, true );

	// 3 Column Layout
	add_image_size( 'column3-1/1', 320, 320, true );
	add_image_size( 'column3-1/2', 320, 160, true );
	add_image_size( 'column3-1/3', 320, 107, true );
	add_image_size( 'column3-2/3', 320, 213, true );
	add_image_size( 'column3-1/4', 320, 80, true );
	add_image_size( 'column3-3/4', 320, 240, true );
	add_image_size( 'column3-1/5', 320, 64, true );
	add_image_size( 'column3-2/5', 320, 128, true );
	add_image_size( 'column3-3/5', 320, 192, true );
	add_image_size( 'column3-4/5', 320, 256, true );

	// 4 Column Layout
	add_image_size( 'column4-1/1', 240, 240, true );
	add_image_size( 'column4-1/2', 240, 120, true );
	add_image_size( 'column4-1/3', 240, 80, true );
	add_image_size( 'column4-2/3', 240, 160, true );
	add_image_size( 'column4-1/4', 240, 60, true );
	add_image_size( 'column4-3/4', 240, 180, true );
	add_image_size( 'column4-1/5', 240, 48, true );
	add_image_size( 'column4-2/5', 240, 96, true );
	add_image_size( 'column4-3/5', 240, 144, true );
	add_image_size( 'column4-4/5', 240, 192, true );
}
add_action( 'init', 'thinkup_input_addimagesizes' );
 
function thinkup_input_showimagesizes($sizes) {

	// 1 Column Layout
	$sizes['column1-1/1'] = 'Full - 1:1';
	$sizes['column1-1/2'] = 'Full - 1:2';
	$sizes['column1-1/3'] = 'Full - 1:3';
	$sizes['column1-2/3'] = 'Full - 2:3';
	$sizes['column1-1/4'] = 'Full - 1:4';
	$sizes['column1-3/4'] = 'Full - 3:4';
	$sizes['column1-1/5'] = 'Full - 1:5';
	$sizes['column1-2/5'] = 'Full - 2:5';
	$sizes['column1-3/5'] = 'Full - 3:5';
	$sizes['column1-4/5'] = 'Full - 4:5';

	// 2 Column Layout
	$sizes['column2-1/1'] = 'Half - 1:1';
	$sizes['column2-1/2'] = 'Half - 1:2';
	$sizes['column2-1/3'] = 'Half - 1:3';
	$sizes['column2-2/3'] = 'Half - 2:3';
	$sizes['column2-1/4'] = 'Half - 1:4';
	$sizes['column2-3/4'] = 'Half - 3:4';
	$sizes['column2-1/5'] = 'Half - 1:5';
	$sizes['column2-2/5'] = 'Half - 2:5';
	$sizes['column2-3/5'] = 'Half - 3:5';
	$sizes['column2-4/5'] = 'Half - 4:5';

	// 3 Column Layout
	$sizes['column3-1/1'] = 'Third - 1:1';
	$sizes['column3-1/2'] = 'Third - 1:2';
	$sizes['column3-1/3'] = 'Third - 1:3';
	$sizes['column3-2/3'] = 'Third - 2:3';
	$sizes['column3-1/4'] = 'Third - 1:4';
	$sizes['column3-3/4'] = 'Third - 3:4';
	$sizes['column3-1/5'] = 'Third - 1:5';
	$sizes['column3-2/5'] = 'Third - 2:5';
	$sizes['column3-3/5'] = 'Third - 3:5';
	$sizes['column3-4/5'] = 'Third - 4:5';

	// 4 Column Layout
	$sizes['column4-1/1'] = 'Quarter - 1:1';
	$sizes['column4-1/2'] = 'Quarter - 1:2';
	$sizes['column4-1/3'] = 'Quarter - 1:3';
	$sizes['column4-2/3'] = 'Quarter - 2:3';
	$sizes['column4-1/4'] = 'Quarter - 1:4';
	$sizes['column4-3/4'] = 'Quarter - 3:4';
	$sizes['column4-1/5'] = 'Quarter - 1:5';
	$sizes['column4-2/5'] = 'Quarter - 2:5';
	$sizes['column4-3/5'] = 'Quarter - 3:5';
	$sizes['column4-4/5'] = 'Quarter - 4:5';

	return $sizes;
}
add_filter('image_size_names_choose', 'thinkup_input_showimagesizes');


//----------------------------------------------------------------------------------
//	ADD HOME: HOME TO CUSTOM MENU PAGE LIST
//----------------------------------------------------------------------------------

function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );


//----------------------------------------------------------------------------------
//	ADD FUNCTION TO GET CURRENT PAGE URL
//----------------------------------------------------------------------------------

function thinkup_url_current() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

?>