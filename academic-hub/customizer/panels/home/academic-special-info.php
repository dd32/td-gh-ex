<?php
/**
 * Slider Settings
 *
 * @package Academic_Hub
 */
function academic_hub_customize_special_info( $wp_customize ) {
    
    //Slider Section 
    $wp_customize->add_section( 'frontpage_academic_hub_frontpage_section', array(
        'title'    => esc_html__( 'Special Info', 'academic-hub' ),
        'priority' => 1,
        'panel'    =>'academic_hub_homepage_setting'
    ) );

    /*****************************************************
     * Special Features
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_spcecial_info_header',
        array(
            'default'           => esc_html__( 'Why We Are Special', 'academic-hub' ),
			'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'academic_hub_spcecial_info_header',
		array(
			'section'	  => 'academic_hub_notices_section',
			'label'		  => esc_html__( 'Special Features', 'academic-hub' ),
            'type'        => 'text'
		)		
    );
    
    /*****************************************************
     * Special Short Desc
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_special_short_desc',
        array(
            'default'           => esc_html__( 'The second most important decision you will make as a parent, apart from deciding to have the kid in the first place is deciding which school for them to enroll in.', 'academic-hub' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage',
        )
    );
    $wp_customize->add_control(
		'academic_hub_special_short_desc',
		array(
			'section'	  => 'academic_hub_notices_section',
			'label'		  => esc_html__( 'Short Descriptions: ', 'academic-hub' ),
            'type'        => 'text'
		)		
	);
    
    /*****************************************************
     * Custom Add Slider 
     *****************************************************/
    $wp_customize->add_setting( 
        new Academic_Hub_Repeater_Setting( 
            $wp_customize, 
            'academic_hub_homepage_special_info', 
            array(
                'default' => array(
                        array(
                            'academic_hub_header_title'       => esc_html__('HIGHLY QUALIFIED TEACHERS', 'academic-hub'),
                            'academic_hub_short_info'         => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor,Aenean massa Cum sociis natoque penatibus','academic-hub'),
                            'academic_hub_images'             => esc_url( get_template_directory_uri().'/assets/images/logo.png' ),                       
                        ),
                        array(
                            'academic_hub_header_title'       => esc_html__('HIGHLY QUALIFIED TEACHERS', 'academic-hub'),
                            'academic_hub_short_info'         => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor,Aenean massa Cum sociis natoque penatibus','academic-hub'),
                            'academic_hub_images'             => esc_url( get_template_directory_uri().'/assets/images/logo.png' ),                       
                        ),
                        array(
                            'academic_hub_header_title'       => esc_html__('HIGHLY QUALIFIED TEACHERS', 'academic-hub'),
                            'academic_hub_short_info'         => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor,Aenean massa Cum sociis natoque penatibus','academic-hub'),
                            'academic_hub_images'             => esc_url( get_template_directory_uri().'/assets/images/logo.png' ),                       
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
			'academic_hub_homepage_special_info',
			array(
                'section' => 'frontpage_academic_hub_frontpage_section',
                'priority'    => 4,				
				'label'	  => esc_html__( 'Slider Add', 'academic-hub' ),
				'fields'  => array(
                    'academic_hub_header_title' => array(
                        'type'        => 'text',
                        'default'     => esc_html__( 'HIGHLY QUALIFIED TEACHERS', 'academic-hub' ),
                        'label'       => esc_html__( 'Slider Text', 'academic-hub' ),
                        'description' => esc_html__( 'Sider Text Type Hear.', 'academic-hub' ),
                    ),
                    'academic_hub_short_info' => array(
                        'type'        => 'textarea',
                        'default'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor,Aenean massa Cum sociis natoque penatibus', 'academic-hub' ),
                        'label'       => esc_html__( 'Slider Short Descriptin', 'academic-hub' ),
                        'description' => esc_html__( 'Slider Links Section.', 'academic-hub' ),
                    ),
                    'academic_hub_images' => array(
                        'type'        => 'image',
                        'default'     => esc_url( get_template_directory_uri().'/assets/images/logo.png' ),
                        'label'       => esc_html__( 'Slider Image Upload', 'academic-hub' ),
                        'description' => esc_html__( 'Upload the slider image', 'academic-hub' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => esc_html__( 'Slider Item', 'academic-hub' ),
                    'field' => 'slider'
                )                        
			)
		)
	);
 

}
add_action( 'customize_register', 'academic_hub_customize_special_info' );