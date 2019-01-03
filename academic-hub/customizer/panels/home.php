<?php
/**
 * Home page Panel Settings
 *
 * @package Academic_Hub
 */

function academic_hub_customize_register_homepage( $wp_customize ) {
    
    $wp_customize->add_panel( 'academic_hub_homepage_setting', array(
        'title'      => __( 'Front Page Settings', 'academic-hub' ),
        'priority'   => 35
    ) );
        
}
add_action( 'customize_register', 'academic_hub_customize_register_homepage' );
