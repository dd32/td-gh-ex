<?php
/**
 * Automobile Hub: Customizer
 *
 * @package Automobile Hub
 * @subpackage automobile_hub
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function automobile_hub_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'automobile_hub_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'automobile-hub' ),
	    'description' => __( 'Description of what this panel does.', 'automobile-hub' ),
	) );

	//TP Color Option
	$wp_customize->add_section('automobile_hub_color_option',array(
        'title'         => __('TP Color Settings', 'automobile-hub'),
        'panel' => 'automobile_hub_panel_id'
    ) );

	$wp_customize->add_setting( 'automobile_hub_tp_color_option', array(
	    'default' => '#e43315',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_hub_tp_color_option', array(
	    'description' => __('It will change the complete theme color in one click.', 'automobile-hub'),
	    'section' => 'automobile_hub_color_option',
	    'settings' => 'automobile_hub_tp_color_option',
  	)));
  	$wp_customize->add_setting( 'automobile_hub_tp_color_option_link', array(
	    'default' => '#b91b00',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_hub_tp_color_option_link', array(
	    'description' => __('It will change the complete theme hover link color in one click.', 'automobile-hub'),
	    'section' => 'automobile_hub_color_option',
	    'settings' => 'automobile_hub_tp_color_option_link',
  	)));

	//Sidebar Position
	$wp_customize->add_section('automobile_hub_sidebar_position',array(
        'title'         => __('Sidebar Position', 'automobile-hub'),
        'panel' => 'automobile_hub_panel_id'
    ) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('automobile_hub_sidebar_post_layout',array(
        'default' => __('right','automobile-hub'),        
        'sanitize_callback' => 'automobile_hub_sanitize_choices'	        
	));
	$wp_customize->add_control('automobile_hub_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'automobile-hub'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'automobile-hub'),
        'section' => 'automobile_hub_sidebar_position',
        'choices' => array(
            'full' => __('Full','automobile-hub'),
            'left' => __('Left','automobile-hub'), 
            'right' => __('Right','automobile-hub'),
            'three-column' => __('Three Columns','automobile-hub'),
            'four-column' => __('Four Columns','automobile-hub'),
            'grid' => __('Grid Layout','automobile-hub')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('automobile_hub_sidebar_page_layout',array(
        'default' => __('right','automobile-hub'),        
        'sanitize_callback' => 'automobile_hub_sanitize_choices'	        
	));
	$wp_customize->add_control('automobile_hub_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'automobile-hub'),
        'description'   => __('This option work for pages.', 'automobile-hub'),
        'section' => 'automobile_hub_sidebar_position',
        'choices' => array(
            'full' => __('Full','automobile-hub'),
            'left' => __('Left','automobile-hub'), 
            'right' => __('Right','automobile-hub')
        ),
	) );

	$wp_customize->add_section( 'automobile_hub_topbar', array(
    	'title'      => __( 'Contact Details', 'automobile-hub' ),
    	'description' => __( 'Add your contact details', 'automobile-hub' ),
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->add_setting('automobile_hub_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_hub_mail_text',array(
		'label'	=> __('Add Email Text','automobile-hub'),
		'section'=> 'automobile_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automobile_hub_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_hub_mail',array(
		'label'	=> __('Add Mail Address','automobile-hub'),
		'section'=> 'automobile_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automobile_hub_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_hub_call_text',array(
		'label'	=> __('Add Call Text','automobile-hub'),
		'section'=> 'automobile_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automobile_hub_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_hub_call',array(
		'label'	=> __('Add Phone Number','automobile-hub'),
		'section'=> 'automobile_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_section( 'automobile_hub_social_media', array(
    	'title'      => __( 'Social Media Links', 'automobile-hub' ),
    	'description' => __( 'Add your Social Links', 'automobile-hub' ),
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->add_setting('automobile_hub_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('automobile_hub_facebook_url',array(
		'label'	=> __('Facebook Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('automobile_hub_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('automobile_hub_twitter_url',array(
		'label'	=> __('Twitter Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('automobile_hub_google_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('automobile_hub_google_url',array(
		'label'	=> __('Google Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('automobile_hub_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('automobile_hub_youtube_url',array(
		'label'	=> __('YouTube Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('automobile_hub_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('automobile_hub_pint_url',array(
		'label'	=> __('Pinterest Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));	

	//home page slider
	$wp_customize->add_section( 'automobile_hub_slider_section' , array(
    	'title'      => __( 'Slider Section', 'automobile-hub' ),
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->add_setting('automobile_hub_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('automobile_hub_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','automobile-hub'),
       'section' => 'automobile_hub_slider_section',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'automobile_hub_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'automobile_hub_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'automobile_hub_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'automobile-hub' ),
			'section'  => 'automobile_hub_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//About Section
	$wp_customize->add_section('automobile_hub_about_section',array(
		'title'	=> __('About Section','automobile-hub'),
		'panel' => 'automobile_hub_panel_id',
	));	

	$wp_customize->add_setting('automobile_hub_about_tittle',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_hub_about_tittle',array(
		'label'	=> __('About Title','automobile-hub'),
		'section'	=> 'automobile_hub_about_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'automobile_hub_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'automobile_hub_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'automobile_hub_about_page', array(
		'label'    => __( 'Select About Page', 'automobile-hub' ),
		'section'  => 'automobile_hub_about_section',
		'type'     => 'dropdown-pages'
	) );
	
	//footer
	$wp_customize->add_section('automobile_hub_footer_section',array(
		'title'	=> __('Footer Text','automobile-hub'),
		'description'	=> __('Add copyright text.','automobile-hub'),
		'panel' => 'automobile_hub_panel_id'
	));
	
	$wp_customize->add_setting('automobile_hub_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_hub_footer_text',array(
		'label'	=> __('Copyright Text','automobile-hub'),
		'section'	=> 'automobile_hub_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'automobile_hub_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'automobile_hub_customize_partial_blogdescription',
	) );

}
add_action( 'customize_register', 'automobile_hub_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Automobile Hub 1.0
 * @see automobile_hub_customize_register()
 *
 * @return void
 */
function automobile_hub_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Automobile Hub 1.0
 * @see automobile_hub_customize_register()
 *
 * @return void
 */
function automobile_hub_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Automobile_Hub_Customize {

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
		$manager->register_section_type( 'Automobile_Hub_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Automobile_Hub_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Automobile Pro Theme', 'automobile-hub' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'automobile-hub' ),
					'pro_url'  => esc_url('https://www.themespride.com/themes/automobile-wordpress-theme/'),
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

		wp_enqueue_script( 'automobile-hub-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'automobile-hub-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Automobile_Hub_Customize::get_instance();