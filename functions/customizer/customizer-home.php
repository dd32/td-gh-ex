<?php
function appointment_header_customizer( $wp_customize ) {

/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 450,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header settings', 'quality'),
	) );
		
	//Custom css
	$wp_customize->add_section( 'custom_css' , array(
		'title'      => __('Custom CSS', 'quality'),
		'panel'  => 'header_options',
		'priority'   => 100,
   	) );
	$wp_customize->add_setting(
	'quality_pro_options[webrit_custom_css]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'quality_pro_options[webrit_custom_css]', array(
        'label'   => __('Custom CSS', 'quality'),
        'section' => 'custom_css',
        'type' => 'textarea',
		'priority'   => 100,
    ));

    // Header logo text checkbox
    $wp_customize->add_setting(
            'header_text',
            array(
                'theme_supports'    => array( 'custom-logo', 'header-text' ),
                'default'           => 0,
                'sanitize_callback' => 'absint',
            )
        );
    $wp_customize->add_control(
        'header_text',
        array(
            'label'    => __( 'Display Site Title and Tagline', 'quality'),
            'section'  => 'title_tagline',
            'settings' => 'header_text',
            'type'     => 'checkbox',
        )
    ); 	
	}
	add_action( 'customize_register', 'appointment_header_customizer' );
	
	
	/**
 * Add selective refresh for Front page section section controls.
 */
function quality_register_header_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'quality_pro_options[upload_image_logo]', array(
		'selector'            => '.navbar-header a',
		'settings'            => 'quality_pro_options[upload_image_logo]',
	
	) );	
}
add_action( 'customize_register', 'quality_register_header_section_partials' );
?>