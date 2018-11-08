<?php
/**
 * Register upgrade section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'rubine_customize_register_upgrade_settings' );

function rubine_customize_register_upgrade_settings( $wp_customize ) {
	
	// Add Upgrade / More Features Section
	$wp_customize->add_section( 'rubine_section_upgrade', array(
        'title'    => esc_html__( 'More Features', 'rubine-lite' ),
        'priority' => 50,
		'panel' => 'rubine_options_panel' 
		)
	);
	
	// Add custom Upgrade Content control
	$wp_customize->add_setting( 'rubine_theme_options[upgrade]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Rubine_Customize_Upgrade_Control(
        $wp_customize, 'rubine_theme_options[upgrade]', array(
            'section' => 'rubine_section_upgrade',
            'settings' => 'rubine_theme_options[upgrade]',
            'priority' => 1
            )
        )
    );

}