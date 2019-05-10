<?php
/**
 * Automotive Centre Theme Customizer
 *
 * @package Automotive Centre
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function automotive_centre_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'automotive_centre_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'automotive-centre' ),
	) );

	// Layout
	$wp_customize->add_section( 'automotive_centre_left_right', array(
    	'title'      => __( 'General Settings', 'automotive-centre' ),
		'panel' => 'automotive_centre_panel_id'
	) );

	$wp_customize->add_setting('automotive_centre_theme_options',array(
        'default' => __('Right Sidebar','automotive-centre'),
        'sanitize_callback' => 'automotive_centre_sanitize_choices'
	));
	$wp_customize->add_control('automotive_centre_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','automotive-centre'),
        'description' => __('Here you can change the sidebar layout for posts. ','automotive-centre'),
        'section' => 'automotive_centre_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','automotive-centre'),
            'Right Sidebar' => __('Right Sidebar','automotive-centre'),
            'One Column' => __('One Column','automotive-centre'),
            'Three Columns' => __('Three Columns','automotive-centre'),
            'Four Columns' => __('Four Columns','automotive-centre'),
            'Grid Layout' => __('Grid Layout','automotive-centre')
        ),
	) );

	$wp_customize->add_setting('automotive_centre_page_layout',array(
        'default' => __('One Column','automotive-centre'),
        'sanitize_callback' => 'automotive_centre_sanitize_choices'
	));
	$wp_customize->add_control('automotive_centre_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','automotive-centre'),
        'description' => __('Here you can change the sidebar layout for pages. ','automotive-centre'),
        'section' => 'automotive_centre_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','automotive-centre'),
            'Right Sidebar' => __('Right Sidebar','automotive-centre'),
            'One Column' => __('One Column','automotive-centre')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'automotive_centre_topbar', array(
    	'title'      => __( 'Topbar Settings', 'automotive-centre' ),
		'panel' => 'automotive_centre_panel_id'
	) );

	$wp_customize->add_setting('automotive_centre_phone_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automotive_centre_phone_text',array(
		'label'	=> __('Add Text','automotive-centre'),
		'input_attrs' => array(
            'placeholder' => __( 'PHONE', 'automotive-centre' ),
        ),
		'section'=> 'automotive_centre_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automotive_centre_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automotive_centre_phone_number',array(
		'label'	=> __('Add Phone Number','automotive-centre'),
		'input_attrs' => array(
            'placeholder' => __( '+789 456 1230', 'automotive-centre' ),
        ),
		'section'=> 'automotive_centre_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automotive_centre_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automotive_centre_email_text',array(
		'label'	=> __('Add Text','automotive-centre'),
		'input_attrs' => array(
            'placeholder' => __( 'EMAIL', 'automotive-centre' ),
        ),
		'section'=> 'automotive_centre_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automotive_centre_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automotive_centre_email_address',array(
		'label'	=> __('Add Email Address','automotive-centre'),
		'input_attrs' => array(
            'placeholder' => __( 'example@123.com', 'automotive-centre' ),
        ),
		'section'=> 'automotive_centre_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automotive_centre_top_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automotive_centre_top_button_text',array(
		'label'	=> __('Add Button Text','automotive-centre'),
		'input_attrs' => array(
            'placeholder' => __( 'SELL YOUR CAR', 'automotive-centre' ),
        ),
		'section'=> 'automotive_centre_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automotive_centre_top_button_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automotive_centre_top_button_url',array(
		'label'	=> __('Add Button URL','automotive-centre'),
		'input_attrs' => array(
            'placeholder' => __( 'https://example.com/', 'automotive-centre' ),
        ),
		'section'=> 'automotive_centre_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('automotive_centre_header_search',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('automotive_centre_header_search',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Search','automotive-centre'),
       'section' => 'automotive_centre_topbar',
    ));
    
	//Slider
	$wp_customize->add_section( 'automotive_centre_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'automotive-centre' ),
		'panel' => 'automotive_centre_panel_id'
	) );

	$wp_customize->add_setting('automotive_centre_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('automotive_centre_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','automotive-centre'),
       'section' => 'automotive_centre_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'automotive_centre_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'automotive_centre_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'automotive_centre_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'automotive-centre' ),
			'description' => __('Slider image size (1500 x 650)','automotive-centre'),
			'section'  => 'automotive_centre_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
    
	//About Us section
	$wp_customize->add_section( 'automotive_centre_about_section' , array(
    	'title'      => __( 'About us Settings', 'automotive-centre' ),
		'priority'   => null,
		'panel' => 'automotive_centre_panel_id'
	) );

	$wp_customize->add_setting('automotive_centre_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automotive_centre_section_title',array(
		'label'	=> __('Add Section Title','automotive-centre'),
		'input_attrs' => array(
            'placeholder' => __( 'ABOUT US', 'automotive-centre' ),
        ),
		'section'=> 'automotive_centre_about_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'automotive_centre_about_page' , array(
		'default'           => '',
		'sanitize_callback' => 'automotive_centre_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'automotive_centre_about_page' , array(
		'label'    => __( 'Select About Page', 'automotive-centre' ),
		'section'  => 'automotive_centre_about_section',
		'type'     => 'dropdown-pages'
	) );

	//Content Creation
	$wp_customize->add_section( 'automotive_centre_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'automotive-centre' ),
		'priority' => null,
		'panel' => 'automotive_centre_panel_id'
	) );

	$wp_customize->add_setting('automotive_centre_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new Automotive_Centre_Content_Creation( $wp_customize, 'automotive_centre_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','automotive-centre' ),
		),
		'section' => 'automotive_centre_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'automotive-centre' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('automotive_centre_footer',array(
		'title'	=> __('Footer Settings','automotive-centre'),
		'panel' => 'automotive_centre_panel_id',
	));	
	
	$wp_customize->add_setting('automotive_centre_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automotive_centre_footer_text',array(
		'label'	=> __('Copyright Text','automotive-centre'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'automotive-centre' ),
        ),
		'section'=> 'automotive_centre_footer',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'automotive_centre_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Automotive_Centre_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Automotive_Centre_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new Automotive_Centre_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'AUTOMOTIVE PRO', 'automotive-centre' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'automotive-centre' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/automotive-wordpress-theme/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'automotive-centre-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'automotive-centre-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Automotive_Centre_Customize::get_instance();