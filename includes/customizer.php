<?php
/*
================================================================================================
Amity - customizer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        Amity WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Load Customize Classes ($wp_customize)
 2.0 - Customize Register (Setup)
 2.0 - Customize Register (Validation)
 3.0 - Customize Register (Preview)
================================================================================================
*/

/*
================================================================================================
 1.0 - Customize Register (Setup)
================================================================================================
*/
function white_spektrum_customize_classes($wp_customize) {
    // Load Customize Classses for White Spektrum.
    require_once(get_template_directory() . '/customize/customize-radio-image.php');
    
    // Register Control Types for White Spektrum.
    $wp_customize->register_control_type('White_Spektrum_Control_Radio_Image');
}
add_action('customize_register', 'white_spektrum_customize_classes', 0);





/*
================================================================================================
 1.0 - Load Customize Classes ($wp_customize)
 2.0 - Global Layouts Customizer Setup
================================================================================================
*/
function white_spektrum_customize_register_setup($wp_customize) {    
    
    $wp_customize->add_section('global_layouts', array(
        'title' => esc_html__('Global Layouts', 'white-spektrum'),
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('theme_layouts', array(
        'default'       => 'default',
        'sanitize_callback' => 'white_spektrum_sanitize_layout',
    ));
    
    $wp_customize->add_control(new White_Spektrum_Control_Radio_Image($wp_customize, 'theme_layouts', array(
        'label'     => __('Global Layouts', 'white-spektrum'),
        'section'   => 'global_layouts',
        'settings'  => 'theme_layouts',
        'type'      => 'radio-image',
        'choices'  => array(
            'default' => array(
                'label' => esc_html__('Default', 'white-spektrum'),
                'url'   => '%s/images/1col.png',
            ),
            'sidebar-left' => array(
                'label' => esc_html__('Left Sidebar', 'white-spektrum'),
                'url'   => '%s/images/2cl.png',
            ),
            'sidebar-right' => array(
                'label' => esc_html__('Right Sidebar', 'white-spektrum'),
                'url'   => '%s/images/2cr.png',
            ),
        ),
    )));
    
}
add_action('customize_register', 'white_spektrum_customize_register_setup', 5);

/*
================================================================================================
 2.0 - Customize Register (Validation)
================================================================================================
*/
function white_spektrum_sanitize_checkbox($checked) {
    return((isset($checked) && true == $checked) ? true : false);
}

function white_spektrum_sanitize_layout($value) {
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
