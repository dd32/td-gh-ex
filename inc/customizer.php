<?php
/**
 * Class responsible for adding options in Customizer
 */
class Vcready_2016_Kirki_Fields {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'setup_options' ) );
	}
	
	/**
	 * Add our custom fields to the Customizer
	 */
	public function setup_options() {
		
		// Add configuration
		Vcready_2016_Kirki::add_config( 'Vcready_2016_config', array(
			'capability' => 'edit_theme_options',
			'option_type' => 'theme_mod',
		) );


		// Add section header color
		Vcready_2016_Kirki::add_section( 'Vcready_2016_custom_css', array(
			'title'          => esc_html__( 'Header Colors', '2016-vcready' ),
			'priority'       => 40,
			'capability'     => 'edit_theme_options',
		) );
		
		// Add field header color
		Vcready_2016_Kirki::add_field( 'Vcready_2016_config', array(
			'type'        => 'color',
			'settings'    => 'site_header',
			'label'       => esc_html__( 'Header Color', '2016-vcready' ),
			'description' => esc_attr__( 'Change the main color for the header of your site.', '2016-vcready' ),
			'section'     => 'Vcready_2016_custom_css',
			'default'     => '#FFFFFF',
			'priority'    => 1,
			'alpha'       => true,
			'output'       => array(
				array(
					'element'  => '.site-header',
					'property' => 'background',
				),
			),
		) );
		
		// Add field header color
		Vcready_2016_Kirki::add_field( 'Vcready_2016_config', array(
		    'type'        => 'color',
			'settings'    => 'site_header_icons',
			'label'       => esc_html__( 'Social Icons Color', '2016-vcready' ),
			'description' => esc_attr__( 'Change the main color for the social icons.', '2016-vcready' ),
			'section'     => 'Vcready_2016_custom_css',
			'default'     => '#000000',
			'priority'    => 7,
			'alpha'       => true,
			'output'       => array(
				array(
					'element'  => '.social-navigation a:before',
					'property' => 'color',
				),
			),
		) );
		
		/**
 		* Add the typography section
	 	*/
		Vcready_2016_Kirki::add_section( 'typography', array(
		'title'      => esc_attr__( 'Typography', '2016-vcready' ),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		) );
	
		/**
 		* Add the body-typography control
 		*/
		Vcready_2016_Kirki::add_field( 'Vcready_2016_config', array(
		'type'        => 'typography',
		'settings'    => 'body_typography',
		'label'       => esc_attr__( 'Body Typography', '2016-vcready' ),
		'description' => esc_attr__( 'Select the main typography options for your site.', '2016-vcready' ),
		'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', '2016-vcready' ),
		'section'     => 'typography',
		'priority'    => 10,
		'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
	//	'font-size'      => '16px',
	//	'line-height'    => '1.5',
	//  'letter-spacing' => '0',
	    'subsets'        => array( 'latin-ext' ),
		'color'          => '#333333',
		),
			'output' => array(
		array(
			'element' => array( 'body', '.main-navigation'),
		),
	),
) );

		/**
 		* Add the body-typography control
 		*/
		Vcready_2016_Kirki::add_field( 'Vcready_2016_config', array(
		'type'        => 'typography',
		'settings'    => 'headers_typography',
		'label'       => esc_attr__( 'Headers Typography', '2016-vcready' ),
		'description' => esc_attr__( 'Select the typography options for your titles.', '2016-vcready' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', '2016-vcready' ),
		'section'     => 'typography',
		'priority'    => 10,
		'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
    // 'font-size'      => '16px',
	// 'line-height'    => '1.5',
	// 'letter-spacing' => '0',
	    'subsets'        => array( 'latin-ext' ),
	    'color'          => '#333333',
		),
		'output' => array(
		array(
			'element'   => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
		),
		array(
			'element'  => array( '.entry-title', '.widget .widget-title', '.site-title'),
		),
	),
) );
    
      /**
 		* Add the typography section
	 	*/
		Vcready_2016_Kirki::add_section( 'vc_ready_read_more_button', array(
		'title'      => esc_attr__( 'Blog Layout', '2016-vcready' ),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		) );
      
      
      /**
 		* Add option to remove read more button
 		*/
		Vcready_2016_Kirki::add_field( 'Vcready_2016_config_id', array(
			'type'        => 'switch',
			'settings'    => 'read_more_button',
			'label'       => esc_attr__( 'Disable/Enable Read More Button', '2016-vcready' ),
			'description' => esc_attr__( 'Disable or enable the read more button on your homepage or blog.', '2016-vcready' ),
			'section'     => 'vc_ready_read_more_button',
			'default'     => '1',
			'priority'    => 30,
			'choices'     => array(
				'on'  => esc_attr__( 'Enable', '2016-vcready' ),
				'off' => esc_attr__( 'Disable', '2016-vcready' ),
			),
		) );
      
      /**
 		* Add option switch layout
 		*/
		Vcready_2016_Kirki::add_field( 'Vcready_2016_config_id', array(
			'type'        => 'switch',
			'settings'    => 'switch_layout',
			'label'       => esc_attr__( 'Switch archive post display', '2016-vcready' ),
			'description' => esc_attr__( 'Switch blog archive display from full width to boxed. Boxed layout should only be enabled if your blog has featured images.', '2016-vcready' ),
			'section'     => 'vc_ready_read_more_button',
			'default'     => '1',
			'priority'    => 30,
			'choices'     => array(
				'on'  => esc_attr__( 'Full Width', '2016-vcready' ),
				'off' => esc_attr__( 'Boxed', '2016-vcready' ),
			),
		) );

	}
}

// Init class
new Vcready_2016_Kirki_Fields();