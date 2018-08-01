<?php
$prefix = 'atlast-agency';

$wp_customize->add_section($prefix . '_header_section', array(
    'priority' => 11,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Navigation & Header Image section', 'atlast-agency'),
    'description' => '',
    'panel' => $prefix . '_theme_panel',
));

$wp_customize->add_setting($prefix . '_header_layout', array(
    'default' => 1,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
));


$wp_customize->add_setting($prefix . '_everywhere_header', array(
    'default' => 0,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
));

$wp_customize->add_setting($prefix . '_transparent_header', array(
    'default' => 0,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
));

$wp_customize->add_setting($prefix . '_sticky_header', array(
    'default' => 0,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
));

$wp_customize->add_setting($prefix . '_header_image_content', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_dropdown_pages',
));
$wp_customize->add_control($prefix . '_header_layout', array(
    'type' => 'select',
    'priority' => 10,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Select header (contains the navigation) style', 'atlast-agency'),
    'description' => esc_html__('There are more than one to choose from. Please refer to the documentation to view the available layouts.', 'atlast-agency'),
    'choices' => array(
        '1' => esc_html__('Style 1', 'atlast-agency'),

    )
));

$wp_customize->add_control($prefix . '_everywhere_header', array(
    'type' => 'select',
    'priority' => 11,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Do you want the header image to appear to all pages / posts etc?', 'atlast-agency'),
    'description' => esc_html__('If this is a "No" the header image (if any) will appear only to the homepage and the static front page.', 'atlast-agency'),
    'choices' => array(
        '0' => esc_html__('No - Only Front', 'atlast-agency'),
        '1' => esc_html__('Yes, everywhere', 'atlast-agency'),
    )
));

$wp_customize->add_control($prefix . '_transparent_header', array(
    'type' => 'select',
    'priority' => 12,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Add transparency to the header.', 'atlast-agency'),
    'description' => esc_html__('This works with header and slider enabled.', 'atlast-agency'),
    'choices' => array(
        '0' => esc_html__('No', 'atlast-agency'),
        '1' => esc_html__('Yes', 'atlast-agency'),
    )
));
$wp_customize->add_control($prefix . '_sticky_header', array(
    'type' => 'select',
    'priority' => 13,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Stick the header navigation at the top.', 'atlast-agency'),
    'description' => esc_html__('Enable this to set the main navigation fixed during the page scroll.', 'atlast-agency'),
    'choices' => array(
        '0' => esc_html__('No', 'atlast-agency'),
        '1' => esc_html__('Yes', 'atlast-agency'),
    )
));
$wp_customize->add_control($prefix . '_header_image_content', array(
    'type' => 'dropdown-pages',
    'priority' => 14,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Select the content of the header image(page).', 'atlast-agency'),
    'description'=> esc_html__('This is a page. If you apply a page ,then title of that page and its link will be visible ,not its featured image!','atlast-agency')
));