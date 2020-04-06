<?php

function semper_fi_lite_skip_link() {
    
    
    function semper_fi_lite_skip_link_html() {
        
        require get_parent_theme_file_path( '/inc/skip-link/html.php' );

    }
    
    add_action( 'semper_fi_lite_404_after_header' , 'semper_fi_lite_skip_link_html' , 1 );
    add_action( 'semper_fi_lite_attachment_after_header' , 'semper_fi_lite_skip_link_html' , 1 );
    add_action( 'semper_fi_lite_front_page_after_header' , 'semper_fi_lite_skip_link_html' , 1 );
    add_action( 'semper_fi_lite_index_after_header' , 'semper_fi_lite_skip_link_html' , 1 );
    add_action( 'semper_fi_lite_page_after_header' , 'semper_fi_lite_skip_link_html' , 1 );
    add_action( 'semper_fi_lite_search_after_header' , 'semper_fi_lite_skip_link_html' , 1 );
    add_action( 'semper_fi_lite_single_after_header' , 'semper_fi_lite_skip_link_html' , 1 );
    add_action( 'semper_fi_lite_woo_commerce_after_header' , 'semper_fi_lite_skip_link_html' , 1 );
    
    
    function semper_fi_lite_skip_link_css() {
        
        wp_enqueue_style( 'semper_fi_lite-skip-link' , get_theme_file_uri( '/inc/skip-link/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_skip_link_css', 8 );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_skip_link_css', 8 );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_skip_link_css', 8 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_skip_link_css', 8 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_skip_link_css', 8 );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_skip_link_css', 8 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_skip_link_css', 8 );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_skip_link_css', 8 );
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_skip_link' );