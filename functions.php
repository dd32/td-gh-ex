<?php 
/*
 * Set up the content width value based on the theme's design.
 */
$top_mag_options = get_option( 'topmag_theme_options' );

if ( ! function_exists( 'top_mag_setup' ) ) :
function top_mag_setup() {
	
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 745;
	}
	/*
	 * Make topmag theme available for translation.
	 */
	load_theme_textdomain( 'top-mag',get_template_directory_uri(),'/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', top_mag_font_url() ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	
	add_image_size( 'topmag-slider-image', 1100, 300, true );
	add_image_size('topmagthumbnailimage', 300, 200, true);

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Header menu', 'top-mag' )
	) );
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	// Add theme support for Custom hEADER.
	add_theme_support('custom-header', apply_filters('top_mag_custom_header_args', array(
        'default-text-color' => 'fff',
        'width' => 1299,
        'height' => 345,
        'flex-height' => true,
        'header_text' =>true,       
    )));
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
	add_theme_support( 'custom-background', apply_filters( 'top_mag_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'top_mag_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}

endif; // top_mag_setup
add_action( 'after_setup_theme', 'top_mag_setup' );

/*** Enqueue files ***/
require_once('functions/enqueue-files.php');

/*** Theme Default Setup ***/
require_once('functions/theme-default-setup.php');

/***** Theme Customization Option *****/
require_once('functions/customizer.php');