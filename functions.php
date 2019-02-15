<?php
/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('sneak_lite_scripts_styles')) {

	function sneak_lite_scripts_styles() {

		wp_deregister_style ( 'suevafree_style' );
		wp_deregister_style( 'suevafree-header_layout_1'); 

		wp_enqueue_style( 'sneaklite-style', get_stylesheet_directory_uri() . '/style.css' );
		wp_enqueue_style( 'sneaklite-woocommerce', get_stylesheet_directory_uri() . '/assets/css/woocommerce.css' ); 

		if ( get_theme_mod('suevafree_skin') ) :
			
			wp_enqueue_style(
				'sneak-lite-' . esc_attr(get_theme_mod('suevafree_skin')),
				get_stylesheet_directory_uri() . '/assets/skins/' . esc_attr(get_theme_mod('suevafree_skin')) . '.css'
			); 

		endif;

		if ( get_theme_mod('suevafree_header_layout') ) :
			
			wp_deregister_style(
				'suevafree-' . esc_attr(suevafree_setting('suevafree_header_layout'))
			); 

		endif;
		
		wp_enqueue_style(
			'sneak-lite-' . esc_attr(get_theme_mod( 'sneaklite_header_layout', 'header_layout_3')),
			get_template_directory_uri() . '/assets/css/header/' . esc_attr(get_theme_mod( 'sneaklite_header_layout', 'header_layout_3')) . '.css'
		); 

		wp_deregister_style( 'suevafree_google_fonts' );

		$fonts_args = array(
			'family' =>	str_replace('|', '%7C','Abel|Allura|Fjalla+One|Roboto+Slab:300,300i,400,400i,500,500i,600,600i,700,700'),
			'subset' =>	'latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic'
		);
		
		wp_enqueue_style( 'google-fonts', add_query_arg ($fonts_args, "https://fonts.googleapis.com/css" ), array(), null);

	}
	
	add_action( 'wp_enqueue_scripts', 'sneak_lite_scripts_styles', 99 );

}

/*-----------------------------------------------------------------------------------*/
/* SETUP */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('sneak_lite_theme_setup')) {

	function sneak_lite_theme_setup() {

		load_child_theme_textdomain( 'sneak-lite', get_stylesheet_directory() . '/languages' );

	}

	add_action( 'after_setup_theme', 'sneak_lite_theme_setup', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* CUSTOMIZE */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('sneak_lite_customize_register')) {

	function sneak_lite_customize_register( $wp_customize ) {

		$wp_customize->remove_setting( 'suevafree_header_layout');
		$wp_customize->remove_control( 'suevafree_header_layout');
		$wp_customize->remove_setting( 'suevafree_thumb_triangle');
		$wp_customize->remove_control( 'suevafree_thumb_triangle');
		$wp_customize->remove_setting( 'suevafree_disable_box_shadow');
		$wp_customize->remove_control( 'suevafree_disable_box_shadow');

		$wp_customize->add_setting( 'sneaklite_header_layout', array(
			'default' => 'header_layout_3',
			'sanitize_callback' => 'sneak_lite_select_sanitize',
		));

		$wp_customize->add_control( 'sneaklite_header_layout' , array(
									
			'type' => 'select',
			'section' => 'layouts_section',
			'priority' => 1,
			'label' => esc_html__('Header Layout','sneak-lite'),
			'description' => esc_html__('Header Layout','sneak-lite'),
			'choices'  => array (
				'header_layout_3' => esc_html__( 'SneakLite Header Layout', 'sneak-lite'),
				'header_layout_1' => esc_html__( 'SuevaFree Header Layout 1', 'sneak-lite'),
				'header_layout_2' => esc_html__( 'SuevaFree Header Layout 2', 'sneak-lite'),
				'header_layout_4' => esc_html__( 'SuevaFree Header Layout 4', 'sneak-lite'),
				'header_layout_5' => esc_html__( 'SuevaFree Header Layout 5', 'sneak-lite'),
			),
												
		));

		function sneak_lite_select_sanitize ($value, $setting) {
		
			global $wp_customize;
					
			$control = $wp_customize->get_control( $setting->id );
				 
			if ( array_key_exists( $value, $control->choices ) ) {
					
				return $value;
					
			} else {
					
				return $setting->default;
					
			}
			
		}

	}
	
	add_action( 'customize_register', 'sneak_lite_customize_register', 99 );

}

?>