<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package Bassist
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function bassist_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'type'		=> 'scroll',
		'container'	=> 'main-content',
		'render'	=> 'bassist_infinite_scroll_render',
		'footer'	=> 'container',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'bassist_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function bassist_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
