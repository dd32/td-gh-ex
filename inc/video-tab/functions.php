<?php

function semperfi_video_tab() {
    
    
    function semperfi_video_tab_single() {
        
        require get_parent_theme_file_path( '/inc/video-tab/html.php' );

    }
    
    add_action( 'semperfi_attachment_after_comments' , 'semperfi_video_tab_single' );
    add_action( 'semperfi_page_after_comments' , 'semperfi_video_tab_single' );
    add_action( 'semperfi_single_after_comments' , 'semperfi_video_tab_single' );
    
    
    function semperfi_video_tab_css() {
        
        wp_enqueue_style( 'semperfi-video-tab' , get_theme_file_uri( '/inc/video-tab/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_attachment_the_header' , 'semperfi_video_tab_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_video_tab_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_video_tab_css', 9 );
    
    
}

add_action( 'semperfi-functions-hook' , 'semperfi_video_tab' );