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
namespace Benlumia007\Backdrop\Config;

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
function register_sidebars() {
    /*
    ========================================================================================================================
    Enable and activate primary sidebar which should only display in the posts/archives/search.
    ========================================================================================================================
     */
    register_sidebar(array(
        'name'          => esc_html__('Primary Sidebar', 'backdrop'),
        'description'   => esc_html__('Add widgets here to appear in your sidebar on Blog Posts and Archives only', 'backdrop'),
        'id'            => 'primary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    /*
    ========================================================================================================================
    Enable and activate secondary sidebar which should only display in pages
    ========================================================================================================================
     */
    register_sidebar(array(
        'name'          => esc_html__('Secondary Sidebar', 'backdrop'),
        'description'   => esc_html__('Add widgets here to appear in your sidebar on Blog Posts and Archives only', 'backdrop'),
        'id'            => 'secondary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    /*
    ========================================================================================================================
    Enable and activate custom sidebar which should only display in custom templates
    ========================================================================================================================
     */
    register_sidebar(array(
        'name'          => esc_html__('Custom Sidebar', 'backdrop'),
        'description'   => esc_html__('Add widgets here to appear in your sidebar on Blog Posts and Archives only', 'backdrop'),
        'id'            => 'custom-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', __NAMESPACE__ . "\\register_sidebars");