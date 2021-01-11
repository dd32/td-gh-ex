<?php

function semper_fi_lite_front_page_functions() {
        
    
    function semper_fi_lite_front_page_html() {
            
        if ( !is_home() && is_page() && !is_paged() ) {

            require get_parent_theme_file_path( '/inc/front-page/html.php' );
            
        } else {
            
            remove_action( 'semper_fi_lite_front_page_the_content', 'semper_fi_lite_front_page_html' );
            
        }

    }

    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_front_page_html' , 25 );


    function semper_fi_lite_front_page_css() {
            
        if ( !is_home() && is_page() && !is_paged() ) {

            wp_enqueue_style( 'semper_fi_lite_front_page' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );
            
        } else {
            
            remove_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_front_page_css' , 1 );
            
        }

    }

    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_front_page_css', 1 );
    
}

add_action( 'semper_fi_lite_functions_hook', 'semper_fi_lite_front_page_functions' );