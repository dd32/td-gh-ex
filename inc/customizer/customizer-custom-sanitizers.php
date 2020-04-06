<?php
/**
 * Semper Fi Lite: Customizer-CSS-Sanitizers
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 74
 */


// semper_fi_lite image sanitize to the correct dimentions
function semper_fi_lite_sanitize_image( $input , $setting ) {
    
    $input = esc_url( $input );
    
    if ( $input != $setting->default ) {

        $extension = pathinfo( $input , PATHINFO_EXTENSION );
    
        if ( $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' ) {

            return $input;

        } else {
        
            return esc_url( $setting->default );

        }
        
    } else {
        
        return esc_url( $setting->default );
    
    }
    
}


// semper_fi_lite select sanitize to only options in the select
function semper_fi_lite_sanitize_select( $input, $setting ) {

    // Remove all HTML
    $input = wp_filter_nohtml_kses( $input );

    // List of all options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // Return in Key or return the default
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );            

}

// semper_fi_lite radio box sanitization
function semper_fi_lite_sanitize_radio( $input, $setting ){

    // Remove all HTML
    $input = wp_filter_nohtml_kses( $input );

    // List of all options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // Return in Key or return the default
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                

}