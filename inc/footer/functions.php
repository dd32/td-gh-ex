<?php

function semperfi_footer() {
    
    
    function semperfi_footer_html() {
        
        require get_parent_theme_file_path( '/inc/footer/html.php' );

    }
    
    add_action( 'semperfi_404_the_footer' , 'semperfi_footer_html' );
    add_action( 'semperfi_attachment_the_footer' , 'semperfi_footer_html' );
    add_action( 'semperfi_front_page_the_footer' , 'semperfi_footer_html' );
    add_action( 'semperfi_index_the_footer' , 'semperfi_footer_html' );
    add_action( 'semperfi_page_the_footer' , 'semperfi_footer_html' );
    add_action( 'semperfi_search_the_footer' , 'semperfi_footer_html' );
    add_action( 'semperfi_single_the_footer' , 'semperfi_footer_html' );
    add_action( 'semperfi_woo_commerce_the_footer' , 'semperfi_footer_html' );
    
    
    function semperfi_footer_css() {
        
        wp_enqueue_style( 'semperfi-footer' , get_theme_file_uri( '/inc/footer/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_footer_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_footer_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_footer_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_footer_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_footer_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_footer_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_footer_css', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_footer_css', 9 );
    
    
    function semperfi_footer_customizer_setup( $semperfi_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/footer/customizer.php' );
        
        $semperfi_customizer_customizer_options_array = array_merge_recursive( $semperfi_customizer_customizer_options_array , $semperfi_footer_customizer_options_array );
        
        return $semperfi_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semperfi_add_to_customizer_options_array' , 'semperfi_footer_customizer_setup' );
    
    
}

add_action( 'semperfi-functions-hook' , 'semperfi_footer' );