<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package star
 */

/**
 * Set up the WordPress core custom header feature.
 *
 */
function star_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'star_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1800,
		'height'                 => 1150,
		'flex-height'            => false,
		'wp-head-callback'       => 'star_customize_css',
		'admin-head-callback'    => 'star_admin_header_style',
		'admin-preview-callback' => 'star_admin_header_image',
	)
	) );
}

add_action( 'after_setup_theme', 'star_custom_header_setup' );

