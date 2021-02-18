<?php
/**
 * Theme Customizer
 *
 * @package Adagio Lite
 */
function adagio_customize_register($wp_customize){
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action('customize_register', 'adagio_customize_register');

function adagio_customize_preview_js() {
	wp_enqueue_script( 'adagio_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'adagio_customize_preview_js' );