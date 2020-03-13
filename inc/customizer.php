<?php
/**
 * Theme Customizer
 *
 * @package Artblog
 */

/**
 * Customizer settings.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function artblog_customize_register( $wp_customize ) {
	// Load sanitize.
	require get_template_directory() . '/inc/sanitize.php';

	// Load controls.
	require get_template_directory() . '/inc/controls.php';

	// Register controls.
	$wp_customize->register_control_type( 'Artblog_Control_DropDown_Taxonomies' );

	$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'artblog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'artblog_customize_partial_blogdescription',
			)
		);
	}

	// Load theme options.
	require get_template_directory() . '/inc/options.php';
}

add_action( 'customize_register', 'artblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 */
function artblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 */
function artblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Register customizer controls scripts.
 *
 * @since 2.0.0
 */
function artblog_customize_scripts() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'artblog-controls', get_template_directory_uri() . '/js/controls' . $min . '.js', array( 'jquery', 'customize-controls' ), '2.0.0', true );
}

add_action( 'customize_controls_enqueue_scripts', 'artblog_customize_scripts', 0 );

/**
 * Rearrange controls.
 *
 * @since 2.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function artblog_rearrange_customizer( $wp_customize ) {
	// Rearrange background options.
	$wp_customize->get_section( 'background_image' )->panel    = 'theme_option_panel';
	$wp_customize->get_section( 'background_image' )->priority = 200;
	$wp_customize->get_section( 'background_image' )->title    = esc_html__( 'Background Options', 'artblog' );

	$wp_customize->get_control( 'background_color' )->section = 'background_image';
}

add_action( 'customize_register', 'artblog_rearrange_customizer', 20 );
