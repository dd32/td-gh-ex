<?php
/**
* @Theme Name	:	wallstreet
* @file         :	theme_stup_data.php
* @package      :	wallstreet
* @author       :	Harish Lodha
* @filesource   :	wp-content/themes/wallstreet/theme_stup_data.php
*/
function theme_data_setup()
{
	$slider_image = WEBRITI_TEMPLATE_DIR_URI . "/images/slider.jpg";
	$service_image = WEBRITI_TEMPLATE_DIR_URI . "/images/service.jpg";
	$portfolio_image = WEBRITI_TEMPLATE_DIR_URI . "/images/portfolio.jpg";
	
	return $theme_options=array(
			//Logo and Fevicon header			
			'front_page'  => 'on',			
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'250',
			'text_title'=>'on',
			'upload_image_favicon'=>'',
			'webrit_custom_css'=>'',
			
			//Featured Image Setting
			'home_banner_enabled'=>'on',
			'slider_title_one' => 'Clean & Fresh Theme',
			'slider_title_two' => 'Welcome To Wallstreet',
			'slider_description' => 'The state-of-the-art HTML5 powered flexible layout with lightspeed fast CSS3 transition effects. Works perfect in any modern mobile...',
			'slider_image' => $slider_image,
			
			// service
			'service_section_enabled' => 'on',
			
			'service_image_one' => $service_image, 
			'service_title_one'=> 'Product Designing',
			'service_description_one' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.',
			
			'service_image_two' => $service_image, 
			'service_title_two'=> 'WordPress Themes',
			'service_description_two' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.',
			
			'service_image_three' => $service_image, 
			'service_title_three'=> 'Responsive Designs',
			'service_description_three' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.',
			
			//portfolio
			'portfolio_section_enabled' => 'on',
			
			'portfolio_title_one' => 'Wall Street Style',
			'portfolio_description_one' => 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings.',
			'portfolio_image_one' => $portfolio_image,
			
			'portfolio_title_two' => 'Wall Street Style',
			'portfolio_description_two' => 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings.',
			'portfolio_image_two' => $portfolio_image,
			
			'portfolio_title_three' => 'Wall Street Style',
			'portfolio_description_three' => 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings.',
			'portfolio_image_three' => $portfolio_image,
			
			'portfolio_title_four' => 'Wall Street Style',
			'portfolio_description_four' => 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings.',
			'portfolio_image_four' => $portfolio_image,
			
			// Head Titles
			'contact_header_settings' => 'on',
			'contact_phone_number' => '1-800-123-789',
			'contact_email' => 'info@webriti.com',
			'service_title' => 'Our Services',
			'service_description' => 'We Offer Great Services to our Clients',
			'portfolio_title' => 'Featured Portfolio Project',
			'portfolio_description' => 'Most Popular of Our Works.',
			
			/** Social media links **/
			'header_social_media_enabled'=>'on',			
			'footer_social_media_enabled'=>'on',			
			'social_media_twitter_link' =>"http://twitter.com/",			
			'social_media_facebook_link' =>"http://facebook.com/",
			'social_media_googleplus_link' =>"http://www.google.com",
			'social_media_linkedin_link' =>"http://liknkedin.com/",		
			'social_media_youtube_link' =>"http://youtube.com/",
			
			/** footer customization **/
			'footer_customizations' => 'Copyright @ 2014 - WALL STREET. Designed by',
			'created_by_webriti_text' => 'Webriti',
			'created_by_link' => 'http://webriti.com/',
		);
}
?>