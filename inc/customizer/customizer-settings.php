<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add Settings
//////////////////////////////////////////////////////////////////
function aster_theme_customizer( $wp_customize ) {

	// Add Sections
	$wp_customize->add_section( 'aster_general_settings_section' , array(
		'title'      => esc_html__('General Settings', 'aster'),
		'priority'   => 100,
	) );

	// Add Setting
	// General
	$wp_customize->add_setting(
		'aster_pre_loader',
		array(
			'default'     => false,
			'sanitize_callback' => 'esc_attr'
		)
	);

	// Add Control
	// General
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_pre_loader',
			array(
				'label'      => esc_html__('Disable Pre-loader', 'aster'),
				'section'    => 'aster_general_settings_section',
				'settings'   => 'aster_pre_loader',
				'type'		 => 'checkbox',
				'priority'	 => 4
			)
		)
	);

}
add_action( 'customize_register', 'aster_theme_customizer' );