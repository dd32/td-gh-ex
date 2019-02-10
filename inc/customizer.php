<?php
/**
 * Advance Startup Theme Customizer
 *
 * @package advance-startup
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_startup_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_startup_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-startup'),
	));	

	//Top Bar
	$wp_customize->add_section('advance_startup_topbar',array(
		'title'	=> __('Topbar Section','advance-startup'),
		'description'	=> __('Add topbar content','advance-startup'),
		'priority'	=> null,
		'panel' => 'advance_startup_panel_id',
	));

	$wp_customize->add_setting('advance_startup_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_startup_mail1',array(
		'label'	=> __('Mail Address','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_startup_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_startup_phone1',array(
		'label'	=> __('Phone Number','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_startup_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_startup_time',array(
		'label'	=> __('Timing Text','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_startup_top_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_startup_top_button_text',array(
		'label'	=> __('Button text','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_startup_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_startup_top_button_url',array(
		'label'	=> __('Add Link','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'setting'	=> 'advance_startup_top_button_url',
		'type'	=> 'url'
	));

	// Social Icons
	$wp_customize->add_section('advance_startup_social_icons',array(
		'title'	=> __('Social Icons','advance-startup'),
		'description'	=> __('Add topbar content','advance-startup'),
		'priority'	=> null,
		'panel' => 'advance_startup_panel_id',
	));

	$wp_customize->add_setting('advance_startup_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_startup_facebook_url',array(
		'label'	=> __('Add Facebook link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_startup_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_startup_twitter_url',array(
		'label'	=> __('Add Twitter link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_startup_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_startup_youtube_url',array(
		'label'	=> __('Add Youtube link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_startup_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_startup_google_plus_url',array(
		'label'	=> __('Add Google Plus link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_startup_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_startup_linkedin_url',array(
		'label'	=> __('Add Linkedin link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_linkedin_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'advance_startup_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-startup' ),
		'priority'   => null,
		'panel' => 'advance_startup_panel_id'
	) );

	$wp_customize->add_setting('advance_startup_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_startup_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-startup'),
       'section' => 'advance_startup_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_startup_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_startup_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_startup_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-startup' ),
			'description'	=> __('Size of image should be 1500 x 600','advance-startup'),
			'section'  => 'advance_startup_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//We Provide
	$wp_customize->add_section('advance_startup_category',array(
		'title'	=> __('What We Provide Section','advance-startup'),
		'description'	=> __('Add  section below.','advance-startup'),
		'panel' => 'advance_startup_panel_id',
	));

	$wp_customize->add_setting('advance_startup_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_startup_title',array(
	    'label' => __('Section Title','advance-startup'),
	    'section' => 'advance_startup_category',
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

	$wp_customize->add_setting('advance_startup_we_provide_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_startup_sanitize_choices',
	));	
	$wp_customize->add_control('advance_startup_we_provide_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-startup'),
		'description'	=> __('Size of image should be 370 x 240','advance-startup'),
		'section' => 'advance_startup_category',
	));

	//Footer
	$wp_customize->add_section('advance_startup_footer_section', array(
		'title'       => __('Footer Text', 'advance-startup'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-startup'),
		'priority'    => null,
		'panel'       => 'advance_startup_panel_id',
	));

	$wp_customize->add_setting('advance_startup_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_startup_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-startup'),
		'section' => 'advance_startup_footer_section',
		'type'    => 'text',
	));

	//Layouts
	$wp_customize->add_section('advance_startup_left_right', array(
		'title'    => __('Sidebar Layout Settings', 'advance-startup'),
		'priority' => null,
		'panel'    => 'advance_startup_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_startup_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-startup'),
		'sanitize_callback' => 'advance_startup_sanitize_choices',
	));
	$wp_customize->add_control('advance_startup_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-startup'),
		'section'        => 'advance_startup_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-startup'),
			'Right Sidebar' => __('Right Sidebar', 'advance-startup'),
			'One Column'    => __('One Column', 'advance-startup'),
			'Grid Layout'   => __('Grid Layout', 'advance-startup')
		),
	));
}
add_action('customize_register', 'advance_startup_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Startup_Customize {

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

		// Register scripts and styles for the conadvance_startup_Customizetrols.
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
		$manager->register_section_type('Advance_Startup_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Startup_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Startup Pro Theme', 'advance-startup'),
					'pro_text' => esc_html__('Go Pro', 'advance-startup'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/startup-wordpress-theme/'),
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

		wp_enqueue_script('advance-startup-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-startup-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Startup_Customize::get_instance();