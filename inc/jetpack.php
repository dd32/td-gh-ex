<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package gump
 * @since gump 1.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function gump_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'gump_jetpack_setup' );
