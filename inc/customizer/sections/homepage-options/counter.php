<?php
/**
 * Counter Section
 *
 * @package agency-x
 */

add_action( 'customize_register', 'agency_x_customize_register_counter' );

function agency_x_customize_register_counter( $wp_customize ) {

    $wp_customize->add_section( 'counter_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Counter Section', 'agency-x' ),
    'description' => esc_attr__( 'Counter Section', 'agency-x' ),
    'panel' => 'homepage_panel'
    ) );    


  for( $i = 1; $i <= 3; $i++ ) {


    $wp_customize->add_setting( 'counter_value_'.$i, array(
      'sanitize_callback' => 'sanitize_text_field',
      'default' => 0        
    ) );

    $wp_customize->add_control( 'counter_value_'.$i, array(
      /* translators: %s: count */
      'label' => sprintf(__( 'Counter Value %s','agency-x' ), $i),
      'section' => 'counter_section',
      'settings' => 'counter_value_'.$i,
      'type' => 'text'
    ) );

    $wp_customize->add_setting( 'counter_title_'.$i, array(
      'sanitize_callback' => 'sanitize_text_field',
      'default' => ''          
    ) );

    $wp_customize->add_control( 'counter_title_'.$i, array(
      /* translators: %s: count */
      'label' => sprintf(__( 'Counter Value Title %s','agency-x' ), $i),
      'section' => 'counter_section',
      'settings' => 'counter_title_'.$i,
      'type' => 'text'
    ) );

  }

}