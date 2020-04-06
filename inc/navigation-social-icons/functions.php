<?php

function semper_fi_lite_navigation_social_icons() {
    
    
    function semper_fi_lite_navigation_social_icons_html() {
        
        require get_parent_theme_file_path( '/inc/navigation-social-icons/html.php' );

    }
    
    add_action( 'semper_fi_lite_navigation_social_icons', 'semper_fi_lite_navigation_social_icons_html' );
    
    
    function semper_fi_lite_navigation_social_icons_font() {
        
        wp_enqueue_style( 'semper_fi_lite-navigation-social-icons-font' , get_theme_file_uri( '/inc/navigation-social-icons/fonts/schwarz.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_navigation_social_icons_font', 9 );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_navigation_social_icons_font', 9 );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_navigation_social_icons_font', 9 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_navigation_social_icons_font', 9 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_navigation_social_icons_font', 9 );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_navigation_social_icons_font', 9 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_navigation_social_icons_font', 9 );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_navigation_social_icons_font', 9 );
    
    
    function semper_fi_lite_navigation_social_customizer_setup( $semper_fi_lite_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/navigation-social-icons/customizer.php' );
        
        $semper_fi_lite_customizer_customizer_options_array = array_merge_recursive( $semper_fi_lite_customizer_customizer_options_array , $semper_fi_lite_navigation_social_customizer_options_array );
        
        return $semper_fi_lite_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semper_fi_lite_add_to_customizer_options_array' , 'semper_fi_lite_navigation_social_customizer_setup' );
    
    
}

add_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_navigation_social_icons' );