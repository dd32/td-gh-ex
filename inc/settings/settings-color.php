<?php

/*--------------------------------------------------------------
## Color
--------------------------------------------------------------*/

	// Primary Color -- Settings
	$wp_customize->add_setting( 'bellini_primary_color' ,
		array(
	    'default' => '#2196F3',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_primary_color',
			array(
				'label'      => __( 'Primary Color', 'bellini' ),
				'section'    => 'section_color',
				'settings'   => 'bellini_primary_color',
			    'priority'   => 1
			)
		));

	// Accent Color -- Settings
	$wp_customize->add_setting( 'bellini_accent_color' ,
		array(
	    'default' => '#E3F2FD',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_accent_color',
			array(
				'label'      => __( 'Accent Color', 'bellini' ),
				'section'    => 'section_color',
				'settings'   => 'bellini_accent_color',
			    'priority'   => 2
			)
		));

	// Header Background Color -- Settings
	$wp_customize->add_setting( 'header_background_color' ,
		array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'header_background_color',
			array(
				'label'      => __( 'Header Background', 'bellini' ),
				'section'    => 'section_color',
				'settings'   => 'header_background_color',
			    'priority'   => 3
			)
		));



	// Widget Background Color -- Settings
	$wp_customize->add_setting( 'widget_background_color',
		array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'widget_background_color',
			array(
				'label'      => __( 'Widget - Background', 'bellini' ),
				'section'    => 'section_color',
				'settings'   => 'widget_background_color',
			    'priority'   => 4
			)
		));



	// Footer Background Color -- Settings
	$wp_customize->add_setting( 'footer_background_color' ,
		array(
	    'default' => '#eceef1',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'footer_background_color',
			array(
				'label'      => __( 'Footer Background', 'bellini' ),
				'section'    => 'section_color',
				'settings'   => 'footer_background_color',
			    'priority'   => 6
			)
		));

	// Button Background Color -- Settings
	$wp_customize->add_setting( 'button_background_color' ,
		array(
	    'default' => '#00B0FF',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'button_background_color',
			array(
				'label'      => __( 'Button Color', 'bellini' ),
				'section'    => 'section_color',
				'settings'   => 'button_background_color',
			    'priority'   => 7
			)
		));


	// Body Text Color -- Settings
	$wp_customize->add_setting( 'body_text_color' ,
		array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'body_text_color',
			array(
				'label'      => __( 'Body Text', 'bellini' ),
				'section'    => 'text_color',
				'settings'   => 'body_text_color',
			    'priority'   => 2
			)
		));

	// Title Text Color -- Settings
	$wp_customize->add_setting( 'title_text_color' ,
		array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'title_text_color',
			array(
				'label'      => __( 'Title Color', 'bellini' ),
				'section'    => 'text_color',
				'settings'   => 'title_text_color',
			    'priority'   => 1
			)
		));

	// Menu Text Color -- Settings
	$wp_customize->add_setting( 'menu_text_color' ,
		array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'menu_text_color',
			array(
				'label'      => __( 'Menu Text', 'bellini' ),
				'section'    => 'text_color',
				'settings'   => 'menu_text_color',
			    'priority'   => 10
			)
		));

	// Button Text Color -- Settings
	$wp_customize->add_setting( 'button_text_color' ,
		array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'button_text_color',
			array(
				'label'      => __( 'Button Text', 'bellini' ),
				'section'    => 'text_color',
				'settings'   => 'button_text_color',
			    'priority'   => 11
			)
		));


	// Link Text Color -- Settings
	$wp_customize->add_setting( 'link_text_color' ,
		array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link_text_color',
			array(
				'label'      => __( 'Link Text', 'bellini' ),
				'section'    => 'text_color',
				'settings'   => 'link_text_color',
			    'priority'   => 12
			)
		));


	// Link Hover Color -- Settings
	$wp_customize->add_setting( 'link_hover_color' ,
		array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link_hover_color',
			array(
				'label'      => __( 'Link Hover', 'bellini' ),
				'section'    => 'text_color',
				'settings'   => 'link_hover_color',
			    'priority'   => 13
			)
		));


?>