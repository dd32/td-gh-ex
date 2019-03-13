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
     * Slider Post Categiry Select
     *****************************************************/
	$wp_customize->add_setting( 
        'academic_hub_slider_category_id', 
        array(
			'default' => esc_html__( 'all', 'academic-hub' ),
            'sanitize_callback' => 'academic_hub_sanitize_select'
        )
    );
    $wp_customize->add_control( 
        'academic_hub_slider_category_id', 
        array(
			'label'         => esc_html__( 'Select Post Category', 'academic-hub' ),
            'section'       => 'frontpage_slider_section',
            'type'          => 'select',
            'choices'       => academic_hub_get_post_categories( ),
            'priority'      => 2,
        )
    );
    
    /*****************************************************
     * Slider Post Post count
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_slider_number_of_post',
        array(
            'sanitize_callback' => 'intval',
            'default'           =>  3
        )
    );
    $wp_customize->add_control(
		'academic_hub_slider_number_of_post',
		array(
			'section'	  => 'frontpage_slider_section',
			'label'		  => esc_html__( 'Number Of Slider', 'academic-hub' ),
            'type'        => 'number',
            'priority'    => 3,
		)		
    );

 

}
add_action( 'customize_register', 'academic_hub_customize_register_slider' );