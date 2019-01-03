<?php
/**
 * Slider Settings
 *
 * @package Academic_Hub
 */
function academic_hub_customize_register_slider( $wp_customize ) {
    
    //Slider Section 
    $wp_customize->add_section( 'frontpage_slider_section', array(
        'title'    => esc_html__( 'Slider Settings', 'academic-hub' ),
        'priority' => 1,
        'panel'    =>'academic_hub_homepage_setting'
    ) );

    /*****************************************************
     * Slider Categories List
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_main_slider',
        array(
            'default'           => false,
            'sanitize_callback' => 'academic_hub_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Academic_Hub_Toggle_Control( 
			$wp_customize,
			'academic_hub_main_slider',
			array(
				'section'	  => 'frontpage_slider_section',
				'label'		  => esc_html__( 'Main Slider (on/off)', 'academic-hub' ),
                'priority'    => 1,
			)
		)
    );

    /*****************************************************
     * Custom Add Slider 
     *****************************************************/
    $wp_customize->add_setting( 
        new Academic_Hub_Repeater_Setting( 
            $wp_customize, 
            'homepage_slider_section', 
            array(
                'default' => array(
                        array(
                            'slider_header_title'       => esc_html__('Dedicated To Excellence', 'academic-hub'),
                            'slider_short_desc'         => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit.','academic-hub'),
                            'slider_images'             => esc_url( get_template_directory_uri().'/assets/images/slider-item.png' ),                       
                        ),
                        array(
                            'slider_header_title'       => esc_html__('Dedicated To Excellence', 'academic-hub'),
                            'slider_short_desc'         => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit.','academic-hub'),
                            'slider_images'             => esc_url( get_template_directory_uri().'/assets/images/slider-item.png' ),                       
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
			'homepage_slider_section',
			array(
                'section' => 'frontpage_slider_section',
                'priority'    => 4,				
				'label'	  => esc_html__( 'Slider Add', 'academic-hub' ),
				'fields'  => array(
                    'slider_header_title' => array(
                        'type'        => 'text',
                        'label'       => esc_html__( 'Slider Text', 'academic-hub' ),
                        'description' => esc_html__( 'Sider Text Type Hear.', 'academic-hub' ),
                    ),
                    'slider_short_desc' => array(
                        'type'        => 'textarea',
                        'label'       => esc_html__( 'Slider Short Descriptin', 'academic-hub' ),
                        'description' => esc_html__( 'Slider Links Section.', 'academic-hub' ),
                    ),
                    'slider_images' => array(
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
add_action( 'customize_register', 'academic_hub_customize_register_slider' );