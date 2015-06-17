<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Beach
 */

/**
 * Add support for Jetpack features.
 */
function beach_jetpack_setup() {
	/**
	 * Add theme support for Infinite Scroll.
	 */
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'primary',
	) );

	/**
	 * Add theme support for Responsive Videos.
	 */
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'beach_jetpack_setup' );