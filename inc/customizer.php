<?php
/**
 * Advance Education Theme Customizer
 *
 * @package advance-education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_education_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_education_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-education'),
		'description'    => __('Description of what this panel does.', 'advance-education'),
	));	

	//Top Bar
	$wp_customize->add_section('advance_education_topbar',array(
		'title'	=> __('Topbar Section','advance-education'),
		'description'	=> __('Add topbar content','advance-education'),
		'priority'	=> null,
		'panel' => 'advance_education_panel_id',
	));

	$wp_customize->add_setting('advance_education_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_mail1',array(
		'label'	=> __('Mail Address','advance-education'),
		'section'	=> 'advance_education_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_education_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_phone1',array(
		'label'	=> __('Phone Number','advance-education'),
		'section'	=> 'advance_education_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_education_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_time',array(
		'label'	=> __('Timing Text','advance-education'),
		'section'	=> 'advance_education_topbar',
		'type'	=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'advance_education_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-education' ),
		'priority'   => null,
		'panel' => 'advance_education_panel_id'
	) );

	$wp_customize->add_setting('advance_education_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_education_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-education'),
       'section' => 'advance_education_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'advance_education_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_education_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_education_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-education' ),
			'description'	=> __('Size of image should be 1600 x 633','advance-education'),
			'section'  => 'advance_education_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Popular Courses 
	$wp_customize->add_section('advance_education_category',array(
		'title'	=> __('Popular Courses','advance-education'),
		'description'	=> __('Add  section below.','advance-education'),
		'panel' => 'advance_education_panel_id',
	));

	$wp_customize->add_setting('advance_education_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_education_title',array(
	    'label' => __('Section Title','advance-education'),
	    'section' => 'advance_education_category',
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

	$wp_customize->add_setting('advance_education_popular_courses_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_education_sanitize_choices',
	));	
	$wp_customize->add_control('advance_education_popular_courses_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-education'),
		'description'	=> __('Size of image should be 370 x 240','advance-education'),
		'section' => 'advance_education_category',
	));

	//footer
	$wp_customize->add_section('advance_education_footer_section', array(
		'title'       => __('Footer Text', 'advance-education'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-education'),
		'priority'    => null,
		'panel'       => 'advance_education_panel_id',
	));

	$wp_customize->add_setting('advance_education_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-education'),
		'section' => 'advance_education_footer_section',
		'type'    => 'text',
	));

	//Layouts
	$wp_customize->add_section('advance_education_left_right', array(
		'title'    => __('Sidebar Layout Settings', 'advance-education'),
		'priority' => null,
		'panel'    => 'advance_education_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_education_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-education'),
		'sanitize_callback' => 'advance_education_sanitize_choices',
	));
	$wp_customize->add_control('advance_education_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-education'),
		'section'        => 'advance_education_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-education'),
			'Right Sidebar' => __('Right Sidebar', 'advance-education'),
			'One Column'    => __('One Column', 'advance-education'),
			'Grid Layout'   => __('Grid Layout', 'advance-education')
		),
	));
}
add_action('customize_register', 'advance_education_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Education_Customize {

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

		// Register scripts and styles for the conadvance_education_Customizetrols.
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
		$manager->register_section_type('Advance_Education_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Education_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Education Pro Theme', 'advance-education'),
					'pro_text' => esc_html__('Go Pro', 'advance-education'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/education-wordpress-theme/'),
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

		wp_enqueue_script('advance-education-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-education-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Education_Customize::get_instance();