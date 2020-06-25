<?php
function wallstreet_header_customizer( $wp_customize ) {

/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 450,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Header settings', 'wallstreet'),
	) );
	
	// Header logo text checkbox
    $wp_customize->add_setting(
            'header_text',
            array(
                'theme_supports'    => array( 'custom-logo', 'header-text' ),
                'default'           => false,
                'sanitize_callback' => 'absint',
            )
        );
    $wp_customize->add_control(
        'header_text',
        array(
            'label'    => esc_html__( 'Display Site Title and Tagline', 'wallstreet'),
            'section'  => 'title_tagline',
            'settings' => 'header_text',
            'type'     => 'checkbox',
        )
    ); 

	//Custom css
	$wp_customize->add_section( 'custom_css' , array(
		'title'      => esc_html__('Custom CSS', 'wallstreet'),
		'panel'  => 'header_options',
		'priority'   => 100,
   	) );
	$wp_customize->add_setting(
	'wallstreet_pro_options[webrit_custom_css]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'wallstreet_pro_options[webrit_custom_css]', array(
        'label'   => esc_html__('Custom CSS', 'wallstreet'),
        'section' => 'custom_css',
        'type' => 'textarea',
		'priority'   => 100,
    )); 	
}
add_action( 'customize_register', 'wallstreet_header_customizer' );