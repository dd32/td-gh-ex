<?php

/*--------------------------------------------------------------
## Front Page Template
--------------------------------------------------------------*/

/*--------------------------------------------------------------
## Customizer Section: Frontpage
--------------------------------------------------------------*/

	// Front Page Section Category
	$wp_customize->add_section('bellini_frontpage_section_slider',array(
			'title' => __( 'Frontpage Slider', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 1,
			'panel' => 'bellini_frontpage_panel'
		)
	);

	// Front Page Feature Blocks
	$wp_customize->add_section('bellini_frontpage_section_blocks',array(
			'title' => __( 'Feature Blocks', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 2,
			'panel' => 'bellini_frontpage_panel'
		)
	);

	// Front Page Section Category
	$wp_customize->add_section('bellini_frontpage_section_category',array(
			'title' => __( 'Woo Product Category', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 2,
			'panel' => 'bellini_frontpage_panel'
		)
	);

	// Front Page Section Category
	$wp_customize->add_section('bellini_frontpage_section_product',array(
			'title' => __( 'Woo New Products', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 3,
			'panel' => 'bellini_frontpage_panel'
		)
	);

	// Front Page Section Featured Product
	$wp_customize->add_section('bellini_frontpage_section_featured',array(
			'title' => __( 'Woo Featured Product', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 4,
			'panel' => 'bellini_frontpage_panel'
		)
	);


	// Homepage Blog Posts
	$wp_customize->add_section('bellini_frontpage_section_blog',array(
			'title' => __( 'Your Blog Posts', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 5,
			'panel' => 'bellini_frontpage_panel'
		)
	);


/*--------------------------------------------------------------
## Section: Static Slider
--------------------------------------------------------------*/

	//Hero Image
	$wp_customize->add_setting('bellini_static_slider_image', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_static_slider_image',array(
               'label'      => __( 'Hero Image', 'bellini' ),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini_static_slider_image',
			   )
			));


	//Hero Image Headline
	$wp_customize->add_setting('bellini_static_slider_title', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_static_slider_title',array(
				'type' 		=>'text',
               'label'      => __( 'Headline', 'bellini' ),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini_static_slider_title',
			));

	//Hero Image Content
	$wp_customize->add_setting('bellini_static_slider_content', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_textarea',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_static_slider_content',array(
				'type' 		=>'textarea',
               'label'      => __( 'Content', 'bellini' ),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini_static_slider_content',
			));

	//Button Text
	$wp_customize->add_setting('bellini_static_slider_button_text-1', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_static_slider_button_text-1',array(
				'type' 		=>'text',
               'label'      => __( 'Button Text', 'bellini' ),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini_static_slider_button_text-1',
			));

	//Button URL
	$wp_customize->add_setting('bellini_static_slider_button_url-1', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_static_slider_button_url-1',array(
				'type' 		=>'url',
               'label'      => __( 'Button URl/Link', 'bellini' ),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini_static_slider_button_url-1',
			));


	//Button Text
	$wp_customize->add_setting('bellini_static_slider_button_text-2', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_static_slider_button_text-2',array(
				'type' 		=>'text',
               'label'      => __( 'Button Text', 'bellini' ),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini_static_slider_button_text-2',
			));

	//Button URL
	$wp_customize->add_setting('bellini_static_slider_button_url-2', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_static_slider_button_url-2',array(
				'type' 		=>'url',
               'label'      => __( 'Button URl/Link', 'bellini' ),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini_static_slider_button_url-2',
			));


	// Button 1 Background Color
	$wp_customize->add_setting( 'bellini_static_slider_button_background_one' ,
		array(
	    'default' => '#00B0FF',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_static_slider_button_background_one',
			array(
				'label'      => __( 'Button Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_slider',
				'settings'   => 'bellini_static_slider_button_background_one',
			    'priority'   => 7
			)
		));

	// Button 2 Background Color
	$wp_customize->add_setting( 'bellini_static_slider_button_background_two' ,
		array(
	    'default' => '#00B0FF',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_static_slider_button_background_two',
			array(
				'label'      => __( 'Button 2 Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_slider',
				'settings'   => 'bellini_static_slider_button_background_two',
			    'priority'   => 7
			)
		));


	// Header Background Color -- Settings
	$wp_customize->add_setting( 'slider_background_color_mobile' ,
		array(
	    'default' => '#eceef1',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'slider_background_color_mobile',
			array(
				'label'      => __( 'Mobile Slider Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_slider',
				'settings'   => 'slider_background_color_mobile',
			    'priority'   => 3
			)
		));


	// Header Background Color -- Settings
	$wp_customize->add_setting( 'slider_text_color_mobile' ,
		array(
	    'default' => '#eceef1',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'slider_text_color_mobile',
			array(
				'label'      => __( 'Mobile Slider Text Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_slider',
				'settings'   => 'slider_text_color_mobile',
			    'priority'   => 3
			)
		));


/*--------------------------------------------------------------
## Section: WooCommerce Category
--------------------------------------------------------------*/

	//Category Title
	$wp_customize->add_setting('bellini_woo_category_title', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_woo_category_title',array(
				'type' 		=>'text',
               'label'      => __( 'Category Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_category',
               'settings'   => 'bellini_woo_category_title',
			));

	//Category Description
	$wp_customize->add_setting('bellini_woo_category_description', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_textarea',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_woo_category_description',array(
				'type' 		=>'textarea',
               'label'      => __( 'Category Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_category',
               'settings'   => 'bellini_woo_category_description',
			));

	// Category Background Color -- Settings
	$wp_customize->add_setting( 'woo_category_background_color' ,
		array(
	    'default' => '#FFEB3B',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'woo_category_background_color',
			array(
				'label'      => __( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_category',
				'settings'   => 'woo_category_background_color',
			    'priority'   => 6
			)
		));

	//Category Background Image
	$wp_customize->add_setting('woo_category_background_image', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'woo_category_background_image',array(
               'label'      => __( 'Background Image of Category Section', 'bellini' ),
               'section'    => 'bellini_frontpage_section_category',
               'settings'   => 'woo_category_background_image',
			   )
			));

/*--------------------------------------------------------------
## Section: WooCommerce Products
--------------------------------------------------------------*/

	//Product Title
	$wp_customize->add_setting('bellini_woo_product_title', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_woo_product_title',array(
				'type' 		=>'text',
               'label'      => __( 'Category Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_product',
               'settings'   => 'bellini_woo_product_title',
			));

	//Product Description
	$wp_customize->add_setting('bellini_woo_product_description', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_textarea',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_woo_product_description',array(
				'type' 		=>'textarea',
               'label'      => __( 'Category Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_product',
               'settings'   => 'bellini_woo_product_description',
			));

	// Product Background Color -- Settings
	$wp_customize->add_setting( 'woo_product_background_color' ,
		array(
	    'default' => '#eceef1',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'woo_product_background_color',
			array(
				'label'      => __( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_product',
				'settings'   => 'woo_product_background_color',
			    'priority'   => 6
			)
		));

	//Product Background Image
	$wp_customize->add_setting('woo_product_background_image', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'woo_product_background_image',array(
               'label'      => __( 'Background Image of Product Section', 'bellini' ),
               'section'    => 'bellini_frontpage_section_product',
               'settings'   => 'woo_product_background_image',
			   )
			));


	//Button Text
	$wp_customize->add_setting('woo_product_button_text', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('woo_product_button_text',array(
				'type' 		=>'text',
               'label'      => __( 'Button Text', 'bellini' ),
               'section'    => 'bellini_frontpage_section_product',
               'settings'   => 'woo_product_button_text',
			));

	//Button URL
	$wp_customize->add_setting('woo_product_button_url', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('woo_product_button_url',array(
				'type' 		=>'url',
               'label'      => __( 'Button URl/Link', 'bellini' ),
               'section'    => 'bellini_frontpage_section_product',
               'settings'   => 'woo_product_button_url',
			));

/*--------------------------------------------------------------
## Section: WooCommerce Featured Products
--------------------------------------------------------------*/

	//Product Title
	$wp_customize->add_setting('woo_featured_product_title', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('woo_featured_product_title',array(
				'type' 		=>'text',
               'label'      => __( 'Category Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_featured',
               'settings'   => 'woo_featured_product_title',
			));

	//Product Description
	$wp_customize->add_setting('woo_featured_product_description', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_textarea',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('woo_featured_product_description',array(
				'type' 		=>'textarea',
               'label'      => __( 'Category Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_featured',
               'settings'   => 'woo_featured_product_description',
			));

	// Product Background Color -- Settings
	$wp_customize->add_setting( 'woo_featured_product_background_color' ,
		array(
	    'default' => '#eceef1',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'woo_featured_product_background_color',
			array(
				'label'      => __( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_featured',
				'settings'   => 'woo_featured_product_background_color',
			    'priority'   => 6
			)
		));

	//Product Background Image
	$wp_customize->add_setting('woo_featured_product_background_image', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'woo_featured_product_background_image',array(
               'label'      => __( 'Background Image of Product Section', 'bellini' ),
               'section'    => 'bellini_frontpage_section_featured',
               'settings'   => 'woo_featured_product_background_image',
			   )
			));

/*--------------------------------------------------------------
## Section: Homepage Blog Posts
--------------------------------------------------------------*/

	//Blog Title
	$wp_customize->add_setting('bellini_home_blogposts_title', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_home_blogposts_title',array(
				'type' 		=>'text',
               'label'      => __( 'Section Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blog',
               'settings'   => 'bellini_home_blogposts_title',
			));

	//Blog Description
	$wp_customize->add_setting('bellini_home_blogposts_description', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_textarea',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_home_blogposts_description',array(
				'type' 		=>'textarea',
               'label'      => __( 'Section Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blog',
               'settings'   => 'bellini_home_blogposts_description',
			));

	// Blog Section background Color
	$wp_customize->add_setting( 'bellini_blogposts_background_color' ,
		array(
	    'default' => '#eceef1',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_blogposts_background_color',
			array(
				'label'      => __( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_blog',
				'settings'   => 'bellini_blogposts_background_color',
			    'priority'   => 6
			)
		));

	//Blog Section background Image
	$wp_customize->add_setting('bellini_blogposts_background_image', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_blogposts_background_image',array(
               'label'      => __( 'Background Image of Blog Section', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blog',
               'settings'   => 'bellini_blogposts_background_image',
			   )
			));


	//Button Text
	$wp_customize->add_setting('bellini_home_blogposts_button_text', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_home_blogposts_button_text',array(
				'type' 		=>'text',
               'label'      => __( 'Button Text', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blog',
               'settings'   => 'bellini_home_blogposts_button_text',
			));

	//Button URL
	$wp_customize->add_setting('bellini_home_blogposts_button_url', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_home_blogposts_button_url',array(
				'type' 		=>'url',
               'label'      => __( 'Button URl/Link', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blog',
               'settings'   => 'bellini_home_blogposts_button_url',
			));


/*--------------------------------------------------------------
## Section: Feature Blocks
--------------------------------------------------------------*/

	//Blocks Section Title
	$wp_customize->add_setting('bellini_feature_blocks_title', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_feature_blocks_title',array(
				'type' 		=>'text',
               'label'      => __( 'Section Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_blocks_title',
			));

	//Block 1 Image
	$wp_customize->add_setting('bellini_feature_block_image_one', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_feature_block_image_one',array(
               'label'      => __( 'Hero Image', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_block_image_one',
			   )
			));


	//Block 1 Section Title
	$wp_customize->add_setting('bellini_feature_block_title_one', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_feature_block_title_one',array(
				'type' 		=>'text',
               'label'      => __( 'Block 1 Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_block_title_one',
			));

	//Block 1 Content
	$wp_customize->add_setting('bellini_feature_block_content_one', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_textarea',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_feature_block_content_one',array(
				'type' 		=>'textarea',
               'label'      => __( 'Block 1 Feature Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_block_content_one',
			));


	//Block 2 Image
	$wp_customize->add_setting('bellini_feature_block_image_two', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_feature_block_image_two',array(
               'label'      => __( 'Hero Image', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_block_image_two',
			   )
			));

	//Block 2 Section Title
	$wp_customize->add_setting('bellini_feature_block_title_two', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_feature_block_title_two',array(
				'type' 		=>'text',
               'label'      => __( 'Block 2 Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_block_title_two',
			));

	//Block 2 Content
	$wp_customize->add_setting('bellini_feature_block_content_two', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_textarea',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_feature_block_content_two',array(
				'type' 		=>'textarea',
               'label'      => __( 'Block 2 Feature Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_block_content_two',
			));

	//Block 3 Image
	$wp_customize->add_setting('bellini_feature_block_image_three', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_feature_block_image_three',array(
               'label'      => __( 'Hero Image', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_block_image_three',
			   )
			));


	//Block 3 Section Title
	$wp_customize->add_setting('bellini_feature_block_title_three', array(
		'type' => 'theme_mod',
		'default'         => 'Block 3',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_feature_block_title_three',array(
				'type' 		=>'text',
               'label'      => __( 'Block 3 Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_block_title_three',
			));

	//Block 3 Content
	$wp_customize->add_setting('bellini_feature_block_content_three', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_textarea',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_feature_block_content_three',array(
				'type' 		=>'textarea',
               'label'      => __( 'Block 3 Feature Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini_feature_block_content_three',
			));


/*--------------------------------------------------------------
## Company Logo
--------------------------------------------------------------*/

	//Company Logo Image
	$wp_customize->add_setting('bellini_header_logo', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_header_logo',array(
               'label'      => __( 'Hero Image', 'bellini' ),
               'section'    => 'title_tagline',
               'settings'   => 'bellini_header_logo',
			   )
			));

?>