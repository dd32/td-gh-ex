<?php
/**
 * BeautyTemple Theme Customizer.
 *
 * @package BeautyTemple
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beautytemple_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
/**
 * Social links section
 *
 */			
	$wp_customize->add_section( 'beautytemple_social_links_section' , array(
			'title'      => __('Social links','beautytemple'),
			'priority'   => 32,
		) );
		
			/**
			 * Facebook
			 *
			 */	
			$wp_customize->add_setting('beautytemple_social_links_fb_option', array(
				'default'        => 'http://facebook.com',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'beautytemple_sanitize_text',
			));
		 
			$wp_customize->add_control('beautytemple_social_links_fb_ctrl', array(
				'label'      => __('Facebook', 'beautytemple'),
				'section'    => 'beautytemple_social_links_section',
				'settings'   => 'beautytemple_social_links_fb_option',
				'type'       => 'text',
			));	
			
			/**
			 * Twitter
			 *
			 */			
			$wp_customize->add_setting('beautytemple_social_links_tw_option', array(
				'default'        => 'http://twitter.com',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'beautytemple_sanitize_text',
			));
		 
			$wp_customize->add_control('beautytemple_social_links_tw_ctrl', array(
				'label'      => __('Twitter', 'beautytemple'),
				'section'    => 'beautytemple_social_links_section',
				'settings'   => 'beautytemple_social_links_tw_option',
				'type'       => 'text',
			));
			
			/**
			 * Google Plus
			 *
			 */				
			$wp_customize->add_setting('beautytemple_social_links_gplus_option', array(
				'default'        => 'http://plus.google.com',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'beautytemple_sanitize_text',
			));
		 
			$wp_customize->add_control('beautytemple_social_links_gplus_ctrl', array(
				'label'      => __('Google Plus', 'beautytemple'),
				'section'    => 'beautytemple_social_links_section',
				'settings'   => 'beautytemple_social_links_gplus_option',
				'type'       => 'text',
			));	
			
			/**
			 * Instagram
			 *
			 */				
			$wp_customize->add_setting('beautytemple_social_links_instagram_option', array(
				'default'        => 'http://instagram.com',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'beautytemple_sanitize_text',
			));
		 
			$wp_customize->add_control('beautytemple_social_links_instagram_ctrl', array(
				'label'      => __('Instagram', 'beautytemple'),
				'section'    => 'beautytemple_social_links_section',
				'settings'   => 'beautytemple_social_links_instagram_option',
				'type'       => 'text',
			));
		 
			
			/**
			 * Behance
			 *
			 */				
			$wp_customize->add_setting('beautytemple_social_links_behance_option', array(
				'default'        => 'http://behance.net',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'beautytemple_sanitize_text',
			));
		 
			$wp_customize->add_control('beautytemple_social_links_behance_ctrl', array(
				'label'      => __('Behance', 'beautytemple'),
				'section'    => 'beautytemple_social_links_section',
				'settings'   => 'beautytemple_social_links_behance_option',
				'type'       => 'text',
			));	
				
}
add_action( 'customize_register', 'beautytemple_customize_register' );
function beautytemple_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function beautytemple_customize_preview_js() {
	wp_enqueue_script( 'beautytemple_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'beautytemple_customize_preview_js' );
