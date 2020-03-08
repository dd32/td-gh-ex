<?php

$semperfi_woo_commerce_customizer_options_array = array(


    'woocommerce_shop_title' => array(
        'default_options'  => array(
            1                   => __( 'The Store Front' , 'semper-fi-lite' ) , ),
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
            1                   => get_template_directory_uri() . '/inc/categories-and-tags/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            2                   => get_template_directory_uri() . '/inc/categories-and-tags/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            3                   => get_template_directory_uri() . '/inc/categories-and-tags/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            4                   => get_template_directory_uri() . '/inc/categories-and-tags/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            5                   => get_template_directory_uri() . '/inc/categories-and-tags/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg',
            6                   => get_template_directory_uri() . '/inc/categories-and-tags/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg', ),
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

return $semperfi_woo_commerce_customizer_options_array;
