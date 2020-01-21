<?php

function semperfi_store_front() {
    
    
    function semperfi_store_front_html_404() {
        
        require get_parent_theme_file_path( '/inc/store-front/html.php' );

    }
    
    add_action( 'semperfi_404_after_content', 'semperfi_store_front_html_404' , 5 );
    
    
    function semperfi_store_front_html_front_page_after_content() {
    
        if ( !is_paged() ) {
        
            require get_parent_theme_file_path( '/inc/store-front/html.php' );
            
        }

    }
    
    add_action( 'semperfi_front_page_after_content', 'semperfi_store_front_html_front_page_after_content' , 5 );
    
    
    function semperfi_store_front_html_front_page_before_footer() {
    
        if ( is_paged() ) {
        
            require get_parent_theme_file_path( '/inc/store-front/html.php' );
            
        }

    }
    
    add_action( 'semperfi_front_page_before_footer', 'semperfi_store_front_html_front_page_before_footer' , 15 );
    
    
    function semperfi_store_front_css() {
        
        wp_enqueue_style( 'semperfi-store-front' , get_theme_file_uri( '/inc/store-front/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_store_front_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_store_front_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_store_front_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_store_front_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_store_front_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_store_front_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_store_front_css', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_store_front_css', 9 );
    
    
    function semperfi_store_front_customizer_setup( $semperfi_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/store-front/customizer.php' );
        
        $semperfi_customizer_customizer_options_array = array_merge_recursive( $semperfi_customizer_customizer_options_array , $semperfi_store_front_customizer_options_array );
        
        return $semperfi_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semperfi_add_to_customizer_options_array' , 'semperfi_store_front_customizer_setup' );
    
    
}

add_action( 'semperfi-functions-hook', 'semperfi_store_front' );