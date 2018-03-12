<?php

function nnfy_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function nnfy_sanitize_input($input){
	return wp_kses_post( force_balance_tags( $input ) );
}

function nnfy_sanitize_color( $color ) {
    if ( empty( $color ) || is_array( $color ) ) {
        return '';
    }

    return sanitize_hex_color( $color );
}