<?php
/**
 * Options.
 *
 * @package Agency_Ecommerce
 */

$default = agency_ecommerce_get_default_theme_options();

// Load custom controls
require_once trailingslashit( get_template_directory() ) . '/core/customizer/controls/custom-controls.php';

// Setting site primary color.
$wp_customize->add_setting( 'theme_options[primary_color]',
	array(
		'default'           => $default['primary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'theme_options[primary_color]',
		array(
			'label'       => esc_html__( 'Primary Color', 'agency-ecommerce' ),
			'description' => esc_html__( 'Applied to main color of site.', 'agency-ecommerce' ),
			'section'     => 'colors',	
		)
	)
);

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'agency-ecommerce' ),
		'priority'   => 100,
	)
);

// Load header options.
require_once trailingslashit( get_template_directory() ) . '/core/customizer/options/header.php';

// Load blog options.
require_once trailingslashit( get_template_directory() ) . '/core/customizer/options/blog.php';

// Load breadcrumb options.
require_once trailingslashit( get_template_directory() ) . '/core/customizer/options/breadcrumb.php';

// Load shop page options if woocommerce is active.
if( class_exists( 'WooCommerce' ) ){
	require_once trailingslashit( get_template_directory() ) . '/core/customizer/options/shop.php';
}

// Load footer options.
require_once trailingslashit( get_template_directory() ) . '/core/customizer/options/footer.php';

// Load slider options.
require_once trailingslashit( get_template_directory() ) . '/core/customizer/options/slider.php';