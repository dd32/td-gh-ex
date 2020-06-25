<?php
/*---------------------------------------------------------------------------------*
 * @file           theme_stup_data.php
 * @package        Rambo
 * @copyright      2013 webriti
 * @license        license.txt
 * @author       :	webriti
 * @filesource     wp-content/themes/rambo/theme_setup_data.php
 *	Admin  & front end defual data file 
 *-----------------------------------------------------------------------------------*/ 
function rambo_theme_data_setup()
{
	return $rambo_pro_theme_options  = array(		
			'webrit_custom_css'=>'',
			'rambo_custom_css'=>'',
			
			//Home image section 	
			'home_banner_enabled'=>true,
			'home_custom_image' => '',								
			'home_image_title' => '',
			'home_image_description' => '',	
			'read_more_text' => '',
			'read_more_button_link' => '',
			'read_more_link_target' => true,
			
			// Site Intro Layout 
			'site_intro_column_layout' => 1,
			'site_intro_bottom_column_layout'=> 1,
			
			//Slide
			'home_slider_enabled'=>true,
			'slider_post' => WEBRITI_TEMPLATE_DIR_URI .'/images/slider.png',
			'slider_title' => __('Responsive WP theme','rambo'),
			'slider_text' => __('We are a group of passionate designers and developers who really love creating awesome WordPress themes & giving support.','rambo'),
			'slider_readmore_text' => __('Read More','rambo'),
			'readmore_text_link' => '#',
			'readmore_target' => false,
			
			
			// service
			'home_service_enabled'=>false,
			'service_list' => 4,
			'service_title' => __('Our Services','rambo'),
			'service_description' => __('Check out our Main Services which we offer to every client','rambo'),
			
			// project 
			'home_projects_enabled' => false,
			'project_protfolio_enabled'=>false,
			'project_heading_one'=> __('Featured Portfolio Projects','rambo'),
			'project_tagline'=>__('Maecenas sit amet tincidunt elit. Pellentesque habitant morbi tristique senectus et netus et Nulla facilisi.','rambo'),
			// home project 
			'project_list'=>4,
			
			//home latest news
			'post_display_count' => 3,
			'news_enable' => false,
			'home_slider_post_enable' => true,
			'blog_section_head' =>'',
			
			
			// site intro info 
			'site_info_enabled'=>true,
			'site_info_title'=>'',
			'site_info_descritpion' =>'',
			'site_info_button_text'=>'',
			'site_info_button_link'=>'#',
			'site_info_button_link_target' => true,
			
			
			// site intro info 			
			'site_intro_descritpion' => __('Rambo is a clean and fully responsive Template.','rambo'),
			'site_intro_button_text'=> __('Purchase Now','rambo'),
			'site_intro_button_link'=>'#',
			'intro_button_target'=>true,
			
			// Service section
			'service_section_title'=>'',
			'service_section_descritpion'=> __('Check out our Main Services which we offer to every client','rambo'),
			
			/** footer customization **/
			'footer_copyright' => sprintf(__('<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">Rambo</a> by Webriti', 'rambo')),

			/* Footer social media */
			'footer_social_media_enabled'=>false,
			
			// footer customization
			'footer_widgets_enabled'=>'on',
			'rambo_copy_rights_text'=>'',			
			'rambo_designed_by_head'=>'',
			'rambo_designed_by_text'=>'',
			'rambo_designed_by_link'=>'',
			
			
			//Social media links
			'social_media_twitter_link' =>"#",
			'social_media_facebook_link' =>"#",
			'social_media_linkedin_link' =>"#",
			'social_media_google_plus' =>"#",
			
			//Service Layout
			'service_section_title'=> __('Our Services','rambo'),
			'service_section_description' => __('Check out our Main Services which we offer to every client','rambo'),
			'service_column_layout'=> 4,
			
			//Project Layout
			'project_column_layout'  => 4,

			//News Column Layout
			'news_column_layout' => 3,
			'latest_news_title' => __('Latest News','rambo'),
			
			
			//Projects Section Settings
			'home_projects_enabled' => true,
			'project_one_thumb' => WEBRITI_TEMPLATE_DIR_URI .'/images/project_thumb.png',
			'project_one_title' => __('Mobile Apps','rambo'),
			'project_one_text' => __('A set of pieces of creative work collected to be shown to potential customers or employers; "the artist had put together a portfolio of his work"','rambo'),
		
		    'project_one_thumb' => WEBRITI_TEMPLATE_DIR_URI .'/images/project_thumb1.png',
			'project_two_title' => __('Super Baby','rambo'), 
			'project_two_text' => __('A set of pieces of creative work collected to be shown to potential customers or employers; "the artist had put together a portfolio of his work";','rambo'),
			
			'project_one_thumb' => WEBRITI_TEMPLATE_DIR_URI .'/images/project_thumb2.png',
			'project_three_title' => __('Coffee Break','rambo'),
			'project_three_text' => __('A set of pieces of creative work collected to be shown to potential customers or employers; "the artist had put together a portfolio of his work";','rambo'),
			
			'project_one_thumb' => WEBRITI_TEMPLATE_DIR_URI .'/images/project_thumb3.png',
			'project_four_title' => __('Beautiful Birds','rambo'),
			'project_four_text' => __('A set of pieces of creative work collected to be shown to potential customers or employers; "the artist had put together a portfolio of his work";','rambo'),

		);
}
?>