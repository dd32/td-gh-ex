<?php
/**
 * astrology Enqueues scripts and styles.
 *
 * @package astrology 
 */
function AstrologyScripts() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'astrology-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i', array() );
	wp_enqueue_style( 'awesome-font', get_template_directory_uri() . '/css/font-awesome'.$suffix.'.css', array() );
	wp_enqueue_style( 'bootstrape-css', get_template_directory_uri() . '/css/bootstrap'.$suffix.'.css', array() );
	wp_enqueue_style( 'astrology-default-style', get_template_directory_uri() . '/css/style.css', array()  );
	wp_enqueue_script('jquery');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
	wp_enqueue_script( 'bootstrape-js', get_template_directory_uri() . '/js/bootstrap'.$suffix.'.js', array('jquery'), false, true );
	wp_enqueue_script( 'astrology-js', get_template_directory_uri() . '/js/astrology-custom.js', array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'AstrologyScripts' );