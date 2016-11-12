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
@author         Benjamin Lu (https://www.lumiathemes.com/)
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
function white_spektrum_content_width() {
    $GLOBALS['content_width'] = apply_filters('white_spektrum_content_width', 780);
}
add_action('after_setup_theme', 'white_spektrum_content_width', 0);

/*
================================================================================================
 2.0 - Enqueue Styles and Scripts
================================================================================================
*/
function white_spektrum_enqueue_script_setup() {
    // Enable and activate the main stylesheet for White Spektrum.
    wp_enqueue_style('white-spektrum-style', get_stylesheet_uri());
    
    // Enable and active Google Fonts (Sanchez and Merriweather Sans) Locally for White Spektrum.
    wp_enqueue_style('splendid-portfolio-local-fonts', get_template_directory_uri() . '/extras/fonts/custom-fonts.css', '11012016', true);
    
    // Enable and activate Font Awesome for White Spektrum.
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '20160601', true);
    
    // Enable and Activate Navigation JavaScript for White Spektrum.
    wp_enqueue_script('splendid-portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20160601', true);
	wp_localize_script('splendid-portfolio-navigation', 'whitespektrumscreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'white-spektrum') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'white-spektrum') . '</span>',
	));
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'white_spektrum_enqueue_script_setup');

/*
================================================================================================
 3.0 - Theme Setup
================================================================================================
*/
function white_spektrum_theme_setup() {
    // Enable and Activate Add Theme Support (Title Tag) for White Spektrum.
    add_theme_support('title-tag');
    
    // Enable and Activate Add Theme Support (Automatic Feed Links) for White Spektrum.
    add_theme_support('automatic-feed-links');
    
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'gallery', 
        'caption'
    ));
    
    // Enable and Activate Navigation Menus for White Spektrum.
    register_nav_menus(array(
        'primary-navigation'    => esc_html__('Primary Navigation', 'white-spektrum'),
    ));
    
    // Enable and Activate Custom Background for White Spektrum.
    add_theme_support('custom-background', array(
        'default-color'   => 'ffffff',
    )); 
    
    // Enable and Activate Featured Image for White Spektrum.
    add_theme_support('post-thumbnails');
    add_image_size('white-spektrum-banner', 780, 250, true);
}
add_action('after_setup_theme', 'white_spektrum_theme_setup');

/*
================================================================================================
 4.0 - Register Sidebars
================================================================================================
*/
function white_spektrum_register_sidebars_setup() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'white-spektrum'),
        'description'   => __('When using the Primary Sidebar, widgets will display in the Posts section.', 'white-spektrum'),
        'id'            => 'primary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'white-spektrum'),
        'description'   => __('When using the Secondary Sidebar, widgets will display in the Pages section.', 'white-spektrum'),
        'id'            => 'secondary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'white-spektrum'),
        'id'            => 'custom-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Area', 'white-spektrum'),
        'id'            => 'footer-area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'white_spektrum_register_sidebars_setup');

/*
================================================================================================
 5.0 - Required Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/custom-header.php');
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/template-tags.php');