<?php
/**
 * Semper Fi Lite: Customizer-CSS-Sanitizers
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 74
 */


// SemperFi image sanitize to the correct dimentions
function semperfi_sanitize_image( $input , $setting ) {
    
    $input = esc_url( $input );
    
    if ( $input != $setting->default ) {
    
        $attrs = $setting->manager->get_control( $setting->id )->input_attrs;

        $extension = pathinfo( $input , PATHINFO_EXTENSION );
    
        if ( $extension == 'jpg' ) {

            return wp_get_attachment_image_src( attachment_url_to_postid( $input ) , $attrs['img_size'] )[0];

        } elseif ( $extension == 'jpeg' ) {

            return wp_get_attachment_image_src( attachment_url_to_postid( $input ) , $attrs['img_size'] )[0];

        } elseif ( $extension == 'png' ) {

            return wp_get_attachment_image_src( attachment_url_to_postid( $input ) , $attrs['img_size'] )[0];

        } elseif ( $extension == 'gif' ) {

            return $input;

        } else {
        
            return esc_url( $setting->default );

        }
        
    } else {
        
        return esc_url( $setting->default );
    
    }
    
}


// SemperFi select sanitize to only options in the select
function semperfi_sanitize_select( $input, $setting ) {

    // Remove all HTML
    $input = wp_filter_nohtml_kses( $input );

    // List of all options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // Return in Key or return the default
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );            

}

// SemperFi radio box sanitization
function semperfi_sanitize_radio( $input, $setting ){

    // Remove all HTML
    $input = wp_filter_nohtml_kses( $input );

    // List of all options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // Return in Key or return the default
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                

}