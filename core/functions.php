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

	function bazaarlite_require() {

		$files = array (
			'/core/classes/customize.php',
			'/core/classes/metaboxes.php',
			'/core/admin/customize/customize.php',
			'/core/admin/customize/general.php',
			'/core/templates/after-content.php',
			'/core/templates/before-content.php',
			'/core/templates/bottom_sidebar.php',
			'/core/templates/breadcrumb.php',
			'/core/templates/footer_sidebar.php',
			'/core/templates/header_sidebar.php',
			'/core/templates/masonry.php',
			'/core/templates/media.php',
			'/core/templates/pagination.php',
			'/core/templates/post-formats.php',
			'/core/templates/readmore.php',
			'/core/templates/side_sidebar.php',
			'/core/templates/social_buttons.php',
			'/core/templates/title.php',
			'/core/scripts/infinitescroll.php',
			'/core/scripts/infinitescroll_masonry.php',
			'/core/scripts/masonry.php',
			'/core/functions/functions_generals.php',
			'/core/functions/functions_style.php',
			'/core/functions/functions_templates.php',
			'/core/functions/functions_widgets.php',
			'/core/functions/functions_woocommerce.php',
			'/core/metaboxes/pages.php',
			'/core/metaboxes/posts.php',
			'/core/metaboxes/product.php'
		);
		
		foreach ($files as $file ) {

			require_once( trailingslashit( get_template_directory() ) . $file );

		}
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_enqueue_script')) {

	function bazaarlite_enqueue_script() {

		$files = array (
			'bazaar-lite-jquery.easing' => '/assets/js/jquery.easing.js',
			'bazaar-lite-jquery.imagesloaded' => '/assets/js/jquery.imagesloaded.js',
			'bazaar-lite-jquery.infinitescroll' => '/assets/js/jquery.infinitescroll.js',
			'bazaar-lite-jquery.modernizr' => '/assets/js/jquery.modernizr.js',
			'bazaar-lite-jquery.prettyPhoto' => '/assets/js/jquery.prettyPhoto.js',
			'bazaar-lite-jquery.scrollTo' => '/assets/js/jquery.scrollTo.js',
			'bazaar-lite-jquery.swipebox' => '/assets/js/jquery.swipebox.js',
			'bazaar-lite-jquery.tinynav' => '/assets/js/jquery.tinynav.js',
			'bazaar-lite-jquery.wip' => '/assets/js/jquery.wip.js'
		);
		
		foreach ($files as $name => $file ) {

			wp_enqueue_script( $name, get_template_directory_uri() . $file , array('jquery'), FALSE, TRUE ); 

		}
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLES */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_enqueue_style')) {

	function bazaarlite_enqueue_style() {

		$files = array (
			'bazaar-lite-bootstrap' => '/assets/css/bootstrap.css',
			'bazaar-lite-font-awesome' => '/assets/css/font-awesome.css',
			'bazaar-lite-genericons' => '/assets/css/genericons.css',
			'bazaar-lite-minimal_layout' => '/assets/css/minimal_layout.css',
			'bazaar-lite-prettyPhoto' => '/assets/css/prettyPhoto.css',
			'bazaar-lite-swipebox' => '/assets/css/swipebox.css',
			'bazaar-lite-template' => '/assets/css/template.css',
			'bazaar-lite-woocommerce' => '/assets/css/woocommerce.css'
		);
		
		foreach ($files as $name => $file ) {

			wp_enqueue_style ( $name, get_template_directory_uri() . $file );

		}

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
		
		bazaarlite_require();
		
	}

	add_action( 'after_setup_theme', 'bazaarlite_setup' );

}

?>