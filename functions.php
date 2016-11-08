<?php
/*
================================================================================================
Silver Quantum - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being template-tags.php). This file is used to maintain the main 
functionality and features for this theme. The second file is the template-tags.php that contains 
the extra functions and features.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
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
function silver_quantum_content_width_setup() {
    $GLOBALS['content_width'] = apply_filters('silver_quantum_content_width_setup', 850);
}
add_action('after_setup_theme', 'silver_quantum_content_width_setup', 0);

/*
================================================================================================
 2.0 - Enqueue Styles and Scripts
================================================================================================
*/
function silver_quantum_enqueue_scripts_setup() {
    // Enable and Activate the main stylesheet for Silver Quantum.
    wp_enqueue_style('silver-quantum-style', get_stylesheet_uri());
    
    // Enable and Activate Font Awesome for Silver Quantum.
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '20160601', true);
    
    // Enable and activate Google Font (Ubuntu) for Silver Quantum.
    wp_enqueue_style('silver-quantum-ubuntu', '//fonts.googleapis.com/css?family=Merriweather+Sans:400,400i,700,700i|Sanchez:400,400i');
    
    // Enable and Activate Navigation JavaScript for Silver Quantum.
    wp_enqueue_script('silver-quantum-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20160601', true);
	wp_localize_script('silver-quantum-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'silver-quantum') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'silver-quantum') . '</span>',
	));
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'silver_quantum_enqueue_scripts_setup');

/*
================================================================================================
 3.0 - Theme Setup
================================================================================================
*/
function silver_quantum_theme_setup() {
    // Enable and activate add theme support (title tag) for Silver Quantum.
    add_theme_support('title-tag');
    
    // Enable and activate add theme support (automatica feed links) for Silver Quantum.
    add_theme_support('automatic-feed-links');
    
    // Enable and activate add theme support (html5) for Silver Quantum.
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'caption'
    ));
    
    // Enable and activate add theme support (custom background) for Silver Quantum.
    add_theme_support('custom-background', array(
        'default' => 'cccccc',
    ));
    
    register_nav_menus(array(
        'primary-navigation'    => esc_html__('Primary Navigation', 'silver-quantum'),
    ));
}
add_action('after_setup_theme', 'silver_quantum_theme_setup');

/*
================================================================================================
 4.0 - Register Sidebars
================================================================================================
*/
function silver_quantum_register_sidebars_setup() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'silver-quantum'),
        'id'            => 'primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));    

    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'silver-quantum'),
        'id'            => 'secondary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));  
    
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'silver-quantum'),
        'id'            => 'custom',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));  
}
add_action('widgets_init', 'silver_quantum_register_sidebars_setup');
/*
================================================================================================
 5.0 - Required Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/custom-header.php');
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/template-tags.php');