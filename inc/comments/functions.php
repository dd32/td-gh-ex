<?php

function semperfi_comments() {
    
    function semperfi_comments_html() {
        
        if ( comments_open() ) {
        
            require get_parent_theme_file_path( '/inc/comments/html.php' );
            
        }
        
        else {
            
            remove_action( 'semperfi_attachment_the_header' , 'semperfi_comments_css' );
            remove_action( 'semperfi_page_the_header' , 'semperfi_comments_css' );
            remove_action( 'semperfi_single_the_header' , 'semperfi_comments_css' );
            
        }

    }
    
    add_action( 'semperfi_display_comments' , 'semperfi_comments_html' );
    
    
    function semperfi_comments_css() {
        
        wp_enqueue_style( 'semperfi-comments' , get_theme_file_uri( '/inc/comments/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_attachment_the_header' , 'semperfi_comments_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_comments_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_comments_css', 9 );
    
    
}

add_action( 'functions-hook' , 'semperfi_comments' );