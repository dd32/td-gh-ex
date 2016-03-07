<?php
/**
 * Avien Light functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Avien_Light
 */

if ( ! function_exists( 'avien_light_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function avien_light_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Avien Light, use a find and replace
	 * to change 'avien-light' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'avien-light', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// WooCommerce compatibility tag
	add_theme_support( 'woocommerce' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style( "inc/css/editor-style.css" );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'avien-light' ),
		'footer' => esc_html__( 'Footer Menu', 'avien-light' ),
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
	add_theme_support( 'custom-background', apply_filters( 'avien-light_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // avien-light_setup
add_action( 'after_setup_theme', 'avien_light_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function avien_light_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'avien_light_content_width', 640 );
}
add_action( 'after_setup_theme', 'avien_light_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function avien_light_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'avien-light' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar(array(
	  'name' => __( 'Footer', 'avien-light' ),
	  'id' => 'bottom',
	  'description' => __( 'Widgets in this area will be shown before footer area.' , 'avien-light'),
	  'before_title' => '<h3>',
	  'after_title' => '</h3>',
	  'before_widget' => '<div class="col-lg-3 footer_widgets">',
	  'after_widget' => '</div>'
	  )
	);

	register_sidebar(array(
	  'name' => __( 'Header Right', 'avien-light' ),
	  'id' => 'header-right',
	  'description' => __( 'Widgets in this area will be shown on header right area.' , 'avien-light'),
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '',
	  'after_widget' => ''
	  )
	);

	register_sidebar(array(
	  'name' => __( 'Header Left', 'avien-light' ),
	  'id' => 'header-left',
	  'description' => __( 'Widgets in this area will be shown on header left area.' , 'avien-light'),
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '',
	  'after_widget' => ''
	  )
	);
}
add_action( 'widgets_init', 'avien_light_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function avien_light_scripts() {
	wp_enqueue_style( 'avien-light-style', get_stylesheet_uri() );
	wp_enqueue_style ( 'bootstrap',   get_template_directory_uri() . '/inc/css/bootstrap.css');
    wp_enqueue_style ( 'fontawesome',     get_template_directory_uri() . '/inc/css/font-awesome.css');

	wp_enqueue_script( 'avien-light-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'avien-light-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script ( 'avien-light-bootstrap-js',   get_template_directory_uri() . '/inc/js/bootstrap.js', array('jquery'));
	wp_enqueue_script ( 'avien-light-fitvids', 	get_template_directory_uri() . '/inc/js/jquery.fitvids.js', array(), '1.3', true );
	wp_enqueue_script ( 'avien-light-easing', 		get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array(), '1.3', true );
	wp_enqueue_script ( 'avien-light-respond', 		get_template_directory_uri() . '/inc/js/respond.js', array(), '1.4.2', true );
	wp_enqueue_script ( 'avien-light-framework-js',   get_template_directory_uri() . '/inc/js/framework.js', array(), '3.3', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'avien_light_scripts' );

function avien_light_slider_script() {
	if ( is_home() ) {
		wp_enqueue_style( 'avien-light-owl-carousel', get_template_directory_uri() . '/inc/css/owl.carousel.css');
		wp_enqueue_style( 'avien-light-owl-transitions', get_template_directory_uri() . '/inc/css/owl.transitions.css');
		wp_enqueue_script( 'avien-light-owl-carousel-js', get_template_directory_uri() . '/inc/js/owl.carousel.js', array(), '1.3.3', true );
		wp_enqueue_script( 'avien-light-owl-slider-js', get_template_directory_uri() . '/inc/js/slider.js', array(), '1.3.3', true );
	}
}

add_action('wp_enqueue_scripts', 'avien_light_slider_script', 15, 0);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
