<?php
/*adding sections for header theme options panel*/
$wp_customize->add_section( 'acmeblog-header', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header', 'acmeblog' ),
    'description'    => __( 'Customize options header', 'acmeblog' ),
    'panel'  => 'acmeblog-options',
) );


/*header logo*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-header-logo]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-header-logo'],
    'sanitize_callback' => 'acmeblog_sanitize_image',
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'acmeblog_theme_options[acmeblog-header-logo]',
        array(
            'label'		=> __( 'Logo', 'acmeblog' ),
            'section'   => 'acmeblog-header',
            'settings'  => 'acmeblog_theme_options[acmeblog-header-logo]',
            'type'	  	=> 'image',
            'priority'  => 5,
        )
    )
);

/*header enable social*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-enable-social]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-enable-social'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-enable-social]', array(
    'label'		=> __( 'Enable social', 'acmeblog' ),
    'section'   => 'acmeblog-header',
    'settings'  => 'acmeblog_theme_options[acmeblog-enable-social]',
    'type'	  	=> 'checkbox',
    'priority'  => 10,
) );

/*header left social*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-left-social]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-left-social'],
    'sanitize_callback' => 'wp_kses_post',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-left-social]', array(
    'label'		=> __( 'Content left social', 'acmeblog' ),
    'section'   => 'acmeblog-header',
    'settings'  => 'acmeblog_theme_options[acmeblog-left-social]',
    'type'	  	=> 'textarea',
    'priority'  => 18,
) );

/*header facebook url*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-facebook-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-facebook-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-facebook-url]', array(
    'label'		=> __( 'Facebook url', 'acmeblog' ),
    'section'   => 'acmeblog-header',
    'settings'  => 'acmeblog_theme_options[acmeblog-facebook-url]',
    'type'	  	=> 'url',
    'priority'  => 20,
) );

/*header twitter url*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-twitter-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-twitter-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-twitter-url]', array(
    'label'		=> __( 'Twitter url', 'acmeblog' ),
    'section'   => 'acmeblog-header',
    'settings'  => 'acmeblog_theme_options[acmeblog-twitter-url]',
    'type'	  	=> 'url',
    'priority'  => 25,
) );

/*header youtube url*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-youtube-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-youtube-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-youtube-url]', array(
    'label'		=> __( 'Youtube url', 'acmeblog' ),
    'section'   => 'acmeblog-header',
    'settings'  => 'acmeblog_theme_options[acmeblog-youtube-url]',
    'type'	  	=> 'url',
    'priority'  => 25,
) );

/*header header ads*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-header-ads]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-header-ads'],
    'sanitize_callback' => 'wp_kses_post',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-header-ads]', array(
    'label'		=> __( 'Header advertisement', 'acmeblog' ),
    'section'   => 'acmeblog-header',
    'settings'  => 'acmeblog_theme_options[acmeblog-header-ads]',
    'type'	  	=> 'textarea',
    'priority'  => 35,
    'description' => __( 'Use html for header advertisement. If you are using images use size of 290*90', 'acmeblog' ),
) );

/*header show home icon*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-show-home-icon]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-show-home-icon'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-show-home-icon]', array(
    'label'		=> __( 'Show home icon on menu', 'acmeblog' ),
    'section'   => 'acmeblog-header',
    'settings'  => 'acmeblog_theme_options[acmeblog-show-home-icon]',
    'type'	  	=> 'checkbox',
    'priority'  => 40,
) );


/*header show search*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-show-search]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-show-search'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-show-search]', array(
    'label'		=> __( 'Show search on menu', 'acmeblog' ),
    'section'   => 'acmeblog-header',
    'settings'  => 'acmeblog_theme_options[acmeblog-show-search]',
    'type'	  	=> 'checkbox',
    'priority'  => 45,
) );

/*header menu alignment*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-menu-alignment]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-menu-alignment'],
    'sanitize_callback' => 'acmeblog_sanitize_select',
) );
$choices = acmeblog_menu_alignment();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-menu-alignment]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Menu alignment', 'acmeblog' ),
    'section'   => 'acmeblog-header',
    'settings'  => 'acmeblog_theme_options[acmeblog-menu-alignment]',
    'type'	  	=> 'select',
    'priority'  => 50,
) );
