<?php
/**
 * @package beetech
 */

function beetech_sanitize_number( $input ) {
    $output = intval($input);
     return $output;
}

function beetech_sanitize_switch_option( $input ) {
    $valid_keys = array(
            'show'  => esc_html__( 'Show', 'beetech' ),
            'hide'  => esc_html__( 'Hide', 'beetech' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

function beetech_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}


function beetech_sanitize_menu_switch_option( $input ) {
    $valid_keys = array(
            'parallax'  => esc_html__( 'Parallax', 'beetech' ),
            'default'   => esc_html__( 'Default', 'beetech' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

function beetech_primary_menu_type_callback( $control ) {
    if ( $control->manager->get_setting('primary_menu_type')->value() == 'parallax' ) {
        return true;
    } else {
        return false;
    }
}

function beetech_sanitize_p_menu_type_switch_option( $input ) {
    $valid_keys = array(
            'default'   => esc_html__( 'Default', 'beetech' ),
            'float'     => esc_html__( 'Float Menu', 'beetech' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

function beetech_multiple_categories_sanitize( $values ) {

    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

function beetech_sanitize_enable_switch_option( $input ) {
    $valid_keys = array(
            'enable'    => esc_html__( 'Enable', 'beetech' ),
            'disable'   => esc_html__( 'Disable', 'beetech' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}
