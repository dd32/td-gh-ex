<?php

function semper_fi_lite_store_front_functions() {
    
    
    function semper_fi_lite_store_front_html_404() {
        
        require get_parent_theme_file_path( '/inc/store-front/html.php' );

    }
    
    add_action( 'semper_fi_lite_404', 'semper_fi_lite_store_front_html_404' , 15 );
    
    
    function semper_fi_lite_store_front_html_front_page() {
    
        if ( !is_paged() ) {
        
            require get_parent_theme_file_path( '/inc/store-front/html.php' );
            
        }

    }
    
    add_action( 'semper_fi_lite_front_page', 'semper_fi_lite_store_front_html_front_page' , 15 );
    
    
    function semper_fi_lite_store_front_css() {
        
        wp_enqueue_style( 'semper_fi_lite-store-front' , get_theme_file_uri( '/inc/store-front/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404' , 'semper_fi_lite_store_front_css', 1 );
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_store_front_css', 1 );
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_store_front_css', 1 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_store_front_css', 1 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_store_front_css', 1 );
    add_action( 'semper_fi_lite_search' , 'semper_fi_lite_store_front_css', 1 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_store_front_css', 1 );
    add_action( 'semper_fi_lite_woo_commerce' , 'semper_fi_lite_store_front_css', 1 );
    
    
    function semper_fi_lite_store_front_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/store-front/customizer.php' );
        
        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_store_front_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_store_front_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite_functions_hook', 'semper_fi_lite_store_front_functions' );