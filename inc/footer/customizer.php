<?php

$add_more_customizer_options = array(

    
    'footer_and_widgets_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/images/forest-background.jpg', ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '1920x450', ),
        'label'             => __('Footer Background Image', 'semper-fi-lite'),
        'panel_title'       => __('Footer Background Image', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Footer & Widgets', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'section#categories-and-tags div.customizer-categories-and-tags',
        'type'              => 'img'),
    
    
);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge_recursive ( $semperfi_customizer_array_of_options , $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );