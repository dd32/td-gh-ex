<?php

function semperfi_above_the_fold() {
    
    function semperfi_above_the_fold_html() {
        
        require get_parent_theme_file_path( '/inc/above-the-fold/html.php' );
        
    }

    add_action( 'semperfi_front_page_after_header', 'semperfi_above_the_fold_html' );
    //add_action( 'semperfi_index_after_header', 'semperfi_above_the_fold_html' );
    
    
    function semperfi_above_the_fold_css() {
        
        wp_enqueue_style( 'semperfi-above-the-fold' , get_theme_file_uri( '/inc/above-the-fold/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );
        
        // Get Array for CSS Generation
        require get_parent_theme_file_path( '/inc/above-the-fold/customizer.php' );
        
        // Set to a standard name to be passed to
        $semperfi_customizer_inline_this_css = $semperfi_above_the_fold_customizer_options_array;
        
        // Generate CSS Code for wp_add_inline_stye
        require get_parent_theme_file_path( '/inc/customizer/customizer-inline-css.php' );
        
    }
        
    
    add_action( 'semperfi_404_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_above_the_fold_css', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_above_the_fold_css', 9 );
    
    
    function semperfi_above_the_fold_customizer_setup( $semperfi_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/above-the-fold/customizer.php' );

        $semperfi_customizer_customizer_options_array = array_merge_recursive( $semperfi_customizer_customizer_options_array , $semperfi_above_the_fold_customizer_options_array );
        
        return $semperfi_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semperfi_add_to_customizer_options_array' , 'semperfi_above_the_fold_customizer_setup' );
    
}

add_action( 'semperfi-functions-hook', 'semperfi_above_the_fold' );