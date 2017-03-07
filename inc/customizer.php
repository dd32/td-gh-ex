<?php
/**
 * BB Mobile Application Theme Customizer
 *
 * @package BB Mobile Application
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bb_mobile_application_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'bb_mobile_application_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'BB Settings', 'bb-mobile-application' ),
	    'description' => __( 'Description of what this panel does.', 'bb-mobile-application' ),
	) );



	//home page slider
	$wp_customize->add_section( 'bb_mobile_application_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'bb-mobile-application' ),
		'priority'   => 30,
		'panel' => 'bb_mobile_application_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'bb_mobile_application_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'bb_mobile_application_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'bb-mobile-application' ),
			'section'  => 'bb_mobile_application_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}

	$wp_customize->add_section('bb_mobile_application_footer-section',array(
	        'title' => __('Footer','bb-mobile-application'),
	        'description'   => __('Add News sections content here.','bb-mobile-application'),
	        'panel' => 'bb_mobile_application_panel_id',
	    ));

	    // add color picker setting
	    $wp_customize->add_setting('bb_mobile_application_section_color5', array(
	        'default' => '#18304c',
			'sanitize_callback'	=> 'sanitize_hex_color',
	    ));

	    // add color picker control
	    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_mobile_application_section_color5', array(
	        'label' => 'Background Color',
	        'section' => 'bb_mobile_application_footer-section',
	        'settings' => 'bb_mobile_application_section_color5',
	    ) ) );

	    $wp_customize->add_setting('bb_mobile_application_section_image5',array(
	            'default'   => get_template_directory_uri().'',
	            'sanitize_callback' => 'esc_url_raw',
	    ));
	        
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'bb_mobile_application_section_image4',
                array(
                    'label' => __('Background image (1440x700)','bb-mobile-application'),
                    'section' => 'bb_mobile_application_footer-section',
                    'settings' => 'bb_mobile_application_section_image5'
                )
            )
        );
	    $wp_customize->add_setting('bb_mobile_application_our_newsletter',array(
	        'default'   => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    
	    $wp_customize->add_control('bb_mobile_application_our_newsletter',array(
	        'label' => __('Section Title','bb-mobile-application'),
	        'section'   => 'bb_mobile_application_footer-section',
	        'type'      => 'text'
	    ));
	    
	    $wp_customize->add_setting('bb_mobile_application_our_newsletter_desc',array(
	        'default'   => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    
	    $wp_customize->add_control('bb_mobile_application_our_newsletter_desc',array(
	        'label' => __('Section Description','bb-mobile-application'),
	        'section'   => 'bb_mobile_application_footer-section',
	        'type'      => 'textarea'
	    ));
	    
	    $wp_customize->add_setting('bb_mobile_application_our_newsletter_shortcode',array(
	        'default'   => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    
	    $wp_customize->add_control('bb_mobile_application_our_newsletter_shortcode',array(
	        'label' => __('Section shortcode','bb-mobile-application'),
	        'section'   => 'bb_mobile_application_footer-section',
	        'type'      => 'text'
	    ));

	    $wp_customize->add_setting('bb_mobile_application_news-title',array(
	        'default'   => '',
	        'sanitize_callback' => 'bb-mobile-application_format_for_editor',
	    ));
	    
	    $wp_customize->add_control('bb_mobile_application_address',array(
	            'label' => __('News Title','bb-mobile-application'),
	            'section' => 'bb_mobile_application_footer-section',
	            'setting'   => 'bb_mobile_application_news-title',
	            'type'  => 'textarea'
	        )
	    );

	    $wp_customize->add_setting('bb_mobile_application_address-title',array(
	        'default'   => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    
	    $wp_customize->add_control('bb_mobile_application_address-title',array(
	            'label' => __('Address Title','bb-mobile-application'),
	            'section' => 'bb_mobile_application_footer-section',
	            'setting'   => 'bb_mobile_application_address-title',
	            'type'  => 'text'
	        )
	    );

	    $wp_customize->add_setting('bb_mobile_application_address',array(
	        'default'   => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    
	    $wp_customize->add_control('bb_mobile_application_address',array(
	            'label' => __('Our Address','bb-mobile-application'),
	            'section' => 'bb_mobile_application_footer-section',
	            'setting'   => 'bb_mobile_application_address',
	            'type'  => 'textarea'
	        )
	    );
	    
	    $wp_customize->add_setting('bb_mobile_application_contact-number',array(
	        'default'   => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    
	    $wp_customize->add_control('bb_mobile_application_contact-number',array(
	            'label' => __('Contact No ','bb-mobile-application'),
	            'section' => 'bb_mobile_application_footer-section',
	            'setting'   => 'bb_mobile_application_contact-number',
	            'type'  => 'text'
	        )
	    );
	    
	    $wp_customize->add_setting('bb_mobile_application_cont_email',array(
	        'default'   => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    
	    $wp_customize->add_control('bb_mobile_application_cont_email',array(
	            'label' => __('Email Address','bb-mobile-application'),
	            'section' => 'bb_mobile_application_footer-section',
	            'setting'   => 'bb_mobile_application_cont_email',
	            'type'  => 'text'
	        )
	    );
	    $wp_customize->add_setting('bb_mobile_application_website',array(
	        'default'   => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    
	    $wp_customize->add_control('bb_mobile_application_website',array(
	            'label' => __('Website Address','bb-mobile-application'),
	            'section' => 'bb_mobile_application_footer-section',
	            'setting'   => 'bb_mobile_application_website',
	            'type'  => 'text'
	        )
	    );

		$wp_customize->add_section('bb_mobile_application_footer_section',array(
			'title'	=> __('Footer Text','bb-mobile-application'),
			'description'	=> '',
			'priority'	=> null,
			'panel' => 'bb_mobile_application_panel_id',
		));
		
		$wp_customize->add_setting('bb_mobile_application_footer_copy',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		
		$wp_customize->add_control('bb_mobile_application_footer_copy',array(
			'label'	=> __('Copyright Text','bb-mobile-application'),
			'section'	=> 'bb_mobile_application_footer_section',
			'type'		=> 'textarea'
		));
	
}
add_action( 'customize_register', 'bb_mobile_application_customize_register' );	


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class bb_mobile_application_customize {

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
		require_once( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'bb_mobile_application_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new bb_mobile_application_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'Upgrade to Pro', 'bb-mobile-application' ),
					'pro_text' => esc_html__( 'Go Pro',         'bb-mobile-application' ),
					'pro_url'  => 'http://www.burhanuddinbohra.com/product/bb-mobile-application-theme/'
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

		wp_enqueue_script( 'bb-mobile-application-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bb-mobile-application-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
bb_mobile_application_customize::get_instance();