<?php
/**
 * General Options for Astra Theme.
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
	 * Option: Site Content Layout
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[site-content-layout]', array(
		'default'           => $defaults['site-content-layout'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[site-content-layout]', array(
		'type'        => 'select',
		'section'     => 'section-container-layout',
		'label'       => __( 'Content Layout', 'astra-theme' ),
		'choices'     => array(
			'boxed-container'   		=> __( 'Boxed', 'astra-theme' ),
			'content-boxed-container' 	=> __( 'Content Boxed', 'astra-theme' ),
			'plain-container'      		=> __( 'Plain', 'astra-theme' ),
			'page-builder'      		=> __( 'Page Builder', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control( new Ast_Control_Divider( $wp_customize, AST_THEME_SETTINGS . '[single-page-content-layout-divider]', array(
		'type'     => 'ast-divider',
		'section'  => 'section-container-layout',
		'caption'  => __( '<b>Note:</b> <i>In case of `Page Builder` Sidebar, Title Bar (if activated) & Normal Title will be disabled.</i>', 'astra-theme' ),
		'settings' => array(),
	) ) );

	/**
	 * Option: Single Page Content Layout
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[single-page-content-layout]', array(
		'default'           => $defaults['single-page-content-layout'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[single-page-content-layout]', array(
		'type'        => 'select',
		'section'     => 'section-container-layout',
		'label'       => __( 'Page', 'astra-theme' ),
		'choices'     => array(
			'default'            			=> __( 'Default', 'astra-theme' ),
			'boxed-container'   			=> __( 'Boxed', 'astra-theme' ),
			'content-boxed-container' 		=> __( 'Content Boxed', 'astra-theme' ),
			'plain-container'      			=> __( 'Plain', 'astra-theme' ),
			'page-builder'      			=> __( 'Page Builder', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Single Post Content Layout
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[single-post-content-layout]', array(
		'default'           => $defaults['single-post-content-layout'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[single-post-content-layout]', array(
		'type'        => 'select',
		'section'     => 'section-container-layout',
		'label'       => __( 'Blog Post', 'astra-theme' ),
		'choices'     => array(
			'default'            		=> __( 'Default', 'astra-theme' ),
			'boxed-container'   		=> __( 'Boxed', 'astra-theme' ),
			'content-boxed-container' 	=> __( 'Content Boxed', 'astra-theme' ),
			'plain-container'      		=> __( 'Plain', 'astra-theme' ),
			'page-builder'      		=> __( 'Page Builder', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Archive Post Content Layout
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[archive-post-content-layout]', array(
		'default'           => $defaults['archive-post-content-layout'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[archive-post-content-layout]', array(
		'type'        => 'select',
		'section'     => 'section-container-layout',
		'label'       => __( 'Blog Post Archive', 'astra-theme' ),
		'choices'     => array(
			'default'            		=> __( 'Default', 'astra-theme' ),
			'boxed-container'   		=> __( 'Boxed', 'astra-theme' ),
			'content-boxed-container' 	=> __( 'Content Boxed', 'astra-theme' ),
			'plain-container'      		=> __( 'Plain', 'astra-theme' ),
			'page-builder'      		=> __( 'Page Builder', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Body Background Color
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[site-layout-outside-bg-color]', array(
		'default'           => $defaults['site-layout-outside-bg-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_hex_color' ),
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, AST_THEME_SETTINGS . '[site-layout-outside-bg-color]', array(
		'section'     => 'section-colors-body',
		'priority'    => 25,
		'label'       => __( 'Background Color', 'astra-theme' ),
	) ) );
