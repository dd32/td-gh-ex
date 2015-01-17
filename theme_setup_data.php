<?php
function theme_data_setup()
{	$slider_image = WEBRITI_TEMPLATE_DIR_URI . "/images/slider.jpg";
	$service_image = WEBRITI_TEMPLATE_DIR_URI . "/images/service.jpg";
	$portfolio_image = WEBRITI_TEMPLATE_DIR_URI . "/images/portfolio.jpg";
	return $theme_options=array(
			//Logo and Fevicon header
			'webriti_stylesheet'=>'default.css',
			'custom_background_enabled'=>'off',
			'upload_image_favicon'=>'',
			'webrit_custom_css'=>'',
			
			//Featured Image Setting
			'home_banner_enabled'=>'on',
			'slider_title_one' => __('elegance BY WEBRITI THEMES','elegance'),
			'slider_description' => __('Create Fresh Website fast with us!','elegance'),
			'slider_image' => $slider_image,
			
			// Social media links
			'header_social_media_enabled'=> 'on',
			'facebook_media_enabled'=> 'on',
			'twitter_media_enabled'=> 'on',
			'googleplus_media_enabled'=> 'on',
			'linkedin_media_enabled'=> 'on',
			'skype_media_enabled'=> 'on',
			'dribbble_media_enabled'=> 'on',
			'youtube_media_enabled'=> 'on',
			'vimeo_media_enabled'=> 'on',
			'pagelines_media_enabled'=> 'on',
			'social_media_facebook_link' => "#",
			'social_media_twitter_link' => "#",
			'social_media_googleplus_link' => "#",
			'social_media_linkedin_link' => "#",
			'social_media_skype_link' => "#",
			'social_media_dribbble_link' => "#",
			'social_media_youtube_link' => "#",
			'social_media_vimeo_link' => "#",
			'social_media_pagelines_link' => "#",
			
			//Contact Address Settings
			'contact_address_settings' => __('on','elegance'),
			'contact_phone_number' => __('+48-0987-654-321','elegance'),
			'contact_email' => __('info@elegancetheme.com','elegance'),
			
			
			
			//header logo setting
			'logo_section_settings' => 'on',
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'250',
			'text_title'=>'on',
			
			//header search Bar setting
			'header_search_bar_enabled' => 'on',
			
			//Home Top Call Out Area
			'header_call_out_area_enabled' => 'on',
			'header_call_out_title'=> __('Want to say Hey or find out more?','elegance'),
			'header_call_out_description'=> __('Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs  sint occaecat proidentse.','elegance'),
			'header_call_out_btn_text'=> __('Buy It Now!','elegance'),
			'header_call_out_btn_link'=>'',
			'header_call_out_btn_link_target'=>'on',
			
			
			//Footer Copyright custmization
			'footer_copyright_text' => __('<p>Copyright 2014 Elegance <a href="#">Wordpress Theme</a>. All rights reserved</p>','elegance'),
			
			//Footer Menu bar Setting			
			'footer_menu_bar_enabled' => 'on',
			
			//portfolio
			'portfolio_section_enabled' => 'on',
			
			'front_portfolio_title' => __('Latest Projects','elegance'),
			'front_portfolio_description' => __ ('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...','elegance'),
			
			'portfolio_one_title' => __('Business Growth','elegance'),
			'portfolio_one_description' => __('Morbi leo risus, porta ac consectetur vestibulum eros cras 	mattis consectetur purus sit...','elegance'),
			'portfolio_one_image' => $portfolio_image,

			'portfolio_two_title' => __('Functional Beauty','elegance'),
			'portfolio_two_description' => __('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...','elegance'),
			'portfolio_two_image' => $portfolio_image,
			
			'portfolio_three_title' => __('Planning Around','elegance'),
			'portfolio_three_description' => __('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...','elegance'),
			'portfolio_three_image' => $portfolio_image,
			
			
			// service
			'service_section_enabled' => 'on',
			'service_title' => __('Our Services','elegance'),
			'service_description' => __('Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','elegance'),
			/** Service One Setting **/
			'service_one_icon' => 'fa fa-shield',
			'service_one_title' => __('Responsive Design','elegance'),
			'service_one_description' => __('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.','elegance'),
			/** Service Two Setting **/
			'service_two_icon' => 'fa fa-tablet',
			'service_two_title' => __('Twitter Bootstrap 3.2.0','elegance'),
			'service_two_description' => __('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.','elegance'),
			/** Service Three Setting **/
			'service_three_icon' => 'fa fa-edit',
			'service_three_title' => __('Exclusive Support','elegance'),
			'service_three_description' => __('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.','elegance'),
			/** Service Four Setting **/
			'service_four_icon' => 'fa fa-star-half-o',
			'service_four_title' => __('Incredibly Flexible','elegance'),
			'service_four_description' => __('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.','elegance'),
			
			//Banner Heading
			
			'banner_title_category' => __('Category Title','elegance'),
			'banner_description_category' => __(' Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.','elegance'),
			
			'banner_title_archive' => __('Archive Title','elgent'),
			'banner_description_archive' => __(' Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.','elegance'),
			
			'banner_title_author' => __('Author Title','elgent'),
			'banner_description_author' => __(' Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.','elegance'),
			
			'banner_title_404' => __('404 Title','elegance'),
			'banner_description_404' => __(' Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.','elegance'),
								
			'banner_title_tag' => __('Tag Title','elegance'),
			'banner_description_tag' => __(' Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.','elegance'),
								
			'banner_title_search' => __('Search Title','elegance'),
			'banner_description_search' => __(' Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.','elegance'),
			
			);
}
?>