<?php

function semper_fi_lite_blog_functions() {
    
    
    function semper_fi_lite_blog_html() {
        
        require get_parent_theme_file_path( '/inc/blog/html.php' );

    }
    
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_blog_html' , 50 );    
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_blog_html' , 50 );
    
    
    function semper_fi_lite_blog_css() {
        
        wp_enqueue_style( 'semper_fi_lite-blog' , get_theme_file_uri( '/inc/blog/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_blog_css', 1 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_blog_css', 1 );
    
    
    function semper_fi_lite_blog_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/blog/customizer.php' );

        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_blog_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_blog_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite_functions_hook' , 'semper_fi_lite_blog_functions' );