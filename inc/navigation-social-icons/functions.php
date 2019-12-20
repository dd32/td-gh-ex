<?php

function semperfi_navigation_social_icons() {
    
    
    function semperfi_navigation_social_icons_html() {
        
        require get_parent_theme_file_path( '/inc/navigation-social-icons/html.php' );

    }
    
    add_action( 'navigation_social_icons', 'semperfi_navigation_social_icons_html' );
    
    
    function semperfi_navigation_social_icons_font() {
        
        wp_enqueue_style( 'semperfi-navigation-social-icons-font' , get_theme_file_uri( '/fonts/schwarz.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_navigation_social_icons_font', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_navigation_social_icons_font', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_navigation_social_icons_font', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_navigation_social_icons_font', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_navigation_social_icons_font', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_navigation_social_icons_font', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_navigation_social_icons_font', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_navigation_social_icons_font', 9 );
    
    
    function semperfi_navigation_social_icons_customizer_setup() {
        
        require get_parent_theme_file_path( '/inc/navigation-social-icons/customizer.php' );
    
    }
    
    add_action( 'semperfi_do_action_assemble_customizer_array', 'semperfi_navigation_social_icons_customizer_setup' );
    
    
}

add_action( 'functions-hook', 'semperfi_navigation_social_icons' );