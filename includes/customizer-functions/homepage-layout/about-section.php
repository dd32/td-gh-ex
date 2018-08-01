<?php
$prefix = 'atlast-agency';
$wp_customize->add_section( $prefix . '_home_about_section', array(
	'priority'       => 9,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'About Section', 'atlast-agency' ),
	'description'    => esc_html__( 'The first section below the featured categories.', 'atlast-agency'),
	'panel'          => $prefix . '_home_theme_panel',
) );

$wp_customize->add_setting( $prefix . '_home_about_page', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'atlast_agency_sanitize_dropdown_pages',
) );


$wp_customize->add_setting($prefix . '_home_about_style', array(
	'default' => 1,
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
));

$wp_customize->add_control( $prefix . '_home_about_page', array(
	'type'        => 'dropdown-pages',
	'priority'    => 9,
	'section'     => $prefix . '_home_about_section',
	'label'       => esc_html__( 'Select the page to show.', 'atlast-agency'),
	'description' => esc_html__( 'Please use a featured image ,title and an excerpt.', 'atlast-agency')
) );

$wp_customize->add_control($prefix . '_home_about_style', array(
	'type' => 'select',
	'priority' => 10,
	'section' => $prefix . '_home_about_section',
	'label' => esc_html__('Select the about section style.', 'atlast-agency'),
	'description' => esc_html__('Well if you select the second one it is better to have a tall featured image assigned.', 'atlast-agency'),
	'choices' => array(
		'1' => esc_html__('Style 1', 'atlast-agency'),
		'2' => esc_html__('Style 2', 'atlast-agency'),

	)
));