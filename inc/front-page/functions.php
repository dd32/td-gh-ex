<?php

function semper_fi_lite_front_page() {
        
    
    function semper_fi_lite_front_page_html() {
            
        if ( !is_paged() ) {

            require get_parent_theme_file_path( '/inc/front-page/html.php' );
            
        } else {
            
            remove_action( 'semper_fi_lite_front_page_the_content', 'semper_fi_lite_front_page_html' );
            
        }

    }

    add_action( 'semper_fi_lite_front_page_the_content', 'semper_fi_lite_front_page_html' );


    function semper_fi_lite_front_page_css() {
            
        if ( !is_paged() ) {

            wp_enqueue_style( 'semper_fi_lite-front-page' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );
            
        } else {
            
            remove_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_front_page_css', 9 );
            
        }

    }

    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_front_page_css', 9 );
    
}

add_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_front_page' );