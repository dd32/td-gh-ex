<?php
$prefix = 'atlast-agency';

$wp_customize->add_section($prefix . '_home_team_section', array(
    'priority' => 11,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Team', 'atlast-agency'),
    'description' => esc_html__('Add your team members.', 'atlast-agency'),
    'panel' => $prefix . '_home_theme_panel',
));

$wp_customize->add_setting($prefix . '_enable_team_section', array(
    'default' => true,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_checkbox',
));

$wp_customize->add_setting($prefix . '_team_parent_page', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_dropdown_pages',
));

$wp_customize->add_control($prefix . '_enable_team_section', array(
    'type' => 'checkbox',
    'priority' => 6,
    'section' => $prefix . '_home_team_section',
    'label' => esc_html__('Enable this section.', 'atlast-agency'),
));
$wp_customize->add_control($prefix . '_team_parent_page', array(
    'type' => 'dropdown-pages',
    'priority' => 7,
    'section' => $prefix . '_home_team_section',
    'label' => esc_html__('This is the parent page of the team members.', 'atlast-agency'),
    'description' => esc_html__('By selecting the page above the this section will get the page\'s title and the excerpt as the subtitle. 
    Also all of its child pages will act as the team members and appear in that section.', 'atlast-agency')
));