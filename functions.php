<?php
/**
 * bassist functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bassist
 */

/**
 * Bassist only works in WordPress 4.9 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.9', '<' ) ) {
	require get_parent_theme_file_path( '/inc/back-compat.php' );
}

if ( ! function_exists( 'bassist_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bassist_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bassist, use a find and replace
	 * to change 'bassist' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bassist', get_parent_theme_file_path( '/languages'  ) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bassist' ),
		'social' => esc_html__( 'Social Links Menu', 'bassist' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * Add support for selective refresh of widget sidebars in the Customizer.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'css/font-awesome.css' ) );

	// Add theme support for Custom Header
	add_theme_support( 'custom-header', array(
		'default-image'          => '',
		'default-text-color' => '000000',
		'width' => 1920,
		'height' => 112,
		'header-text' => true,
		'wp-head-callback' => 'bassist_header_style',
		) );

	// Add theme support for Custom Background
	add_theme_support( 'custom-background', array(
		'default-color' => 'fafafa',
		) );

	// Add theme support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width'       => 450,
		'height'      => 150,
		'flex-width'  => true,
		'flex-height' => false,
		) );
}
endif;
add_action( 'after_setup_theme', 'bassist_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bassist_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bassist_content_width', 1200 );
}
add_action( 'after_setup_theme', 'bassist_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bassist_widgets_init() {
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar', 'bassist' ),
		'id'			=> 'sidebar-1',
		'description'	=> esc_html__( 'Add widgets here.', 'bassist' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h2 class="widget-title">',
		'after_title'	=> '</h2>',
	) );
}
add_action( 'widgets_init', 'bassist_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bassist_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'bassist-style', get_parent_theme_file_uri( 'style.css' ), array(), '1.0.7' );
	wp_enqueue_style( 'font-awesome', get_parent_theme_file_uri( '/css/font-awesome.css' ), array(), '4.5.0' );
	wp_enqueue_script( 'bassist-scripts', get_parent_theme_file_uri( '/js/functions.js' ), array('jquery'), '20200519', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bassist_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Bassist 1.0
 * @param array $classes Classes for the body element.
 * @return array
 */
function bassist_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of front-page if a static front page is selected.
	if ( 'page' === get_option( 'show_on_front' ) && is_front_page() ) {
		$classes[] = 'front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'bassist_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since Bassist 1.0.2
 *
 * @param array $classes Classes for the post element.
 * @return array (Maybe) filtered post classes.
 */
function bassist_post_classes( $classes ) {
	// Adds a class of post-format to post with special formats (video, image, chat, aside, etc).
	if ( ! get_post_format() ) {
		$classes[] = 'standard';
	}

	return $classes;
}
add_filter( 'post_class', 'bassist_post_classes' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Color calculations.
 */
require get_parent_theme_file_path( '/inc/color-calculations.php' );

/**
 * Load Jetpack compatibility file.
 */
require get_parent_theme_file_path( '/inc/jetpack.php' );
