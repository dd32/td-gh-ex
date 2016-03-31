<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Woocommerce is active */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'bazaarlite_is_woocommerce_active' ) ) {
	
	function bazaarlite_is_woocommerce_active( $type = "" ) {
	
        global $woocommerce;

        if ( isset( $woocommerce ) ) {
			
			if ( !$type || call_user_func($type) ) {
            
				return true;
			
			}
			
		}
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_setting')) {

	function bazaarlite_setting($id, $default = "" ) {

		$bazaarlite_setting = get_theme_mod($id);
			
		if(isset($bazaarlite_setting)):
		
			return $bazaarlite_setting;
		
		else:
		
			return $default;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* POST META */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_postmeta')) {

	function bazaarlite_postmeta($id) {
	
		global $post, $wp_query;
		
		$content_ID = $post->ID;
	
		if( bazaarlite_is_woocommerce_active('is_shop') ) {
	
			$content_ID = get_option('woocommerce_shop_page_id');
	
		}

		$val = get_post_meta( $content_ID , $id, TRUE);
		
		if(isset($val)) {
			
			return $val;
			
		} else {
				
			return '';
			
		}
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* REQUIRE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_require')) {

	function bazaarlite_require($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !bazaarlite_setting('wip_loadsystem') ) || ( bazaarlite_setting('wip_loadsystem') == "mode_a" ) ) {
		
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $value) {  

					if ( !in_array($value,array(".DS_Store",".","..")) ) { 
						
						if ( !is_dir( $dir . $value) ) { 
							
							require_once $dir . $value;
						
						} 
					
					} 

				}  
			
			} else if ( bazaarlite_setting('wip_loadsystem') == "mode_b" ) {
	
	
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

if (!function_exists('bazaarlite_enqueue_script')) {

	function bazaarlite_enqueue_script($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !bazaarlite_setting('wip_loadsystem') ) || ( bazaarlite_setting('wip_loadsystem') == "mode_a" ) ) {
		
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $value) {  

					if ( !in_array($value,array(".DS_Store",".","..")) ) { 
						
						if ( !is_dir( $dir . $value) ) { 
							
							wp_enqueue_script( str_replace('.js','',$value), get_template_directory_uri() . $folder . "/" . $value , array('jquery'), FALSE, TRUE ); 
						
						} 
					
					} 

				}  

			} else if ( bazaarlite_setting('wip_loadsystem') == "mode_b" ) {
	
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

if (!function_exists('bazaarlite_enqueue_style')) {

	function bazaarlite_enqueue_style($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !bazaarlite_setting('wip_loadsystem') ) || ( bazaarlite_setting('wip_loadsystem') == "mode_a" ) ) {
			
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $value) {  

					if ( !in_array($value,array(".DS_Store",".","..")) ) { 
						
						if ( !is_dir( $dir . $value) ) { 
							
							wp_enqueue_style( str_replace('.css','',$value), get_template_directory_uri() . $folder . "/" . $value ); 
						
						} 
					
					} 

				}  
			
			} else if ( bazaarlite_setting('wip_loadsystem') == "mode_b" ) {
	
			
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
/* THUMBNAILS */
/*-----------------------------------------------------------------------------------*/         

if (!function_exists('bazaarlite_get_width')) {

	function bazaarlite_get_width() {
		
		if ( bazaarlite_setting('wip_screen3') ):
			return bazaarlite_setting('wip_screen3');
		else:
			return "940";
		endif;
	
	}

}

if (!function_exists('bazaarlite_get_height')) {

	function bazaarlite_get_height() {
		
		if ( bazaarlite_setting('wip_thumbnails') ):
			return bazaarlite_setting('wip_thumbnails');
		else:
			return "600";
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_setup')) {

	function bazaarlite_setup() {

		global $nivoitems, $bxitems;

		if ( ! isset( $content_width ) )
			$content_width = 940;

		$nivoitems = 0;
		$bxitems = 0;
	
		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link','status','chat','image' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		
		add_image_size( 'bazaar-lite-thumbnail', bazaarlite_get_width(), bazaarlite_get_height(), TRUE ); 
		add_image_size( 'bazaar-lite-product', 500,500, TRUE ); 
	
		register_nav_menu( 'main-menu', 'Main menu' );

		load_theme_textdomain('bazaar-lite', get_template_directory() . '/languages');
		
		add_theme_support( 'custom-background', array(
			'default-color' => 'fafafa',
		) );
		
		$require_array = array (
			"/core/classes/",
			"/core/admin/customize/",
			"/core/templates/",
			"/core/scripts/",
			"/core/functions/",
			"/core/metaboxes/",
		);

		foreach ( $require_array as $require_file ) {	
		
			bazaarlite_require($require_file);
		
		}
		
	}

	add_action( 'after_setup_theme', 'bazaarlite_setup' );

}

?>