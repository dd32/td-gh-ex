<?php

/**
 * Sanitize the lazy-load media options.
 *
 * @param string $input Lazy-load setting.
 */
function arrival_sanitize_lazy_load_media( $input ) {
	$valid = array(
		'lazyload' => esc_html__( 'Lazy-load images', 'arrival' ),
		'no-lazyload' => esc_html__( 'Load images immediately', 'arrival' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}


/**
 * Sanitize the on/off  options.
 *
 * @param string $input on/off setting.
 */
function arrival_sanitize_enable_disable( $input ) {
	$valid = array(
		'on' => esc_html__( 'Yes', 'arrival' ),
		'off' => esc_html__( 'No', 'arrival' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}


/**
 * Sanitize the main nav layout  options.
 *
 * @param string $input boxed/full setting.
 */
function arrival_sanitize_main_nav( $input ) {
	$valid = array(
		'full' => esc_html__( 'Full', 'arrival' ),
		'boxed' => esc_html__( 'Boxed', 'arrival' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the enable and disable switch controller
 *
 *
 */
function arrival_sanitize_switch( $input ) {
	$valid = array(
		'yes' => esc_html__( 'Yes', 'arrival' ),
		'no' => esc_html__( 'No', 'arrival' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Number sanitization callback
 *
 * @since 1.0.1
 */
function arrival_sanitize_number( $val ) {
	return is_numeric( $val ) ? $val : 0;
}

/**
 * Number with blank value sanitization callback
 *
 * @since 1.2.1
 */
function arrival_sanitize_number_blank( $val ) {
	return is_numeric( $val ) ? $val : '';
}

/**
* Sidebar sanitization callback
*
* @since 1.0.1
*/
function arrival_sanitize_page_sidebar( $input ) {
    $valid_keys = array(
            'right_sidebar' => ARRIVAL_URI . '/assets/images/sidebars/rt.png',
            'no_sidebar' 	=> ARRIVAL_URI . '/assets/images/sidebars/no.png',
            
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}


/**
 * Color sanitization callback
 *
 * @since 1.0.1
 */
function arrival_sanitize_color( $color ) {
    if ( empty( $color ) || is_array( $color ) ) {
        return '';
    }

    // If string does not start with 'rgba', then treat as hex.
	// sanitize the hex color and finally convert hex to rgba
    if ( false === strpos( $color, 'rgba' ) ) {
        return sanitize_hex_color( $color );
    }

    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}


/** Checkbox Sanitization Callback 
 * 
 * Sanitization callback for 'checkbox' type controls.
 * This callback sanitizes $input as a Boolean value, either
 * TRUE or FALSE.
 */
function arrival_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}