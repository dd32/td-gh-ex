<?php
/**
 * Jetpack Compatibility File.
 *
 * @package Azalea
 */

/**
 * Jetpack setup function.
 */
function jgtazalea_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'click',
		'container' => 'main',
		'render'    => 'jgtazalea_infinite_scroll_render',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'jgtazalea_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function jgtazalea_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}
