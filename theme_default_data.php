<?php 
function becorp_theme_default_data()
  	{
	return $becorp_option=array(
	
	// Fron-page
	'front_page_enabled' => 1,
	//Header Settings
	'header_phone_email_enabled' => 0,
	'header_info_phone' =>get_theme_mod('header_info_phone',__('(2)245 23 68','becorp')),
	'header_info_mail'=> get_theme_mod('header_info_mail',__('asiathemes[at]gmail[dot]com','becorp')),
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
	'portfolio_one_title' => get_theme_mod('portfolio_one_title',__('Gallery Title','becorp')),
	'portfolio_two_title' => get_theme_mod('portfolio_two_title',__('Here','becorp')),
	'portfolio_title_desc' => get_theme_mod('portfolio_title_desc',__('Gallery Description Here','becorp')),
	
	//Slider settings
	'home_banner_enabled' => 1,
	'slider_image_one' => get_template_directory_uri().'/images/header-default.jpg',
	'slider_image_title_one' => get_theme_mod('slider_image_title_one',__('Responsive Wordpress Theme','becorp')),
	'slider_image_description_one' => get_theme_mod('slider_image_description_one',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','becorp')),
		
	'slider_image_two' => get_template_directory_uri().'/images/header-default2.jpg',
	'slider_image_title_two' => get_theme_mod('slider_image_title_two',__('Responsive Wordpress Theme','becorp')),
	'slider_image_description_two' => get_theme_mod('slider_image_description_two',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','becorp')),
		
	'slider_image_three' => get_template_directory_uri().'/images/header-default3.jpg',
	'slider_image_title_three' => get_theme_mod('slider_image_title_three',__('Responsive Wordpress Theme','becorp')),
	'slider_image_description_three' => get_theme_mod('slider_image_description_three',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','becorp')),
	'slider_button_text' => get_theme_mod('slider_button_text',__('More Details!','becorp')),
	'slider_image_link' => '#',
	'slider_button_tab' => 1,
	
	// Home services section
	'service_heading_title_one' => get_theme_mod('service_heading_title_one',__('Services','becorp')),
	'service_heading_title_two' => get_theme_mod('service_heading_title_two',__('Section','becorp')),
	'service_heading_desc' => get_theme_mod('service_heading_desc',__('Services Description Here','becorp')),
	'service_one_icon' => 'fa-leaf',
	'service_title_one' => get_theme_mod('service_title_one',__('Service title one','becorp')),
	'service_desc_one' => get_theme_mod('service_desc_one',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis, erat vitae sodales cursus.','becorp')),
	
	'service_two_icon' => 'fa-desktop',
	'service_title_two' => get_theme_mod('service_title_two',__('Service title two','becorp')),
	'service_desc_two' => get_theme_mod('service_desc_two',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis, erat vitae sodales cursus.','becorp')),
	
	'service_three_icon' => 'fa-cogs',
	'service_title_three' => get_theme_mod('service_title_three',__('Service title three','becorp')),
	'service_desc_three' => get_theme_mod('service_desc_three',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis, erat vitae sodales cursus.','becorp')),
		
	// Home blog section
	'blog_title_one' => get_theme_mod('blog_title_one',__('Blog Title','becorp')),
	'blog_title_two' => get_theme_mod('blog_title_two',__('Here','becorp')),
	'blog_section_desc' => get_theme_mod('blog_section_desc',__('Home Blog Description Here','becorp')),
	'post_display_count' => 4,
	
	// Fooetr Customization
	'footer_customization_text' => get_theme_mod('footer_customization_text',__('@ 2016 Becorp Theme','becorp')),
	'footer_customization_develop' => get_theme_mod('footer_customization_develop',__('Developed By','becorp')),
	'develop_by_name' => get_theme_mod('develop_by_name',__('Asia Themes ','becorp')),
	'develop_by_link' => 'https://asiathemes.com/',
	
	);
  	}
  ?>