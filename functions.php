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

	remove_action( 'agama_frontpage_boxes_action', 'agama_frontpage_boxes', 10 );
	add_action( 'agama_frontpage_boxes_action', 'agama_blue_frontpage_features', 10 );
	
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
	wp_enqueue_style( 'agama-blue-style', get_stylesheet_directory_uri() . '/style.css', array( 'agama-style' ), '1.0.1' );
 }
 
/**
 * Set colors on theme activated
 *
 * @since 1.0
 */
 add_action( 'after_switch_theme', 'agama_blue_after_switch_theme' );
 function agama_blue_after_switch_theme() {
	// Set header style
	set_theme_mod( 'agama_header_style', 'sticky' );
	// Set logo color
	set_theme_mod( 'agama_header_v1_logo_color', '#00a4d0' );
	// Set layout full-width
	set_theme_mod( 'agama_layout_style', 'fullwidth' );
	// Set primary color
	set_theme_mod( 'agama_primary_color', '#00a4d0' );
	// Set slider buttons color
	set_theme_mod( 'agama_slider_button_bg_color_1', '#00a4d0' );
	set_theme_mod( 'agama_slider_button_bg_color_2', '#00a4d0' );
	// Set frontpage boxes icons colors
	set_theme_mod( 'agama_frontpage_box_1_icon_color', '#00a4d0' );
	set_theme_mod( 'agama_frontpage_box_2_icon_color', '#00a4d0' );
	set_theme_mod( 'agama_frontpage_box_3_icon_color', '#00a4d0' );
	set_theme_mod( 'agama_frontpage_box_4_icon_color', '#00a4d0' );
 }
 
/**
 * Agama Blue Frontpage Features
 *
 * @since 1.0.1
 */
 function agama_blue_frontpage_features() { ?>
	
	<?php if( get_theme_mod('agama_frontpage_boxes_everywhere', false) || is_home() || is_front_page() ): ?>
		<!-- Frontpage Boxes Section -->
		<?php get_template_part( 'includes/frontpage-boxes'); ?>
		<!-- / /Frontpage Boxes Section -->
	<?php endif; ?>
	
	<?php if( get_theme_mod('agama_blue_blog', true) && is_home() ): ?>
		<!-- Frontpage Blog Section -->
		<?php get_template_part( 'includes/frontpage-blog' ); ?>
		<!-- / Frontpage Blog Section -->
	<?php endif; ?>
	
 <?php } ?>