<?php
/*
================================================================================================
White Spektrum - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files
for a theme (the other being template-tags.php). This file is used to maintain the main
functionality and features for this theme. The second file is the template-tags.php that contains
the extra functions and features.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
================================================================================================
*/

/*
================================================================================================
Table of Contents
================================================================================================
 1.0 - Content Width
 2.0 - Require Files
 3.0 - Enqueue Styles and Scripts
 4.0 - Main Theme Setup
================================================================================================
*/

/*
================================================================================================
 1.0 - Content Width
================================================================================================
*/
if (!function_exists('white_spektrum_content_width')) {
    function white_spektrum_content_width() {
        $GLOBALS['content_width'] = apply_filters( 'white_spektrum_content_width', 800 );
    }
    add_action('after_setup_theme', 'white_spektrum_content_width', 0);
}

/*
================================================================================================
 2.0 - Require Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/template-tags.php');

/*
================================================================================================
 3.0 - Enqueue Styles and Scripts
================================================================================================
*/
function white_spektrum_scripts_setup() {
    // Add and Enable the Default Stylesheet
    wp_enqueue_style('white-spektrum-style', get_stylesheet_uri());
    
    // Add and Enable Google Fonts for Ubuntu
    wp_enqueue_style('white-spektrum-google-ubuntu', '//fonts.googleapis.com/css?family=Ubuntu:400,300,500');
    
    // Add and Enable Font Awesome
    wp_enqueue_style('white-spektrum-font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'white_spektrum_scripts_setup');

/*
================================================================================================
 4.0 - Main Theme Setup
================================================================================================
*/
function white_spektrum_theme_setup() {
    // Add and Enable Add Theme Support 
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
}
add_action('after_theme_setup', 'white_spektrum_theme_setup');