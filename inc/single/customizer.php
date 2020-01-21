<?php

$semperfi_single_customizer_options_array = array(


    'main_background_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/inc/single/images/moose-eeeeee-300x300.jpg', ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '300x300', ),
        'label'             => __('Article Seal - Image', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Single and Page', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'main#the-article .customizer',
        'type'              => 'img'),


);

return $semperfi_single_customizer_options_array;
