<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @theme Sueva
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* POST CLASS */
/*-----------------------------------------------------------------------------------*/   

function diarjolite_post_class($classes) {

	$classes[] = 'post-container col-md-12';
		
	return $classes;
	
}

add_filter('post_class', 'diarjolite_post_class');

/*-----------------------------------------------------------------------------------*/
/* BODY CLASS */
/*-----------------------------------------------------------------------------------*/   

function diarjolite_body_class($classes) {

	$classes[] = 'custombody';
		
	return $classes;
	
}

add_filter('body_class', 'diarjolite_body_class');


/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  
 
function diarjolite_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', "diarjolite" ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'diarjolite_title', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/* LOCALIZE THEME */
/*-----------------------------------------------------------------------------------*/   

load_theme_textdomain("diarjolite", get_template_directory() . '/languages');

/*-----------------------------------------------------------------------------------*/
/* REQUIRE FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_require($folder) {

	if (isset($folder)) : 

		if ( ( !diarjolite_setting('diarjolite_loadsystem') ) || ( diarjolite_setting('diarjolite_loadsystem') == "mode_a" ) ) {
	
			$folder = dirname(dirname(__FILE__)) . $folder ;  
			
			$files = scandir($folder);  
			  
			foreach ($files as $key => $name) {  
				if (!is_dir($name)) { 
					require_once $folder . $name;
				} 
			}  
		
		} else if ( diarjolite_setting('diarjolite_loadsystem') == "mode_b" ) {


			$dh  = opendir(get_template_directory().$folder);
			
			while (false !== ($filename = readdir($dh))) {
			   
				if ( strlen($filename) > 2 ) {
				require_once get_template_directory()."/".$folder.$filename;
				}
			}
		}
	
	endif;
	
}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_enqueue_script($folder) {

	if (isset($folder)) : 

		if ( ( !diarjolite_setting('diarjolite_loadsystem') ) || ( diarjolite_setting('diarjolite_loadsystem') == "mode_a" ) ) {
		
			$dir = dirname(dirname(__FILE__)) . $folder ;  
			
			$files = scandir($dir);  
			  
			foreach ($files as $key => $name) {  
				if (!is_dir($name)) { 
					
					wp_enqueue_script( str_replace('.js','',$name), get_template_directory_uri() . $folder . "/" . $name , array('jquery'), FALSE, TRUE ); 
					
				} 
			}  
		
		} else if ( diarjolite_setting('diarjolite_loadsystem') == "mode_b" ) {

			$dh  = opendir(get_template_directory().$folder);
			
			while (false !== ($filename = readdir($dh))) {
			   
				if ( strlen($filename) > 2 ) {
						wp_enqueue_script( str_replace('.js','',$filename), get_template_directory_uri() . $folder . "/" . $filename , array('jquery'), FALSE, TRUE ); 
				}
			}
	
		}
		
	endif;

}

/*-----------------------------------------------------------------------------------*/
/* STYLES FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_enqueue_style($folder) {

	if (isset($folder)) : 

		if ( ( !diarjolite_setting('diarjolite_loadsystem') ) || ( diarjolite_setting('diarjolite_loadsystem') == "mode_a" ) ) {
	
		
			$dir = dirname(dirname(__FILE__)) . $folder ;  
			
			$files = scandir($dir);  
			  
			foreach ($files as $key => $name) {  
				
				if (!is_dir($name)) { 
					
					wp_enqueue_style( str_replace('.css','',$name), get_template_directory_uri() . $folder . "/" . $name ); 
					
				} 
			}  
		
		
		} else if ( diarjolite_setting('diarjolite_loadsystem') == "mode_b" ) {

		
			$dh  = opendir(get_template_directory().$folder);
			
			while (false !== ($filename = readdir($dh))) {
			   
				if ( strlen($filename) > 2 ) {
						wp_enqueue_style( str_replace('.css','',$filename), get_template_directory_uri() . $folder . "/" . $filename ); 
				}
			}
		

		}
	
	endif;

}

/*-----------------------------------------------------------------------------------*/
/* REQUEST FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_request($id) {
	
	if ( isset ( $_REQUEST[$id])) 
	return $_REQUEST[$id];	
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME PATH */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_theme_data($id) {
	
	$themedata = wp_get_theme();
	return $themedata->get($id);
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME NAME */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_themename() {
	
	$themename = "diarjolite_theme_settings";
	return $themename;	
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_setting($id) {

	$diarjolite_setting = get_option(diarjolite_themename());
	if(isset($diarjolite_setting[$id]))
		return $diarjolite_setting[$id];

}

/*-----------------------------------------------------------------------------------*/
/* POST META */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_postmeta($id) {

	global $post;
	
	if (!is_404()) {
		$val = get_post_meta( $post->ID , $id, TRUE);
		if(isset($val))
		return $val;
	} else {
		return null;
	}
	
}


/*-----------------------------------------------------------------------------------*/
/* POST ICON */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_posticon() {

	$icons = array ("video" => "fa fa-film" , "gallery" => "fa fa-camera" , "audio" => "fa fa-music" , "aside" => "fa fa-file-text-o" , "link" => "fa fa-link" , "quote" => "fa fa-quote-left" );

	if (get_post_format()) { 
		$icon = '<i class="'.$icons[get_post_format()].'"></i>'; 
	} else {
		$icon = '<i class="fa fa-pencil-square-o"></i>'; 
	}

	return $icon;
	
}

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_template($id) {

	$template = array ("full" => "col-md-12" , "left-sidebar" => "col-md-8" , "right-sidebar" => "col-md-8" );

	$span = $template["right-sidebar"];
	$sidebar =  "right-sidebar";

	if  ( ( (is_category()) || (is_tag()) || (is_tax()) || (is_month() ) ) && (diarjolite_setting('diarjolite_category_layout')) ) {
		
		$span = $template[diarjolite_setting('diarjolite_category_layout')];
		$sidebar =  diarjolite_setting('diarjolite_category_layout');
			
	} else if ( (is_home()) && (diarjolite_setting('diarjolite_home')) ) {
		
		$span = $template[diarjolite_setting('diarjolite_home')];
		$sidebar =  diarjolite_setting('diarjolite_home');
		
	} else if ( (is_search()) && (diarjolite_setting('diarjolite_search_layout')) ) {
		
		$span = $template[diarjolite_setting('diarjolite_search_layout')];
		$sidebar =  diarjolite_setting('diarjolite_search_layout');
		
	} else if ( ( (is_single()) || (is_page()) ) && (diarjolite_postmeta('diarjolite_template')) ) {
		
		$span = $template[diarjolite_postmeta('diarjolite_template')];
		$sidebar =  diarjolite_postmeta('diarjolite_template');
			
	}

	return ${$id};
	
}

/*-----------------------------------------------------------------------------------*/
/* THUMBNAILS */
/*-----------------------------------------------------------------------------------*/         

function diarjolite_get_thumbs($type) {
	
	if (diarjolite_setting('diarjolite_'.$type.'_thumbinal')):
		return diarjolite_setting('diarjolite_'.$type.'_thumbinal');
	else:
		return "629";
	endif;

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

function diarjolite_setup() {

	add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'blog', 940,629, TRUE ); 
	
	add_image_size( 'large', 449,304, TRUE ); 
	add_image_size( 'medium', 290,220, TRUE ); 
	add_image_size( 'small', 211,150, TRUE ); 

	register_nav_menu( 'main-menu', 'Main menu' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f3f3f3'
	) );

	if ( ! isset( $content_width ) )
		$content_width = 940;

}

add_action( 'after_setup_theme', 'diarjolite_setup' );

/*-----------------------------------------------------------------------------------*/
/* DEFAULT STYLE, AFTER THEME ACTIVATION */
/*-----------------------------------------------------------------------------------*/         

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	
	$diarjolite_setting = get_option(diarjolite_themename());

	if (!$diarjolite_setting) {	
		
		$settings = array( 

		"diarjolite_loadsystem" => "mode_a",
		"diarjolite_skins" => "turquoise", 
		
		"diarjolite_logo_font" => "Oswald", 
		
		"diarjolite_menu_font" => "Roboto Slab", 

		"diarjolite_content_font" => "Roboto Slab", 

		"diarjolite_titles_font" => "Fjalla One", 
		
		"diarjolite_link_color" => "#48c9b0", 
		"diarjolite_link_color_hover" => "#1abc9c",

		"diarjolite_bars_background_color" => "#2D3032", 
		"diarjolite_bars_text_color" => "#ffffff",
		"diarjolite_bars_borders_color" => "#444649",
	
		"diarjolite_body_background_color" => "#fafafa",

		"diarjolite_home" => "right-sidebar",
		"diarjolite_category_layout" => "right-sidebar",
		"diarjolite_bottom_layout" => "col-md-4",
		
		);
	
		update_option( diarjolite_themename(), $settings ); 
		
	}
}

/*-----------------------------------------------------------------------------------*/
/* GET PAGED */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_paged() {
	
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	
	return $paged;
	
}

/*-----------------------------------------------------------------------------------*/
/* PRETTYPHOTO */
/*-----------------------------------------------------------------------------------*/   

function diarjolite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
	
    if ( ! $permalink )
        return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
    else
        return $html;
}

add_filter( 'wp_get_attachment_link', 'diarjolite_prettyPhoto', 10, 6);

/*-----------------------------------------------------------------------------------*/
/* Excerpt more */
/*-----------------------------------------------------------------------------------*/   

function diarjolite_hide_excerpt_more() {
	return '';
}

add_filter('the_content_more_link', 'diarjolite_hide_excerpt_more');
add_filter('excerpt_more', 'diarjolite_hide_excerpt_more');

function diarjolite_excerpt() {
	
	global $post,$more;
	$more = 0;
	
	if ($pos=strpos($post->post_content, '<!--more-->')): 
		$output = '<p>'.strip_tags(get_the_content()).'<a class="more" href="'.get_permalink($post->ID).'" title="More"> [...] </a></p>';
	else:
		$output = '<p>'.get_the_excerpt().'<a class="more" href="'.get_permalink($post->ID).'" title="More"> [...] </a></p>';
	endif;
	
	echo $output;
}


/*-----------------------------------------------------------------------------------*/
/* REMOVE CATEGORY LIST REL */
/*-----------------------------------------------------------------------------------*/   

function diarjolite_remove_category_list_rel($output) {
	$output = str_replace('rel="category"', '', $output);
	return $output;
}

add_filter('wp_list_categories', 'diarjolite_remove_category_list_rel');
add_filter('the_category', 'diarjolite_remove_category_list_rel');

/*-----------------------------------------------------------------------------------*/
/* REMOVE THUMBNAIL DIMENSION */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'diarjolite_remove_thumbnail_dimensions', 10, 3 );
  
/*-----------------------------------------------------------------------------------*/
/* REMOVE CSS GALLERY */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_my_gallery_style() {
    return "<div class='gallery'>";
}

add_filter( 'gallery_style', 'diarjolite_my_gallery_style', 99 );

/*-----------------------------------------------------------------------------------*/
/* THEMATIC DROPDOWN OPTIONS */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_childtheme_dropdown_options($dropdown_options) {
	$dropdown_options = '<script type="text/javascript" src="'. get_stylesheet_directory_uri() .'/scripts/thematic-dropdowns.js"></script>';
	return $dropdown_options;
}

add_filter('thematic_dropdown_options','diarjolite_childtheme_dropdown_options');

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

function diarjolite_scripts_styles() {

	diarjolite_enqueue_style('/css');

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( "jquery-ui-core", array('jquery'));
	wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
	
	diarjolite_enqueue_script('/js');
	
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Delius+Swash+Caps|Fjalla+One|Roboto+Slab:400,300,100,700' );
	
}

add_action( 'wp_enqueue_scripts', 'diarjolite_scripts_styles' );

/*-----------------------------------------------------------------------------------*/
/* FUNCTIONS */
/*-----------------------------------------------------------------------------------*/ 

diarjolite_require('/core/templates/');
diarjolite_require('/core/classes/');
diarjolite_require('/core/functions/');
diarjolite_require('/core/metaboxes/');

?>