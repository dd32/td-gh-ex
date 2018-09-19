<?php
/*
============================================================================================================================
Silver Quantum - header-image.php
============================================================================================================================
This header-image.php template file allows you to add features and functionality has been preset to be used in this WordPress 
theme which is store in the theme's framework directory.

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
 1.0 - Required Files
============================================================================================================================
*/ 

/*
============================================================================================================================
 1.0 - Required Files
============================================================================================================================
*/
function silver_quantum__header_image_inline_style_setup() {
    $header_image = esc_url(get_theme_mod('header_image', get_theme_file_uri('/framework/assets/images/header-image.jpg')));
    $custom_css = "
        .site-header.header-image{
            background: url({$header_image});
            background-repeat: no-repeat;
            padding: 7.188em;
        }
    ";
    wp_add_inline_style('silver-quantum-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'silver_quantum__header_image_inline_style_setup');