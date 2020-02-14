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
	        'label'          => esc_html__( 'Info Text', 'arrival' ),
	        'description' 	 => esc_html__('Text for top header left','arrival'),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );


		$wp_customize->add_setting( $prefix.'_middle_header_separator', array(
        	'sanitize_callback'   => 'sanitize_text_field',        
     	 ) );

		$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_middle_header_separator', array(
	        'label'         => esc_html__( 'Middle Header options', 'arrival' ),
	        'section'       => $prefix.'_main_header_options_panel',
	      ) ) );


		$wp_customize->add_setting( $prefix.'_middle_header_phone', array(
	        'default'             => $default[$prefix.'_middle_header_phone'],
	        'sanitize_callback'   => 'sanitize_text_field',
	        'transport'           => 'postMessage'
        
      ) );

		$wp_customize->add_control( $prefix.'_middle_header_phone', array(
	        'label'          => esc_html__( 'Phone Number', 'arrival' ),
	        'description' 	 => esc_html__('Enter phone number for middle header','arrival'),
	        'section'        => $prefix.'_main_header_options_panel',
	        'type'			 => 'text'
	        
	      ) );

		//header styles
		$wp_customize->add_setting( $prefix.'_style_header_separator', array(
        	'sanitize_callback'   => 'sanitize_text_field',        
     	 ) );

		$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_style_header_separator', array(
	        'label'         => esc_html__( 'Header Styles', 'arrival' ),
	        'section'       => $prefix.'_main_header_options_panel',
	      ) ) );


		$wp_customize->add_setting($prefix.'_top_header_bg', array(
	        'default'           => $default[$prefix.'_top_header_bg'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_top_header_bg', array(
		            'label'         => esc_html__( 'Top Header Background', 'arrival' ),
		            'section'       => $prefix.'_main_header_options_panel',
		)));


		$wp_customize->add_setting($prefix.'_top_header_text_color', array(
	        'default'           => $default[$prefix.'_top_header_text_color'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_top_header_text_color', array(
		            'label'         => esc_html__( 'Top Header Text', 'arrival' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));



		$wp_customize->add_setting($prefix.'_middle_header_bg', array(
	        'default'           => $default[$prefix.'_middle_header_bg'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_middle_header_bg', array(
		            'label'         => esc_html__( 'Middle Header Background', 'arrival' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));

		$wp_customize->add_setting($prefix.'_middle_header_text', array(
	        'default'           => $default[$prefix.'_middle_header_text'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_middle_header_text', array(
		            'label'         => esc_html__( 'Middle Header Text', 'arrival' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));


		$wp_customize->add_setting($prefix.'_main_header_bg', array(
	        'default'           => $default[$prefix.'_main_header_bg'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_main_header_bg', array(
		            'label'         => esc_html__( 'Main Header Background', 'arrival' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));

		$wp_customize->add_setting($prefix.'_main_header_text', array(
	        'default'           => $default[$prefix.'_main_header_text'],
	        'sanitize_callback' => 'arrival_sanitize_color',
	        'transport'         => 'postMessage'
		    )
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_main_header_text', array(
		            'label'         => esc_html__( 'Main Header Text', 'arrival' ),
		            'section'       => $prefix.'_main_header_options_panel',
		            
		)));



		
	}

endif;