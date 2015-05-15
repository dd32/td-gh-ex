<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package aaron
 */

/**
 * Set up the WordPress core custom header feature.
 *
 */
function aaron_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'aaron_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/images/header.jpg',
		'default-text-color'     => 'ffffff',
		'flex-height'            => true,
		'flex-width'             => true,
		'width'                  => 1920,
		'height'                 => 1200,
		'wp-head-callback'       => 'aaron_customize_css',
		'admin-head-callback'    => 'aaron_admin_header_style',
		'admin-preview-callback' => 'aaron_admin_header_image',
	)
	) );
}

add_action( 'after_setup_theme', 'aaron_custom_header_setup' );

