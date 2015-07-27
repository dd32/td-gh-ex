<?php

function ad_mag_lite_init_options($options){
    $options['sections'][] = array(
        'id'    => 'ad_mag_opt_general',
        'title' => __('General Settings', 'ad_mag_lite'));

    $options['settings'][] = array(
        'settings'    => 'logo',
        'label'       => __('Logo', 'ad_mag_lite'),
        'description' => __('Upload your logo image.', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'image',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'favicon_icon',
        'label'       => __('Favicon icon', 'ad_mag_lite'),
        'description' => __('Upload your favicon image.', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'image',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'apple_icon',
        'label'       => __('Apple icon', 'ad_mag_lite'),
        'description' => __('Upload your apple icon image.', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'image',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'social_facebook',
        'label'       => __('Socials', 'ad_mag_lite'),
        'description' => __('Facebook', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'text',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'social_twitter',
        'label'       => '',
        'description' => __('Twitter', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'text',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'social_google_plus',
        'label'       => '',
        'description' => __('Google +', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'text',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'social_linkedin',
        'label'       => '',
        'description' => __('Linkedin', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'text',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'social_tumblr',
        'label'       => '',
        'description' => __('Tumblr', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'text',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'social_pinterest',
        'label'       => '',
        'description' => __('Pinterest', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'text',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'social_rss',
        'label'       => '',
        'description' => __('RSS (enter HIDE if want to hide)', 'ad_mag_lite'),
        'default'     => '#',
        'type'        => 'text',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'copyright',
        'label'       => __('Copyright', 'ad_mag_lite'),
        'description' => __('Your copyright information on footer.', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'textarea',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings' => 'blog-layout',
        'label'    => __('Blog layout', 'ad_mag_lite'),        
        'default'  => '1',
        'type'     => 'select',
        'choices'  => array(
            '1' => __('Blog-1', 'ad_mag_lite'),
            '2' => __('Blog-2', 'ad_mag_lite'),
            '3' => __('Blog-3', 'ad_mag_lite'),
            '4' => __('Blog-4', 'ad_mag_lite')
            ),
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh'); 

    $options['settings'][] = array(
        'settings'    => 'custom_css',
        'label'       => __('Custom css', 'ad_mag_lite'),
        'description' => __('Your custom css', 'ad_mag_lite'),
        'default'     => '',
        'type'        => 'textarea',
        'section'     => 'ad_mag_opt_general',
        'transport'   => 'refresh');

    return $options;
}