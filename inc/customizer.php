<?php
/**
 * Advance Pet Care Theme Customizer
 *
 * @package advance-pet-care
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_pet_care_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_pet_care_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-pet-care'),
		'description'    => __('Description of what this panel does.', 'advance-pet-care'),
	));	

	//Top Bar
	$wp_customize->add_section('advance_pet_care_topbar',array(
		'title'	=> __('Topbar Section','advance-pet-care'),
		'description'	=> __('Add topbar content','advance-pet-care'),
		'priority'	=> null,
		'panel' => 'advance_pet_care_panel_id',
	));

	$wp_customize->add_setting('advance_pet_care_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_mail1',array(
		'label'	=> __('Mail Address','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_phone1',array(
		'label'	=> __('Phone Number','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_time',array(
		'label'	=> __('Timing Text','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_time1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_time1',array(
		'label'	=> __('Open at','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_address',array(
		'label'	=> __('Address Text','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_address1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_address1',array(
		'label'	=> __('Address ','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	//social icons

	$wp_customize->add_section('advance_pet_care_social_icons',array(
		'title'	=> __('Social Icons','advance-pet-care'),
		'description'	=> __('Add social links','advance-pet-care'),
		'priority'	=> null,
		'panel' => 'advance_pet_care_panel_id',
	));

	$wp_customize->add_setting('advance_pet_care_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_pet_care_facebook_url',array(
		'label'	=> __('Add Facebook link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_pet_care_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_pet_care_twitter_url',array(
		'label'	=> __('Add Twitter link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_pet_care_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_pet_care_youtube_url',array(
		'label'	=> __('Add Youtube link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_pet_care_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_pet_care_google_plus_url',array(
		'label'	=> __('Add Google Plus link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_pet_care_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_pet_care_insta_url',array(
		'label'	=> __('Add Instagram link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_insta_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'advance_pet_care_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-pet-care' ),
		'priority'   => null,
		'panel' => 'advance_pet_care_panel_id'
	) );

	$wp_customize->add_setting('advance_pet_care_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_pet_care_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-pet-care'),
       'section' => 'advance_pet_care_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'advance_pet_care_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_pet_care_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_pet_care_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-pet-care' ),
			'description'	=> __('Size of image should be 1600 x 633','advance-pet-care'),
			'section'  => 'advance_pet_care_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	// Welcome Setting
	$wp_customize->add_section('advance_pet_care_welcome',array(
		'title'	=> __('Welcome Section','advance-pet-care'),
		'description'	=> __('Add Welcome sections below.','advance-pet-care'),
		'panel' => 'advance_pet_care_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('advance_pet_care_welcome_setting',array(
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices',
	));
	$wp_customize->add_control('advance_pet_care_welcome_setting',array(
	 'type'    => 'select',
	 'choices' => $pst,
	 'label' => __('Select post','advance-pet-care'),
	 'section' => 'advance_pet_care_welcome',
	));

	//footer
	$wp_customize->add_section('advance_pet_care_footer_section', array(
		'title'       => __('Footer Text', 'advance-pet-care'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-pet-care'),
		'priority'    => null,
		'panel'       => 'advance_pet_care_panel_id',
	));

	$wp_customize->add_setting('advance_pet_care_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-pet-care'),
		'section' => 'advance_pet_care_footer_section',
		'type'    => 'text',
	));

	//Layouts
	$wp_customize->add_section('advance_pet_care_left_right', array(
		'title'    => __('Sidebar Layout Settings', 'advance-pet-care'),
		'priority' => null,
		'panel'    => 'advance_pet_care_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_pet_care_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-pet-care'),
		'sanitize_callback' => 'advance_pet_care_sanitize_choices',
	));
	$wp_customize->add_control('advance_pet_care_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-pet-care'),
		'section'        => 'advance_pet_care_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-pet-care'),
			'Right Sidebar' => __('Right Sidebar', 'advance-pet-care'),
			'One Column'    => __('One Column', 'advance-pet-care'),
			'Grid Layout'   => __('Grid Layout', 'advance-pet-care')
		),
	));
}
add_action('customize_register', 'advance_pet_care_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Pet_Care_Customize {

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

		// Register scripts and styles for the conadvance_pet_care_Customizetrols.
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
		$manager->register_section_type('Advance_Pet_Care_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Pet_Care_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Pet Care Pro Theme', 'advance-pet-care'),
					'pro_text' => esc_html__('Go Pro', 'advance-pet-care'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/pet-wordpress-theme/'),
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

		wp_enqueue_script('advance-pet-care-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-pet-care-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Pet_Care_Customize::get_instance();