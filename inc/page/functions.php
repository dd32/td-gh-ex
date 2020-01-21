<?php

function semperfi_page() {
    
    
    function semperfi_page_html() {
        
        require get_parent_theme_file_path( '/inc/page/html.php' );

    }
    
    add_action( 'semperfi_page_the_content' , 'semperfi_page_html' );
    
    
    function semperfi_page_css() {
        
        wp_enqueue_style( 'semperfi-page' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_page_the_header' , 'semperfi_page_css', 9 );
    
    
}

add_action( 'semperfi-functions-hook' , 'semperfi_page' );