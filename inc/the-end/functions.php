<?php

function semperfi_the_end() {
    
    function semperfi_the_end_html() {
        
        require get_parent_theme_file_path( '/inc/the-end/html.php' );

    }
    
    add_action( 'semperfi_404_after_footer' , 'semperfi_the_end_html' , 9999 );
    add_action( 'semperfi_attachment_after_footer' , 'semperfi_the_end_html' , 9999 );
    add_action( 'semperfi_front_page_after_footer' , 'semperfi_the_end_html' , 9999 );
    add_action( 'semperfi_index_after_footer' , 'semperfi_the_end_html' , 9999 );
    add_action( 'semperfi_page_after_footer' , 'semperfi_the_end_html' , 9999 );
    add_action( 'semperfi_search_after_footer' , 'semperfi_the_end_html' , 9999 );
    add_action( 'semperfi_single_after_footer' , 'semperfi_the_end_html' , 9999 );
    
}

add_action( 'semperfi-functions-hook' , 'semperfi_the_end' );