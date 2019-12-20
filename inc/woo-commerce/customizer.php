<?php

$add_more_customizer_options = array(
    
    'woocommerce_shop_title' => array(
        'default_options'  => array(
            1                   => "The Store Front",),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Title', 'semper-fi-lite'),
        'panel_title'       => __('WooCommerce', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Shop', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '.store-front:nth-of-type(~) .customizer-store-front h2',
        'type'              => 'text'),
    
    'woocommerce_shop_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            2                   => get_template_directory_uri() . '/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            3                   => get_template_directory_uri() . '/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            4                   => get_template_directory_uri() . '/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            5                   => get_template_directory_uri() . '/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            6                   => get_template_directory_uri() . '/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg', ),
        'description'       => array(
            1                   => '',
            2                   => '',
            3                   => '',
            4                   => '',
            5                   => '',
            6                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '1920x1080', ),
        'label'             => __('Image', 'semper-fi-lite'),
        'panel_title'       => __('WooCommerce', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('~ Shop', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '.store-front:nth-of-type(~) .customizer-store-front',
        'type'              => 'img'),

);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge_recursive ( $semperfi_customizer_array_of_options , $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );