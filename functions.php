<?php
/**
 * blogghiamo functions and definitions
 *
 * @package blogghiamo
 */
 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 794; /* pixels */
}

if ( ! function_exists( 'blogghiamo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blogghiamo_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on blogghiamo, use a find and replace
	 * to change 'blogghiamo' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'blogghiamo', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blogghiamo-normal-post' , 830, 9999);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'blogghiamo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		 'video', 'audio', 'quote', 'link', 'gallery'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blogghiamo_custom_background_args', array(
		'default-color' => 'f0f0f0',
		'default-image' => '',
	) ) );
}
endif; // blogghiamo_setup
add_action( 'after_setup_theme', 'blogghiamo_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function blogghiamo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blogghiamo' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );
}
add_action( 'widgets_init', 'blogghiamo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blogghiamo_scripts() {
	wp_enqueue_style( 'blogghiamo-style', get_stylesheet_uri() );
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css');
	wp_enqueue_style( 'blogghiamo-googlefonts', $protocol .'://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700');
	
	wp_enqueue_script( 'blogghiamo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'blogghiamo-custom', get_template_directory_uri() . '/js/jquery.blogghiamo.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'blogghiamo-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'blogghiamo-smoothScroll', get_template_directory_uri() . '/js/SmoothScroll.min.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	global $wp_scripts;
	wp_enqueue_script( 'blogghiamo-html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.6', false );
	$wp_scripts->add_data( 'blogghiamo-html5shiv', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'blogghiamo_scripts' );

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

/**
 * Load Blogghiamo Dynamic.
 */
require get_template_directory() . '/inc/blogghiamo-dynamic.php';
