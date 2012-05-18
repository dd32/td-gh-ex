<?php
if ( ! function_exists( 'ci_initial_setup' ) ):
/**
 * Simple Catch functions and definitions
 * 
 * Sets up theme defaults and registers support for various WordPress features such as post thumbnails, navigation menus, and the like.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override ci_initial_setup() in a child theme, add your own ci_initial_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menu() To add support for navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @package WordPress
 * @subpackage Simple Catch
 * @since Simple Catch 1.0
 */
	function ci_initial_setup() {

		/* Make Simple Catch available for translation.
		 * Translations can be added to the /languages/ directory.
		 * If you're building a theme based on Simple Catch, use a find and replace
		 * to change 'simplecatch' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'simplecatch' );
		
		// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
		add_theme_support( 'post-thumbnails' );
		
		/* We'll be using post thumbnails for custom features images on posts under blog category.
		 * Larger images will be auto-cropped to fit.
		 */
		set_post_thumbnail_size( 210, 210 );
		
		// Add Simple Catch's custom image sizes
		add_image_size( 'featured', 210, 210, true); // uses on homepage featured image
		add_image_size( 'slider', 976, 313, true); // uses on Featured Slider on Homepage Header
		
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' ); 
			
		// remove wordpress version from header for security concern
		remove_action( 'wp_head', 'wp_generator' );
	 
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', 'Primary Menu' );
	} // ci_initial_setup
endif;

// Tell WordPress to run ci_initial_setup() when the 'after_setup_theme' hook is run.
add_action( 'after_setup_theme', 'ci_initial_setup' );

/**
 * Set content width for Media Upload Size i.e. Max Image Size
 */
if ( ! isset( $content_width ) ):
	$content_width = 642;
endif;
/**
 * Include additonal functionality
 *
 * @package WordPress
 * @subpackage Simple Catch
 * @since Simple Catch 1.0
 */
// Include sort_query_by_post_in.php 
include_once( 'functions/sort_query_by_post_in.php' );

// Load up overall function related code.
include_once( 'functions/ci_functions.php' );

// Load up theme options page and related code.
include_once( 'functions/panel/ci_theme_options.php' );

// Grab Catch Themes's Custom Widgets.
include_once( 'functions/ci_widget_custom_tag.php' );

/**
 * Register our sidebars and widgetized areas.
 *
 * uses register_sidebar
 * returns the id
 */
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array( 
		'name'          => __( 'sidebar', 'simplecatch' ),
		'id'            => 'sidebar',
		'description'   => __( 'sidebar', 'simplecatch' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><hr/>' 
	) ); 	
}

?>