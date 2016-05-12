<?php
/**
 * Customizer: Sanitization Callbacks
 */

// Checkbox sanitization callback.
 
function igthemes_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

// CSS sanitization callback.
function igthemes_sanitize_css( $css ) {
	return wp_strip_all_tags( $css );
}

// HEX Color sanitization callback .
function igthemes_sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
        }

		// 3 or 6 hex digits, or the empty string.
		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
        }

		return null;
	}

// HTML sanitization callback.
// - Control: text, textarea
function igthemes_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}

// Image sanitization callback.
function igthemes_sanitize_image( $image, $setting ) {

	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );

	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );

	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}

// No-HTML sanitization callback. 
// - Control: text, textarea, password
function igthemes_sanitize_nohtml( $nohtml ) {
	return wp_filter_nohtml_kses( $nohtml );
}

// Number sanitization callback.
function igthemes_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

// URL sanitization callback.
function igthemes_sanitize_url( $url ) {
	return esc_url_raw( $url );
}

// LAyout sanitization callback
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