<?php
/**
 * The template for adding color options in Customizer
 *
 * @package Catch Themes
 * @subpackage Catch Base
 * @since Catch Base 1.0 
 */

 if ( ! defined( 'CATCHBASE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
  	//Color Options
  	if( 4 <= get_bloginfo( 'version' ) ) {
	  	$wp_customize->add_panel( 'catchbase_color_options', array(
		    'capability'     => 'edit_theme_options',
		    'description'    => __( 'Color Options', 'catchbase' ),
		    'priority'       => 300,			
		    'title'    		 => __( 'Color Options', 'catchbase' ),
		) );
  	}
	
	//Basic Color Options
	$wp_customize->add_section( 'catchbase_color_scheme', array(
		'panel'	   => 'catchbase_color_options',
		'priority' => 301,
		'title'    => __( 'Basic Color Options', 'catchbase' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[color_scheme]', array(
		'capability' 		=> 'edit_theme_options',
		'default'    		=> $defaults['color_scheme'],
		'sanitize_callback'	=> 'sanitize_key'
	) );

	$schemes = catchbase_color_schemes();

	$choices = array();

	foreach ( $schemes as $scheme ) {
		$choices[ $scheme['value'] ] = $scheme['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[color_scheme]', array(
		'choices'  => $choices,
		'label'    => __( 'Color Scheme', 'catchbase' ),
		'priority' => 5,
		'section'  => 'catchbase_color_scheme',
		'settings' => 'catchbase_theme_options[color_scheme]',
		'type'     => 'radio',
	) );
	//Basic Color Options End