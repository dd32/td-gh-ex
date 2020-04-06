<?php

function semper_fi_lite_404() {
    
    
    function semper_fi_lite_404_html() {
        
        require get_parent_theme_file_path( 'inc/404/html.php' );

    }
    
    add_action( 'semper_fi_lite_404_the_content' , 'semper_fi_lite_404_html' );
    
    
    function semper_fi_lite_404_css() {
        
        wp_enqueue_style( 'semper_fi_lite-single' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_404_css', 9 );
    
    
    function semper_fi_lite_404_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/404/customizer.php' );

        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_404_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
        
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_404_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_404' );