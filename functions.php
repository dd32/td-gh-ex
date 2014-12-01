<?php
/**
 * zenzero functions and definitions
 *
 * @package zenzero
 */

if ( ! function_exists( 'zenzero_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zenzero_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 930; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on zenzero, use a find and replace
	 * to change 'zenzero' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'zenzero', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'normal-post' , 980, 9999);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'zenzero' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'zenzero_custom_background_args', array(
		'default-color' => 'f0f0f0',
		'default-image' => '',
	) ) );
}
endif; // zenzero_setup
add_action( 'after_setup_theme', 'zenzero_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function zenzero_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'zenzero' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'zenzero_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function zenzero_scripts() {
	wp_enqueue_style( 'zenzero-style', get_stylesheet_uri() );
	wp_enqueue_style( 'zenzero-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700');
	wp_enqueue_style( 'zenzero-fontAwesome', get_template_directory_uri() .'/css/font-awesome.min.css');

	wp_enqueue_script( 'zenzero-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'zenzero-custom', get_template_directory_uri() . '/js/jquery.zenzero.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'zenzero-smoothScroll', get_template_directory_uri() . '/js/SmoothScroll.min.js', array('jquery'), '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'zenzero_scripts' );


/* Display a notice that can be dismissed */
add_action('admin_notices', 'zenzero_admin_notice');
function zenzero_admin_notice() {
	global $current_user ;
        $user_id = $current_user->ID;
	if ( ! get_user_meta($user_id, 'zenzero_ignore_notice') ) {
        echo '<div class="updated" style="background: #E9F7DF; border-left: 4px solid #1fa67a;"><p>'; 
        printf(__('Thank you for installing <b>Zenzero</b> WordPress Theme! <a href="%2$s"><b>Click here to go to the Theme Options</b></a>  | <a href="%1$s">Hide Notice</a>'), '?zenzero_nag_ignore=0', 'themes.php?page=theme_options');
        echo "</p></div>";
	}
}

add_action('admin_init', 'zenzero_nag_ignore');
function zenzero_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        if ( isset($_GET['zenzero_nag_ignore']) && '0' == $_GET['zenzero_nag_ignore'] ) {
             add_user_meta($user_id, 'zenzero_ignore_notice', 'true', true);
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
 * Load Zenzero Dynamic.
 */
require get_template_directory() . '/inc/zenzero-dynamic.php';

/**
* Load the Theme Options Page for social media icons
*/
require get_template_directory() . '/inc/theme-options.php';
