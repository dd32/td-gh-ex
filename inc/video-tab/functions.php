<?php

function semper_fi_lite_video_tab_functions() {
    
    
    function semper_fi_lite_video_tab_single() {
        
        if ( ( is_single() && comments_open() ) || ( is_page() && comments_open() ) ) {
            
            require get_parent_theme_file_path( '/inc/video-tab/html.php' );
            
        }

    }
    
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_video_tab_single' , 76 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_video_tab_single' , 76 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_video_tab_single' , 76 );
    
    
    function semper_fi_lite_video_tab_css() {
        
        if ( ( is_single() && comments_open() ) || ( is_page() && comments_open() ) ) {
            
            wp_enqueue_style( 'semper_fi_lite-video-tab' , get_theme_file_uri( '/inc/video-tab/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );
            
        }

    }
    
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_video_tab_css', 1 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_video_tab_css', 1 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_video_tab_css', 1 );
    
    
    function semper_fi_lite_video_tab_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/video-tab/customizer.php' );
        
        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_video_tab_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_video_tab_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite_functions_hook' , 'semper_fi_lite_video_tab_functions' );