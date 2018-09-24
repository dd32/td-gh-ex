<?php
/*
============================================================================================================================
Backdrop - backdrop/core/custom-header.php
============================================================================================================================
This specific file custom-header.php template allows you to add custom header through the customizer. As part of this theme, 
there is a preset image that will come with the theme. 

@package        Backdrop
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/

/*
============================================================================================================================
namespace define
============================================================================================================================
*/
namespace Backdrop\Core;

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Custom Header (Setup)
 2.0 - Custom Header (Inline Styles)
============================================================================================================================
*/
add_action('after_setup_theme', function() {
    /*
    ========================================================================================================================
    Enable and activate add_theme_support('custom-header', $args);. This feature allows the use of custom header to display
    images.
    ========================================================================================================================
    */
    $args = array(
        'default-text-color'    => 'ffffff',
        'default-image'         => get_theme_file_uri('/backdrop/assets/images/header-image.jpg'),
        'height'                => 300,
        'max-width'             => 2000,
        'width'                 => 1170,
        'flex-height'           => false,
        'flex-width'            => false,
    );
    add_theme_support('custom-header', $args);

    register_default_headers(array(
        'header-image' => array(
            'url'           => '%s/backdrop/assets/images/header-image.jpg',
            'thumbnail_url' => '%s/backdrop/assets/images/header-image.jpg',
            'description'   => esc_html__('Header Image', 'backdrop')
    )));
});

/*
============================================================================================================================
 2.0 - Custom Header (Inline Styles)
============================================================================================================================
*/
add_action('wp_enqueue_scripts', function() {
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
    wp_add_inline_style('backdrop-style', $custom_css);
});