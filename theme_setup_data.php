<?php
function theme_data_setup()
{	
	$imag_url= WEBRITI_TEMPLATE_DIR_URI . "/images/1140x420.png";
	
	$port_image1= WEBRITI_TEMPLATE_DIR_URI . "/images/port1.jpg";
	$port_image2= WEBRITI_TEMPLATE_DIR_URI . "/images/port2.jpg";
				
	return $theme_options=array(
			//Logo and Fevicon header			
			'front_page'  => 'on',			
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'100',
			'text_title'=>'on',
			'upload_image_favicon'=>'',
			'webrit_custom_css'=>'',
			
			//Slider
			'home_slider_enabled'=>'on',
			'animation' => 'fade',
			'animationSpeed' => '1500',
			'slideshowSpeed' => '2500',
			'slider_list'=>'',
			'total_slide'=>'',
			
			
			
			'home_banner_enabled'=>'on',
			'home_post_enabled' => 'on',
			'slider_total' => 4,
			'slider_radio' => 'demo',
			'slider_options'=> 'fade',
			'slider_transition_delay'=> '2000',
			'slider_select_category' => 'Uncategorized',
			'featured_slider_post' => '',
			
			//Site info
			'site_title_one'=>'40+',
			'site_title_two'=>'Sample Pages',
			'site_description'=>__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis. Fusce a augue ante, pellentesque pretium erat. Fusce in turpis in velit tempor pretium. Integer a leo libero','corpbiz'),
			'siteinfo_button_one_text'=>__('Buy it now','corpbiz'),
			'siteinfo_button_two_text'=>__('View Portfolio','corpbiz'),
			
			'service_icon_one'=> "fa-mobile",
			'service_title_one'=> __('Responsive Design','corpbiz'),
			'service_description_one'=> __('Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv','corpbiz'),
			'home_service_one_link' => '#',
			'home_service_one_link_target' => "on",
				
			'service_icon_two'=> "fa-rocket",
			'service_title_two'=>__('Power full Admin','corpbiz'),
			'service_description_two'=> __('Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv','corpbiz'),
			'home_service_two_link' => '#',
			'home_service_two_link_target' => "on",
			
			'service_icon_three'=> "fa-thumbs-o-up",
			'service_title_three'=> __('Great Support','corpbiz'),
			'service_description_three'=>__('Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv','corpbiz'),
			'home_service_third_link' => '#',
			'home_service_third_link_target' => "on",
			
			'service_icon_four'=> "fa-laptop",
			'service_title_four'=> __('Clean Minimal Design','corpbiz'),
			'service_description_four'=>__('Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv','corpbiz'),
			'home_service_fourth_link' => '#',
			'home_service_fourth_link_target' => "on",
			
			// portfolio 
			'portfolio_title' =>__('Our Work Speaks Thousand Words','corpbiz'),
			'portfolio_description' =>__('We have successfully completed over 2500 projects in mobile and web. Here are few of them.','corpbiz'),
			
			'portfolio_title_one'=> __('Portfolio One','corpbiz'),
			'portfolio_image_one'=> $port_image1,
			'home_image_one_link'=>"#",
			'home_image_one_link_target'=>"on",
			
			'portfolio_title_two'=> __('Portfolio Two','corpbiz'),
			'portfolio_image_two'=> $port_image2,
			'home_image_two_link'=>"#",
			'home_image_two_link_target'=>"on",
			
			'portfolio_title_three'=> __('Portfolio Three','corpbiz'),
			'portfolio_image_three'=> $port_image1,
			'home_image_three_link'=>"#",
			'home_image_three_link_target'=>"on",
			
			'portfolio_title_four'=> __('Portfolio Four','corpbiz'),
			'portfolio_image_four'=> $port_image2,
			'home_image_four_link'=>"#",
			'home_image_four_link_target'=>"on",
			
			// Service
			'home_service_title'=>__('Our Nice Services','corpbiz'),
			'home_service_description' =>__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis.','corpbiz'),
			
			'footer_customizations' => __('@ Copyright 2014  Corpbiz Design & Developed by','corpbiz'),
			'created_by_webriti_text' => __('Webriti','corpbiz'),
			'created_by_link' => 'http://www.webriti.com',
			
			//blog meta section settings
			'blog_meta_section_settings' => "on",
		
		);
}
?>