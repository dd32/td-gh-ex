<?php
$prefix = 'atlast-agency';

$wp_customize->add_section( $prefix . '_home_portfolio_section', array(
	'priority'       => 10,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Portfolio', 'atlast-agency'),
	'description'    => esc_html__( 'Add your projects.', 'atlast-agency'),
	'panel'          => $prefix . '_home_theme_panel',
) );

$wp_customize->add_setting( $prefix . '_enable_portfolio_section', array(
	'default'           => true,
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'atlast_agency_sanitize_checkbox',
) );

$wp_customize->add_setting($prefix . '_portfolio_parent_page', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'atlast_agency_sanitize_dropdown_pages',
));

$wp_customize->add_setting($prefix . '_portfolio_items', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_textarea_field',
));

$wp_customize->add_setting($prefix . '_portfolio_style', array(
	'default' => 1,
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
));

$wp_customize->add_setting($prefix . '_portfolio_layout', array(
	'default' => 1,
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'atlast_agency_sanitize_number_absint',
));


$wp_customize->add_control( $prefix . '_enable_portfolio_section', array(
	'type'     => 'checkbox',
	'priority' => 6,
	'section'  => $prefix . '_home_portfolio_section',
	'label'    => esc_html__( 'Enable this section.', 'atlast-agency'),
) );
$wp_customize->add_control($prefix . '_portfolio_parent_page', array(
	'type' => 'dropdown-pages',
	'priority' => 7,
	'section' => $prefix . '_home_portfolio_section',
	'label' => esc_html__('This is the parent page of the projects.', 'atlast-agency'),
	'description' => esc_html__('By selecting the page above the this section will get the page\'s title and the excerpt as the subtitle. 
    Refer to the documentation to see how you use this section.', 'atlast-agency')
));

$wp_customize->add_control( $prefix . '_portfolio_items', array(
	'type' => 'textarea',
	'priority' => 8,
	'section' => $prefix . '_home_portfolio_section',
	'label' => esc_html__('Portfolio Items by slug', 'atlast-agency'),
	'description' => esc_html__('Add a comma separated list of pages using their unique slugs eg my-page,my-other-page. All of your pages should have a featured image.', 'atlast-agency'),
));

$wp_customize->add_control($prefix . '_portfolio_style', array(
	'type' => 'select',
	'priority' => 9,
	'section' => $prefix . '_home_portfolio_section',
	'label' => esc_html__('Portfolio Style', 'atlast-agency'),
	'description' => esc_html__('Choose your favorite one', 'atlast-agency'),
	'choices' => array(
		'1' => esc_html__('1 Large  - 4 Smaller Projects (5 Projects)', 'atlast-agency'),
		'2' => esc_html__('2 Small - 1 Large - 2 Small Project (5 Projects)', 'atlast-agency'),
		'3' => esc_html__('3 Columns each (4/row) (Unlimited Projects)', 'atlast-agency'),
		'4' => esc_html__('4 Columns each (3/row) (Unlimited Projects)', 'atlast-agency'),

	)
));
$wp_customize->add_control($prefix . '_portfolio_layout', array(
	'type' => 'select',
	'priority' => 10,
	'section' => $prefix . '_home_portfolio_section',
	'label' => esc_html__('Portfolio Layout', 'atlast-agency'),
	'description' => esc_html__('Boxed or Full width?', 'atlast-agency'),
	'choices' => array(
		'1' => esc_html__('Boxed', 'atlast-agency'),
		'2' => esc_html__('Full Width', 'atlast-agency'),

	)
));