<?php

function semper_fi_lite_the_end() {
    
    function semper_fi_lite_the_end_html() {
        
        require get_parent_theme_file_path( '/inc/the-end/html.php' );

    }
    
    add_action( 'semper_fi_lite_404_after_footer' , 'semper_fi_lite_the_end_html' , 9999 );
    add_action( 'semper_fi_lite_attachment_after_footer' , 'semper_fi_lite_the_end_html' , 9999 );
    add_action( 'semper_fi_lite_front_page_after_footer' , 'semper_fi_lite_the_end_html' , 9999 );
    add_action( 'semper_fi_lite_index_after_footer' , 'semper_fi_lite_the_end_html' , 9999 );
    add_action( 'semper_fi_lite_page_after_footer' , 'semper_fi_lite_the_end_html' , 9999 );
    add_action( 'semper_fi_lite_search_after_footer' , 'semper_fi_lite_the_end_html' , 9999 );
    add_action( 'semper_fi_lite_single_after_footer' , 'semper_fi_lite_the_end_html' , 9999 );
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_the_end' );