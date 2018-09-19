<?php
/*
============================================================================================================================
Silver Quantum - framework/config/functions-setup.php
============================================================================================================================
This functions-setup.php template file allows you to add the basic features and functionality which as been preset to be used
in this theme. Our goal is to set all the necessary add_theme_support(); for this theme to be used.

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
 1.0 - Theme Setup
 2.0 - Theme Content Width
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Theme Setup
============================================================================================================================
*/
function silver_quantum_theme_setup() {
    /*
    ========================================================================================================================
    Enable and activate add_theme_support('title-tag'); for Silver Quantum WordPress theme. This feature should be used in 
    place of wp_title(); function.
    ========================================================================================================================
    */
    add_theme_support('title-tag');

    /*
    ========================================================================================================================
    Enable and activate add_theme_support('automatic-feed-links'); for Silver Quantum WordPress theme. This feature when 
    enabled allows feed links for posts and comments in the head of the theme. This feature should be used in place of the 
    deprecated automatic_feed_link();
    ========================================================================================================================
    */
    add_theme_support('automatic-feed-links'); 

    /*
    ========================================================================================================================
    Enable and activate add_theme_support('html', array()); for Silver Quantum WordPress theme. This feature allows the use 
    of HTML5 markup for comment list, comment form, search form, gallery and captions.
    ========================================================================================================================
    */
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption'
    )); 

    /*
    ========================================================================================================================
    Enable and activate add_theme_support('custom-background'); for Silver Quantum WordPress theme. This feature allows you 
    to choose any background image and background color which ever you prefer.
    ========================================================================================================================
    */
    add_theme_support('custom-background', array(
        'default-color' => 'cccccc',
    )); 

    /*
    ========================================================================================================================
    Enable and activate register_nav_menus(array()); for Silver Quantum WordPress theme. This feature when enabled, you can 
    create a Primary Navigation, Secondary Navigation, and Social Navigation menus in the dashboard under menus.
    ========================================================================================================================
    */
    register_nav_menus(array(
        'primary'    => esc_html__('Primary Navigation', 'silver-quantum'),
        'secondary'  => esc_html__('Secondary Navigation', 'silver-quantum'),
        'social'     => esc_html__('Social Navigation', 'silver-quantum')
    )); 

    /*
    ========================================================================================================================
    Enable and activate add_theme_support('post-thumbnails'); for Silver Quantum WordPress theme. This feature when enabled 
    allows you to set post thumbnails (Featured Images) for the theme. If you wish to display post thumbnails, use the 
    following to display the_post_thumbnail();. If you wish to check if there's a post, then use has_post_thumbnail.
    ========================================================================================================================
    */
    add_theme_support('post-thumbnails');

    /*
    ========================================================================================================================
    add_image_size('silver-quantum-medium-thumbnail', 810, 396, true); should be used under the following files, content.php
    ========================================================================================================================
    */
    add_image_size('silver-quantum-medium-thumbnails', 810, 396, true);

    /*
    ========================================================================================================================
    add_image_size('silver-quantum-large-thumbnail', 1134, 549, true); should be used under the following files, content.php
    ========================================================================================================================
    */
    add_image_size('silver-quantum-large-thumbnails', 1134, 549, true);

    /*
    ========================================================================================================================
    Enable and activate add_theme_support('post-formats'); for Silver Quantum WordPress theme. This theme only supports quotes
    for now.
    ========================================================================================================================
    */
    add_theme_support('post-formats', array('quote')); 

    /*
    ========================================================================================================================
    Enable and activate load_theme_textdomain('silver-quantum'); for Silver Quantum WordPress theme. This feature make this 
    theme available for translation. 
    ========================================================================================================================
    */
    load_theme_textdomain('silver-quantum');
    
    /*
    ========================================================================================================================
    add_post_type_support('page', 'excerpt'); should be used under the pages, you will need to select Excerpt in the Screen 
    Option to enable this feature.
    ========================================================================================================================
    */
    add_post_type_support('page', 'excerpt');
}
add_action('after_setup_theme', 'silver_quantum_theme_setup');

/*
============================================================================================================================
 2.0 - Theme Content Width
============================================================================================================================
*/
function silver_quantum_content_width_setup() {
	$GLOBALS['content_width'] = apply_filters('silver_quantum_content_width_setup', 810);
}
add_action('after_setup_theme', 'silver_quantum_content_width_setup', 0);