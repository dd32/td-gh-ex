<?php

$add_more_customizer_options = array(

    
    'categories_and_tags_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg' , ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '1920x1080', ),
        'label'             => __('Background - Categories & Tags', 'semper-fi-lite'),
        'panel_title'       => __('Blog', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Categories & Tags', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'section#categories-and-tags div.customizer-categories-and-tags',
        'type'              => 'img'),
    
    
);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge_recursive ( $semperfi_customizer_array_of_options , $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );