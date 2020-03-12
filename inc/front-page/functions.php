<?php

function semperfi_front_page() {
        
    
        function semperfi_front_page_html() {
            
            if ( !is_paged() ) {
                
                require get_parent_theme_file_path( '/inc/front-page/html.php' );
                
            }

        }

        add_action( 'semperfi_front_page_the_content', 'semperfi_front_page_html' );


        function semperfi_front_page_css() {
            
            if ( !is_paged() ) {

                wp_enqueue_style( 'semperfi-front-page' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );
                
            }

        }

        add_action( 'semperfi_front_page_the_header' , 'semperfi_front_page_css', 9 );
        
        
    
    
}

add_action( 'semperfi-functions-hook', 'semperfi_front_page' );