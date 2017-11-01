<?php

function azonbooster_get_option( $setting, $default = '' ) {

	$options = get_option( AzonBooster::get_theme_slug() . '_basic_opts_name', array() );

	$value = $default;

    if ( isset( $options[ $setting ] ) ) {
        $value = $options[ $setting ];
    }
    return $value;
}