<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package fortunato
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function semplicemente_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'semplicemente_infinite_scroll_render',
		'footer'    => 'page',
	) );
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'semplicemente_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function semplicemente_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'content', get_post_format() );
	}
}
