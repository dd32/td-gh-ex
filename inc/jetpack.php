<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Araiz
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function araiz_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'araiz_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function araiz_jetpack_setup
add_action( 'after_setup_theme', 'araiz_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function araiz_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function araiz_infinite_scroll_render
