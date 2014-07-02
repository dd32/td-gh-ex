<?php
/**
 * WordPress.com-specific functions and definitions.
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Aperture
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 * @return void
 */
function aperture_wpcom_setup() {
	global $themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => '000000',
			'border' => '',
			'text'   => '303030',
			'link'   => 'ff7f00',
			'url'    => '',
		);
	}
}
add_action( 'after_setup_theme', 'aperture_wpcom_setup' );
