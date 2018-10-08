<?php
/**
 * Advance Coaching Theme Customizer
 *
 * @package advance-coaching
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_coaching_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_coaching_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-coaching'),
		'description'    => __('Description of what this panel does.', 'advance-coaching'),
	));

	//Layouts
	$wp_customize->add_section('advance_coaching_left_right', array(
		'title'    => __('Layout Settings', 'advance-coaching'),
		'priority' => 30,
		'panel'    => 'advance_coaching_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_coaching_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-coaching'),
		'sanitize_callback' => 'advance_coaching_sanitize_choices',
	));
	$wp_customize->add_control('advance_coaching_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-coaching'),
		'section'        => 'advance_coaching_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-coaching'),
			'Right Sidebar' => __('Right Sidebar', 'advance-coaching'),
			'One Column'    => __('One Column', 'advance-coaching'),
			'Three Columns' => __('Three Columns', 'advance-coaching'),
			'Four Columns'  => __('Four Columns', 'advance-coaching'),
			'Grid Layout'   => __('Grid Layout', 'advance-coaching')
		),
	));

	//Top Bar
	$wp_customize->add_section('advance_coaching_topbar',array(
		'title'	=> __('Topbar Section','advance-coaching'),
		'description'	=> __('Add Content here','advance-coaching'),
		'priority'	=> null,
		'panel' => 'advance_coaching_panel_id',
	));

	$wp_customize->add_setting('advance_coaching_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_time',array(
		'label'	=> __('Timing','advance-coaching'),
		'section'	=> 'advance_coaching_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_welcome_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_welcome_text',array(
		'label'	=> __('Welcome Text','advance-coaching'),
		'section'	=> 'advance_coaching_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_course1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('advance_coaching_course1',array(
		'label'	=> __('Button text','advance-coaching'),
		'section'	=> 'advance_coaching_topbar',
		'type'	=> 'text'
		));

		$wp_customize->add_setting('advance_coaching_course',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
		));	
		$wp_customize->add_control('advance_coaching_course',array(
		'label'	=> __('Add Link','advance-coaching'),
		'section'	=> 'advance_coaching_topbar',
		'setting'	=> 'advance_coaching_course',
		'type'	=> 'url'
	));

	//Contact details

	$wp_customize->add_section('advance_coaching_contact',array(
		'title'	=> __('Contact Section','advance-coaching'),
		'description'	=> __('Add Content here','advance-coaching'),
		'priority'	=> null,
		'panel' => 'advance_coaching_panel_id',
	));

	$wp_customize->add_setting('advance_coaching_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_mail',array(
		'label'	=> __('Email Text','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_mail1',array(
		'label'	=> __('Mail Address','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_phone',array(
		'label'	=> __('Phone Number Text','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_phone1',array(
		'label'	=> __('Phone Number','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_address',array(
		'label'	=> __('Address Text','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_address1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_address1',array(
		'label'	=> __('Address ','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'advance_coaching_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-coaching' ),
		'priority'   => null,
		'panel' => 'advance_coaching_panel_id'
	) );

	$wp_customize->add_setting('advance_coaching_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-coaching'),
       'section' => 'advance_coaching_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'advance_coaching_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_coaching_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_coaching_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-coaching' ),
			'description'	=> __('Size of image should be 1600 x 680','advance-coaching'),
			'section'  => 'advance_coaching_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Service Section
	$wp_customize->add_section('advance_coaching_category',array(
		'title'	=> __('Service Section','advance-coaching'),
		'description'	=> __('Add  section below.','advance-coaching'),
		'panel' => 'advance_coaching_panel_id',
	));

	$wp_customize->add_setting('advance_coaching_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_coaching_title',array(
	    'label' => __('Section Title','advance-coaching'),
	    'section' => 'advance_coaching_category',
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

	$wp_customize->add_setting('advance_coaching_projects_category_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_coaching_sanitize_choices',
	));	
	$wp_customize->add_control('advance_coaching_projects_category_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-coaching'),
		'description'	=> __('Size of image should be 370 x 240','advance-coaching'),
		'section' => 'advance_coaching_category',
	));

	//footer
	$wp_customize->add_section('advance_coaching_footer_section', array(
		'title'       => __('Footer Text', 'advance-coaching'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-coaching'),
		'priority'    => null,
		'panel'       => 'advance_coaching_panel_id',
	));

	$wp_customize->add_setting('advance_coaching_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-coaching'),
		'section' => 'advance_coaching_footer_section',
		'type'    => 'text',
	));
}
add_action('customize_register', 'advance_coaching_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Coaching_Customize {

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

		// Register scripts and styles for the conadvance_coaching_Customizetrols.
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
		$manager->register_section_type('Advance_Coaching_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Coaching_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Coaching Pro Theme', 'advance-coaching'),
					'pro_text' => esc_html__('Go Pro', 'advance-coaching'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/coaching-wordpress-theme/'),
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

		wp_enqueue_script('advance-coaching-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-coaching-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Coaching_Customize::get_instance();