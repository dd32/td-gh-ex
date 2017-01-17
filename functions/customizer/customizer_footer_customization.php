<?php 

// Adding customizer footer customization settings

function corpbiz_footer_customization_customizer( $wp_customize ){
	
	/* footer customization Panel */
	$wp_customize->add_panel( 'footer_customization', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('Footer copyright settings', 'corpbiz'),
	) );
	
	/* footer copyright section */
	$wp_customize->add_section( 'footer_copyright' , array(
		'title'      => __('Footer copyright settings', 'corpbiz'),
		'panel'  => 'footer_customization',
		'priority'   => 1,
   	) );
	
	$wp_customize->add_setting(
		'corpbiz_options[footer_copyright_text]',
		array(
			'default' => sprintf (__('<p>All Rights Reserved by Corpbiz. Designed and Developed by <a href="%1$s" target="_blank">WordPress Theme</a><p>','corpbiz'),'http://www.webriti.com'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'corpbiz_copyright_sanitize_text',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[footer_copyright_text]', array(
			'label' => __('Copyright text','corpbiz'),
			'section' => 'footer_copyright',
			'type'    =>  'textarea'
	));	 // footer copyright
	
	function corpbiz_copyright_sanitize_text( $input ) 
	{
	return wp_kses_post( force_balance_tags( $input ) );
	}
	function corpbiz_copyright_sanitize_html( $input ) 
	{
	return force_balance_tags( $input );
	}	
}
add_action( 'customize_register', 'corpbiz_footer_customization_customizer' );