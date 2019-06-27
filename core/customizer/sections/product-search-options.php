<?php // Show product search section.
$wp_customize->add_section('section_product_search',
    array(
        'title' => esc_html__('Product Search Options', 'agency-ecommerce'),
        'priority' => 100,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);

// Setting show_top_search.
$wp_customize->add_setting('agency_ecommerce_theme_options[show_top_search]',
    array(
        'default' => $default['show_top_search'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[show_top_search]',
    array(
        'label' => esc_html__('Show Product Search (at Top Header)', 'agency-ecommerce'),
        'section' => 'section_product_search',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting search product text.
$wp_customize->add_setting('agency_ecommerce_theme_options[search_products_text]',
    array(
        'default' => $default['search_products_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[search_products_text]',
    array(
        'label' => esc_html__('Search Products Text', 'agency-ecommerce'),
        'section' => 'section_product_search',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'agency_ecommerce_is_top_product_search_active',
    )
);

// Setting select category text.
$wp_customize->add_setting('agency_ecommerce_theme_options[select_category_text]',
    array(
        'default' => $default['select_category_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[select_category_text]',
    array(
        'label' => esc_html__('Select Category Text', 'agency-ecommerce'),
        'section' => 'section_product_search',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'agency_ecommerce_is_top_product_search_active',
    )
);
?>