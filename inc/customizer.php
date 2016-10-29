<?php

function bunny_customizer( $wp_customize ) {

	$wp_customize->remove_section('header_image'); /*We are not actually using a header image, only the text options.*/

	$wp_customize->add_panel('bunny_options_panel',	array(
		'title' => __( 'Theme Options', 'bunny' ),
		'priority' => 210,
		)
	);

	$wp_customize->add_section('bunny_section_one',	array(
		'title' => __( 'Arc Settings', 'bunny' ),
		'priority' => 10,
		'panel' => 'bunny_options_panel',
		)
	);

	$wp_customize->add_section('bunny_section_two',	array(
		'title' => __( 'Meta Settings', 'bunny' ),
		'priority' => 210,
		'panel' => 'bunny_options_panel',
		)
	);

	$wp_customize->add_section('bunny_section_three',        array(
		'title' => __( 'Image Settings', 'bunny' ),
		'priority' => 210,
		'panel' => 'bunny_options_panel',
		)
	);

	$wp_customize->add_section('bunny_section_four',        array(
		'title' => __( 'Animation Settings', 'bunny' ),
		'priority' => 210,
		'panel' => 'bunny_options_panel',
		)
	);

	$wp_customize->add_setting( 'bunny_title_arc_size',		array(
		'sanitize_callback' => 'bunny_sanitize_arc_value',
		'default' => '400',
		)
	);
	$wp_customize->add_control('bunny_title_arc_size',		array(
		'type' => 'text',
		'label' => __( 'Adjust the value of the arc to match the length of your site title. 
			Set a small number for a high arc, and high number for a low arc.', 'bunny' ),
		'section' => 'bunny_section_one',
		)
	);

	$wp_customize->add_setting( 'bunny_tagline_arc_size',		array(
			'sanitize_callback' => 'bunny_sanitize_arc_value',
			'default' => '400',
		)
	);
	$wp_customize->add_control('bunny_tagline_arc_size',		array(
			'type' => 'text',
			'label' => __( 'Adjust the value of the arc to match the length of your tagline', 'bunny' ),
			'section' => 'bunny_section_one',
		)
	);

	$wp_customize->add_setting( 'bunny_disable_arc',		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('bunny_disable_arc',		array(
			'type' => 'checkbox',
			'label' => __( 'Check this box to disable the arc.', 'bunny' ),
			'section' => 'bunny_section_one',
		)
	);

	$wp_customize->add_setting( 'bunny_easter_eggs',		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('bunny_easter_eggs',		array(
			'type' => 'checkbox',
			'label' => __( 'Check this box to turn Bunny into the Easter bunny!', 'bunny' ),
			'section' => 'bunny_section_three',
		)
	);
	$wp_customize->add_setting( 'bunny_christmas',		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('bunny_christmas',		array(
			'type' => 'checkbox',
			'label' => __( 'Check this box to add that Christmas feeling!', 'bunny' ),
			'section' => 'bunny_section_three',
		)
	);

	$wp_customize->add_setting( 'bunny_spooky',		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('bunny_spooky',		array(
			'type' => 'checkbox',
			'label' => __( 'Check this box to spook things up!', 'bunny' ),
			'section' => 'bunny_section_three',
		)
	);

	$wp_customize->add_setting( 'bunny_hide',		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('bunny_hide',		array(
			'type' => 'checkbox',
			'label' => __( 'Check this box to hide all decorative images.', 'bunny' ),
			'section' => 'bunny_section_three',
		)
	);

	$wp_customize->add_setting( 'bunny_animation',		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('bunny_animation',		array(
			'type' => 'checkbox',
			'label' => __( 'Check this box to stop the animations.', 'bunny' ),
			'section' => 'bunny_section_four',
		)
	);

	$wp_customize->add_setting( 'bunny_meta',		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('bunny_meta',		array(
			'type' => 'checkbox',
			'label' => __( 'Check this box to hide the meta information (post author, categories, tags, edit button).', 'bunny' ),
			'section' => 'bunny_section_two',
		)
	);

}
add_action( 'customize_register', 'bunny_customizer' );

function bunny_sanitize_arc_value( $value ) {
	$value = (int) $value;
	return ( 0 < $value ) ? $value : null;
}

function bunny_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
