<?php
// Footer copyright section 
	function corpbiz_copyright_customizer( $wp_customize ) {
	$wp_customize->add_panel( 'corpbiz_copyright_setting', array(
		'priority'       => 900,
		'capability'     => 'edit_theme_options',
		'title'      => __('Footer Copyright Settings', 'corpbiz'),
	) );
	
	$wp_customize->add_section(
        'copyright_section_one',
        array(
            'title' => __('Footer Copyright Settings','corpbiz'),
            'description' => __('This is a Footer section.','corpbiz'),
            'priority' => 35,
			'panel' => 'corpbiz_copyright_setting',
        )
    );
	
	
	$wp_customize->add_setting(
    'corpbiz_options[footer_copyright]',
    array(
		  'default' => sprintf (__('@ Copyright 2014  Corpbiz Design & Developed by <a href="%1$s" target="_blank">Webriti</a>','corpbiz'),'http://www.webriti.com'),
		
		'type' =>'option',
		'sanitize_callback' => 'corpbiz_copyright_sanitize_text'
		
    )
);
$wp_customize->add_control(
    'corpbiz_options[footer_copyright]',
    array(
        'label' => __('Copyright text','corpbiz'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    ));
	
	function corpbiz_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

}
	
	function corpbiz_copyright_sanitize_html( $input ) {

    return force_balance_tags( $input );

}
}
add_action( 'customize_register', 'corpbiz_copyright_customizer' );
?>