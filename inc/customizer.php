<?php
/**
 * anorya Theme Customizer
 *
 * @package anorya
 */

	function anorya_customize_register( $wp_customize ) {
	
		//remove default settings not used by the theme
		$wp_customize->remove_control("header_textcolor");
		$wp_customize->remove_section("colors");
		$wp_customize->remove_section("background_image");
		$wp_customize->remove_section("static_front_page");
		$wp_customize->remove_section("header_image");
	
		$wp_customize->get_setting( 'blogname' )->transport         = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'refresh';
		$wp_customize->get_section( 'title_tagline')->priority =1;
		
		
		
		/*
		  Header Options
		*/
		$wp_customize->add_panel( 'anorya_header_options', array(
								  'priority'       => 2,
								  'capability'     => 'edit_theme_options',
								  'theme_supports' => '',
								  'title'          => __( 'Header', 'anorya' ),));
	
		/*
		*General Header Settings
		*/
		$wp_customize->add_section( 'anorya_header_settings', array(
									'priority'       => 1,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Header Settings', 'anorya'),
									'panel'  => 'anorya_header_options',	) );
		
		//top bar display
		$wp_customize->add_setting( 'anorya_top_bar_display_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize',) );
		$wp_customize->add_control(	'anorya_top_bar_display_control', 	array(
									'label'    => __( 'Display Header Top Bar', 'anorya' ),
									'section'  => 'anorya_header_settings',
									'settings' => 'anorya_top_bar_display_setting',
									'type'     => 'checkbox',));										
	
		
		//logo upload
		$wp_customize->add_setting( 'anorya_logo_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_logo_image_control', array(
																								'label'      => __( 'Change blog logo', 'anorya' ),
																								'section'    => 'anorya_header_settings',
																								'settings'   => 'anorya_logo_image_setting',)));	
		//header style
		$wp_customize->add_setting( 'anorya_header_style_setting' , array(
									'default' => '3',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize',) );
		$wp_customize->add_control(	'anorya_header_style_control', 	array(
									'label'    => __( 'Select Header Style', 'anorya' ),
									'section'  => 'anorya_header_settings',
									'settings' => 'anorya_header_style_setting',
									'type'     => 'radio',
									'choices'  => array('1'  => __('Header Style 1','anorya'),
														'2'  => __('Header Style 2','anorya'),
														'3'  => __('Header Style 3','anorya'),
														'4'  => __('Header Style 4','anorya'),
														'5'  => __('Header Style 5','anorya'),),));			
		
		//header image backround upload
		$wp_customize->add_setting( 'anorya_header_image_background_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_header_image_background_control', array(
																								'label'      => __( 'Upload Header Background', 'anorya' ),
																								'section'    => 'anorya_header_settings',
																								'settings'   => 'anorya_header_image_background_setting',
																								'description' => __('Header background is available for header styles 4 & 5','anorya'),)));	
		
		/*
		*Header Banner Setting
		*/
		
		$wp_customize->add_section( 'anorya_header_banner_section', array(
									'priority'       => 2,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Header Banner', 'anorya'),
									'panel'  => 'anorya_header_options',) );
		
		//header banner image  upload
		$wp_customize->add_setting( 'anorya_header_banner_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_header_banner_image_control', array(
																								'label'      => __( 'Upload Banner Image', 'anorya' ),
																								'section'    => 'anorya_header_banner_section',
																								'settings'   => 'anorya_header_banner_image_setting')));	
		
		//header banner url
		$wp_customize->add_setting( 'anorya_header_banner_link_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize',) );
		$wp_customize->add_control(	'header_banner_link_control', 	array(
									'label'    => __( 'Enter Banner Link Url', 'anorya' ),
									'section'  => 'anorya_header_banner_section',
									'settings' => 'anorya_header_banner_link_setting',
									'type'     => 'url',));

		/*
		*Social Linnks Section 
		*/

		$wp_customize->add_section( 'anorya_social_links_section', array(
									'priority'       => 3,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Social Media Links', 'anorya'),));
		//Facebook Link Setting
		$wp_customize->add_setting( 'anorya_facebook_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'facebook_link_control', 	array(
									'label'    => __( 'Enter your Facebook Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_facebook_link_setting',
									'type'     => 'url',));

		//Twitter Link Setting
		$wp_customize->add_setting( 'anorya_twitter_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_twitter_link_control', 	array(
									'label'    => __( 'Enter your Twitter Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_twitter_link_setting',
									'type'     => 'url',));	

		//Google+ Link Setting
		$wp_customize->add_setting( 'anorya_google_plus_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_google_plus_link_control', 	array(
									'label'    => __( 'Enter your Google+ Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_google_plus_link_setting',
									'type'     => 'url',));	

		//Instagram Link Setting
		$wp_customize->add_setting( 'anorya_instagram_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_instagram_link_control', 	array(
									'label'    => __( 'Enter your Instagram Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_instagram_link_setting',
									'type'     => 'url',));

		//LinkedIn Link Setting
		$wp_customize->add_setting( 'anorya_linkedin_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_linkedin_link_control', 	array(
									'label'    => __( 'Enter your linkedIn Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_linkedin_link_setting',
									'type'     => 'url',));

		//youTube Link Setting
		$wp_customize->add_setting( 'anorya_youtube_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_youtube_link_control', 	array(
									'label'    => __( 'Enter your youTube Channel Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_youtube_link_setting',
									'type'     => 'url',));


		/*
		* Sidebar Settings
		*/
		
		$wp_customize->add_section( 'anorya_sidebar_settings', array(
									'priority'       => 3,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('SideBar Settings', 'anorya'),));
		
			
		
		// home sidebar
		$wp_customize->add_setting( 'anorya_home_sidebar_setting' , array(
									'default' => 'hidden',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_home_sidebar_control', 	array(
									'label'    => __( 'Sidebar options for Home', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_home_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => __('Left  Sidebar','anorya'),
														'right'  => __('Right  Sidebar','anorya'),
														'hidden'  => __('No Sidebar','anorya'),),));

		// archives-categories sidebar
		$wp_customize->add_setting( 'anorya_archives_sidebar_setting' , array(
									'default' => 'hidden',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_archives_sidebar_control', 	array(
									'label'    => __( 'Sidebar Options for Archives/Categories', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_archives_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => __('Left  Sidebar','anorya'),
														'right'  => __('Right  Sidebar','anorya'),
														'hidden'  => __('No Sidebar','anorya'),),));

		// single post sidebar
		$wp_customize->add_setting( 'anorya_single_post_sidebar_setting' , array(
									'default' => 'hidden',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_single_post_sidebar_control', 	array(
									'label'    => __( 'SidebarOptions for Posts', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_single_post_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => __('Left  Sidebar','anorya'),
														'right'  => __('Right  Sidebar','anorya'),
														'hidden'  => __('No Sidebar','anorya'),),));

		// single page sidebar
		$wp_customize->add_setting( 'anorya_single_page_sidebar_setting' , array(
									'default' => 'hidden',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_single_page_sidebar_control', 	array(
									'label'    => __( 'Sidebar Options for Pages', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_single_page_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => __('Left  Sidebar','anorya'),
														'right'  => __('Right  Sidebar','anorya'),
														'hidden'  => __('No Sidebar','anorya'),),));

		// search results sidebar
		$wp_customize->add_setting( 'anorya_search_sidebar_setting' , array(
									'default' => 'hidden',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_search_sidebar_control', 	array(
									'label'    => __( 'Sidebar Options for Search', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_search_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => __('Left  Sidebar','anorya'),
														'right'  => __('Right  Sidebar','anorya'),
														'hidden'  => __('No Sidebar','anorya'),),));														

		/*
		* Blog Setting *
		*/
		$wp_customize->add_section( 'anorya_blog_settings', array(
									'priority'       => 4,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Blog Settings', 'anorya'),));
		
		//Back To Top Setting display
		$wp_customize->add_setting( 'anorya_back_to_top_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize') );
		$wp_customize->add_control(	'anorya_back_to_top_control', 	array(
									'label'    => __( 'Display Back To Top Button', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_back_to_top_setting',
									'type'     => 'checkbox',
									'description' => __('Scroll to Top Button display for all pages of the site','anorya'),));
									
		//Loader Setting display
		$wp_customize->add_setting( 'anorya_loader_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize') );
		$wp_customize->add_control(	'anorya_loader_control', 	array(
									'label'    => __( 'Display Content Loader', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_loader_setting',
									'type'     => 'checkbox',
									'description' => __('Loading animation is displayed for all the pages of the site. It\'s used in case
									content takes too long to load','anorya'),));		
		
		// display promo boxes  
		$wp_customize->add_setting( 'anorya_display_promo_boxes_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize',) );
		$wp_customize->add_control(	'anorya_display_promo_boxes_control', 	array(
									'label'    => __( 'Display Home Promo Boxes', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_display_promo_boxes_setting',
									'type'     => 'checkbox',));
		
		
		// home layout
		$wp_customize->add_setting( 'anorya_home_layout_setting' , array(
									'default' => 'anorya_full_width_grid_layout',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_home_layout_control', 	array(
									'label'    => __( 'Select Home layout', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_home_layout_setting',
									'type'     => 'radio',
									'choices'  => array('anorya_full_width_layout'  => __('Full Width Layout','anorya'),
														'anorya_list_layout'  => __('List Layout','anorya'),
														'anorya_grid_layout'  => __('Grid  Columns Layout','anorya'),
														'anorya_full_width_list_layout'  => __('First Post Full Width and the rest List Layout','anorya'),
														'anorya_full_width_grid_layout'  => __('First Post Full Width and the rest Grid Layout','anorya'),),));

		// Archives layout
		$wp_customize->add_setting( 'anorya_archives_layout_setting' , array(
									'default' => 'anorya_list_layout',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_archives_layout_control', 	array(
									'label'    => __( 'Archives/Categories/Search Results layout', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_archives_layout_setting',
									'type'     => 'radio',
									'choices'  => array('anorya_full_width_layout'  => __('Full Width Layout','anorya'),
														'anorya_list_layout'  => __('List Layout','anorya'),
														'anorya_grid_layout'  => __('Grid  Columns Layout','anorya'),
														'anorya_full_width_list_layout'  => __('First Post Full Width and the rest List Layout','anorya'),
														'anorya_full_width_grid_layout'  => __('First Post Full Width and the rest Grid Layout','anorya'),),));
		// Archives Grid Columns layout
		$wp_customize->add_setting( 'anorya_grid_columns_setting' , array(
									'default' => 2,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_grid_columns_control', 	array(
									'label'    => __( 'Number of columns for grid layout', 'anorya' ),
									'description' => __('3 Column Grid is intended for layouts without sidebars','anorya'),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_grid_columns_setting',
									'type'     => 'select',
									'choices'  => array(2  => __('2 Columns Grid','anorya'),
														3  => __('3 Columns Grid','anorya'),),));												

		// full text on posts
		$wp_customize->add_setting( 'anorya_full_text_posts_setting' , array(
									'default' => false,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize') );
		$wp_customize->add_control(	'anorya_full_text_posts_control', 	array(
									'label'    => __( 'Display the full post  instead of excerpt.', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_full_text_posts_setting',
									'type'     => 'checkbox',
									'description' => __('Only available for Full Width Post Layout','anorya'),));
		
		/*
		* Home Slider Settings *
		*/
		$wp_customize->add_section( 'anorya_home_slider_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Home Slider Settings', 'anorya'),));
									
		// Slider Type
		$wp_customize->add_setting( 'anorya_slider_type_setting' , array(
									'default' => 'standard',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_slider_type_control', 	array(
									'label'    => __( 'Select the home slider style', 'anorya' ),
									'section'  => 'anorya_home_slider_settings',
									'settings' => 'anorya_slider_type_setting',
									'type'     => 'radio',
									'choices'  => array('full'  => __('Full Width Slider','anorya'),
														'standard'  => __('Standard Slider','anorya'),),));
		
		// slider posts number
		$wp_customize->add_setting( 'anorya_slider_posts_number_setting' , array(
									'default' => 4,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_range_sanitize',) );
		$wp_customize->add_control(	'anorya_slider_posts_number_control', 	array(
									'label'    => __( 'How many posts to show? ', 'anorya' ),
									'section'  => 'anorya_home_slider_settings',
									'settings' => 'anorya_slider_posts_number_setting',
									'type'     => 'range',
									'input_attrs' => array( 'min'   => 4,
															 'max'   => 8,
															 'step'  => 1,),));	
		
		

		// Slider posts category
		$wp_customize->add_setting( 'anorya_slider_posts_category_setting' , array(
									'default' => 'ALL',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize',) );
		$wp_customize->add_control(	'anorya_slider_posts_category_control', 	array(
									'label'    => __( 'Select the slider posts category', 'anorya' ),
									'section'  => 'anorya_home_slider_settings',
									'settings' => 'anorya_slider_posts_category_setting',
									'type'     => 'select',
									'choices'  => anorya_get_post_slider_categories(),));
		
		/*
		* Footer Setting *
		*/
		$wp_customize->add_section( 'anorya_footer_settings', array(
									'priority'       => 10,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Footer Settings', 'anorya'),));
		//footer slider							
		$wp_customize->add_setting( 'anorya_footer_slider_display_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize',) );
		$wp_customize->add_control(	'anorya_footer_slider_display_control', 	array(
									'label'    => __( 'Display Footer Slider', 'anorya' ),
									'section'  => 'anorya_footer_settings',
									'settings' => 'anorya_footer_slider_display_setting',
									'type'     => 'checkbox',));
		//footer slider no. of posts  
		$wp_customize->add_setting( 'anorya_footer_sliders_posts_no_setting' , array(
									'default' => 4,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_range_sanitize',) );
		$wp_customize->add_control(	'anorya_footer_sliders_posts_no_control', 	array(
									'label'    => __( 'Enter the number of that are going to be displayed on the footer slider. ', 'anorya' ),
									'section'  => 'anorya_footer_settings',
									'settings' => 'anorya_footer_sliders_posts_no_setting',
									'type'     => 'range',
									'input_attrs' => array( 'min'   => 6,
															 'max'   => 8,
															 'step'  => 1,),));
		//footer slider category
		$wp_customize->add_setting( 'anorya_footer_slider_posts_category_setting' , array(
									'default' => 'ALL',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize',) );
		$wp_customize->add_control(	'anorya_footer_slider_posts_category_control', 	array(
									'label'    => __( 'Select the slider posts category', 'anorya' ),
									'section'  => 'anorya_footer_settings',
									'settings' => 'anorya_footer_slider_posts_category_setting',
									'type'     => 'select',
									'choices'  => anorya_get_post_slider_categories(),));
		
		//footer widget							
		$wp_customize->add_setting( 'anorya_footer_widgets_display_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize',) );
		$wp_customize->add_control(	'anorya_footer_widgets_display_control', 	array(
									'label'    => __( 'Display Footer Widgets Areas', 'anorya' ),
									'section'  => 'anorya_footer_settings',
									'settings' => 'anorya_footer_widgets_display_setting',
									'type'     => 'checkbox',));
		//footer copyright text 
		$wp_customize->add_setting( 'anorya_footer_copyright_text_setting' , array(
									'default' => ' ',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_nonhtml_sanitize',) );
		$wp_customize->add_control(	'anorya_footer_copyright_text_control', 	array(
									'label'    => __( 'Enter Footer Copyright Text', 'anorya' ),
									'section'  => 'anorya_footer_settings',
									'settings' => 'anorya_footer_copyright_text_setting',
									'type'     => 'textarea',));

		/*
		* Home Promo Boxes  *
		*/
		
		$wp_customize->add_panel( 'anorya_promo_boxes_panel', array(
								  'priority'       => 6,
								  'capability'     => 'edit_theme_options',
								  'theme_supports' => '',
								  'title'          => __( 'Home Promo Boxes', 'anorya' ),));
		
		
		// PROMO BOX 1
		$wp_customize->add_section( 'anorya_promo_box1_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'panel'  => 'anorya_promo_boxes_panel',
									'title'          => __('Promo Box 1', 'anorya'),));

		
		//promo box 1 image
		$wp_customize->add_setting( 'anorya_promobox1_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_promobox1_image_control', array(
																								'label'      => __( 'Promo Box  Image', 'anorya' ),
																								'section'    => 'anorya_promo_box1_settings',
																								'settings'   => 'anorya_promobox1_image_setting')));	
																								
		//promo box 1 SubTitle
		$wp_customize->add_setting( 'anorya_promobox1_subtitle_setting' , array(
									'default' => __('Read More','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox1_subtitle_control', 	array(
									'label'    => __( 'Promo Box SubTitle', 'anorya' ),
									'section'  => 'anorya_promo_box1_settings',
									'settings' => 'anorya_promobox1_subtitle_setting',
									'type'     => 'text',));
		
		//promo box 1 Title
		$wp_customize->add_setting( 'anorya_promobox1_title_setting' , array(
									'default' => __('Promo Box 1','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox1_title_control', 	array(
									'label'    => __( 'Promo Box Title', 'anorya' ),
									'section'  => 'anorya_promo_box1_settings',
									'settings' => 'anorya_promobox1_title_setting',
									'type'     => 'text',));	
		
		//promo box 1 Link
		$wp_customize->add_setting( 'anorya_promobox1_url_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox1_url_control', 	array(
									'label'    => __( 'Promo Box  Link', 'anorya' ),
									'section'  => 'anorya_promo_box1_settings',
									'settings' => 'anorya_promobox1_url_setting',
									'type'     => 'url',));	

		// PROMO BOX 2
		$wp_customize->add_section( 'anorya_promo_box2_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'panel'  => 'anorya_promo_boxes_panel',
									'title'          => __('Promo Box 2', 'anorya'),));

		
		//promo box 2 image
		$wp_customize->add_setting( 'anorya_promobox2_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_promobox2_image_control', array(
																								'label'      => __( 'Promo Box  Image', 'anorya' ),
																								'section'    => 'anorya_promo_box2_settings',
																								'settings'   => 'anorya_promobox2_image_setting')));	
																								
		//promo box 2 SubTitle
		$wp_customize->add_setting( 'anorya_promobox2_subtitle_setting' , array(
									'default' => __('Read More','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox2_subtitle_control', 	array(
									'label'    => __( 'Promo Box Subtitle', 'anorya' ),
									'section'  => 'anorya_promo_box2_settings',
									'settings' => 'anorya_promobox2_subtitle_setting',
									'type'     => 'text',));										
		
		//promo box 2 Title
		$wp_customize->add_setting( 'anorya_promobox2_title_setting' , array(
									'default' => __('Promo Box 2','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox2_title_control', 	array(
									'label'    => __( 'Promo Box Title', 'anorya' ),
									'section'  => 'anorya_promo_box2_settings',
									'settings' => 'anorya_promobox2_title_setting',
									'type'     => 'text',));	
		
		//promo box 2 Link
		$wp_customize->add_setting( 'anorya_promobox2_url_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox2_url_control', 	array(
									'label'    => __( 'Promo Box Link', 'anorya' ),
									'section'  => 'anorya_promo_box2_settings',
									'settings' => 'anorya_promobox2_url_setting',
									'type'     => 'url',));

		// PROMO BOX 3
		$wp_customize->add_section( 'anorya_promo_box3_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'panel'  => 'anorya_promo_boxes_panel',
									'title'          => __('Promo Box 3', 'anorya'),));

		
		//promo box 3 image
		$wp_customize->add_setting( 'anorya_promobox3_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_promobox3_image_control', array(
																								'label'      => __( 'Promo Box Image', 'anorya' ),
																								'section'    => 'anorya_promo_box3_settings',
																								'settings'   => 'anorya_promobox3_image_setting')));	
																								
		
		//promo box 3 SubTitle
		$wp_customize->add_setting( 'anorya_promobox3_subtitle_setting' , array(
									'default' => __('Read More','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox3_subtitle_control', 	array(
									'label'    => __( 'Promo Box Subtitle', 'anorya' ),
									'section'  => 'anorya_promo_box3_settings',
									'settings' => 'anorya_promobox3_subtitle_setting',
									'type'     => 'text',));

		//promo box 3 Title
		$wp_customize->add_setting( 'anorya_promobox3_title_setting' , array(
									'default' => __('Promo Box 3','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox3_title_control', 	array(
									'label'    => __( 'Promo Box Title', 'anorya' ),
									'section'  => 'anorya_promo_box3_settings',
									'settings' => 'anorya_promobox3_title_setting',
									'type'     => 'text',));	
							
		
		//promo box 3 Link
		$wp_customize->add_setting( 'anorya_promobox3_url_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox2_url_control', 	array(
									'label'    => __( 'Promo Box Link', 'anorya' ),
									'section'  => 'anorya_promo_box3_settings',
									'settings' => 'anorya_promobox3_url_setting',
									'type'     => 'url',));									
											
		
		
		
		
		/*
		* Typography Settings *
		*/
		$wp_customize->add_section( 'anorya_typography_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Typography Settings', 'anorya'),));	
		
		//headings font 
		$wp_customize->add_setting( 'anorya_headings_font_family_setting' , array(
									'default' => 'Antic Didone,serif',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize',) );
		$wp_customize->add_control(	'anorya_headings_font_family_control', 	array(
									'label'    => __( 'Select the headings font family', 'anorya' ),
									'section'  => 'anorya_typography_settings',
									'settings' => 'anorya_headings_font_family_setting',
									'type'     => 'select',
									'choices'  => anorya_google_fonts_array(),));

		
		//Body Text font 
		$wp_customize->add_setting( 'anorya_body_font_family_setting' , array(
									'default' => 'Open Sans, sans-serif',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize',) );
		$wp_customize->add_control(	'anorya_body_font_family_control', 	array(
									'label'    => __( 'Select the Body font family', 'anorya' ),
									'section'  => 'anorya_typography_settings',
									'settings' => 'anorya_body_font_family_setting',
									'type'     => 'select',
									'choices'  => anorya_google_fonts_array(),));

		//Body Text font size  
		$wp_customize->add_setting( 'anorya_body_font_size_setting' , array(
									'default' => 14,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_range_sanitize',) );
		$wp_customize->add_control(	'anorya_body_font_size_control', 	array(
									'label'    => __( 'Font Size: ', 'anorya' ),
									'section'  => 'anorya_typography_settings',
									'settings' => 'anorya_body_font_size_setting',
									'type'     => 'range',
									'input_attrs' => array( 'min'   => 16,
															 'max'   => 22,
															 'step'  => 1,),));

		//Font Language
		$wp_customize->add_setting( 'anorya_font_language_setting' , array(
									'default' => 'latin',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize',) );
		$wp_customize->add_control(	'anorya_font_language_control', 	array(
									'label'    => __( 'Select Language Character Set for the selected fonts.', 'anorya' ),
									'description' => __('Note: Not all fonts support all the languages character sets listed','anorya'),
									'section'  => 'anorya_typography_settings',
									'settings' => 'anorya_font_language_setting',
									'type'     => 'select',
									'choices'  => array('arabic' => 'Arabic',
														'bengali' => 'Bengali',
														'cyrillic' => 'Cyrillic',
														'devanagari' => 'Devanagari',
														'greek' => 'Greek',
														'gujarati' => 'Gujarati',
														'hebrew' => 'Hebrew',
														'kannada' => 'Kannada',
														'khmer' => 'Khmer',
														'latin' => 'Latin',
														'malayalam' => 'Malayalam',
														'myanmar' => 'Myanmar',
														'oriya' => 'Oriya',
														'sinhala' => 'Sinhala',
														'tamil' => 'Tamil',
														'telugu' => 'Telugu',
														'thai' => 'Thai',
														'vietnamese' => 'Vietnamese'),));	

		/*
		* Color Settings *
		*/
		$wp_customize->add_section( 'anorya_color_settings', array(
									'priority'       => 7,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Color Settings', 'anorya'),));
		//Main Color							
		$wp_customize->add_setting( 'anorya_main_color_setting' , array(
									'default' => '#af0500',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_hex_color_sanitize',) );							
		$wp_customize->add_control( new WP_Customize_Color_Control( 
										$wp_customize,
										'anorya_main_color_setting', 
										array(	'label'      => __( 'Main Color', 'anorya' ),
												'section'    => 'anorya_color_settings',
												'settings'   => 'anorya_main_color_setting',)));
		//Main Text Color							
		$wp_customize->add_setting( 'anorya_main_text_color_setting' , array(
									'default' => '#FFFFFF',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_hex_color_sanitize',) );							
		$wp_customize->add_control( new WP_Customize_Color_Control( 
										$wp_customize,
										'anorya_main_text_color_setting', 
										array(	'label'      => __( 'Main Text Color', 'anorya' ),
												'description' => __('Used only if main color is the background color of the element','anorya'),
												'section'    => 'anorya_color_settings',
												'settings'   => 'anorya_main_text_color_setting',)));
		//Main Hover Color							
		$wp_customize->add_setting( 'anorya_main_hover_color_setting' , array(
									'default' => '#000000',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_hex_color_sanitize',) );							
		$wp_customize->add_control( new WP_Customize_Color_Control( 
										$wp_customize,
										'anorya_main_hover_color_setting', 
										array(	'label'      => __( 'Main Hover Color', 'anorya' ),
												'description' => __('For elements using the main color','anorya'),
												'section'    => 'anorya_color_settings',
												'settings'   => 'anorya_main_hover_color_setting',)));
		//Main Hover Text Color							
		$wp_customize->add_setting( 'anorya_main_hover_text_color_setting' , array(
									'default' => '#FFFFFF',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_hex_color_sanitize',) );							
		$wp_customize->add_control( new WP_Customize_Color_Control( 
										$wp_customize,
										'anorya_main_hover_text_color_setting', 
										array(	'label'      => __( 'Hover Text color when main hover color is used in background', 'anorya' ),
												'description' => __('Used only if main hover color is the background color of the element','anorya'),
												'section'    => 'anorya_color_settings',
												'settings'   => 'anorya_main_hover_text_color_setting',)));												
		

	}
	add_action( 'customize_register', 'anorya_customize_register' );


	// Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	function anorya_customize_preview_js() {
		wp_enqueue_script( 'anorya_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
	}
	add_action( 'customize_preview_init', 'anorya_customize_preview_js' );
	
	/*
	  Sanitization callback functions
	*/  
	
	//checkbox - boolean sanitize
	function anorya_bool_sanitize( $checked ) {
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	//image sanitize
	function anorya_image_sanitize( $image, $setting ) {
		$file = wp_check_filetype( $image, get_allowed_mime_types() );
		return ( $file['ext'] ? $image : $setting->default );
	}
	
	//url sanitize
	function anorya_url_sanitize($url){
		return esc_url_raw( $url );
	}

	//choices - select sanitize
	function anorya_choices_sanitize( $input, $setting ) {
		
		$choices = $setting->manager->get_control(str_replace('_setting','_control',$setting->id))->choices;
		return ( array_key_exists(  $input , $choices ) ?  $input  : $setting->default );
	}

	//html sanitize
	function anorya_html_sanitize( $html ) {
		return wp_filter_post_kses( $html );
	}

	//range - integer number sanitize
	function anorya_range_sanitize( $number, $setting ) {
		$number = absint( $number );
		
		$input_attrs = $setting->manager->get_control(str_replace('_setting','_control',$setting->id) )->input_attrs;
	
		$min = ( isset( $input_attrs['min'] ) ? $input_attrs['min'] : $number );
		$max = ( isset( $input_attrs['max'] ) ? $input_attrs['max'] : $number );
		$step = ( isset( $input_attrs['step'] ) ? $input_attrs['step'] : 1 );
	
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}

	//sanitize non html
	function anorya_nonhtml_sanitize( $nohtml ) {
		return wp_filter_nohtml_kses( $nohtml );
	}

	//hex color sanitize
	function anorya_hex_color_sanitize( $hex_color, $setting ) {
		return sanitize_hex_color( $hex_color );
	}	
	


?>