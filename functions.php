<?php
/**
 * Beta functions and definitions
 *
 * @package Beta
 */

if ( ! function_exists( 'beta_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function beta_theme_setup() {
	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();
	
	/* Load the primary menu. */
	remove_action( "{$prefix}_before_header", 'omega_get_primary_menu' );
	remove_action( "{$prefix}_header", 'omega_site_description' );
	add_action( "{$prefix}_header_right", 'omega_get_primary_menu' );

	add_theme_support( 'omega-footer-widgets', 3 );

}
endif; // beta_theme_setup

add_action( 'after_setup_theme', 'beta_theme_setup', 11 );

/**
 * Enqueue scripts and styles
 */
function beta_scripts() {
	wp_enqueue_style('lato-font', 'http://fonts.googleapis.com/css?family=Ubuntu:400,700');
}

add_action( 'wp_enqueue_scripts', 'beta_scripts' );