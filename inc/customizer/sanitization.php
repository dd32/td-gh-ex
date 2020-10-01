<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * @package Artpop
 * @since Artpop 1.0
 */


// Sanitize boolean for checkbox
function artpop_sanitize_checkbox( $input ) {
	if ( $input == true ) {
		return true;
	} else {
		return '';
	}
}

// Sanitize radio and select
function artpop_sanitize_choices( $input, $setting ) {
	global $wp_customize;
	$control = $wp_customize->get_control( $setting->id );
	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

// Sanitize text: only <strong>, <em>, <b>, <i>, <br> and <a> tags.
function artpop_sanitize_html( $text ) {
	$args = array(
		//formatting
		'strong'	=> array(),
		'em'		=> array(),
		'b'			=> array(),
		'i'			=> array(),
		'br'		=> array()
	);
	return wp_kses( $text, $args );
}

// Sanitize booleans for multiple checkboxes
function artpop_sanitize_multiple_checkboxes( $values ) {
	$multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;
	return ! empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}
