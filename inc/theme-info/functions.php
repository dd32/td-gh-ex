<?php

function semper_fi_lite_theme_info() {

    
    // Create the Theme Information page (Theme Options)
    function semper_fi_lite_create_theme_info_page() {
        
        require get_parent_theme_file_path( '/inc/theme-info/html.php' );
        
    }
    
    
    // Load up links in admin bar so theme is able to be edited
    function semper_fi_lite_theme_options_add_page() {
    
    add_theme_page(
        __('Semper Fi Theme Info', 'semper-fi-lite'),
        __('Semper Fi Theme Info', 'semper-fi-lite'),
        'edit_theme_options',
        'theme_options',
        'semper_fi_lite_create_theme_info_page' );
    }
    
    add_action('admin_menu', 'semper_fi_lite_theme_options_add_page');
    
    
    // Add some CSS so I can Style the Theme Options Page
    function semper_fi_lite_theme_info_admin_enqueue_scripts( $hook_suffix ) {
        
        wp_enqueue_style( 'semper_fi_lite-theme-info' , get_template_directory_uri() . '/inc/theme-info/style.css' , false,  '1.0' );
    
    }

    add_action('admin_print_styles-appearance_page_theme_options', 'semper_fi_lite_theme_info_admin_enqueue_scripts');
    
    
}

add_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_theme_info' );