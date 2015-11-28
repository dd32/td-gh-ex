<?php

// Include Customizer File
get_template_part( 'includes/customizer' );

/**
 * Theme Setup
 *
 * @since 1.0
 */
 add_action( 'after_setup_theme', 'agama_blue_after_setup_theme' );
 function agama_blue_after_setup_theme() {
	
	// TODO - Here goes your custom functionality...
	
 }
 
/**
 * Enqueue Agama && Agama Blue Stylesheets
 *
 * @since 1.0
 */
 add_action( 'wp_enqueue_scripts', 'agama_blue_enqueue_scripts' );
 function agama_blue_enqueue_scripts() {
	// Roboto Condensed Font
	wp_enqueue_style( 'RobotoCondensed', esc_url( 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' ) );
	// Agama Stylesheet
	wp_enqueue_style( 'agama-style', get_template_directory_uri(). '/style.css' );
	// Agama Blue Stylesheet
	wp_enqueue_style( 'agama-blue-style', get_stylesheet_directory_uri() . '/style.css', array( 'agama-style' ) );
 }
 
/**
 * Set colors on theme activated
 *
 * @since 1.0
 */
 add_action( 'after_switch_theme', 'agama_blue_after_switch_theme' );
 function agama_blue_after_switch_theme() {
	// Set primary color
	set_theme_mod( 'agama_primary_color', '#00a4d0' );
	// Set frontpage boxes icons colors
	set_theme_mod( 'agama_frontpage_box_1_icon_color', '#00a4d0' );
	set_theme_mod( 'agama_frontpage_box_2_icon_color', '#00a4d0' );
	set_theme_mod( 'agama_frontpage_box_3_icon_color', '#00a4d0' );
	set_theme_mod( 'agama_frontpage_box_4_icon_color', '#00a4d0' );
 }