<?php

function semperfi_front_page() {
    
    
    function semperfi_front_page_html() {

        if ( get_theme_mod ( 'fresh_install_display_1' , true ) && ( get_option( 'page_on_front' ) == 0 ) ) {

            require get_parent_theme_file_path( '/inc/front-page/fresh-install.php' );

        }

        else {

            require get_parent_theme_file_path( '/inc/front-page/html.php' );

        }

    }
        
    add_action( 'semperfi_front_page_the_content', 'semperfi_front_page_html' );
    
    
    function semperfi_front_page_css() {
        
        wp_enqueue_style( 'semperfi-front-page' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_front_page_the_header' , 'semperfi_front_page_css', 9 );
    
    
    function semperfi_front_page_customizer_setup() {
        
        require get_parent_theme_file_path( '/inc/front-page/customizer.php' );
    
    }
    
    add_action( 'semperfi_customizer_start_your_engine' , 'semperfi_front_page_customizer_setup' );
    
    
}

add_action( 'functions-hook', 'semperfi_front_page' );