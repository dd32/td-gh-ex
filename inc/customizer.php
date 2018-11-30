<?php
/**
 * anorya Theme Customizer
 *
 * @package anorya
 */

	function anorya_customize_register( $wp_customize ) {
	
		$wp_customize->get_setting( 'blogname' )->transport         = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'refresh';
		$wp_customize->get_section( 'title_tagline')->priority =1;
		
		
		
		/*
		  Header Options
		*/
		
		$wp_customize->add_section( 'anorya_header_settings', array(
									'priority'       => 2,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => esc_html__('Header', 'anorya')));
		
		//top bar display
		$wp_customize->add_setting( 'anorya_top_bar_display_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize',) );
		$wp_customize->add_control(	'anorya_top_bar_display_setting', 	array(
									'label'    => esc_html__( 'Display Header Top Bar', 'anorya' ),
									'section'  => 'anorya_header_settings',
									'settings' => 'anorya_top_bar_display_setting',
									'type'     => 'checkbox',));										
	
		
		//header style
		$wp_customize->add_setting( 'anorya_header_style_setting' , array(
									'default' => '3',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize',) );
		$wp_customize->add_control(	'anorya_header_style_setting', 	array(
									'label'    => esc_html__( 'Select Header Layout', 'anorya' ),
									'section'  => 'anorya_header_settings',
									'settings' => 'anorya_header_style_setting',
									'type'     => 'radio',
									'choices'  => array('1'  => esc_html__('Header Layout 1','anorya'),
														'2'  => esc_html__('Header Layout 2','anorya'),
														'3'  => esc_html__('Header Layout 3','anorya'),
														'4'  => esc_html__('Header Layout 4','anorya'),
														'5'  => esc_html__('Header Layout 5','anorya'),),));			
		
		//header image backround upload
		$wp_customize->add_setting( 'anorya_header_image_background_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_header_image_background_setting', array(
																								'label'      => esc_html__( 'Upload Logo Container Background', 'anorya' ),
																								'section'    => 'anorya_header_settings',
																								'settings'   => 'anorya_header_image_background_setting',
																								'description' => esc_html__('Header background is available for header Layouts 4 & 5','anorya'),)));	
		/*
		*Social Linnks Section 
		*/

		$wp_customize->add_section( 'anorya_social_links_section', array(
									'priority'       => 3,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => esc_html__('Social Media Links', 'anorya'),));
		//Facebook Link Setting
		$wp_customize->add_setting( 'anorya_facebook_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_facebook_link_setting', 	array(
									'label'    => esc_html__( 'Enter your Facebook Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_facebook_link_setting',
									'type'     => 'url',));

		//Twitter Link Setting
		$wp_customize->add_setting( 'anorya_twitter_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_twitter_link_setting', 	array(
									'label'    => esc_html__( 'Enter your Twitter Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_twitter_link_setting',
									'type'     => 'url',));	

		//Google+ Link Setting
		$wp_customize->add_setting( 'anorya_google_plus_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_google_plus_link_setting', 	array(
									'label'    => esc_html__( 'Enter your Google+ Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_google_plus_link_setting',
									'type'     => 'url',));	

		//Instagram Link Setting
		$wp_customize->add_setting( 'anorya_instagram_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_instagram_link_setting', 	array(
									'label'    => esc_html__( 'Enter your Instagram Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_instagram_link_setting',
									'type'     => 'url',));

		//LinkedIn Link Setting
		$wp_customize->add_setting( 'anorya_linkedin_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_linkedin_link_setting', 	array(
									'label'    => esc_html__( 'Enter your linkedIn Page Url', 'anorya' ),
									'section'  => 'anorya_social_links_section',
									'settings' => 'anorya_linkedin_link_setting',
									'type'     => 'url',));

		//youTube Link Setting
		$wp_customize->add_setting( 'anorya_youtube_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize') );
		$wp_customize->add_control(	'anorya_youtube_link_setting', 	array(
									'label'    => esc_html__( 'Enter your youTube Channel Url', 'anorya' ),
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
									'title'          => esc_html__('SideBar Settings', 'anorya'),));
		
			
		
		// home sidebar
		$wp_customize->add_setting( 'anorya_home_sidebar_setting' , array(
									'default' => 'right',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_home_sidebar_setting', 	array(
									'label'    => esc_html__( 'Sidebar options for Home', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_home_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => esc_html__('Left  Sidebar','anorya'),
														'right'  => esc_html__('Right  Sidebar','anorya'),
														'hidden'  => esc_html__('No Sidebar','anorya'),),));

		// archives-categories sidebar
		$wp_customize->add_setting( 'anorya_archives_sidebar_setting' , array(
									'default' => 'right',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_archives_sidebar_setting', 	array(
									'label'    => esc_html__( 'Sidebar Options for Archives/Categories', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_archives_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => esc_html__('Left  Sidebar','anorya'),
														'right'  => esc_html__('Right  Sidebar','anorya'),
														'hidden'  => esc_html__('No Sidebar','anorya'),),));

		// single post sidebar
		$wp_customize->add_setting( 'anorya_single_post_sidebar_setting' , array(
									'default' => 'right',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_single_post_sidebar_setting', 	array(
									'label'    => esc_html__( 'SidebarOptions for Posts', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_single_post_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => esc_html__('Left  Sidebar','anorya'),
														'right'  => esc_html__('Right  Sidebar','anorya'),
														'hidden'  => esc_html__('No Sidebar','anorya'),),));

		// single page sidebar
		$wp_customize->add_setting( 'anorya_single_page_sidebar_setting' , array(
									'default' => 'right',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_single_page_sidebar_setting', 	array(
									'label'    => esc_html__( 'Sidebar Options for Pages', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_single_page_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => esc_html__('Left  Sidebar','anorya'),
														'right'  => esc_html__('Right  Sidebar','anorya'),
														'hidden'  => esc_html__('No Sidebar','anorya'),),));

		// search results sidebar
		$wp_customize->add_setting( 'anorya_search_sidebar_setting' , array(
									'default' => 'right',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_search_sidebar_setting', 	array(
									'label'    => esc_html__( 'Sidebar Options for Search', 'anorya' ),
									'section'  => 'anorya_sidebar_settings',
									'settings' => 'anorya_search_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => esc_html__('Left  Sidebar','anorya'),
														'right'  => esc_html__('Right  Sidebar','anorya'),
														'hidden'  => esc_html__('No Sidebar','anorya'),),));														

		/*
		* Blog Setting *
		*/
		$wp_customize->add_section( 'anorya_blog_settings', array(
									'priority'       => 4,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => esc_html__('Blog Settings', 'anorya'),));
		
		//Back To Top Setting display
		$wp_customize->add_setting( 'anorya_back_to_top_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize') );
		$wp_customize->add_control(	'anorya_back_to_top_setting', 	array(
									'label'    => esc_html__( 'Display Back To Top Button', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_back_to_top_setting',
									'type'     => 'checkbox',
									'description' => esc_html__('Scroll to Top Button is displayed on all pages of the site','anorya'),));
									
		//Loader Setting display
		$wp_customize->add_setting( 'anorya_loader_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize') );
		$wp_customize->add_control(	'anorya_loader_setting', 	array(
									'label'    => esc_html__( 'Display Content Loader', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_loader_setting',
									'type'     => 'checkbox',
									'description' => esc_html__('Loading animation is displayed for all the pages of the site. It\'s used in case
									content takes too long to load','anorya'),));		
		
		// display promo boxes  
		$wp_customize->add_setting( 'anorya_display_promo_boxes_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize',) );
		$wp_customize->add_control(	'anorya_display_promo_boxes_setting', 	array(
									'label'    => esc_html__( 'Display Home Promo Boxes', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_display_promo_boxes_setting',
									'type'     => 'checkbox',));
		
		
		// home layout
		$wp_customize->add_setting( 'anorya_home_layout_setting' , array(
									'default' => 'anorya_full_width_grid_layout',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_home_layout_setting', 	array(
									'label'    => esc_html__( 'Select Home layout', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_home_layout_setting',
									'type'     => 'radio',
									'choices'  => array('anorya_full_width_layout'  => esc_html__('Full Width Layout','anorya'),
														'anorya_list_layout'  => esc_html__('List Layout','anorya'),
														'anorya_grid_layout'  => esc_html__('Grid  Columns Layout','anorya'),
														'anorya_full_width_list_layout'  => esc_html__('First Post Full Width and the rest List Layout','anorya'),
														'anorya_full_width_grid_layout'  => esc_html__('First Post Full Width and the rest Grid Layout','anorya'),),));

		// Archives layout
		$wp_customize->add_setting( 'anorya_archives_layout_setting' , array(
									'default' => 'anorya_list_layout',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_archives_layout_setting', 	array(
									'label'    => esc_html__( 'Archives/Categories/Search Results layout', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_archives_layout_setting',
									'type'     => 'radio',
									'choices'  => array('anorya_full_width_layout'  => esc_html__('Full Width Layout','anorya'),
														'anorya_list_layout'  => esc_html__('List Layout','anorya'),
														'anorya_grid_layout'  => esc_html__('Grid  Columns Layout','anorya'),
														'anorya_full_width_list_layout'  => esc_html__('First Post Full Width and the rest List Layout','anorya'),
														'anorya_full_width_grid_layout'  => esc_html__('First Post Full Width and the rest Grid Layout','anorya'),),));
		// Archives Grid Columns layout
		$wp_customize->add_setting( 'anorya_grid_columns_setting' , array(
									'default' => 2,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_grid_columns_setting', 	array(
									'label'    => esc_html__( 'Number of columns for grid layout', 'anorya' ),
									'description' => esc_html__('3 Column Grid is intended for layouts without sidebars','anorya'),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_grid_columns_setting',
									'type'     => 'select',
									'choices'  => array(2  => esc_html__('2 Columns Grid','anorya'),
														3  => esc_html__('3 Columns Grid','anorya'),),));												

		// full text on posts
		$wp_customize->add_setting( 'anorya_full_text_posts_setting' , array(
									'default' => false,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize') );
		$wp_customize->add_control(	'anorya_full_text_posts_setting', 	array(
									'label'    => esc_html__( 'Display the full post  instead of excerpt.', 'anorya' ),
									'section'  => 'anorya_blog_settings',
									'settings' => 'anorya_full_text_posts_setting',
									'type'     => 'checkbox',
									'description' => esc_html__('Only available for Full Width Post Layout','anorya'),));
		
		/*
		* Home Slider Settings *
		*/
		$wp_customize->add_section( 'anorya_home_slider_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => esc_html__('Home Slider Settings', 'anorya'),));
									
		// Slider Type
		$wp_customize->add_setting( 'anorya_slider_type_setting' , array(
									'default' => 'standard',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize') );
		$wp_customize->add_control(	'anorya_slider_type_setting', 	array(
									'label'    => esc_html__( 'Select the home slider style', 'anorya' ),
									'section'  => 'anorya_home_slider_settings',
									'settings' => 'anorya_slider_type_setting',
									'type'     => 'radio',
									'choices'  => array('full'  => esc_html__('Full Width Slider','anorya'),
														'standard'  => esc_html__('Standard Slider','anorya'),
														'2post'  => esc_html__('2 Post Slider','anorya'),),));
		
		// slider posts number
		$wp_customize->add_setting( 'anorya_slider_posts_number_setting' , array(
									'default' => 4,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_range_sanitize',) );
		$wp_customize->add_control(	'anorya_slider_posts_number_setting', 	array(
									'label'    => esc_html__( 'How many posts to show? ', 'anorya' ),
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
		$wp_customize->add_control(	'anorya_slider_posts_category_setting', 	array(
									'label'    => esc_html__( 'Select the slider posts category', 'anorya' ),
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
									'title'          => esc_html__('Footer Settings', 'anorya'),));
		//footer slider							
		$wp_customize->add_setting( 'anorya_footer_slider_display_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize',) );
		$wp_customize->add_control(	'anorya_footer_slider_display_setting', 	array(
									'label'    => esc_html__( 'Display Footer Slider', 'anorya' ),
									'section'  => 'anorya_footer_settings',
									'settings' => 'anorya_footer_slider_display_setting',
									'type'     => 'checkbox',));
		//footer slider no. of posts  
		$wp_customize->add_setting( 'anorya_footer_sliders_posts_no_setting' , array(
									'default' => 4,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_range_sanitize',) );
		$wp_customize->add_control(	'anorya_footer_sliders_posts_no_setting', 	array(
									'label'    => esc_html__( 'Enter the number of posts that are going to be displayed on the footer slider gallery. ', 'anorya' ),
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
		$wp_customize->add_control(	'anorya_footer_slider_posts_category_setting', 	array(
									'label'    => esc_html__( 'Select the slider posts category', 'anorya' ),
									'section'  => 'anorya_footer_settings',
									'settings' => 'anorya_footer_slider_posts_category_setting',
									'type'     => 'select',
									'choices'  => anorya_get_post_slider_categories(),));
		
		//footer widget							
		$wp_customize->add_setting( 'anorya_footer_widgets_display_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize',) );
		$wp_customize->add_control(	'anorya_footer_widgets_display_setting', 	array(
									'label'    => esc_html__( 'Display Footer Widgets Areas', 'anorya' ),
									'section'  => 'anorya_footer_settings',
									'settings' => 'anorya_footer_widgets_display_setting',
									'type'     => 'checkbox',));
		//footer copyright text 
		$wp_customize->add_setting( 'anorya_footer_copyright_text_setting' , array(
									'default' => ' ',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_nonhtml_sanitize',) );
		$wp_customize->add_control(	'anorya_footer_copyright_text_setting', 	array(
									'label'    => esc_html__( 'Enter Footer Copyright Text', 'anorya' ),
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
								  'title'          => esc_html__( 'Home Promo Boxes', 'anorya' ),));
		
		
		// PROMO BOX 1
		$wp_customize->add_section( 'anorya_promo_box1_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'panel'  => 'anorya_promo_boxes_panel',
									'title'          => esc_html__('Promo Box 1', 'anorya'),));

		
		//promo box 1 image
		$wp_customize->add_setting( 'anorya_promobox1_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_promobox1_image_setting', array(
																								'label'      => esc_html__( 'Promo Box  Image', 'anorya' ),
																								'section'    => 'anorya_promo_box1_settings',
																								'settings'   => 'anorya_promobox1_image_setting')));	
																								
		//promo box 1 SubTitle
		$wp_customize->add_setting( 'anorya_promobox1_subtitle_setting' , array(
									'default' => esc_html__('Read More','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox1_subtitle_setting', 	array(
									'label'    => esc_html__( 'Promo Box SubTitle', 'anorya' ),
									'section'  => 'anorya_promo_box1_settings',
									'settings' => 'anorya_promobox1_subtitle_setting',
									'type'     => 'text',));
		
		//promo box 1 Title
		$wp_customize->add_setting( 'anorya_promobox1_title_setting' , array(
									'default' => esc_html__('Promo Box 1','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox1_title_setting', 	array(
									'label'    => esc_html__( 'Promo Box Title', 'anorya' ),
									'section'  => 'anorya_promo_box1_settings',
									'settings' => 'anorya_promobox1_title_setting',
									'type'     => 'text',));	
		
		//promo box 1 Link
		$wp_customize->add_setting( 'anorya_promobox1_url_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox1_url_setting', 	array(
									'label'    => esc_html__( 'Promo Box  Link', 'anorya' ),
									'section'  => 'anorya_promo_box1_settings',
									'settings' => 'anorya_promobox1_url_setting',
									'type'     => 'url',));	

		// PROMO BOX 2
		$wp_customize->add_section( 'anorya_promo_box2_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'panel'  => 'anorya_promo_boxes_panel',
									'title'          => esc_html__('Promo Box 2', 'anorya'),));

		
		//promo box 2 image
		$wp_customize->add_setting( 'anorya_promobox2_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_promobox2_image_setting', array(
																								'label'      => esc_html__( 'Promo Box  Image', 'anorya' ),
																								'section'    => 'anorya_promo_box2_settings',
																								'settings'   => 'anorya_promobox2_image_setting')));	
																								
		//promo box 2 SubTitle
		$wp_customize->add_setting( 'anorya_promobox2_subtitle_setting' , array(
									'default' => esc_html__('Read More','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox2_subtitle_setting', 	array(
									'label'    => esc_html__( 'Promo Box Subtitle', 'anorya' ),
									'section'  => 'anorya_promo_box2_settings',
									'settings' => 'anorya_promobox2_subtitle_setting',
									'type'     => 'text',));										
		
		//promo box 2 Title
		$wp_customize->add_setting( 'anorya_promobox2_title_setting' , array(
									'default' => esc_html__('Promo Box 2','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox2_title_setting', 	array(
									'label'    => esc_html__( 'Promo Box Title', 'anorya' ),
									'section'  => 'anorya_promo_box2_settings',
									'settings' => 'anorya_promobox2_title_setting',
									'type'     => 'text',));	
		
		//promo box 2 Link
		$wp_customize->add_setting( 'anorya_promobox2_url_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox2_url_setting', 	array(
									'label'    => esc_html__( 'Promo Box Link', 'anorya' ),
									'section'  => 'anorya_promo_box2_settings',
									'settings' => 'anorya_promobox2_url_setting',
									'type'     => 'url',));
		
							
									

		// PROMO BOX 3
		$wp_customize->add_section( 'anorya_promo_box3_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'panel'  => 'anorya_promo_boxes_panel',
									'title'          => esc_html__('Promo Box 3', 'anorya'),));

		
		//promo box 3 image
		$wp_customize->add_setting( 'anorya_promobox3_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'anorya_promobox3_image_setting', array(
																								'label'      => esc_html__( 'Promo Box Image', 'anorya' ),
																								'section'    => 'anorya_promo_box3_settings',
																								'settings'   => 'anorya_promobox3_image_setting')));	
																								
		
		//promo box 3 SubTitle
		$wp_customize->add_setting( 'anorya_promobox3_subtitle_setting' , array(
									'default' => esc_html__('Read More','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox3_subtitle_setting', 	array(
									'label'    => esc_html__( 'Promo Box Subtitle', 'anorya' ),
									'section'  => 'anorya_promo_box3_settings',
									'settings' => 'anorya_promobox3_subtitle_setting',
									'type'     => 'text',));

		//promo box 3 Title
		$wp_customize->add_setting( 'anorya_promobox3_title_setting' , array(
									'default' => esc_html__('Promo Box 3','anorya'),
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_html_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox3_title_setting', 	array(
									'label'    => esc_html__( 'Promo Box Title', 'anorya' ),
									'section'  => 'anorya_promo_box3_settings',
									'settings' => 'anorya_promobox3_title_setting',
									'type'     => 'text',));	
							
		
		//promo box 3 Link
		$wp_customize->add_setting( 'anorya_promobox3_url_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_url_sanitize',) );
		$wp_customize->add_control(	'anorya_promobox3_url_setting', 	array(
									'label'    => esc_html__( 'Promo Box Link', 'anorya' ),
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
									'title'          => esc_html__('Typography Settings', 'anorya'),));	
		
		//headings font 
		$wp_customize->add_setting( 'anorya_headings_font_family_setting' , array(
									'default' => 'Antic Didone,serif',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize',) );
		$wp_customize->add_control(	'anorya_headings_font_family_setting', 	array(
									'label'    => esc_html__( 'Select the headings font family', 'anorya' ),
									'section'  => 'anorya_typography_settings',
									'settings' => 'anorya_headings_font_family_setting',
									'type'     => 'select',
									'choices'  => anorya_google_fonts_array(),));

		
		//Body Text font 
		$wp_customize->add_setting( 'anorya_body_font_family_setting' , array(
									'default' => 'Open Sans, sans-serif',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_choices_sanitize',) );
		$wp_customize->add_control(	'anorya_body_font_family_setting', 	array(
									'label'    => esc_html__( 'Select the Body font family', 'anorya' ),
									'section'  => 'anorya_typography_settings',
									'settings' => 'anorya_body_font_family_setting',
									'type'     => 'select',
									'choices'  => anorya_google_fonts_array(),));

		//Body Text font size  
		$wp_customize->add_setting( 'anorya_body_font_size_setting' , array(
									'default' => 14,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_range_sanitize',) );
		$wp_customize->add_control(	'anorya_body_font_size_setting', 	array(
									'label'    => esc_html__( 'Font Size: ', 'anorya' ),
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
		$wp_customize->add_control(	'anorya_font_language_setting', 	array(
									'label'    => esc_html__( 'Select Language Character Set for the selected fonts.', 'anorya' ),
									'description' => esc_html__('Note: Not all fonts support all the languages character sets listed','anorya'),
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

		//RTL Support
		$wp_customize->add_setting( 'anorya_rtl_support_setting' , array(
									'default' => false,
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_bool_sanitize') );
		$wp_customize->add_control(	'anorya_rtl_support_setting', 	array(
									'label'    => __( 'RTL Support', 'anorya' ),
									'section'  => 'anorya_typography_settings',
									'settings' => 'anorya_rtl_support_setting',
									'type'     => 'checkbox',
									'description' => __('Enable RTL language Support','anorya'),));												
		
		
		
		
		/*
		* Color Settings *
		*/
		$wp_customize->add_section( 'anorya_color_settings', array(
									'priority'       => 7,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => esc_html__('Color Settings', 'anorya'),));
		//Main Color							
		$wp_customize->add_setting( 'anorya_main_color_setting' , array(
									'default' => '#af0500',
									'transport' => 'refresh',
									'sanitize_callback' => 'anorya_hex_color_sanitize',) );							
		$wp_customize->add_control( new WP_Customize_Color_Control( 
										$wp_customize,
										'anorya_main_color_setting', 
										array(	'label'      => esc_html__( 'Main Color', 'anorya' ),
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
										array(	'label'      => esc_html__( 'Main Text Color', 'anorya' ),
												'description' => esc_html__('Used only if main color is the background color of the element','anorya'),
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
										array(	'label'      => esc_html__( 'Main Hover Color', 'anorya' ),
												'description' => esc_html__('For elements using the main color','anorya'),
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
										array(	'label'      => esc_html__( 'Hover Text color when main hover color is used in background', 'anorya' ),
												'description' => esc_html__('Used only if main hover color is the background color of the element','anorya'),
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
		
		$choices = $setting->manager->get_control($setting->id)->choices;
		return ( array_key_exists(  $input , $choices ) ?  $input  : $setting->default );
	}

	//html sanitize
	function anorya_html_sanitize( $html ) {
		return wp_filter_post_kses( $html );
	}

	//range - integer number sanitize
	function anorya_range_sanitize( $number, $setting ) {
		$number = absint( $number );
		
		$input_attrs = $setting->manager->get_control($setting->id)->input_attrs;
	
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