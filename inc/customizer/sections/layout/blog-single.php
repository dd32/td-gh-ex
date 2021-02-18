<?php
/**
 * Single Post Options for Astra Theme.
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
	 * Option: Single Post Meta
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[blog-single-meta]', array(
		'default'           => $defaults['blog-single-meta'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_multi_choices' ),
	) );
	$wp_customize->add_control( new Ast_Control_Sortable( $wp_customize, AST_THEME_SETTINGS . '[blog-single-meta]', array(
		'type'        => 'ast-sortable',
		'section'     => 'section-blog-single',
		'priority'    => 5,
		'label'       => __( 'Single Post Meta', 'astra-theme' ),
		'choices'     => array(
			'comments' => __( 'Comments', 'astra-theme' ),
			'category' => __( 'Category', 'astra-theme' ),
			'author'   => __( 'Author', 'astra-theme' ),
			'date'     => __( 'Publish Date', 'astra-theme' ),
			'tag'      => __( 'Tag', 'astra-theme' ),
		),
	) ) );

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control( new Ast_Control_Divider( $wp_customize, AST_THEME_SETTINGS . '[ast-styling-section-single-blog-layouts]', array(
		'type'     => 'ast-divider',
		'section'  => 'section-blog-single',
		'priority' => 10,
		'settings' => array(),
	) ) );

	/**
	 * Option: Single Post Content Width
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[blog-single-width]', array(
		'default'           => $defaults['blog-single-width'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[blog-single-width]', array(
		'type'        => 'select',
		'section'     => 'section-blog-single',
		'priority'    => 15,
		'label'       => __( 'Single Post Content Width', 'astra-theme' ),
		'choices'     => array(
			'default' => __( 'Default', 'astra-theme' ),
			'custom'  => __( 'Custom', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Enter Width
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[blog-single-max-width]', array(
		'default'           => $defaults['blog-single-max-width'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_number' ),
	) );
	$wp_customize->add_control( new Ast_Control_Slider( $wp_customize, AST_THEME_SETTINGS . '[blog-single-max-width]', array(
		'type'        => 'ast-slider',
		'section'     => 'section-blog-single',
		'priority'    => 20,
		'label'       => __( 'Enter Width', 'astra-theme' ),
		'suffix'      => '',
		'input_attrs' => array(
			'min'    => 768,
			'step'   => 1,
			'max'    => 1920,
		),
	) ) );
