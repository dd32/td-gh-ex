<?php
/*
============================================================================================================================
Backdrop - backdrop/config/functions-setup.php
============================================================================================================================
This functions-setup.php template file allows you to add the basic features and functionality which as been preset to be used
in this theme. Our goal is to set all the necessary add_theme_support(); for this theme to be used.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
namespace Backdrop;

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Theme Setup
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Theme Setup
============================================================================================================================
*/
add_action('after_setup_theme', function() {
    /*
    ========================================================================================================================
    Enable and activate add_theme_support('title-tag);. This feature should be used in place of wp_title(); function.
    ========================================================================================================================
    */
    add_theme_support('title-tag');

    /*
    ========================================================================================================================
    Enable and activate add_theme_support('automatic-feed-links');. This feature when enabled allows feed links for posts 
    and comments in the head of the theme. This feature should be used in place of the deprecated automatic_feed_link();
    ========================================================================================================================
    */
    add_theme_support('automatic-feed-links'); 

    /*
    ========================================================================================================================
    Enable and activate add_theme_support('html', array());. This feature allows the use of HTML5 markup for comment list, 
    comment form, search form, gallery and captions.
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
    Enable and activate register_nav_menus(array());. This feature when enabled, you can create a Primary Navigation, 
    Secondary Navigation, and Social Navigation menus in the dashboard under menus.
    ========================================================================================================================
    */
    register_nav_menus(array(
        'primary'    => esc_html__('Primary Navigation', 'backdrop'),
        'secondary'  => esc_html__('Secondary Navigation', 'backdrop'),
        'social'     => esc_html__('Social Navigation', 'backdrop')
    )); 

    /*
    ========================================================================================================================
    Enable and activate add_theme_support('post-thumbnails');. This feature when enabled allows you to set post thumbnails 
    (Featured Images) for the theme. If you need to use  conditional, please use has_post_thumbnail.
    ========================================================================================================================
    */
    add_theme_support('post-thumbnails');

    /*
    ========================================================================================================================
    add_image_size('backdrop-medium-thumbnail', 300, 300, true); should be used under the following files, content.php
    ========================================================================================================================
    */
    add_image_size('backdrop-small-thumbnails', 300, 300, true);

    /*
    ========================================================================================================================
    add_image_size('backdrop-medium-thumbnail', 810, 396, true); should be used under the following files, content.php
    ========================================================================================================================
    */
    add_image_size('backdrop-medium-thumbnails', 810, 396, true);

    /*
    ========================================================================================================================
    add_image_size('backdrop-large-thumbnail', 1134, 549, true); should be used under the following files, content.php
    ========================================================================================================================
    */
    add_image_size('backdrop-large-thumbnails', 1134, 549, true);

    /*
    ========================================================================================================================
    Enable and activate load_theme_textdomain('backdrop', get_parent_theme_file_path());. This feature make this theme 
    available for translation. 
    ========================================================================================================================
    */
    load_theme_textdomain('backdrop', get_parent_theme_file_path('resources/lang'));

    /*
    ========================================================================================================================
    Enable and activate content width;.
    ========================================================================================================================
    */
    $GLOBALS['content_width'] = 810;
});
