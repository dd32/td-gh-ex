<?php
/**
 * Bar Restaurant Enqueues scripts and styles.
 *
 * @package Bar Restaurant 
 */
function bar_restaurant_scripts() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'bar-restaurant-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-font-ruthie', '//fonts.googleapis.com/css?family=Ruthie', array() );
	wp_enqueue_style( 'google-font-quicksand', '//fonts.googleapis.com/css?family=Quicksand', array() );
	wp_enqueue_style( 'awesome-font', get_template_directory_uri() . '/css/font-awesome'.$suffix.'.css', array() );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap'.$suffix.'.css', array() );
	wp_enqueue_style( 'bar-restaurant-default-style', get_template_directory_uri() . '/css/default.css', array()  );
	wp_enqueue_script('jquery');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap'.$suffix.'.js', array('jquery'), false, true );
	wp_enqueue_script('jquery-masonry');
	wp_enqueue_script( 'bar-restaurant-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'bar_restaurant_scripts' );

require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/breadcumbs.php';