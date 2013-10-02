<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @theme Alhena
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */
 
/*-----------------------------------------------------------------------------------*/
/* Localize theme */
/*-----------------------------------------------------------------------------------*/   

load_theme_textdomain( 'wip', get_template_directory() . '/languages');

/*-----------------------------------------------------------------------------------*/
/* Admin menu */
/*-----------------------------------------------------------------------------------*/   

function wip_option_panel() {
        global $wp_admin_bar, $wpdb;
    	$wp_admin_bar->add_menu( array( 'id' => 'theme_options', 'title' => '<span> Alhena Options </span>', 'href' => get_admin_url() . 'themes.php?page=themeoption' ) );
        $wp_admin_bar->add_menu( array( 'id' => 'get_premium', 'title' => '<span> Get Premium </span>', 'href' => get_admin_url() . 'themes.php?page=getpremium' ) );
}
add_action( 'admin_bar_menu', 'wip_option_panel', 1000 );

/*-----------------------------------------------------------------------------------*/
/* Content width */
/*-----------------------------------------------------------------------------------*/ 

if ( ! isset( $content_width ) )
	$content_width = 940;

/*-----------------------------------------------------------------------------------*/
/* Prettyphoto at post gallery */
/*-----------------------------------------------------------------------------------*/   

function wip_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
	
    if ( ! $permalink )
        return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
    else
        return $html;
}

add_filter( 'wp_get_attachment_link', 'wip_prettyPhoto', 10, 6);


/*-----------------------------------------------------------------------------------*/
/* Custom excerpt more */
/*-----------------------------------------------------------------------------------*/   

function wip_new_excerpt_more( $more ) {
	
	global $post;
	
	if (wip_postmeta( 'wip_service_url' )):
		$url = wip_postmeta('wip_service_url' );
	else:
		$url = get_permalink($post->ID);
	endif;
	
	return '<a class="button" href="'.$url.'" title="More">  ' . __( "Read More","wip") . ' </a>';

}

add_filter('excerpt_more', 'wip_new_excerpt_more');


/*-----------------------------------------------------------------------------------*/
/* Shortcode in widget */
/*-----------------------------------------------------------------------------------*/   

add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/* Remove category list rel */
/*-----------------------------------------------------------------------------------*/   

function wip_remove_category_list_rel($output) {
	$output = str_replace('rel="category"', '', $output);
	return $output;
}

add_filter('wp_list_categories', 'wip_remove_category_list_rel');
add_filter('the_category', 'wip_remove_category_list_rel');

/*-----------------------------------------------------------------------------------*/
/* Remove thumbnail dimensions */
/*-----------------------------------------------------------------------------------*/ 

function wip_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'wip_remove_thumbnail_dimensions', 10, 3 );
  
/*-----------------------------------------------------------------------------------*/
/* Remove css gallery */
/*-----------------------------------------------------------------------------------*/ 

function wip_my_gallery_style() {
    return "<div class='gallery'>";
}

add_filter( 'gallery_style', 'wip_my_gallery_style', 99 );

/*-----------------------------------------------------------------------------------*/
/* Thematic dropdown options */
/*-----------------------------------------------------------------------------------*/ 

function wip_childtheme_dropdown_options($dropdown_options) {
	$dropdown_options = '<script type="text/javascript" src="'. get_stylesheet_directory_uri() .'/scripts/thematic-dropdowns.js"></script>';
	return $dropdown_options;
}

add_filter('thematic_dropdown_options','wip_childtheme_dropdown_options');

/*-----------------------------------------------------------------------------------*/
/* Require */
/*-----------------------------------------------------------------------------------*/ 

function wip_require($folder) {

$dh  = opendir(get_template_directory().$folder);

while (false !== ($filename = readdir($dh))) {
   
	if ( strlen($filename) > 2 ) {
	require_once get_template_directory()."/".$folder.$filename;
	}
}


}

/*-----------------------------------------------------------------------------------*/
/* Scripts */
/*-----------------------------------------------------------------------------------*/ 

function wip_enqueue_script($folder) {

	if (isset($folder)) : 
	
	$dh  = opendir(get_template_directory().$folder);
	
	while (false !== ($filename = readdir($dh))) {
	   
		if ( strlen($filename) > 2 ) {
				wp_enqueue_script( str_replace('.js','',$filename), get_template_directory_uri() . $folder . "/" . $filename , array('jquery'), FALSE, TRUE ); 
		}
	}

endif;

}

/*-----------------------------------------------------------------------------------*/
/* Styles */
/*-----------------------------------------------------------------------------------*/ 

function wip_enqueue_style($folder) {

if (isset($folder)) : 

	$dh  = opendir(get_template_directory().$folder);
	
	while (false !== ($filename = readdir($dh))) {
	   
		if ( strlen($filename) > 2 ) {
				wp_enqueue_style( str_replace('.css','',$filename), get_template_directory_uri() . $folder . "/" . $filename ); 
		}
	}

endif;

}

/*-----------------------------------------------------------------------------------*/
/* Sidebar list */
/*-----------------------------------------------------------------------------------*/ 

function wip_sidebar_list($sidebar_type) {
	
		$sidebars = array( "none" => "None" , $sidebar_type."_sidebar_area" => "Default");

		return $sidebars;
			
		
}

/*-----------------------------------------------------------------------------------*/
/* Request */
/*-----------------------------------------------------------------------------------*/ 

function wip_request($id) {
	
	if ( isset ( $_REQUEST[$id])) 
	return $_REQUEST[$id];	
	
}

/*-----------------------------------------------------------------------------------*/
/* Theme path */
/*-----------------------------------------------------------------------------------*/ 

function wip_theme_data($id) {
	
	 global $wp_version;	
	 if ( $wp_version <= 3.4 ) :
	 	$themedata = get_theme_data(TEMPLATEPATH. '/style.css');
		return $themedata[$id];
	 else:
		$themedata = wp_get_theme();
		return $themedata->get($id);
	 endif;
	
}

/*-----------------------------------------------------------------------------------*/
/* Theme name */
/*-----------------------------------------------------------------------------------*/ 

function wip_themename() {
	
	$themename = "alhenalite_theme_settings";
	return $themename;	
	
}

/*-----------------------------------------------------------------------------------*/
/* Theme settings */
/*-----------------------------------------------------------------------------------*/ 

function wip_setting($id) {

	$wip_setting = get_option(wip_themename());
	if(isset($wip_setting[$id]))
		return $wip_setting[$id];

}

/*-----------------------------------------------------------------------------------*/
/* Post meta */
/*-----------------------------------------------------------------------------------*/ 

function wip_postmeta($id) {

	global $post;
	
	$val = get_post_meta( $post->ID , $id, TRUE);
	if(isset($val))
		return $val;

}

/*-----------------------------------------------------------------------------------*/
/* Get Skin */
/*-----------------------------------------------------------------------------------*/ 

function wip_getskins($classes) {

	if (wip_setting('wip_skins')):
		$getskin = explode("_", wip_setting('wip_skins'));
		$classes[] = $getskin[0];
		return $classes;
	else:
		$classes[] = "light";
		return $classes;
	endif;
}

add_filter('body_class','wip_getskins');

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

function wip_template($id) {

	$template = array ("full" => "span12" , "left-sidebar" => "span8" , "right-sidebar" => "span8" );

	$span = $template["full"];
	$sidebar =  "full";

	if ( (is_category()) || (is_tag()) || (is_home()) ) {
		
		$span = $template[wip_setting('wip_category_layout')];
		$sidebar =  wip_setting('wip_category_layout');
			
	} else if (wip_postmeta('wip_template')) {
		
		$span = $template[wip_postmeta('wip_template')];
		$sidebar =  wip_postmeta('wip_template');
			
	}
	
	return ${$id};
	
}

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

function wip_layout($id) {

	if (!wip_setting($id)):
	
		$layout = "span12";
	
	else:

		$layout = wip_setting($id);

	endif;
	
	return $layout;
	
}


/*-----------------------------------------------------------------------------------*/
/* Theme Support */
/*-----------------------------------------------------------------------------------*/         

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Thumbnails */
/*-----------------------------------------------------------------------------------*/         

add_image_size( 'blog', 940,429, TRUE ); 

/*-----------------------------------------------------------------------------------*/
/* Main menu */
/*-----------------------------------------------------------------------------------*/         

function wip_main_menu() {
register_nav_menu( 'main-menu', 'Menu principale' );
}

add_action( 'init', 'wip_main_menu' );

/*-----------------------------------------------------------------------------------*/
/* Add default style, at theme activation */
/*-----------------------------------------------------------------------------------*/         

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	
	$wip_setting = get_option(wip_themename());

	if (!$wip_setting) {	
		
		$skins = array( 
		
		"wip_skins" => "light_turquoise", 
		"wip_logo_font" => "Kristi", 
		"wip_logo_font_size" => "55px", 
		
		"wip_menu_font" => "Abel", 
		"wip_menu_font_size" => "16px", 
		
		"wip_titles_font" => "Abel", 
		
		"wip_text_font_color" => "#616161", 
		"wip_copyright_font_color" => "#ffffff", 
		
		"wip_link_color" => "#1abc9c", 
		"wip_link_color_hover" => "#16a085", 
		"wip_border_color" => "#16a085", 
		
		"wip_header_font_color" => "#919191", 
		"wip_header_hover_font_color" => "#ffffff", 
		"wip_submenu_color" => "#474747", 
		"wip_submenu_text_color" => "#919191", 
	
		"wip_header_background" => "None",
		"wip_header_background_color" => "#333333",
	
		"wip_body_background" => "/images/background/patterns/pattern1.jpg",
		"wip_body_background_repeat" => "repeat",
		"wip_body_background_color" => "#f3f3f3",
		
		"wip_footer_background" => "None",
		"wip_footer_background_color" => "#333333",
	
		"wip_top_sidebar_area" => "span12",
		"wip_header_sidebar_area" => "span12",
		"wip_bottom_sidebar_area" => "span12",
		"wip_footer_sidebar_area" => "span4",

		"wip_home" => "home-default",
		"wip_category_layout" => "full",
		"wip_footer_facebook_button" => "#",
		"wip_footer_twitter_button" => "#",
		"wip_footer_skype_button" => "#",
		"wip_view_comments" => "on",
		"wip_view_social_buttons" => "on",
		
		);
	
		update_option( wip_themename(), $skins ); 
		
	}
}

/*-----------------------------------------------------------------------------------*/
/* Functions */
/*-----------------------------------------------------------------------------------*/ 

wip_require('/core/widgets/');
wip_require('/core/templates/');
wip_require('/core/classes/');
wip_require('/core/functions/');
wip_require('/core/metaboxes/');

?>