<?php
/**
 * Puro functions and definitions.
 *
 * @package puro
 * @since puro 1.0
 * @license GPL 2.0
 */


// Load the theme specific files
include get_template_directory() . '/inc/extras.php';
include get_template_directory() . '/inc/jetpack.php';
include get_template_directory() . '/inc/template-tags.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 771; /* pixels */
}

if ( ! function_exists( 'puro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function puro_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'puro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'puro' ),
		'social' => __( 'Social Network Icon Menu', 'puro' )
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

}
endif; // puro_setup
add_action( 'after_setup_theme', 'puro_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function puro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'puro' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'puro' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	
}
add_action( 'widgets_init', 'puro_widgets_init' );

/**
 * Count the footer widgets and add the count to the widget class.
 */
function puro_footer_widgets_params($params) {

    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'sidebar-2' ) {

        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);

        $params[0]['before_widget'] = str_replace('class="', 'class="widget-count-' . floor($sidebar_widgets) . ' ', $params[0]['before_widget']);
    }

    return $params;
}
add_filter('dynamic_sidebar_params','puro_footer_widgets_params');

/**
 * Register bundled scripts.
 */
function puro_register_scripts(){
	wp_register_script( 'puro-fitvids' , get_template_directory_uri().'/js/jquery.fitvids.min.js' , array('jquery'), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'puro_register_scripts' , 5);

/**
 * Enqueue scripts and styles.
 */
function puro_scripts() {
	wp_enqueue_style( 'puro-style', get_stylesheet_uri(), array() );

	wp_enqueue_script( 'puro-main' , get_template_directory_uri().'/js/jquery.theme-main.min.js' , array('jquery', 'puro-fitvids') );

	wp_enqueue_script( 'puro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), true );

	wp_enqueue_script( 'puro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), true );

	wp_enqueue_style( 'puro-font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css', array(), '4.0.3' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'puro_scripts' );