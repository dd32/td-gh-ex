<?php
/**
 * Customizer: Sanitization Callbacks
 */

/**
 * Sanitization for checkbox input
 *
 * @param $input string (1 or empty) checkbox state
 * @return $output '1' or false
 */
function igthemes_sanitize_checkbox( $input ) {
    // Boolean check
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

// Sanitization for url field
function igthemes_sanitize_url( $input ) {
    return esc_url_raw( $input );
}
add_filter( 'igthemes_sanitize_url', 'igthemes_sanitize_url' );

// Sanitize a color represented in hexidecimal notation.
function igthemes_sanitize_hex_color( $input ) {
    $hex = sanitize_hex_color( $input );
    return  $hex;
}
// Sanitization for text input
function igthemes_sanitize_text( $input ) {
    global $allowedtags;
    return wp_kses(force_balance_tags( $input , $allowedtags ));
}
// Sanitization for textarea field
function igthemes_sanitize_textarea( $input ) {
    global $allowedposttags;
    $output = wp_kses (force_balance_tags($input, $allowedposttags ));
    return $output;
}
// CSS sanitization callback.
function igthemes_sanitize_css( $input  ) {
	return wp_strip_all_tags( $input  );
}
// Layout sanitization callback
if ( ! function_exists( 'ightemes_sanitize_layout' ) ) {
    function ightemes_sanitize_layout( $input ) {
        $valid = array(
            'full'  => 'full',
            'right' => 'right',
            'left'  => 'left'
            );

        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }
}