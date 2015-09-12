<?php

/**
 * Wp in Progress
 * 
 * @theme Alhena
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* GET ARCHIVE TITLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_get_archive_title')) {

	function alhenalite_get_archive_title() {
		
		if ( get_the_archive_title()  && ( get_the_archive_title() <> 'Archives' ) ) :
		
			return get_the_archive_title();
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* IS SINGLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_is_single')) {

	function alhenalite_is_single() {
		
		if ( is_single() || is_page() ) :
		
			return true;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* Default menu */
/*-----------------------------------------------------------------------------------*/   

function alhenalite_add_menuclass( $ulclass ) {
	return preg_replace( '/<ul>/', '<ul class="menu">', $ulclass, 1 );
}

add_filter( 'wp_page_menu', 'alhenalite_add_menuclass' );


/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  

if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function alhenalite_title( $title, $sep ) {
		
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		$title .= get_bloginfo( 'name' );
	
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', "alhenalite" ), max( $paged, $page ) );
	
		return $title;
		
	}

	add_filter( 'wp_title', 'alhenalite_title', 10, 2 );

	function alhenalite_addtitle() {
		
?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php

	}

	add_action( 'wp_head', 'alhenalite_addtitle' );

}

/*-----------------------------------------------------------------------------------*/
/* Prettyphoto at post gallery */
/*-----------------------------------------------------------------------------------*/   

function alhenalite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
	
    if ( ! $permalink )
        return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
    else
        return $html;
}

add_filter( 'wp_get_attachment_link', 'alhenalite_prettyPhoto', 10, 6);


/*-----------------------------------------------------------------------------------*/
/* Excerpt */
/*-----------------------------------------------------------------------------------*/   

function alhenalite_hide_excerpt_more() {
	return '';
}

add_filter('the_content_more_link', 'alhenalite_hide_excerpt_more');
add_filter('excerpt_more', 'alhenalite_hide_excerpt_more');

function alhenalite_excerpt() {
	
	global $post,$more;
	$more = 0;
	
	if ($pos=strpos($post->post_content, '<!--more-->')): 
		$content = the_content();
	else:
		$content = the_excerpt();
	endif;
	
	echo '<p>' . $content . ' <a class="button" href="'.get_permalink($post->ID).'" title="More">  ' . __( "Read More","alhenalite") . '</a> </p>';
}


/*-----------------------------------------------------------------------------------*/
/* Remove category list rel */
/*-----------------------------------------------------------------------------------*/   

function alhenalite_remove_category_list_rel($output) {
	$output = str_replace('rel="category"', '', $output);
	return $output;
}

add_filter('wp_list_categories', 'alhenalite_remove_category_list_rel');
add_filter('the_category', 'alhenalite_remove_category_list_rel');

/*-----------------------------------------------------------------------------------*/
/* Remove thumbnail dimensions */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'alhenalite_remove_thumbnail_dimensions', 10, 3 );
  
/*-----------------------------------------------------------------------------------*/
/* Remove css gallery */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_my_gallery_style() {
    return "<div class='gallery'>";
}

add_filter( 'gallery_style', 'alhenalite_my_gallery_style', 99 );

/*-----------------------------------------------------------------------------------*/
/* REQUIRE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_require')) {

	function alhenalite_require($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !alhenalite_setting('wip_loadsystem') ) || ( alhenalite_setting('wip_loadsystem') == "mode_a" ) ) {
		
				$folder = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($folder);  
				  
				foreach ($files as $key => $name) {  
				
					if ( (!is_dir($name)) && ( $name <> ".DS_Store" ) ) { 
					
						require_once $folder . $name;
					
					} 
				}  
			
			} else if ( alhenalite_setting('wip_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
					
						require_once get_template_directory()."/".$folder.$filename;
					
					}
				}
			}
		
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_enqueue_script')) {

	function alhenalite_enqueue_script($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !alhenalite_setting('wip_loadsystem') ) || ( alhenalite_setting('wip_loadsystem') == "mode_a" ) ) {
		
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $name) {  

					if ( (!is_dir($name)) && ( $name <> ".DS_Store" ) ) { 
						
						wp_enqueue_script( str_replace('.js','',$name), get_template_directory_uri() . $folder . "/" . $name , array('jquery'), FALSE, TRUE ); 
						
					} 
				}  
			
			} else if ( alhenalite_setting('wip_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
						
						wp_enqueue_script( str_replace('.js','',$filename), get_template_directory_uri() . $folder . "/" . $filename , array('jquery'), FALSE, TRUE ); 
					
					}
					
				}
		
			}
			
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLES */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_enqueue_style')) {

	function alhenalite_enqueue_style($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !alhenalite_setting('wip_loadsystem') ) || ( alhenalite_setting('wip_loadsystem') == "mode_a" ) ) {
			
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $name) {  
					
					if ( (!is_dir($name)) && ( $name <> ".DS_Store" ) ) { 
						
						wp_enqueue_style( str_replace('.css','',$name), get_template_directory_uri() . $folder . "/" . $name ); 
						
					} 
				}  
			
			
			} else if ( alhenalite_setting('wip_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
						
						wp_enqueue_style( str_replace('.css','',$filename), get_template_directory_uri() . $folder . "/" . $filename ); 
				
					}
				
				}
			
			}
		
		endif;
	
	}

}


/*-----------------------------------------------------------------------------------*/
/* Request */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_request($id) {
	
	if ( isset ( $_REQUEST[$id])) 
	return $_REQUEST[$id];	
	
}

/*-----------------------------------------------------------------------------------*/
/* Theme path */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_theme_data($id) {
	
	$themedata = wp_get_theme();
	return $themedata->get($id);
	
}

/*-----------------------------------------------------------------------------------*/
/* Theme name */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_themename() {
	
	$themename = "alhenalite_theme_settings";
	return $themename;	
	
}

/*-----------------------------------------------------------------------------------*/
/* Theme settings */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_setting')) {

	function alhenalite_setting($id) {

		$alhenalite_setting = get_theme_mod($id);
			
		if ( isset($alhenalite_setting))
			
			return $alhenalite_setting;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Post meta */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_postmeta($id) {

	global $post;
	
	$val = get_post_meta( $post->ID , $id, TRUE);
	if(isset($val))
		return $val;

}

/*-----------------------------------------------------------------------------------*/
/* Get Skin */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_getskins($classes) {

	if (alhenalite_setting('wip_skins')):
		$getskin = explode("_", alhenalite_setting('wip_skins'));
		$classes[] = $getskin[0];
		return $classes;
	else:
		$classes[] = "light";
		return $classes;
	endif;
}

add_filter('body_class','alhenalite_getskins');

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_template($id) {

	$template = array ("full" => "span12" , "left-sidebar" => "span8" , "right-sidebar" => "span8" );

	$span = $template["right-sidebar"];
	$sidebar =  "right-sidebar";

	if ( ( (is_category()) || (is_tag()) ) && (alhenalite_setting('wip_category_layout')) ) {
		
		$span = $template[alhenalite_setting('wip_category_layout')];
		$sidebar =  alhenalite_setting('wip_category_layout');
			
	} else if ( (is_home()) && ( alhenalite_setting('wip_home')) ) {
		
		$span = $template[alhenalite_setting('wip_home')];
		$sidebar =  alhenalite_setting('wip_home');
			
	} else if ( alhenalite_postmeta('wip_template') ) {
		
		$span = $template[alhenalite_postmeta('wip_template')];
		$sidebar =  alhenalite_postmeta('wip_template');
			
	}
	
	return ${$id};
	
}

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_layout($id) {

	if (!alhenalite_setting($id)):
	
		$layout = "span12";
	
	else:

		$layout = alhenalite_setting($id);

	endif;
	
	return $layout;
	
}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_scripts_styles')) {

	function alhenalite_scripts_styles() {
	
		alhenalite_enqueue_style('/inc/css');

		wp_enqueue_style( 'alhenalite-style', get_stylesheet_uri(), array() );

		if ( ( get_theme_mod('wip_skin') ) && ( get_theme_mod('wip_skin') <> "light_blue" ) ):
	
			wp_enqueue_style( 'alhenalite ' . get_theme_mod('wip_skin') , get_template_directory_uri() . '/inc/skins/' . get_theme_mod('wip_skin') . '.css' ); 
		
		endif;

		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Abel|Kristi|Handlee|Maven+Pro:400,500,700,900|Oxygen:400,300,700&subset=latin,latin-ext' );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( "jquery-ui-core", array('jquery'));
		wp_enqueue_script( "jquery-ui-tabs", array('jquery'));

		alhenalite_enqueue_script('/inc/js');
		
	}
	
	add_action( 'wp_enqueue_scripts', 'alhenalite_scripts_styles', 11 );

}
/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhenalite_setup')) {

	function alhenalite_setup() {

		global $nivoitems, $bxitems;

		if ( ! isset( $content_width ) )
			$content_width = 940;
	
		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
	
		add_theme_support( 'title-tag' );
		
		add_theme_support( 'custom-background', array(
			'default-color' => 'f3f3f3',
		) );
		
		add_image_size( 'blog', 940,429, TRUE ); 
		
		register_nav_menu( 'main-menu', 'Main menu' );
	
		load_theme_textdomain("alhenalite", get_template_directory() . '/languages');
		
		$require_array = array (
			"/core/classes/",
			"/core/admin/customize/",
			"/core/templates/",
			"/core/functions/",
			"/core/metaboxes/",
		);
		
		foreach ( $require_array as $require_file ) {	
		
			alhenalite_require($require_file);
		
		}
		
	}

	add_action( 'after_setup_theme', 'alhenalite_setup' );

}


?>