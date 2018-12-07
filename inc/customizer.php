<?php
/**
 * Advance Automobile Theme Customizer
 *
 * @package Advance Automobile
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_automobile_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_automobile_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-automobile'),
		'description'    => __('Description of what this panel does.', 'advance-automobile'),
	));	

	//Top Bar
	$wp_customize->add_section('advance_automobile_topbar',array(
		'title'	=> __('Topbar Section','advance-automobile'),
		'description'	=> __('Add topbar content','advance-automobile'),
		'priority'	=> null,
		'panel' => 'advance_automobile_panel_id',
	));

	$wp_customize->add_setting('advance_automobile_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_mail1',array(
		'label'	=> __('Mail Address','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_automobile_facebook_url',array(
		'label'	=> __('Add Facebook link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_automobile_twitter_url',array(
		'label'	=> __('Add Twitter link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_automobile_youtube_url',array(
		'label'	=> __('Add Youtube link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_automobile_google_plus_url',array(
		'label'	=> __('Add Google Plus link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_automobile_linkedin_url',array(
		'label'	=> __('Add Linkedin link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_book1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_automobile_book1',array(
		'label'	=> __('Button text','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_book',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_automobile_book',array(
		'label'	=> __('Add Link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_book',
		'type'	=> 'url'
	));
	
	//Slider
	$wp_customize->add_section( 'advance_automobile_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-automobile' ),
		'priority'   => null,
		'panel' => 'advance_automobile_panel_id'
	) );

	$wp_customize->add_setting('advance_automobile_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_automobile_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-automobile'),
       'section' => 'advance_automobile_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_automobile_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_automobile_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_automobile_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-automobile' ),
			'description'	=> __('Size of image should be 1600 x 633','advance-automobile'),
			'section'  => 'advance_automobile_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//contact details
	$wp_customize->add_section('advance_automobile_contact_details',array(
		'title'	=> __('Contact details','advance-automobile'),
		'description'	=> __('Add Contact Details here','advance-automobile'),
		'priority'	=> null,
		'panel' => 'advance_automobile_panel_id',
	));

	$wp_customize->add_setting('advance_automobile_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_address',array(
		'label'	=> __('Address Text','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_address1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_address1',array(
		'label'	=> __('Address ','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_time',array(
		'label'	=> __('Timing Text','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_time1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_time1',array(
		'label'	=> __('Open at','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('advance_automobile_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_call',array(
		'label'	=> __('Call Text','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_call1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_call1',array(
		'label'	=> __('Phone Number','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	//Our Services
  	$wp_customize->add_section('advance_automobile_category_section',array(
	    'title' => __('Our Services','advance-automobile'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'advance_automobile_panel_id',
	)); 

	$wp_customize->add_setting('advance_automobile_our_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_automobile_our_services_title',array(
		'label'	=> __('Section Title','advance-automobile'),
		'section'	=> 'advance_automobile_category_section',
		'setting'	=> 'advance_automobile_our_services_title',
		'type'		=> 'text'
	));

	// category 
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

    $wp_customize->add_setting('advance_automobile_category3',array(
	    'default' => 'select',
	    'sanitize_callback' => 'advance_automobile_sanitize_choices',
  	));
  	$wp_customize->add_control('advance_automobile_category3',array(
	    'type'    => 'select',
	    'choices' => $cat_post,
	    'label' => __('Select Category to display Latest Post','advance-automobile'),
	    'description'	=> __('Size of image should be 570 x 380','advance-automobile'),
	    'section' => 'advance_automobile_category_section',
	));

	//footer
	$wp_customize->add_section('advance_automobile_footer_section', array(
		'title'       => __('Footer Text', 'advance-automobile'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-automobile'),
		'priority'    => null,
		'panel'       => 'advance_automobile_panel_id',
	));

	$wp_customize->add_setting('advance_automobile_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-automobile'),
		'section' => 'advance_automobile_footer_section',
		'type'    => 'text',
	));

	//Layouts
	$wp_customize->add_section('advance_automobile_left_right', array(
		'title'    => __('Sidebar Layout Settings', 'advance-automobile'),
		'priority' => null,
		'panel'    => 'advance_automobile_panel_id',
	));

	$wp_customize->add_setting('advance_automobile_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-automobile'),
		'sanitize_callback' => 'advance_automobile_sanitize_choices',
	));
	$wp_customize->add_control('advance_automobile_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-automobile'),
		'section'        => 'advance_automobile_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-automobile'),
			'Right Sidebar' => __('Right Sidebar', 'advance-automobile'),
			'One Column'    => __('One Column', 'advance-automobile'),
			'Grid Layout'   => __('Grid Layout', 'advance-automobile')
		),
	));
}
add_action('customize_register', 'advance_automobile_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Automobile_Customize {

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

		// Register scripts and styles for the conadvance_automobile_Customizetrols.
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
		$manager->register_section_type('Advance_Automobile_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Automobile_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Automobile Pro Theme', 'advance-automobile'),
					'pro_text' => esc_html__('Go Pro', 'advance-automobile'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/automobile-wordpress-theme/'),
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

		wp_enqueue_script('advance-automobile-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-automobile-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Automobile_Customize::get_instance();