<?php
/**
 * Bayn Lite Customizer.
 *
 * @package Bayn Lite
 */

/**
 * Register theme options in the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bayn_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add theme options section.
	$wp_customize->add_section( 'bayn-lite', array(
		'title' => esc_html__( 'Theme Options', 'bayn-lite' ),
	) );

	// Intro section.
	$wp_customize->add_setting( 'front_page_intro_page', array(
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'front_page_intro_page', array(
		'label'           => esc_html__( 'Intro Page', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
		'description'     => wp_kses_post( __( 'The content of this page will be displayed below the slider on your static front page.', 'bayn-lite' ) ),
	) );

	// Change hero slider speed.
	$wp_customize->add_setting( 'slider_speed', array(
		'sanitize_callback' => 'absint',
		'default'           => 500,
	) );
	$wp_customize->add_control( 'slider_speed', array(
		'label'           => esc_html__( 'Top slider speed', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'number',
		'active_callback' => 'is_front_page',
		'description'     => esc_html__( 'Change the top slider speed. Use 0 to disable.', 'bayn-lite' ),
	) );

	// Services pages.
	$wp_customize->add_setting( 'front_page_service_page_1', array(
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'front_page_service_page_1', array(
		'label'           => esc_html__( 'Service Page 1', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->add_setting( 'front_page_service_page_2', array(
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'front_page_service_page_2', array(
		'label'           => esc_html__( 'Service Page 2', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->add_setting( 'front_page_service_page_3', array(
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'front_page_service_page_3', array(
		'label'           => esc_html__( 'Service Page 3', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
	) );
	$wp_customize->add_setting( 'front_page_service_page_4', array(
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'front_page_service_page_4', array(
		'label'           => esc_html__( 'Service Page 4', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
	) );

	// Portfolio section.
	$wp_customize->add_setting( 'front_page_portfolio_title', array(
		'default'           => esc_html__( 'Recent Work', 'bayn-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'front_page_portfolio_title', array(
		'label'           => esc_html__( 'Portfolio Section Title', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );
	$wp_customize->add_setting( 'front_page_portfolio_subtitle', array(
		'default'           => esc_html__( 'Design and Engineering', 'bayn-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'front_page_portfolio_subtitle', array(
		'label'           => esc_html__( 'Portfolio Section Subtitle', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Contact section.
	$wp_customize->add_setting( 'front_page_contact_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'front_page_contact_title', array(
		'label'           => esc_html__( 'Contact Section Title', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->add_setting( 'front_page_contact_info', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'front_page_contact_info', array(
		'label'           => '',
		'section'         => 'bayn-lite',
		'type'            => 'textarea',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->add_setting( 'front_page_contact_page', array(
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'front_page_contact_page', array(
		'label'           => esc_html__( 'Contact Page', 'bayn-lite' ),
		'section'         => 'bayn-lite',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
	) );

	$front_page_cta_text_default = '<h3>BECOME AN INSTRUCTION?</h3>
									Lorem Ipsum is simply dummy text of the printing and typesetting industry.';

	// Call to action text.
	$wp_customize->add_setting( 'cta_text', array(
		'default'           => $front_page_cta_text_default,
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'cta_text', array(
		'label'           => esc_html__( 'Call To Action Text', 'bayn-lite' ),
		'section'         => 'bayn',
		'type'            => 'textarea',
		'description'     => wp_kses_post( __( 'Use this section to display special offers for your products or services.', 'bayn-lite' ) ),
		'active_callback' => 'is_front_page',
	) );

	// Call to action links.
	$wp_customize->add_setting( 'cta_link_text', array(
		'default'           => esc_html__( 'Get Started Now', 'bayn-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'cta_link_text', array(
		'label'           => esc_html__( 'Call To Action Button Text', 'bayn-lite' ),
		'section'         => 'bayn',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->add_setting( 'cta_link_url', array(
		'default'           => esc_url( 'https://gretathemes.com/' ),
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'cta_link_url', array(
		'label'           => esc_html__( 'Call To Action Button URL', 'bayn-lite' ),
		'section'         => 'bayn',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$array_cta = array( 'cta_text', 'cta_link_text', 'cta_link_url' );

	for ( $i = 0; $i <= 2; $i++ ) {
		$wp_customize->selective_refresh->add_partial(
			$array_cta[ $i ],
			array(
				'selector'            => '.section--cta',
				'container_inclusive' => true,
				'render_callback'     => 'bayn_lite_refresh_cta_section',
			)
		);
	}
}

add_action( 'customize_register', 'bayn_lite_customize_register' );

/**
 * Checkbox sanitization callback.
 *
 * @param bool $input User selection.
 * @return bool Whether the checkbox is checked.
 */
function bayn_lite_sanitize_checkbox( $input ) {
	return ( true === $input && isset( $input ) ) ? true : false;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bayn_lite_customize_preview_js() {
	wp_enqueue_script( 'bayn_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20161017', true );
}

add_action( 'customize_preview_init', 'bayn_lite_customize_preview_js' );


/**
 * Live refresh features section.
 */
function bayn_lite_refresh_cta_section() {
	get_template_part( 'template-parts/home/cta' );
}

