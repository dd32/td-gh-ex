<?php

function semper_fi_lite_blog() {
    
    
    function semper_fi_lite_blog_html() {
        
        require get_parent_theme_file_path( '/inc/blog/html.php' );

    }
    
    add_action( 'semper_fi_lite_front_page_after_content' , 'semper_fi_lite_blog_html' );    
    add_action( 'semper_fi_lite_index_the_content' , 'semper_fi_lite_blog_html' );
    
    
    function semper_fi_lite_blog_css() {
        
        wp_enqueue_style( 'semper_fi_lite-blog' , get_theme_file_uri( '/inc/blog/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_blog_css', 9 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_blog_css', 9 );
    
    
    function semper_fi_lite_blog_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/blog/customizer.php' );

        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_blog_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_blog_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_blog' );