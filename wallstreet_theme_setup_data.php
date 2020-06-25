<?php
function wallstreet_theme_data_setup()
{

	return $theme_options=array(
			//Logo and Fevicon header					
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'250',
			'text_title'=>__('on','wallstreet'),
			'upload_image_favicon'=>'',
			'webrit_custom_css'=>'',
			
			//Featured Image Setting
			'home_banner_enabled'=>__('on','wallstreet'),
			'slider_title_one' => __('Clean & fresh theme','wallstreet'),
			'slider_title_two' => __('Welcome to WallStreet','wallstreet'),
			'slider_description' => __('State-of-the-art HTML5-powered flexible layout with lightspeed fast CSS3 transition effects. Works perfectly on any modern mobile device.','wallstreet'),
			'slider_image' => 'slider',
			
			// service
			'service_section_enabled' => true,
			'service_section_animation_enabled' => true,
			
			'service_image_one' => 'service1', 
			'service_title_one'=> __('Product Design','wallstreet'),
			'service_description_one' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.','wallstreet'),
			
			'service_image_two' => 'service2', 
			'service_title_two'=> __('WordPress themes','wallstreet'),
			'service_description_two' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.','wallstreet'),
			
			'service_image_three' => 'service3', 
			'service_title_three'=> __('Responsive designs','wallstreet'),
			'service_description_three' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.','wallstreet'),
			
			//portfolio
			'portfolio_section_enabled' => true,
			
			'portfolio_title_one' => __('WallStreet style','wallstreet'),
			'portfolio_description_one' => __('A wonderful serenity has taken possession of my entire soul, like these sweet mornings.','wallstreet'),
			'portfolio_image_one' => 'portfolio1',
			
			'portfolio_title_two' => __('WallStreet style','wallstreet'),
			'portfolio_description_two' => __('A wonderful serenity has taken possession of my entire soul, like these sweet mornings.','wallstreet'),
			'portfolio_image_two' => 'portfolio2',
			
			'portfolio_title_three' => __('WallStreet style','wallstreet'),
			'portfolio_description_three' => __('A wonderful serenity has taken possession of my entire soul, like these sweet mornings.','wallstreet'),
			'portfolio_image_three' => 'portfolio3',
			
			'portfolio_title_four' => __('WallStreet style','wallstreet'),
			'portfolio_description_four' => __('A wonderful serenity has taken possession of my entire soul, like these sweet mornings.','wallstreet'),
			'portfolio_image_four' => 'portfolio4',
			
			//Home blog
			'blog_section_enabled' =>__('on','wallstreet'),
			
			// Head Titles
			'contact_header_settings' => true,
			'contact_phone_number' => __('1-800-123-789','wallstreet'),
			'contact_email' => __('info@webriti.com','wallstreet'),
			'service_title' => __('Our services','wallstreet'),
			'service_description' => __('We offer great services to our clients.','wallstreet'),
			'portfolio_title' => __('Featured portfolio project','wallstreet'),
			'portfolio_description' => __('Our most popular work','wallstreet'),
			'home_blog_heading'=> __('Our latest blog post','wallstreet'),
			'home_blog_description' => __('We work with new customers and grow their business.','wallstreet'),
			
			/** Social media links **/
			'header_social_media_enabled'=>__('on','wallstreet'),			
			'footer_social_media_enabled'=>__('on','wallstreet'),			
			'social_media_twitter_link' =>"#",			
			'social_media_facebook_link' =>"#",
			'social_media_googleplus_link' =>"#",
			'social_media_linkedin_link' =>"#",		
			'social_media_youtube_link' =>"#",
			'social_media_instagram_link' => '#',
			
			/** footer customization **/
			'footer_copyright' => '<p>'.__( '<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow"> Wallstreet</a> by Webriti', 'wallstreet' ).'</p>',
		
		);
}
