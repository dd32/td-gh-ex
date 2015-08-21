<?php
/**
 *	Require Once
 */
require_once( 'includes/customizer.php' );

/**
 *	Theme Setup
 */
if( !function_exists( 'accountantlaw_theme_setup' ) ) {
	add_action( 'after_setup_theme', 'accountantlaw_theme_setup' );
	function accountantlaw_theme_setup() {
		load_theme_textdomain( 'accountantlaw', get_template_directory() . '/languages' );
		add_theme_support( 'title-tag' );
	}
}

/**
 *	Enqueue Styles
 */
if( !function_exists( 'accountantlaw_enqueue_styles' ) ) {
	add_action( 'wp_enqueue_scripts', 'accountantlaw_enqueue_styles' );
	function accountantlaw_enqueue_styles() {

		$query_args = array(
			'family'	=> 'Lora:400,700,400italic,700italic'
		);
		wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), '1.0.9', 'all' );

	    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0.9', 'all' );
	    wp_enqueue_style( 'google_fonts', array(), '1.0.9', 'all' );
	}
}

/**
 *	Enqueue Scripts
 */
if( !function_exists( 'accountantlaw_enqueue_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'accountantlaw_enqueue_scripts' );
	function accountantlaw_enqueue_scripts() {
		wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '1.0.9', true );
	}
}