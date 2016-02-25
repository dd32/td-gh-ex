<?php
/**
 * Avvocato Theme Customizer
 *
 * @package Avvocato
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function avvocato_customize_register( $wp_customize ) {
	
	// Update Your Settings
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');	
	

    // Add General Sections

    $wp_customize->add_section('general',             array('title' => __('General', 'avvocato'),          'description' => '',                                         'priority' => 130,));
    $wp_customize->add_section('blogpage',            array('title' => __('Blog', 'avvocato'),             'description' => '',                                         'priority' => 170,));
    $wp_customize->add_section('socialmedia',         array('title' => __('Social Media', 'avvocato'),     'description' => '',                                         'priority' => 180,));		


	// Add Panels

	$wp_customize->add_panel('slider',                array('title' => __('Slider', 'avvocato' ),          'description' => __( 'Slides Details', 'avvocato' ),      'priority' => 140));
    $wp_customize->add_panel('homepage',              array('title' => __('Home Page', 'avvocato'),        'description' => '',                                         'priority' => 160,));

	// Panels Slider
		
	$wp_customize->add_section('slide1',              array('title' => __('Slide 1', 'avvocato'),          'description' => '',             'panel' => 'slider',		'priority' => 140,));
	$wp_customize->add_section('slide2',              array('title' => __('Slide 2', 'avvocato'),          'description' => '',             'panel' => 'slider',		'priority' => 140,));
	
	// Panels Home Page

	$wp_customize->add_section('whyus',               array('title' => __('Why us', 'avvocato'),           'description' => '',             'panel' => 'homepage',		 'priority' => 140,));		
	$wp_customize->add_section('infobox',             array('title' => __('Info Box', 'avvocato'),         'description' => '',             'panel' => 'homepage',		 'priority' => 140,));



 	
	
    // Add Control General Settings
	
	$wp_customize->add_setting('pwt_logo_upload',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'pwt_logo_upload',
		   array(
			   'label'      => __( 'Upload Logo', 'avvocato' ),
			   'section'    => 'general',
			   'settings'   => 'pwt_logo_upload',
			   'context'    => 'pwt_logo_upload' 
		   )
	   )
	);		
		
	$wp_customize->add_setting('pwt_text_logo_1',array(
			'default'	=> __('Avvocato','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_text_logo_1',array(
			'label'	=> __('Text Logo 1','avvocato'),
			'section'	=> 'general',
			'setting'	=> 'pwt_text_logo_1'
	));	 

	$wp_customize->add_setting('pwt_text_logo_2',array(
			'default'	=> __('Theme','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_text_logo_2',array(
			'label'	=> __('Text Logo 2','avvocato'),
			'section'	=> 'general',
			'setting'	=> 'pwt_text_logo_2'
	));	  
	

	$wp_customize->add_setting('pwt_header_email',array(
			'default'	=> __('info@example.com','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_header_email',array(
			'label'	=> __('Header Email','avvocato'),
			'section'	=> 'general',
			'setting'	=> 'pwt_header_email'
	));	

	$wp_customize->add_setting('pwt_header_phone',array(
			'default'	=> __('+1 812-878-587','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_header_phone',array(
			'label'	=> __('Header Phone','avvocato'),
			'section'	=> 'general',
			'setting'	=> 'pwt_header_phone'
	));		
	
	$wp_customize->add_setting('pwt_copyrights',array(
			'default'	=> __('Copyright 2016 Avvocato Theme All Rights Reserved.','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_copyrights',array(
			'label'	=> __('Copyrights Text','avvocato'),
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
			   'label'      => __( 'Blog BG Image', 'avvocato' ),
			   'section'    => 'blogpage',
			   'settings'   => 'pwt_blog_image',
			   'context'    => 'pwt_blog_image' 
		   )
	   )
	);		
	
	$wp_customize->add_setting('pwt_blog_page_title',array(
			'default'	=> __('Our Blog','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_blog_page_title',array(
			'label'	=> __('Blog Page Title','avvocato'),
			'section'	=> 'blogpage',
			'setting'	=> 'pwt_blog_page_title'
	));	 
	
	$wp_customize->add_setting('pwt_blog_subtitle',array(
			'default'	=> __('Class aptent tactic socislifd lorem ipsum dummy','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_blog_subtitle',array(
		    'type' => 'textarea',
			'label'	=> __('Blog Page Sub Title','avvocato'),
			'section'	=> 'blogpage',
			'setting'	=> 'pwt_blog_subtitle'
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
			   'label'      => __( 'Upload Image Slider', 'avvocato' ),
			   'section'    => 'slide1',
			   'settings'   => 'pwt_slider_image_upload_1',
			   'context'    => 'pwt_slider_image_upload_1' 
		   )
	   )
	);		
		
	$wp_customize->add_setting('pwt_slider_title_1',array(
			'default'	=> __('High Qualified Lawyers here','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_slider_title_1',array(
			'label'	=> __('Slider Title','avvocato'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_slider_title_1'
	));	 
		
	$wp_customize->add_setting('pwt_slider_content_1',array(
			'default'	=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy','avvocato'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_slider_content_1',array(
	        'type' => 'textarea',
			'label'	=> __('Slider Content','avvocato'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_slider_content_1'
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
			   'label'      => __( 'Upload Image Slider', 'avvocato' ),
			   'section'    => 'slide2',
			   'settings'   => 'pwt_slider_image_upload_2',
			   'context'    => 'pwt_slider_image_upload_2' 
		   )
	   )
	);		
		
	$wp_customize->add_setting('pwt_slider_title_2',array(
			'default'	=> __('High Qualified Lawyers here','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_slider_title_2',array(
			'label'	=> __('Slider Title','avvocato'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_slider_title_2'
	));	 
			
	$wp_customize->add_setting('pwt_slider_content_2',array(
			'default'	=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy','avvocato'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_slider_content_2',array(
	        'type' => 'textarea',
			'label'	=> __('Slider Content','avvocato'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_slider_content_2'
	));	 
	

    // Add Control Home Page	
			

	$wp_customize->add_setting('pwt_whyus_icon_1',array(
			'default'	=> __('graduation-cap','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_icon_1',array(
			'label'	=> __('Icon 1','avvocato'),
			'description' => __('Select a icon in this list <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a> and enter the code','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_icon_1'
	));			
			
	$wp_customize->add_setting('pwt_whyus_title_1',array(
			'default'	=> __('Lorem ipsum','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_title_1',array(
			'label'	=> __('Title 1','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_title_1'
	));		

	$wp_customize->add_setting('pwt_whyus_content_1',array(
			'default'	=> __('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.','avvocato'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_whyus_content_1',array(
	        'type' => 'textarea',
			'label'	=> __('Content 1','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_content_1'
	));		
	

	$wp_customize->add_setting('pwt_whyus_button_text_1',array(
			'default'	=> __('Read More','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_button_text_1',array(
			'label'	=> __('Button Text 1','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_button_text_1'
	));	
	
	$wp_customize->add_setting('pwt_whyus_button_link_1',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_whyus_button_link_1',array(
			'label'	=> __('Link Button 1','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_button_link_1'
	));		
	
	$wp_customize->add_setting('pwt_whyus_icon_2',array(
			'default'	=> __('book','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_icon_2',array(
			'label'	=> __('Icon 2','avvocato'),
			'description' => __('Select a icon in this list <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a> and enter the code','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_icon_2'
	));			
			
	$wp_customize->add_setting('pwt_whyus_title_2',array(
			'default'	=> __('Lorem ipsum','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_title_2',array(
			'label'	=> __('Title 2','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_title_2'
	));		

	$wp_customize->add_setting('pwt_whyus_content_2',array(
			'default'	=> __('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.','avvocato'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_whyus_content_2',array(
	        'type' => 'textarea',
			'label'	=> __('Content 2','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_content_2'
	));		
	

	$wp_customize->add_setting('pwt_whyus_button_text_2',array(
			'default'	=> __('Read More','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_button_text_2',array(
			'label'	=> __('Button Text 2','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_button_text_2'
	));	
	
	$wp_customize->add_setting('pwt_whyus_button_link_2',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_whyus_button_link_2',array(
			'label'	=> __('Link Button 2','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_button_link_2'
	));	

	$wp_customize->add_setting('pwt_whyus_icon_3',array(
			'default'	=> __('briefcase','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_icon_3',array(
			'label'	=> __('Icon 3','avvocato'),
			'description' => __('Select a icon in this list <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a> and enter the code','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_icon_3'
	));			
			
	$wp_customize->add_setting('pwt_whyus_title_3',array(
			'default'	=> __('Lorem ipsum','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_title_3',array(
			'label'	=> __('Title 3','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_title_3'
	));		

	$wp_customize->add_setting('pwt_whyus_content_3',array(
			'default'	=> __('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.','avvocato'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_whyus_content_3',array(
	        'type' => 'textarea',
			'label'	=> __('Content 3','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_content_3'
	));		
	

	$wp_customize->add_setting('pwt_whyus_button_text_3',array(
			'default'	=> __('Read More','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_button_text_3',array(
			'label'	=> __('Button Text 3','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_button_text_3'
	));	
	
	$wp_customize->add_setting('pwt_whyus_button_link_3',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_whyus_button_link_3',array(
			'label'	=> __('Link Button 3','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_button_link_3'
	));	

	$wp_customize->add_setting('pwt_whyus_icon_4',array(
			'default'	=> __('institution','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_icon_4',array(
			'label'	=> __('Icon 4','avvocato'),
			'description' => __('Select a icon in this list <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a> and enter the code','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_icon_4'
	));			
			
	$wp_customize->add_setting('pwt_whyus_title_4',array(
			'default'	=> __('Lorem ipsum','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_title_4',array(
			'label'	=> __('Title 4','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_title_4'
	));		

	$wp_customize->add_setting('pwt_whyus_content_4',array(
			'default'	=> __('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.','avvocato'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_whyus_content_4',array(
	        'type' => 'textarea',
			'label'	=> __('Content 4','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_content_4'
	));		
	

	$wp_customize->add_setting('pwt_whyus_button_text_4',array(
			'default'	=> __('Read More','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_whyus_button_text_4',array(
			'label'	=> __('Button Text 4','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_button_text_4'
	));	
	
	$wp_customize->add_setting('pwt_whyus_button_link_4',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_whyus_button_link_4',array(
			'label'	=> __('Link Button 4','avvocato'),
			'section'	=> 'whyus',
			'setting'	=> 'pwt_whyus_button_link_4'
	));		
	
	$wp_customize->add_setting('pwt_info_box_text',array(
			'default'	=> __('It is a long established fact that a reader will be distracted lorem ipsum...','avvocato'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('pwt_info_box_text',array(
	        'type' => 'textarea',
			'label'	=> __('Info Box Text','avvocato'),
			'section'	=> 'infobox',
			'setting'	=> 'pwt_info_box_text'
	));		

	$wp_customize->add_setting('pwt_info_box_button_text',array(
			'default'	=> __('Contact Us','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_info_box_button_text',array(
			'label'	=> __('Info Box Button Text','avvocato'),
			'section'	=> 'infobox',
			'setting'	=> 'pwt_info_box_button_text'
	));		
	
	$wp_customize->add_setting('pwt_info_box_button_link',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_info_box_button_link',array(
			'label'	=> __('Info Box Button Link','avvocato'),
			'section'	=> 'infobox',
			'setting'	=> 'pwt_info_box_button_link'
	));		
	
    // Social Media	
	

	$wp_customize->add_setting('pwt_social_media_code1',array(
			'default'	=> __('facebook','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_social_media_code1',array(
			'label'	=> __('Social Media Code 1','avvocato'),
			'description' => __('Select a icon in this list <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a> and enter the code','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_code1'
	));		
	
	$wp_customize->add_setting('pwt_social_media_link1',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_social_media_link1',array(
			'label'	=> __('Social Media Link 1','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_link1'
	));		
	
	$wp_customize->add_setting('pwt_social_media_code2',array(
			'default'	=> __('twitter','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_social_media_code2',array(
			'label'	=> __('Social Media Code 2','avvocato'),
			'description' => __('Select a icon in this list <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a> and enter the code','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_code2'
	));		
	
	$wp_customize->add_setting('pwt_social_media_link2',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_social_media_link2',array(
			'label'	=> __('Social Media Link 2','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_link2'
	));		

	$wp_customize->add_setting('pwt_social_media_code3',array(
			'default'	=> __('google-plus','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_social_media_code3',array(
			'label'	=> __('Social Media Code 3','avvocato'),
			'description' => __('Select a icon in this list <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a> and enter the code','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_code3'
	));		
	
	$wp_customize->add_setting('pwt_social_media_link3',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_social_media_link3',array(
			'label'	=> __('Social Media Link 3','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_link3'
	));		

	$wp_customize->add_setting('pwt_social_media_code4',array(
			'default'	=> __('pinterest','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_social_media_code4',array(
			'label'	=> __('Social Media Code 4','avvocato'),
			'description' => __('Select a icon in this list <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a> and enter the code','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_code4'
	));		
	
	$wp_customize->add_setting('pwt_social_media_link4',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_social_media_link4',array(
			'label'	=> __('Social Media Link 4','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_link4'
	));		

	$wp_customize->add_setting('pwt_social_media_code5',array(
			'default'	=> __('linkedin','avvocato'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('pwt_social_media_code5',array(
			'label'	=> __('Social Media Code 5','avvocato'),
			'description' => __('Select a icon in this list <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a> and enter the code','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_code5'
	));		
	
	$wp_customize->add_setting('pwt_social_media_link5',array(
			'default'	=> __('#','avvocato'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pwt_social_media_link5',array(
			'label'	=> __('Social Media Link 5','avvocato'),
			'section'	=> 'socialmedia',
			'setting'	=> 'pwt_social_media_link5'
	));		
	
}
add_action( 'customize_register', 'avvocato_customize_register' );


function avvocato_custom_customize_enqueue() {
	wp_enqueue_script( 'avvocato-custom-customize', get_template_directory_uri() . '/assets/js/custom-customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'avvocato_custom_customize_enqueue' );
