<?php
function theme_data_setup()
{	
			return $theme_options=array(
			//Logo and Fevicon header
			'webriti_stylesheet'=>'default.css',
			'custom_background_enabled'=>'off',
			'upload_image_favicon'=>'',
			'webrit_custom_css'=>'',
			
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
			
			//Footer Copyright custmization
			'footer_copyright_text' => __('<p>Copyright 2014 appointment <a href="#">Wordpress Theme</a>. All rights reserved</p>','appointment'),
			
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