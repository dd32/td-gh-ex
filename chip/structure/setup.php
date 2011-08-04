<?php
/** Set the content width based on the theme's design and stylesheet. */
add_action( 'chip_life_setup', 'chip_life_content_width' );
function chip_life_content_width() {
	
	global $content_width;		
	if ( !isset( $content_width ) ) {
		$content_width = 595;
	}

}	

/** 
 * Tell WordPress to run chip_life_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'chip_life_setup' );

if ( ! function_exists( 'chip_life_setup' ) ):
	
	function chip_life_setup() {
	
		/** This theme styles the visual editor with editor-style.css to match the theme style. */
		add_editor_style();
		
		/** Add default posts and comments RSS feed links to <head>. */
		add_theme_support( 'automatic-feed-links' );
		
		/** Add support for a variety of post formats */
		add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );
		
		/** Add support for custom backgrounds */
		add_custom_background();
		
		/** This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images */
		add_theme_support( 'post-thumbnails' );
		
		if ( is_admin() ) :
		
		/** Load up our theme options page and related code. */
		require_once( CHIP_LIFE_CHIP_DIR . '/admin/options.php' );
		add_action( 'admin_init'	, array( 'Chip_Life_Options', 'chip_life_admin_init' ) );
		add_action( 'admin_init'	, array( 'Chip_Life_Options', 'chip_life_init_default' ) );	
		add_action( 'admin_init', array( 'Chip_Life_Options', 'chip_life_admin_styles_fn' ) );
		add_action( 'admin_menu'	, array( 'Chip_Life_Options', 'chip_life_admin_menu' ) );
		
		/** Load Chip Life Meta Boxes */
		require_once( CHIP_LIFE_CHIP_DIR . '/admin/meta-boxes.php' );
		
		endif;					
	
	}

endif; // chiplife_setup
?>