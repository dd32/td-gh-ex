<?php
/**
 * Register Header Content section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'rubine_customize_register_header_settings' );

function rubine_customize_register_header_settings( $wp_customize ) {

	// Add Sections for Header Content
	$wp_customize->add_section( 'rubine_section_header', array(
        'title'    => esc_html__( 'Header Area', 'rubine-lite' ),
        'priority' => 20,
		'panel' => 'rubine_options_panel' 
		)
	);

	// Add Header Content Header
	$wp_customize->add_setting( 'rubine_theme_options[header_content]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Rubine_Customize_Header_Control(
        $wp_customize, 'rubine_theme_options[header_content]', array(
            'label' => esc_html__( 'Header Content', 'rubine-lite' ),
            'section' => 'rubine_section_header',
            'settings' => 'rubine_theme_options[header_content]',
            'priority' => 2
            )
        )
    );

	// Add Settings and Controls for Header
	$wp_customize->add_setting( 'rubine_theme_options[header_search]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_theme_options[header_search]', array(
        'label'    => esc_html__( 'Display search field on header area', 'rubine-lite' ),
        'section'  => 'rubine_section_header',
        'settings' => 'rubine_theme_options[header_search]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);

	$wp_customize->add_setting( 'rubine_theme_options[header_icons]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_theme_options[header_icons]', array(
        'label'    => esc_html__( 'Display Social Icons on header area', 'rubine-lite' ),
        'section'  => 'rubine_section_header',
        'settings' => 'rubine_theme_options[header_icons]',
        'type'     => 'checkbox',
		'priority' => 4
		)
	);
	
}

?>