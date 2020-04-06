<?php

function semper_fi_lite_video_tab() {
    
    
    function semper_fi_lite_video_tab_single() {
        
        require get_parent_theme_file_path( '/inc/video-tab/html.php' );

    }
    
    add_action( 'semper_fi_lite_attachment_after_comments' , 'semper_fi_lite_video_tab_single' );
    add_action( 'semper_fi_lite_page_after_comments' , 'semper_fi_lite_video_tab_single' );
    add_action( 'semper_fi_lite_single_after_comments' , 'semper_fi_lite_video_tab_single' );
    
    
    function semper_fi_lite_video_tab_css() {
        
        wp_enqueue_style( 'semper_fi_lite-video-tab' , get_theme_file_uri( '/inc/video-tab/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_video_tab_css', 9 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_video_tab_css', 9 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_video_tab_css', 9 );
    
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_video_tab' );