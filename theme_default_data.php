<?php 
function becorp_theme_default_data()
  	{
	return $becorp_option=array(
	
	//Header Settings
	'header_info_phone' =>get_theme_mod('header_info_phone',__('(2)245 23 68','becorp')),
	'header_info_mail'=> get_theme_mod('header_info_mail',__('becorp@gmail.com','becorp')),
	'header_social_media_enabled' => 1,
	'social_media_twitter_link' => '#',
	'social_media_facebook_link' => '#',
	'social_media_dribbble_link' => '#',
	'social_media_google_link' => '#',
	'social_media_linkedin_link' => '#',
	'social_media_rss_link' => '#',
	'facebook_media_enabled' => 0,
	'twitter_media_enabled' => 0,
	'linkedin_media_enabled' => 0,
	'dribbble_media_enabled' => 0,
	'google_media_enabled' => 0,
	'rss_media_enabled' => 0,
	
	//header logo setting
	'upload_image_logo'=>'',
	'height' => '50',
	'width' => '250',
	'becorp_custom_css'=> '',
	
	// Fooetr Customization
	'footer_customization_text' => get_theme_mod('footer_customization_text',__('@ 2015 Becorp Theme','becorp')),
	'footer_customization_develop' => get_theme_mod('footer_customization_develop',__('Developed By','becorp')),
	'develop_by_name' => get_theme_mod('develop_by_name',__('Asia Themes ','becorp')),
	'develop_by_link' => 'https://asiathemes.com/',
	
	);
  	}
  ?>