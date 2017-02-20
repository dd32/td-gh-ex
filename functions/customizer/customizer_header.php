<?php
function rambo_header_customizer( $wp_customize ) {
	
	/* Header Section */	
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 201,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header settings', 'rambo'),
	) );
		
		// custom css
		if ( version_compare( $GLOBALS['wp_version'], '4.6', '>=' ) ) {
			
			//Custom css
			$wp_customize->add_section( 'custom_css' , array(
				'title'      => __('Custom CSS','rambo'),
				'panel'  => 'header_options',
				'priority'   => 100,
			) );
		}
		else{
			
			//Custom css
			$wp_customize->add_section( 'custom_css_section' , array(
				'title'      => __('Custom CSS', 'rambo'),
				'panel'  => 'header_options',
				'priority'   => 100,
			) );
				$wp_customize->add_setting(
				'rambo_pro_theme_options[webrit_custom_css]'
					, array(
					'default'        => '',
					'capability'     => 'edit_theme_options',
					'sanitize_callback'    => 'wp_filter_nohtml_kses',
					'sanitize_js_callback' => 'wp_filter_nohtml_kses',
					'type'=> 'option',
				));
				$wp_customize->add_control( 'rambo_pro_theme_options[webrit_custom_css]', array(
					'label'   => __('Custom CSS', 'rambo'),
					'section' => 'custom_css_section',
					'type' => 'textarea',
				));
		}
		
				/* favicon option */
				$wp_customize->add_section( 'front_page_setting' , array(
				  'title'       => __( 'Front page setting', 'rambo' ),
				  'priority'    => 50,
				  'panel'  => 'header_options',
				) );
				
				$wp_customize->add_setting(
				'rambo_pro_theme_options[front_page]'
				,
				array(
					'default' => true,
					'capability'     => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
					'type' => 'option',
				)	
				);
				$wp_customize->add_control(
				'rambo_pro_theme_options[front_page]',
				array(
					'label' => __('Enable Home on front page.','rambo'),
					'section' => 'front_page_setting',
					'type' => 'checkbox',
				)
				);
	
}
add_action( 'customize_register', 'rambo_header_customizer' );
?>