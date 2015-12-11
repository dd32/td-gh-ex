<?php /**Options Reset Here**/
$cpm_theme_options = bhumi_get_options();
/*
* General Settings
*/

function wl_reset_general_setting()
{
	$cpm_theme_options['upload_image_logo']="";
	$cpm_theme_options['height']=55;
	$cpm_theme_options['width']=150;
	$cpm_theme_options['_frontpage'] ="1";
	$cpm_theme_options['upload_image_favicon']="";
	$cpm_theme_options['text_title']="";
	$cpm_theme_options['custom_css']="";		
	update_option('bhumi_options',$cpm_theme_options);
}

/*
* Slide image Settings
*/

function wl_reset_slide_image_setting()
{
	$ImageUrl = get_template_directory_uri()."/assets/images/1.png";
	$ImageUrl2 = get_template_directory_uri()."/assets/images/2.png";
	$ImageUrl3 = get_template_directory_uri()."/assets/images/3.png";
	$cpm_theme_options['slide_image_1'] = $ImageUrl;
	$cpm_theme_options['slide_title_1'] = "Slide Title";
	$cpm_theme_options['slide_desc_1'] = "Lorem Ipsum is simply dummy text of the printing";
	$cpm_theme_options['slide_btn_text_1'] = "Read More";
	$cpm_theme_options['slide_btn_link_1'] = "#";
	$cpm_theme_options['slide_image_2'] = $ImageUrl2;
	$cpm_theme_options['slide_title_2'] = "Phasellus ultrices nulla quis nibh";
	$cpm_theme_options['slide_desc_2'] = "Lorem Ipsum is simply dummy text of the printing and typesetting industry";
	$cpm_theme_options['slide_btn_text_2'] = "Read More";
	$cpm_theme_options['slide_btn_link_2'] = "#";
	$cpm_theme_options['slide_image_3'] = $ImageUrl3;
	$cpm_theme_options['slide_title_3'] = "Contrary to popular ";
	$cpm_theme_options['slide_desc_3'] = "Aldus PageMaker including versions of Lorem Ipsum, rutrum turpi";
	$cpm_theme_options['slide_btn_text_3'] = "Read More";
	$cpm_theme_options['slide_btn_link_3'] = "#";
	
	
	update_option('bhumi_options', $cpm_theme_options);
}

/*
* Site into Settings
*/

function wl_reset_portfolio_setting()
{	
	$ImageUrl4 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio1.png";
	$ImageUrl5 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio2.png";
	$ImageUrl6 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio3.png";
	$ImageUrl7 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio4.png";
	$ImageUrl8 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio5.png";
	$ImageUrl9 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio6.png";
	$cpm_theme_options['portfolio_home'] = "";
	$cpm_theme_options['port_heading']="Recent Works";
	$cpm_theme_options['port_1_img']=$ImageUrl4;
	$cpm_theme_options['port_2_img']=$ImageUrl5;
	$cpm_theme_options['port_3_img']=$ImageUrl6;
	$cpm_theme_options['port_4_img']=$ImageUrl7;
	$cpm_theme_options['port_5_img']=$ImageUrl8;
	$cpm_theme_options['port_6_img']=$ImageUrl9;
	$cpm_theme_options['port_1_title']= "Charity ";
	$cpm_theme_options['port_2_title']= "Explore ";
	$cpm_theme_options['port_3_title']= "Dream ";
	$cpm_theme_options['port_4_title']= "Magazine ";	
	$cpm_theme_options['port_1_link']="#";
	$cpm_theme_options['port_2_link']="#";
	$cpm_theme_options['port_3_link']="#";
	$cpm_theme_options['port_4_link']="#";
	update_option('bhumi_options', $cpm_theme_options);
}

/*
* Service Settings
*/

function wl_reset_service_setting()
{
	$cpm_theme_options['service_1_title']="Gears";
	$cpm_theme_options['service_1_icons']="fa fa-gears";
	$cpm_theme_options['service_1_text']="Lorem Ipsum is simply dummy text. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s";
	$cpm_theme_options['service_1_link']="";
	
	$cpm_theme_options['service_2_title']="Star";
	$cpm_theme_options['service_2_icons']="fa fa-database";
	$cpm_theme_options['service_2_text']="Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC";
	$cpm_theme_options['service_2_link']="#";
	
	$cpm_theme_options['service_3_title']="WordPress";
	$cpm_theme_options['service_3_icons']="fa fa-wordpress";
	$cpm_theme_options['service_3_text']="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.";
	$cpm_theme_options['service_3_link']="#";
	
	$cpm_theme_options['service_4_title']="Base";
	$cpm_theme_options['service_4_icons']="fa fa-database";
	$cpm_theme_options['service_4_text']="Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.";
	$cpm_theme_options['service_4_link']="#";
	
	update_option('bhumi_options',$cpm_theme_options);
}

/*
* Social Settings
*/

function wl_reset_social_setting()
{
	$cpm_theme_options['footer_section_social_media_enbled']="1";
	$cpm_theme_options['header_social_media_in_enabled']="1";	
	$cpm_theme_options['twitter_link']="#";
	$cpm_theme_options['fb_link']="#";
	$cpm_theme_options['linkedin_link']="#";
	$cpm_theme_options['youtube_link']="#";
	$cpm_theme_options['dribble_link'] = "#";
	$cpm_theme_options['email_id'] ="example@mymail.com";
	$cpm_theme_options['phone_no'] ="0159753586";
	update_option('bhumi_options', $cpm_theme_options);
}

/*
* footer customizations Settings
*/

function wl_reset_footer_customizations_setting()
{
	$cpm_theme_options['footer_customizations']="@ 2015 bhumi Theme";
	$cpm_theme_options['developed_by_text']="Theme Developed By";
	$cpm_theme_options['developed_by_bhumi_text']="bhumi";
	$cpm_theme_options['developed_by_link']="http://bhumi.com/";
	update_option('bhumi_options',$cpm_theme_options);
}

function wl_reset_footer_footercall_setting () {
	$cpm_theme_options['fc_home'] = '1';
	$cpm_theme_options['fc_title']="Lorem Ipsum is simply dummy text of the printing and typesetting industry. ";
	$cpm_theme_options['fc_btn_txt']="bhumi";
	$cpm_theme_options['fc_btn_link']="http://bhumi.com/";
	// $cpm_theme_options['fc_radio']="bottom";
	update_option('bhumi_options',$cpm_theme_options);
}

function wl_reset_footer_homeblog_setting() {
	
	$cpm_theme_options['show_blog'] = '1';
	$cpm_theme_options['blog_title']="Latest Blog";
	update_option('bhumi_options',$cpm_theme_options);
}
?>