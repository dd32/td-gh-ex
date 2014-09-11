<?php
/**
 * thebox functions and definitions
 *
 * @package thebox
 * @since thebox 1.0
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */
 
if ( ! isset( $content_width ) )
	$content_width = 600; /* pixels */


/*
 * Load Jetpack compatibility file.
 *
 */
 
require( get_template_directory() . '/inc/jetpack.php' );


/**
 * The Box Theme setup
 *
 */

if ( ! function_exists( 'thebox_setup' ) ) :

function thebox_setup() {
		
	// Custom functions
	require( get_template_directory() . '/inc/extras.php' );

	// Customizer additions
	require( get_template_directory() . '/inc/customizer.php' );
	
	
	// Load the Theme Options Page for social media icons
	require( get_template_directory() . '/inc/theme-options.php' );
	
	// Make theme available for translation. Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'thebox', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// Enable support for Post Thumbnail
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 9999 ); //600 pixels wide (and unlimited height)
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'thebox' )
	) );

	// Enable support for Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif;
add_action( 'after_setup_theme', 'thebox_setup' );


/**
 * Enqueue scripts and styles for the front end.
 *
 */
 
function thebox_scripts() {

	// Add Icons fonts, used in the main stylesheet.
	wp_enqueue_style( 'thebox-icons', get_template_directory_uri() . '/fonts/icon-fonts.css', array(), '1.1' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'thebox-style', get_stylesheet_uri(), array(), '2014-07-24' );
	
	wp_enqueue_script( 'thebox-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'thebox_scripts' );


/**
 * Load Google Fonts
 *
 */
 
function load_fonts() {
	
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Source+Sans+Pro:400,300,400italic,700');
	wp_enqueue_style( 'googleFonts');

}
add_action('wp_print_styles', 'load_fonts');


/**
 * Setup the WordPress core custom background feature.
 *
 */
 
function thebox_register_custom_background() {
	$args = array(
		'default-color' => 'f0f3f5',
		'default-image' => '',
	);

	$args = apply_filters( 'thebox_custom_background_args', $args );
	
	add_theme_support( 'custom-background', $args );
	
}
add_action( 'after_setup_theme', 'thebox_register_custom_background' );


/**
 * Register widgetized area and update sidebar with default widgets
 *
 */
 
function thebox_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Primary', 'thebox' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',	
	) );
	register_sidebar( array(
		'name' => __( 'Footer', 'thebox' ),
		'id' => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'thebox_widgets_init' );


/**
 * Implement the Custom Header feature
 *
 */
 
require( get_template_directory() . '/inc/custom-header.php' );


function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/*
 * Change excerpt text
 *
 */
function thebox_excerpt($num) {
	global $post;
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt)."... <br><a class=\"more-link\" href='" .get_permalink($post->ID) ." '>".__('Read more', 'thebox')." &raquo;</a>";
	echo $excerpt;
    }
