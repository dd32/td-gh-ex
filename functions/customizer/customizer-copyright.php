<?php
// Footer copyright section 
	function quality_copyright_customizer( $wp_customize ) {
	
	$wp_customize->add_section(
        'copyright_section_one',
        array(
            'title' => __('Footer Copyright Settings','quality'),
            'priority' => 800,
        )
    );
	
	
	$wp_customize->add_setting(
    'quality_pro_options[footer_copyright_text]',
    array(
        'default' => __('<p>@ Copyright 2014 Quality Center Design And Developed by  <a href="'.esc_url('http://www.webriti.com').'" target="_blank">WordPress Theme</a></p>','quality'),
		'type' =>'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	
);
$wp_customize->add_control(
    'quality_pro_options[footer_copyright_text]',
    array(
        'label' => __('Copyright text','quality'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    ));
}
add_action( 'customize_register', 'quality_copyright_customizer' );
?>