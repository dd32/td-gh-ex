<?php

function semper_fi_lite_comments_functions() {
    
    function semper_fi_lite_comments_html() {
        
        if ( comments_open() ) {
        
            require get_parent_theme_file_path( '/inc/comments/html.php' );
            
        }
        
        else {
            
            remove_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_comments_css' );
            remove_action( 'semper_fi_lite_page' , 'semper_fi_lite_comments_css' );
            remove_action( 'semper_fi_lite_single' , 'semper_fi_lite_comments_css' );
    
            remove_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_video_tab_single' );
            remove_action( 'semper_fi_lite_page' , 'semper_fi_lite_video_tab_single' );
            remove_action( 'semper_fi_lite_single' , 'semper_fi_lite_video_tab_single' );
    
            remove_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_video_tab_css' );
            remove_action( 'semper_fi_lite_page' , 'semper_fi_lite_video_tab_css' );
            remove_action( 'semper_fi_lite_single' , 'semper_fi_lite_video_tab_css' );
            
        }

    }
    
    add_action( 'semper_fi_lite_display_comments' , 'semper_fi_lite_comments_html' , 15 );
    
    
    function semper_fi_lite_comments_css() {
        
        wp_enqueue_style( 'semper_fi_lite-comments' , get_theme_file_uri( '/inc/comments/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_comments_css', 1 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_comments_css', 1 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_comments_css', 1 );
    
    
}

add_action( 'semper_fi_lite_functions_hook' , 'semper_fi_lite_comments_functions' );