<?php

function semper_fi_lite_attachment() {
    
    function semper_fi_lite_attachment_html() {
        
        require get_parent_theme_file_path( '/inc/attachment/html.php' );

    }
    
    add_action( 'semper_fi_lite_attachment_the_content' , 'semper_fi_lite_attachment_html' );
    
    
    function semper_fi_lite_attachment_css() {
        
        wp_enqueue_style( 'semper_fi_lite-attachment' , get_theme_file_uri( '/inc/single/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_attachment_css', 9 );
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_attachment' );