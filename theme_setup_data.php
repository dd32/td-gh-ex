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
			
			'slider_title'=>__('Clean Elegant','corpbiz'),					
			'slider_description'=>__('Multi-Purpose Theme','corpbiz'),
			'slider_image'=> $imag_url,
			
			//Site info
			'site_title_one'=>'40+',
			'site_title_two'=>'Sample Pages',
			'site_description'=>__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis. Fusce a augue ante, pellentesque pretium erat. Fusce in turpis in velit tempor pretium. Integer a leo libero','corpbiz'),
			'siteinfo_button_one_text'=>__('Buy it now','corpbiz'),
			'siteinfo_button_two_text'=>__('View Portfolio','corpbiz'),
			
			'service_icon_one'=> "fa-mobile",
			'service_title_one'=> __('Responsive Design','corpbiz'),
			'service_description_one'=> __('Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv','corpbiz'),
				
			'service_icon_two'=> "fa-rocket",
			'service_title_two'=>__('Power full Admin','corpbiz'),
			'service_description_two'=> __('Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv','corpbiz'),
			
			'service_icon_three'=> "fa-thumbs-o-up",
			'service_title_three'=> __('Great Support','corpbiz'),
			'service_description_three'=>__('Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv','corpbiz'),
			
			'service_icon_four'=> "fa-laptop",
			'service_title_four'=> __('Clean Minimal Design','corpbiz'),
			'service_description_four'=>__('Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv','corpbiz'),
			
			// portfolio 
			'portfolio_title' =>__('Our Work Speaks Thousand Words','corpbiz'),
			'portfolio_description' =>__('We have successfully completed over 2500 projects in mobile and web. Here are few of them.','corpbiz'),
			
			'portfolio_title_one'=> __('Portfolio One','corpbiz'),
			'portfolio_image_one'=> $port_image1,
			
			'portfolio_title_two'=> __('Portfolio Two','corpbiz'),
			'portfolio_image_two'=> $port_image2,
			
			'portfolio_title_three'=> __('Portfolio Three','corpbiz'),
			'portfolio_image_three'=> $port_image1,
			
			'portfolio_title_four'=> __('Portfolio Four','corpbiz'),
			'portfolio_image_four'=> $port_image2,
			
			// Service
			'home_service_title'=>__('Our Nice Services','corpbiz'),
			'home_service_description' =>__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis.','corpbiz'),
			
			'footer_customizations' => __('@ Copyright 2014  Corpbiz Design & Developed by','corpbiz'),
			'created_by_webriti_text' => __('Webriti','corpbiz'),
			'created_by_link' => 'http://www.webriti.com',
		);
}
?>