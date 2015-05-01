<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Atomic
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function atomic_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'atomic_jetpack_setup' );
