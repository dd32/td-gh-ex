<?php

/**
 * Sanitization for textarea field
 */
function bfront_sanitize_textarea( $input ) {
    global $allowedposttags;
    $output = wp_kses( $input, $allowedposttags );
    return $output;
}

/**
 * Returns a sanitized filepath if it has a valid extension.
 */
function bfront_sanitize_upload( $upload ) {
    $return = '';
    $fype = wp_check_filetype( $upload );
    if ( $fype["ext"] ) {
        $return = esc_url_raw( $upload );
    }
    return $return;
}

/**
 * validate int.
 */
function bfront_sanitize_int( $input ) {
$return = absint($input);
    return $return;
}

/**
 * validate checkbox option.
 */
function bfront_sanitize_checkbox( $input ) {
        if ( $input == 1 ) { return 1; }
        else { return ''; }
    }

?>