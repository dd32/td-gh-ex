<?php
/**
 * Class responsible for adding options in Customizer
 */
class Twentysixteen_Child_Kirki_Fields {

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
		Twentysixteen_Child_Kirki::add_config( 'twentysixteen_child_config', array(
			'capability' => 'edit_theme_options',
			'option_type' => 'theme_mod',
		) );


		// Add section header color
		Twentysixteen_Child_Kirki::add_section( 'twentysixteen_child_custom_css', array(
			'title'          => esc_html__( 'Header Colors', 'twenty-sixteen-child' ),
			'priority'       => 3,
			'capability'     => 'edit_theme_options',
		) );
		
		// Add field header color
		Twentysixteen_Child_Kirki::add_field( 'twentysixteen_child_config', array(
			'type'        => 'color',
			'settings'    => 'site_header',
			'label'       => esc_html__( 'Header Color', 'twenty-sixteen-child' ),
			'description' => esc_attr__( 'Change the main color for the header of your site.', 'twenty-sixteen-child' ),
			'section'     => 'twentysixteen_child_custom_css',
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
		Twentysixteen_Child_Kirki::add_field( 'twentysixteen_child_config', array(
		    'type'        => 'color',
			'settings'    => 'site_header_icons',
			'label'       => esc_html__( 'Social Icons Color', 'twenty-sixteen-child' ),
			'description' => esc_attr__( 'Change the main color for the social icons.', 'twenty-sixteen-child' ),
			'section'     => 'twentysixteen_child_custom_css',
			'default'     => '#000000',
			'priority'    => 3,
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
		Twentysixteen_Child_Kirki::add_section( 'typography', array(
		'title'      => esc_attr__( 'Typography', 'twenty-sixteen-child' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
		) );
	
		/**
 		* Add the body-typography control
 		*/
		Twentysixteen_Child_Kirki::add_field( 'twentysixteen_child_config', array(
		'type'        => 'typography',
		'settings'    => 'body_typography',
		'label'       => esc_attr__( 'Body Typography', 'twenty-sixteen-child' ),
		'description' => esc_attr__( 'Select the main typography options for your site.', 'twenty-sixteen-child' ),
		'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', 'twenty-sixteen-child' ),
		'section'     => 'typography',
		'priority'    => 10,
		'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
		'font-size'      => '16px',
	//	'line-height'    => '1.5',
	//  'letter-spacing' => '0',
		'color'          => '#333333',
		),
			'output' => array(
		array(
			'element' => 'body',
		),
	),
) );

		/**
 		* Add the body-typography control
 		*/
		Twentysixteen_Child_Kirki::add_field( 'twentysixteen_child_config', array(
		'type'        => 'typography',
		'settings'    => 'headers_typography',
		'label'       => esc_attr__( 'Headers Typography', 'twenty-sixteen-child' ),
		'description' => esc_attr__( 'Select the typography options for your headers.', 'twenty-sixteen-child' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', 'twenty-sixteen-child' ),
		'section'     => 'typography',
		'priority'    => 10,
		'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
	    'font-size'      => '16px',
	// 'line-height'    => '1.5',
	// 'letter-spacing' => '0',
	    'color'          => '#333333',
		),
		'output' => array(
		array(
			'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.h1', '.h2', '.h3', '.h4', '.h5', '.h6' ),
		),
	),
    ) );

	}
}

			
// Init class
new Twentysixteen_Child_Kirki_Fields();