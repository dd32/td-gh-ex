<?php
/**
 * Advance Ecommerce Store Theme Customizer
 *
 * @package advance-ecommerce-store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_ecommerce_store_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_ecommerce_store_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-ecommerce-store'),
		'description'    => __('Description of what this panel does.', 'advance-ecommerce-store'),
	));

	//Layouts
	$wp_customize->add_section('advance_ecommerce_store_left_right', array(
		'title'    => __('Layout Settings', 'advance-ecommerce-store'),
		'priority' => 30,
		'panel'    => 'advance_ecommerce_store_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_ecommerce_store_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-ecommerce-store'),
		'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('advance_ecommerce_store_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-ecommerce-store'),
		'section'        => 'advance_ecommerce_store_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-ecommerce-store'),
			'Right Sidebar' => __('Right Sidebar', 'advance-ecommerce-store'),
			'One Column'    => __('One Column', 'advance-ecommerce-store'),
			'Three Columns' => __('Three Columns', 'advance-ecommerce-store'),
			'Four Columns'  => __('Four Columns', 'advance-ecommerce-store'),
			'Grid Layout'   => __('Grid Layout', 'advance-ecommerce-store')
		),
	));
	
	//Slider
	$wp_customize->add_section( 'advance_ecommerce_store_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-ecommerce-store' ),
		'priority'   => null,
		'panel' => 'advance_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('advance_ecommerce_store_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_ecommerce_store_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-ecommerce-store'),
       'section' => 'advance_ecommerce_store_slider',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'advance_ecommerce_store_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_ecommerce_store_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_ecommerce_store_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-ecommerce-store' ),
			'section'  => 'advance_ecommerce_store_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Products Service
	$wp_customize->add_section( 'advance_ecommerce_store_services_section' , array(
    	'title'      => __( 'Product Services', 'advance-ecommerce-store' ),
		'priority'   => null,
		'panel' => 'advance_ecommerce_store_panel_id'
	) );

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

	$wp_customize->add_setting('advance_ecommerce_store_product_service',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('advance_ecommerce_store_product_service',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Services','advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_services_section',
	));

	//New Arrivals
	$wp_customize->add_section( 'advance_ecommerce_store_products' , array(
    	'title'      => __( 'New Arrivals', 'advance-ecommerce-store' ),
		'priority'   => null,
		'panel' => 'advance_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('advance_ecommerce_store_section_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_ecommerce_store_section_title', array(
		'label'   => __('Section Title', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_products',
		'type'    => 'text',
	));

	$wp_customize->add_setting( 'advance_ecommerce_store_product_page', array(
		'default'           => '',
		'sanitize_callback' => 'advance_ecommerce_store_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'advance_ecommerce_store_product_page', array(
		'label'    => __( 'Select Page', 'advance-ecommerce-store' ),
		'section'  => 'advance_ecommerce_store_products',
		'type'     => 'dropdown-pages'
	));

	//footer
	$wp_customize->add_section('advance_ecommerce_store_footer_section', array(
		'title'       => __('Footer Text', 'advance-ecommerce-store'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-ecommerce-store'),
		'priority'    => null,
		'panel'       => 'advance_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('advance_ecommerce_store_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_ecommerce_store_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_footer_section',
		'type'    => 'text',
	));
}
add_action('customize_register', 'advance_ecommerce_store_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Ecommerce_Store_Customize {

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

		// Register scripts and styles for the controls.
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
		$manager->register_section_type('Advance_Ecommerce_Store_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Ecommerce_Store_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Ecommerce Pro Theme', 'advance-ecommerce-store'),
					'pro_text' => esc_html__('Go Pro', 'advance-ecommerce-store'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/wordpress-ecommerce-theme/'),
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

		wp_enqueue_script('advance-ecommerce-store-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));

		wp_enqueue_style('advance-ecommerce-store-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Ecommerce_Store_Customize::get_instance();