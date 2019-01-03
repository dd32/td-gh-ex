<?php
/**
 * General  Settings
 *
 * @package Academic_Hub
 */

function academic_hub_customize_register_general( $wp_customize ) {
    
    $wp_customize->add_panel( 'general_setting', array(
        'title'      => __( 'General Settings', 'academic-hub' ),
        'priority'   => 35
    ) );
        
}
add_action( 'customize_register', 'academic_hub_customize_register_general' );
