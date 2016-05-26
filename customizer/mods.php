<?php
/**
 * Functions used to implement options
 *
 * @package Customizer Library Conica
 */

/**
 * Enqueue Google Fonts Example
 */
function customizer_conica_fonts() {

	// Font options
	$fonts = array(
		get_theme_mod( 'conica-body-font', customizer_library_get_default( 'conica-body-font' ) ),
		get_theme_mod( 'conica-heading-font', customizer_library_get_default( 'conica-heading-font' ) )
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'customizer_conica_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'customizer_conica_fonts' );
