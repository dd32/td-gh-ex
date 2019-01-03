<?php
/**
 * General Settings Hear
 *
 * @package Academic_Hub
 */

function academic_hub_customize_general_settings( $wp_customize ) {
	
    /**
    * General Settings Panel
    *@since 1.0.0
    */
    $wp_customize->get_section('header_image')->panel = 'general_setting';
    $wp_customize->get_section('header_image' )->priority = 2;

    $wp_customize->get_section('colors')->panel = 'general_setting';
    $wp_customize->get_section('title_tagline' )->priority = 3;

    $wp_customize->get_section('background_image')->panel = 'general_setting';
    $wp_customize->get_section('header_image' )->priority = 4;

    $wp_customize->get_setting('header_textcolor' )->default = 'ffffff';

}
add_action( 'customize_register', 'academic_hub_customize_general_settings' );