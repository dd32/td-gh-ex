<?php
/**
 *  Theme functions
 */


//  Theme cache busting
//  =================================================================
    if ( site_url() == "http://localhost/LEARN_WP/THEME_DEV" ){
        define ( "VERSION", time() );
    }else{
        define ( "VERSION", wp_get_theme()->get( "Version" ) );
    }

//  Theme setup and theme supports
//  =================================================================
    require_once( get_theme_file_path( "/libs/setup.php" ) );

//  Enqueue scripts and styles
//  =================================================================
    require_once( get_theme_file_path( "/libs/enqueue.php" ) );
    
//  Widget
//  =================================================================
    require_once( get_theme_file_path( "/libs/widget.php" ) );

//  Template Tags
//  =================================================================
    require_once( get_theme_file_path( "/libs/template-tags.php" ) );

//  WooCommerce compatibility file
//  =================================================================
    require_once( get_theme_file_path( "/libs/woocommerce.php" ) );

