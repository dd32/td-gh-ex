<?php
function theme_data_setup()
{	
			$slider_image = WEBRITI_TEMPLATE_DIR_URI . "/images/slider.jpg";
			return $theme_options=array(
			//Logo and Fevicon header
			'webriti_stylesheet'=>'default.css',
			'custom_background_enabled'=>'off',
			'upload_image_favicon'=>'',
			'height'=>'50',
			'width'=>'205',
			'webrit_custom_css'=>'',
			
			
			//Featured slider Setting
			'home_banner_enabled'=>'on',
			'home_post_enabled' => 'on',
			'slider_total' => 4,
			'slider_radio' => 'demo',
			'slider_options'=> 'slide',
			'slider_transition_delay'=> '2000',
			'slider_select_category' => 'Uncategorized',
			'featured_slider_post' => '',
			
			//front page contact information
			'front_callout_enable'=>'on',
			
			'front_contact1_title'=> __('Have a question? Call us now','appointment'),
			'front_contact1_val'=>'+82 334 843 52',
			'contact_one_icon' =>'fa fa-phone',
			
			'front_contact2_title'=> __('We are open Mon-Fri','appointment'),
			'front_contact2_val'=>'Mon - Fri 08.00 - 18.00',
			'contact_two_icon' =>'fa fa-clock-o',
			
			
			'front_contact3_title'=> __('Drop us an mail','appointment'),
			'front_contact3_val'=>'info@yoursupport.com',
			'contact_three_icon' =>'fa fa-envelope',
			
			// service
			'service_section_enabled' => 'on',
			'service_title' => __('Why Choose Us','appointment'),
			'service_description' => __('We Work with New Customers anad Grow Their Businesses','appointment'),
			/** Service One Setting **/
			'service_one_icon' => 'fa fa-bell-o',
			'service_one_title' => __('Easy to Use','appointment'),
			'service_one_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
			/** Service Two Setting **/
			'service_two_icon' => 'fa fa-mobile',
			'service_two_title' => __('Responsive Design','appointment'),
			'service_two_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
			/** Service Three Setting **/
			'service_three_icon' => 'fa fa-laptop',
			'service_three_title' => __('Very Flexible','appointment'),
			'service_three_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
			/** Service Four Setting **/
			'service_four_icon' => 'fa fa-support',
			'service_four_title' => __('Well Support','appointment'),
			'service_four_description' => __('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.','appointment'),
			/** Service Five Setting **/
			'service_five_icon' => 'fa fa-code',
			'service_five_title' => __('Clean Code','appointment'),
			'service_five_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
			/** Service six Setting **/
			'service_six_icon' => 'fa fa-cog',
			'service_six_title' => __('Customizable','appointment'),
			'service_six_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
			
			// Home Latest News
			
			'home_blog_enabled' => 'on',
			'blog_heading' => 'Latest News',
			'blog_description' => 'ipsum therefore always',
			'home_meta_section_settings' => 'on',
			'post_display_count' => 2,
			'blog_selected_category_id' => array(get_option('default_category')),
			
			// Social media links
			'header_social_media_enabled'=> 'on',
			'facebook_media_enabled'=> 'on',
			'twitter_media_enabled'=> 'on',
			'linkedin_media_enabled'=> 'on',
			'social_media_facebook_link' => "#",
			'social_media_twitter_link' => "#",
			'social_media_linkedin_link' => "#",
			
			//Meta Setting
			'meta_section_settings' => 'on',
			
			//header logo setting
			'logo_section_settings' => 'on',
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'250',
			'text_title'=>'on',
			
			//Home Call Out Area
			'home_call_out_area_enabled' => 'on',
			'home_call_out_title'=> __('Want to say Hey or find out more?','appointment'),
			'home_call_out_description'=> __('Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs  sint occaecat proidentse.','appointment'),
			'home_call_out_btn1_text'=> __('Purshase Now!','appointment'),
			'home_call_out_btn1_link'=>'',
			'home_call_out_btn1_link_target'=>'on',
			'home_call_out_btn2_text'=> __('Get in touch!','appointment'),
			'home_call_out_btn2_link'=>'',
			'home_call_out_btn2_link_target'=>'on',
			
			//Footer Copyright custmization
			'footer_copyright_text' => __('<p>Copyright 2014 appointment <a href="#">WordPress Theme</a>. All rights reserved</p>','appointment'),
			
			//Footer Social LInks
			'footer_social_media_enabled'=> 'on',
			'footer_facebook_media_enabled'=> 'on',
			'footer_twitter_media_enabled'=> 'on',
			'footer_linkedin_media_enabled'=> 'on',
			'footer_googleplus_media_enabled'=> 'on',
			'footer_skype_media_enabled'=> 'on',
			
			'footer_social_media_facebook_link' => "#",
			'footer_social_media_twitter_link' => "#",
			'footer_social_media_linkedin_link' => "#",
			'footer_social_media_googleplus_link' => "#",
			'footer_social_media_skype_link' => "#",
			);
}
?>