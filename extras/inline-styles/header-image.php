<?php
/*
===========================================================================================================
Family Grows - header-image.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of required file to display header 
image. This feature works by using wp_add_inline_style();.

@package        Family Grows WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/
function silver_quantum_inline_styles_header_image_setup() {
        $header_image = esc_url(get_theme_mod('header_image', get_template_directory_uri() . '/images/header-image.jpg'));
        $custom_css = "    
        .site-header.header-image {
            background: url({$header_image});
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: scroll;
        }
        ";
        wp_add_inline_style('silver-quantum-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'silver_quantum_inline_styles_header_image_setup');