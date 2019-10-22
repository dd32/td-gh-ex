<?php

$add_more_customizer_options = array(

    
    'above_the_fold_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/images/moose-logo-1920x1080.jpg' , ),
        'label'             => __('Default Header Image', 'semper-fi-lite'),
        'description'       => array(
            1                   => "This image only appears whent the post or page doesn't have a featured image.", ),
        'input_attrs'       => array(
            'img_size'          => '1920x1080', ),
        'panel_title'       => __('Above The Fold', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Static Image', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'header#title-and-image div.customizer-tite-image',
        'type'              => 'img'),

    
    'above_the_fold_title' => array(
        'default_options'  => array(
            1                   => 'default',),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semperfi-above-the-fold',
            'css'               => "    header#title-and-image h2 { font-family: $", ),
        'label'             => __('Font', 'semper-fi-lite'),
        'panel_title'       => __('Above The Fold', 'semper-fi-lite'),
        'panel_priority'    => 2,
        'priority'          => 10,
        'section_title'     => __('Static Image', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'header#title-and-image h2',
        'type'              => 'font'),


    'above_the_fold_title_size' => array(
        'default_options'  => array(
            1                   => '3',),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semperfi-above-the-fold',
            'css'               => '    header#title-and-image h2 { font-size: $em', ),
        'label'             => __('Font Size', 'semper-fi-lite'),
        'panel_title'       => __('Above The Fold', 'semper-fi-lite'),
        'panel_priority'    => 2,
        'priority'          => 10,
        'section_title'     => __('Static Image', 'semper-fi-lite'),
        'section_priority'  => 12,
        'selector'          => 'header#title-and-image h2',
        'type'              => 'range',
        'high'              => '12.00',
        'low'               => '0.00',
        'step'              => '.05',
        'units'             => 'em',
        'type'              => 'range'),


    'above_the_fold_position_from_top' => array(
        'default_options'  => array(
            1                   => '5',),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semperfi-above-the-fold',
            'css'               => '    header#title-and-image h2 { top: $em', ),
        'label'             => __('Postion of the Title From Top', 'semper-fi-lite'),
        'panel_title'       => __('Above The Fold', 'semper-fi-lite'),
        'panel_priority'    => 2,
        'priority'          => 10,
        'section_title'     => __('Static Image', 'semper-fi-lite'),
        'section_priority'  => 12,
        'selector'          => 'header#title-and-image h2',
        'type'              => 'range',
        'high'              => '12.00',
        'low'               => '0.00',
        'step'              => '.05',
        'units'             => 'em',
        'type'              => 'range'),

    'above_the_fold_title_color' => array(
        'default_options'  => array(
            1                   => '#ffffff',),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'stylesheet_handle' => 'semperfi-above-the-fold',
            'css'               => '    header#title-and-image h2 { color: $', ),
        'label'             => __('Color', 'semper-fi-lite'),
        'panel_title'       => __('Above The Fold', 'semper-fi-lite'),
        'panel_priority'    => 2,
        'priority'          => 10,
        'section_title'     => __('Static Image', 'semper-fi-lite'),
        'section_priority'  => 12,
        'selector'          => 'header#title-and-image h2',
        'type'              => 'color'),

);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge_recursive ( $semperfi_customizer_array_of_options , $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );