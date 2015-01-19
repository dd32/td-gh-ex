<?php
/**
 * Register Post Slider section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'courage_customize_register_slider_settings' );

function courage_customize_register_slider_settings( $wp_customize ) {

	// Add Sections for Slider Settings
	$wp_customize->add_section( 'courage_section_slider', array(
        'title'    => __( 'Post Slider', 'courage' ),
		'description' => __( 'The slideshow displays your featured posts, which you can configure on the "Featured Content" section above.', 'courage' ),
        'priority' => 50,
		'panel' => 'courage_options_panel' 
		)
	);

	// Add settings and controls for Post Slider
	$wp_customize->add_setting( 'courage_theme_options[slider_active_header]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Header_Control(
        $wp_customize, 'courage_control_slider_activated', array(
            'label' => __( 'Activate Featured Post Slider', 'courage' ),
            'section' => 'courage_section_slider',
            'settings' => 'courage_theme_options[slider_active_header]',
            'priority' => 1
            )
        )
    );
	$wp_customize->add_setting( 'courage_theme_options[slider_active_magazine]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_slider_active_magazine', array(
        'label'    => __( 'Display Slider on Magazine Front Page template.', 'courage' ),
        'section'  => 'courage_section_slider',
        'settings' => 'courage_theme_options[slider_active_magazine]',
        'type'     => 'checkbox',
		'priority' => 2
		)
	);
	$wp_customize->add_setting( 'courage_theme_options[slider_active_blog]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_slider_active_blog', array(
        'label'    => __( 'Display Slider on normal blog index.', 'courage' ),
        'section'  => 'courage_section_slider',
        'settings' => 'courage_theme_options[slider_active_blog]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);

	$wp_customize->add_setting( 'courage_theme_options[slider_animation]', array(
        'default'           => 'horizontal',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_slider_animation'
		)
	);
    $wp_customize->add_control( 'courage_control_slider_animation', array(
        'label'    => __( 'Slider Animation', 'courage' ),
        'section'  => 'courage_section_slider',
        'settings' => 'courage_theme_options[slider_animation]',
        'type'     => 'radio',
		'priority' => 4,
        'choices'  => array(
            'horizontal' => __( 'Horizontal Slider', 'courage' ),
            'fade' => __( 'Fade Slider', 'courage' )
			)
		)
	);
	
}

?>