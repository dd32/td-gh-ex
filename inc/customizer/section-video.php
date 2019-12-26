<?php 
global $wp_customize, $appdetail_defaults;
/*adding sections for category section in front page*/
$wp_customize->add_section( 'appdetail-video-section', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'title'          => __( 'Video Section', 'appdetail' ),
    'panel'=>'appdetail_panel'

) );
/* Video Image URL */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-video-background-image]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $appdetail_defaults['appdetail-video-background-image'],
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-video-background-image]', array(
            'label'     => __( 'Video Image URL', 'appdetail' ),
            'section'   => 'appdetail-video-section',
            'settings'  => 'appdetail_theme_options[appdetail-video-background-image]',
            'type'      => 'text',
            'priority'  => 10
    )
);

/* Video URL */
$wp_customize->add_setting( 'appdetail_theme_options[appdetail-video-url]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $appdetail_defaults['appdetail-video-url'],
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control('appdetail_theme_options[appdetail-video-url]', array(
            'label'     => __( 'Video URL', 'appdetail' ),
            'section'   => 'appdetail-video-section',
            'settings'  => 'appdetail_theme_options[appdetail-video-url]',
            'type'      => 'text',
            'priority'  => 10
    )
);