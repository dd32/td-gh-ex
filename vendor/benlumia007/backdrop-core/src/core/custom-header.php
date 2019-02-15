<?php
/**
 * Backdrop Core (custom-header.php)
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General PUblic License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Core;

/**
 * Table of Content
 *
 *  1.0 - Core (Custom Header)
 */

/**
 *  1.0 - Core (Custom Header)
 */
function load_custom_header() {
	/**
	 * Enable add_theme_support( 'custom-header', $args );. This feature allows you to use custom header to display images.
	 */
	$args = array(
		'default-text-color' => 'ffffff',
		'default-image'      => get_theme_file_uri( '/vendor/benlumia007/backdrop-core/src/assets/images/header-image.jpg' ),
		'height'             => 1200,
		'max-width'          => 2000,
		'width'              => 2000,
		'flex-height'        => false,
		'flex-width'         => false,
	);
	add_theme_support( 'custom-header', $args );
	register_default_headers(
		array(
			'header-image' => array(
				'url'           => '%s/vendor/benlumia007/backdrop-core/src/assets/images/header-image.jpg',
				'thumbnail_url' => '%s/vendor/benlumia007/backdrop-core/src/assets/images/header-image.jpg',
				'description'   => esc_html__( 'Header Image', 'auspicious' ),
			),
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\load_custom_header' );

/**
 *  2.0 - Includes (Custom Header Styles)
 */
function load_custom_header_styles() {
	$text_color = get_header_textcolor();
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $text_color ) {
		return;
	}
	$value      = display_header_text() ? sprintf( 'color: #%s', esc_html( $text_color ) ) : 'display: none;';
	$custom_css = "
		.site-title a,
		.site-description {
			{$value}
		}
	";
	wp_add_inline_style( 'backdrop-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\load_custom_header_styles' );

/**
 *  2.0 - Includes (Custom Header Styles)
 */
function load_header_image_inline_style() {
	$header_image = esc_url( get_theme_mod( 'header_image', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/src/assets/images/header-image.jpg' ) ) );
	$custom_css   = "
		.site-header.header-image{
			background: url({$header_image});
			background-repeat: no-repeat;
			background-position: center;
		}
	";
	wp_add_inline_style( 'backdrop-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\load_header_image_inline_style' );
