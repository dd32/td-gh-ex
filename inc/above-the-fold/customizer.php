<?php

$semper_fi_lite_above_the_fold_customizer_options_array = array(


    'above_the_fold_title' => array(
        'default_options'  => array(
            1                   => 'default',),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semper_fi_lite-above-the-fold',
            'css'               => "    header > h2.header-text { font-family: $", ),
        'label'             => __('Font', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 10,
        'section_title'     => __('Above the Fold', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'header > h2.header-text',
        'type'              => 'font'),


    'above_the_fold_title_size' => array(
        'default_options'  => array(
            1                   => '3',),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semper_fi_lite-above-the-fold',
            'css'               => '    header > h2.header-text { font-size: $em', ),
        'label'             => __('Font Size', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 10,
        'section_title'     => __('Above the Fold', 'semper-fi-lite'),
        'section_priority'  => 12,
        'selector'          => 'header > h2.header-text',
        'type'              => 'range',
        'high'              => '12.00',
        'low'               => '0.00',
        'step'              => '.025',
        'units'             => 'em',
        'type'              => 'range'),


    'above_the_fold_position_from_bottom' => array(
        'default_options'  => array(
            1                   => '-.15',),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semper_fi_lite-above-the-fold',
            'css'               => '    header > h2.header-text { bottom: $em', ),
        'label'             => __('Postion of the Title From Bottom', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 10,
        'section_title'     => __('Above the Fold', 'semper-fi-lite'),
        'section_priority'  => 12,
        'selector'          => 'header > h2.header-text',
        'type'              => 'range',
        'high'              => '12.00',
        'low'               => '-12.00',
        'step'              => '.025',
        'units'             => 'em',
        'type'              => 'range'),

    
    'above_the_fold_title_color' => array(
        'default_options'  => array(
            1                   => '#ffffff',),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semper_fi_lite-above-the-fold',
            'css'               => '    header > h2.header-text { color: $', ),
        'label'             => __('Color', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 10,
        'section_title'     => __('Above the Fold', 'semper-fi-lite'),
        'section_priority'  => 12,
        'selector'          => 'header > h2.header-text',
        'type'              => 'color'),


        );

return $semper_fi_lite_above_the_fold_customizer_options_array;
