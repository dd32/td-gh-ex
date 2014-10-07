<?php

/**
 * Get Theme Customizer Fields
 *
 * @package		The Customizer Options
 * @copyright	Copyright (c) 2014, D5 Creation
 * @license		GNU GPL
 * @author		D5 Creation
 *
 * @since		Searchlight 1.3
 */



function searchlight_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'searchlight_customizer', array(
        'title' 		=> __( 'Searchlight Options', 'searchlight' ),
		'description' 	=> __( 'Here You can Set Some Specific Options of Searchlight Theme', 'searchlight' ),
		'priority' 		=> 1
    ) );
 
    $wp_customize->add_setting( 'field_header', array(
        'default'		=> '1',
		'type' 			=> 'option',
		'transport' 	=> 'refresh',
		'sanitize_callback' => 'sanitize_html_class'
    ) );
 
    $wp_customize->add_control( 'field_header_control', array(
        'label' 	=> __( 'Fixed Header?', 'searchlight' ),
		'type' 		=> 'checkbox', 
		'priority' 	=> 1
    ) );
}
add_action( 'customize_register', 'searchlight_customize_register' );
 


