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
    
    
}

add_action( 'functions-hook' , 'semperfi_404' );