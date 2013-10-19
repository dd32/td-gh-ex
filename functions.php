<?php

/**
 * Adds support for a theme option.
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}
function flatthirteen_scripts_styles() {
	global $wp_styles;
	// Loads JavaScript file with functionality specific to FlatThirteen.
	wp_enqueue_script( 'flatthirteen-bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '2.3.1', true );
}
add_action( 'wp_enqueue_scripts', 'flatthirteen_scripts_styles' );