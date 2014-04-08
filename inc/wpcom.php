<?php
/**
 * WordPress.com-specific functions and definitions.
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package untitled
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 * @return void
 */
function untitled_wpcom_setup() {
	global $themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg' => 'ffffff',
			'border' => 'cccccc',
			'text' => '000000',
			'link' => '999999',
			'url' => '999999',
		);
	}
}
add_action( 'after_setup_theme', 'untitled_wpcom_setup' );
