<?php

function semperfi_categories_and_tags() {
    
    
    function semperfi_categories_and_tages_single( $semperfi_blog_wp_query ) {
        
        require get_parent_theme_file_path( '/inc/categories-and-tags/html.php' );

    }
    
    add_action( 'semperfi-categories-and-tags-single' , 'semperfi_categories_and_tages_single' );
    
    
    function semperfi_categories_and_tags_css() {
        
        wp_enqueue_style( 'semperfi-categories-and-tags' , get_theme_file_uri( '/inc/categories-and-tags/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_categories_and_tags_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_categories_and_tags_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_categories_and_tags_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_categories_and_tags_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_categories_and_tags_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_categories_and_tags_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_categories_and_tags_css', 9 );
    
    
    function semperfi_categories_and_tags_customizer_setup( $semperfi_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/categories-and-tags/customizer.php' );

        $semperfi_customizer_customizer_options_array = array_merge_recursive( $semperfi_customizer_customizer_options_array , $semperfi_categories_and_tags_customizer_options_array );
        
        return $semperfi_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semperfi_add_to_customizer_options_array' , 'semperfi_categories_and_tags_customizer_setup' );
    
    
}

add_action( 'semperfi-functions-hook' , 'semperfi_categories_and_tags' );