<?php
/**
 * Academic Notice Settings
 *
 * @since 1.0.0
 * @package Academic_Hub
 */
function academic_hub_customize_register_academic_notice( $wp_customize ) {
    
    //Slider Section 
    $wp_customize->add_section( 'academic_hub_notices_section', array(
        'title'    => esc_html__( 'Academic Notices', 'academic-hub' ),
        'priority' => 1,
        'panel'    =>'academic_hub_homepage_setting'
    ) );

    //academic notice
    $wp_customize->add_setting(
        'academic_hub_notice_title',
        array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage',
        )
    );
    $wp_customize->add_control(
		'academic_hub_notice_title',
		array(
			'section'	  => 'academic_hub_notices_section',
			'label'		  => esc_html__( 'Academic Notice Title', 'academic-hub' ),
            'type'        => 'text'
		)		
    );
    
    //academic notice short desc
    $wp_customize->add_setting(
        'academic_hub_notice_shotdesc',
        array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage',
        )
    );
    $wp_customize->add_control(
		'academic_hub_notice_shotdesc',
		array(
			'section'	  => 'academic_hub_notices_section',
			'label'		  => esc_html__( 'Notice ', 'academic-hub' ),
            'type'        => 'text'
		)		
	);
 

}
add_action( 'customize_register', 'academic_hub_customize_register_academic_notice' );