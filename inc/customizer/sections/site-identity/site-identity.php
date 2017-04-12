<?php
/**
 * Favicon Options for Astra Theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Site Identity
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[site-identity]', array(
		'default'           => $defaults['site-identity'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[site-identity]', array(
		'type'        => 'select',
		'section'     => 'section-site-identity',
		'priority'    => 1,
		'label'       => __( 'Site Identity', 'astra-theme' ),
		'choices'     => array(
			'logo'       => __( 'Logo', 'astra-theme' ),
			'site-title' => __( 'Site Title', 'astra-theme' ),
		),
	) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( AST_THEME_SETTINGS . '[site-identity]', array(
			'selector'            => '.ast-site-identity',
			'container_inclusive' => false,
			'render_callback'     => array( 'AST_Customizer_Partials', '_render_partial_astlogo' ),
		) );
	}


	/**
	 * Option: Site Identity - Logo
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[site-logo]', array(
		'default'           => $defaults['site-logo'],
		'type'              => 'option',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, AST_THEME_SETTINGS . '[site-logo]', array(
		'section'     => 'section-site-identity',
		'label'       => __( 'Logo', 'astra-theme' ),
	) ) );

	/**
	 * Option: Display Tagline
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[site-tagline]', array(
		'default'           => $defaults['site-tagline'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_checkbox' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[site-tagline]', array(
		'type'        => 'checkbox',
		'section'     => 'section-site-identity',
		'label'       => __( 'Display Tagline', 'astra-theme' ),
	) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( AST_THEME_SETTINGS . '[site-tagline]', array(
			'selector'            => '.site-description',
			'container_inclusive' => false,
			'render_callback'     => array( 'AST_Customizer_Partials', '_render_partial_site_tagline' ),
		) );
	}

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control( new Ast_Control_Divider( $wp_customize, AST_THEME_SETTINGS . '[ast-site-icon-divider]', array(
		'type'     => 'ast-divider',
		'section'  => 'section-site-identity',
		'priority' => 50,
		'settings' => array(),
	) ) );

