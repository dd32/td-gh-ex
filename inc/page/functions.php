<?php

function semper_fi_lite_page_functions() {
    
    
    function semper_fi_lite_page_html() {
        
        require get_parent_theme_file_path( '/inc/page/html.php' );

    }
    
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_page_html' , 25 );
    
    
    function semper_fi_lite_page_css() {
        
        wp_enqueue_style( 'semper_fi_lite-page' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_page_css' , 1 );
    
    
}

add_action( 'semper_fi_lite_functions_hook' , 'semper_fi_lite_page_functions' );