<?php
/**
 * File to sanitize customizer field
 *
 * @package Best_Charity
 * @since 1.0.0
 */

if ( ! function_exists( 'best_charity_sanitize_checkbox' ) ) :

 
    function best_charity_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );

    }

endif;

if ( ! function_exists( 'best_charity_sanitize_select' ) ) :

    function best_charity_sanitize_select( $input, $setting ) {

        $input = sanitize_key( $input );

        $choices = $setting->manager->get_control( $setting->id )->choices;

        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;


function best_charity_sanitize_category($input){
    $output=intval($input);
    return $output;
}

function best_charity_sanitize_dropdown_pages( $page_id, $setting ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );
    
    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}