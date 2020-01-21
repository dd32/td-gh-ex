<?php

$semperfi_open_graph_protocol_customizer_options_array = array(


        'open_graph_protocol' => array(
            'default_options'  => array(
                1                   => false, ),
            'label'             => __('Enable Open Graph Protocol', 'semper-fi-lite'),
            'description'       => array(
                1                   => 'The <a href="http://ogp.me/" target="_blank">Open Graph protocol</a> enables any web page to become a rich object in a social graph. For instance, this is used on Facebook to allow any web page to have the same functionality as any other object on Facebook.<br><br>While many different technologies and schemas exist and could be combined together, there is not a single technology which provides enough information to richly represent any web page within the social graph. The Open Graph protocol builds on these existing technologies and gives developers one thing to implement. Developer simplicity is a key goal of the Open Graph protocol which has informed many of <a href="http://www.scribd.com/doc/30715288/The-Open-Graph-Protocol-Design-Decisions" target="_blank">the technical design decisions</a>.', ),
            'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
            'panel_priority'    => 106,
            'priority'          => 10,
            'section_title'     => __('Open Graph Protocol', 'semper-fi-lite'),
            'section_priority'  => 10,
            'selector'          => 'header#title-and-image .customizer-tite-image-3',
            'type'              => 'radio',
            'choices' => array(
                true             => 'Yes',
                false            => 'No')),


    'open_graph_protocol_fb_app_id' => array(
        'default_options'  => array(
            1                   => "fb:app_id",),
        'description'       => array(
            1                   => '<h2>Register</h2><p>In order for your app to access any of Facebooks products or APIs, you must first convert your Facebook account to a Developer Account and register your app using the App Dashboard. You can do this at <a href="https://developers.facebook.com/">developers.facebook.com</a>. Registration creates an App ID that lets Facebook know who you are, helps Facebook distinguish your app from other apps, and provides a way for you to supply any additional materials Facebook may need when you set up specific products or request access to sensitive APIs.</p><p>Once you register, click the <strong>Settings</strong> link on the left side and provide any additional information you may have about your app. Most of the fields are self-explanatory, but heres additional information about a few of the fields.</p> <h3>App ID</h3> <p>When you register, Facebook will generate a unique App ID for your app. You will use this a lot, since it must be included when making any calls to our APIs. All of Facebook SDKs provide a way for you easily set this so it will automatically included with any API calls.</p>', ),
        'label'             => __('Open Graph Protocol fb:app_id', 'semper-fi-lite'),
        'panel_title'       => __('Semper Fi &#8594; Customizer Options', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Open Graph Protocol', 'semper-fi-lite'),
        'section_priority'  => 11,
        'selector'          => 'header#title-and-image .customizer-tite-image-3',
        'type'              => 'text'),


);

return $semperfi_open_graph_protocol_customizer_options_array;
