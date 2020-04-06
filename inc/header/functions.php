<?php

function semper_fi_lite_header() {
    
    
    function semper_fi_lite_header_html() {
        
        require get_parent_theme_file_path( '/inc/header/html.php' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_header_html' );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_header_html' );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_header_html' );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_header_html' );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_header_html' );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_header_html' );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_header_html' );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_header_html' );
    
    
    function semper_fi_lite_header_css() {
        
        wp_enqueue_style( 'semper_fi_lite' , get_theme_file_uri( '/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_header_css', 8 );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_header_css', 8 );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_header_css', 8 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_header_css', 8 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_header_css', 8 );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_header_css', 8 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_header_css', 8 );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_header_css', 8 );
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_header' );