<?php
/**
 * Semper Fi Lite: Customizer-CSS-Sanitizers
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 74
 */


// SemperFi sanitize the image to the correct dimentions
function semperfi_sanitize_image( $input , $setting )  {
    
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
