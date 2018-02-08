<?php
/**
 * Homepage Settings
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_homepage_panel' );

function agency_x_customize_register_homepage_panel( $wp_customize ) {
	$wp_customize->add_panel( 'homepage_panel', array(
		'priority' => 10,
		'title' => esc_attr__( 'Homepage Options', 'agency-x' ),
		'description' => esc_attr__( 'Homepage Options', 'agency-x' )
	) );
}