<?php 
/*
 * Set up the content width value based on the theme's design.
 */
if ( ! function_exists( 'topmag_setup' ) ) :
function topmag_setup() {
	
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 745;
	}
	/*
	 * Make topmag theme available for translation.
	 */
	load_theme_textdomain( 'topmag' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', topmag_font_url() ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// This theme uses wp_nav_menu() in two locations.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'topmag-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Header menu', 'topmag' )
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
	add_theme_support( 'custom-background', apply_filters( 'topmag_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'topmag_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}

endif; // topmag_setup
add_action( 'after_setup_theme', 'topmag_setup' );

/*** Custom Header ***/
require_once('functions/enqueue-files.php');

/*** Theme Default Setup ***/
require_once('functions/theme-default-setup.php');

/*** Custom Header ***/
require_once('functions/custom-header.php');

/*** Social Media ***/
require_once('functions/ft-setup.php');

/*** Theme Options ***/
require_once('theme-option/fasterthemes.php');