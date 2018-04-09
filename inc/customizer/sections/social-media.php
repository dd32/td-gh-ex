<?php
/**
 * Social Media Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_social_media_section' );

function agency_x_customize_register_social_media_section( $wp_customize ) {

    $social = array( esc_attr__('facebook', 'agency-x'), esc_attr__('twitter', 'agency-x'), esc_attr__('googleplus','agency-x'), esc_attr__('youtube', 'agency-x'), esc_attr__('linkedin', 'agency-x'), esc_attr__('pinterest', 'agency-x'), esc_attr__('instagram', 'agency-x') ); 

    $wp_customize->add_section( 'social_section', array(
      'priority' => 80,
      'title' => esc_attr__( 'Social Media', 'agency-x' ),
      'description' => 'Customize your Social Info',
      'capability' => 'edit_theme_options',
    ) );

    foreach ( $social as $key => $value ) {
        $wp_customize->add_setting( $value . '_textbox', array(
          'sanitize_callback' => 'esc_url_raw',
          'default' => ''
        ) );

        $wp_customize->add_control( $value . '_textbox', array(
          'label' => ucwords( $value ),
          'section' => 'social_section',
          'settings' => $value . '_textbox',
          'type' => 'url',
          'default' =>''
        ) );
    }
}