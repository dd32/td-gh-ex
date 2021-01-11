<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit; ?><?php

// List of the sections to be loaded in
$semper_fi_lite_load_in_all_sections = array(
    
    'functions',
    'customizer',
    'theme-info',
    'google-fonts',
    'footer',
    'head',
    'skip-link',
    'navigation',
    'navigation-social-icons',
    'above-the-fold',
    'square-boxes',
    'store-front',
    '404',
    'attachment',
    'blog',
    'categories-and-tags',
    'front-page',
    'page',
    'single',
    'comments',
    'content-data',
    'video-tab',
    'footer-widgets',
    'wp-footer',
    'the-end',
);

// Loop through and load in all the different sections
foreach( $semper_fi_lite_load_in_all_sections as $semper_fi_lite_one_loaded_section ){
    
    // Load up '$semper_fi_lite_one_loaded_section' Functions page
    require get_parent_theme_file_path( '/inc/' . $semper_fi_lite_one_loaded_section . '/functions.php' );
                                       
}

// Only load if the WooCommerce Plugin is installed
if ( class_exists( 'WooCommerce' ) ) {
    
    // Remove simple shopping cart
    remove_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_store_front' );

    // Woo-Commerce, Customize
    require get_parent_theme_file_path( '/inc/woo-commerce/functions.php' );

    // Woo-Commerce Add Display Products after cart
    require get_parent_theme_file_path( '/inc/woo-commerce-display-products/functions.php' );
    
}

// Generate the modular content
do_action( 'semper_fi_lite_functions_hook' );