<?php
/*
================================================================================================
Barista - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being template-tags.php). This file is used to maintain the main 
functionality and features for this theme. The second file is the template-tags.php that contains 
the extra functions and features.

@package        Barista WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)


require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/template-tags.php');

================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Content Width
 2.0 - Enqueue Styles and Scripts
 3.0 - Theme Setup
 4.0 - Register Sidebars
 5.0 - Required Files
================================================================================================
*/

/*
================================================================================================
 1.0 - Content Width
================================================================================================
*/
function barista_content_width_setup() {
    $GLOBALS['content_width'] = apply_filters('barista_content_width_setup', 680);
}
add_action('after_setup_theme', 'barista_content_width_setup', 0);

/*
================================================================================================
 2.0 - Enqueue Styles and Scripts
================================================================================================
*/
function barista_enqueue_scripts_setup() {
    // Enable and activate the main stylehseet for Barista.
    wp_enqueue_style('barista-style', get_stylesheet_uri());
    
    // Enable and Activate Font Awesome for Barista.
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '20160601', true);
    
    // Enable and activate Google Font (Sanchez) for Barista.
    wp_enqueue_style('barista-google-font', '//fonts.googleapis.com/css?family=Sanchez:400,400italic');
    
    // Enable and Activate Navigation JavaScript for Barista.
    wp_enqueue_script('barista-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20160601', true);
	wp_localize_script('barista-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'barista') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'barista') . '</span>',
	));
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'barista_enqueue_scripts_setup');

/*
================================================================================================
 3.0 - Theme Setup
================================================================================================
*/
function barista_theme_setup() {
    // Enable and activate add theme support (title tag) for Barista.
    add_theme_support('title-tag');
    
    // Enable and activate add theme support (automatica feed links) for Barista.
    add_theme_support('automatic-feed-links');
    
    // Enable and activate add theme support (html5) for Barista.
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'caption'
    ));
    
    // Enable and activate custom background for Barista.
    add_theme_support('custom-background', array(
        'default-color'      => 'e6e3d4',
    ));
    
    // Enable and activate Feature Images for Barista.
    add_theme_support('post-thumbnails');
    add_image_size('barista-banner', 680, 211, true);
    
    // Enable and activate Navigation for Barista.
    register_nav_menus(array(
    'primary-navigation' => esc_html__('Primary Navigation', 'barista'),
    ));
}
add_action('after_setup_theme', 'barista_theme_setup');

/*
================================================================================================
 4.0 - Register Sidebars
================================================================================================
*/
function barista_register_sidebars_setup() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'barista'),
        'id'            => 'primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));    

    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'barista'),
        'id'            => 'secondary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));  
    
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'barista'),
        'id'            => 'custom',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));  
}
add_action('widgets_init', 'barista_register_sidebars_setup');


/*
================================================================================================
 5.0 - Required Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/custom-header.php');
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/template-tags.php');