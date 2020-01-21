<?php

function semperfi_attachment() {
    
    function semperfi_attachment_html() {
        
        require get_parent_theme_file_path( '/inc/attachment/html.php' );

    }
    
    add_action( 'semperfi_attachment_the_content' , 'semperfi_attachment_html' );
    
    
    function semperfi_attachment_css() {
        
        wp_enqueue_style( 'semperfi-attachment' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_attachment_the_header' , 'semperfi_attachment_css', 9 );
    
}

add_action( 'semperfi-functions-hook' , 'semperfi_attachment' );