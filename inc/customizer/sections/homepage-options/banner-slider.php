<?php
/**
 * Banner Slider Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_banner_slider' );

function agency_x_customize_register_banner_slider( $wp_customize ) {

    $wp_customize->add_section( 'banner_slider_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Banner Slider Section', 'agency-x' ),
    'description' => esc_attr__( 'Banner Slider Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );

    $wp_customize->add_setting( 'banner_slider_display', array(
    'sanitize_callback' => 'agency_x_sanitize_checkbox',
    'default' => true
    ) );

    $wp_customize->add_control( 'banner_slider_display', array(
    'label' => esc_attr__( 'Display?','agency-x' ),
    'section' => 'banner_slider_section',
    'settings' => 'banner_slider_display',
    'type' => 'checkbox',
    'priority' => 1
    ) ); 


  for( $i = 1; $i <= 3; $i++ ) { 

    $wp_customize->add_setting( 'banner_slider_'.$i, array(
      'default'     => '',
      'sanitize_callback' => 'agency_x_sanitize_dropdown_pages'
    ) );

    $wp_customize->add_control( 'banner_slider_'.$i, array(
      'label'                 =>  sprintf( __( 'Select Page For Slider %s', 'agency-x' ), $i),
      'section'               => 'banner_slider_section',
      'type'                  => 'dropdown-pages',
      'priority'              => 30,
      'settings' => 'banner_slider_'.$i
    ) );

  }

}