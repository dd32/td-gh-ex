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
	
	
function bfront_registers() {
    wp_enqueue_script( 'bfront_customizer_script', get_template_directory_uri() . '/js/custom-customizer.js', array("jquery"), '', true  );

    wp_localize_script( 'bfront_customizer_script', 'bfrontCustomizerObject', array(    
        'pro' => __('View PRO version','bfront')
    ) );
}
add_action( 'customize_controls_enqueue_scripts', 'bfront_registers' );


function bfront_customizer_styles() {

    wp_enqueue_style('bfront_customizer_styles', get_template_directory_uri() . '/css/customize-control.css');

}
add_action('customize_controls_print_styles', 'bfront_customizer_styles');

?>