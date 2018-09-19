<?php
/*
============================================================================================================================
Silver Quantum - custom-header.php
============================================================================================================================
This specific file custom-header.php template allows you to add custom header through the customizer. As part of this theme, 
there is a preset image that will come with the theme. 

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Custom Header
 2.0 - Custom Header (CSS)
============================================================================================================================
*/
/*
============================================================================================================================
 1.0 - Custom Header
============================================================================================================================
*/
function silver_quantum_custom_header_setup() {
    $args = array(
        /*
        ====================================================================================================================
        Enable and activate the default text color and default image when used for a custom header.
        ====================================================================================================================
        */
        'default-text-color'    => 'ffffff',
        'default-image'         => get_theme_file_uri('/framework/assets/images/header-image.jpg'),
        /*
        ====================================================================================================================
        Enable and activate the height and width fo the image for the custom header
        ====================================================================================================================
        */
        'height'    => 300,
        'max-width' => 2000,
        'width'     => 1170,
        /*
        ====================================================================================================================
        Enable and activate support for flexible height and width
        ====================================================================================================================
        */
        'flex-height'   => false,
        'flex-width'    => false,
        /*
        ====================================================================================================================
        Enable and activate the callback for the custom header.
        ====================================================================================================================
        */
        'wp-head-callback'  => 'silver_quantum_custom_header_styles_setup',
    );
    add_theme_support('custom-header', $args);
    /*
    ========================================================================================================================
    Enable and activate the default headers for the custom header. This is needed so that by default the image will show, if
    not, it will not. 
    ========================================================================================================================
    */
    register_default_headers(array(
        'header-image' => array(
            'url'           => '%s/framework/assets/images/header-image.jpg',
            'thumbnail_url' => '%s/framework/assets/images/header-image.jpg',
            'description'   => esc_html__('Header Image', 'silver-quantum')
    )));
}
add_action('after_setup_theme', 'silver_quantum_custom_header_setup');
/*
============================================================================================================================
 2.0 - Custom Header (CSS)
============================================================================================================================
*/
function silver_quantum_custom_header_styles_setup() {
    $text_color = get_header_textcolor();
    if ($text_color == get_theme_support('custom-header', 'default-text-color')) {
        return;
    }
    $value = display_header_text() ? sprintf('color: #%s', esc_html($text_color)) : 'display: none;';
    $custom_css = "
        .site-title a,
        .site-description {
            {$value}
        }
    ";
    wp_add_inline_style('silver-quantum-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'silver_quantum_custom_header_styles_setup');