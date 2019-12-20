<?php

$add_more_customizer_options = array(

    'square_boxes_enable' => array(
        'default_options'  => array(
            1                   => true, ),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Enable Square Boxes', 'semper-fi-lite'),
        'panel_title'       => __('Square Boxes', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Container Options', 'semper-fi-lite'),
        'section_priority'  => 10,
        'selector'          => 'article#square-boxes',
        'type'              => 'radio',
        'choices' => array(
            true             => 'Yes',
            false            => 'No', ) ),

    'square_boxes_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/images/Chris-Tandem-Skydive-850x478.jpg',
            2                   => get_template_directory_uri() . '/images/Kara_Skydiving_Sitfly-850x478.jpg',
            3                   => get_template_directory_uri() . '/images/HALO-Skydives-850x478.jpg',
            4                   => get_template_directory_uri() . '/images/Head-Down-Freeflying-Casey-Heather-Paul-850x478.jpg',
            5                   => get_template_directory_uri() . '/images/Chris-Tandem-Skydive-850x478.jpg',
            6                   => get_template_directory_uri() . '/images/Kara_Skydiving_Sitfly-850x478.jpg',
            7                   => get_template_directory_uri() . '/images/HALO-Skydives-850x478.jpg',
            8                   => get_template_directory_uri() . '/images/Head-Down-Freeflying-Casey-Heather-Paul-850x478.jpg', ),
        'description'       => array(
            1                   => '',
            2                   => '',
            3                   => '',
            4                   => '',
            5                   => '',
            6                   => '',
            7                   => '',
            8                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '850x478', ),
        'label'             => __('Image', 'semper-fi-lite'),
        'panel_title'       => __('Square Boxes', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('~ Box', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'article#square-boxes section:nth-of-type(~) h3',
        'type'              => 'img', ),

    'square_boxes_text' => array(
        'default_options'  => array(
            1                   => 'WordPress',
            2                   => 'HTML5',
            3                   => 'CSS3',
            4                   => 'JavaScript Free',
            5                   => 'WordPress',
            6                   => 'HTML5',
            7                   => 'CSS3',
            8                   => 'JavaScript Free', ),
        'description'       => array(
            1                   => '',
            2                   => '',
            3                   => '',
            4                   => '',
            5                   => '',
            6                   => '',
            7                   => '',
            8                   => '', ),
        'label'             => __('Title', 'semper-fi-lite'),
        'panel_title'       => __('Square Boxes', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('~ Box', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'article#square-boxes section:nth-of-type(~) h3',
        'type'              => 'text', ),

    'square_boxes_url' => array(
        'default_options'  => array(
            1                   => get_admin_url() . 'customize.php',
            2                   => get_admin_url() . 'customize.php',
            3                   => get_admin_url() . 'customize.php',
            4                   => get_admin_url() . 'customize.php',
            5                   => get_admin_url() . 'customize.php',
            6                   => get_admin_url() . 'customize.php',
            7                   => get_admin_url() . 'customize.php',
            8                   => get_admin_url() . 'customize.php', ),
        'description'       => array(
            1                   => '',
            2                   => '',
            3                   => '',
            4                   => '',
            5                   => '',
            6                   => '',
            7                   => '',
            8                   => '', ),
        'label'             => __('Link', 'semper-fi-lite'),
        'panel_title'       => __('Square Boxes', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 11,
        'section_title'     => __('~ Box', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'article#square-boxes section:nth-of-type(~) h3',
        'type'              => 'url', ),

    'square_boxes_display' => array(
        'default_options'  => array(
            1                   => true,
            2                   => true,
            3                   => true,
            4                   => true,
            5                   => false,
            6                   => false,
            7                   => false,
            8                   => false, ),
        'description'       => array(
            1                   => '',
            2                   => '',
            3                   => '',
            4                   => '',
            5                   => '',
            6                   => '',
            7                   => '',
            8                   => '', ),
        'label'             => __('Display This Square Box', 'semper-fi-lite'),
        'panel_title'       => __('Square Boxes', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('~ Box', 'semper-fi-lite'),
        'section_priority'  => 10,
        'selector'          => 'article#square-boxes section:nth-of-type(~) h3',
        'type'              => 'select',
        'choices' => array(
            true             => 'Yes',
            false            => 'No', ) ),

);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge_recursive ( $semperfi_customizer_array_of_options , $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );