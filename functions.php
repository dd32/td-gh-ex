<?php

// Global variables define
define('WEBRITI_TEMPLATE_DIR_URI' , get_template_directory_uri() );	
define('WEBRITI_TEMPLATE_DIR' , get_template_directory() );
define('WEBRITI_THEME_FUNCTIONS_PATH' , WEBRITI_TEMPLATE_DIR.'/functions');
define( 'WEBR_FRAMEWORK_DIR', get_template_directory_uri().'/functions' );



// Theme functions file including
require( WEBRITI_THEME_FUNCTIONS_PATH . '/default_data.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/scripts/script.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/webriti_nav_walker.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/sidebars.php');




require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/banner-settings.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/general-settings.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/home-page.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/meta-box/metabox.php');
require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tag.php');



if ( ! function_exists( 'spasalon_setup' ) ) :
function spasalon_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'spasalon', get_template_directory() . '/lang' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	// supports featured image
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'spasalon' ),
		'footer'  => __( 'Footer Menu', 'spasalon' ),
	) );
	
	// Set the content_width with 900
    if ( ! isset( $content_width ) ) $content_width = 900;
	
	the_tags();
	
	// woocommerce support
	add_theme_support( 'woocommerce' );
	
}
endif; // spasalon_setup
add_action( 'after_setup_theme', 'spasalon_setup' );


// custom css 
function spasalon_custom_css_function(){
	
	$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
	
	echo '<style>';
	echo $current_options['spa_custom_css'];
	echo '</style>';
}
add_action('wp_head','spasalon_custom_css_function');


// excerpt length
function spasalon_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'spasalon_excerpt_length', 999 );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
	
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');