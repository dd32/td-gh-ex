<?php

function semperfi_content_data() {
    
    
    function semperfi_content_data_html() {
        
        require get_parent_theme_file_path( '/inc/content-data/html.php' );

    }
    
    add_action( 'semperfi_content_data' , 'semperfi_content_data_html' );
    
    
    function semperfi_content_data_css() {
        
        wp_enqueue_style( 'semperfi-content-data' , get_theme_file_uri( '/inc/content-data/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_content_data_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_content_data_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_content_data_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_content_data_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_content_data_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_content_data_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_content_data_css', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_content_data_css', 9 );
    
    
}

add_action( 'semperfi-functions-hook' , 'semperfi_content_data' );