<?php
/**
 * Sidebar Options for Astra Theme.
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
	 * Option: Default Sidebar Position
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[site-sidebar-layout]', array(
		'default'           => $defaults['site-sidebar-layout'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );

	$wp_customize->add_control( AST_THEME_SETTINGS . '[site-sidebar-layout]', array(
		'type'        => 'select',
		'section'     => 'section-sidebars',
		'priority'    => 5,
		'label'       => __( 'Sidebar Layout', 'astra-theme' ),
		'choices'     => array(
			'no-sidebar'    => __( 'No Sidebar', 'astra-theme' ),
			'left-sidebar'  => __( 'Left Sidebar', 'astra-theme' ),
			'right-sidebar' => __( 'Right Sidebar', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control( new Ast_Control_Divider( $wp_customize, AST_THEME_SETTINGS . '[single-page-sidebar-layout-divider]', array(
		'type'     => 'ast-divider',
		'section'  => 'section-sidebars',
		'priority' => 5,
		'settings' => array(),
	) ) );

	/**
	 * Option: Page
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
		'default'           => $defaults['single-page-sidebar-layout'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
		'type'        => 'select',
		'section'     => 'section-sidebars',
		'priority'    => 5,
		'label'       => __( 'Page', 'astra-theme' ),
		'choices'     => array(
			'default'       => __( 'Default', 'astra-theme' ),
			'no-sidebar'    => __( 'No Sidebar', 'astra-theme' ),
			'left-sidebar'  => __( 'Left Sidebar', 'astra-theme' ),
			'right-sidebar' => __( 'Right Sidebar', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Blog Post
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
		'default'           => $defaults['single-post-sidebar-layout'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
		'type'        => 'select',
		'section'     => 'section-sidebars',
		'priority'    => 5,
		'label'       => __( 'Blog Post', 'astra-theme' ),
		'choices'     => array(
			'default'       => __( 'Default', 'astra-theme' ),
			'no-sidebar'    => __( 'No Sidebar', 'astra-theme' ),
			'left-sidebar'  => __( 'Left Sidebar', 'astra-theme' ),
			'right-sidebar' => __( 'Right Sidebar', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Blog Post Archive
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
		'default'           => $defaults['archive-post-sidebar-layout'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
		'type'        => 'select',
		'section'     => 'section-sidebars',
		'priority'    => 5,
		'label'       => __( 'Blog Post Archive', 'astra-theme' ),
		'choices'     => array(
			'default'       => __( 'Default', 'astra-theme' ),
			'no-sidebar'    => __( 'No Sidebar', 'astra-theme' ),
			'left-sidebar'  => __( 'Left Sidebar', 'astra-theme' ),
			'right-sidebar' => __( 'Right Sidebar', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control( new Ast_Control_Divider( $wp_customize, AST_THEME_SETTINGS . '[divider-section-sidebar-width]', array(
		'section'     => 'section-sidebars',
		'type'        => 'ast-divider',
		'priority'	  => 10,
		'settings'    => array(),
	) ) );

	/**
	 * Option: Primary Content Width
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[site-sidebar-width]', array(
		'default'           => $defaults['site-sidebar-width'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_number' ),
	) );
	$wp_customize->add_control( new Ast_Control_Slider( $wp_customize, AST_THEME_SETTINGS . '[site-sidebar-width]', array(
		'type'        => 'ast-slider',
		'section'     => 'section-sidebars',
		'priority'    => 15,
		'label'       => __( 'Sidebar Width', 'astra-theme' ),
		'suffix'      => '%',
		'input_attrs' => array(
			'min'    => 15,
			'step'   => 1,
			'max'    => 50,
		),
	) ) );
