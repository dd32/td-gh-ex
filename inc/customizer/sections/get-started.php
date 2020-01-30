<?php
/**
 * Add Customizer Options
 * [Topbar Settings]
 */

function apex_business_get_started_setup( $wp_customize ) {

    // Get Started Section
    $wp_customize->add_section( 'apex_business_get_started_section', array(
        'title'       =>  __( 'Get Started with Apex Business', 'apex-business' ),
        'capability'  => 'edit_theme_options',
        'priority'    =>  1
    ) );

    // Documentation Setting
    $wp_customize->add_setting( 'apex_business_get_started_button_setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'apex_business_get_started_button_control', array(
                /* Translators: %s: Get Started Link */
                'description'    => sprintf( __( 'Make sure you\'ve Activated & Published your changes %1$sGet Started with Apex Business%2$s', 'apex-business' ), '<a class="jquery-btn-get-started ct-customizer-getstarted button button-primary" href="' . esc_url( '#' ) . '">', '</a>' ),
                'section'         => 'apex_business_get_started_section',
                'settings'        => 'apex_business_get_started_button_setting',
                'type'            => 'hidden',
            )
        )
    );
}

add_action( 'customize_register', 'apex_business_get_started_setup');
