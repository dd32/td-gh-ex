<?php

function semper_fi_lite_footer() {
    
    
    function semper_fi_lite_footer_html() {
        
        require get_parent_theme_file_path( '/inc/footer/html.php' );

    }
    
    add_action( 'semper_fi_lite_404_the_footer' , 'semper_fi_lite_footer_html' );
    add_action( 'semper_fi_lite_attachment_the_footer' , 'semper_fi_lite_footer_html' );
    add_action( 'semper_fi_lite_front_page_the_footer' , 'semper_fi_lite_footer_html' );
    add_action( 'semper_fi_lite_index_the_footer' , 'semper_fi_lite_footer_html' );
    add_action( 'semper_fi_lite_page_the_footer' , 'semper_fi_lite_footer_html' );
    add_action( 'semper_fi_lite_search_the_footer' , 'semper_fi_lite_footer_html' );
    add_action( 'semper_fi_lite_single_the_footer' , 'semper_fi_lite_footer_html' );
    add_action( 'semper_fi_lite_woo_commerce_the_footer' , 'semper_fi_lite_footer_html' );
    
    
    function semper_fi_lite_footer_css() {
        
        wp_enqueue_style( 'semper_fi_lite-footer' , get_theme_file_uri( '/inc/footer/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_footer_css', 9 );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_footer_css', 9 );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_footer_css', 9 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_footer_css', 9 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_footer_css', 9 );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_footer_css', 9 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_footer_css', 9 );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_footer_css', 9 );
    
    
    function semper_fi_lite_footer_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/footer/customizer.php' );
        
        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_footer_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_footer_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_footer' );