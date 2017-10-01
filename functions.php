<?php

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('sneaklite_scripts_styles')) {

	function sneaklite_scripts_styles() {

		wp_deregister_style ( 'suevafree_style' );
		wp_deregister_style( 'suevafree-header_layout_1'); 

		wp_enqueue_style( 'sneaklite-style', get_stylesheet_directory_uri() . '/style.css' );
		wp_enqueue_style( 'sneaklite-woocommerce', get_stylesheet_directory_uri() . '/assets/css/woocommerce.css' ); 

		if ( suevafree_setting('suevafree_skin'))
			wp_enqueue_style( 'sneaklite-' . get_theme_mod('suevafree_skin') , get_stylesheet_directory_uri() . '/assets/skins/' . suevafree_setting('suevafree_skin') . '.css' ); 
		
		if ( suevafree_setting('suevafree_header_layout'))
			wp_deregister_style( 'suevafree-' . suevafree_setting('suevafree_header_layout')); 

		$sneaklite_header = suevafree_setting( 'sneaklite_header_layout', 'header_layout_3');
		wp_enqueue_style('sneaklite-' . $sneaklite_header, get_template_directory_uri() . '/assets/css/header/' . $sneaklite_header . '.css'); 

		wp_deregister_style ( 'suevafree-google-fonts' );
		wp_enqueue_style( 'sneaklite-google-fonts', '//fonts.googleapis.com/css?family=Abel|Allura|Roboto+Slab|Fjalla+One&subset=latin,latin-ext' );

	}
	
	add_action( 'wp_enqueue_scripts', 'sneaklite_scripts_styles', 99 );

}

/*-----------------------------------------------------------------------------------*/
/* SETUP */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('sneaklite_theme_setup')) {

	function sneaklite_theme_setup() {

		load_child_theme_textdomain( 'sneaklite', get_stylesheet_directory() . '/languages' );

	}

	add_action( 'after_setup_theme', 'sneaklite_theme_setup', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* CUSTOMIZE */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('sneaklite_customize_register')) {

	function sneaklite_customize_register( $wp_customize ) {

		$wp_customize->remove_setting( 'suevafree_header_layout');
		$wp_customize->remove_control( 'suevafree_header_layout');
		$wp_customize->remove_setting( 'suevafree_thumb_triangle');
		$wp_customize->remove_control( 'suevafree_thumb_triangle');
		$wp_customize->remove_setting( 'suevafree_disable_box_shadow');
		$wp_customize->remove_control( 'suevafree_disable_box_shadow');

		$wp_customize->add_setting( 'sneaklite_header_layout', array(
			'default' => 'header_layout_3',
			'sanitize_callback' => 'sneaklite_select_sanitize',
		));

		$wp_customize->add_control( 'sneaklite_header_layout' , array(
									
			'type' => 'select',
			'section' => 'layouts_section',
			'priority' => 1,
			'label' => esc_html__('Header Layout','sneaklite'),
			'description' => esc_html__('Header Layout','sneaklite'),
			'choices'  => array (
				'header_layout_3' => esc_html__( 'SneakLite Header Layout', 'sneaklite'),
				'header_layout_1' => esc_html__( 'SuevaFree Header Layout 1', 'sneaklite'),
				'header_layout_2' => esc_html__( 'SuevaFree Header Layout 2', 'sneaklite'),
				'header_layout_4' => esc_html__( 'SuevaFree Header Layout 4', 'sneaklite'),
				'header_layout_5' => esc_html__( 'SuevaFree Header Layout 5', 'sneaklite'),
			),
												
		));

		function sneaklite_select_sanitize ($value, $setting) {
		
			global $wp_customize;
					
			$control = $wp_customize->get_control( $setting->id );
				 
			if ( array_key_exists( $value, $control->choices ) ) {
					
				return $value;
					
			} else {
					
				return $setting->default;
					
			}
			
		}

	}
	
	add_action( 'customize_register', 'sneaklite_customize_register', 99 );

}

?>