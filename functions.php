<?php
/**
 * Aileron functions and definitions
 *
 * @package Aileron
 */

if ( ! function_exists( 'aileron_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aileron_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Aileron, use a find and replace
	 * to change 'aileron' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'aileron', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 580,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'aileron-featured-image', 1240, 620, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'aileron' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, comments, gallery and captions
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css', aileron_google_fonts_url() ) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'gallery', 'image', 'link', 'quote', 'video',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aileron_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif; // aileron_setup
add_action( 'after_setup_theme', 'aileron_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aileron_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aileron_content_width', 620 );
}
add_action( 'after_setup_theme', 'aileron_content_width', 0 );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function aileron_widgets_init() {

	// Widget Areas
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'aileron' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'aileron_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aileron_scripts() {

	/**
	 * Enqueue JS files
	 */

	// Superfish Menu
	wp_enqueue_script( 'hover-intent', get_template_directory_uri() . '/js/hover-intent.js', array( 'jquery' ), 'r7', true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.7.4', true );

	// Fitvids
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '1.0.3', true );

	// Comment Reply
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Keyboard image navigation support
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'aileron-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20140127', true );
	}

	// Custom Script
	wp_enqueue_script( 'aileron-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0', true );

	/**
	 * Enqueue CSS files
	 */

	// Bootstrap
	wp_enqueue_style( 'aileron-bootstrap-custom', get_template_directory_uri() . '/css/bootstrap.css' );

	// Fontawesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );

	// Google Fonts
	wp_enqueue_style( 'aileron-fonts', aileron_google_fonts_url(), array(), null );

	// Theme Stylesheet
	wp_enqueue_style( 'aileron-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'aileron_scripts' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
