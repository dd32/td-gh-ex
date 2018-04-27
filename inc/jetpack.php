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
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function bayn_lite_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'bayn_lite_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	add_theme_support( 'jetpack-portfolio' );

	add_theme_support( 'featured-content', array(
		'filter'     => 'bayn_lite_get_featured_posts',
		'max_posts'  => 4,
		'post_types' => array( 'jetpack-portfolio' ),
	) );
}
add_action( 'after_setup_theme', 'bayn_lite_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function bayn_lite_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
