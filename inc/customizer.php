<?php
/**
 * Academic Theme Customizer.
 *
 * @package Academic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function academic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( ! function_exists( 'academic_is_slider_active' ) ) :
		/**
		 * Check if slider is active.
		 *
		 * @since 0.1
		 *
		 * @param WP_Customize_Control $control WP_Customize_Control instance.
		 *
		 * @return bool Whether the control is active to the current preview.
		 */
		function academic_is_slider_active( $control ) {
			if ( 'static-frontpage' == $control->manager->get_setting( 'slider_enable' )->value() )
				return true;

			return false;
		}
	endif;

	/**
	 * Sanitize select.
	 *
	 * @since 0.1
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function academic_sanitize_select( $input, $setting ) {
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	/**
	* Theme Options for sections
	*/
	// Add panel for different sections
	$wp_customize->add_panel( 'academic_sections_panel' , array(
	    'title'      => __('Sections','academic'),
	    'description'=> __( 'Academic available sections.', 'academic' ),
	    'priority'   => 150,
	) );

	// Add slider enable section
	$wp_customize->add_section( 'academic_slider_section', array(
		'title'             => __('Slider','academic'),
		'description'       => __( 'Slider section options.', 'academic' ),
		'panel'             => 'academic_sections_panel'
	) );

	// Add slider enable setting and control.
	$wp_customize->add_setting( 'slider_enable', array(
		'sanitize_callback' => 'academic_sanitize_select'
	) );

	$wp_customize->add_control( 'slider_enable', array(
		'label'             => __( 'Enable on', 'academic' ),
		'section'           => 'academic_slider_section',
		'type'              => 'select',
		'choices'           => array(
			'static-frontpage' => __( 'Static Frontpage', 'academic' ),
			'disabled'         => __( 'Disabled', 'academic' ),
		),
	) );

	for ($i=1; $i <= 3; $i++) {
		// Show page drop-down setting and control
		$wp_customize->add_setting( 'slider_content_page_'.$i, array(
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'slider_content_page_'.$i, array(
			'label'           => sprintf( __( 'Page Slider #%s', 'academic' ), $i ),
			'section'         => 'academic_slider_section',
			'active_callback'	=> 'academic_is_slider_active',
			'type'				=> 'dropdown-pages'
		) );
	}
}
add_action( 'customize_register', 'academic_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function academic_customize_preview_js() {
	wp_enqueue_script( 'academic_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'academic_customize_preview_js' );
