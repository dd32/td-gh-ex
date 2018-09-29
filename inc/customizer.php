<?php
/**
 * Advance Business Theme Customizer
 *
 * @package advance-business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_business_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_business_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-business'),
		'description'    => __('Description of what this panel does.', 'advance-business'),
	));

	//Layouts
	$wp_customize->add_section('advance_business_left_right', array(
		'title'    => __('Layout Settings', 'advance-business'),
		'priority' => 30,
		'panel'    => 'advance_business_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_business_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-business'),
		'sanitize_callback' => 'advance_business_sanitize_choices',
	));
	$wp_customize->add_control('advance_business_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-business'),
		'section'        => 'advance_business_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-business'),
			'Right Sidebar' => __('Right Sidebar', 'advance-business'),
			'One Column'    => __('One Column', 'advance-business'),
			'Three Columns' => __('Three Columns', 'advance-business'),
			'Four Columns'  => __('Four Columns', 'advance-business'),
			'Grid Layout'   => __('Grid Layout', 'advance-business')
		),
	));

	//Slider
	$wp_customize->add_section( 'advance_business_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-business' ),
		'priority'   => null,
		'panel' => 'advance_business_panel_id'
	) );

	$wp_customize->add_setting('advance_business_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_business_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-business'),
       'section' => 'advance_business_slider',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'advance_business_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_business_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_business_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-business' ),
			'section'  => 'advance_business_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Contact Detail section
	$wp_customize->add_section('advance_business_contact_detail',array(
		'title'	=> __('Contact Detail Section','advance-business'),
		'description'	=> __('Add Content here','advance-business'),
		'priority'	=> null,
		'panel' => 'advance_business_panel_id',
	));

	$wp_customize->add_setting('advance_business_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_business_location',array(
		'label'	=> __('Add location','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'setting'	=> 'advance_business_location',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('advance_business_location_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_business_location_title',array(
		'label'	=> __('Title For Location','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_business_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_business_email',array(
		'label'	=> __('Add Email','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'setting'	=> 'advance_business_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('advance_business_email_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_business_email_title',array(
		'label'	=> __('Title For Email Address','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_business_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_business_contact',array(
		'label'	=> __('Add Phone Number','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'setting'	=> 'advance_business_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('advance_business_contact_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_business_contact_title',array(
		'label'	=> __('Title For Phone Number','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'type'	=> 'text'
	));

	//Latest Projects
	$wp_customize->add_section('advance_business_category',array(
		'title'	=> __('Latest Projects Section','advance-business'),
		'description'	=> __('Add Latest Projects section below.','advance-business'),
		'panel' => 'advance_business_panel_id',
	));

	$wp_customize->add_setting('advance_business_projects_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_business_projects_title',array(
	    'label' => __('Section Title','advance-business'),
	    'section' => 'advance_business_category',
	    'type'  => 'text'
   	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('advance_business_projects_category_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_business_sanitize_choices',
	));	
	$wp_customize->add_control('advance_business_projects_category_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-business'),
		'description'	=> __('Size of image should be 268 x 250','advance-business'),
		'section' => 'advance_business_category',
	));

	//footer
	$wp_customize->add_section('advance_business_footer_section', array(
		'title'       => __('Footer Text', 'advance-business'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-business'),
		'priority'    => null,
		'panel'       => 'advance_business_panel_id',
	));

	$wp_customize->add_setting('advance_business_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_business_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-business'),
		'section' => 'advance_business_footer_section',
		'type'    => 'text',
	));
}
add_action('customize_register', 'advance_business_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Business_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
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
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the conadvance_business_Customizetrols.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Advance_Business_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Business_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Business Pro Theme', 'advance-business'),
					'pro_text' => esc_html__('Go Pro', 'advance-business'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/wordpress-theme-for-business/'),
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

		wp_enqueue_script('advance-business-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-business-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Business_Customize::get_instance();