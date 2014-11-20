<?php
/**
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'rubine_customize_register_post_settings' );

function rubine_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings
	$wp_customize->add_section( 'rubine_section_post', array(
        'title'    => __( 'Post Settings', 'rubine-lite' ),
        'priority' => 30,
		'panel' => 'rubine_options_panel' 
		)
	);

	// Add Post Images Headline
	$wp_customize->add_setting( 'rubine_theme_options[post_images]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Rubine_Customize_Header_Control(
        $wp_customize, 'rubine_control_post_images', array(
            'label' => __( 'Post Images', 'rubine-lite' ),
            'section' => 'rubine_section_post',
            'settings' => 'rubine_theme_options[post_images]',
            'priority' => 1
            )
        )
    );
	$wp_customize->add_setting( 'rubine_theme_options[post_thumbnails_single]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_posts_thumbnails_single', array(
        'label'    => __( 'Display featured images on single posts', 'rubine-lite' ),
        'section'  => 'rubine_section_post',
        'settings' => 'rubine_theme_options[post_thumbnails_single]',
        'type'     => 'checkbox',
		'priority' => 2
		)
	);
	
	// Add Excerpt Text setting
	$wp_customize->add_setting( 'rubine_theme_options[excerpt_text_headline]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Rubine_Customize_Header_Control(
        $wp_customize, 'rubine_control_excerpt_text_headline', array(
            'label' => __( 'Excerpt More Text', 'rubine-lite' ),
            'section' => 'rubine_section_post',
            'settings' => 'rubine_theme_options[excerpt_text_headline]',
            'priority' => 3
            )
        )
    );
	$wp_customize->add_setting( 'rubine_theme_options[excerpt_text]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_excerpt_text', array(
        'label'    => __( 'Display [...] after text excerpts.', 'rubine-lite' ),
        'section'  => 'rubine_section_post',
        'settings' => 'rubine_theme_options[excerpt_text]',
        'type'     => 'checkbox',
		'priority' => 4
		)
	);

}

?>