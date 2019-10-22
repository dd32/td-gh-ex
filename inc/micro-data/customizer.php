<?php

$add_more_customizer_options = array(
    
    'publisher_logo_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/images/publisher-logo.jpg' , ),
        'label'             => __('Publisher Logo', 'semper-fi-lite'),
        'description'       => array(
            1                   => "It's rquired that the photo be exactly  600px wide 60px tall.", ),
        'input_attrs'       => array(
            'img_size'          => '600x60', ),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Publisher', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'img.microdata-publisher-logo',
        'type'              => 'img'),
    
    'square_logo_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/images/moose-logo.jpg' , ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '150x150', ),
        'label'             => __('Square Logo - 150px X 150px', 'semper-fi-lite'),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Organization Schema', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '',
        'type'              => 'img'),
    
    'microdata_organization_display' => array(
        'default_options'  => array(
            1                   => true,),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Enable Microdata', 'semper-fi-lite'),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Organization Schema', 'semper-fi-lite'),
        'section_priority'  => 10,
        'selector'          => '',
        'type'              => 'radio',
        'choices' => array(
			true             => 'Yes',
			false            => 'No')),
    
    'microdata_legalname' => array(
        'default_options'  => array(
            1                   => get_bloginfo('name'),),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Company Legal Name - Microdata', 'semper-fi-lite'),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Organization Schema', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '',
        'type'              => 'text'),
    
    'microdata_phone_number' => array(
        'default_options'  => array(
            1                   => '+1-888-888-8888',),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Company Phone Number - Microdata', 'semper-fi-lite'),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Organization Schema', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '',
        'type'              => 'text'),
    
    'microdata_facebook_url' => array(
        'default_options'  => array(
            1                   => "#",),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Company Same As - Facebook', 'semper-fi-lite'),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 11,
        'section_title'     => __('Organization Schema', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '',
        'type'              => 'url'),
    
    'microdata_twitter_url' => array(
        'default_options'  => array(
            1                   => "#",),
        'label'             => __('Company Same As - Twitter', 'semper-fi-lite'),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 11,
        'section_title'     => __('Organization Schema', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '',
        'type'              => 'url'),
    
    'microdata_youtube_url' => array(
        'default_options'  => array(
            1                   => "#",),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Company Same As - YouTube', 'semper-fi-lite'),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 11,
        'section_title'     => __('Organization Schema', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '',
        'type'              => 'url'),
    
    'microdata_googleplus_url' => array(
        'default_options'  => array(
            1                   => "#",),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Company Same As - Google Plus', 'semper-fi-lite'),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 11,
        'section_title'     => __('Organization Schema', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => '',
        'type'              => 'url'),

);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge_recursive ( $semperfi_customizer_array_of_options , $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );