<?php

$add_more_customizer_options = array(
    

    'main_background_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/images/moose-aaaaaa.jpg', ),
        'description'       => array(
            1                   => '', ),
        'img_size'          => '150x150',
        'label'             => __('Background Image', 'semper-fi-lite'),
        'panel_title'       => __('Blog', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Background', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'main#the-article',
        'type'              => 'img'),
    
    
);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge_recursive ( $semperfi_customizer_array_of_options , $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );