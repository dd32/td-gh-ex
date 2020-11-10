<?php
function agencyup_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/* General Section */
	$wp_customize->add_panel( 'general_options', array(
		'priority' => 3,
		'capability' => 'edit_theme_options',
		'title' => __('General Settings', 'agencyup'),
	) );

	//Logo and Background color settings
    $wp_customize->add_section(
        'colors',
        array(
            'priority'      => 1,
            'title'         => __('Colors','agencyup'),
            'panel'         => 'general_options',
        )
    );

    }
add_action( 'customize_register', 'agencyup_general_setting' );