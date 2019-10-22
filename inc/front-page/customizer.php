<?php


$add_more_customizer_options = array(

    'fresh_install_display' => array(
        'default_options'  => array(
            1                   => true, ),
        'description'       => array(
            1                   => 'This page a mockup', ),
        'label'             => __('Enable Starter Content?', 'semper-fi-lite'),
        'panel_title'       => __('Front Page', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => array(
            1                   => __('Theme Setup', 'semper-fi-lite'), ),
        'section_priority'  => 10,
        'selector'          => array(
            1                   => '.starter-content', ),
        'type'              => 'select',
        'choices' => array(
            true             => 'Yes',
            false            => 'No', ) ),

);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge_recursive ( $semperfi_customizer_array_of_options , $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );