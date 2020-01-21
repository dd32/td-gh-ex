<?php

function semperfi_404() {
    
    
    function semperfi_404_html() {
        
        require get_parent_theme_file_path( 'inc/404/html.php' );

    }
    
    add_action( 'semperfi_404_the_content' , 'semperfi_404_html' );
    
    
    function semperfi_404_css() {
        
        wp_enqueue_style( 'semperfi-single' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_404_css', 9 );
    
    
    function semperfi_404_customizer_setup( $semperfi_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/404/customizer.php' );

        $semperfi_customizer_customizer_options_array = array_merge_recursive( $semperfi_customizer_customizer_options_array , $semperfi_404_customizer_options_array );
        
        return $semperfi_customizer_customizer_options_array;
        
    }
    
    add_filter( 'semperfi_add_to_customizer_options_array' , 'semperfi_404_customizer_setup' );
    
    
}

add_action( 'semperfi-functions-hook' , 'semperfi_404' );