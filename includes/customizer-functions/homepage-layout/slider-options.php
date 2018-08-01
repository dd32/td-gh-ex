<?php
$prefix = atlast_agency_get_prefix();
$wp_customize->add_section($prefix . '_slider_section', array(
    'priority' => 8,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Slider Options', 'atlast-agency'),
    'description' => esc_html__('You can have an slider with unlimited slides! If you enable this feature you have to remove the header image if you have set any. If not both the slider and the header image will appear.', 'atlast-agency'),
    'panel' => $prefix . '_home_theme_panel',
));

$wp_customize->add_setting($prefix . '_slider_parent_page', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_dropdown_pages',
));

$wp_customize->add_control($prefix . '_slider_parent_page', array(
    'type' => 'dropdown-pages',
    'priority' => 11,
    'section' => $prefix . '_slider_section',
    'label' => esc_html__('Select the parent page of the slider.', 'atlast-agency'),
    'description' => esc_html__('By selecting the page below, all its children pages will be act like the slides. 
    Refer to the documentation to see how you use this section.', 'atlast-agency')
));