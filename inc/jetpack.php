<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package BBird Under
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */


function bbird_under_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'bbird_under_infinite_scroll_render',
		'footer'    => 'page',
            'type'           => 'click',
	) );
} // end function asd_jetpack_setup
add_action( 'after_setup_theme', 'bbird_under_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function bbird_under_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function asd_infinite_scroll_render

