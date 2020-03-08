<?php

$semperfi_footer_customizer_options_array = array(


    'footer_and_widgets_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/inc/footer/images/forest-background-1920x450.jpg', ),
        'description'       => array(
            1                   => '', ),
        'input_attrs'       => array(
            'img_size'          => '1920x450', ),
        'label'             => __('Footer Background Image', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 11,
        'section_title'     => __('Footer', 'semper-fi-lite'),
        'section_priority'  => 25,
        'selector'          => 'section#categories-and-tags div.customizer-categories-and-tags',
        'type'              => 'img'),


);

return $semperfi_footer_customizer_options_array;
