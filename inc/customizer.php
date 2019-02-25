<?php
/**
 * customizer.php
 * @author    Franchi Design
 * @package   atomy
 * @version   1.0.0
 */


function atomy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'atomy_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'atomy_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'atomy_customize_register' );




function atomy_customize_partial_blogname() {
	bloginfo( 'name' );
}

function atomy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


function atomy_customize_preview_js() {
	wp_enqueue_script( 'atomy-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'atomy_customize_preview_js' );
