<?php

function semper_fi_lite_store_front() {
    
    
    function semper_fi_lite_store_front_html_404() {
        
        require get_parent_theme_file_path( '/inc/store-front/html.php' );

    }
    
    add_action( 'semper_fi_lite_404_after_content', 'semper_fi_lite_store_front_html_404' , 5 );
    
    
    function semper_fi_lite_store_front_html_front_page_after_content() {
    
        if ( !is_paged() ) {
        
            require get_parent_theme_file_path( '/inc/store-front/html.php' );
            
        }

    }
    
    add_action( 'semper_fi_lite_front_page_after_content', 'semper_fi_lite_store_front_html_front_page_after_content' , 5 );
    
    
    function semper_fi_lite_store_front_css() {
        
        wp_enqueue_style( 'semper_fi_lite-store-front' , get_theme_file_uri( '/inc/store-front/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_store_front_css', 9 );
    
    
    function semper_fi_lite_store_front_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/store-front/customizer.php' );
        
        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_store_front_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_store_front_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_store_front' );