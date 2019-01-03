<?php
/**
 * Header  Settings
 *
 * @package Academic_Hub
 */

function academic_hub_customize_register_header( $wp_customize ) {
    
    $wp_customize->add_panel( 'header_setting', array(
        'title'      => __( 'Logo & Header Settings', 'academic-hub' ),
        'priority'   => 1
    ) );
        
}
add_action( 'customize_register', 'academic_hub_customize_register_header' );
