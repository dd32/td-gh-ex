<?php

$add_more_customizer_options = array(

    'nav_logo_img' => array(
        'default'           => get_template_directory_uri() . '/images/moose-logo.jpg',
        'label'             => __('Navigation Logo', 'semper-fi-lite'),
        'panel_title'       => __('Navigation', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 10,
        'section_title'     => __('Menu Title', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'img.nav-logo',
        'type'              => 'img'),


    'titlefontstyle' => array(
        'css'               => "nav#for-mobile h1 {font-family:$",
        'default'           => 'default',
        'label'             => __('Font', 'semper-fi-lite'),
        'panel_title'       => __('Navigation', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 10,
        'section_title'     => __('Menu Title', 'semper-fi-lite'),
        'section_priority'  => 10,
        'selector'          => 'nav#for-mobile h1',
        'type'              => 'font'),


    'title_size' => array(
        'css'               => 'nav#for-mobile h1 {font-size:$em;',
        'default'           => '2.22',
        'label'             => __('Title Font Size', 'semper-fi-lite'),
        'panel_title'       => __('Navigation', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 10,
        'section_title'     => __('Menu Title', 'semper-fi-lite'),
        'section_priority'  => 10,
        'selector'          => 'nav#for-mobile h1',
        'type'              => 'range',
        'high'              => '12.00',
        'low'               => '0.00',
        'step'              => '.05',
        'units'             => 'em',
        'type'              => 'text'),
);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge($semperfi_customizer_array_of_options, $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );