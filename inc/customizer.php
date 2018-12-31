<?php
/**
 * Altitude-lite Theme Customizer
 *
 * @package altitude-lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function altitude_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'altitude_lite_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'altitude_lite_customize_partial_blogdescription',
			)
		);
	}

	/*
	Add header section area for address, phone and email fields
	 */
	$wp_customize->add_section(
		'custom_header_section',
		array(
			'priority'       => 46,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html( __( 'Header Options', 'altitude-lite' ) ),
		)
	);

	$wp_customize->add_setting(
		'header_address',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'header_address',
		array(
			'label'    => __( 'Address', 'altitude-lite' ),
			'section'  => 'custom_header_section',
			'settings' => 'header_address',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'header_phone',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'header_phone',
		array(
			'label'    => __( 'Phone Number', 'altitude-lite' ),
			'section'  => 'custom_header_section',
			'settings' => 'header_phone',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'header_email',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'header_email',
		array(
			'label'    => __( 'Email Address', 'altitude-lite' ),
			'section'  => 'custom_header_section',
			'settings' => 'header_email',
			'type'     => 'text',
		)
	);
	/*
	**  Adding options in Default colors section
	*/

	// Accent color.
	$wp_customize->add_setting(
		'accent_color',
		array(
			'default'           => apply_filters( 'altitude_accent_color_default', '#8c2849' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'accent_color',
			array(
				'label'    => __( 'Accent Color', 'altitude-lite' ),
				'section'  => 'colors',
				'settings' => 'accent_color',
			)
		)
	);

	// Text color.
	$wp_customize->add_setting(
		'text_color',
		array(
			'default'           => apply_filters( 'altitude_text_color_default', '#555555' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'text_color',
			array(
				'label'    => __( 'Text Color', 'altitude-lite' ),
				'section'  => 'colors',
				'settings' => 'text_color',
			)
		)
	);

	// Highlight color.
	$wp_customize->add_setting(
		'highlight_color',
		array(
			'default'           => apply_filters( 'altitude_highlight_color_default', '#e4e4e4' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'highlight_color',
			array(
				'label'    => __( 'Highlight Color', 'altitude-lite' ),
				'section'  => 'colors',
				'settings' => 'highlight_color',
			)
		)
	);
}
add_action( 'customize_register', 'altitude_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function altitude_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function altitude_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function altitude_lite_customize_preview_js() {
	wp_enqueue_script( 'altitude-lite-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'altitude_lite_customize_preview_js' );
