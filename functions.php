<?php
/**
 * Skylark functions and definitions
 *
 * @package Skylark
 * @since Skylark 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since skylark 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'skylark_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since skylark 1.0
 */
function skylark_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on skylark, use a find and replace
	 * to change 'skylark' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'skylark', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	// Enable post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 50, 50, true );
	add_image_size( 'single', 664, 170, true );
	add_image_size( 'medium-thumbnail', 664, 400, true );
	add_image_size( 'portfolio', 680, 476, true );
	add_image_size( 'extra-small', 32, 32, true );
	add_image_size( 'header', 504, 362, true );
	add_image_size( '4c-thumbnail', 210, 159, true );
	add_image_size( '3c-thumbnail', 280, 207, true );
	add_image_size( '2c-thumbnail', 440, 321, true );
	add_image_size( 'small-thumbnail', 213, 136, true );
	
	/**
	 * Custom Post Types - custom functions
	 */
	require( get_template_directory() . '/inc/extra-functions.php' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skylark' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
	
	add_editor_style();
}
endif; // skylark_setup
add_action( 'after_setup_theme', 'skylark_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since skylark 1.0
 */
function skylark_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'skylark' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'skylark_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function skylark_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', 'jquery', '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'skylark_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
