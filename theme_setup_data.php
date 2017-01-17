<?php
function theme_data_setup()
{	
	$port_image1= WEBRITI_TEMPLATE_DIR_URI . "/images/portfolio/port1.jpg";
	$port_image2= WEBRITI_TEMPLATE_DIR_URI . "/images/portfolio/port2.jpg";
	$port_image3= WEBRITI_TEMPLATE_DIR_URI . "/images/portfolio/port3.jpg";
	$port_image4= WEBRITI_TEMPLATE_DIR_URI . "/images/portfolio/port4.jpg";

	return $theme_options=array(
			//Logo and Fevicon header			
			'front_page'  => true,			
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'100',
			'text_title'=>true,
			'upload_image_favicon'=>'',
			'google_analytics'=>'',
			'webrit_custom_css'=>'',
			'theme_color' => 'default.css',
			'link_color_enable' => false,
			'link_color' => '#66d1b9',
			
			//Slider
			'slider_list'=>'',
			'total_slide'=>'',
			'animation' => 'slide',
			'home_banner_enabled'=>true,
			'slider_total' => 4,
			'featured_slider_post' => '',
			'animationSpeed' => '1500',
			'slideshowSpeed' => '2500',
			
			
			//Slider One 
			'slider_image_one' => WEBRITI_TEMPLATE_DIR_URI .'/images/slides/slide01.jpg',
			'slider_image_one_title' => __('Built your website','corpbiz'),
			'slider_image_one_description'=> __('Corpbiz is extremely clean in each code line, intensely awesome in very homepage, supper easy to use, highly flexible with responsive feature.','corpbiz'),
			'slider_one_readmore_text' => __('Read More','corpbiz'),
			'slider_one_readmore_link' => '#',
			'slider_one_readmore_ink_target' => true,
			
			// front page 
			'front_page_data'=>'site-info,service,project-slider,portfolio,testimonial,help-support,blog,call-out-area',
			
			
			//Site info
			'site_title_one'=>'40+',
			'site_title_two'=>__('Sample pages','corpbiz'),
			'site_description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis. Fusce a augue ante, pellentesque pretium erat. Fusce in turpis in velit tempor pretium. Integer a leo libero',
			'siteinfo_button_one_text'=>__('Read More','corpbiz'),
			'siteinfo_button_one_link'=>'#',
			'siteinfo_button_two_text'=>__('View portfolio','corpbiz'),
			'siteinfo_button_two_link'=>'#',
			'siteinfo_button_one_target'=> true,
			'siteinfo_button_two_target'=> true,
			
			//About us
			'service_section_about_enable' => false,
			'team_section_enable' => false ,
			'team_title' => 'Our Staff',
			'client_section_enable' => false,
			'footer_callout_section_enable' => false,
			
			// portfolio
			'portfolio_section_enabled' => true,
			'portfolio_title' => __('Our work speaks thousand words','corpbiz'),
			'portfolio_description' =>__('We have successfully completed over 2500 projects in mobile and web. Here are few of them.','corpbiz'),
			
			// Service
			'service_section_enable' => false,
			'service_section_project_enable' => false ,
			'service_section_client_enable' => false ,
			'service_section_footer_enable' => false,
			
			'service_list' => 4,
			'home_service_title'=>__('Our nice services','corpbiz'),
			'home_service_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis.',
			
			
			//Service
			'service_section_enabled' => true,
			'service_icon_one'=> "fa-mobile",
			'service_title_one'=> __('Responsive design','corpbiz'),
			'service_description_one'=> 'Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv',
			'home_service_one_link' => '#',
			'home_service_one_link_target' => true,
				
			'service_icon_two'=> "fa-rocket",
			'service_title_two'=>__('Power full admin','corpbiz'),
			'service_description_two'=> 'Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv',
			'home_service_two_link' => '#',
			'home_service_two_link_target' => true,
			
			'service_icon_three'=> "fa-thumbs-o-up",
			'service_title_three'=> __('Great support','corpbiz'),
			'service_description_three'=>'Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv',
			'home_service_third_link' => '#',
			'home_service_third_link_target' => true,
			
			'service_icon_four'=> "fa-laptop",
			'service_title_four'=> __('Clean minimal design','corpbiz'),
			'service_description_four'=> 'Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv',
			'home_service_fourth_link' => '#',
			'home_service_fourth_link_target' => true,
			
			// portfolio 
			'portfolio_title_one'=> __('Portfolio one','corpbiz'),
			'portfolio_image_one'=> $port_image1,
			'home_image_one_link'=>"#",
			'home_image_one_link_target'=>"on",
			
			'portfolio_title_two'=> __('Portfolio two','corpbiz'),
			'portfolio_image_two'=> $port_image2,
			'home_image_two_link'=>"#",
			'home_image_two_link_target'=>"on",
			
			'portfolio_title_three'=> __('Portfolio three','corpbiz'),
			'portfolio_image_three'=> $port_image3,
			'home_image_three_link'=>"#",
			'home_image_three_link_target'=>"on",
			
			'portfolio_title_four'=> __('Portfolio four','corpbiz'),
			'portfolio_image_four'=> $port_image4,
			'home_image_four_link'=>"#",
			'home_image_four_link_target'=>"on",
			
			// Theme help and support section
			'home_theme_support_title'=>__('We are here to help you','corpbiz'),
			'home_theme_support_description'=>__('24+7 hours support by us','corpbiz'),
			'home_theme_support_bg'=>'',
			
			'home_support_icon_one'=>'fa-meh-o',
			'home_support_title_one'=>__('Need Support','corpbiz'),
			'home_support_desciption_one'=>'Lorem ipsum dolor sit amet, consectetur faucibus risus non iaculis. Fusce a augue Fusce in turpis in',
			'home_support_learn_more_text_one'=>__('Read More','corpbiz'),
			'home_support_learn_more_link_one'=>'#',
			'home_support_learn_more_target_one'=>true,
			
			'home_support_icon_two'=>'fa-list-ol',
			'home_support_title_two'=>__('Check our forum','corpbiz'),
			'home_support_desciption_two'=> 'Lorem ipsum dolor sit amet, consectetur faucibus risus non iaculis. Fusce a augue Fusce in turpis in',
			'home_support_learn_more_text_two'=>__('Read More','corpbiz'),
			'home_support_learn_more_link_two'=>'#',
			'home_support_learn_more_target_two'=>true,
			
			'home_support_icon_three'=>'fa-support',
			'home_support_title_three'=>__('Get updated','corpbiz'),
			'home_support_desciption_three'=> 'Lorem ipsum dolor sit amet, consectetur faucibus risus non iaculis. Fusce a augue Fusce in turpis in',
			'home_support_learn_more_text_three'=>__('Read More','corpbiz'),
			'home_support_learn_more_link_three'=>'#',
			'home_support_learn_more_target_three'=>true,
			
			//blog
			'blog_meta_section_settings' => false,
			'blog_selected_category_id'=> 1,
			'blog_title' => __('From blog','corpbiz'),
			'blog_description' => 'Lorem ipsum dolor sit ametconsectetuer adipiscing elit.',
			'post_display_count' => '3' ,
			
			//Footer call out area
			'call_out_title'=>__('Get your app ideas transformed into reality','corpbiz'),
			'call_out_text'=> 'Lorem ipsum dolor sit amet, consectetur faucibus risus non iaculis. Fusce a augue Fusce in turpis in.',
			'call_out_button_text'=>__('Read More','corpbiz'),
			'call_out_button_link'=>'#',
			'call_out_button_link_target' =>true,

			//client
			'client_list'=>'4',
			'total_client'=>'',
			'home_client_title'=>__('What our clients say','corpbiz'),
			'home_client_desciption'=>__('lets see what we hear from our valuable clients','corpbiz'),
			
			
			//contact page settings
			'contact_info_enabled' => true,
			'contact_info_title' => __('Contact info','corpbiz'),
			'contect_info_description' => 'Aliquam suscipit quis odio a volutpat. Aenean sed sagittis dolor. Pellentesque vitae fermentum diam, vitae gravida eros. Proin interdum imperdiet elit, in auctor sem consequat sed.',
			'send_usmessage' => __('Contact us','corpbiz'),
			'our_office_enabled'=>'on',
			'contact_address'=>'138, AtlantisLnKingsport',
			'contact_address_two'=> 'Illinois. 121164',
			'contact_phone_number'=>'1 800 559 6580 ',			
			'contact_email'=>'themes@webriti.com',
				
			'contact_google_map_enabled'=>true,
			'contact_google_map_url' => 'https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kota+Industrial+Area,+Kota,+Rajasthan&amp;aq=2&amp;oq=kota+&amp;sll=25.003049,76.117499&amp;sspn=0.020225,0.042014&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Kota+Industrial+Area,+Kota,+Rajasthan&amp;z=13&amp;ll=25.142832,75.879538',
			'contact_callout_disable'=>false,
			
			
			
			'enable_custom_typography'=>false,				
			
			// general typography			
			'general_typography_fontsize'=>'16',
			'general_typography_fontfamily'=>300,
			'general_typography_fontstyle'=>"",
			
			// menu title
			'menu_title_fontsize'=>'15',
			'menu_title_fontfamily'=>400,
			'menu_title_fontstyle'=>"",
			
			// post title
			'post_title_fontsize'=>'32',
			'post_title_fontfamily'=>300,
			'post_title_fontstyle'=> "",
					
			// Service  title
			'service_title_fontsize'=>'20',
			'service_title_fontfamily'=>400,
			'service_title_fontstyle'=>"",
			
			// Potfolio  title Widget Heading Title
			'portfolio_title_fontsize'=>'20',
			'portfolio_title_fontfamily'=>400,
			'portfolio_title_fontstyle'=>"",
			
			// Widget Heading Title
			'widget_title_fontsize'=>'28',
			'widget_title_fontfamily'=>300,
			'widget_title_fontstyle'=>"",
			
			// Call out area Title   
			'calloutarea_title_fontsize'=>'36',
			'calloutarea_title_fontfamily'=>300,
			'calloutarea_title_fontstyle'=>"",
			
			// Call out area descritpion      
			'calloutarea_description_fontsize'=>'15',
			'calloutarea_description_fontfamily'=>400,
			'calloutarea_description_fontstyle'=>"",
			
			'footer_copyright_text' => '<p>All Rights Reserved by Corpbiz. Designed and Developed by <a href="'.esc_url('http://www.webriti.com').'" target="_blank">WordPress Theme</a></p>',
			
			//Taxonomy Archive Portfolio
			'taxonomy_portfolio_list' => 2,
		);
}
?>