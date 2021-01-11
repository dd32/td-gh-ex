<?php

function semper_fi_lite_skip_link_functions() {
    
    
    function semper_fi_lite_skip_link_html() {
        
        require get_parent_theme_file_path( '/inc/skip-link/html.php' );

    }
    
    add_action( 'semper_fi_lite_404' , 'semper_fi_lite_skip_link_html' , 8 );
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_skip_link_html' , 8 );
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_skip_link_html' , 8 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_skip_link_html' , 8 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_skip_link_html' , 8 );
    add_action( 'semper_fi_lite_search' , 'semper_fi_lite_skip_link_html' , 8 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_skip_link_html' , 8 );
    add_action( 'semper_fi_lite_woo_commerce' , 'semper_fi_lite_skip_link_html' , 8 );
    
    
    function semper_fi_lite_skip_link_css() {
        
        wp_enqueue_style( 'semper_fi_lite-skip-link' , get_theme_file_uri( '/inc/skip-link/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404' , 'semper_fi_lite_skip_link_css', 1 );
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_skip_link_css', 1 );
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_skip_link_css', 1 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_skip_link_css', 1 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_skip_link_css', 1 );
    add_action( 'semper_fi_lite_search' , 'semper_fi_lite_skip_link_css', 1 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_skip_link_css', 1 );
    add_action( 'semper_fi_lite_woo_commerce' , 'semper_fi_lite_skip_link_css', 1 );
    
}

add_action( 'semper_fi_lite_functions_hook' , 'semper_fi_lite_skip_link_functions' );