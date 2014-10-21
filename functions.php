<?php
/**
 * blogghiamo functions and definitions
 *
 * @package blogghiamo
 */

if ( ! function_exists( 'blogghiamo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blogghiamo_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 794; /* pixels */
	}

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'normal-post' , 830, 9999);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'blogghiamo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
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
		'name'          => __( 'Sidebar', 'blogghiamo' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4></div>',
	) );
}
add_action( 'widgets_init', 'blogghiamo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blogghiamo_scripts() {
	wp_enqueue_style( 'blogghiamo-style', get_stylesheet_uri() );
	wp_enqueue_style( 'blogghiamo-googlefonts', '//fonts.googleapis.com/css?family=Roboto+Slab:300,400,700');
	wp_enqueue_style( 'blogghiamo-fontAwesome', get_template_directory_uri() .'/css/font-awesome.min.css');

	wp_enqueue_script( 'blogghiamo-custom', get_template_directory_uri() . '/js/jquery.blogghiamo.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'blogghiamo-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'blogghiamo-smoothScroll', get_template_directory_uri() . '/js/SmoothScroll.min.js', array(), '1.0', true );
	wp_enqueue_script( 'blogghiamo-scrollToTop', get_template_directory_uri() . '/js/jquery.scrollToTop.min.js', array('jquery'), '1.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blogghiamo_scripts' );

/* Display a notice that can be dismissed */
add_action('admin_notices', 'blogghiamo_admin_notice');
function blogghiamo_admin_notice() {
	global $current_user ;
        $user_id = $current_user->ID;
	if ( ! get_user_meta($user_id, 'blogghiamo_ignore_notice') ) {
        echo '<div class="updated" style="background: #E9F7DF; border-left: 4px solid #1fa67a;"><p>'; 
        printf(__('Thank you for installing <b>Blogghiamo</b> WordPress Theme! <a href="%2$s"><b>Click here to go to the Theme Options</b></a>  | <a href="%1$s">Hide Notice</a>'), '?blogghiamo_nag_ignore=0', 'themes.php?page=theme_options');
        echo "</p></div>";
	}
}

add_action('admin_init', 'blogghiamo_nag_ignore');
function blogghiamo_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        if ( isset($_GET['blogghiamo_nag_ignore']) && '0' == $_GET['blogghiamo_nag_ignore'] ) {
             add_user_meta($user_id, 'blogghiamo_ignore_notice', 'true', true);
	}
}

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

/**
* Load the Theme Options Page for social media icons
*/
require get_template_directory() . '/inc/theme-options.php';
