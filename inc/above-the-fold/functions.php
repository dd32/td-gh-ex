<?php

function semper_fi_lite_above_the_fold() {
    
    function semper_fi_lite_above_the_fold_html() {
        
        if ( ( is_page() && !is_paged() && absint ( get_theme_mod( 'square_boxes_enable_1' , false ) ) ) || ( is_home() && absint ( get_theme_mod( 'square_boxes_enable_1' , true ) ) ) ) {
        
            require get_parent_theme_file_path( '/inc/above-the-fold/html.php' );
            
        }
        
    }

    add_action( 'semper_fi_lite_front_page_after_header', 'semper_fi_lite_above_the_fold_html' );
    
    
    function semper_fi_lite_above_the_fold_css() {
        
        wp_enqueue_style( 'semper_fi_lite-above-the-fold' , get_theme_file_uri( '/inc/above-the-fold/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );
        
        // Get Array for CSS Generation
        require get_parent_theme_file_path( '/inc/above-the-fold/customizer.php' );
        
        // Set to a standard name to be passed to
        $semper_fi_lite_customizer_inline_this_css = $semper_fi_lite_above_the_fold_customizer_options_array;
        
        // Generate CSS Code for wp_add_inline_stye
        require get_parent_theme_file_path( '/inc/customizer/customizer-inline-css.php' );
        
        // Attach the customizer generated modified CSS to the enqueue style
        wp_add_inline_style( 'semper_fi_lite-above-the-fold', $semper_fi_lite_customizer_generated_css_modifiers );
        
    }
        
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_above_the_fold_css', 9 );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_above_the_fold_css', 9 );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_above_the_fold_css', 9 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_above_the_fold_css', 9 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_above_the_fold_css', 9 );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_above_the_fold_css', 9 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_above_the_fold_css', 9 );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_above_the_fold_css', 9 );
    
    
    function semper_fi_lite_above_the_fold_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/above-the-fold/customizer.php' );

        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_above_the_fold_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_above_the_fold_customizer_setup' );
    
}

add_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_above_the_fold' );