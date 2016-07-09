<?php

/*--------------------------------------------------------------
## Bellini Pro Description
--------------------------------------------------------------*/

$bellini_frontpage_block_pro_conversion 				= esc_html__( '3 more block layouts & ability to set block section background image.', 'bellini' );
$bellini_frontpage_woo_category_pro_conversion 			= esc_html__( '3 more category layouts & section background image.', 'bellini');
$bellini_frontpage_woo_product_pro_conversion 			= esc_html__( '3 more product layouts & section background image.', 'bellini');
$bellini_frontpage_woo_featured_product_pro_conversion 	= esc_html__( '2 more featured product layouts & section background image.', 'bellini');
$bellini_frontpage_posts_pro_conversion 				= esc_html__( '3 more blog posts layouts, display post by category & section background image.', 'bellini');
$bellini_header_section_pro_conversion 					= esc_html__( '6 more header section layout, Fixed Header, Text field option in Other header Items.', 'bellini');
$bellini_post_section_pro_conversion 					= esc_html__( '3 more Blog posts & 3 more single post layouts.', 'bellini');
$bellini_footer_section_pro_conversion 					= esc_html__( '3 more footer layouts.', 'bellini');
$bellini_integration_pro_conversion 					= esc_html__( 'Google Analytics, Hotjar, Facebook Conversion Pixel, Heap Analytics, SumoMe and many more integrations.', 'bellini' );
$bellini_woocommerce_pro_conversion 					= esc_html__( '3 More Shop page & 3 More Single Product Layouts.', 'bellini');


/*--------------------------------------------------------------
## Frontpage Feature Blocks
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_front_block_pro_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);
			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_front_block_pro_conversion',
				array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_frontpage_block_pro_conversion,
					'section' => 'bellini_frontpage_section_blocks',
					'settings'    => 'bellini_front_block_pro_conversion',
					'priority'   => 100,
			)) );

/*--------------------------------------------------------------
## Frontpage WooCommerce Category
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_front_woo_cat_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);
			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_front_woo_cat_conversion',
				array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_frontpage_woo_category_pro_conversion,
					'section' => 'bellini_frontpage_section_category',
					'settings'    => 'bellini_front_woo_cat_conversion',
					'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
					'priority'   => 100,
			)) );

/*--------------------------------------------------------------
## Frontpage WooCommerce Products
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_front_woo_product_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_front_woo_product_conversion',
				array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_frontpage_woo_product_pro_conversion,
					'section' => 'bellini_frontpage_section_product',
					'settings'    => 'bellini_front_woo_product_conversion',
					'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
					'priority'   => 100,
			)) );

/*--------------------------------------------------------------
## Frontpage WooCommerce Featured Products
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_front_woo_featured_product_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_front_woo_featured_product_conversion',
				array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_frontpage_woo_featured_product_pro_conversion,
					'section' => 'bellini_frontpage_section_featured',
					'settings'    => 'bellini_front_woo_featured_product_conversion',
					'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
					'priority'   => 100,
			)) );
/*--------------------------------------------------------------
## Frontpage Blog Posts
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_front_blog_post_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_front_blog_post_conversion',
				array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_frontpage_posts_pro_conversion,
					'section' => 'bellini_frontpage_section_blog',
					'settings'    => 'bellini_front_blog_post_conversion',
					'priority'   => 100,
			)) );

/*--------------------------------------------------------------
## Post Layout
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_layout_post_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_layout_post_conversion',
				array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_post_section_pro_conversion,
					'section' => 'bellini_post_layout_settings',
					'settings'    => 'bellini_layout_post_conversion',
					'priority'   => 100,
			)) );

/*--------------------------------------------------------------
## Header Layout
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_header_section_pro_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_header_section_pro_conversion', array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_header_section_pro_conversion,
					'section' => 'bellini_header_section_layout',
					'settings'    => 'bellini_header_section_pro_conversion',
					'priority'   => 100,
			)) );

/*--------------------------------------------------------------
## Footer Layout
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_layout_footer_pro_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_layout_footer_pro_conversion', array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_footer_section_pro_conversion,
					'section' => 'bellini_layout_settings_footer',
					'settings'    => 'bellini_layout_footer_pro_conversion',
					'priority'   => 100,
			)) );

/*--------------------------------------------------------------
## Third Party Integrations
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_integration_pro_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_integration_pro_conversion', array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_integration_pro_conversion,
					'section' => 'bellini_custom_css_section',
					'settings'    => 'bellini_integration_pro_conversion',
					'priority'   => 100,
			)) );

/*--------------------------------------------------------------
## Third Party Integrations: WooCommerce
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini_woocommerce_pro_conversion',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_Pro_Conversion ( $wp_customize, 'bellini_woocommerce_pro_conversion', array(
					'label' => esc_html__('You are missing out on','bellini'),
					'description' => $bellini_woocommerce_pro_conversion,
					'section' => 'bellini_woocommerce_integration',
					'settings'    => 'bellini_woocommerce_pro_conversion',
					'priority'   => 100,
			)) );