<?php

function semperfi_above_the_fold() {
    
    function semperfi_above_the_fold_html() {
        
        require get_parent_theme_file_path( '/inc/above-the-fold/html.php' );
        
    }

    add_action( 'semperfi_front_page_after_header', 'semperfi_above_the_fold_html' );
    add_action( 'semperfi_index_after_header', 'semperfi_above_the_fold_html' );
    
    
    function semperfi_above_the_fold_css() {
        
        wp_enqueue_style( 'semperfi-above-the-fold' , get_theme_file_uri( '/inc/above-the-fold/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );
        
        // For Customizer Preview, otherwise wouldn't see the changes in preview
        if ( is_customize_preview() ) {
        
            $customized_css = get_theme_mod( 'semperfi_customizer_semperfi-above-the-fold_temporary' );

            $final_customized_css = '';

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
            $semperfi_customizer_semperfi_above_the_fold_finalized = get_theme_mod( 'semperfi_customizer_semperfi-above-the-fold_finalized' );

            if ( !empty( $semperfi_customizer_semperfi_above_the_fold_finalized ) ) {

                wp_add_inline_style( 'semperfi-above-the-fold', $semperfi_customizer_semperfi_above_the_fold_finalized );

            }
            
        }
        
        //print_r( get_theme_mod( 'semperfi_customizer_testing' ) );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_above_the_fold_css', 9 );
    
    
    function semperfi_above_the_fold_customizer_setup() {
        
        require get_parent_theme_file_path( '/inc/above-the-fold/customizer.php' );
    
    }
    
    add_action( 'semperfi_do_action_assemble_customizer_array', 'semperfi_above_the_fold_customizer_setup' );
    
}

add_action( 'functions-hook', 'semperfi_above_the_fold' );