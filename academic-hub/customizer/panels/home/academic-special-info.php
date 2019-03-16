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
     * Slider Post Categiry Select
     *****************************************************/
	$wp_customize->add_setting( 
        'academic_hub_special_category_id', 
        array(
			'default' => academic_hub_get_default_categorie(),
            'sanitize_callback' => 'academic_hub_sanitize_select'
        )
    );
    $wp_customize->add_control( 
        'academic_hub_special_category_id', 
        array(
			'label'         => esc_html__( 'Select Post Category', 'academic-hub' ),
            'section'       => 'frontpage_academic_hub_frontpage_section',
            'type'          => 'select',
            'choices'       => academic_hub_get_post_categories( ),
            'priority'      => 3,
        )
    );
    
    /*****************************************************
     * Slider Post Post count
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_special_number_of_post',
        array(
            'sanitize_callback' => 'intval',
            'default'           =>  3
        )
    );
    $wp_customize->add_control(
		'academic_hub_special_number_of_post',
		array(
			'section'	  => 'frontpage_academic_hub_frontpage_section',
			'label'		  => esc_html__( 'Number of Special Info', 'academic-hub' ),
            'type'        => 'number',
            'priority'    => 4,
		)		
    );
 

}
add_action( 'customize_register', 'academic_hub_customize_special_info' );