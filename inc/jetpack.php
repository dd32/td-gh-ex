<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package BB Mobile Application
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function bb_mobile_application_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'bb_mobile_application_jetpack_setup' );
