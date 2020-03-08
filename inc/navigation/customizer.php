<?php

$semperfi_navigation_customizer_options_array = array(


    'nav_main_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/inc/navigation/images/navigation-semperfi-mousse-chocolate-lab-duck-schwarttzy.png', ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '100x350', ),
        'label'             => __('Navigation Logo', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 12,
        'section_title'     => __('Navigation', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'nav img.nav-logo',
        'type'              => 'img'),

    'nav_font_style' => array(
        'default_options'   => array(
            1                   => 'default', ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semperfi-navigation',
            'css'               => "    nav#for-mobile h1 { font-family: $", ),
        'label'             => __('Font', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'priority'          => 12,
        'section_priority'  => 10,
        'section_title'     => __('Navigation', 'semper-fi-lite'),
        'selector'          => 'nav#for-mobile h1',
        'type'              => 'font', ),

    'nav_title_size' => array(
        'default_options'  => array(
            1                   => '2.22',),
        'css'               => '    nav#for-mobile h1 { font-size: $em',
        'stylesheet_handle' => 'semperfi-navigation',
        'label'             => __('Title Font Size', 'semper-fi-lite'),
        'description'       => array(
            1                   => '', ),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 12,
        'section_title'     => __('Navigation', 'semper-fi-lite'),
        'section_priority'  => 10,
        'selector'          => 'nav#for-mobile h1',
        'type'              => 'range',
        'high'              => '12.00',
        'low'               => '0.00',
        'step'              => '.05',
        'units'             => 'em',
        'type'              => 'text'),


);

return $semperfi_navigation_customizer_options_array;
