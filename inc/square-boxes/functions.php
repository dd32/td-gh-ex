<?php

function semperfi_square_boxes() {
    
    if ( !is_paged() ) {
    
        function semperfi_square_boxes_html() {

            require get_parent_theme_file_path( '/inc/square-boxes/html.php' );

        }

        add_action( 'semperfi_front_page_before_content' , 'semperfi_square_boxes_html' );
        add_action( 'semperfi_index_before_header' , 'semperfi_square_boxes_html' );


        function semperfi_square_boxes_css() {

            wp_enqueue_style( 'semperfi-square-boxes' , get_theme_file_uri( '/inc/square-boxes/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

        }

        add_action( 'semperfi_front_page_the_header' , 'semperfi_square_boxes_css' );
        add_action( 'semperfi_index_the_header' , 'semperfi_square_boxes_css' );
        
    }
    
    
    function semperfi_square_boxes_customizer_setup() {
        
        require get_parent_theme_file_path( '/inc/square-boxes/customizer.php' );
    
    }
    
    add_action( 'semperfi_do_action_assemble_customizer_array', 'semperfi_square_boxes_customizer_setup' );
    
    
}

add_action( 'functions-hook', 'semperfi_square_boxes' );