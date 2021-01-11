<?php

function semper_fi_lite_the_end_functions() {
    
    function semper_fi_lite_the_end_html() {
        
        require get_parent_theme_file_path( '/inc/the-end/html.php' );

    }
    
    add_action( 'semper_fi_lite_404' , 'semper_fi_lite_the_end_html' , 100 );
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_the_end_html' , 100 );
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_the_end_html' , 100 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_the_end_html' , 100 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_the_end_html' , 100 );
    add_action( 'semper_fi_lite_search' , 'semper_fi_lite_the_end_html' , 100 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_the_end_html' , 100 );
    
}

add_action( 'semper_fi_lite_functions_hook' , 'semper_fi_lite_the_end_functions' );