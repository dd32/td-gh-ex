<?php 
// banner settings
function spasalon_banner_customizer( $wp_customize ){
	
	/* banner settings */
	$wp_customize->add_panel( 'banner_settings', array(
		'priority'       => 129,
		'capability'     => 'edit_theme_options',
		'title'      => __('Banner Settings', 'sis_spa'),
	) );
	
		/* category template page */
		$wp_customize->add_section( 'banner_cat_section' , array(
			'title'      => __('Category Banner Settings', 'sis_spa'),
			'panel'  => 'banner_settings'
		) );
		
			// category banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_category]' , array(
			'default' => 'GET YOURSELF',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_category]' , array(
			'label'          => __( 'Category Banner Title 1', 'sis_spa' ),
			'section'        => 'banner_cat_section',
			'type'           => 'text',
			) );
			
			// category banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_category]' , array(
			'default' => 'REFRESHED',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_category]' , array(
			'label'          => __( 'Category Banner Title 2', 'sis_spa' ),
			'section'        => 'banner_cat_section',
			'type'           => 'text',
			) );
			
			// category banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_category]' , array(
			'default' => 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris',
			'sanitize_callback' => 'spasalon_banner_sanitize_text',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_category]' , array(
			'label'          => __( 'Category Banner Description', 'sis_spa' ),
			'section'        => 'banner_cat_section',
			'type'           => 'textarea',
			) );
			
		/* archive template page */
		$wp_customize->add_section( 'banner_archive_section' , array(
			'title'      => __('Archive Banner Settings', 'sis_spa'),
			'panel'  => 'banner_settings'
		) );
		
			// archive banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_author]' , array(
			'default' => 'GET YOURSELF',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_author]' , array(
			'label'          => __( 'Archive Banner Title 1', 'sis_spa' ),
			'section'        => 'banner_archive_section',
			'type'           => 'text',
			) );
			
			// archive banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_author]' , array(
			'default' => 'REFRESHED',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_author]' , array(
			'label'          => __( 'Archive Banner Title 2', 'sis_spa' ),
			'section'        => 'banner_archive_section',
			'type'           => 'text',
			) );
			
			// archive banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_author]' , array(
			'default' => 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris',
			'sanitize_callback' => 'spasalon_banner_sanitize_text',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_author]' , array(
			'label'          => __( 'Archive Banner Description', 'sis_spa' ),
			'section'        => 'banner_archive_section',
			'type'           => 'textarea',
			) );
			
		/* Tag template page */
		$wp_customize->add_section( 'banner_tag_section' , array(
			'title'      => __('Tag Banner Settings', 'sis_spa'),
			'panel'  => 'banner_settings'
		) );
		
			// Tag banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_tag]' , array(
			'default' => 'GET YOURSELF',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_tag]' , array(
			'label'          => __( 'Tag Banner Title 1', 'sis_spa' ),
			'section'        => 'banner_tag_section',
			'type'           => 'text',
			) );
			
			// Tag banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_tag]' , array(
			'default' => 'REFRESHED',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_tag]' , array(
			'label'          => __( 'Tag Banner Title 2', 'sis_spa' ),
			'section'        => 'banner_tag_section',
			'type'           => 'text',
			) );
			
			// Tag banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_tag]' , array(
			'default' => 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris',
			'sanitize_callback' => 'spasalon_banner_sanitize_text',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_tag]' , array(
			'label'          => __( 'Tag Banner Description', 'sis_spa' ),
			'section'        => 'banner_tag_section',
			'type'           => 'textarea',
			) );
			
		/* Search template page */
		$wp_customize->add_section( 'banner_search_section' , array(
			'title'      => __('Search Banner Settings', 'sis_spa'),
			'panel'  => 'banner_settings'
		) );
		
			// Search banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_search]' , array(
			'default' => 'GET YOURSELF',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_search]' , array(
			'label'          => __( 'Search Banner Title 1', 'sis_spa' ),
			'section'        => 'banner_search_section',
			'type'           => 'text',
			) );
			
			// Search banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_search]' , array(
			'default' => 'REFRESHED',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_search]' , array(
			'label'          => __( 'Search Banner Title 2', 'sis_spa' ),
			'section'        => 'banner_search_section',
			'type'           => 'text',
			) );
			
			// Search banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_search]' , array(
			'default' => 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris',
			'sanitize_callback' => 'spasalon_banner_sanitize_text',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_search]' , array(
			'label'          => __( 'Search Banner Description', 'sis_spa' ),
			'section'        => 'banner_search_section',
			'type'           => 'textarea',
			) );
			
		/* 404 template page */
		$wp_customize->add_section( 'banner_404_section' , array(
			'title'      => __('404 Banner Settings', 'sis_spa'),
			'panel'  => 'banner_settings'
		) );
		
			// 404 banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_404]' , array(
			'default' => 'GET YOURSELF',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_404]' , array(
			'label'          => __( '404 Banner Title 1', 'sis_spa' ),
			'section'        => 'banner_404_section',
			'type'           => 'text',
			) );
			
			// 404 banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_404]' , array(
			'default' => 'REFRESHED',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_404]' , array(
			'label'          => __( '404 Banner Title 2', 'sis_spa' ),
			'section'        => 'banner_404_section',
			'type'           => 'text',
			) );
			
			// 404 banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_404]' , array(
			'default' => 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris',
			'sanitize_callback' => 'spasalon_banner_sanitize_text',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_404]' , array(
			'label'          => __( '404 Banner Description', 'sis_spa' ),
			'section'        => 'banner_404_section',
			'type'           => 'textarea',
			) );
			
		/* woo template page */
		$wp_customize->add_section( 'banner_woo_section' , array(
			'title'      => __('Woocommerce Page Banner Settings', 'sis_spa'),
			'panel'  => 'banner_settings'
		) );
		
			// woo banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_woo]' , array(
			'default' => 'GET YOURSELF',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_woo]' , array(
			'label'          => __( 'Woocommerce Banner Title 1', 'sis_spa' ),
			'section'        => 'banner_woo_section',
			'type'           => 'text',
			) );
			
			// woo banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_woo]' , array(
			'default' => 'REFRESHED',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_woo]' , array(
			'label'          => __( 'Woocommerce Banner Title 2', 'sis_spa' ),
			'section'        => 'banner_woo_section',
			'type'           => 'text',
			) );
			
			// woo banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_woo]' , array(
			'default' => 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris',
			'sanitize_callback' => 'spasalon_banner_sanitize_text',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_woo]' , array(
			'label'          => __( 'Woocommerce Banner Description', 'sis_spa' ),
			'section'        => 'banner_woo_section',
			'type'           => 'textarea',
			) );
			
			function spasalon_banner_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}
	
}
add_action( 'customize_register', 'spasalon_banner_customizer' );