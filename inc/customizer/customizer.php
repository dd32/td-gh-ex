<?php
/**
 * Implement Theme Customizer
 *
 */

// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/customizer-functions.php' );

// Load Customizer Settings
require( get_template_directory() . '/inc/customizer/customizer-header.php' );
require( get_template_directory() . '/inc/customizer/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/customizer-upgrade.php' );


// Add Theme Options section to Customizer
add_action( 'customize_register', 'rubine_customize_register_options' );

function rubine_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'rubine_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Theme Options', 'rubine-lite' ),
		'description'    => '',
	) );

	// Add Section for Theme Options
	$wp_customize->add_section( 'rubine_section_general', array(
        'title'    => __( 'General Settings', 'rubine-lite' ),
        'priority' => 10,
		'panel' => 'rubine_options_panel' 
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
        'section'  => 'rubine_section_general',
        'settings' => 'rubine_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => __( 'Left Sidebar', 'rubine-lite' ),
            'right-sidebar' => __( 'Right Sidebar', 'rubine-lite' ),
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
        $wp_customize, 'rubine_control_footer_content', array(
            'label' => __( 'Footer Content', 'rubine-lite' ),
            'section' => 'rubine_section_general',
            'settings' => 'rubine_theme_options[footer_content]',
            'priority' => 2
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
    $wp_customize->add_control( 'rubine_control_footer_icons', array(
        'label'    => __( 'Display Social Icons in footer line.', 'rubine-lite' ),
        'section'  => 'rubine_section_general',
        'settings' => 'rubine_theme_options[footer_icons]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = 'Background';
	
	// Change Featured Content Section
	$wp_customize->get_section( 'featured_content'  )->panel = 'rubine_options_panel';
	$wp_customize->get_section( 'featured_content'  )->priority = 40;
	
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


// Embed CSS styles for Theme Customizer
add_action( 'customize_controls_print_styles', 'rubine_customize_preview_css' );

function rubine_customize_preview_css() {
	wp_enqueue_style( 'rubine-lite-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20140312' );

}


?>