<?php
/*adding header options panel*/
$wp_customize->add_panel( 'acmephoto-header-panel', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Options', 'acmephoto' ),
    'description'    => __( 'Customize your awesome site header ', 'acmephoto' )
) );

/*
* file for header logo options
*/
require_once get_template_directory() . '/acmethemes/customizer/header-options/header-logo.php';

/*adding header image inside this panel*/
$wp_customize->get_section( 'header_image' )->panel = 'acmephoto-header-panel';
$wp_customize->get_section( 'header_image' )->description = __( 'Applied to the slider background image on home/front page and header images of inner pages.', 'acmephoto' );
$wp_customize->remove_control( 'display_header_text' );