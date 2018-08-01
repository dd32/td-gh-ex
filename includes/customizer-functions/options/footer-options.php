<?php
$prefix = atlast_agency_get_prefix();
$wp_customize->add_section($prefix . '_footer_section', array(
    'priority' => 16,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer section', 'atlast-agency'),
    'description' => '',
    'panel' => $prefix . '_theme_panel',
));

/*== Footer section settings ==*/
$wp_customize->add_setting($prefix . '_footer_layout', array(
    'default' => 1,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
));

$wp_customize->add_control($prefix . '_footer_layout', array(
    'type' => 'select',
    'priority' => 10,
    'section' => $prefix . '_footer_section',
    'label' => esc_html__('Select the footer(widget area) layout', 'atlast-agency'),
    'description' => esc_html__('You can have boxed and full width layout.', 'atlast-agency'),
    'choices' => array(
        1 => esc_html__('Boxed', 'atlast-agency'),
        2 => esc_html__('Full width', 'atlast-agency'),
    )
));
