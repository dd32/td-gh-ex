<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'acmeblog-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'acmeblog' ),
	'panel'          => 'acmeblog-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'acmeblog_sanitize_select'
) );
$choices = acmeblog_sidebar_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'acmeblog' ),
	'section'   => 'acmeblog-wc-single-product-options',
	'settings'  => 'acmeblog_theme_options[acmeblog-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );