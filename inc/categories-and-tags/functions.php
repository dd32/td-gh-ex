<?php

function semper_fi_lite_categories_and_tags_functions() {
    
    
    function semper_fi_lite_categories_and_tages_single( $semper_fi_lite_blog_wp_query ) {
        
        require get_parent_theme_file_path( '/inc/categories-and-tags/html.php' );

    }
    
    add_action( 'semper_fi_lite_categories_and_tags_single' , 'semper_fi_lite_categories_and_tages_single' );
    add_action( 'semper_fi_lite_woo_commerce' , 'semper_fi_lite_categories_and_tages_single' , 80 );
    
    
    function semper_fi_lite_categories_and_tags_css() {
        
        wp_enqueue_style( 'semper_fi_lite_categories_and_tags' , get_theme_file_uri( '/inc/categories-and-tags/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404' , 'semper_fi_lite_categories_and_tags_css', 1 );
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_categories_and_tags_css', 1 );
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_categories_and_tags_css', 1 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_categories_and_tags_css', 1 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_categories_and_tags_css', 1 );
    add_action( 'semper_fi_lite_search' , 'semper_fi_lite_categories_and_tags_css', 1 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_categories_and_tags_css', 1 );
    add_action( 'semper_fi_lite_woo_commerce' , 'semper_fi_lite_categories_and_tags_css', 1 );
    
    
    function semper_fi_lite_categories_and_tags_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/categories-and-tags/customizer.php' );

        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_categories_and_tags_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_categories_and_tags_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite_functions_hook' , 'semper_fi_lite_categories_and_tags_functions' );