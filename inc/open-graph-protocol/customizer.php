<?php


$add_more_customizer_options = array(

    'open_graph_protocol_fb_app_id' => array(
        'default_options'  => array(
            1                   => "fb:app_id",),
        'description'       => array(
            1                   => '<h2>Register</h2><p>In order for your app to access any of Facebooks products or APIs, you must first convert your Facebook account to a Developer Account and register your app using the App Dashboard. You can do this at <a href="https://developers.facebook.com/">developers.facebook.com</a>. Registration creates an App ID that lets Facebook know who you are, helps Facebook distinguish your app from other apps, and provides a way for you to supply any additional materials Facebook may need when you set up specific products or request access to sensitive APIs.</p><p>Once you register, click the <strong>Settings</strong> link on the left side and provide any additional information you may have about your app. Most of the fields are self-explanatory, but heres additional information about a few of the fields.</p> <h3>App ID</h3> <p>When you register, Facebook will generate a unique App ID for your app. You will use this a lot, since it must be included when making any calls to our APIs. All of Facebook SDKs provide a way for you easily set this so it will automatically included with any API calls.</p>', ),
        'label'             => __('Open Graph Protocol fb:app_id', 'semper-fi-lite'),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Open Graph Protocol', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'header#title-and-image .customizer-tite-image-3',
        'type'              => 'text'),

);

$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');

$semperfi_customizer_array_of_options = array_merge_recursive ( $semperfi_customizer_array_of_options , $add_more_customizer_options );

set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_options );