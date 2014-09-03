<?php
/**
* @Theme Name	:	Corpbiz
* @file         :	theme_stup_data.php
* @package      :	Corpbiz
* @author       :	Priyanshu Mittal
* @filesource   :	wp-content/themes/corpbiz/theme_stup_data.php
*/
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
			
			'slider_title'=>'Clean Elegant',					
			'slider_description'=>'Multi-Purpose Theme',
			'slider_image'=> $imag_url,
			
			//Site info
			'site_title_one'=>'40+',
			'site_title_two'=>'Sample Pages',
			'site_description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis. Fusce a augue ante, pellentesque pretium erat. Fusce in turpis in velit tempor pretium. Integer a leo libero',
			'siteinfo_button_one_text'=>'Buy it now',
			'siteinfo_button_two_text'=>'View Portfolio',
			
			'service_icon_one'=> "fa-mobile",
			'service_title_one'=> "Responsive Design",
			'service_description_one'=> "Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv",
				
			'service_icon_two'=> "fa-rocket",
			'service_title_two'=> "Power full Admin",
			'service_description_two'=> "Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv",
			
			'service_icon_three'=> "fa-thumbs-o-up",
			'service_title_three'=> "Great Support",
			'service_description_three'=>"Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv",
			
			'service_icon_four'=> "fa-laptop",
			'service_title_four'=> "Clean Minimal Design",
			'service_description_four'=> "Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv",
			
			// portfolio 
			'portfolio_title' =>'Our Work Speaks Thousand Words',
			'portfolio_description' =>'We have successfully completed over 2500 projects in mobile and web. Here are few of them.',
			
			'portfolio_title_one'=> "Portfolio One",
			'portfolio_image_one'=> $port_image1,
			
			'portfolio_title_two'=> "Portfolio Two",
			'portfolio_image_two'=> $port_image2,
			
			'portfolio_title_three'=> "Portfolio Three",
			'portfolio_image_three'=> $port_image1,
			
			'portfolio_title_four'=> "Portfolio Four",
			'portfolio_image_four'=> $port_image2,
			
			// Service
			'home_service_title'=>'Our Nice Services',
			'home_service_description' =>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis.',
			
			'footer_customizations' => '@ Copyright 2014  Corpbiz Design & Developed by',
			'created_by_webriti_text' => 'Webriti',
			'created_by_link' => 'http://www.webriti.com',
		);
}
?>