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
function academic_hub_customize_team( $wp_customize ) {
    
    //Slider Section 
    $wp_customize->add_section( 'frontpage_academic_team_section', array(
        'title'    => esc_html__( 'Our Teams', 'academic-hub' ),
        'priority' => 1,
        'panel'    =>'academic_hub_homepage_setting'
    ) );

    /*****************************************************
     * Our Team Header Info
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_spcecial_our_team_header_title',
        array(
            'default'           => esc_html__( 'Meet Our Founders', 'academic-hub' ),
			'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'academic_hub_spcecial_our_team_header_title',
		array(
			'section'	  => 'frontpage_academic_team_section',
			'label'		  => esc_html__( 'Our Team Header Info', 'academic-hub' ),
            'type'        => 'text',
            'priority'    => 1,
		)		
    );
    
    /*****************************************************
     * Special Short Desc
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_our_team_short_desc',
        array(
            'default'           => esc_html__( 'Aenean commodo ligal geate dolor. Aenan massa. Loren ipsum dolor sit amet,color tetuer adiois elit, aliquam eget nibh etibra.', 'academic-hub' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage',
        )
    );
    $wp_customize->add_control(
		'academic_hub_our_team_short_desc',
		array(
			'section'	  => 'frontpage_academic_team_section',
			'label'		  => esc_html__( 'Short Descriptions: ', 'academic-hub' ),
            'type'        => 'textarea',
            'priority'    => 2,
		)		
	);
    
    /*****************************************************
     * Custom Add Slider 
     *****************************************************/
    $wp_customize->add_setting( 
        new Academic_Hub_Repeater_Setting( 
            $wp_customize, 
            'academic_hub_our_team', 
            array(
                'default' => array(
                        array(
                            'academic_hub_our_team_name'       => esc_html__('LANA DEO', 'academic-hub'),
                            'academic_hub_our_team_images'     => esc_url( get_template_directory_uri().'/assets/images/profile.png' ),                       
                        ),
                        array(
                            'academic_hub_our_team_name'       => esc_html__('LANA DEO', 'academic-hub'),
                            'academic_hub_our_team_images'     => esc_url( get_template_directory_uri().'/assets/images/profile.png' ),                       
                        ),
                        array(
                            'academic_hub_our_team_name'       => esc_html__('LANA DEO', 'academic-hub'),
                            'academic_hub_our_team_images'     => esc_url( get_template_directory_uri().'/assets/images/profile.png' ),                       
                        ),
                        array(
                            'academic_hub_our_team_name'       => esc_html__('LANA DEO', 'academic-hub'),
                            'academic_hub_our_team_images'     => esc_url( get_template_directory_uri().'/assets/images/profile.png' ),                       
                        ),
                    )
                ,
                'sanitize_callback' => array( 'Academic_Hub_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Academic_Hub_Repeater_Control(
			$wp_customize,
			'academic_hub_our_team',
			array(
                'section' => 'frontpage_academic_team_section',
                'priority'    => 3,				
				'label'	  => esc_html__( 'Academic Our Team', 'academic-hub' ),
				'fields'  => array(
                    'academic_hub_our_team_name' => array(
                        'type'        => 'text',
                        'default'     => esc_html__( 'LANA DEO', 'academic-hub' ),
                        'label'       => esc_html__( 'Team Name', 'academic-hub' ),
                    ),
                    'academic_hub_our_team_images' => array(
                        'type'        => 'image',
                        'default'     => esc_url( get_template_directory_uri().'/assets/images/profile.png' ),
                        'label'       => esc_html__( 'Slider Image Upload', 'academic-hub' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => esc_html__( 'Teams Item', 'academic-hub' ),
                    'field' => 'slider'
                )                        
			)
		)
	);
 

}
add_action( 'customize_register', 'academic_hub_customize_team' );