<?php


// Header Section.
$wp_customize->add_section('section_bottom_header',
    array(
        'title' => esc_html__('Bottom Header Options', 'agency-ecommerce'),
        'priority' => 100,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);


// Setting show_mid_header.
$wp_customize->add_setting('agency_ecommerce_theme_options[show_bottom_header]',
    array(
        'default' => $default['show_bottom_header'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[show_bottom_header]',
    array(
        'label' => esc_html__('Show Bottom Header', 'agency-ecommerce'),
        'section' => 'section_bottom_header',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

//Logo Options Setting Starts
$wp_customize->add_setting('agency_ecommerce_theme_options[site_identity]',
    array(
        'default' => $default['site_identity'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select'
    )
);

$wp_customize->add_control('agency_ecommerce_theme_options[site_identity]',
    array(
        'type' => 'radio',
        'label' => esc_html__('Logo Options', 'agency-ecommerce'),
        'description' => esc_html__('This options works for bottom header section.', 'agency-ecommerce'),
        'section' => 'section_bottom_header',
        'choices' => array(
            'logo-only' => esc_html__('Logo Only', 'agency-ecommerce'),
            'title-text' => esc_html__('Title + Tagline', 'agency-ecommerce'),
            'logo-desc' => esc_html__('Logo + Tagline', 'agency-ecommerce'),
            'category-menu' => esc_html__('Category Menu', 'agency-ecommerce')
        ),
        'priority' => 101,

    )
);

// category_menu_max_height
$wp_customize->add_setting('agency_ecommerce_theme_options[category_menu_max_height]',
    array(
        'default' => $default['category_menu_max_height'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[category_menu_max_height]',
    array(
        'label' => esc_html__('Category Menu Max Height (px)', 'agency-ecommerce'),
        'description' => esc_html__('Maximum height for category menu. Default: 433 and 0 for auto height.)', 'agency-ecommerce'),
        'section' => 'section_bottom_header',
        'type' => 'number',
        'default' => 433,
        'priority' => 102,
    )
);