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
/*
Kirki::add_panel( 'general', array(
    'priority'    => 10,
    'title'       => __( 'General Options', 'textdomain' ),
    'description' => __( 'Most Common Option', 'textdomain' ),
) );
*/
Kirki::add_panel( 'design', array(
    'priority'    => 11,
    'title'       => __( 'Design Options', 'beam' ),
    'description' => __( 'Design Options', 'beam' ),
) );


/**
 * Create sections using the Kirki API
 */

Kirki::add_section( 'gen_options', array(
	'priority'    => 10,
	'title'       => __( 'General options', 'beam' ),
	'description' => __( 'Most Common options', 'beam' ),
 //   'panel'          => 'general', // Not typically needed.
) );


Kirki::add_section( 'design_options', array(
	'priority'    => 11,
	'title'       => __( 'Page/Post options', 'beam' ),
	'description' => __( 'Page/Post related Options', 'beam' ),
    'panel'          => 'design', // Not typically needed.
) );

Kirki::add_section( 'home_options', array(
	'priority'    => 15,
	'title'       => __( 'Home Page', 'beam' ),
	'description' => __( 'Home Page Options', 'beam' ),
) );

Kirki::add_section( 'footer_options', array(
	'priority'    => 13,
	'title'       => __( 'Footer Options', 'beam' ),
	'description' => __( 'Footer Options', 'beam' ),
    'panel'          => 'design', // Not typically needed.
) );

Kirki::add_section( 'header_options', array(
	'priority'    => 12,
	'title'       => __( 'Header Options', 'beam' ),
	'description' => __( 'Header Options', 'beam' ),
    'panel'          => 'design', // Not typically needed.
) );

Kirki::add_section( 'custom_fields', array(
	'priority'    => 14,
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
		'section'     => 'gen_options',
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
		'section'     => 'header_options',
		'default'     => '',
		'priority'    => 11,
	);

	
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'opt_header_height',
		'label'       => __( 'Header height', 'beam' ),
		'description' => __( 'Set Your Header Height here (number only! e.g. 170)', 'beam' ),
		'section'     => 'header_options',
		'default'     => '150',
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
		'type'        => 'radio-buttonset',
		'settings'    => 'opt_menu_visibility',
		'label'       => __( 'Show Menus', 'beam' ),
		'description' => __( 'Show or hide your menus. Useful for Landing Page type of a site. ', 'beam' ),
		'section'     => 'gen_options',
		'default'     => 'option-1',
		'priority'    => 13,
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
		'settings'    => 'opt_default_width',
		'label'       => __( 'Chose Width', 'beam' ),
		'description' => __( 'Chose Your Preferred Default Site Width', 'beam' ),
		'section'     => 'gen_options',
		'default'     => 'option-2',
		'priority'    => 11,
		'choices'     => array(
			'option-1' => __( '980px', 'beam' ),
			'option-2' => __( '1312px', 'beam' ),

		),
	);


	
	return $fields;

}
add_filter( 'kirki/fields', 'kirki_text_controls_fields' );

