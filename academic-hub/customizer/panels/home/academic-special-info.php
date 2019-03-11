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
                        'label'       => esc_html__( 'Slider Text', 'academic-hub' ),
                        'description' => esc_html__( 'Sider Text Type Hear.', 'academic-hub' ),
                    ),
                    'academic_hub_short_info' => array(
                        'type'        => 'textarea',
                        'label'       => esc_html__( 'Slider Short Descriptin', 'academic-hub' ),
                        'description' => esc_html__( 'Slider Links Section.', 'academic-hub' ),
                    ),
                    'academic_hub_images' => array(
                        'type'        => 'image',
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