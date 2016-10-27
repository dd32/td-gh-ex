<?php
/*
================================================================================================
Barista - customizer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        Barista WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Customize Register (Setup)
 2.0 - Customize Register (Validation)
 3.0 - Customize Register (Preview)
================================================================================================
*/

/*
================================================================================================
 1.0 - Customize Register (Setup)
================================================================================================
*/
function barista_customize_register_setup($wp_customize) {
    // Enable and disable Display Site Title and Tagline for Barista.
    $wp_customize->remove_control('display_header_text');
    
// General Layout
    $wp_customize->add_panel('barista_general_layout', array(
        'title' => esc_html__('General Layout', 'barista'),
        'description'   => __('This section is mainly for the blogs, you can choose either to have the sidebar on the left or right or default.', 'barista'),
        'priority'      => 5
    ));
    
    $wp_customize->add_section('barista_blog_layout_options', array(
        'title' => esc_html__('Blog Layout', 'barista'),
        'description'   => __('This section is mainly for the blogs, you can choose either to have the sidebar on the left or right or default.', 'barista'),
        'panel'         => 'barista_general_layout',
        'priority'      => 10
    ));

    $wp_customize->add_setting('barista_blog_layout_settings', array(
        'default'   => 'default',
        'sanitize_callback'  => 'barista_sanitize_layout'
    ));

    $wp_customize->add_control('barista_blog_layout_settings', array(
        'label' => esc_html__('Blog Layout', 'barista'),
        'section'   => 'barista_blog_layout_options',
        'settings'  => 'barista_blog_layout_settings',
        'type'      => 'radio',
            'choices'   => array(
                'default'           => esc_html__('Default (No Sidebar)', 'barista'),
                'sidebar-left'      => esc_html__('Left Sidebar', 'barista'),
                'sidebar-right'     => esc_html__('Right Sidebar', 'barista')
    )));
    
    $wp_customize->add_section('barista_page_layout_options', array(
        'title' => esc_html__('Page Layout', 'barista'),
        'description'   => __('This section is mainly for the blogs, you can choose either to have the sidebar on the left or right or default.', 'barista'),
        'panel'         => 'barista_general_layout',
        'priority'      => 10
    ));
    
    $wp_customize->add_setting('barista_page_layout_settings', array(
        'default'   => 'default',
        'sanitize_callback'  => 'barista_sanitize_layout'
    ));

    $wp_customize->add_control('barista_page_layout_settings', array(
        'label' => esc_html__('Page Layout', 'barista'),
        'section'   => 'barista_page_layout_options',
        'settings'  => 'barista_page_layout_settings',
        'type'      => 'radio',
            'choices'   => array(
                'default'           => esc_html__('Default (No Sidebar)', 'barista'),
                'sidebar-left'      => esc_html__('Left Sidebar', 'barista'),
                'sidebar-right'     => esc_html__('Right Sidebar', 'barista')
    )));
    
    $wp_customize->add_section('barista_custom_layout_options', array(
        'title' => esc_html__('Custom Layout', 'barista'),
        'description'   => __('The Custom Layout is enabled by using the custom templates (Custom Sidebar).', 'barista'),
        'panel'         => 'barista_general_layout',
        'priority'      => 10
    ));
    
    $wp_customize->add_setting('barista_custom_layout_settings', array(
        'default'   => 'default',
        'sanitize_callback'  => 'barista_sanitize_layout'
    ));

    $wp_customize->add_control('barista_custom_layout_settings', array(
        'label' => esc_html__('Custom Layout', 'barista'),
        'section'   => 'barista_custom_layout_options',
        'settings'  => 'barista_custom_layout_settings',
        'type'      => 'radio',
            'choices'   => array(
                'default'           => esc_html__('Default (No Sidebar)', 'barista'),
                'sidebar-left'      => esc_html__('Left Sidebar', 'barista'),
                'sidebar-right'     => esc_html__('Right Sidebar', 'barista')
    )));
    
}
add_action('customize_register', 'barista_customize_register_setup');

/*
================================================================================================
 2.0 - Customize Register (Validation)
================================================================================================
*/
function barista_sanitize_checkbox($checked) {
    return((isset($checked) && true == $checked) ? true : false);
}

function barista_sanitize_layout($value) {
    if (!in_array($value, array('default', 'sidebar-left', 'sidebar-right'))) {
        $value = 'default';
    }
    return $value;
}

/*
================================================================================================
 3.0 - Customize Register (Preview)
================================================================================================
*/