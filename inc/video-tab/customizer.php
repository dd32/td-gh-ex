<?php

$semper_fi_lite_video_tab_customizer_options_array = array(
    

    'video_tab_img' => array(
        'default_options'  => array(
            1                   => get_template_directory_uri() . '/inc/video-tab/images/Redcliffe-Skydive-Australia-Preformance-Designs-Velocity-103-Velo-Proskydiving.jpg', ),
        'description'       => array(
            1                   => '',  ),
        'input_attrs'       => array(
            'img_size'          => '1920x1080', ),
        'label'             => __('Image - 1920x1080', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; After Comments', 'semper-fi-lite'),
        'panel_priority'    => 4,
        'priority'          => 10,
        'section_title'     => __('Image after Comments', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'aside#video-tab .customizer',
        'type'              => 'img'),
    
    
);

return $semper_fi_lite_video_tab_customizer_options_array;
