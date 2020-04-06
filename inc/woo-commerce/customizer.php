<?php

$semper_fi_lite_woo_commerce_customizer_options_array = array(


    'woocommerce_store_front_enable' => array(
        'default_options'  => array(
            1                   => false, ),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Enable WooCommerce Store Front', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; WooCommerce' , 'semper-fi-lite'),
        'panel_priority'    => 4,
        'priority'          => 10,
        'section_title'     => __('Shop', 'semper-fi-lite'),
        'section_priority'  => 10,
        'selector'          => '.store-front:nth-of-type(~) .customizer-store-front h2',
        'type'              => 'radio',
        'choices' => array(
            true             => 'Yes',
            false            => 'No', ) ),


    'woocommerce_shop_title' => array(
        'default_options'  => array(
            1                   => __( 'The Store Front' , 'semper-fi-lite' ) , ),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Title', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; WooCommerce', 'semper-fi-lite'),
        'panel_priority'    => 4,
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
        'label'             => __('Image - 1920x1080', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; WooCommerce', 'semper-fi-lite'),
        'panel_priority'    => 4,
        'priority'          => 10,
        'section_title'     => __('~ Shop', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '.store-front-number-~ .customizer-store-front',
        'type'              => 'img'),


);

return $semper_fi_lite_woo_commerce_customizer_options_array;
