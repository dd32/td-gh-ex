<?php
/**
 * Jetpack Compatibility File
 *
 * Please do not edit this file. This file is part of the CyberChimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

/**
 * Add theme support for Infinite Scroll and Social Links
 * See: http://jetpack.me/support/infinite-scroll/
 */
function altitude_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

	add_theme_support( 'social-links', array(
		'facebook', 'twitter', 'google_plus',
	) );
}

add_action( 'after_setup_theme', 'altitude_jetpack_setup' );
