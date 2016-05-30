<?php 

// Adding customizer footer customization settings

function busiprof_footer_customization_customizer( $wp_customize ){
	
	/* footer copyright section */
	$wp_customize->add_section( 'footer_copyright' , array(
		'title'      => __('Footer Copyright', 'busi_prof'),
		'priority'   => 126,
   	) );
	
	
	
		//Design By
		$wp_customize->add_setting('busiprof_theme_options[footer_designedby]',array(
			'default' => __('Webriti','busi_prof'),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		
		$wp_customize->add_control('busiprof_theme_options[footer_designedby]',array(
		
			'label' => __('Design By','busi_prof'),
			'section' => 'footer_copyright',
			'type' => 'text',
		));
		
		
		//Footer Copyright URL
		$wp_customize->add_setting('busiprof_theme_options[footer_url]',array(
		
			'sanitize_callback' => 'busiprof_copyright_sanitize_text',
			'default' => __('http://www.webriti.com','busi_prof'),
			'type' => 'option',
		));
		
		
		$wp_customize->add_control('busiprof_theme_options[footer_url]',array(
		
			'label' => __('Footer URL','busi_prof'),
			'section' => 'footer_copyright',
			'type' => 'text',
		));
	
	
		//Footer Copyright Text
		$wp_customize->add_setting('busiprof_theme_options[busiprof_copy_rights_text]',array(
		
			'sanitize_callback' => 'busiprof_copyright_sanitize_text',
			'default' => __('&copy; 2013. All Rights Reserved by ','busi_prof'),
			'type' => 'option',
		));
		
		
		$wp_customize->add_control('busiprof_theme_options[busiprof_copy_rights_text]',array(
		
			'label' => __('Copyright Text','busi_prof'),
			'section' => 'footer_copyright',
			'type' => 'text',
		));
	
	function busiprof_copyright_sanitize_text( $input ) 
	{
	return wp_kses_post( force_balance_tags( $input ) );
	}
	function busiprof_copyright_sanitize_html( $input ) 
	{
	return force_balance_tags( $input );
	}	
}
add_action( 'customize_register', 'busiprof_footer_customization_customizer' );