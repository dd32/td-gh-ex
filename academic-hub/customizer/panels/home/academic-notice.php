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

    
    /*****************************************************
     * Select Blog Section Hear
     *****************************************************/
	$wp_customize->add_setting( 
        'academic_hub_notices_page_id', 
        array(
            'sanitize_callback' => 'academic_hub_sanitize_select'
        )
    );
    $wp_customize->add_control( 
        'academic_hub_notices_page_id', 
        array(
			'label'         => esc_html__( 'Select Page Category', 'academic-hub' ),
            'section'       => 'academic_hub_notices_section',
            'type'          => 'select',
            'choices'       => academic_hub_get_page_list( ),
            'priority'      => 2,
        )
	); 
 

}
add_action( 'customize_register', 'academic_hub_customize_register_academic_notice' );