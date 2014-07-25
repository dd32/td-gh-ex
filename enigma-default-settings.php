<?php
function weblizar_default_settings()
{
	$ImageUrl = WL_TEMPLATE_DIR_URI ."/images/1.png";
	$ImageUrl2 = WL_TEMPLATE_DIR_URI ."/images/2.png";
	$ImageUrl3 = WL_TEMPLATE_DIR_URI ."/images/3.png";
	$ImageUrl4 = WL_TEMPLATE_DIR_URI ."/images/portfolio1.png";
	$ImageUrl5 = WL_TEMPLATE_DIR_URI ."/images/portfolio2.png";
	$ImageUrl6 = WL_TEMPLATE_DIR_URI ."/images/portfolio3.png";
	$ImageUrl7 = WL_TEMPLATE_DIR_URI ."/images/portfolio4.png";
	$ImageUrl8 = WL_TEMPLATE_DIR_URI ."/images/portfolio5.png";
	$ImageUrl9 = WL_TEMPLATE_DIR_URI ."/images/portfolio6.png";
	return $wl_theme_options=array(
			//Logo and Fevicon header			
			'upload_image_logo'=>'',
			'height'=>'55',
			'width'=>'150',
			'text_title'=>'off',
			'upload_image_favicon'=>'',			
			'custom_css'=>'',
			'slide_image_1' => $ImageUrl,
			'slide_title_1' => 'Slide Title',
			'slide_desc_1' => 'tudi v priljubljenih programih za namizno založništvo kot',
			'slide_btn_text_1' => 'Read More',
			'slide_btn_link_1' => '#',
			'slide_image_2' => $ImageUrl2,
			'slide_title_2' => 'Lorem Ipsuma',
			'slide_desc_2' => 'kombinacijo znakov neznani tiskar združil v vzorčno',
			'slide_btn_text_2' => 'Read More',
			'slide_btn_link_2' => '#',
			'slide_image_3' => $ImageUrl3,
			'slide_title_3' => ' zgolj naključno e',
			'slide_desc_3' => 'nenačrtovano ali namenoma, z različnimi š',
			'slide_btn_text_3' => 'Read More',
			'slide_btn_link_3' => '#',			
			'blog_title'=>'Latest Blog',			
			'fc_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
			'fc_btn_txt' => 'More Features',
			'fc_btn_link' =>'#',
			//Social media links
			'header_social_media_in_enabled'=>'on',
			'footer_section_social_media_enbled'=>'on',
			'twitter_link' =>"https://twitter.com/",
			'fb_link' =>"https://facebook.com",
			'linkedin_link' =>"http://linkedin.com/",
			'youtube_link' =>"https://youtube.com/",
			
			'email_id' => 'enigma@mymail.com',
			'phone_no' => '0159753586',
			'footer_customizations' => ' &#169; 2014 Enigma Theme',
			'developed_by_text' => 'Theme Developed By',
			'developed_by_weblizar_text' => 'Weblizar Themes',
			'developed_by_link' => 'http://weblizar.com/',
			
			'home_service_heading' => 'Our Services',
			'service_1_title'=>"Idea",
			'service_1_icons'=>"fa fa-google",
			'service_1_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
			'service_1_link'=>"#",
			
			'service_2_title'=>"Records",
			'service_2_icons'=>"fa fa-database",
			'service_2_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
			'service_2_link'=>"#",
			
			'service_3_title'=>"WordPress",
			'service_3_icons'=>"fa fa-wordpress",
			'service_3_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
			'service_3_link'=>"#",			

			//Portfolio Settings:
			'port_heading' => 'Recent Works',
			'port_1_img'=> $ImageUrl4,
			'port_1_title'=>'modsætning',
			'port_1_link'=>'#',
			'port_2_img'=> $ImageUrl5,			
			'port_2_title'=>'udgaver',
			'port_2_link'=>'#',
			'port_3_img'=> $ImageUrl6,
			'port_3_title'=>'udgaver',
			'port_3_link'=>'#',
			'port_4_img'=> $ImageUrl7,
			'port_4_title'=>'udgaver',
			'port_4_link'=>'#',
			
		);
}

$wl_theme_options = get_option('enigma_options');

/*
* General Settings
*/

function reset_general_setting()
{
	$wl_theme_options['upload_image_logo']="";
	$wl_theme_options['height']=55;
	$wl_theme_options['width']=150;
	$wl_theme_options['upload_image_favicon']="";
	$wl_theme_options['text_title']="on";
	$wl_theme_options['custom_css']="";		
	update_option('enigma_options',$wl_theme_options);
}

/*
* Slide image Settings
*/

function reset_slide_image_setting()
{
	$ImageUrl = get_template_directory_uri()."/images/1.png";
	$ImageUrl2 = get_template_directory_uri()."/images/2.png";
	$ImageUrl3 = get_template_directory_uri()."/images/3.png";
	$wl_theme_options['slide_image_1'] = $ImageUrl;
	$wl_theme_options['slide_title_1'] = "Slide Title";
	$wl_theme_options['slide_desc_1'] = "tudi v priljubljenih programih za namizno založništvo kot";
	$wl_theme_options['slide_btn_text_1'] = "Read More";
	$wl_theme_options['slide_btn_link_1'] = "#";
	$wl_theme_options['slide_image_2'] = $ImageUrl2;
	$wl_theme_options['slide_title_2'] = "Lorem Ipsuma";
	$wl_theme_options['slide_desc_2'] = "kombinacijo znakov neznani tiskar združil v vzorčno";
	$wl_theme_options['slide_btn_text_2'] = "Read More";
	$wl_theme_options['slide_btn_link_2'] = "#";
	$wl_theme_options['slide_image_3'] = $ImageUrl3;
	$wl_theme_options['slide_title_3'] = " zgolj naključno ";
	$wl_theme_options['slide_desc_3'] = "nenačrtovano ali namenoma, z različnimi š";
	$wl_theme_options['slide_btn_text_3'] = "Read More";
	$wl_theme_options['slide_btn_link_3'] = "#";
	
	
	update_option('enigma_options', $wl_theme_options);
}

/*
* Site into Settings
*/

function reset_portfolio_setting()
{	
	$ImageUrl4 = WL_TEMPLATE_DIR_URI ."/images/portfolio1.png";
	$ImageUrl5 = WL_TEMPLATE_DIR_URI ."/images/portfolio2.png";
	$ImageUrl6 = WL_TEMPLATE_DIR_URI ."/images/portfolio3.png";
	$ImageUrl7 = WL_TEMPLATE_DIR_URI ."/images/portfolio4.png";
	$ImageUrl8 = WL_TEMPLATE_DIR_URI ."/images/portfolio5.png";
	$ImageUrl9 = WL_TEMPLATE_DIR_URI ."/images/portfolio6.png";
	
	$wl_theme_options['port_heading']="Recent Works";
	$wl_theme_options['port_1_img']=$ImageUrl4;
	$wl_theme_options['port_2_img']=$ImageUrl5;
	$wl_theme_options['port_3_img']=$ImageUrl6;
	$wl_theme_options['port_4_img']=$ImageUrl7;
	$wl_theme_options['port_5_img']=$ImageUrl8;
	$wl_theme_options['port_6_img']=$ImageUrl9;
	$wl_theme_options['port_1_title']= "disponibile";
	$wl_theme_options['port_2_title']= "modsætning";
	$wl_theme_options['port_3_title']= "disponibile";
	$wl_theme_options['port_4_title']= "modsætning";
	$wl_theme_options['port_5_title']= "disponibile";
	$wl_theme_options['port_6_title']= "Pasajul";
	$wl_theme_options['port_1_link']="#";
	$wl_theme_options['port_2_link']="#";
	$wl_theme_options['port_3_link']="#";
	$wl_theme_options['port_4_link']="#";
	update_option('enigma_options', $wl_theme_options);
}

/*
* Service Settings
*/

function reset_service_setting()
{
	$wl_theme_options['service_1_title']="Idea";
	$wl_theme_options['service_1_icons']="icon-lightbulb";
	$wl_theme_options['service_1_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in";
	$wl_theme_options['service_1_link']="";
	
	$wl_theme_options['service_2_title']="Design";
	$wl_theme_options['service_2_icons']="icon-laptop";
	$wl_theme_options['service_2_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in";
	$wl_theme_options['service_2_link']="#";
	
	$wl_theme_options['service_3_title']="Management";
	$wl_theme_options['service_3_icons']="glyphicon glyphicon-th";
	$wl_theme_options['service_3_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in";
	$wl_theme_options['service_3_link']="#";
	
	$wl_theme_options['service_4_title']="Development";
	$wl_theme_options['service_4_icons']="icon-code";
	$wl_theme_options['service_4_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
	$wl_theme_options['service_4_link']="#";
	
	$wl_theme_options['service_5_title']="Testing";
	$wl_theme_options['service_5_icons']="icon-code";
	$wl_theme_options['service_5_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
	$wl_theme_options['service_5_link']="#";
	
	$wl_theme_options['service_6_title']="Collbration";
	$wl_theme_options['service_6_icons']="icon-code";
	$wl_theme_options['service_6_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
	$wl_theme_options['service_6_link']="#";
	
	update_option('enigma_options',$wl_theme_options);
}

/*
* Social Settings
*/

function reset_social_setting()
{
	$wl_theme_options['footer_section_social_media_enbled']="on";
	$wl_theme_options['header_social_media_in_enabled']="on";	
	$wl_theme_options['twitter_link']="https://twitter.com/";
	$wl_theme_options['fb_link']="https://facebook.com/";
	$wl_theme_options['linkedin_link']="https://linkedin.com/";
	$wl_theme_options['youtube_link']="https://youtube.com/";
	$wl_theme_options['dribble_link'] = "https://dribble.com/";
	$wl_theme_options['email_id'] ="enigma@mymail.com";
	$wl_theme_options['phone_no'] ="0159753586";
	update_option('enigma_options', $wl_theme_options);
}

/*
* footer customizations Settings
*/

function reset_footer_customizations_setting()
{
	$wl_theme_options['footer_customizations']="@ 2014 Weblizar Theme";
	$wl_theme_options['developed_by_text']="Theme Developed By";
	$wl_theme_options['developed_by_weblizar_text']="Weblizar";
	$wl_theme_options['developed_by_link']="http://weblizar.com/";
	update_option('enigma_options',$wl_theme_options);
}

function reset_footer_footercall_setting () {
	$wl_theme_options['blog_title']="Latest Blog";
	$wl_theme_options['fc_title']="Lorem Ipsum is simply dummy text of the printing and typesetting industry. ";
	$wl_theme_options['fc_btn_txt']="Weblizar";
	$wl_theme_options['fc_btn_link']="http://weblizar.com/";
	update_option('enigma_options',$wl_theme_options);
}
?>