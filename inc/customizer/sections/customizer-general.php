<?php
/**
 * Register General section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'rubine_customize_register_general_settings' );

function rubine_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'rubine_section_general', array(
        'title'    => esc_html__( 'General Settings', 'rubine-lite' ),
        'priority' => 10,
		'panel' => 'rubine_options_panel'
		)
	);

	// Add Settings and Controls for Layout
	$wp_customize->add_setting( 'rubine_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_select'
		)
	);
    $wp_customize->add_control( 'rubine_theme_options[layout]', array(
        'label'    => esc_html__( 'Theme Layout', 'rubine-lite' ),
        'section'  => 'rubine_section_general',
        'settings' => 'rubine_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => esc_html__( 'Left Sidebar', 'rubine-lite' ),
            'right-sidebar' => esc_html__( 'Right Sidebar', 'rubine-lite' ),
			)
		)
	);

	// Add Footer Content Header
	$wp_customize->add_setting( 'rubine_theme_options[footer_content]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Rubine_Customize_Header_Control(
        $wp_customize, 'rubine_theme_options[footer_content]', array(
            'label' => esc_html__( 'Footer Icons', 'rubine-lite' ),
            'section' => 'rubine_section_general',
            'settings' => 'rubine_theme_options[footer_content]',
            'priority' => 4
            )
        )
    );

	// Add Footer Settings
	$wp_customize->add_setting( 'rubine_theme_options[footer_icons]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_theme_options[footer_icons]', array(
        'label'    => esc_html__( 'Display Social Icons in footer', 'rubine-lite' ),
        'section'  => 'rubine_section_general',
        'settings' => 'rubine_theme_options[footer_icons]',
        'type'     => 'checkbox',
		'priority' => 5
		)
	);

}

?>
