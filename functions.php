<?php
/**
 *	Require Once
 */
require_once( 'includes/customizer.php' );

/**
 *	Define
 */
define( 'GET_CHILDTHEME_DIRECTORY_URI', get_stylesheet_directory_uri() );

/**
 *	Theme Setup
 */
if( !function_exists( 'accountant_theme_setup' ) ) {
	add_action( 'after_setup_theme', 'accountant_theme_setup' );
	function accountant_theme_setup() {
		load_theme_textdomain( 'accountant', get_template_directory() . '/languages' );
		add_theme_support( 'title-tag' );
	}
}

/**
 *	Enqueue Styles
 */
if( !function_exists( 'accountant_enqueue_styles' ) ) {
	add_action( 'wp_enqueue_scripts', 'accountant_enqueue_styles' );
	function accountant_enqueue_styles() {

		$query_args = array(
			'family'	=> 'Lora:400,700,400italic,700italic'
		);
		wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	    wp_enqueue_style( 'google_fonts' );
	}
}

/**
 *	Enqueue Scripts
 */
if( !function_exists( 'accountant_enqueue_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'accountant_enqueue_scripts' );
	function accountant_enqueue_scripts() {
		wp_enqueue_script( 'scripts', GET_CHILDTHEME_DIRECTORY_URI . '/js/scripts.js', array(), '1.0.0', true );
	}
}