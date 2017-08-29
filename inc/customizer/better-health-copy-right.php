<?php

$wp_customize->add_panel(
    'better_health_footer_option',
    array(
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Footer Option', 'better-health'),
    )
);


/**
 * Copyright Info Section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'better_health_copyright_info_section',
    array(
        'panel' => 'better_health_footer_option',
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Copyright Option', 'better-health'),
    )
);

/**
 * Field for Copyright
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'better_health_copyright',
    array(
        'default' => $default['better_health_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'better_health_copyright',
    array(
        'type' => 'text',
        'label' => esc_html__('Copyright', 'better-health'),
        'section' => 'better_health_copyright_info_section',
        'priority' => 8
    )
);


/**
 * Top Footer Contact Link Option
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'better_health_contact_link_info_section',
    array(
        'panel' => 'better_health_footer_option',
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Top Footer Contact Link Option', 'better-health'),
    )
);



$wp_customize->add_setting(
    'better_health_hide_top_footer_contact_link_section',
    array(
        'default' => $default['better_health_hide_top_footer_contact_link_section'],
        'sanitize_callback' => 'better_health_sanitize_select',
    )
);

$better_health_show_top_footer_contact_link_section_option = better_health_show_top_footer_contact_link_section_option();
$wp_customize->add_control(
    'better_health_hide_top_footer_contact_link_section',
    array(
        'type' => 'radio',
        'label' => esc_html__('Top Footer Contact Link Info Option', 'better-health'),
        'description' => esc_html__('Show/hide Top Footer Contact Link Info Section.', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'choices' => $better_health_show_top_footer_contact_link_section_option,
        'priority' => 4
    )
);


/**
         * Upload image control for section
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'better_health_contact_image',
                array(
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url_raw'
                )
        );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'better_health_contact_image',
                array(
                    'label'      => esc_html__( 'Contact Image', 'better-health' ),
                    'section'    => 'better_health_contact_link_info_section',
                    'priority' => 8
                )
            )
        );




$wp_customize->add_setting(
    'better_health_contact_link_button_text',
    array(
        'default' => $default['better_health_contact_link_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_contact_link_button_text',
    array(
        'type' => 'text',
        'label' => esc_html__('Button Text', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);

$wp_customize->add_setting(
    'better_health_contact_link_button_link',
    array(
        'default' => $default['better_health_contact_link_button_link'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'better_health_contact_link_button_link',
    array(
        'type' => 'url',
        'label' => esc_html__('Button Link', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);


$wp_customize->add_setting(
    'better_health_contact_link_address',
    array(
        'default' => $default['better_health_contact_link_address'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_contact_link_address',
    array(
        'type' => 'text',
        'label' => esc_html__('Address', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);

$wp_customize->add_setting(
    'better_health_contact_link_email',
    array(
        'default' => $default['better_health_contact_link_email'],
        'sanitize_callback' => 'sanitize_email',
    )
);

$wp_customize->add_control(
    'better_health_contact_link_email',
    array(
        'type' => 'email',
        'label' => esc_html__('Email', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);


$wp_customize->add_setting(
    'better_health_contact_link_phone_number',
    array(
        'default' => $default['better_health_contact_link_phone_number'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'better_health_contact_link_phone_number',
    array(
        'type' => 'text',
        'label' => esc_html__('Phone Number', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);




