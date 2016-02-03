<?php
/*--------------------------------------------------------------
## Position
--------------------------------------------------------------*/

/*--------------------------------------------------------------
## Layout & Position Section
--------------------------------------------------------------*/

	// Position & Shape
	$wp_customize->add_section('section_position',array(
		'title' => __( 'Positioning', 'bellini' ),
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'panel' => 'bellini_placeholder_layout_panel'
		)
	);

	// Header Layout Section
	$wp_customize->add_section('bellini_header_section_layout',array(
		'title' => __( 'Header Layout', 'bellini' ),
		'capability' => 'edit_theme_options',
		'priority' => 1,
		'panel' => 'bellini_placeholder_layout_panel'
		)
	);

	// Layout
	$wp_customize->add_section('bellini_layout_settings',array(
			'title' => __( 'Posts Layout', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 4,
			'panel' => 'bellini_placeholder_layout_panel'
		)
	);

/*--------------------------------------------------------------
## Layout & Position Settings & Control
--------------------------------------------------------------*/

	// Menu Position -- Settings
	$wp_customize->add_setting( 'bellini_menu_position' ,
		array(
			'default' => 'none',
			'type' => 'theme_mod',
			'sanitize_callback' => 'bellini_sanitize_title',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'bellini_menu_position',array(
				'label'      => __( 'Header Menu Position', 'bellini' ),
				'section'    => 'bellini_header_section_layout',
				'settings'   => 'bellini_menu_position',
			    'priority'   => 3,
			    'type'       => 'select',
				'choices'    => array(
					'left'   => __( 'Left', 'bellini' ),
					'right'  => __( 'Right', 'bellini' ),
					'center' => __( 'Center', 'bellini' ),
				),
			)
		);

	// Header Menu Layout
	$wp_customize->add_setting( 'bellini_menu_layout' ,
		array(
			'default' => 'general',
			'type' => 'theme_mod',
			'sanitize_callback' => 'bellini_sanitize_menu_layout',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_menu_layout',array(
				'label'      => __( 'Header Menu Type', 'bellini' ),
				'section'    => 'bellini_header_section_layout',
				'settings'   => 'bellini_menu_layout',
			    'priority'   => 2,
			    'type'       => 'select',
				'choices'    => array(
					'general'   => __( 'General Menu', 'bellini' ),
					'hamburger'  => __( 'Hamburger Menu', 'bellini' ),
				),
			)
		);

	// Page Title Position -- Settings
	$wp_customize->add_setting( 'page_title_position' ,
		array(
			'default' => 'center',
			'type' => 'theme_mod',
			'sanitize_callback' => 'bellini_sanitize_title',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'page_title_position',array(
				'label'      => __( 'Page Title Position', 'bellini' ),
				'section'    => 'section_position',
				'settings'   => 'page_title_position',
			    'priority'   => 2,
			    'type'       => 'select',
				'choices'    => array(
					'left'   => __( 'Left', 'bellini' ),
					'right'  => __( 'Right', 'bellini' ),
					'center' => __( 'Center', 'bellini' ),
				),
			)
		);


		  //Site title letter spacing
				$wp_customize->add_setting('bellini_website_width',
			      array(
			          'default'         => '100',
			          'sanitize_callback' => 'sanitize_key',
			          'transport'       => 'postMessage',
			          'type'            => 'theme_mod'
			      )
		  );


		  $wp_customize->add_control(new WP_Customize_Control($wp_customize,'bellini_website_width',
		            array(
		                'label'          => __( 'Website Width', 'bellini' ),
		                'section'        => 'bellini_header_section_layout',
		                'settings'       => 'bellini_website_width',
		                'type'           => 'range',
		                'input_attrs' => array(
						    'min' => '0',
						    'max' => '100',
						    'step' => '5',
					  	),
		            )
		        )
		   );

	// Blog Posts Layout
	$wp_customize->add_setting( 'bellini_layout_blog' ,
		array(
			'default' => 'layout-1',
			'type' => 'theme_mod',
			'sanitize_callback' => 'bellini_sanitize_layout',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_layout_blog',array(
				'label'      => __( 'Blog Posts Layout', 'bellini' ),
				'section'    => 'bellini_layout_settings',
				'settings'   => 'bellini_layout_blog',
			    'priority'   => 2,
			    'type'       => 'select',
				'choices'    => array(
					'layout-1'   => __( 'Layout 1', 'bellini' ),
					'layout-2'  => __( 'Layout 2', 'bellini' ),
				),
			)
		);

?>