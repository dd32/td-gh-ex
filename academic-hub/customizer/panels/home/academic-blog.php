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
function academic_hub_blog_customizer( $wp_customize ) {
    
     /*****************************************************
     * Blog Section
     *****************************************************/
    $wp_customize->add_section( 'frontpage_academic_blog_section', array(
        'title'    => esc_html__( 'Blog', 'academic-hub' ),
        'priority' => 1,
        'panel'    =>'academic_hub_homepage_setting'
    ) );

    /*****************************************************
     * Blog Header Info
     *****************************************************/
    $wp_customize->add_setting(
        'academic_hub_blog_header_title',
        array(
            'default'           => wp_kses_post( 'Latest <span> News</span> And <span>Blogs</span>', 'academic-hub' ),
			'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'academic_hub_blog_header_title',
		array(
			'section'	  => 'frontpage_academic_blog_section',
			'label'		  => esc_html__( 'Blog Header Info', 'academic-hub' ),
            'type'        => 'textarea',
            'priority'    => 1,
		)		
    );



     /*****************************************************
     * Select Blog Section Hear
     *****************************************************/
	$wp_customize->add_setting( 
        'academic_hub_blog_category_id_select', 
        array(
			'default' => esc_html__( 'all', 'academic-hub' ),
            'sanitize_callback' => 'academic_hub_sanitize_select'
        )
    );
    $wp_customize->add_control( 
        'academic_hub_blog_category_id_select', 
        array(
			'label'         => esc_html__( 'Select Post Category', 'academic-hub' ),
            'section'       => 'frontpage_academic_blog_section',
            'type'          => 'select',
            'choices'       => academic_hub_get_post_categories( ),
            'priority'      => 2,
        )
	); 
	


    /*****************************************************
     * Number of Homepage Blog
     *****************************************************/
	$wp_customize->add_setting(
        'academic_hub_blog_number_of_post',
        array(
            'default'           => 4,
            'sanitize_callback' => 'absint',
        )
    );
    
    $wp_customize->add_control(
		'academic_hub_blog_number_of_post',
		array(
			'section'	  => 'frontpage_academic_blog_section',
			'label'		  => esc_html__( 'Number of Post', 'academic-hub' ),
            'type'        => 'number',
            'priority'      => 3,
		)		
    );

}
add_action( 'customize_register', 'academic_hub_blog_customizer' );