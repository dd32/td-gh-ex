<?php
/**
 * Advance IT Company Theme Customizer
 *
 * @package advance-it-company
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_it_company_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_it_company_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-it-company'),
	));	

	//Top Bar
	$wp_customize->add_section('advance_it_company_topbar',array(
		'title'	=> __('Topbar Section','advance-it-company'),
		'description'	=> __('Add topbar content','advance-it-company'),
		'priority'	=> null,
		'panel' => 'advance_it_company_panel_id',
	));

	$wp_customize->add_setting('advance_it_company_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_mail',array(
		'label'	=> __('Add Email Text','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_it_company_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_mail1',array(
		'label'	=> __('Mail Address','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_it_company_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_phone',array(
		'label'	=> __('Add Phone Text','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_it_company_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_phone1',array(
		'label'	=> __('Phone Number','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_it_company_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_address',array(
		'label'	=> __('Add Address Text','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_it_company_address1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_address1',array(
		'label'	=> __('Add Address','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	// Social Icons
	$wp_customize->add_section('advance_it_company_social_icons',array(
		'title'	=> __('Social Icons','advance-it-company'),
		'description'	=> __('Add topbar content','advance-it-company'),
		'priority'	=> null,
		'panel' => 'advance_it_company_panel_id',
	));

	$wp_customize->add_setting('advance_it_company_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_facebook_url',array(
		'label'	=> __('Add Facebook link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_twitter_url',array(
		'label'	=> __('Add Twitter link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_linkedin_url',array(
		'label'	=> __('Add Linkedin link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_instagram_url',array(
		'label'	=> __('Add Instagram link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_instagram_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_google_plus_url',array(
		'label'	=> __('Add Google Plus link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_youtube_url',array(
		'label'	=> __('Add Google Plus link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_youtube_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'advance_it_company_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-it-company' ),
		'priority'   => null,
		'panel' => 'advance_it_company_panel_id'
	) );

	$wp_customize->add_setting('advance_it_company_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_it_company_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-it-company'),
       'section' => 'advance_it_company_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_it_company_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_it_company_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_it_company_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-it-company' ),
			'description'	=> __('Size of image should be 1500 x 600','advance-it-company'),
			'section'  => 'advance_it_company_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//How it works Section
	$wp_customize->add_section('advance_it_company_post_category',array(
		'title'	=> __('How it works Section','advance-it-company'),
		'panel' => 'advance_it_company_panel_id',
	));

	$wp_customize->add_setting('advance_it_company_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_it_company_title',array(
	    'label' => __('Section Title','advance-it-company'),
	    'section' => 'advance_it_company_post_category',
	    'type'  => 'text'
   	));

   	$arg =  array( 'numberposts' => 0 );
   	$post_list = get_posts( $arg );
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('advance_it_company_setting',array(
	  'sanitize_callback' => 'advance_it_company_sanitize_choices',
	));
	$wp_customize->add_control('advance_it_company_setting',array(
	 'type'    => 'select',
	 'choices' => $pst,
	 'label' => __('Select post','advance-it-company'),
	 'section' => 'advance_it_company_post_category',
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

	$wp_customize->add_setting('advance_it_company_works_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_it_company_sanitize_choices',
	));	
	$wp_customize->add_control('advance_it_company_works_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-it-company'),
		'description'	=> __('Size of image should be 370 x 240','advance-it-company'),
		'section' => 'advance_it_company_post_category',
	));

	//Footer
	$wp_customize->add_section('advance_it_company_footer_section', array(
		'title'       => __('Footer Text', 'advance-it-company'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-it-company'),
		'priority'    => null,
		'panel'       => 'advance_it_company_panel_id',
	));

	$wp_customize->add_setting('advance_it_company_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-it-company'),
		'section' => 'advance_it_company_footer_section',
		'type'    => 'text',
	));

	//Layouts
	$wp_customize->add_section('advance_it_company_left_right', array(
		'title'    => __('Sidebar Layout Settings', 'advance-it-company'),
		'priority' => null,
		'panel'    => 'advance_it_company_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_it_company_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-it-company'),
		'sanitize_callback' => 'advance_it_company_sanitize_choices',
	));
	$wp_customize->add_control('advance_it_company_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-it-company'),
		'section'        => 'advance_it_company_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-it-company'),
			'Right Sidebar' => __('Right Sidebar', 'advance-it-company'),
			'One Column'    => __('One Column', 'advance-it-company'),
			'Grid Layout'   => __('Grid Layout', 'advance-it-company')
		),
	));
}
add_action('customize_register', 'advance_it_company_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_It_Company_Customize {

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

		// Register scripts and styles for the conadvance_it_company_Customizetrols.
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
		$manager->register_section_type('Advance_It_Company_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_It_Company_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('IT Company Pro Theme', 'advance-it-company'),
					'pro_text' => esc_html__('Go Pro', 'advance-it-company'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/it-company-wordpress-theme/'),
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

		wp_enqueue_script('advance-it-company-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-it-company-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_It_Company_Customize::get_instance();