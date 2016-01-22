<?php
/**
 * Kirki Advanced Customizer
 * @package Kirki
 */

// Early exit if Kirki is not installed
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * Create a config instance that will be used by fields added via the static methods.
 * For this example we'll be defining our options to be serialized in the db, under the 'kirki_demo' option.
 */
Kirki::add_config( 'bo', array(
	'option_type' => 'theme_mod',
	'capability'    => 'edit_theme_options',
    'option_name'   => 'bo',
) );


/**
 * Create panels using the Kirki API
 */

Kirki::add_section( 'layout_options', array(
	'priority'    => 10,
	'title'       => __( 'Layout options', 'beam' ),
	'description' => __( 'Choose Your Favorite Layout', 'beam' ),
) );

Kirki::add_section( 'design_options', array(
	'priority'    => 11,
	'title'       => __( 'Design options', 'beam' ),
	'description' => __( 'This panel contains all Design Options', 'beam' ),
) );

Kirki::add_section( 'home_options', array(
	'priority'    => 10,
	'title'       => __( 'Home Page', 'beam' ),
	'description' => __( 'Home Page Options', 'beam' ),
) );

Kirki::add_section( 'footer_options', array(
	'priority'    => 11,
	'title'       => __( 'Footer Options', 'beam' ),
	'description' => __( 'Footer Options', 'beam' ),
) );

Kirki::add_section( 'custom_fields', array(
	'priority'    => 12,
	'title'       => __( 'Custom Fields', 'beam' ),
	'description' => __( 'This panel contains Custom Fields', 'beam' ),
) );

/**
 * Add text fields
 */
function kirki_text_controls_fields( $fields ) {


	$fields[] = array(
		'type'        => 'radio-image',
		'settings'    => 'opt_layout',
		'label'       => __( 'Choose Layout', 'beam' ),
		'description' => __( 'Choose between No Sidebar, Left Sidebar, Right Sidebar or Double Sidebar templates', 'beam' ),
		'section'     => 'layout_options',
		'default'     => '3',
		'priority'    => 11,
		'choices'     => array(
			'1' => get_template_directory_uri().'/inc/adm/kirki/assets/images/1col.png',
			'2' => get_template_directory_uri().'/inc/adm/kirki/assets/images/2cl.png',
			'3' => get_template_directory_uri().'/inc/adm/kirki/assets/images/2cr.png',
			'4' => get_template_directory_uri().'/inc/adm/kirki/assets/images/3cm.png',
		),
	);

	$fields[] = array(
		'type'        => 'checkbox',
		'setting'     => 'opt_sidebar_visibility',
		'label'       => __( 'Sidebar Visibility', 'beam' ),
		'description' => __( 'Uncheck the box if you would like to hide Sidebar site-wide ', 'beam' ),
		'section'     => 'layout_options',
		'default'     => '0',
		'priority'    => 12,  
	);

	$fields[] = array(
		'sanitize_callback' => array( 'Kirki_Sanitize', 'unfiltered' ),
		'type'        => 'textarea',
		'settings'    => 'opt_custom_style',
		'label'       => __( 'Custom CSS', 'kirki' ),
		'description' => __( 'Add Your Custom CSS Here', 'beam' ),
		'section'     => 'custom_fields',
		'default'     => '',
		'priority'    => 11,
		
	);

	$fields[] = array(
		'sanitize_callback' => array( 'Kirki_Sanitize', 'unfiltered' ),
		'type'        => 'textarea',
		'settings'    => 'opt_copyright',
		'label'       => __( 'Copyright', 'beam' ),
		'description' => __( 'Edit Copyright Text', 'beam' ),
		'help'        => __( 'This text will be displayed after Footer Menu', 'beam' ),
		'section'     => 'custom_fields',
		'default'     => 'Copyright (c) Your Company',
		'priority'    => 11,
		
	);

	$fields[] = array(
		'type'        => 'upload',
		'settings'    => 'opt_logo',
		'label'       => __( 'Logo', 'beam' ),
		'description' => __( 'Upload Your Logo here', 'beam' ),
		'section'     => 'design_options',
		'default'     => '',
		'priority'    => 11,
	);

	$fields[] = array(
		'type'        => 'upload',
		'settings'    => 'opt_header_bcg',
		'label'       => __( 'Header Background', 'beam' ),
		'description' => __( 'Upload Your Header Background Image', 'beam' ),
		'section'     => 'design_options',
		'default'     => '',
		'priority'    => 11,
		'output' => array(
			array(
				'element'  => '.site-header',
				'property' => 'background-image',
				),
		),
	);

	$fields[] = array(
		'type'        => 'upload',
		'settings'    => 'opt_site_bcg',
		'label'       => __( 'Site Background', 'beam' ),
		'description' => __( 'Upload Your Site Background Image', 'beam' ),
		'section'     => 'design_options',
		'default'     => '',
		'priority'    => 11,
		'output' => array(
			array(
				'element'  => '.site',
				'property' => 'background-image',
				),
		),
	);

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'opt_header_height',
		'label'       => __( 'Header height', 'beam' ),
		'description' => __( 'Set Your Header Height here (number only! e.g. 170)', 'beam' ),
		'section'     => 'design_options',
		'default'     => '200',
		'priority'    => 11,
		'output' => array(
			array(
				'element'  => '.centeralign-header',
				'property' => 'height',
				'units'    => 'px',
				),
		),
	);

	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'opt_header_color',
		'label'       => __( 'Header Color', 'beam' ),
		'description' => __( 'Set Your Header Color here', 'beam' ),
		'section'     => 'design_options',
		'default'     => '#0776A3',
		'priority'    => 11,
		'output' => array(
			array(
				'element'  => '.site-header',
				'property' => 'background-color',
				),
		),
	);


	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'opt_footer_color',
		'label'       => __( 'Footer Color', 'beam' ),
		'description' => __( 'Set Your Footer Color here', 'beam' ),
		'section'     => 'design_options',
		'default'     => '#0776A3',
		'priority'    => 11,
		'output' => array(
			array(
				'element'  => '.site-footer',
				'property' => 'background-color',
				),
		),
	);

	$fields[] = array(
		'type'        => 'color',
		'settings'     => 'opt_header_gradient_one',
		'label'       => __( 'Header Gradient Color', 'beam' ),
		'description' => __( 'This is the from* color', 'beam' ),
		'section'     => 'design_options',
		'default'     => '#fafafa',
		'priority'    => 13,
		'required'  => array(
			array(
				'setting'  => 'opt_header_gradient_control',
				'operator' => '==',
				'value'    => 1,
			),
		),
	);

	$fields[] = array(
		'type'        => 'color',
		'settings'     => 'opt_header_gradient_two',
		'description' => __( 'This is the to* color', 'beam' ),
		'section'     => 'design_options',
		'default'     => '#cccccc',
		'priority'    => 13,
		'required'  => array(
			array(
				'setting'  => 'opt_header_gradient_control',
				'operator' => '==',
				'value'    => 1,
			),
		),
	);

	$fields[] = array(
		'type'        => 'checkbox',
		'setting'     => 'opt_header_gradient_control',
		'label'       => __( 'Use Gradient Header Colors', 'beam' ),
		'description' => __( 'Check the box if you would like to use Header Gradient colors', 'beam' ),
		'section'     => 'design_options',
		'default'     => 0,
		'priority'    => 12,  
	);


// Switch
/*
	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'opt_menu_visibility',
		'label'       => __( 'Show Menu', 'beam' ),
		'description' => __( 'Chose whether if you want to show or hide your menu', 'beam' ),
		'help' => __( 'Usefull for Landing & Squezee pages', 'kirki' ),
		'section'     => 'design_options',
		'default'     => '1',
		'priority'    => 10,
 );
*/
	$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'opt_menu_visibility',
		'label'       => __( 'Show Menu', 'beam' ),
		'description' => __( 'Chose whether if you want to show or hide your menu', 'beam' ),
		'section'     => 'design_options',
		'default'     => 'option-1',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Show', 'beam' ),
			'option-2' => __( 'Hide', 'beam' ),

		),
	);

		$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'opt_fwidget_visibility',
		'label'       => __( 'Show Footer Widget Area', 'beam' ),
		'description' => __( 'Chose whether if you want to show or hide Footer Widgets', 'beam' ),
		'section'     => 'footer_options',
		'default'     => 'option-2',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Show', 'beam' ),
			'option-2' => __( 'Hide', 'beam' ),

		),
	);
	
	$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'opt_show_author',
		'label'       => __( 'Show Author Bio', 'beam' ),
		'description' => __( 'Chose whether if you want to show or hide Bio box below Post entry', 'beam' ),
		'section'     => 'design_options',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'1' => __( 'Show', 'beam' ),
			'2' => __( 'Hide', 'beam' ),

		),
	);
	
	$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'opt_show_home_widget',
		'label'       => __( 'Show Home Page Widget', 'beam' ),
		'description' => __( 'Chose whether if you want Home Page Widget to be visible', 'beam' ),
		'section'     => 'home_options',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'1' => __( 'Show', 'beam' ),
			'2' => __( 'Hide', 'beam' ),

		),
	);

	
		$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'opt_default_width',
		'label'       => __( 'Chose Width', 'beam' ),
		'description' => __( 'Chose Your Preferred Default Site Width', 'beam' ),
		'section'     => 'layout_options',
		'default'     => 'option-2',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( '980px', 'beam' ),
			'option-2' => __( '1312px', 'beam' ),

		),
	);

	
		$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'opt_home_widget',
		'label'       => __( 'Home Page Widget', 'beam' ),
		'description' => __( 'Show Home Page Widget Content', 'beam' ),
		'section'     => 'layout_options',
		'default'     => 'option-2',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Yes', 'beam' ),
			'option-2' => __( 'No', 'beam' ),

		),
	);
	
		$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'opt_home_sidebar',
		'label'       => __( 'Home Page Sidebar', 'beam' ),
		'description' => __( 'Show Home Page Sidebar', 'beam' ),
		'section'     => 'home_options',
		'default'     => 'option-2',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Yes', 'beam' ),
			'option-2' => __( 'No', 'beam' ),

		),
	);	

	
	return $fields;

}
add_filter( 'kirki/fields', 'kirki_text_controls_fields' );

