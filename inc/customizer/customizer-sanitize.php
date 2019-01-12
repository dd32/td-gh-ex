<?php

/**
 * Sanitize the lazy-load media options.
 *
 * @param string $input Lazy-load setting.
 */
function arrival_sanitize_lazy_load_media( $input ) {
	$valid = array(
		'lazyload' => __( 'Lazy-load images', 'arrival' ),
		'no-lazyload' => __( 'Load images immediately', 'arrival' ),
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
		'on' => __( 'Yes', 'arrival' ),
		'off' => __( 'No', 'arrival' ),
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
		'full' => __( 'Full', 'arrival' ),
		'boxed' => __( 'Boxed', 'arrival' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the menu navigation type
 *
 * @param string $input boxed/full setting.
 */
function arrival_sanitize_one_page_nav( $input ) {
	$valid = array(
		'yes' => __( 'Yes', 'arrival' ),
		'no' => __( 'No', 'arrival' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}