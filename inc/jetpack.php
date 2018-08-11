<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package Bayn Lite
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/responsive-videos/
 */
function bayn_lite_jetpack_setup() {

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	add_theme_support( 'featured-content', array(
		'filter'     => 'bayn_lite_get_featured_posts',
		'max_posts'  => 4,
	) );
}
add_action( 'after_setup_theme', 'bayn_lite_jetpack_setup' );
