<?php 

// slugs settings
function spasalon_post_type_slugs_customizer( $wp_customize ){
	
	/* post type slugs settings */
	$wp_customize->add_panel( 'post_type_slug_settings', array(
		'priority'       => 128,
		'capability'     => 'edit_theme_options',
		'title'      => __('Post Type Slugs Settings', 'sis_spa'),
	) );
	
		/* post type slugs page */
		$wp_customize->add_section( 'slugs_section' , array(
			'title'      => __('Post Type Slugs Settings', 'sis_spa'),
			'panel'  => 'post_type_slug_settings'
		) );
		
			// Slider Slug
			$wp_customize->add_setting( 'spa_theme_options[spa_slider_slug]' , array(
			'default' => 'spa-slider',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_slider_slug]' , array(
			'label'          => __( 'Slider Slug', 'sis_spa' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled')
			) );
			
			// spa_services_slug
			$wp_customize->add_setting( 'spa_theme_options[spa_services_slug]' , array(
			'default' => 'spa-service',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_services_slug]' , array(
			'label'          => __( 'Service Slug', 'sis_spa' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled')
			) );
			
			// spa_service_category_slug
			$wp_customize->add_setting( 'spa_theme_options[spa_service_category_slug]' , array(
			'default' => 'service-categories',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_service_category_slug]' , array(
			'label'          => __( 'Service Category Slug', 'sis_spa' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled')
			) );
			
			// spa_team_slug
			$wp_customize->add_setting( 'spa_theme_options[spa_team_slug]' , array(
			'default' => 'spa-team',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_team_slug]' , array(
			'label'          => __( 'Team Slug', 'sis_spa' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled')
			) );
			
			// spa_products_slug
			$wp_customize->add_setting( 'spa_theme_options[spa_products_slug]' , array(
			'default' => 'spa-products',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_products_slug]' , array(
			'label'          => __( 'Products Slug', 'sis_spa' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled')
			) );
			
			// spa_products_category_slug
			$wp_customize->add_setting( 'spa_theme_options[spa_products_category_slug]' , array(
			'default' => 'product-categories',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_products_category_slug]' , array(
			'label'          => __( 'Products Category Slug', 'sis_spa' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled')
			) );
	
}
add_action( 'customize_register', 'spasalon_post_type_slugs_customizer' );