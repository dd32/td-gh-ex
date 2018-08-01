<?php
$prefix = 'atlast-agency';
$wp_customize->add_section($prefix . '_home_featured_categories_section', array(
    'priority' => 8,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Featured Categories', 'atlast-agency'),
    'description' => esc_html__('Show some of your best categories on the front page.', 'atlast-agency'),
    'panel' => $prefix . '_home_theme_panel',
));
/* Home about section */

$wp_customize->add_setting($prefix . '_featured_categories_field', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting($prefix . '_featured_categories_style', array(
    'default' => '1',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
));

$wp_customize->add_control($prefix . '_featured_categories_field', array(
    'type' => 'text',
    'priority' => 11,
    'section' => $prefix . '_home_featured_categories_section',
    'label' => esc_html__('Add the exact names of the product categories, comma separated', 'atlast-agency'),
    'description' => esc_html__('Add the exact name and respect the case eg Shoes is different than shoes.', 'atlast-agency'),
));
$wp_customize->add_control($prefix . '_featured_categories_style', array(
	'type' => 'select',
	'priority' => 12,
	'section' => $prefix . '_home_featured_categories_section',
	'label' => esc_html__('The style of the featured categories', 'atlast-agency'),
	'description' => esc_html__('Choose your preferred layout.', 'atlast-agency'),
	'choices' => array(
		'1' => esc_html__('Style 1', 'atlast-agency'),
		'2' => esc_html__('Style 2', 'atlast-agency'),
	)
));