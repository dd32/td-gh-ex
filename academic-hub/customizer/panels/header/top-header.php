<?php
/**
 * Top Header Settings
 *
 * @package Academic_Hub
 */
function academic_hub_top_header_customizer( $wp_customize ) {

    //Add the Header Section
    $wp_customize->add_section( 'academic_hub_top_header_section', array(
        'title'    => esc_html__( 'Top Header', 'academic-hub' ),
        'priority' => 5,
        'panel'    =>'header_setting'
	) );


	//top header address
    $wp_customize->add_setting(
        'academic_hub_top_header_address',
        array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage',
        )
    );
    $wp_customize->add_control(
		'academic_hub_top_header_address',
		array(
			'section'	  => 'academic_hub_top_header_section',
			'label'		  => esc_html__( 'Address', 'academic-hub' ),
            'type'        => 'text',
            'priority'    => 1,
		)		
    );
	$wp_customize->selective_refresh->add_partial( 'academic_hub_top_header_address', array(
        'selector' 			=> '.top_header_address a',
        'render_callback' 	=> 'academic_hub_top_header_address_callback',
    ) );
    
    

    //top header phone
    $wp_customize->add_setting(
        'academic_hub_top_header_phone',
        array(
			'sanitize_callback' => 'sanitize_text_field',
            'transport'			=>	'postMessage',
            'priority'          => 2,
        )
    );
    $wp_customize->add_control(
		'academic_hub_top_header_phone',
		array(
			'section'	  => 'academic_hub_top_header_section',
			'label'		  => esc_html__( 'Phone No.', 'academic-hub' ),
            'type'        => 'text'
		)		
    );
	$wp_customize->selective_refresh->add_partial( 'academic_hub_top_header_phone', array(
        'selector' 			=> '.top_header_phone a',
        'render_callback' 	=> 'academic_hub_top_header_phone_callback',
    ) );



    //top header email
    $wp_customize->add_setting(
        'academic_hub_top_header_email',
        array(
			'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
            'priority'          => 3,
        )
    );
    $wp_customize->add_control(
		'academic_hub_top_header_email',
		array(
			'section'	  => 'academic_hub_top_header_section',
			'label'		  => esc_html__( 'Email', 'academic-hub' ),
            'type'        => 'text'
		)		
    );
	$wp_customize->selective_refresh->add_partial( 'academic_hub_top_header_email', array(
        'selector' 			=> '.top_header_email a',
        'render_callback' 	=> 'academic_hub_top_header_email_callback',
    ) );

    

    //social links
    $wp_customize->add_setting( 
        new Academic_Hub_Repeater_Setting( 
            $wp_customize, 
            'academic_hub_social_links', 
            array(
                'default' => array(
                        array(
                            'academic_hub_social_icon'       => esc_html__('fa fa-facebook', 'academic-hub'),
                            'academic_hub_social_link'       => esc_url('https://facebook.com/'),
                        ),
                        array(
                            'academic_hub_social_icon'       => esc_html__('fa fa-twitter', 'academic-hub'),
                            'academic_hub_social_link'       => esc_url('https://twitter.com/'),
                        ),
                        array(
                            'academic_hub_social_icon'       => esc_html__('fa fa-instagram', 'academic-hub'),
                            'academic_hub_social_link'       => esc_url('https://instagram.com/'),
                        ),
                        array(
                            'academic_hub_social_icon'       => esc_html__('fa fa-linkedin', 'academic-hub'),
                            'academic_hub_social_link'       => esc_url('https://linkedin.com/'),
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
			'academic_hub_social_links',
			array(
                'section' => 'academic_hub_top_header_section',		
				'label'	  => esc_html__( 'Social Media', 'academic-hub' ),
				'fields'  => array(
                    'academic_hub_social_icon' => array(
                        'type'        => 'font',
                        'default'     => esc_html__( 'fa fa-facebook', 'academic-hub' ),
                        'label'       => esc_html__( 'Social Media Icons', 'academic-hub' ),
                    ),
                    'academic_hub_social_link' => array(
                        'type'        => 'text',
                        'default'     => esc_url('https://facebook.com/'),
                        'label'       => esc_html__( 'Social Media Links', 'academic-hub' ),
                    ),
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => esc_html__( 'Add Social Media', 'academic-hub' ),
                    'field' => 'slider'
                )                        
			)
		)
	);

    
}
add_action( 'customize_register', 'academic_hub_top_header_customizer' );