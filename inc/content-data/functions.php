<?php

function semper_fi_lite_content_data_functions() {
    
    
    function semper_fi_lite_content_data_html() {
        
        require get_parent_theme_file_path( '/inc/content-data/html.php' );

    }
    
    add_action( 'semper_fi_lite_content_data' , 'semper_fi_lite_content_data_html' );
    
    
    function semper_fi_lite_content_data_css() {
        
        wp_enqueue_style( 'semper_fi_lite_content_data' , get_theme_file_uri( '/inc/content-data/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404' , 'semper_fi_lite_content_data_css', 1 );
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_content_data_css', 1 );
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_content_data_css', 1 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_content_data_css', 1 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_content_data_css', 1 );
    add_action( 'semper_fi_lite_search' , 'semper_fi_lite_content_data_css', 1 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_content_data_css', 1 );
    add_action( 'semper_fi_lite_woo_commerce' , 'semper_fi_lite_content_data_css', 1 );
    
    
}

add_action( 'semper_fi_lite_functions_hook' , 'semper_fi_lite_content_data_functions' );