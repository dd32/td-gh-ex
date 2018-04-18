<?php
/**
 * Academic Education Theme Customizer
 *
 * @package Academic Education
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function academic_education_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'academic_education_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'academic-education' ),
	    'description' => __( 'Description of what this panel does.', 'academic-education' ),
	) );

	$wp_customize->add_section( 'academic_education_left_right' , array(
    	'title'      => __( 'General Settings', 'academic-education' ),
		'priority'   => 30,
		'panel' => 'academic_education_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('academic_education_theme_options',array(
        'default' => __( 'Right Sidebar', 'academic-education' ),
        'sanitize_callback' => 'academic_education_sanitize_choices'	        
	));

	$wp_customize->add_control('academic_education_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'academic-education' ),
	        'section' => 'academic_education_left_right',
	        'choices' => array(
	            'One Column' => __('One Column ','academic-education'),
	            'Three Columns' => __('Three Columns','academic-education'),
	            'Four Columns' => __('Four Columns','academic-education'),
	            'Right Sidebar' => __('Right Sidebar','academic-education'),
	            'Left Sidebar' => __('Left Sidebar','academic-education'),
	            'Grid Layout' => __('Grid Layout','academic-education')
	        ),
	));

	//Topbar section
	$wp_customize->add_section('academic_education_topbar',array(
		'title'	=> __('Topbar','academic-education'),
		'description'	=> __('Add Topbar Content here','academic-education'),
		'priority'	=> null,
		'panel' => 'academic_education_panel_id',
	));

	$wp_customize->add_setting('academic_education_timming',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_timming',array(
		'label'	=> __('Add Timmings','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_timming',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('academic_education_call_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_call_text',array(
		'label'	=> __('Add Call Text','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_call_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('academic_education_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_call',array(
		'label'	=> __('Add Phone Number','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_call',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('academic_education_mail_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_mail_text',array(
		'label'	=> __('Add Email Text','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_mail_text',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('academic_education_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_mail',array(
		'label'	=> __('Add Email','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_mail',
		'type'		=> 'text'
	));	

	//Social Icons(topbar)
	$wp_customize->add_section('academic_education_social_media',array(
		'title'	=> __('Social Media','academic-education'),
		'description'	=> __('Add Social Media Url here','academic-education'),
		'priority'	=> null,
		'panel' => 'academic_education_panel_id',
	));

	$wp_customize->add_setting('academic_education_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_facebook_url',array(
		'label'	=> __('Add Facebook link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('academic_education_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_twitter_url',array(
		'label'	=> __('Add Twitter link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('academic_education_google_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_google_url',array(
		'label'	=> __('Add Google link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_google_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('academic_education_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_youtube_url',array(
		'label'	=> __('Add Youtube link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('academic_education_pint_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_pint_url',array(
		'label'	=> __('Add Pinterest link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_pint_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'academic_education_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'academic-education' ),
		'priority'   => 30,
		'panel' => 'academic_education_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'academic_education_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'academic_education_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'academic-education' ),
			'section'  => 'academic_education_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Courses
	$wp_customize->add_section('academic_education_about',array(
		'title'	=> __('Courses Section','academic-education'),
		'description'=> __('This section will appear below the slider.','academic-education'),
		'panel' => 'academic_education_panel_id',
	));	

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('academic_education_single_post',array(
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('academic_education_single_post',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','academic-education'),
		'section' => 'academic_education_about',
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

	$wp_customize->add_setting('academic_education_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('academic_education_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category','academic-education'),
		'section' => 'academic_education_about',
	));
		
	//footer
	$wp_customize->add_section('academic_education_footer_section',array(
		'title'	=> __('Footer Text','academic-education'),
		'description'	=> __('Add some text for footer like copyright etc.','academic-education'),
		'panel' => 'academic_education_panel_id'
	));
	
	$wp_customize->add_setting('academic_education_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_footer_copy',array(
		'label'	=> __('Copyright Text','academic-education'),
		'section'	=> 'academic_education_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'academic_education_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class academic_education_customize {

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
		$manager->register_section_type( 'academic_education_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new academic_education_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Academic Education Pro', 'academic-education' ),
					'pro_text' => esc_html__( 'Update Pro',         'academic-education' ),
					'pro_url'  => 'https://www.logicalthemes.com/themes/premium-academic-education-wordpress-theme'
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

		wp_enqueue_script( 'academic-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'academic-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
academic_education_customize::get_instance();