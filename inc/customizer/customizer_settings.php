<?php

//////////////////////////////////////////////////////////////////
// Customizer - Add Settings
//////////////////////////////////////////////////////////////////
function aster_register_theme_customizer( $wp_customize ) {

	// Add Sections
	$wp_customize->add_section( 'aster_new_section_footer', array(
		'title'    => __( 'Footer Settings', 'aster' ),
		'priority' => 103,
	) );
	$wp_customize->add_section( 'aster_new_section_page', array(
		'title'    => __( 'Page Settings', 'aster' ),
		'priority' => 102,
	) );
	$wp_customize->add_section( 'aster_new_section_post', array(
		'title'    => __( 'Post Settings', 'aster' ),
		'priority' => 101,
	) );
	$wp_customize->add_section( 'aster_new_section_general', array(
		'title'    => __( 'General Settings', 'aster' ),
		'priority' => 100,
	) );


	// Add Setting

	// General

	$wp_customize->add_setting(
		'aster_home_layout',
		array(
			'default'           => 'rightsidebar',
			'sanitize_callback' => 'esc_attr'
		)
	);

	$wp_customize->add_setting(
		'aster_preloader',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);


	// Header and logo
	$wp_customize->add_setting(
		'aster_logo',
		array(
			'sanitize_callback' => 'esc_url'
		)
	);

	// Post Settings
	$wp_customize->add_setting(
		'aster_post_author_name',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);
	$wp_customize->add_setting(
		'aster_post_date',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);
	$wp_customize->add_setting(
		'aster_post_cat',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);
	$wp_customize->add_setting(
		'aster_post_tags',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);
	$wp_customize->add_setting(
		'aster_post_author',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);
	$wp_customize->add_setting(
		'aster_post_nav',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);
	$wp_customize->add_setting(
		'aster_post_related',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);


	// Page Settings
	$wp_customize->add_setting(
		'aster_page_comments',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);


	// Footer Options
	$wp_customize->add_setting(
		'aster_back_to_top',
		array(
			'default'           => false,
			'sanitize_callback' => 'esc_attr'
		)
	);
	$wp_customize->add_setting(
		'aster_footer_copyright',
		array(
			'sanitize_callback' => 'wp_kses'
		)
	);

	// Color Options

	// Color general
	$wp_customize->add_setting(
		'aster_theme_color',
		array(
			'default'           => '#e74c3c',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);


	// Add Control

	// General

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_home_layout',
			array(
				'label'    => __( 'Homepage Layout', 'aster' ),
				'section'  => 'aster_new_section_general',
				'settings' => 'aster_home_layout',
				'type'     => 'radio',
				'priority' => 2,
				'choices'  => array(
					'full'         => __( 'Full Posts', 'aster' ),
					'rightsidebar' => __( 'Right Sidebar', 'aster' ),
					'leftsidebar'  => __( 'Left Sidebar', 'aster' )
				)
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_preloader',
			array(
				'label'    => __( 'Disable Preloader', 'aster' ),
				'section'  => 'aster_new_section_general',
				'settings' => 'aster_preloader',
				'type'     => 'checkbox',
				'priority' => 4
			)
		)
	);

	// Header and Logo
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'aster_logo',
			array(
				'label'    => __( 'Upload Logo', 'aster' ),
				'section'  => 'title_tagline',
				'settings' => 'aster_logo',
				'priority' => 60
			)
		)
	);


	// Post Settings

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_post_author_name',
			array(
				'label'    => __( 'Hide Author Name', 'aster' ),
				'section'  => 'aster_new_section_post',
				'settings' => 'aster_post_author_name',
				'type'     => 'checkbox',
				'priority' => 1
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_post_date',
			array(
				'label'    => __( 'Hide Date', 'aster' ),
				'section'  => 'aster_new_section_post',
				'settings' => 'aster_post_date',
				'type'     => 'checkbox',
				'priority' => 2
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_post_cat',
			array(
				'label'    => __( 'Hide Category', 'aster' ),
				'section'  => 'aster_new_section_post',
				'settings' => 'aster_post_cat',
				'type'     => 'checkbox',
				'priority' => 3
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_post_tags',
			array(
				'label'    => __( 'Hide Tags', 'aster' ),
				'section'  => 'aster_new_section_post',
				'settings' => 'aster_post_tags',
				'type'     => 'checkbox',
				'priority' => 4
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_post_author',
			array(
				'label'    => __( 'Hide Author Box', 'aster' ),
				'section'  => 'aster_new_section_post',
				'settings' => 'aster_post_author',
				'type'     => 'checkbox',
				'priority' => 5
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_post_nav',
			array(
				'label'    => __( 'Hide Next/Prev Post Navigation', 'aster' ),
				'section'  => 'aster_new_section_post',
				'settings' => 'aster_post_nav',
				'type'     => 'checkbox',
				'priority' => 6
			)
		)
	);

	// Page settings
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_page_comments',
			array(
				'label'    => __( 'Hide Comments', 'aster' ),
				'section'  => 'aster_new_section_page',
				'settings' => 'aster_page_comments',
				'type'     => 'checkbox',
				'priority' => 1
			)
		)
	);


	// Footer Settings
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_back_to_top',
			array(
				'label'    => __( 'Disable Back to top', 'aster' ),
				'section'  => 'aster_new_section_footer',
				'settings' => 'aster_back_to_top',
				'type'     => 'checkbox',
				'priority' => 1
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'aster_footer_copyright',
			array(
				'label'    => __( 'Footer Copyright Text', 'aster' ),
				'section'  => 'aster_new_section_footer',
				'settings' => 'aster_footer_copyright',
				'type'     => 'textarea',
				'priority' => 2
			)
		)
	);

	// Color Settings

	// Colors general
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'aster_theme_color',
			array(
				'label'    => __( 'Theme Color', 'aster' ),
				'section'  => 'colors',
				'settings' => 'aster_theme_color',
				'priority' => 1
			)
		)
	);


}

add_action( 'customize_register', 'aster_register_theme_customizer' );
?>