<?php
/*
================================================================================================
White Spektrum - customizer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

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
 1.0 - Load Customize Radio Image Class
 2.0 - Customize Register (Setup)
 3.0 - Customize Register (Validation)
 4.0 - Customize Register (Preview)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Customize Radio Image
 2.0 - Customize Register (Setup)
 3.0 - Customize Register (Validation)
 4.0 - Customize Register (Preview)
================================================================================================
*/
function white_spektrum_custom_classes_setup($wp_customize) {
    require_once(get_template_directory() . '/customize/customize-radio-image.php');
    
    $wp_customize->register_control_type('White_Spektrum_Control_Radio_Image');
}
add_action('customize_register', 'white_spektrum_custom_classes_setup');


/*
================================================================================================
 2.0 - Customize Register (Setup)
================================================================================================
*/
function white_spektrum_customize_register_setup($wp_customize) {
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    $wp_customize->remove_control('display_header_text');

    // Enable and activate Post Layout for White Spektrum.
    $wp_customize->add_panel('general_layouts', array(
        'title' => esc_html__('General Layouts', 'white-spektrum'),
        'priority'  => 5
    ));
    
    $wp_customize->add_section('post_layout', array(
        'title'     => esc_html__('Post Layout', 'white-spektrum'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('post_layout', array(
        'default'       => 'sidebar-right',
        'sanitize_callback' => 'white_spektrum_sanitize_layout',
    ));
    
    $wp_customize->add_control(new White_Spektrum_Control_Radio_Image($wp_customize, 'post_layout', array(
        'label'     => __('Post Layout', 'white-spektrum'),
        'section'   => 'post_layout',
        'settings'  => 'post_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'sidebar-right' => array(
                'label' => esc_html__('Right Sidebar (Default)', 'white-spektrum'),
                'url'   => '%s/images/2cr.png',
            ),
            'sidebar-left' => array(
                'label' => esc_html__('Left Sidebar', 'white-spektrum'),
                'url'   => '%s/images/2cl.png',
            ),
            'full-width' => array(
                'label' => esc_html__('Content Full', 'white-spektrum'),
                'url'   => '%s/images/1col.png',
            ),
        ),
    )));
    
    // Enable and activate Page Layout for White Spektrum.
    $wp_customize->add_section('page_layout', array(
        'title'     => esc_html__('Page Layout', 'white-spektrum'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('page_layout', array(
        'default'       => 'sidebar-right',
        'sanitize_callback' => 'white_spektrum_sanitize_layout',
    ));
    
    $wp_customize->add_control(new White_Spektrum_Control_Radio_Image($wp_customize, 'page_layout', array(
        'label'     => __('Page Layout', 'white-spektrum'),
        'section'   => 'page_layout',
        'settings'  => 'page_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'sidebar-right' => array(
                'label' => esc_html__('Right Sidebar (Default)', 'white-spektrum'),
                'url'   => '%s/images/2cr.png',
            ),
            'sidebar-left' => array(
                'label' => esc_html__('Left Sidebar', 'white-spektrum'),
                'url'   => '%s/images/2cl.png',
            ),
            'full-width' => array(
                'label' => esc_html__('Content Full', 'white-spektrum'),
                'url'   => '%s/images/1col.png',
            ),
        ),
    )));
    
    // Enable and activate Custom Layout for White Spektrum.
    $wp_customize->add_section('custom_layout', array(
        'title'     => esc_html__('Custom Layout', 'white-spektrum'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('custom_layout', array(
        'default'       => 'sidebar-right',
        'sanitize_callback' => 'white_spektrum_sanitize_layout',
    ));
    
    $wp_customize->add_control(new White_Spektrum_Control_Radio_Image($wp_customize, 'custom_layout', array(
        'label'     => __('Custom Layout', 'white-spektrum'),
        'section'   => 'custom_layout',
        'settings'  => 'custom_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'sidebar-right' => array(
                'label' => esc_html__('Right Sidebar (Default)', 'white-spektrum'),
                'url'   => '%s/images/2cr.png',
            ),
            'sidebar-left' => array(
                'label' => esc_html__('Left Sidebar', 'white-spektrum'),
                'url'   => '%s/images/2cl.png',
            ),
            'full-width' => array(
                'label' => esc_html__('Content Full', 'white-spektrum'),
                'url'   => '%s/images/1col.png',
            ),
        ),
    )));
    
    // Enable and activate extra colors for White Spektrum.
    $wp_customize->add_setting('body_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_text_color', array(
        'label'        => __( 'Body Color', 'white-spektrum' ),
        'section'    => 'colors',
        'settings'   => 'body_text_color',
    )));
    
    // Enable and activate extra colors for White Spektrum.
    $wp_customize->add_setting('body_link_color', array(
        'default'           => '#1d1d1d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_link_color', array(
        'label'        => __( 'Body Link Color', 'white-spektrum' ),
        'section'    => 'colors',
        'settings'   => 'body_link_color',
    )));
    
    // Enable and activate extra colors for White Spektrum.
    $wp_customize->add_setting('body_link_color_hover', array(
        'default'           => '#1d1d1d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_link_color_hover', array(
        'label'        => __( 'Body Link Color Hover', 'white-spektrum' ),
        'section'    => 'colors',
        'settings'   => 'body_link_color_hover',
    )));
    
}
add_action('customize_register', 'white_spektrum_customize_register_setup');

/*
================================================================================================
 3.0 - Customize Register (Validation)
================================================================================================
*/
function white_spektrum_sanitize_checkbox($checked) {
    return((isset($checked) && true == $checked) ? true : false);
}

function white_spektrum_sanitize_layout($value) {
    if (!in_array($value, array('sidebar-right', 'sidebar-left', 'full-width'))) {
        $value = 'sidebar-right';
    }
    return $value;
}

function white_spektrum_custom_colors_css() { ?>
    <style type="text/css">
        body {
            color: <?php echo esc_html(get_theme_mod('body_text_color', '#1d1d1d')); ?>;
        }

        a {
            color: <?php echo esc_html(get_theme_mod('body_link_color', '#1a1a1a')); ?>;
        }

        a:hover {
            color: <?php echo esc_html(get_theme_mod('body_link_color_hover', '#1d1d1d')); ?>
        }
    </style>
<?php
}
add_action('wp_head', 'white_spektrum_custom_colors_css');

/*
================================================================================================
 4.0 - Customize Register (Preview)
================================================================================================
*/
function white_spektrum_customize_preview_js() {
    // Enable and activate Customize Preview JavaScript for White Spektrum.
    wp_enqueue_script('white-spektrum-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array('customize-preview'), '20161111', true);
}
add_action('customize_preview_init', 'white_spektrum_customize_preview_js');