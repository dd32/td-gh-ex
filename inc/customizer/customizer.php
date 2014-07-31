<?php
/**
 * Implement Theme Customizer
 *
 */

// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/customizer-functions.php' );

// Add Theme Options section to Customizer
add_action( 'customize_register', 'rubine_customize_register_options' );

function rubine_customize_register_options( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'rubine_section_options', array(
        'title'    => __( 'Theme Options', 'rubine-lite' ),
        'priority' => 180
		)
	);
	
	// Add Settings and Controls for Layout
	$wp_customize->add_setting( 'rubine_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_layout'
		)
	);
    $wp_customize->add_control( 'rubine_control_layout', array(
        'label'    => __( 'Theme Layout', 'rubine-lite' ),
        'section'  => 'rubine_section_options',
        'settings' => 'rubine_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => __( 'Left Sidebar', 'rubine-lite' ),
            'right-sidebar' => __( 'Right Sidebar', 'rubine-lite' ),
			)
		)
	);

	// Add Header Content Header
	$wp_customize->add_setting( 'rubine_theme_options[header_content]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Rubine_Lite_Customize_Header_Control(
        $wp_customize, 'rubine_control_header_content', array(
            'label' => __( 'Header Content', 'rubine-lite' ),
            'section' => 'rubine_section_options',
            'settings' => 'rubine_theme_options[header_content]',
            'priority' => 	3
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
    $wp_customize->add_control( 'rubine_control_header_search', array(
        'label'    => __( 'Display search field on header area', 'rubine-lite' ),
        'section'  => 'rubine_section_options',
        'settings' => 'rubine_theme_options[header_search]',
        'type'     => 'checkbox',
		'priority' => 4
		)
	);

	$wp_customize->add_setting( 'rubine_theme_options[header_icons]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_header_icons', array(
        'label'    => __( 'Display Social Icons on header area', 'rubine-lite' ),
        'section'  => 'rubine_section_options',
        'settings' => 'rubine_theme_options[header_icons]',
        'type'     => 'checkbox',
		'priority' => 5
		)
	);
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = 'Background';
	
	// Add Header Tagline option
	$wp_customize->add_setting( 'rubine_theme_options[header_tagline]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_header_tagline', array(
        'label'    => __( 'Display Tagline below site title.', 'rubine-lite' ),
        'section'  => 'title_tagline',
        'settings' => 'rubine_theme_options[header_tagline]',
        'type'     => 'checkbox',
		'priority' => 99
		)
	);
}


// Embed JS file to make Theme Customizer preview reload changes asynchronously.
add_action( 'customize_preview_init', 'rubine_customize_preview_js' );

function rubine_customize_preview_js() {
	wp_enqueue_script( 'rubine-lite-customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140312', true );
}


?>