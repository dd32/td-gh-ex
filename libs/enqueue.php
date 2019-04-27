<?php
/**
 *  Enqueue.
 */

//  Load Theme Stylesheets
//	=================================================================

    function bnw_theme_assets_styles()
    {
        //  Milligram / Base
        wp_enqueue_style('normalize', get_theme_file_uri('/assets/css/normalize.css'), null, '1.1');
        wp_enqueue_style('bnw-theme-basestyle', get_theme_file_uri('/assets/css/theme-base.css'), null, VERSION);

        //  Theme responsivemultimenu
        wp_enqueue_style('bnw-theme-responsivemultimenu', get_theme_file_uri('/inc/responsive-multi-menu/css/responsivemultimenu.css'), null, VERSION);

        //  WooCommerce
        //wp_enqueue_style( "bnw-theme-woocommerce", get_theme_file_uri( "/woocommerce.css"),null, VERSION );

        //  Theme bnw-theme-style
        wp_enqueue_style('bnw-theme-style', get_theme_file_uri('/assets/css/theme-style.css'), null, VERSION);

        //  Theme WP Style
        wp_enqueue_style('bnw-theme-wp', get_theme_file_uri('/assets/css/theme-wp.css'), null, VERSION);

        //  Theme Responsive style
        wp_enqueue_style('bnw-theme-responsive', get_theme_file_uri('/assets/css/theme-responsive.css'), null, VERSION);

        //  WP Style
        wp_enqueue_style("bnw-theme", get_stylesheet_uri());
    }

    add_action('wp_enqueue_scripts', 'bnw_theme_assets_styles');

//  Load Theme Scripts
//	=================================================================

    function bnw_theme_assets_scripts()
    {
        //  Modernizr & Respond
        wp_enqueue_script('bnw-theme-modernizr-respond', get_theme_file_uri('/assets/js/libs/modernizr-2.8.3-respond-1.4.2.min.js'), null, '1.0', false);

        //  Bootstrap V4
        wp_enqueue_script('bnw-theme-responsivemultimenu', get_theme_file_uri('/inc/responsive-multi-menu/js/responsivemultimenu.js'), array('jquery'), '1.0', true);

        //  comment-reply script
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        //  Custom Script
        wp_enqueue_script('bnw-theme-script', get_theme_file_uri('/assets/js/script.js'), array('jquery'), VERSION, true);
    }
    add_action('wp_enqueue_scripts', 'bnw_theme_assets_scripts');

//  Load Theme Fonts
//	=================================================================

    function bnw_theme_assets_fonts()
    {
        wp_enqueue_style(
            'bnw_theme_font_poppins', '//fonts.googleapis.com/css?family=Poppins:300,400,500,700,900',
            array(), null, 'screen'
        );
    }
    add_action('wp_print_styles', 'bnw_theme_assets_fonts');
