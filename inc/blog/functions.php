<?php

function semperfi_blog() {
    
    
    function semperfi_blog_html() {
        
        require get_parent_theme_file_path( '/inc/blog/html.php' );

    }
    
    add_action( 'semperfi_front_page_after_content' , 'semperfi_blog_html' );
    
    
    function semperfi_blog_css() {
        
        wp_enqueue_style( 'semperfi-blog' , get_theme_file_uri( '/inc/blog/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_front_page_the_header' , 'semperfi_blog_css', 9 );
    
    
}

add_action( 'functions-hook' , 'semperfi_blog' );