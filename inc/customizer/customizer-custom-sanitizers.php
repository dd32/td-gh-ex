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

        }
        
    } else {
        
        return esc_url( $setting->default );
    
    }
    
}


// SemperFi sanitize font into a condensed theme mod so it can be inlined to the appropriate stylesheet handle
function semperfi_sanitize_font( $input , $setting ) {
    
    $input = esc_html( $input );
        
        
    $attrs = $setting->manager->get_control( $setting->id )->input_attrs;


    $stylesheet_handle = $attrs['stylesheet_handle'];

    $css = $attrs['css'];


    $edit_font_name = preg_replace( '/[^a-zA-Z0-9]+/' , ' ' , $input );
    
    $css_modified .= "   @import url('https://fonts.googleapis.com/css?family=" . $input . "');\n";

    $css_modified .= str_replace( "$" , $edit_font_name , $css );

    $css_modified .= "; }\n";


    $customized_css = get_theme_mod( 'semperfi_customizer_' . $stylesheet_handle . '_temporary' );
    
    $semperfi_theme_customized_sheet_handles = get_theme_mod( 'semperfi_theme_customize_sheet_handles' );
    
    
    if ( $input != $setting->default ) {
        
        
        // Quick array check and fix
        if ( !is_array( $customized_css ) ) {
            
            $customized_css = array();
            
        }
        
        
        // Check for Key, don't want duplicate entries
        if ( array_key_exists( $css , $customized_css ) ) {

            $customized_css[$css] = $css_modified;

        } else {

            $customized_css = $customized_css + array( $css => $css_modified );

        }
        

        // set a temporary holder for customizer, and eventually use for live code
        set_theme_mod( 'semperfi_customizer_' . $stylesheet_handle . '_temporary' , $customized_css );
        
        
        return $input;
        
    } else {
            
        unset( $customized_css[$css] );
        
        set_theme_mod( 'semperfi_customizer_' . $stylesheet_handle . '_temporary' , $customized_css );
        
        return esc_html( $setting->default );
    
    }
    
}


// SemperFi sanitize css into a condensed theme mod so it can be inlined to the appropriate stylesheet handle
function semperfi_sanitize_css( $input , $setting ) {
    
    $input = esc_html( $input );
        
        
    $attrs = $setting->manager->get_control( $setting->id )->input_attrs;


    $stylesheet_handle = $attrs['stylesheet_handle'];

    $css = $attrs['css'];


    $css_modified = str_replace( "$" , $input , $css );

    $css_modified = str_replace( "@" , abs( $input ) , $css_modified );

    $css_modified .= "; }\n";


    $customized_css = get_theme_mod( 'semperfi_customizer_' . $stylesheet_handle . '_temporary' );
    
    $semperfi_theme_customized_sheet_handles = get_theme_mod( 'semperfi_theme_customize_sheet_handles' );
    
    
    if ( $input != $setting->default ) {
        
        
        // Quick array check and fix
        if ( !is_array( $customized_css ) ) {
            
            $customized_css = array();
            
        }
        
        
        // Check for Key, don't want duplicate entries
        if ( array_key_exists( $css , $customized_css ) ) {

            $customized_css[$css] = $css_modified;

        } else {

            $customized_css = $customized_css + array( $css => $css_modified );

        }
        

        // set a temporary holder for customizer, and eventually use for live code
        set_theme_mod( 'semperfi_customizer_' . $stylesheet_handle . '_temporary' , $customized_css );
        
        
        return $input;
        
    } else {
            
        unset( $customized_css[$css] );
        
        set_theme_mod( 'semperfi_customizer_' . $stylesheet_handle . '_temporary' , $customized_css );
        
        return esc_html( $setting->default );
    
    }
    
}