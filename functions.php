<?php
/**
 * Bakes And Cakes functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bakes_And_Cakes
 */

if ( ! function_exists( 'bakes_and_cakes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bakes_and_cakes_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bakes And Cakes, use a find and replace
	 * to change 'bakes-and-cakes' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bakes-and-cakes', get_template_directory() . '/languages' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style( 'css/editor-style.css' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'bakes-and-cakes' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bakes_and_cakes_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'bakes_and_cakes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bakes_and_cakes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bakes_and_cakes_content_width', 640 );



	 //Custom Image Sizes
    add_image_size( 'bakes-and-cakes-post-thumb', 60, 60, true);
    add_image_size( 'bakes-and-cakes-feature-thumb', 300, 220, true);
    add_image_size( 'bakes-and-cakes-slider', 1920, 500, true);
    add_image_size( 'bakes-and-cakes-slider-thumb', 63, 46, true);
    add_image_size( 'bakes-and-cakes-image-full', 1139, 498, true);
    add_image_size( 'bakes-and-cakes-image', 750, 400, true);
    add_image_size( 'bakes-and-cakes-popular-post', 80, 70, true);

}
add_action( 'after_setup_theme', 'bakes_and_cakes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bakes_and_cakes_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'bakes-and-cakes' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer First', 'bakes-and-cakes' ),
		'id'            => 'footer-first',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Second', 'bakes-and-cakes' ),
		'id'            => 'footer-second',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Third', 'bakes-and-cakes' ),
		'id'            => 'footer-third',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bakes_and_cakes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bakes_and_cakes_scripts() {
		$bakes_and_cakes_query_args = array(
		'family' => 'Open+Sans:400,400italic,700|Niconne',
		);
	wp_enqueue_style( 'bakes-and-cakes-font-awesome', get_template_directory_uri(). '/css/font-awesome.css' );
    wp_enqueue_style( 'bakes-and-cakes-flexslider-style', get_template_directory_uri(). '/css/flexslider.css' );
    wp_enqueue_style( 'bakes-and-cakes-jquery-sidr-light-style', get_template_directory_uri(). '/css/jquery.sidr.light.css' );
    wp_enqueue_style( 'bakes-and-cakes-lightslider-style', get_template_directory_uri(). '/css/lightslider.css' );
    wp_enqueue_style( 'bakes-and-cakes-google-fonts', add_query_arg( $bakes_and_cakes_query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'bakes-and-cakes-style', get_stylesheet_uri() );

    wp_enqueue_script( 'bakes-and-cakes-jquery', get_template_directory_uri() . '/js/jquery-1.11.3.js', array('jquery'), '2.6.0', true );
    wp_enqueue_script( 'bakes-and-cakes-light-slider', get_template_directory_uri() . '/js/lightslider.js', array(), '20120206', true );
	wp_enqueue_script( 'bakes-and-cakes-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '2.6.0', true );
	wp_enqueue_script( 'bakes-and-cakes-tab', get_template_directory_uri() . '/js/tab.js', array(), '20120206', true );
	wp_enqueue_script( 'bakes-and-cakes-same-height', get_template_directory_uri() . '/js/sameheight.js', array(), '20120206', true );
    wp_enqueue_script( 'bakes-and-cakes-slider-setting', get_template_directory_uri() . '/js/slider-setting.js', array('jquery'), '2.0.8', true );
    wp_register_script( 'bakes-and-cakes-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20151228', true );
	wp_enqueue_script( 'bakes-and-cakes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'bakes-and-cakes-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bakes_and_cakes_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/bakesandcakes-custom-functions.php';


/**
 * Custom functions for meta box.
 */
require get_template_directory() . '/inc/bakes-and-cakes-metabox.php';

/**
*Rara Recent Post Widget.
*
*/ 
require get_template_directory() . '/inc/widget-recent-post.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
