<?php
/**
 * Automobile Car Dealer Theme Customizer
 * @package Automobile Car Dealer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function automobile_car_dealer_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'automobile_car_dealer_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'automobile-car-dealer' ),
	    'description' => __( 'Description of what this panel does.', 'automobile-car-dealer' ),
	) );

	//layout setting
	$wp_customize->add_section( 'automobile_car_dealer_option', array(
    	'title'      => __( 'Layout Settings', 'automobile-car-dealer' ),
		'priority'   => 30,
		'panel' => 'automobile_car_dealer_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('automobile_car_dealer_layout_options',array(
	        'default' => __('Right Sidebar','automobile-car-dealer'),
	        'sanitize_callback' => 'automobile_car_dealer_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('automobile_car_dealer_layout_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section','automobile-car-dealer'),
	        'section' => 'automobile_car_dealer_option',
	        'choices' => array(
	            'One Column' => __('One Column','automobile-car-dealer'),
	            'Three Columns' => __('Three Columns','automobile-car-dealer'),
	            'Four Columns' => __('Four Columns','automobile-car-dealer'),
	            'Grid Layout' => __('Grid Layout','automobile-car-dealer'),
	            'Left Sidebar' => __('Left Sidebar','automobile-car-dealer'),
	            'Right Sidebar' => __('Right Sidebar','automobile-car-dealer')
	        ),
	    )
    );

	//Social Icons(topbar)
	$wp_customize->add_section('automobile_car_dealer_topbar_header',array(
		'title'	=> __('Social Icon Section','automobile-car-dealer'),
		'description'	=> __('Add Socail Link here','automobile-car-dealer'),
		'priority'	=> null,
		'panel' => 'automobile_car_dealer_panel_id',
	));

	$wp_customize->add_setting('automobile_car_dealer_cont_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('automobile_car_dealer_cont_facebook',array(
		'label'	=> __('Add Facebook link','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_topbar_header',
		'setting'	=> 'automobile_car_dealer_cont_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('automobile_car_dealer_cont_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('automobile_car_dealer_cont_twitter',array(
		'label'	=> __('Add Twitter link','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_topbar_header',
		'setting'	=> 'automobile_car_dealer_cont_twitter',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('automobile_car_dealer_google_plus',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('automobile_car_dealer_google_plus',array(
		'label'	=> __('Add Google Plus link','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_topbar_header',
		'setting'	=> 'automobile_car_dealer_google_plus',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('automobile_car_dealer_pinterest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('automobile_car_dealer_pinterest',array(
		'label'	=> __('Add Pintrest link','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_topbar_header',
		'setting'	=> 'automobile_car_dealer_pinterest',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('automobile_car_dealer_tumblr',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('automobile_car_dealer_tumblr',array(
		'label'	=> __('Add Tumblr link','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_topbar_header',
		'setting'	=> 'automobile_car_dealer_tumblr',
		'type'		=> 'url'
	));

	//Top Bar(topbar)
	$wp_customize->add_section('automobile_car_dealer_contact',array(
		'title'	=> __('Contact Us','automobile-car-dealer'),
		'description'	=> __('Add contact us here','automobile-car-dealer'),
		'priority'	=> null,
		'panel' => 'automobile_car_dealer_panel_id',
	));

	$wp_customize->add_setting('automobile_car_dealer_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_car_dealer_mail',array(
		'label'	=> __('Email','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('automobile_car_dealer_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_car_dealer_phone',array(
		'label'	=> __('Phone No','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('automobile_car_dealer_button_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('automobile_car_dealer_button_link',array(
		'label'	=> __('Appointment us url','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_contact',
		'setting'	=> 'automobile_car_dealer_button_link',
		'type'		=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'automobile_car_dealer_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'automobile-car-dealer' ),
		'priority'   => 30,
		'panel' => 'automobile_car_dealer_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'automobile_car_dealer_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'automobile_car_dealer_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'automobile-car-dealer' ),
			'section'  => 'automobile_car_dealer_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//About
	$wp_customize->add_section('automobile_car_dealer_project',array(
		'title'	=> __('Our Project Section','automobile-car-dealer'),
		'description'	=> __('Add Our Project sections below.','automobile-car-dealer'),
		'panel' => 'automobile_car_dealer_panel_id',
	));

	$wp_customize->add_setting('automobile_car_dealer_sec_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('automobile_car_dealer_sec_title',array(
		'label'	=> __('Title','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_project',
		'type'		=> 'text'
	));

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('automobile_car_dealer_project_single_post',array(
		'default' =>'select post',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('automobile_car_dealer_project_single_post',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','automobile-car-dealer'),
		'section' => 'automobile_car_dealer_project',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('automobile_car_dealer_project_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('automobile_car_dealer_project_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','automobile-car-dealer'),
		'section' => 'automobile_car_dealer_project',
	));
	
	//footer text
	$wp_customize->add_section('automobile_car_dealer_footer_section',array(
		'title'	=> __('Footer Text','automobile-car-dealer'),
		'description'	=> __('Add some text for footer like copyright etc.','automobile-car-dealer'),
		'panel' => 'automobile_car_dealer_panel_id'
	));
	
	$wp_customize->add_setting('automobile_car_dealer_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('automobile_car_dealer_footer_copy',array(
		'label'	=> __('Copyright Text','automobile-car-dealer'),
		'section'	=> 'automobile_car_dealer_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'automobile_car_dealer_customize_register' );	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function automobile_car_dealer_customize_preview_js() {
	wp_enqueue_script( 'automobile_car_dealer_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'automobile_car_dealer_customize_preview_js' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class automobile_car_dealer_customize {

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
		$manager->register_section_type( 'automobile_car_dealer_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new automobile_car_dealer_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'Automobile Pro', 'automobile-car-dealer' ),
					'pro_text' => esc_html__( 'Go Pro', 'automobile-car-dealer' ),
					'pro_url'  => '#',
					'priority'   => 9
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

		wp_enqueue_script( 'automobile-car-dealer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'automobile-car-dealer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
automobile_car_dealer_customize::get_instance();