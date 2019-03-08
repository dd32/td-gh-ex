<?php
/**
 * The template for academic hub
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Academic Hub
 */
function academic_hub_about_customizer( $wp_customize ) {
    
     /*****************************************************
     * About Us Page Section
     *****************************************************/
    $wp_customize->add_section( 'frontpage_academic_about_section', array(
        'title'    => esc_html__( 'About Us', 'academic-hub' ),
        'priority' => 1,
        'panel'    =>'academic_hub_homepage_setting'
    ) );

    /*****************************************************
     * About Us Page Header Info
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_about_header_title',
        array(
            'default'           => wp_kses_post( 'ABOUT <span> US </span>', 'academic-hub' ),
			'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'academic_hub_about_header_title',
		array(
			'section'	  => 'frontpage_academic_about_section',
			'label'		  => esc_html__( 'About Header Info', 'academic-hub' ),
            'type'        => 'textarea',
            'priority'    => 1,
		)		
    );



     /*****************************************************
     * Select Blog Section Hear
     *****************************************************/
	$wp_customize->add_setting( 
        'academic_hub_about_page_id_select', 
        array(
            'sanitize_callback' => 'academic_hub_sanitize_select'
        )
    );
    $wp_customize->add_control( 
        'academic_hub_about_page_id_select', 
        array(
			'label'         => esc_html__( 'Select Page Category', 'academic-hub' ),
            'section'       => 'frontpage_academic_about_section',
            'type'          => 'select',
            'choices'       => academic_hub_get_page_list( ),
            'priority'      => 2,
        )
	); 
	
}
add_action( 'customize_register', 'academic_hub_about_customizer' );