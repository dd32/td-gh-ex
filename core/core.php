<?php


/*-----------------------------------------------------------------------------------*/
/* Theme name */
/*-----------------------------------------------------------------------------------*/ 

function wip_themename() {
	
	$themename = "suevafree_theme_settings";
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
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

function wip_template($id) {

	$template = array ("full" => "span12" , "left-sidebar" => "span8" , "right-sidebar" => "span8" );
	
	if ( (is_category()) || (is_tag()) ):
	
		$span = $template[wip_setting('wip_category_layout')];
		$sidebar =  wip_setting('wip_category_layout');
		
	else:
	
		$span = $template[wip_postmeta('wip_template')];
		$sidebar =  wip_postmeta('wip_template');
		
	endif;
	
	return ${$id};
	
}

/*-----------------------------------------------------------------------------------*/
/* Request */
/*-----------------------------------------------------------------------------------*/ 

function wip_request($id) {
	
	if ( isset ( $_REQUEST[$id])) 
	return $_REQUEST[$id];	
	
}

/*-----------------------------------------------------------------------------------*/
/* Content width */
/*-----------------------------------------------------------------------------------*/ 

if ( ! isset( $content_width ) )
	$content_width = 940;


/*-----------------------------------------------------------------------------------*/
/* Thumbnails */
/*-----------------------------------------------------------------------------------*/         

add_theme_support( 'post-thumbnails');
add_theme_support( 'automatic-feed-links' );

add_image_size( 'blog', 940,429, TRUE ); 
add_image_size( 'large', 449,304, TRUE ); 
add_image_size( 'medium', 290,220, TRUE ); 
add_image_size( 'small', 211,150, TRUE ); 

/*-----------------------------------------------------------------------------------*/
/* Main menu */
/*-----------------------------------------------------------------------------------*/         

add_action( 'init', 'main_menu' );
function main_menu() {
register_nav_menu( 'main-menu', 'Menu principale' );
}

/*-----------------------------------------------------------------------------------*/
/* Add default style, at theme activation */
/*-----------------------------------------------------------------------------------*/         

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) 

{
	
	$wip_setting = get_option(wip_themename());

	if (!$wip_setting) {	
	
	$skins = array( 
	
    "wip_skins" => "Orange", 
    "wip_logo_font" => "Allura", 
    "wip_logo_font_size" => "70px", 
    "wip_logo_description_font" => "Abel", 
    "wip_logo_description_font_size" => "14px", 
	
    "wip_menu_font" => "Abel", 
    "wip_menu_font_size" => "18px", 
	
    "wip_titles_font" => "Abel", 
	
    "wip_text_font_color" => "#616161", 
    "wip_copyright_font_color" => "#ffffff", 
    "wip_link_color" => "#ff6644", 
    "wip_link_color_hover" => "#d14a2b", 
    "wip_border_color" => "#ff6644", 

	"wip_body_background" => "/images/background/patterns/grid.png",
	"wip_body_background_repeat" => "repeat",
	"wip_body_background_color" => "#f3f3f3",
	
	"wip_footer_background" => "/images/background/patterns/debut_dark.png",
	"wip_footer_background_repeat" => "repeat",
	"wip_footer_background_color" => "#f3f3f3",

	"home-default" => "default",
	"wip_footer_facebook_button" => "http://www.facebook.com/WpInProgress",
	"wip_footer_twitter_button" => "https://twitter.com/#!/WPinProgress",
	"wip_footer_skype_button" => "alexvtn",
	"wip_view_comments" => "on",
	"wip_view_social_buttons" => "on",
	
	);

	update_option( wip_themename(), $skins ); 
	
}
}

/*-----------------------------------------------------------------------------------*/
/* Admin menu */
/*-----------------------------------------------------------------------------------*/   

function option_panel() {
        global $wp_admin_bar, $wpdb;
    	
		$wp_admin_bar->add_menu( array( 'id' => 'theme_options', 'title' => '<span> Theme Options </span>', 'href' => get_admin_url() . 'themes.php?page=themeoption' ) );
        $wp_admin_bar->add_menu( array( 'id' => 'get_premium', 'title' => '<span> Get Premium </span>', 'href' => get_admin_url() . 'themes.php?page=getpremium' ) );

}

add_action( 'admin_bar_menu', 'option_panel', 1000 );

/*-----------------------------------------------------------------------------------*/
/* Prettyphoto at post gallery */
/*-----------------------------------------------------------------------------------*/   

function prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
	
    if ( ! $permalink )
        return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
    else
        return $html;
}

add_filter( 'wp_get_attachment_link', 'prettyPhoto', 10, 6);

/*-----------------------------------------------------------------------------------*/
/* Custom excerpt more */
/*-----------------------------------------------------------------------------------*/   

function new_excerpt_more( $more ) {
	
	global $post;
	return '<a class="button" href="'.get_permalink($post->ID).'" title="More">  ' . __( "Read More","wip") . ' </a>';
}

add_filter('excerpt_more', 'new_excerpt_more');


/*-----------------------------------------------------------------------------------*/
/* Localize theme */
/*-----------------------------------------------------------------------------------*/   

load_theme_textdomain('wip', get_template_directory() . '/languages');

/*-----------------------------------------------------------------------------------*/
/* Shortcode in widget */
/*-----------------------------------------------------------------------------------*/   

add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/* Remove category list rel */
/*-----------------------------------------------------------------------------------*/   

function remove_category_list_rel($output)
{
	$output = str_replace('rel="category"', '', $output);
	return $output;
}
add_filter('wp_list_categories', 'remove_category_list_rel');
add_filter('the_category', 'remove_category_list_rel');

/*-----------------------------------------------------------------------------------*/
/* Remove thumbnail dimensions */
/*-----------------------------------------------------------------------------------*/ 

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
  
/*-----------------------------------------------------------------------------------*/
/* Remove css gallery */
/*-----------------------------------------------------------------------------------*/ 

add_filter( 'gallery_style', 'my_gallery_style', 99 );

function my_gallery_style() {
    return "<div class='gallery'>";
}

/*-----------------------------------------------------------------------------------*/
/* Thematic dropdown options */
/*-----------------------------------------------------------------------------------*/ 

function childtheme_dropdown_options($dropdown_options) {
	$dropdown_options = '<script type="text/javascript" src="'. get_bloginfo('stylesheet_directory') .'/scripts/thematic-dropdowns.js"></script>';
	return $dropdown_options;
}

add_filter('thematic_dropdown_options','childtheme_dropdown_options');

/*-----------------------------------------------------------------------------------*/
/* Analytics code */
/*-----------------------------------------------------------------------------------*/ 

function analytics_code() {

	if(wip_setting('wip_analytics_code'))
	echo stripslashes( wip_setting('wip_analytics_code'));
}

add_action('wp_footer', 'analytics_code');


/*-----------------------------------------------------------------------------------*/
/* Socials */
/*-----------------------------------------------------------------------------------*/ 

function socials() {
	
	$socials = array ("facebook","twitter","flickr","google","linkedin","myspace","pinterest","tumblr","youtube","vimeo","skype","email");
	
	foreach ( $socials as $social ) 
	
	{
		if (wip_setting('wip_footer_'.$social.'_button')): 
		if ($social == "email") $email = "mailto:"; else $email = "";
		if ($social == "skype") $skype = "skype:"; else $skype = "";
            echo '<a href="'.$email.$skype.wip_setting('wip_footer_'.$social.'_button').'" target="_blank" title="'.$social.'" class="social '.$social.'"> '.$social.'  </a> ';
		endif;
	}
	
	if (wip_setting('wip_footer_rss_button') == "on"): 
    	echo '<a href="'; bloginfo('rss2_url'); echo '" title="Rss" class="social rss"> Rss  </a> ';
	endif; 
}

?>