<?php

$semper_fi_lite_navigation_customizer_options_array = array(


    'nav_main_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/inc/navigation/images/navigation-semperfi-mousse-chocolate-lab-duck-schwarttzy-250x250.png', ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '350x100', ),
        'label'             => __('Navigation Logo - 350x100', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 9,
        'section_title'     => __('Navigation', 'semper-fi-lite'),
        'section_priority'  => 9,
        'selector'          => 'nav img.nav-logo',
        'type'              => 'img'),

    'nav_font_style' => array(
        'default_options'   => array(
            1                   => 'default', ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semper_fi_lite-navigation',
            'css'               => "    nav#display-menu h1 { font-family: $", ),
        'label'             => __('Font', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'priority'          => 9,
        'section_priority'  => 9,
        'section_title'     => __('Navigation', 'semper-fi-lite'),
        'selector'          => 'nav#display-menu h1',
        'type'              => 'font', ),

    'nav_title_size' => array(
        'default_options'  => array(
            1                   => '2.2',),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semper_fi_lite-navigation',
            'css'               => "    nav#display-menu h1 { font-size: $", ),
        'label'             => __('Title Font Size', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'priority'          => 9,
        'section_priority'  => 9,
        'section_title'     => __('Navigation', 'semper-fi-lite'),
        'selector'          => 'nav#display-menu h1',
        'high'              => '12.00',
        'low'               => '0.00',
        'step'              => '.05',
        'type'              => 'range',
        'units'             => 'em', ),


);

return $semper_fi_lite_navigation_customizer_options_array;
