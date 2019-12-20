<?php

function semperfi_single() {
    
    
    function semperfi_single_html() {
        
        require get_parent_theme_file_path( '/inc/single/html.php' );

    }
    
    add_action( 'semperfi_single_the_content' , 'semperfi_single_html' );
    
    
    function semperfi_single_css() {
        
        wp_enqueue_style( 'semperfi-single' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_single_the_header' , 'semperfi_single_css', 9 );
    
    
    
    function semperfi_single_customizer_setup() {
        
        require get_parent_theme_file_path( '/inc/single/customizer.php' );
    
    }
    
    add_action( 'semperfi_customizer_start_your_engine' , 'semperfi_single_customizer_setup' );
    
}

add_action( 'functions-hook' , 'semperfi_single' );