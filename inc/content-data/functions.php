<?php

function semper_fi_lite_content_data() {
    
    
    function semper_fi_lite_content_data_html() {
        
        require get_parent_theme_file_path( '/inc/content-data/html.php' );

    }
    
    add_action( 'semper_fi_lite_content_data' , 'semper_fi_lite_content_data_html' );
    
    
    function semper_fi_lite_content_data_css() {
        
        wp_enqueue_style( 'semper_fi_lite-content-data' , get_theme_file_uri( '/inc/content-data/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_content_data_css', 9 );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_content_data_css', 9 );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_content_data_css', 9 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_content_data_css', 9 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_content_data_css', 9 );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_content_data_css', 9 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_content_data_css', 9 );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_content_data_css', 9 );
    
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_content_data' );