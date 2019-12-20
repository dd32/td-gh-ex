<?php

function semperfi_header() {
    
    
    function semperfi_header_html() {
        
        require get_parent_theme_file_path( '/inc/header/html.php' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_header_html' );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_header_html' );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_header_html' );
    add_action( 'semperfi_index_the_header' , 'semperfi_header_html' );
    add_action( 'semperfi_page_the_header' , 'semperfi_header_html' );
    add_action( 'semperfi_search_the_header' , 'semperfi_header_html' );
    add_action( 'semperfi_single_the_header' , 'semperfi_header_html' );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_header_html' );
    
    
    function semperfi_header_css() {
        
        wp_enqueue_style( 'semperfi' , get_theme_file_uri( '/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );
        wp_enqueue_style( 'semperfi-google-font' , 'https://fonts.googleapis.com/css?family=Open+Sans|Teko:500&amp;subset=latin-ext' , false , '' , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_header_css', 8 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_header_css', 8 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_header_css', 8 );
    add_action( 'semperfi_index_the_header' , 'semperfi_header_css', 8 );
    add_action( 'semperfi_page_the_header' , 'semperfi_header_css', 8 );
    add_action( 'semperfi_search_the_header' , 'semperfi_header_css', 8 );
    add_action( 'semperfi_single_the_header' , 'semperfi_header_css', 8 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_header_css', 8 );
    
}

add_action( 'functions-hook' , 'semperfi_header' );