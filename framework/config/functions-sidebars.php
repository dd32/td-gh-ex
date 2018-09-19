<?php
/*
============================================================================================================================
Silver Quantum - framework/config/functions-sidebars.php
============================================================================================================================
This functions-sidebars.php template file allows you register and add sidebars to the current theme. It currently supports
primary, secondary, custom,  about me, and portfolio sidebars. 

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
 1.0 - Register Sidebars
============================================================================================================================
*/ 

/*
============================================================================================================================
 1.0 - Register Sidebars
============================================================================================================================
*/ 
function silver_quantum_register_sidebars() {
    /*
    ========================================================================================================================
    Enable and activate Primary Sidebar for Silver Quantum WordPress Theme. The Primary Sidebar should only show in the blog 
    posts only rather in the pages. 
    ========================================================================================================================
     */
    register_sidebar(array(
        'name'          => esc_html__('Primary Sidebar', 'silver-quantum'),
        'description'   => esc_html__('Add widgets here to appear in your sidebar on Blog Posts and Archives only', 'silver-quantum'),
        'id'            => 'primary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    )); 

    /*
    ========================================================================================================================
    Enable and activate Secondary Sidebar for Silver Quantum WordPress Theme. The Primary Sidebar should only show in the blog 
    posts only rather in the pages. 
    ========================================================================================================================
     */
    register_sidebar(array(
        'name'          => esc_html__('Secondary Sidebar', 'silver-quantum'),
        'description'   => esc_html__('Add widgets here to appear in your sidebar on Pages only', 'silver-quantum'),
        'id'            => 'secondary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    /*
    ========================================================================================================================
    Enable and activate Primary Sidebar for Camaraderie WordPress Theme. The Primary Sidebar should only show in the blog 
    posts only rather in the pages. 
    ========================================================================================================================
     */
    register_sidebar(array(
        'name'          => esc_html__('Custom Sidebar', 'silver-quantum'),
        'description'   => esc_html__('Add widgets here to appear in your sidebar on Blog Posts and Archives only', 'silver-quantum'),
        'id'            => 'custom-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'silver_quantum_register_sidebars');