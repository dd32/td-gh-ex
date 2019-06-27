<?php
// Shop Section.
$wp_customize->add_section('section_shop',
    array(
        'title' => esc_html__('Shop Page Options', 'agency-ecommerce'),
        'priority' => 100,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);

// Setting shop_layout.
$wp_customize->add_setting('agency_ecommerce_theme_options[shop_layout]',
    array(
        'default' => $default['shop_layout'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[shop_layout]',
    array(
        'label' => esc_html__('Shop Sidebar', 'agency-ecommerce'),
        'section' => 'section_shop',
        'type' => 'radio',
        'priority' => 100,
        'choices' => array(
            'left-sidebar' => esc_html__('Left Sidebar', 'agency-ecommerce'),
            'right-sidebar' => esc_html__('Right Sidebar', 'agency-ecommerce'),
            'no-sidebar' => esc_html__('No Sidebar', 'agency-ecommerce'),
        ),
    )
);

// Setting product_per_page.
$wp_customize->add_setting('agency_ecommerce_theme_options[product_per_page]',
    array(
        'default' => $default['product_per_page'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_positive_integer',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[product_per_page]',
    array(
        'label' => esc_html__('Products Per Page', 'agency-ecommerce'),
        'description' => esc_html__('Total number of products shown per page', 'agency-ecommerce'),
        'section' => 'section_shop',
        'type' => 'number',
        'priority' => 100,
        'input_attrs' => array('min' => 4, 'max' => 20),
    )
);

// Setting product_number_per_row.
$wp_customize->add_setting('agency_ecommerce_theme_options[product_number]',
    array(
        'default' => $default['product_number'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_positive_integer',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[product_number]',
    array(
        'label' => esc_html__('Products Per Row', 'agency-ecommerce'),
        'description' => esc_html__('Number of products shown per row', 'agency-ecommerce'),
        'section' => 'section_shop',
        'type' => 'select',
        'priority' => 100,
        'choices' => array(
            '2' => esc_html__('2', 'agency-ecommerce'),
            '3' => esc_html__('3', 'agency-ecommerce'),
            '4' => esc_html__('4', 'agency-ecommerce'),
        ),
    )
);

// Setting hide_product_sorting.
$wp_customize->add_setting('agency_ecommerce_theme_options[hide_product_sorting]',
    array(
        'default' => $default['hide_product_sorting'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[hide_product_sorting]',
    array(
        'label' => esc_html__('Disable Product Sorting Option', 'agency-ecommerce'),
        'section' => 'section_shop',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting show_detail_icon.
$wp_customize->add_setting('agency_ecommerce_theme_options[show_detail_icon]',
    array(
        'default' => $default['show_detail_icon'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[show_detail_icon]',
    array(
        'label' => esc_html__('Enable View Detail Icon at Product Pages', 'agency-ecommerce'),
        'section' => 'section_shop',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting enable_gallery_zoom.
$wp_customize->add_setting('agency_ecommerce_theme_options[enable_gallery_zoom]',
    array(
        'default' => $default['enable_gallery_zoom'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[enable_gallery_zoom]',
    array(
        'label' => esc_html__('Enable Image Zoom at Product Detail Page', 'agency-ecommerce'),
        'section' => 'section_shop',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting disable_related_products.
$wp_customize->add_setting('agency_ecommerce_theme_options[disable_related_products]',
    array(
        'default' => $default['disable_related_products'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[disable_related_products]',
    array(
        'label' => esc_html__('Disable Related Products at Product Detail Page', 'agency-ecommerce'),
        'section' => 'section_shop',
        'type' => 'checkbox',
        'priority' => 100,
    )
);