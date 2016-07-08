<?php
/**
 * Aedificator Theme Customizer
 *
 * @package Aedificator
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function aedificator_customize_register( $wp_customize ) {
	
	// Update Your Settings
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');	
	

    // Add General Sections

    $wp_customize->add_section('general',             array('title' => __('General', 'aedificator'),          'description' => '',                                         'priority' => 130,));
    $wp_customize->add_section('blogpage',            array('title' => __('Blog', 'aedificator'),             'description' => '',                                         'priority' => 160,));


	// Add Panels

	$wp_customize->add_panel('slider',                array('title' => __('Slider', 'aedificator' ),          'description' => __( 'Slides Details', 'aedificator' ),      'priority' => 140));
    $wp_customize->add_panel('homepage',              array('title' => __('Home Page', 'aedificator'),        'description' => '',                                         'priority' => 170,));

	// Panels Slider
		
	$wp_customize->add_section('slide1',              array('title' => __('Slide 1', 'aedificator'),          'description' => '',             'panel' => 'slider',		'priority' => 140,));
	$wp_customize->add_section('slide2',              array('title' => __('Slide 2', 'aedificator'),          'description' => '',             'panel' => 'slider',		'priority' => 140,));
	
	// Panels Home Page
		
	$wp_customize->add_section('barbelowslider',      array('title' => __('Bar Slider', 'aedificator'),        'description' => '',             'panel' => 'homepage',		 'priority' => 140,));
	$wp_customize->add_section('whoweare',            array('title' => __('Who We Are', 'aedificator'),        'description' => '',             'panel' => 'homepage',		 'priority' => 140,));	
	$wp_customize->add_section('history',             array('title' => __('History Bar', 'aedificator'),       'description' => '',             'panel' => 'homepage',		 'priority' => 140,));		


 	
	
    // Add Control General Settings
	
	$wp_customize->add_setting('pwt_header_left_text',array(
			'default'	=> __('Welcome to Guest!','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_header_left_text',array(
			'label'	=> __('Header Left Text','aedificator'),
			'section'	=> 'general',
			'setting'	=> 'pwt_header_left_text'
	));	

	$wp_customize->add_setting('pwt_header_email',array(
			'default'	=> __('info@example.com','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_header_email',array(
			'label'	=> __('Header Email','aedificator'),
			'section'	=> 'general',
			'setting'	=> 'pwt_header_email'
	));	

	$wp_customize->add_setting('pwt_header_phone',array(
			'default'	=> __('+1 812-878-587','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_header_phone',array(
			'label'	=> __('Header Phone','aedificator'),
			'section'	=> 'general',
			'setting'	=> 'pwt_header_phone'
	));		
	
	$wp_customize->add_setting('pwt_copyrights',array(
			'default'	=> __('Copyright 2016 Aedificator Theme All Rights Reserved.','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_copyrights',array(
			'label'	=> __('Copyrights Text','aedificator'),
			'section'	=> 'general',
			'setting'	=> 'pwt_copyrights'
	));		
 
    // Add Control Blog Settings


	$wp_customize->add_setting('pwt_blog_image',array(
			'default'	=> esc_url(get_template_directory_uri()).'/assets/images/demo/bgh.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'pwt_blog_image',
		   array(
			   'label'      => __( 'Blog Header Image', 'aedificator' ),
			   'section'    => 'blogpage',
			   'settings'   => 'pwt_blog_image',
			   'context'    => 'pwt_blog_image' 
		   )
	   )
	);		
	
	$wp_customize->add_setting('pwt_blog_page_title',array(
			'default'	=> __('Our Blog','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_blog_page_title',array(
			'label'	=> __('Blog Page Title','aedificator'),
			'section'	=> 'blogpage',
			'setting'	=> 'pwt_blog_page_title'
	));	 
	
    // Add Control Slider

	$wp_customize->add_setting('pwt_slider_image_upload_1',array(
			'default'	=> esc_url(get_template_directory_uri()).'/assets/images/demo/slider1.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'pwt_slider_image_upload_1',
		   array(
			   'label'      => __( 'Upload Image Slider 1', 'aedificator' ),
			   'section'    => 'slide1',
			   'settings'   => 'pwt_slider_image_upload_1',
			   'context'    => 'pwt_slider_image_upload_1' 
		   )
	   )
	);		
		
	$wp_customize->add_setting('pwt_slider_title_1_1',array(
			'default'	=> __('we','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_slider_title_1_1',array(
			'label'	=> __('Slider Title 1','aedificator'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_slider_title_1_1'
	));	 

	$wp_customize->add_setting('pwt_slider_title_2_1',array(
			'default'	=> __('make','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_slider_title_2_1',array(
			'label'	=> __('Slider Title 2','aedificator'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_slider_title_2_1'
	));	 	
	
	$wp_customize->add_setting('pwt_slider_title_3_1',array(
			'default'	=> __('future','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_slider_title_3_1',array(
			'label'	=> __('Slider Title 3','aedificator'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_slider_title_3_1'
	));	 	
			
	$wp_customize->add_setting('pwt_slider_content_1',array(
			'default'	=> __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration','aedificator'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_slider_content_1',array(
	        'type' => 'textarea',
			'label'	=> __('Slider Content','aedificator'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_slider_content_1'
	));	 
	
	$wp_customize->add_setting('pwt_button_slider_text_1',array(
			'default'	=> __('Our Services','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_button_slider_text_1',array(
			'label'	=> __('Slider Button Text','aedificator'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_button_slider_text_1'
	));		
	
	$wp_customize->add_setting('pwt_button_color_link_1',array(
			'default'	=> __('#','aedificator'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_button_color_link_1',array(
			'label'	=> __('Slider Button Link','aedificator'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_button_color_link_1'
	));		
	
	
	$wp_customize->add_setting('pwt_slider_image_upload_2',array(
			'default'	=> esc_url(get_template_directory_uri()).'/assets/images/demo/slider2.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'pwt_slider_image_upload_2',
		   array(
			   'label'      => __( 'Upload Image Slider 2', 'aedificator' ),
			   'section'    => 'slide2',
			   'settings'   => 'pwt_slider_image_upload_2',
			   'context'    => 'pwt_slider_image_upload_2' 
		   )
	   )
	);		
		
	$wp_customize->add_setting('pwt_slider_title_1_2',array(
			'default'	=> __('we','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_slider_title_1_2',array(
			'label'	=> __('Slider Title 2','aedificator'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_slider_title_1_2'
	));	 

	$wp_customize->add_setting('pwt_slider_title_2_2',array(
			'default'	=> __('make','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_slider_title_2_2',array(
			'label'	=> __('Slider Title 2','aedificator'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_slider_title_2_2'
	));	 	
	
	$wp_customize->add_setting('pwt_slider_title_3_2',array(
			'default'	=> __('future','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_slider_title_3_2',array(
			'label'	=> __('Slider Title 3','aedificator'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_slider_title_3_2'
	));	 	
			
	$wp_customize->add_setting('pwt_slider_content_2',array(
			'default'	=> __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration','aedificator'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_slider_content_2',array(
	        'type' => 'textarea',
			'label'	=> __('Slider Content','aedificator'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_slider_content_2'
	));	 
	
	$wp_customize->add_setting('pwt_button_slider_text_2',array(
			'default'	=> __('Our Services','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_button_slider_text_2',array(
			'label'	=> __('Slider Button Text','aedificator'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_button_slider_text_2'
	));		
	
	$wp_customize->add_setting('pwt_button_color_link_2',array(
			'default'	=> __('#','aedificator'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_button_color_link_2',array(
			'label'	=> __('Slider Button Link','aedificator'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_button_color_link_2'
	));		
	

    // Add Control Home Page	
	
	$wp_customize->add_setting('pwt_slider_bar_below_bg_images',array(
			'default'	=> esc_url(get_template_directory_uri()).'/assets/images/demo/bgq.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));	
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'pwt_slider_bar_below_bg_images',
		   array(
			   'label'      => __( 'Slider Bar Below BG Image', 'aedificator' ),
			   'section'    => 'barbelowslider',
			   'settings'   => 'pwt_slider_bar_below_bg_images',
			   'context'    => 'pwt_slider_bar_below_bg_images' 
		   )
	   )
	);		

	$wp_customize->add_setting('pwt_slider_bar_below_text',array(
			'default'	=> __('We are ready to serve you better than other !! For more info Contact us now','aedificator'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_slider_bar_below_text',array(
	        'type' => 'textarea',
			'label'	=> __('Slider Bar Below Text','aedificator'),
			'section'	=> 'barbelowslider',
			'setting'	=> 'pwt_slider_bar_below_text'
	));		

	$wp_customize->add_setting('pwt_slider_bar_below_button_text',array(
			'default'	=> __('get a quote','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_slider_bar_below_button_text',array(
			'label'	=> __('Slider Bar Below Button Text','aedificator'),
			'section'	=> 'barbelowslider',
			'setting'	=> 'pwt_slider_bar_below_button_text'
	));		
	
	$wp_customize->add_setting('pwt_slider_bar_below_button_link',array(
			'default'	=> __('#','aedificator'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_slider_bar_below_button_link',array(
			'label'	=> __('Slider Bar Below Button Link','aedificator'),
			'section'	=> 'barbelowslider',
			'setting'	=> 'pwt_slider_bar_below_button_link'
	));		
	

	$wp_customize->add_setting('pwt_who_box1',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'
			
	));
	
	$wp_customize->add_control('pwt_who_box1',array(
			'label'	=> __('Who We Are Box 1','aedificator'),
			'section'	=> 'whoweare',
			'setting'	=> 'pwt_who_box1',
			'type' => 'dropdown-pages'
	));	

	$wp_customize->add_setting('pwt_who_box2',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'
			
	));
	
	$wp_customize->add_control('pwt_who_box2',array(
			'label'	=> __('Who We Are Box 2','aedificator'),
			'section'	=> 'whoweare',
			'setting'	=> 'pwt_who_box2',
			'type' => 'dropdown-pages'
	));	

	$wp_customize->add_setting('pwt_who_box3',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'
			
	));
	
	$wp_customize->add_control('pwt_who_box3',array(
			'label'	=> __('Who We Are Box 3','aedificator'),
			'section'	=> 'whoweare',
			'setting'	=> 'pwt_who_box3',
			'type' => 'dropdown-pages'
	));		

	
	$wp_customize->add_setting('pwt_history',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'
			
	));
	
	$wp_customize->add_control('pwt_history',array(
			'label'	=> __('Bar History','aedificator'),
			'section'	=> 'history',
			'setting'	=> 'pwt_history',
			'type' => 'dropdown-pages'
	));			
	
	$wp_customize->add_setting('pwt_history_button_text',array(
			'default'	=> __('Contact Us','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_history_button_text',array(	
			'label'	=> __('Bar History Button Text','aedificator'),
			'section'	=> 'history',
			'setting'	=> 'pwt_history_button_text'
	));		
	
	$wp_customize->add_setting('pwt_history_button_link',array(
			'default'	=> __('#','aedificator'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_history_button_link',array(
			'label'	=> __('Bar History Button Link','aedificator'),
			'section'	=> 'history',
			'setting'	=> 'pwt_history_button_link'
	));		
	
}
add_action( 'customize_register', 'aedificator_customize_register' );

function aedificator_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {  return intval( $input ); }
}

function aedificator_custom_customize_enqueue() {
	wp_enqueue_script( 'aedificator-custom-customize', get_template_directory_uri() . '/assets/js/custom-customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'aedificator_custom_customize_enqueue' );
