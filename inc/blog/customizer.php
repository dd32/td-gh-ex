<?php

$semperfi_blog_customizer_options_array = array(


    'blog_background_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/inc/blog/images/Schwarttzy-Australia-Noosa-Beach-1920x1080.jpg', ),
        'description'       => array(
            1                   => '',  ),
        'input_attrs'       => array(
            'img_size'          => '1920x1080', ),
        'label'             => __('Image Displayed Before Blog', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Blog', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'header#blog-title-and-image .customizer-tite-image',
        'type'              => 'img'),


    'blog_title_text' => array(
        'default_options'  => array(
            1                   => 'Blog', ),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Title of the Blog', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Blog', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'header#blog-title-and-image h2',
        'type'              => 'text'),


    'publisher_logo_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/inc/blog/images/publisher-logo-600x60.jpg', ),
        'description'       => array(
            1                   => '',  ),
        'input_attrs'       => array(
            'img_size'          => '600x60', ),
        'label'             => __('Publisher Logo', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Blog', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'header#blog-title-and-image .customizer-tite-image',
        'type'              => 'img'),


);

return $semperfi_blog_customizer_options_array;