<?php
require trailingslashit(get_template_directory()) . 'includes/customizer-functions/extra-controls.php';
$prefix = atlast_agency_get_prefix();

$wp_customize->register_section_type('Atlast_Agency_Customize_Section_Getting_Started');
$wp_customize->add_panel($prefix . '_home_theme_panel', array(
    'priority' => 4,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Atlast Agency - Homepage', 'atlast-agency'),
    'description' => esc_html__('This settings apply to the page you have set as the homepage in the "Settings > Reading Section".', 'atlast-agency'),
));
require_once (get_template_directory().'/includes/customizer-functions/homepage-layout/about-section.php');
$wp_customize->add_panel($prefix . '_theme_panel', array(
    'priority' => 5,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Atlast Agency - Theme Options', 'atlast-agency'),
    'description' => esc_html__('A lot of options to customize your website completely.', 'atlast-agency'),
));

$wp_customize->add_section(
	new Atlast_Agency_Customize_Section_Getting_Started(
		$wp_customize,
		'getting_started',
		array(
			'title' => esc_html__('Getting Started & Docs', 'atlast-agency'),
			'button_txt' => esc_html__('Getting Started / Docs ', 'atlast-agency'),
			'button_url'=>esc_url( admin_url( 'themes.php?page=atlast-agency-hello' ) ),
			'priority' => 1,
			'capability' => 'edit_theme_options',
		)
	)
);


require_once (get_template_directory().'/includes/customizer-functions/options/header-image-options.php');
require_once (get_template_directory().'/includes/customizer-functions/options/footer-options.php');
require_once (get_template_directory().'/includes/customizer-functions/options/copyright-options.php');
require_once(get_template_directory().'/includes/customizer-functions/homepage-layout-sections.php');
