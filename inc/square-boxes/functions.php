<?php

function semper_fi_lite_square_boxes_functions() {
    
    
    function semper_fi_lite_square_boxes_html() {

        if ( ( !is_paged() && is_front_page() ) || ( is_home() && absint ( get_theme_mod( 'square_boxes_enable_1' , true ) ) ) ) {

            require get_parent_theme_file_path( '/inc/square-boxes/html.php' );

        }

    }

    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_square_boxes_html' , 11 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_square_boxes_html' , 11 );


    function semper_fi_lite_square_boxes_css() {

        if ( ( !is_paged() && is_front_page() ) || ( is_home() && absint ( get_theme_mod( 'square_boxes_enable_1' , true ) ) ) ) {

            wp_enqueue_style( 'semper_fi_lite-square-boxes' , get_theme_file_uri( '/inc/square-boxes/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

        }

    }

    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_square_boxes_css', 1 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_square_boxes_css', 1 );
    
    
    function semper_fi_lite_square_boxes_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {

        require get_parent_theme_file_path( '/inc/square-boxes/customizer.php' );
        
        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_square_boxes_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_square_boxes_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite_functions_hook', 'semper_fi_lite_square_boxes_functions' );