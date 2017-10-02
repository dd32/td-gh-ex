<?php
/**
 * bb wedding bliss Theme Customizer
 *
 * @package bb wedding bliss
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bb_wedding_bliss_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'bb_wedding_bliss_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'BB Settings', 'bb-wedding-bliss' ),
	    'description' => __( 'Description of what this panel does.', 'bb-wedding-bliss' ),
	) );

	//Layouts
	$wp_customize->add_section( 'bb_wedding_bliss_left_right', array(
    	'title'      => __( 'Layout Settings', 'bb-wedding-bliss' ),
		'priority'   => 30,
		'panel' => 'bb_wedding_bliss_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('bb_wedding_bliss_layout_options',array(
	        'default' => '',
	        'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('bb_wedding_bliss_layout_options',
	    array(
	        'type' => 'radio',
	        'label' => 'Change Layouts',
	        'section' => 'bb_wedding_bliss_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','bb-wedding-bliss'),
	            'Right Sidebar' => __('Right Sidebar','bb-wedding-bliss'),
	            'One Column' => __('One Column','bb-wedding-bliss'),
	            'Three Columns' => __('Three Columns','bb-wedding-bliss'),
	            'Four Columns' => __('Four Columns','bb-wedding-bliss'),
	            'Grid Layout' => __('Grid Layout','bb-wedding-bliss')
	        ),
	    )
    );
	
	//Topbar section
	$wp_customize->add_section('bb_wedding_bliss_topbar_icon',array(
		'title'	=> __('Topbar Section','bb-wedding-bliss'),
		'description'	=> __('Add Header Content here','bb-wedding-bliss'),
		'priority'	=> null,
		'panel' => 'bb_wedding_bliss_panel_id',
	));

	$wp_customize->add_setting('bb_wedding_bliss_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_contact',array(
		'label'	=> __('Add Phone Number','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_icon',
		'setting'	=> 'bb_wedding_bliss_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_email',array(
		'label'	=> __('Add Email','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_icon',
		'setting'	=> 'bb_wedding_bliss_email',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('bb_wedding_bliss_topbar_header',array(
		'title'	=> __('Social Icon Section','bb-wedding-bliss'),
		'description'	=> __('Add Header Content here','bb-wedding-bliss'),
		'priority'	=> null,
		'panel' => 'bb_wedding_bliss_panel_id',
	));

	$wp_customize->add_setting('bb_wedding_bliss_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_youtube_url',array(
		'label'	=> __('Add Youtube link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_youtube_url',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_facebook_url',array(
		'label'	=> __('Add Facebook link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_facebook_url',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_twitter_url',array(
		'label'	=> __('Add Twitter link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_twitter_url',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_rss_url',array(
		'label'	=> __('Add RSS link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_rss_url',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_insta_url',array(
		'label'	=> __('Add Instagram link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_insta_url',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_google_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_google_url',array(
		'label'	=> __('Add Google link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_google_url',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_pint_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_pint_url',array(
		'label'	=> __('Add Pintrest link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_pint_url',
		'type'	=> 'text'
	));	

	//home page slider
	$wp_customize->add_section( 'bb_wedding_bliss_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'bb-wedding-bliss' ),
		'priority'   => 30,
		'panel' => 'bb_wedding_bliss_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'bb_wedding_bliss_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'bb_wedding_bliss_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'bb-wedding-bliss' ),
			'section'  => 'bb_wedding_bliss_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}

	//Bride and Groom
	  $wp_customize->add_section('bb_wedding_bliss_groom_section',array(
	    'title' => __('Bride & Groom Section','bb-wedding-bliss'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'bb_wedding_bliss_panel_id',
	  ));
	  
	  $wp_customize->add_setting('bb_wedding_bliss_main_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
	  ));

	  $wp_customize->add_control('bb_wedding_bliss_main_title',array(
	    'label' => __('Title','bb-wedding-bliss'),
	    'section' => 'bb_wedding_bliss_groom_section',
	    'type'  => 'text'
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

	  $wp_customize->add_setting('bb_wedding_bliss_bride_setting',array(
	    'default' => 'select',
	    'sanitize_callback' => 'sanitize_text_field',
	  ));

	  $wp_customize->add_control('bb_wedding_bliss_bride_setting',array(
	    'type'    => 'select',
	    'choices' => $cats,
	    'label' => __('Select Category to display Latest Post','bb-wedding-bliss'),
	    'section' => 'bb_wedding_bliss_groom_section',
	  ));

	//footer
	$wp_customize->add_section('bb_wedding_bliss_footer_section',array(
		'title'	=> __('Footer Text','bb-wedding-bliss'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'bb_wedding_bliss_panel_id',
	));
	
	$wp_customize->add_setting('bb_wedding_bliss_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('bb_wedding_bliss_footer_copy',array(
		'label'	=> __('Copyright Text','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_footer_section',
		'type'		=> 'textarea'
	));
		
}
add_action( 'customize_register', 'bb_wedding_bliss_customize_register' );	


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class bb_wedding_bliss_customize {

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
		$manager->register_section_type( 'bb_wedding_bliss_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new bb_wedding_bliss_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'Upgrade to Pro', 'bb-wedding-bliss' ),
					'pro_text' => esc_html__( 'Go Pro',         'bb-wedding-bliss' ),
					'pro_url'  => 'http://www.themeshopy.com/premium/bb-wedding-bliss-wordpress-theme/'
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

		wp_enqueue_script( 'bb-wedding-bliss-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bb-wedding-bliss-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
bb_wedding_bliss_customize::get_instance();