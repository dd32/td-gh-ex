<?php
/**
 * BB Mobile Application Theme Customizer
 *
 * @package BB Mobile Application
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bb_mobile_application_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'bb_mobile_application_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'BB Settings', 'bb-mobile-application' ),
	    'description' => __( 'Description of what this panel does.', 'bb-mobile-application' ),
	) );

	//Layouts
	$wp_customize->add_section( 'bb_mobile_application_left_right', array(
    	'title'      => __( 'General Settings', 'bb-mobile-application' ),
		'priority'   => 30,
		'panel' => 'bb_mobile_application_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('bb_mobile_application_theme_options',array(
	        'default' => '',
	        'sanitize_callback' => 'bb_mobile_application_sanitize_choices'
	));

	$wp_customize->add_control('bb_mobile_application_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => 'Change Layouts',
	        'section' => 'bb_mobile_application_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','bb-mobile-application'),
	            'Right Sidebar' => __('Right Sidebar','bb-mobile-application'),
	            'One Column' => __('One Column','bb-mobile-application'),
	            'Three Columns' => __('Three Columns','bb-mobile-application'),
	            'Four Columns' => __('Four Columns','bb-mobile-application'),
	            'Grid Layout' => __('Grid Layout','bb-mobile-application')
	        ),
	    )
    );

	//home page slider
	$wp_customize->add_section( 'bb_mobile_application_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'bb-mobile-application' ),
		'priority'   => 30,
		'panel' => 'bb_mobile_application_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'bb_mobile_application_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'bb_mobile_application_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'bb-mobile-application' ),
			'section'  => 'bb_mobile_application_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}

	//Creative Feature
	$wp_customize->add_section('bb_mobile_application_creative_section',array(
		'title'	=> __('Creative Features Section','bb-mobile-application'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'bb_mobile_application_panel_id',
	));
	
	$wp_customize->add_setting('bb_mobile_application_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control('bb_mobile_application_title',array(
		'label'	=> __('Title','bb-mobile-application'),
		'section'	=> 'bb_mobile_application_creative_section',
		'type'	=> 'text'
	));

	// category left
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

	$wp_customize->add_setting('bb_mobile_application_blogcategory_left_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('bb_mobile_application_blogcategory_left_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','bb-mobile-application'),
		'section' => 'bb_mobile_application_creative_section',
	));

	//middle image
	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('the_wp_business_middle_image_setting',array(
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('the_wp_business_middle_image_setting',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post to display featured image','bb-mobile-application'),
		'section' => 'bb_mobile_application_creative_section',
	));

	// category right
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

	$wp_customize->add_setting('bb_mobile_application_blogcategory_right_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('bb_mobile_application_blogcategory_right_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','bb-mobile-application'),
		'section' => 'bb_mobile_application_creative_section',
	));
	

	$wp_customize->add_section('bb_mobile_application_footer_section',array(
		'title'	=> __('Footer Text','bb-mobile-application'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'bb_mobile_application_panel_id',
	));
	
	$wp_customize->add_setting('bb_mobile_application_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('bb_mobile_application_footer_copy',array(
		'label'	=> __('Copyright Text','bb-mobile-application'),
		'section'	=> 'bb_mobile_application_footer_section',
		'type'		=> 'textarea'
	));
	
}
add_action( 'customize_register', 'bb_mobile_application_customize_register' );	


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class bb_mobile_application_customize {

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
		$manager->register_section_type( 'bb_mobile_application_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new bb_mobile_application_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'Upgrade to Pro', 'bb-mobile-application' ),
					'pro_text' => esc_html__( 'Go Pro',         'bb-mobile-application' ),
					'pro_url'  => 'http://www.themeshopy.com/bb-mobile-application-theme/'
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

		wp_enqueue_script( 'bb-mobile-application-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bb-mobile-application-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
bb_mobile_application_customize::get_instance();