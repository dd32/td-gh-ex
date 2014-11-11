<?php 
/*
 * Set up the content width value based on the theme's design.
 */
if ( ! function_exists( 'multishop_setup' ) ) :
function multishop_setup() {
	
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 745;
	}
	/*
	 * Make multishop theme available for translation.
	 */
	load_theme_textdomain( 'multishop' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', multishop_font_url() ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// This theme uses wp_nav_menu() in two locations.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'multishop-full-width', 1038, 576, true );
	add_image_size( 'multishop-blog-image', 380, 260, true );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'multishop' ),
		'secondary' => __( 'Footer Secondary menu', 'multishop' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
	add_theme_support( 'custom-background', apply_filters( 'multishop_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'multishop_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}

endif; // multishop_setup
add_action( 'after_setup_theme', 'multishop_setup' );

/**
 * Register Lato Google font for multishop.
 */
function multishop_font_url() {
	$multishop_font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'multishop' ) ) {
		$multishop_font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $multishop_font_url;
}

/*** Enqueue css and js files ***/
require get_template_directory() . '/functions/enqueue-files.php';

/*** Theme Default Setup ***/
require get_template_directory() . '/functions/theme-default-setup.php';

//multishop theme theme option
require get_template_directory() . '/theme-options/fasterthemes.php';

/*** Recent Post Widget ***/
require get_template_directory() . '/functions/recent-post-widget.php';

/*** Breadcrumbs ***/
require get_template_directory() . '/functions/breadcrumbs.php';

/*** Custom Header ***/
require get_template_directory() . '/functions/custom-header.php';

/*** TGM ***/
require get_template_directory() . '/functions/tgm-plugins.php';