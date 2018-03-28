<?php
/**
 * Social Media Settings
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_social_media_panel' );

function agency_x_customize_register_social_media_panel( $wp_customize ) {
	$wp_customize->add_panel( 'social_media_panel', array(
		'priority' => 10,
		'title' => esc_attr__( 'Social Media Options', 'agency-x' ),
		'description' => esc_attr__( 'Social Media Options', 'agency-x' )
	) );
}