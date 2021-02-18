<?php
/**
 * Buttons for Astra Theme.
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
	 * Option: Button Color
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[button-color]', array(
		'default'           => $defaults['button-color'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_hex_color' ),
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, AST_THEME_SETTINGS . '[button-color]', array(
		'section'     => 'section-advanced-button',
		'label'       => __( 'Button Color', 'astra-theme' ),
	) ) );

	/**
	 * Option: Button Hover Color
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[button-h-color]', array(
		'default'           => $defaults['button-h-color'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_hex_color' ),
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, AST_THEME_SETTINGS . '[button-h-color]', array(
		'section'     => 'section-advanced-button',
		'label'       => __( 'Button Hover Color', 'astra-theme' ),
	) ) );

	/**
	 * Option: Button Background Color
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[button-bg-color]', array(
		'default'           => $defaults['button-bg-color'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_hex_color' ),
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, AST_THEME_SETTINGS . '[button-bg-color]', array(
		'section'     => 'section-advanced-button',
		'label'       => __( 'Button Background Color', 'astra-theme' ),
	) ) );

	/**
	 * Option: Button Background Hover Color
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[button-bg-h-color]', array(
		'default'           => $defaults['button-bg-h-color'],
		'type'              => 'option',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_hex_color' ),
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, AST_THEME_SETTINGS . '[button-bg-h-color]', array(
		'section'     => 'section-advanced-button',
		'label'       => __( 'Button Background Hover Color', 'astra-theme' ),
	) ) );

	/**
	 * Option: Button Radius
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[button-radius]', array(
		'default'           => $defaults['button-radius'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_number' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[button-radius]', array(
		'section'     => 'section-advanced-button',
		'label'       => __( 'Button Radius', 'astra-theme' ),
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 200,
		),
	) );

	/**
	 * Option: Vertical Padding
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[button-v-padding]', array(
		'default'           => $defaults['button-v-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_number' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[button-v-padding]', array(
		'section'     => 'section-advanced-button',
		'label'       => __( 'Vertical Padding', 'astra-theme' ),
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
			'max'  => 200,
		),
	) );

	/**
	 * Option: Horizontal Padding
	 */
	$wp_customize->add_setting( AST_THEME_SETTINGS . '[button-h-padding]', array(
		'default'           => $defaults['button-h-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'AST_Customizer_Sanitizes', 'sanitize_number' ),
	) );
	$wp_customize->add_control( AST_THEME_SETTINGS . '[button-h-padding]', array(
		'section'     => 'section-advanced-button',
		'label'       => __( 'Horizontal Padding', 'astra-theme' ),
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
			'max'  => 200,
		),
	) );
