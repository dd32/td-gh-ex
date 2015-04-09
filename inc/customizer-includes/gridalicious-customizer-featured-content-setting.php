<?php
/**
 * The template for adding Featured Content Settings in Customizer
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */

if ( ! defined( 'GRIDALICIOUS_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
	// Featured Content Options
	if( 4 <= get_bloginfo( 'version' ) ) {
		$wp_customize->add_panel( 'gridalicious_featured_content_options', array(
		    'capability'     => 'edit_theme_options',
			'description'    => __( 'Options for Featured Content', 'gridalicious' ),
		    'priority'       => 400,
		    'title'    		 => __( 'Featured Content Options', 'gridalicious' ),
		) );
	}


	$wp_customize->add_section( 'gridalicious_featured_content_settings', array(
		'panel'			=> 'gridalicious_featured_content_options',
		'priority'		=> 1,
		'title'			=> __( 'Featured Content Settings', 'gridalicious' ),
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_content_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_option'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$gridalicious_featured_content_options = gridalicious_featured_grid_content_options();
	$choices = array();
	foreach ( $gridalicious_featured_content_options as $gridalicious_featured_content_option ) {
		$choices[$gridalicious_featured_content_option['value']] = $gridalicious_featured_content_option['label'];
	}

	$wp_customize->add_control( 'gridalicious_theme_options[featured_content_option]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Enable Featured Content on', 'gridalicious' ),
		'priority'	=> '1',
		'section'  	=> 'gridalicious_featured_content_settings',
		'settings' 	=> 'gridalicious_theme_options[featured_content_option]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_content_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$gridalicious_featured_content_layout_options = gridalicious_featured_content_layout_options();
	$choices = array();
	foreach ( $gridalicious_featured_content_layout_options as $gridalicious_featured_content_layout_option ) {
		$choices[$gridalicious_featured_content_layout_option['value']] = $gridalicious_featured_content_layout_option['label'];
	}

	$wp_customize->add_control( 'gridalicious_theme_options[featured_content_layout]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Select Featured Content Layout', 'gridalicious' ),
		'priority'	=> '2',
		'section'  	=> 'gridalicious_featured_content_settings',
		'settings' 	=> 'gridalicious_theme_options[featured_content_layout]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_content_position]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_position'],
		'sanitize_callback' => 'gridalicious_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_content_position]', array(
		'label'		=> __( 'Check to Move above Footer', 'gridalicious' ),
		'priority'	=> '3',
		'section'  	=> 'gridalicious_featured_content_settings',
		'settings'	=> 'gridalicious_theme_options[featured_content_position]',
		'type'		=> 'checkbox',
	) );  

	$wp_customize->add_section( 'gridalicious_featured_content_type', array(
		'panel'			=> 'gridalicious_featured_content_options',
		'priority'		=> 2,
		'title'			=> __( 'Featured Content Type', 'gridalicious' ),
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_content_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_type'],
		'sanitize_callback'	=> 'sanitize_key',
	) );

	$gridalicious_featured_content_types = gridalicious_featured_content_types();
	$choices = array();
	foreach ( $gridalicious_featured_content_types as $gridalicious_featured_content_type ) {
		$choices[$gridalicious_featured_content_type['value']] = $gridalicious_featured_content_type['label'];
	}

	$wp_customize->add_control( 'gridalicious_theme_options[featured_content_type]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Select Content Type', 'gridalicious' ),
		'priority'	=> '3',
		'section'  	=> 'gridalicious_featured_content_type',
		'settings' 	=> 'gridalicious_theme_options[featured_content_type]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_content_headline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_headline'],
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_content_headline]' , array(
		'description'	=> __( 'Leave field empty if you want to remove Headline', 'gridalicious' ),
		'label'    		=> __( 'Headline for Featured Content', 'gridalicious' ),
		'priority'		=> '4',
		'section'  		=> 'gridalicious_featured_content_type',
		'settings' 		=> 'gridalicious_theme_options[featured_content_headline]',
		'type'	   		=> 'text',
		)
	);

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_content_subheadline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_subheadline'],
		'sanitize_callback'	=> 'wp_kese_post',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_content_subheadline]' , array(
		'description'	=> __( 'Leave field empty if you want to remove Sub-headline', 'gridalicious' ),
		'label'    		=> __( 'Sub-headline for Featured Content', 'gridalicious' ),
		'priority'		=> '5',
		'section'  		=> 'gridalicious_featured_content_type',
		'settings' 		=> 'gridalicious_theme_options[featured_content_subheadline]',
		'type'	   		=> 'text',
		) 
	);

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_content_number]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_number'],
		'sanitize_callback'	=> 'gridalicious_sanitize_no_of_featured_content',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_content_number]' , array(
		'description'	=> __( 'Save and refresh the page if No. of Featured Content is changed (Max no of Featured Content is 20)', 'gridalicious' ),
		'input_attrs' 	=> array(
            'style' => 'width: 45px;',
            'min'   => 0,
            'max'   => 20,
            'step'  => 1,
        	),
		'label'    		=> __( 'No of Featured Content', 'gridalicious' ),
		'priority'		=> '6',
		'section'  		=> 'gridalicious_featured_content_type',
		'settings' 		=> 'gridalicious_theme_options[featured_content_number]',
		'type'	   		=> 'number',
		) 
	);


	//loop for featured page content
	for ( $i=1; $i <= $options['featured_content_number'] ; $i++ ) {
		$wp_customize->add_setting( 'gridalicious_theme_options[featured_content_page_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'gridalicious_sanitize_page',
		) );

		$wp_customize->add_control( 'gridalicious_featured_content_page_'. $i .'', array(
			'label'    	=> __( 'Featured Page', 'gridalicious' ) . ' ' . $i ,
			'priority'	=> '7' . $i,
			'section'  	=> 'gridalicious_featured_content_type',
			'settings' 	=> 'gridalicious_theme_options[featured_content_page_'. $i .']',
			'type'	   	=> 'dropdown-pages',
		) );
	}
// Featured Content Setting End