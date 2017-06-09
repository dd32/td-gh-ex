<?php
/**
 * Ecommerce Store Theme Customizer
 *
 * @package Ecommerce Store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bb_ecommerce_store_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'bb_ecommerce_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'bb-ecommerce-store' ),
	    'description' => __( 'Description of what this panel does.', 'bb-ecommerce-store' ),
	) );

	
	/*Contact Us*/
	$wp_customize->add_section('bb_ecommerce_store_contact_us',array(
		'title'	=> __('Contact Us','bb-ecommerce-store'),
		'description'	=> __('Add homepage sections content here.','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id'
	));
	
	$wp_customize->add_setting('bb_ecommerce_store_our_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_textarea_field'
	));
	
	$wp_customize->add_control('bb_ecommerce_store_our_address',array(
		'label'	=> __('Add Address here.','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_contact_us',
		'setting'	=> 'bb_ecommerce_store_our_address',
		'type'		=> 'textarea'
	));
	$wp_customize->add_setting('bb_ecommerce_store_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_ecommerce_store_contact',array(
		'label'	=> __('Add Number here.','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_contact_us',
		'setting'	=> 'bb_ecommerce_store_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_ecommerce_store_email',array(
		'label'	=> __('Add Email address here.','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_contact_us',
		'setting'	=> 'bb_ecommerce_store_email',
		'type'		=> 'text'
	));
	
	$wp_customize->add_section('bb_ecommerce_store_footer_section',array(
		'title'	=> __('Footer Text','bb-ecommerce-store'),
		'description'	=> __('Add some text for footer like copyright etc.','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id'
	));
	
	$wp_customize->add_setting('bb_ecommerce_store_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_ecommerce_store_footer_copy',array(
		'label'	=> __('Copyright Text','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'bb_ecommerce_store_customize_register' );	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bb_ecommerce_store_customize_preview_js() {
	wp_enqueue_script( 'bb_ecommerce_store_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bb_ecommerce_store_customize_preview_js' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class bb_ecommerce_store_customize {

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
		$manager->register_section_type( 'bb_ecommerce_store_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new bb_ecommerce_store_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'BB Ecommerce Store Pro', 'bb-ecommerce-store' ),
					'pro_text' => esc_html__( 'Go Pro',         'bb-ecommerce-store' ),
					'pro_url'  => 'http://www.themeshopy.com/premium/ecommerce-store-wordpress-theme/'
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

		wp_enqueue_script( 'bb-ecommerce-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bb-ecommerce-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
bb_ecommerce_store_customize::get_instance();