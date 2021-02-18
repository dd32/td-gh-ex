<?php
/**
 * Register General section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'anderson_customize_register_general_settings' );

function anderson_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'anderson_section_general', array(
        'title'    => __( 'General Settings', 'anderson-lite' ),
        'priority' => 10,
		'panel' => 'anderson_panel_options' 
		)
	);
	
	// Add Settings and Controls for Theme Layout
	$wp_customize->add_setting( 'anderson_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_layout'
		)
	);
    $wp_customize->add_control( 'anderson_control_layout', array(
        'label'    => __( 'Theme Layout', 'anderson-lite' ),
        'section'  => 'anderson_section_general',
        'settings' => 'anderson_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => __( 'Left Sidebar', 'anderson-lite' ),
            'right-sidebar' => __( 'Right Sidebar', 'anderson-lite' )
			)
		)
	);
	
	// Add Image Grayscale Headline
	$wp_customize->add_setting( 'anderson_theme_options[image_grayscale_headline]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Header_Control(
        $wp_customize, 'anderson_control_image_grayscale_headline', array(
            'label' => __( 'Image Grayscale', 'anderson-lite' ),
            'section' => 'anderson_section_general',
            'settings' => 'anderson_theme_options[image_grayscale_headline]',
            'priority' => 2
            )
        )
    );
	$wp_customize->add_setting( 'anderson_theme_options[image_grayscale]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_image_grayscale', array(
        'label'    => __( 'Turn off Grayscale filter for featured images.', 'anderson-lite' ),
        'section'  => 'anderson_section_general',
        'settings' => 'anderson_theme_options[image_grayscale]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);
	
	// Add Default Fonts Header
	$wp_customize->add_setting( 'anderson_theme_options[default_fonts]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Header_Control(
        $wp_customize, 'anderson_control_default_fonts', array(
            'label' => __( 'Default Fonts', 'anderson-lite' ),
            'section' => 'anderson_section_general',
            'settings' => 'anderson_theme_options[default_fonts]',
            'priority' => 4
            )
        )
    );
	
	// Add Settings and Controls for Deactivate Google Font setting
	$wp_customize->add_setting( 'anderson_theme_options[deactivate_google_fonts]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_deactivate_google_fonts', array(
        'label'    => __( 'Deactivate Google Fonts in case your language is not compatible.', 'anderson-lite' ),
        'section'  => 'anderson_section_general',
        'settings' => 'anderson_theme_options[deactivate_google_fonts]',
        'type'     => 'checkbox',
		'priority' => 5
		)
	);
	
}

?>