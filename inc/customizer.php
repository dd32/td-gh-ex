<?php
/**
 * Aagaz Startup: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aagaz_startup_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'aagaz_startup_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'aagaz-startup' ),
	    'description' => __( 'Description of what this panel does.', 'aagaz-startup' ),
	) );

	$wp_customize->add_section( 'aagaz_startup_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'aagaz-startup' ),
		'priority'   => 30,
		'panel' => 'aagaz_startup_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('aagaz_startup_layout_settings',array(
        'default' => __('Right Sidebar','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'	        
	));

	$wp_customize->add_control('aagaz_startup_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Layouts', 'aagaz-startup'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'aagaz-startup'),
        'section' => 'aagaz_startup_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','aagaz-startup'),
            'Right Sidebar' => __('Right Sidebar','aagaz-startup'),
            'One Column' => __('Full Width','aagaz-startup'),
            'Grid Layout' => __('Grid Layout','aagaz-startup')
        ),
	));

	//Topbar section
	$wp_customize->add_section('aagaz_startup_contact_details',array(
		'title'	=> __('Topbar Section','aagaz-startup'),
		'description'	=> __('Add Header Content here','aagaz-startup'),
		'priority'	=> null,
		'panel' => 'aagaz_startup_panel_id',
	));

	$wp_customize->add_setting('aagaz_startup_contact_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_contact_number',array(
		'label'	=> __('Add Phone Number','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_contact_number',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('aagaz_startup_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('aagaz_startup_email_address',array(
		'label'	=> __('Add Email','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_email_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('aagaz_startup_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_facebook_url',array(
		'label'	=> __('Add Facebook link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_twitter_url',array(
		'label'	=> __('Add Twitter link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('aagaz_startup_linkedin_url',array(
		'label'	=> __('Add Linkedin link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_pinterest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_pinterest_url',array(
		'label'	=> __('Add Pinterest link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_pinterest_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_insta_url',array(
		'label'	=> __('Add Instagram link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_youtube_url',array(
		'label'	=> __('Add Youtube link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_youtube_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'aagaz_startup_slider' , array(
    	'title'      => __( 'Slider Settings', 'aagaz-startup' ),
		'priority'   => null,
		'panel' => 'aagaz_startup_panel_id'
	) );

	$wp_customize->add_setting('aagaz_startup_slider_arrows',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','aagaz-startup'),
      	'section' => 'aagaz_startup_slider',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'aagaz_startup_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'aagaz_startup_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'aagaz_startup_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'aagaz-startup' ),
			'section'  => 'aagaz_startup_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//About
	$wp_customize->add_section('aagaz_startup_about',array(
		'title'	=> __('About Us','aagaz-startup'),
		'description'	=> __('Add About Us Section below.','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));

	$wp_customize->add_setting('aagaz_startup_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('aagaz_startup_title',array(
		'label'	=> __('Section Title','aagaz-startup'),
		'section'=> 'aagaz_startup_about',
		'setting'=> 'aagaz_startup_title',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'aagaz_startup_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'aagaz_startup_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'aagaz_startup_about_page', array(
		'label'    => __( 'Select About Page', 'aagaz-startup' ),
		'section'  => 'aagaz_startup_about',
		'type'     => 'dropdown-pages'
	) );

	//Footer
	$wp_customize->add_section( 'aagaz_startup_footer' , array(
    	'title'      => __( 'Footer Text', 'aagaz-startup' ),
		'priority'   => null,
		'panel' => 'aagaz_startup_panel_id'
	) );

	$wp_customize->add_setting('aagaz_startup_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('aagaz_startup_footer_text',array(
		'label'	=> __('Add Copyright Text','aagaz-startup'),
		'section'	=> 'aagaz_startup_footer',
		'setting'	=> 'aagaz_startup_footer_text',
		'type'		=> 'text'
	));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'aagaz_startup_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'aagaz_startup_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'aagaz_startup_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Aagaz Startup 1.0
 * @see aagaz-startup_customize_register()
 *
 * @return void
 */
function aagaz_startup_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Aagaz Startup 1.0
 * @see aagaz-startup_customize_register()
 *
 * @return void
 */
function aagaz_startup_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function aagaz_startup_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Aagaz_Startup_Customize {

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
		$manager->register_section_type( 'Aagaz_Startup_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Aagaz_Startup_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Aagaz Startup Pro', 'aagaz-startup' ),
					'pro_text' => esc_html__( 'Go Pro', 'aagaz-startup' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/startup-wordpress-theme/'),
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

		wp_enqueue_script( 'aagaz-startup-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'aagaz-startup-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Aagaz_Startup_Customize::get_instance();