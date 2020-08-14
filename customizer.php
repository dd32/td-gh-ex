<?php
/**
* Customizer settings for the theme
*
*/
add_action('customize_register','arrival_store_customizer_settings',11);
if( ! function_exists('arrival_store_customizer_settings')):

	function arrival_store_customizer_settings($wp_customize){

		$prefix = 'arrival_store';
		$default = arrival_store_get_default_theme_options();
		
		require get_stylesheet_directory() . '/multicheckbox.php';

		$wp_customize->remove_section( 'arrival_main_header_options_panel' );  //Modify parent theme section


		$wp_customize->add_section( $prefix.'_main_header_options_panel', array(
			'title'		=> esc_html__( 'Header Options', 'arrival-store' ),
			'panel'		=> 'arrival_header_options_panel',
			'priority'	=> 5
		)
		);


		$wp_customize->add_setting( 'arrival_top_header_txt', array(
	        'default'             => $default['arrival_top_header_txt'],
	        'sanitize_callback'   => 'sanitize_text_field',
	        'transport'           => 'postMessage'
        
      ) );

		$wp_customize->add_control( 'arrival_top_header_txt', array(
	        'label'          => esc_html__( 'Info Text', 'arrival-store' ),
	        'description' 	 => esc_html__('Text for top header left','arrival-store'),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );


		$wp_customize->add_setting( $prefix.'_middle_header_separator', array(
        	'sanitize_callback'   => 'sanitize_text_field',        
     	 ) );

		$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_middle_header_separator', array(
	        'label'         => esc_html__( 'Middle Header options', 'arrival-store' ),
	        'section'       => $prefix.'_main_header_options_panel',
	      ) ) );


		$wp_customize->add_setting( $prefix.'_middle_header_phone', array(
	        'default'             => $default[$prefix.'_middle_header_phone'],
	        'sanitize_callback'   => 'sanitize_text_field',
        
      ) );

		$wp_customize->add_control( $prefix.'_middle_header_phone', array(
	        'label'          => esc_html__( 'Phone Number', 'arrival-store' ),
	        'description' 	 => esc_html__('Enter phone number for middle header','arrival-store'),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );

		$wp_customize->add_setting( $prefix.'_middle_header_phone_text', array(
	        'default'             => $default[$prefix.'_middle_header_phone_text'],
	        'sanitize_callback'   => 'sanitize_text_field',
        
      ) );

		$wp_customize->add_control( $prefix.'_middle_header_phone_text', array(
	        'label'          => esc_html__( 'Phone Title', 'arrival-store' ),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );

		//product search translations
		$wp_customize->add_setting( $prefix.'_main_header_search_separator', array(
        	'sanitize_callback'   => 'sanitize_text_field',        
     	 ) );

		$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_main_header_search_separator', array(
	        'label'         => esc_html__( 'Product Search Translations', 'arrival-store' ),
	        'section'       => $prefix.'_main_header_options_panel',
	      ) ) );


		$wp_customize->add_setting( $prefix.'_header_search_category_text', array(
	        'default'             => $default[$prefix.'_header_search_category_text'],
	        'sanitize_callback'   => 'sanitize_text_field',
        
      ) );

		$wp_customize->add_control( $prefix.'_header_search_category_text', array(
	        'label'          => esc_html__( 'Categories Title', 'arrival-store' ),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );

		$wp_customize->add_setting( $prefix.'_header_search_placeholder', array(
	        'default'             => $default[$prefix.'_header_search_placeholder'],
	        'sanitize_callback'   => 'sanitize_text_field',
        
      ) );

		$wp_customize->add_control( $prefix.'_header_search_placeholder', array(
	        'label'          => esc_html__( 'Search Bpx Placeholder', 'arrival-store' ),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );


		$wp_customize->add_setting( $prefix.'_header_search_submit_label', array(
	        'default'             => $default[$prefix.'_header_search_submit_label'],
	        'sanitize_callback'   => 'sanitize_text_field',
        
      ) );

		$wp_customize->add_control( $prefix.'_header_search_submit_label', array(
	        'label'          => esc_html__( 'Search Submit Button Label', 'arrival-store' ),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );




		//header category display options
		if( class_exists('WooCommerce')){

		$wp_customize->add_setting( $prefix.'_main_header_cat_separator', array(
        	'sanitize_callback'   => 'sanitize_text_field',        
     	 ) );

		$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_main_header_cat_separator', array(
	        'label'         => esc_html__( 'Product Categories', 'arrival-store' ),
	        'section'       => $prefix.'_main_header_options_panel',
	      ) ) );


		$wp_customize->add_setting( $prefix.'_enable_product_categories', array(
	        'default'             => $default[$prefix.'_enable_product_categories'],
	        'sanitize_callback'   => 'arrival_sanitize_switch',
        
      	) );

		$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_enable_product_categories', array(
		        'label'         => esc_html__( 'Enable Product Categories', 'arrival-store' ),
		        'section'       => $prefix.'_main_header_options_panel',
		        'choices'       => array(
		          'yes'        => esc_html__( 'Yes', 'arrival-store' ),
		          'no'        => esc_html__( 'No', 'arrival-store' ),
		        )
		      ) ) );

		$wp_customize->add_setting( $prefix.'_header_category_text', array(
	        'default'             => $default[$prefix.'_header_category_text'],
	        'sanitize_callback'   => 'sanitize_text_field',
        
      ) );

		$wp_customize->add_control( $prefix.'_header_category_text', array(
	        'label'          => esc_html__( 'Phone Title', 'arrival-store' ),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );

		//product categories
		$wp_customize->add_setting( $prefix.'_header_categories', array(
			'sanitize_callback' => 'arrival_store_sanitize_checkbox'
		));

		$wp_customize->add_control( new Arrival_Store_Control_Checkbox_Multiple( $wp_customize,
				$prefix.'_header_categories',
				array(
					'section'       => $prefix.'_main_header_options_panel',
					'label'   		=> esc_html__( 'Product Categories', 'arrival-store' ),
					'description' 	=> esc_html__('Select categories to display on header','arrival-store'),
					'choices' 		=> arrival_store_product_catogory(),
				)
			)
		);

		}

		/**
		* Additional header settings
		* @since 1.0.7
		*/
		$wp_customize->add_setting( $prefix.'_additional_settings_separator', array(
        	'sanitize_callback'   => 'sanitize_text_field',        
     	 ) );

		$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_additional_settings_separator', array(
	        'label'         => esc_html__( 'Additional Options', 'arrival-store' ),
	        'section'       => $prefix.'_main_header_options_panel',
	      ) ) );

		//enable or disable top header
		$wp_customize->add_setting( 'arrival_top_header_enable', array(
	        'default'             => $default['arrival_top_header_enable'],
	        'sanitize_callback'   => 'arrival_sanitize_enable_disable',
        
      	) );

		$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize,'arrival_top_header_enable', array(
		        'label'         => esc_html__( 'Enable Top Header', 'arrival-store' ),
		        'section'       => $prefix.'_main_header_options_panel',
		        'choices'       => array(
		          'on'        => esc_html__( 'Yes', 'arrival-store' ),
		          'off'        => esc_html__( 'No', 'arrival-store' ),
		        )
		      ) ) );

		//my cart translation
		$wp_customize->add_setting( $prefix.'_header_cart_text', array(
	        'default'             => $default[$prefix.'_header_cart_text'],
	        'sanitize_callback'   => 'sanitize_text_field',
        
      	) );

		$wp_customize->add_control( $prefix.'_header_cart_text', array(
	        'label'          => esc_html__( 'Cart Translation Text', 'arrival-store' ),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );

		//compare translation
		$wp_customize->add_setting( $prefix.'_header_compare_text', array(
	        'default'             => $default[$prefix.'_header_compare_text'],
	        'sanitize_callback'   => 'sanitize_text_field',
        
      	) );

		$wp_customize->add_control( $prefix.'_header_compare_text', array(
	        'label'          => esc_html__( 'Compare Translation Text', 'arrival-store' ),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );

		//wishlist translation
		$wp_customize->add_setting( $prefix.'_header_wishlist_text', array(
	        'default'             => $default[$prefix.'_header_wishlist_text'],
	        'sanitize_callback'   => 'sanitize_text_field',
        
      	) );

		$wp_customize->add_control( $prefix.'_header_wishlist_text', array(
	        'label'          => esc_html__( 'Wishlist Translation Text', 'arrival-store' ),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );



		//header styles
		$wp_customize->add_setting( $prefix.'_style_header_separator', array(
        	'sanitize_callback'   => 'sanitize_text_field',        
     	 ) );

		$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_style_header_separator', array(
	        'label'         => esc_html__( 'Header Styles', 'arrival-store' ),
	        'section'       => $prefix.'_main_header_options_panel',
	      ) ) );


		$wp_customize->add_setting($prefix.'_top_header_bg', array(
	        'default'           => $default[$prefix.'_top_header_bg'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_top_header_bg', array(
		            'label'         => esc_html__( 'Top Header Background', 'arrival-store' ),
		            'section'       => $prefix.'_main_header_options_panel',
		)));


		$wp_customize->add_setting($prefix.'_top_header_text_color', array(
	        'default'           => $default[$prefix.'_top_header_text_color'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_top_header_text_color', array(
		            'label'         => esc_html__( 'Top Header Text', 'arrival-store' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));



		$wp_customize->add_setting($prefix.'_middle_header_bg', array(
	        'default'           => $default[$prefix.'_middle_header_bg'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_middle_header_bg', array(
		            'label'         => esc_html__( 'Middle Header Background', 'arrival-store' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));

		$wp_customize->add_setting($prefix.'_middle_header_text', array(
	        'default'           => $default[$prefix.'_middle_header_text'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_middle_header_text', array(
		            'label'         => esc_html__( 'Middle Header Text', 'arrival-store' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));


		$wp_customize->add_setting($prefix.'_main_header_bg', array(
	        'default'           => $default[$prefix.'_main_header_bg'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_main_header_bg', array(
		            'label'         => esc_html__( 'Main Header Background', 'arrival-store' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));

		$wp_customize->add_setting($prefix.'_main_header_text', array(
	        'default'           => $default[$prefix.'_main_header_text'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_main_header_text', array(
		            'label'         => esc_html__( 'Main Header Text', 'arrival-store' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));



		
	}

endif;