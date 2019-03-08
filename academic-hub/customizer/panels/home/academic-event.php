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
function academic_hub_event_customizer( $wp_customize ) {
    
    //Slider Section 
    $wp_customize->add_section( 'frontpage_academic_event_section', array(
        'title'    => esc_html__( 'Events', 'academic-hub' ),
        'priority' => 1,
        'panel'    =>'academic_hub_homepage_setting'
    ) );

    /*****************************************************
     * Events Header Info
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_spcecial_our_team_header_title',
        array(
            'default'           => wp_kses_post( 'Conference And <span>Events</span>', 'academic-hub' ),
			'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'academic_hub_spcecial_our_team_header_title',
		array(
			'section'	  => 'frontpage_academic_event_section',
			'label'		  => esc_html__( 'Events Header Info', 'academic-hub' ),
            'type'        => 'text',
            'priority'    => 1,
		)		
    );
    
    /*****************************************************
     * Custom Events Items
     *****************************************************/
    $wp_customize->add_setting( 
        new Academic_Hub_Repeater_Setting( 
            $wp_customize, 
            'academic_hub_event_items', 
            array(
                'sanitize_callback' => array( 'Academic_Hub_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Academic_Hub_Repeater_Control(
			$wp_customize,
			'academic_hub_event_items',
			array(
                'section' => 'frontpage_academic_event_section',
                'priority'    => 3,				
				'label'	  => esc_html__( 'Academic Events', 'academic-hub' ),
				'fields'  => array(
                    'academic_hub_event_title' => array(
                        'type'        => 'text',
                        'label'       => esc_html__( 'Event Title', 'academic-hub' ),
                    ),
                    'academic_hub_event_short' => array(
                        'type'        => 'textarea',
                        'description' => esc_html__( 'Ex: 12/29 7:30 AM-12/31 4:00PM', 'academic-hub' ),
                        'label'       => esc_html__( 'Event Description', 'academic-hub' ),
                    ),
                    'academic_hub_event_images' => array(
                        'type'        => 'image',
                        'label'       => esc_html__( 'Event Image Upload', 'academic-hub' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => esc_html__( 'Event Item', 'academic-hub' ),
                    'field' => 'slider'
                )                        
			)
		)
	);
 

}
add_action( 'customize_register', 'academic_hub_event_customizer' );