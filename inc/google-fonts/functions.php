<?php

function semperfi_google_fonts() {
    
    
    function semperfi_google_fonts_css() {
        
        // For Customizer Preview, otherwise wouldn't see the changes in preview
        if ( is_customize_preview() ) {
        
            $customized_css = get_theme_mod( 'semperfi_customizer_google_fonts_temporary' );

            $final_customized_css = 'https://fonts.googleapis.com/css?family=';

            if ( is_array( $customized_css ) ) {

                foreach( $customized_css as $key => $value ) {

                    if ( $key != 'fake_key' ) {

                        $final_customized_css .= $value;

                    }

                }

                wp_add_inline_style( 'semperfi-above-the-fold', $final_customized_css );

            }
            
        }
        
        if ( !is_customize_preview() ) {
            
            // For when sheet styles have been customized
            $semperfi_customizer_semperfi_above_the_fold_finalized = get_theme_mod( 'semperfi_customizer_google_fonts' );

            if ( !empty( $semperfi_customizer_semperfi_above_the_fold_finalized ) ) {

                wp_add_inline_style( 'semperfi-google-fonts', $semperfi_customizer_semperfi_above_the_fold_finalized );

            }
            
        }
        
        wp_enqueue_style( 'semperfi-above-the-fold' , get_theme_file_uri( '/inc/above-the-fold/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_google_fonts_css', 9 );
    
}

add_action( 'functions-hook', 'semperfi_google_fonts' );