<?php
/**
 * akhada-fitness-gym: Customizer
 *
 * @package WordPress
 * @subpackage akhada-fitness-gym
 * @since 1.0
 */

function akhada_fitness_gym_customize_register( $wp_customize ) {

	$wp_customize->add_setting('akhada_fitness_gym_show_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('akhada_fitness_gym_show_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','akhada-fitness-gym'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('akhada_fitness_gym_show_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('akhada_fitness_gym_show_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Tagline','akhada-fitness-gym'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_panel( 'akhada_fitness_gym_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'akhada-fitness-gym' ),
	    'description' => __( 'Description of what this panel does.', 'akhada-fitness-gym' ),
	) );

	$wp_customize->add_section( 'akhada_fitness_gym_theme_options_section', array(
    	'title'      => __( 'General Settings', 'akhada-fitness-gym' ),
		'priority'   => 30,
		'panel' => 'akhada_fitness_gym_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('akhada_fitness_gym_theme_options',array(
	        'default' => __('Right Sidebar','akhada-fitness-gym'),
	        'sanitize_callback' => 'akhada_fitness_gym_sanitize_choices'	        
	));

	$wp_customize->add_control('akhada_fitness_gym_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section','akhada-fitness-gym'),
	        'section' => 'akhada_fitness_gym_theme_options_section',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','akhada-fitness-gym'),
	            'Right Sidebar' => __('Right Sidebar','akhada-fitness-gym'),
	            'One Column' => __('One Column','akhada-fitness-gym'),
	            'Three Columns' => __('Three Columns','akhada-fitness-gym'),
	            'Four Columns' => __('Four Columns','akhada-fitness-gym'),
	            'Grid Layout' => __('Grid Layout','akhada-fitness-gym')
	        ),
	));

	// Contact Details
	$wp_customize->add_section( 'akhada_fitness_gym_contact_details', array(
    	'title'      => __( 'Contact Details', 'akhada-fitness-gym' ),
		'priority'   => null,
		'panel' => 'akhada_fitness_gym_panel_id'
	) );

	$wp_customize->add_setting('akhada_fitness_gym_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('akhada_fitness_gym_mail',array(
		'label'	=> __('Email Address','akhada-fitness-gym'),
		'section'=> 'akhada_fitness_gym_contact_details',
		'setting'=> 'akhada_fitness_gym_mail',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('akhada_fitness_gym_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('akhada_fitness_gym_location',array(
		'label'	=> __('Address','akhada-fitness-gym'),
		'section'=> 'akhada_fitness_gym_contact_details',
		'setting'=> 'akhada_fitness_gym_location',
		'type'=> 'text'
	));

	//slider
	$wp_customize->add_section( 'akhada_fitness_gym_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'akhada-fitness-gym' ),
		'priority'   => null,
		'panel' => 'akhada_fitness_gym_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'akhada_fitness_gym_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'akhada_fitness_gym_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'akhada_fitness_gym_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'akhada-fitness-gym' ),
			'section'  => 'akhada_fitness_gym_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//OUR services
	$wp_customize->add_section('akhada_fitness_gym_service_section',array(
		'title'	=> __('Our Services','akhada-fitness-gym'),
		'description'=> __('This section will appear below the slider.','akhada-fitness-gym'),
		'panel' => 'akhada_fitness_gym_panel_id',
	));

	$wp_customize->add_setting('akhada_fitness_gym_service_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('akhada_fitness_gym_service_title',array(
		'label'	=> __('Section Title','akhada-fitness-gym'),
		'section'	=> 'akhada_fitness_gym_service_section',
		'setting'	=> 'akhada_fitness_gym_service_title',
		'type'		=> 'text'
	));

	for ( $count = 0; $count <= 3; $count++ ) {

		$wp_customize->add_setting( 'akhada_fitness_gym_service' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_control( 'akhada_fitness_gym_service' . $count, array(
			'label'    => __( 'Select Service Page', 'akhada-fitness-gym' ),
			'section'  => 'akhada_fitness_gym_service_section',
			'type'     => 'dropdown-pages'
		));
	}

	//Footer
    $wp_customize->add_section( 'akhada_fitness_gym_footer', array(
    	'title'      => __( 'Footer Text', 'akhada-fitness-gym' ),
		'priority'   => null,
		'panel' => 'akhada_fitness_gym_panel_id'
	) );

    $wp_customize->add_setting('akhada_fitness_gym_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('akhada_fitness_gym_footer_copy',array(
		'label'	=> __('Footer Text','akhada-fitness-gym'),
		'section'	=> 'akhada_fitness_gym_footer',
		'setting'	=> 'akhada_fitness_gym_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'akhada_fitness_gym_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'akhada_fitness_gym_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'akhada_fitness_gym_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'akhada-fitness-gym' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'akhada-fitness-gym' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'akhada_fitness_gym_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'akhada_fitness_gym_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'akhada_fitness_gym_customize_register' );

function akhada_fitness_gym_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}

function akhada_fitness_gym_customize_partial_blogname() {
	bloginfo( 'name' );
}

function akhada_fitness_gym_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


function akhada_fitness_gym_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function akhada_fitness_gym_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Akhada_Fitness_Gym_Customize {

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
		$manager->register_section_type( 'Akhada_Fitness_Gym_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Akhada_Fitness_Gym_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Akhada Fitness Pro', 'akhada-fitness-gym' ),
					'pro_text' => esc_html__( 'Go Pro','akhada-fitness-gym' ),
					'pro_url'  => esc_url( 'https://www.luzuk.com/themes/akhada-fitness-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'akhada-fitness-gym-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'akhada-fitness-gym-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Akhada_Fitness_Gym_Customize::get_instance();