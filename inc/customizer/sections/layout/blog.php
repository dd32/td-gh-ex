<?php
/**
 * Blog Options for Astra Theme.
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
	 * Option: Blog Post Content
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[blog-post-content]', array(
		'default'           => $defaults['blog-post-content'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[blog-post-content]', array(
		'section'     => 'section-blog',
		'label'       => __( 'Blog Post Content', 'astra-theme' ),
		'type'        => 'select',
		'priority'	  => 3,
		'choices'     => array(
			'full-content' => __( 'Full Content', 'astra-theme' ),
			'excerpt'      => __( 'Excerpt', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Display Post Meta
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[blog-meta]', array(
		'default'           => $defaults['blog-meta'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_multi_choices' ),
	) );
	$wp_customize->add_control( new Ast_Control_Sortable( $wp_customize, AST_THEME_SETTINGS . '[blog-meta]', array(
		'type'        => 'ast-sortable',
		'section'     => 'section-blog',
		'priority'    => 5,
		'label'       => __( 'Blog Meta', 'astra-theme' ),
		'choices'     => array(
			'comments'	=> __( 'Comments', 'astra-theme' ),
			'category'	=> __( 'Category', 'astra-theme' ),
			'author'	=> __( 'Author', 'astra-theme' ),
			'date'		=> __( 'Publish Date', 'astra-theme' ),
			'tag'		=> __( 'Tag', 'astra-theme' ),
		),
	) ) );


	/**
	 * Option: Divider
	 */
	$wp_customize->add_control( new Ast_Control_Divider( $wp_customize, AST_THEME_SETTINGS . '[ast-styling-section-blog-width]', array(
		'type'     => 'ast-divider',
		'section'  => 'section-blog',
		'priority' => 10,
		'settings' => array(),
	) ) );

	/**
	 * Option: Blog Content Width
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[blog-width]', array(
		'default'           => $defaults['blog-width'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_choices' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[blog-width]', array(
		'type'        => 'select',
		'section'     => 'section-blog',
		'priority'    => 15,
		'label'       => __( 'Blog Content Width', 'astra-theme' ),
		'choices'     => array(
			'default' => __( 'Default', 'astra-theme' ),
			'custom'  => __( 'Custom', 'astra-theme' ),
		),
	) );

	/**
	 * Option: Enter Width
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[blog-max-width]', array(
		'default'           => $defaults['blog-max-width'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_number' ),
	) );
	$wp_customize->add_control( new Ast_Control_Slider( $wp_customize, AST_THEME_SETTINGS . '[blog-max-width]', array(
		'type'        => 'ast-slider',
		'section'     => 'section-blog',
		'priority'    => 20,
		'label'       => __( 'Enter Width', 'astra-theme' ),
		'suffix'      => '',
		'input_attrs' => array(
			'min'    => 768,
			'step'   => 1,
			'max'    => 1920,
		),
	) ) );
