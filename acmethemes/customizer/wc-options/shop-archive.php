<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'acmeblog-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive Sidebar Layout', 'acmeblog' ),
	'panel'          => 'acmeblog-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'acmeblog_sanitize_select'
) );
$choices = acmeblog_sidebar_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'acmeblog' ),
	'section'   => 'acmeblog-wc-shop-archive-option',
	'settings'  => 'acmeblog_theme_options[acmeblog-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'acmeblog' ),
	'section'   => 'acmeblog-wc-shop-archive-option',
	'settings'  => 'acmeblog_theme_options[acmeblog-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'acmeblog' ),
	'section'   => 'acmeblog-wc-shop-archive-option',
	'settings'  => 'acmeblog_theme_options[acmeblog-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );