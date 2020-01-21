<?php

$semperfi_categories_and_tags_customizer_options_array = array(


    'categories_and_tags_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/inc/categories-and-tags/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg' , ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '1920x1080', ),
        'label'             => __('Background - Categories & Tags', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Categories & Tags', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'section#categories-and-tags div.customizer-categories-and-tags',
        'type'              => 'img'),


);

return $semperfi_categories_and_tags_customizer_options_array;