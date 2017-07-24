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
  //  'option_name'   => 'bo',
	'disable_output' => true
) );


/**
 * Create panels using the Kirki API
 */

Kirki::add_panel( 'design', array(
    'priority'    => 11,
    'title'       => __( 'Design Options', 'beam' ),
    'description' => __( 'Design Options', 'beam' ),
) );

Kirki::add_panel( 'general', array(
    'priority'    => 10,
    'title'       => __( 'General Options', 'beam' ),
    'description' => __( 'General Options', 'beam' ),
) );



/**
 * Create sections using the Kirki API
 */

Kirki::add_section( 'typho_options', array(
	'priority'    => 11,
	'title'       => __( 'Typography', 'beam' ),
	'description' => __( 'Fonts', 'beam' ),
    'panel'       => 'general', 
) );

Kirki::add_section( 'layout_options', array(
	'priority'    => 11,
	'title'       => __( 'Layout', 'beam' ),
	'description' => __( 'Layout options', 'beam' ),
    'panel'       => 'general', 
) );

Kirki::add_section( 'other_options', array(
	'priority'    => 12,
	'title'       => __( 'Other', 'beam' ),
	'description' => __( 'Other options', 'beam' ),
    'panel'       => 'general', 
) );

Kirki::add_section( 'gen_options', array(
	'priority'    => 10,
	'title'       => __( 'General options', 'beam' ),
	'description' => __( 'Most Common options', 'beam' ),
    'panel'       => 'general', 
) );


Kirki::add_section( 'design_options', array(
	'priority'    => 11,
	'title'       => __( 'Page/Post options', 'beam' ),
	'description' => __( 'Page/Post related Options', 'beam' ),
    'panel'       => 'design', 
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
    'panel'       => 'design', 
) );

Kirki::add_section( 'header_options', array(
	'priority'    => 12,
	'title'       => __( 'Header Options', 'beam' ),
	'description' => __( 'Header Options', 'beam' ),
    'panel'       => 'design', 
) );

Kirki::add_section( 'custom_fields', array(
	'priority'    => 14,
	'title'       => __( 'Custom Fields', 'beam' ),
	'description' => __( 'Custom Fields', 'beam' ),
) );

Kirki::add_section( 'gen_advanced', array(
	'priority'    => 14,
	'title'       => __( 'Advanced', 'beam' ),
	'description' => __( 'Advanced enqueue options', 'beam' ),
	'panel'       => 'general', 
) );

Kirki::add_section( 'design_advanced', array(
	'priority'    => 14,
	'title'       => __( 'Design Advanced', 'beam' ),
	'description' => __( 'Advanced options', 'beam' ),
	'panel'       => 'design', 
) );

/**
 * Add text fields
 */
function kirki_text_controls_fields( $fields ) {

	// Background color
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'header-bcg-color',
		'label'       => __( 'Header Background Color', 'beam' ),
		'section'     => 'header_options',
		'default'     => '#0088CC',
		'priority'    => 11,
		'choices'     => array(
			'alpha' => true,
		),
			'output' => array(
				array(
					'element'  => array ('.site-header','.sub-menu'),
					'property' => 'background-color',

					),
			),
	);

	// Header Menu Link color
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'header-link-color',
		'label'       => __( 'Menu Link Color', 'beam' ),
		'section'     => 'header_options',
		'default'     => '#fafafa',
		'priority'    => 11,
		'choices'     => array(
			'alpha' => true,
		),
			'output' => array(
				array(
					'element'  => array ('.main-navigation a', '.site-header a'),
					'property' => 'color',
					),
				array(
					'element'  => array ('.beam-bar'),
					'property' => 'background-color',
					),
			),
	);	

	// Header Menu Hover Link color
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'header-hover-color',
		'label'       => __( 'Menu Hover Link Color', 'beam' ),
		'section'     => 'header_options',
		'default'     => '#fafafa',
		'priority'    => 11,
		'choices'     => array(
			'alpha' => true,
		),
			'output' => array(
				array(
					'element'  => array ('.main-navigation li:hover > a', '.site-header a:hover'),
					'property' => 'color',
					),
			),
	);	


	// Footer Background color
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'footer-bcg',
		'label'       => __( 'Footer Background', 'beam' ),
		'section'     => 'footer_options',
		'default'     => '#0088CC',
		'priority'    => 10,
		'choices'     => array(
			'alpha' => true,
		),
			'output' => array(
				array(
					'element'  => '.site-footer',
					'property' => 'background-color',

					),
			),
	);

	// Footer Menu Link color
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'footer-link-color',
		'label'       => __( 'Menu Link Color', 'beam' ),
		'section'     => 'footer_options',
		'default'     => '#fafafa',
		'priority'    => 10,
		'choices'     => array(
			'alpha' => true,
		),
			'output' => array(
				array(
					'element'  => array ('.footer-navigation a', '.site-footer a'),
					'property' => 'color',
					),
			),
	);	

	// Footer Text color
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'footer-text-color',
		'label'       => __( 'Footer text Color', 'beam' ),
		'section'     => 'footer_options',
		'default'     => '#fafafa',
		'priority'    => 10,
		'choices'     => array(
			'alpha' => true,
		),
			'output' => array(
				array(
					'element'  => '.site-footer',
					'property' => 'color',
					),
			),
	);		

	// Use Body Typography
	$fields[] = array(
		'type'      => 'checkbox',
		'settings'  => 'use_typography',
		'label'     => __( 'Use Custom Typography', 'beam' ),
		'section'   => 'typho_options',
		'default'   => 0,
		'priority'  => 10,
	);


	// Body Typography
	$fields[] = array(
		'type'        => 'typography',
		'settings'    => 'gen_typho',
		'label'       => esc_attr__( 'Typography options', 'beam' ),
		'section'     => 'typho_options',
		'default'     => array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '14px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#333333',
			'text-transform' => 'none',
			'text-align'     => 'left'
		),
		'priority'    => 11,
		'output'      => array(
			array(
				'element' => 'body',
			),
		),
		'active_callback'  => array(
			array(
				'setting'  => 'use_typography',
				'operator' => '==',
				'value'    => 1,
			),
		)
	);	


	$fields[] = array(
		'type'        => 'radio-image',
		'settings'    => 'opt_layout',
		'label'       => __( 'Choose Layout', 'beam' ),
		'description' => __( 'Choose between No Sidebar, Left Sidebar, Right Sidebar or Double Sidebar templates', 'beam' ),
		'section'     => 'layout_options',
		'default'     => '3',
		'priority'    => 11,
		'choices'     => array(
			'1' => trailingslashit( get_template_directory_uri() ) .'/inc/adm/kirki/assets/images/1col.png',
			'2' => trailingslashit( get_template_directory_uri() ) .'/inc/adm/kirki/assets/images/2cl.png',
			'3' => trailingslashit( get_template_directory_uri() ) .'/inc/adm/kirki/assets/images/2cr.png',
			'4' => trailingslashit( get_template_directory_uri() ) .'/inc/adm/kirki/assets/images/3cm.png',
		),
	);


	$fields[] = array(
		'sanitize_callback' => array( 'Kirki_Sanitize', 'unfiltered' ),
		'type'        => 'textarea',
		'settings'    => 'opt_copyright_new',
		'label'       => __( 'Copyright', 'beam' ),
		'description' => __( 'Edit Copyright Text', 'beam' ),
		'help'        => __( 'This text will be displayed after Footer Menu', 'beam' ),
		'section'     => 'custom_fields',
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
		'priority'    => 10,
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
		'section'     => 'header_options',
		'default'     => 'option-1',
		'priority'    => 12,
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
		'type'        => 'toggle',
		'settings'    => 'opt_show_author',
		'label'       => __( 'Hide Author Bio?', 'beam' ),
		'section'     => 'design_options',
		'default'     => '0',
		'priority'    => 10,
	);	

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'hide_author',
		'label'       => __( 'Hide Author Name?', 'beam' ),
		'section'     => 'design_options',
		'default'     => '0',
		'priority'    => 10,
	);	

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'hide_post_date',
		'label'       => __( 'Hide Post Date?', 'beam' ),
		'section'     => 'design_options',
		'default'     => '0',
		'priority'    => 10,
	);		

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'hide_categories',
		'label'       => __( 'Hide Categories?', 'beam' ),
		'section'     => 'design_options',
		'default'     => '0',
		'priority'    => 10,
	);	

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'hide_tags',
		'label'       => __( 'Hide Tags?', 'beam' ),
		'section'     => 'design_options',
		'default'     => '0',
		'priority'    => 10,
	);	

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'show_updated_date',
		'label'       => __( 'Show Updated Post Date?', 'beam' ),
		'section'     => 'design_options',
		'default'     => '0',
		'priority'    => 11,
	);	

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'hide_comment_bubble',
		'label'       => __( 'Hide Comment Bubble?', 'beam' ),
		'section'     => 'design_options',
		'default'     => '0',
		'priority'    => 10,
	);	

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'hide_featured_image',
		'label'       => __( 'Hide Featured Image?', 'beam' ),
		'section'     => 'design_options',
		'default'     => '0',
		'priority'    => 10,
	);	

	$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'opt_default_width',
		'label'       => __( 'Chose Width', 'beam' ),
		'description' => __( 'Chose Your Preferred Default Site Width', 'beam' ),
		'section'     => 'layout_options',
		'default'     => 'option-2',
		'priority'    => 11,
		'choices'     => array(
			'option-1' => __( '980px', 'beam' ),
			'option-2' => __( '1170px', 'beam' ),

		),
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'load_font_awesome',
		'label'       => __( 'Load Font Awesome?', 'beam' ),
		'section'     => 'gen_advanced',
		'default'     => '0',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'load_bootstrap',
		'label'       => __( 'Load Bootstrap 3?', 'beam' ),
		'section'     => 'gen_advanced',
		'default'     => '0',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'load_animate_css',
		'label'       => __( 'Load Animate CSS?', 'beam' ),
		'section'     => 'gen_advanced',
		'default'     => '0',
		'priority'    => 10,
	);	
	
	return $fields;

}
add_filter( 'kirki/fields', 'kirki_text_controls_fields' );
