<?php

$semper_fi_lite_404_customizer_options_array = array(

    '404_video' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/inc/404/images/bradley-and-mousse-are-thirsty.mp4',  ),
        'description'       => array(
            1                   => '', ),
        'label'             => __('Video', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 1,
        'priority'          => 9,
        'section_title'     => __('404 Error', 'semper-fi-lite'),
        'section_priority'  => 9,
        'selector'          => '#title-image-content.404error .header-text',
        'type'              => 'video', ),


);

return $semper_fi_lite_404_customizer_options_array;
