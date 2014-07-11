<?php
/**
 * WordPress.com-specific functions and definitions.
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Adaption
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 * @return void
 */
function adaption_wpcom_setup() {
	global $themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => 'ffffff',
			'border' => 'eeeeee',
			'text'   => '444444',
			'link'   => 'd72222',
			'url'    => 'd72222',
		);
	}

	// Enable support for WP.com global print style.
	add_theme_support( 'print-style' );
}
add_action( 'after_setup_theme', 'adaption_wpcom_setup' );

/**
* Dequeue if using custom Fonts on Wp.com
*/
function adaption_dequeue_fonts() {
  if ( class_exists( 'TypekitData' ) && class_exists( 'CustomDesign' ) && CustomDesign::is_upgrade_active() ) {
    $customfonts = TypekitData::get( 'families' );

    if ( $customfonts && ( $customfonts['site-title']['id'] || $customfonts['headings']['id'] ) )
      wp_dequeue_style( 'adaption-font' );
  }
}
add_action( 'wp_enqueue_scripts', 'adaption_dequeue_fonts' );

/**
 * Enqueue Wp.com specific scripts
 */
function adaption_wpcom_scripts() {
	wp_enqueue_style( 'adaption-wpcom-style', get_template_directory_uri() . '/css/wpcom.css', '20140626' );
}
add_action( 'wp_enqueue_scripts', 'adaption_wpcom_scripts' );