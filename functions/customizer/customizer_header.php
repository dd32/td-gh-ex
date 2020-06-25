<?php
function rambo_header_customizer( $wp_customize ) {
	
	/* Header Section */	
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Header settings', 'rambo'),
	) );
		
		// custom css
		if ( version_compare( $GLOBALS['wp_version'], '4.6', '>=' ) ) {
			
			//Custom css
			$wp_customize->add_section( 'custom_css' , array(
				'title'      => esc_html__('Custom CSS','rambo'),
				'panel'  => 'header_options',
				'priority'   => 100,
			) );
		}
		else{
			
			//Custom css
			$wp_customize->add_section( 'custom_css_section' , array(
				'title'      => esc_html__('Custom CSS', 'rambo'),
				'panel'  => 'header_options',
				'priority'   => 100,
			) );
				$wp_customize->add_setting(
				'rambo_pro_theme_options[webrit_custom_css]'
					, array(
					'default'        => '',
					'capability'     => 'edit_theme_options',
					'sanitize_callback'    => 'wp_filter_nohtml_kses',
					'type'=> 'option',
				));
				$wp_customize->add_control( 'rambo_pro_theme_options[webrit_custom_css]', array(
					'label'   => esc_html__('Custom CSS', 'rambo'),
					'section' => 'custom_css_section',
					'type' => 'textarea',
				));
		}
	
}
add_action( 'customize_register', 'rambo_header_customizer' );
?>