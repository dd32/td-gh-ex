<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Aperture
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function aperture_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
    		'type'           => 'scroll',
			'footer'    	 => false,
    		'footer_widgets' => 'footer-sidebar',
    		'container'      => 'main',
    		'wrapper'        => true,
    		'render'         => false,
    		'posts_per_page' => false,
) );
}
add_action( 'after_setup_theme', 'aperture_jetpack_setup' );
