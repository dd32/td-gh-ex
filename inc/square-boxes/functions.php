<?php

function semper_fi_lite_square_boxes() {
    
    function semper_fi_lite_square_boxes_html() {

        if ( !is_paged() ) {

            require get_parent_theme_file_path( '/inc/square-boxes/html.php' );

        }

    }

    add_action( 'semper_fi_lite_front_page_before_content' , 'semper_fi_lite_square_boxes_html' );
    add_action( 'semper_fi_lite_index_before_header' , 'semper_fi_lite_square_boxes_html' );


    function semper_fi_lite_square_boxes_css() {

        if ( !is_paged() ) {

            wp_enqueue_style( 'semper_fi_lite-square-boxes' , get_theme_file_uri( '/inc/square-boxes/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

        }

    }

    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_square_boxes_css', 9 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_square_boxes_css', 9 );
    
    
    function semper_fi_lite_square_boxes_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {

        require get_parent_theme_file_path( '/inc/square-boxes/customizer.php' );
        
        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_square_boxes_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_square_boxes_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_square_boxes' );