<?php
/**
 * Register PRO Version section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'rubine_customize_register_upgrade_settings' );

function rubine_customize_register_upgrade_settings( $wp_customize ) {

	// Add Sections for Post Settings
	$wp_customize->add_section( 'rubine_section_upgrade', array(
        'title'    => __( 'PRO Version', 'rubine-lite' ),
        'priority' => 70,
		'panel' => 'rubine_options_panel' 
		)
	);

	// Add PRO Version Section
	$wp_customize->add_setting( 'rubine_theme_options[pro_version_label]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Rubine_Customize_Header_Control(
        $wp_customize, 'rubine_control_pro_version_label', array(
            'label' => __( 'Need more features?', 'rubine-lite' ),
            'section' => 'rubine_section_upgrade',
            'settings' => 'rubine_theme_options[pro_version_label]',
            'priority' => 	1
            )
        )
    );
	$wp_customize->add_setting( 'rubine_theme_options[pro_version]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Rubine_Customize_Text_Control(
        $wp_customize, 'rubine_control_pro_version', array(
            'label' =>  __( 'Check out the PRO version which comes with additional features and advanced customization options.', 'rubine-lite' ),
            'section' => 'rubine_section_upgrade',
            'settings' => 'rubine_theme_options[pro_version]',
            'priority' => 	2
            )
        )
    );
	$wp_customize->add_setting( 'rubine_theme_options[pro_version_button]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Rubine_Customize_Button_Control(
        $wp_customize, 'rubine_control_pro_version_button', array(
            'label' => __('Learn more about the PRO Version', 'rubine-lite'),
			'section' => 'rubine_section_upgrade',
            'settings' => 'rubine_theme_options[pro_version_button]',
            'priority' => 	3
            )
        )
    );

}

?>