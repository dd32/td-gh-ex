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
	
	// Add Postmeta Settings
	$wp_customize->add_setting( 'rubine_theme_options[postmeta_headline]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Rubine_Customize_Header_Control(
        $wp_customize, 'rubine_control_postmeta_headline', array(
            'label' => __( 'Postmeta', 'rubine-lite' ),
            'section' => 'rubine_section_post',
            'settings' => 'rubine_theme_options[postmeta_headline]',
            'priority' => 5
            )
        )
    );
	$wp_customize->add_setting( 'rubine_theme_options[meta_date]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_meta_date', array(
        'label'    => __( 'Display date on posts.', 'rubine-lite' ),
        'section'  => 'rubine_section_post',
        'settings' => 'rubine_theme_options[meta_date]',
        'type'     => 'checkbox',
		'priority' => 6
		)
	);
	$wp_customize->add_setting( 'rubine_theme_options[meta_author]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_meta_author', array(
        'label'    => __( 'Display author on posts.', 'rubine-lite' ),
        'section'  => 'rubine_section_post',
        'settings' => 'rubine_theme_options[meta_author]',
        'type'     => 'checkbox',
		'priority' => 7
		)
	);
	$wp_customize->add_setting( 'rubine_theme_options[meta_category]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_meta_category', array(
        'label'    => __( 'Display categories on posts.', 'rubine-lite' ),
        'section'  => 'rubine_section_post',
        'settings' => 'rubine_theme_options[meta_category]',
        'type'     => 'checkbox',
		'priority' => 8
		)
	);
	$wp_customize->add_setting( 'rubine_theme_options[meta_tags]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_meta_tags', array(
        'label'    => __( 'Display tags on posts.', 'rubine-lite' ),
        'section'  => 'rubine_section_post',
        'settings' => 'rubine_theme_options[meta_tags]',
        'type'     => 'checkbox',
		'priority' => 9
		)
	);

}

?>