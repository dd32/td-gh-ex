<?php 
function becorp_theme_default_data()
  	{
	return $becorp_option=array(
	
	//Header Settings
	'header_info_phone' =>get_theme_mod('header_info_phone',__('(2)245 23 68','becorp')),
	'header_info_mail'=> get_theme_mod('header_info_mail',__('becorp@gmail.com','becorp')),
	'header_social_media_enabled' => 0,
	'social_media_twitter_link' => '#',
	'social_media_facebook_link' => '#',
	'social_media_dribbble_link' => '#',
	'social_media_google_link' => '#',
	'social_media_linkedin_link' => '#',
	'social_media_rss_link' => '#',
	'facebook_media_enabled' => 0,
	'twitter_media_enabled' => 0,
	'linkedin_media_enabled' => 0,
	'dribbble_media_enabled' => 0,
	'google_media_enabled' => 0,
	'rss_media_enabled' => 0,
	
	//header logo setting
	'upload_image_logo'=>'',
	'height' => '50',
	'width' => '250',
	'becorp_custom_css'=> '',
	
	//Slider settings
	'home_banner_enabled' => 1,
	'slider_options' => get_theme_mod('slider_options',__('slide','becorp')),
	'slider_transition_delay' => 2000,
	'slider_image_one' => get_template_directory_uri().'/images/slider/slide4.jpg',
	'slider_image_title_one' => get_theme_mod('slider_image_title_one',__('Becorp Responsive','becorp')),
	'slider_image_description_one' => get_theme_mod('slider_image_description_one',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp')),
		
	'slider_image_two' => get_template_directory_uri().'/images/slider/slide5.jpg',
	'slider_image_title_two' => get_theme_mod('slider_image_title_two',__('Becorp Responsive','becorp')),
	'slider_image_description_two' => get_theme_mod('slider_image_description_two',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp')),
		
	'slider_image_three' => get_template_directory_uri().'/images/slider/slide6.jpg',
	'slider_image_title_three' => get_theme_mod('slider_image_title_three',__('Becorp Responsive','becorp')),
	'slider_image_description_three' => get_theme_mod('slider_image_description_three',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp')),
	'slider_button_text' => get_theme_mod('slider_button_text',__('More Details!','becorp')),
	'slider_image_link' => '#',
	'slider_button_tab' => 1,
	
	//Home callout section
	'home_call_out_area_enabled' => 1,
	'home_call_out_description' => get_theme_mod('home_call_out_description',__('Powerfully Creativity with Professional Clean Developed Website Themes','becorp')),
	'home_call_out_button_title' => get_theme_mod('home_call_out_button_title',__('get started now!','becorp')),
	'home_call_out_btn_link' => '#',
	'home_call_out_btn_link_target' => '',
	
	//Service section settings
	'service_section_enabled' => 1,
	'service_title_one' => get_theme_mod('service_title_one',__('Our','becorp')),
	'service_title_two' => get_theme_mod('service_title_two',__('Services','becorp')),
	'service_description' => get_theme_mod('service_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp')),
	
	'service_one_icon' => 'fa-commenting-o',
	'service_one_title'=> get_theme_mod('service_one_title',__('Qui Blandit Praesent','becorp')),
	'service_one_description' => get_theme_mod('service_one_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate. Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur.','becorp')),
	
	'service_two_icon' => 'fa-lightbulb-o',
	'service_two_title'=> get_theme_mod('service_two_title',__('Tation Dipiscing Elit','becorp')),
	'service_two_description' => get_theme_mod('service_two_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate. Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur.','becorp')),

	'service_three_icon' => 'fa-leaf',
	'service_three_title'=> get_theme_mod('service_three_title',__('Print Quality Design','becorp')),
	'service_three_description' => get_theme_mod('service_three_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate. Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur.','becorp')),
	
	//Project Portfolio Section
	'enable_home_portfolio' => 1,
	'portfolio_title_one' => get_theme_mod('portfolio_title_one',__('Our','becorp')),
	'portfolio_title_two' => get_theme_mod('portfolio_title_two',__('Projects','becorp')),
	'portfolio_description' => get_theme_mod('portfolio_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp')),
	'upload_image_one' => get_template_directory_uri().'/images/port1.jpg',
	'portfolio_image_one_title' => get_theme_mod('portfolio_image_one_title',__('Becorp Responsive','becorp')),
	'portfolio_image_one_description' => get_theme_mod('portfolio_image_one_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp')),
	'portfolio_image_one_link' => '#',
	'portfolio_new_tab' => 1,
	'upload_image_two' => get_template_directory_uri() .'/images/port2.jpg',
	'portfolio_image_two_title' => get_theme_mod('portfolio_image_two_title',__('Awesome Layout','becorp')),
	'portfolio_image_two_description' => get_theme_mod('portfolio_image_two_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp')),
	'portfolio_image_two_link' => '#',
	'portfolio_two_new_tab' => 1,
	'upload_image_three' => get_template_directory_uri() .'/images/port3.jpg',
	'portfolio_image_three_title' => get_theme_mod('portfolio_image_three_title',__('Bussinus Corporate','becorp')),
	'portfolio_image_three_description' => get_theme_mod('portfolio_image_three_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp')),
	'portfolio_image_three_link' => '#',
	'portfolio_three_new_tab' => 1,
	
	//Home Latest Blog Post
	'home_blog_enabled' => 1,
	'blog_title_one' => get_theme_mod('blog_title_one',__('Latest','becorp')),
	'blog_title_two' => get_theme_mod('blog_title_two',__('Blog Post','becorp')),
	'blog_description' => get_theme_mod('blog_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp')),
	'post_display_count' => 4,
	
	// Fooetr Customization
	'footer_customization_text' => get_theme_mod('footer_customization_text',__('@ 2016 Becorp Theme','becorp')),
	'footer_customization_develop' => get_theme_mod('footer_customization_develop',__('Developed By','becorp')),
	'develop_by_name' => get_theme_mod('develop_by_name',__('Asia Themes ','becorp')),
	'develop_by_link' => 'https://asiathemes.com/',
	
	);
  	}
  ?>