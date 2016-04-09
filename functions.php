<?php
/*
================================================================================================
Beyond Expectations - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being template-tags.php). This file is used to maintain the main 
functionality and features for this theme. The second file is the template-tags.php that contains 
the extra functions and features.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://luminathemes.com/contact/
@since          0.0.1
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
1.0 - Content Width
2.0 - Required Files
3.0 - Enqueue Styles and Scripts
4.0 - Main Theme Setup
5.0 - Filters
================================================================================================
*/

/*
================================================================================================
1.0 - Content Width
================================================================================================
*/
if (!function_exists('beyond_expectations_content_width')) {
    function beyond_expectations_content_width() {
        $GLOBALS['content_width'] = apply_filters('beyond_expectations_content_width', 800);
    }
    add_action('after_setup_theme', 'beyond_expectations_content_width', 0);
}

/*
================================================================================================
2.0 - Required Files
================================================================================================
*/
require(get_template_directory() . '/includes/template-tags.php');
require(get_template_directory() . '/includes/custom-header.php');
/*
================================================================================================
3.0 - Enqueue Styles and Scripts
================================================================================================
*/
if (!function_exists('beyond_expectations_scripts_setup')) {
    function beyond_expectations_scripts_setup() {
        wp_enqueue_style('beyond-expectations-style', get_stylesheet_uri());
        
        wp_enqueue_style('beyond-expectations-ubuntu-font', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic');
        
        wp_enqueue_style('beyond-expectations-font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '01012016', true);
        wp_enqueue_script('beyond-expectations-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '04062015', true);
        wp_enqueue_script('beyond-expectations-navigation-js', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '04062015', true);
        
        if (is_singular() && comments_open() && get_option('thread_comments'))
                wp_enqueue_script( 'comment-reply' );
    }
    add_action('wp_enqueue_scripts', 'beyond_expectations_scripts_setup');
}

/*
================================================================================================
4.0 - Main Theme Setup
================================================================================================
*/
if (!function_exists('beyond_expectations_theme_setup')) {
    function beyond_expectations_theme_setup() {
        // Load Text Domain
        load_theme_textdomain('beyond-expectations', get_template_directory() . '/languages');
        
        // Enable HTML5 Support for Beyond Expectations
        add_theme_support('html5', array('search-form', 'caption'));
        
        // Enable Title Tag for Beyond Expectations
        add_theme_support('title-tag');
        
        // Enable Automatic Feed Links for Beyond Expectations
        add_theme_support('automatic-feed-links');
    
        // Enable Custom Background and Image
        $args = array(
            'default-color' => 'ffffff',
        );
        add_theme_support('custom-background', $args);
        
        // Enable Featured Image
        add_theme_support('post-thumbnails');
        add_image_size('beyond-expectations-small-thumbnail', 180, 120, true);
        add_image_size('beyond-expectations-large-thumbnail', 800, 200, true);
        
        // Enable Primary and Social Navigation for Beyond Expectations
        register_nav_menus(array(
            'primary-navigation'    => esc_html__('Primary Navigation', 'beyond-expectations'),
            'social-navigation'     => esc_html__('Social Navigation', 'beyond-expectations'),
        ));
        
        
        

    }
    add_action('after_setup_theme', 'beyond_expectations_theme_setup');
}

/*
================================================================================================
5.0 - Filters
================================================================================================
*/
function beyond_expectations_the_title($title) {    
    if (!$title) {
        return __('No Title', 'beyond-expectations');
    }
    return $title;
}
add_filter('the_title', 'beyond_expectations_the_title');