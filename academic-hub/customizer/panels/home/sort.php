<?php
/**
 * Home Page Sort Settings
 *
 * @package Academic Hub
 */
function academic_hub_homepage_short( $wp_customize ){
    
    /** Homepage Sort Section */   
    $wp_customize->add_section( 'academic_hub_homepage_short', array(
        'title'    => esc_html__( 'Sort Home Page Section', 'academic-hub' ),
        'priority' => 10,
        'panel'    => 'academic_hub_homepage_setting',
    ) ); 
    
    /** Homepage Sort Settings*/
    $wp_customize->add_setting(
		'academic_hub_home_page_sort', 
		array(
			'default' => array(
								'academic_hub_slider',
								'academic_hub_notices',
								'academic_hub_special_info_section',
								'academic_hub_our_teams',
								'academic_hub_event',
								'academic_hub_blog',
								'academic_hub_about_us',
							),
			'sanitize_callback' => 'academic_hub_sanitize_sortable',						
		)
	);

    /** Homepage Sort Controls */
	$wp_customize->add_control(
		new Academic_Hub_Drag_Section_Control(
			$wp_customize,
			'academic_hub_home_page_sort',
			array(
				'section'     => 'academic_hub_homepage_short',
				'label'       => esc_html__( 'Homepage Sort Sections', 'academic-hub' ),
				'description' => esc_html__( 'Sort or toggle home page sections.', 'academic-hub' ),
				'choices'     => array(
					'academic_hub_slider'       		=> esc_html__( 	'Slider Settings', 'academic-hub' ),
					'academic_hub_notices'       		=> esc_html__( 	'Academic Notices', 'academic-hub' ),
					'academic_hub_special_info_section' => esc_html__( 	'About Us', 'academic-hub' ),
					'academic_hub_our_teams'       		=> esc_html__( 	'Special Features', 'academic-hub' ),
					'academic_hub_event'       			=> esc_html__( 	'Our Teams', 'academic-hub' ),
					'academic_hub_blog'       			=> esc_html__( 	'Events', 'academic-hub' ),
					'academic_hub_about_us'       		=> esc_html__( 	'Blog', 'academic-hub' ),
				),
			)
		)
	);
    
}
add_action( 'customize_register', 'academic_hub_homepage_short' );