<?php
/**
 * Chip Life functions and definitions
 *
 * @package Chip Life
 */

if ( ! function_exists( 'chip_life_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function chip_life_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Chip Life, use a find and replace
	 * to change 'chip-life' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'chip-life', get_template_directory() . '/languages' );

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
	 * @see https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 400,
		'width'       => 560,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// Theme Image Sizes
	add_image_size( 'chip-life-featured', 756, 472, true );

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array (
		'header-menu' => esc_html__( 'Header Menu', 'chip-life' ),
	) );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array ( 'css/editor-style.css', chip_life_fonts_url() ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array (
		'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'chip_life_custom_background_args', array (
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
endif; // chip_life_setup
add_action( 'after_setup_theme', 'chip_life_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chip_life_content_width() {
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'chip_life_content_width', 756 );
}
add_action( 'after_setup_theme', 'chip_life_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function chip_life_register_sidebars() {

	// Widget Areas
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'chip-life' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'chip_life_register_sidebars' );

/**
 * Enqueue scripts and styles.
 */
function chip_life_scripts() {

	/**
	 * Enqueue JS files
	 */

	// Enquire
	wp_enqueue_script( 'enquire', get_template_directory_uri() . '/js/enquire.js', array( 'jquery' ), '2.1.2', true );

	// Fitvids
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '1.1', true );

	// Superfish Menu
	wp_enqueue_script( 'hover-intent', get_template_directory_uri() . '/js/hover-intent.js', array( 'jquery' ), 'r7', true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.7.5', true );

	// Comment Reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Keyboard image navigation support
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'chip-life-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20140127', true );
	}

	// Custom Script
	wp_enqueue_script( 'chip-life-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0', true );

	/**
	 * Enqueue CSS files
	 */

	// Bootstrap
	wp_enqueue_style( 'chip-life-bootstrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.css' );

	// Font Awesome 5
	// For Reviewer and Others: Unique Handle `font-awesome-5` is required to avoid the conflict with Font Awesome 4+ library.
	// Font Awesome 5+ library is totally rewritten and is different from Font Awesome 4+ library.
	wp_enqueue_style( 'font-awesome-5', get_template_directory_uri() . '/css/fontawesome-all.css' );

	// Google Fonts
	wp_enqueue_style( 'chip-life-fonts', chip_life_fonts_url(), array(), null );

	// Theme Stylesheet
	wp_enqueue_style( 'chip-life-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'chip_life_scripts' );

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
