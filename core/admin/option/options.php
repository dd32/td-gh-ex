<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

require_once get_template_directory() . '/core/admin/option/default.php';

$panel = array (

/* =================== NAV =================== */

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "General" => __( "General","wip") , "Fonts" => __( "Fonts","wip") , "Colors" => __( "Colors","wip") , "Backgrounds" => __( "Backgrounds","wip")),   
       "start" => "<ul>", 
       "end" => "</ul>"),  
	   
/* =================== END NAV =================== */

/* =================== GENERAL TAB =================== */

array( "type" => "begintab",
	   "tab" => "General",
	   "element" =>
	   
/* START SKINS */ 

	array( "type" => "form",
	       "name" => "General"),

	array( "type" => "start",
	       "val" => "Skins",
	       "name" => __( "Skins","wip")),

	array( "name" => __( "Theme skin","wip"),
	       "desc" => __( "Select a skin, the options will be charged in accordance with the chosen style.","wip"),
	       "id" => $shortname."_skins",
	       "type" => "select",
	       "options" => array(
			   "light_orange" => __( "Light&Orange","wip"),
			   "light_turquoise" => __( "Light&Turquoise","wip"),
			   "light_blue" => __( "Light&Blue","wip"),
			   "light_red" => __( "Light&Red","wip"),
			   "light_purple" => __( "Light&Purple","wip"),
			   "light_yellow" => __( "Light&Yellow","wip"),
			   "light_green" => __( "Light&Green","wip"),
			   "dark_orange" => __( "Dark&Orange","wip"),
			   "dark_turquoise" => __( "Dark&Turquoise","wip"),
			   "dark_blue" => __( "Dark&Blue","wip"),
			   "dark_red" => __( "Dark&Red","wip"),
			   "dark_purple" => __( "Dark&Purple","wip"),
			   "dark_yellow" => __( "Dark&Yellow","wip"),
			   "dark_green" => __( "Dark&Green","wip"),
		   ),
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END SKINS */ 

/* START MAIN */ 

	array( "type" => "start",
	       "val" => "General",
	       "name" => __( "General","wip")),
	
	array( "name" => __( "Home Blog Layout","wip"),
	       "desc" => __( "If you don't select a single page, select a layout for homepage","wip"),
	       "id" => $shortname."_home",
	       "type" => "select",
	       "options" => array(
		   "home-default" => __( "Full Width","wip"),
	   	   "home-blog" => __( "Blog Sidebar","wip"),
		   ),
	       "std" => ""),
	
	array( "name" => __( "Category Layout","wip"),
	       "desc" => __( "Select a layout for category pages","wip"),
	       "id" => $shortname."_category_layout",
	       "type" => "select",
	       "options" => array(
		   "full" => __( "Full Width","wip"),
	   	   "left-sidebar" =>  __( "Left Sidebar","wip"),
	   	   "right-sidebar" => __( "Right Sidebar","wip"),
		   ),
	       "std" => ""),
		   
	array( "name" => __( "Comments","wip"),
	       "desc" => __( "You want to view the comments after articles?","wip"),
	       "class" => "hidden",
	       "id" => $shortname."_view_comments",
	       "type" => "on-off",
	       "std" => "off"),
	
	array( "name" => __( "Social Buttons","wip"),
	       "desc" => __( "You want to view the social buttons after articles?","wip"),
	       "class" => "hidden",
	       "id" => $shortname."_view_social_buttons",
	       "type" => "on-off",
	       "std" => "off"),
		   
	array( "name" => __( "Custom css","wip"),
	       "desc" => __( "Insert your custom css code","wip"),
	       "id" => $shortname."_custom_css_code",
	       "type" => "textarea",
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END GENERAL */ 

/* START LAYOUT */ 

	array( "type" => "start",
	       "val" => "Layout",
	       "name" => __( "Layout","wip")),
	
	array( "name" => __( "Top Sidebar Area Layout","wip"),
	       "desc" => __( "Select the layout for Top sidebar area","wip"),
	       "id" => $shortname."_top_sidebar_area",
	       "type" => "select",
	       "options" => array(
		   "span12" => __( "One Column","wip"),
	   	   "span6" => __( "Two Columns","wip"),
	   	   "span4" => __( "Three Columns","wip"),
	   	   "span3" => __( "Four Columns","wip"),
		   ),
	       "std" => ""),
		   
	array( "name" => __( "Footer Sidebar Area Layout","wip"),
	       "desc" => __( "Select the layout for Footer sidebar area","wip"),
	       "id" => $shortname."_footer_sidebar_area",
	       "type" => "select",
	       "options" => array(
		   "span12" => __( "One Column","wip"),
	   	   "span6" => __( "Two Columns","wip"),
	   	   "span4" => __( "Three Columns","wip"),
	   	   "span3" => __( "Four Columns","wip"),
		   ),
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END GENERAL */ 

/* START HEADER */ 

	array( "type" => "start",
	       "val" => "Header",
	       "name" => __( "Header","wip")),

	array( "name" => __( "Upload Custom Logo","wip"),
	       "desc" => __( "Upload a custom logo","wip"),
           "id" => $shortname."_custom_logo",     
           "data" => "array",
           "type" => "text",
           "class" => "hidden-element",
	       "std" => ""),
		   
	array( "name" => __( "Upload Custom Favicon","wip"),
	       "desc" => __( "Upload a custom favicon","wip"),
           "id" => $shortname."_custom_favicon",     
           "data" => "array",
           "type" => "text",
           "class" => "",
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END HEADER */ 

/* START FOOTER */ 

	array( "type" => "start",
	       "val" => "Footer",
	       "name" => __( "Footer","wip")),

	array( "name" => __( "Copyright Text","wip"),
	       "desc" => __( "Insert copyright text","wip"),
	       "id" => $shortname."_copyright_text",
	       "type" => "textarea",
	       "std" => ""),
		   
	array( "name" => __( "Facebook Url","wip"),
	       "desc" => __( "Insert Facebook Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_facebook_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Twitter Url","wip"),
	       "desc" => __( "Insert Twitter Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_twitter_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Flickr Url","wip"),
	       "desc" => __( "Insert Flickr Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_flickr_button",
	       "type" => "text",
	       "std" => ""),
	
	array( "name" => __( "Google Url","wip"),
	       "desc" => __( "Insert Google Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_google_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Linkedin Url","wip"),
	       "desc" => __( "Insert Linkedin Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_linkedin_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Myspace Url","wip"),
	       "desc" => __( "Insert Myspace Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_myspace_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Pinterest Url","wip"),
	       "desc" => __( "Insert Pinterest Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_pinterest_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Tumblr Url","wip"),
	       "desc" => __( "Insert Tumblr Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_tumblr_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Youtube Url","wip"),
	       "desc" => __( "Insert Youtube Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_youtube_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Youtube Vimeo","wip"),
	       "desc" => __( "Insert Vimeo Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_vimeo_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Skype Url","wip"),
	       "desc" => __( "Insert Skype Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_skype_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Email Address","wip"),
	       "desc" => __( "Insert Email Address (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_email_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Feed Rss Button","wip"),
	       "desc" => __( "You want display the Feed Rss button?","wip"),
	       "class" => "hidden",
	       "id" => $shortname."_footer_rss_button",
	       "type" => "on-off",
	       "std" => "off"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

array( "type" => "end"),

/* END FOOTER */ 

),

array( "type" => "endtab"),
	   

/* =================== FONTS OPTION TAB =================== */

array( "type" => "begintab",
	   "tab" => "Fonts",
	   "element" =>
	   
/* START LOGO FONT */ 

	array( "type" => "form",
	       "name" => "Fonts"),

	array( "type" => "start",
	       "val" => "Fonts",
	       "name" => __( "Fonts","wip")),

	array( "name" => __( "Font size","wip"),
	       "desc" => __( "Select a size for logo","wip"),
	       "id" => $shortname."_logo_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => ""),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Fonts"),

	array( "type" => "end"),

/* END LOGO FONT */ 

/* START MENU FONT */ 

	array( "type" => "start",
	       "val" => "Menu font",
	       "name" => __( "Menu font","wip")),

	array( "name" => __( "Menu size","wip"),
	       "desc" => __( "Select a size for menu","wip"),
	       "id" => $shortname."_menu_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => ""),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Menu font"),

	array( "type" => "end"),

/* END MENU FONT */ 

/* START HEADLINE FONT SIZES */ 
	   
	array( "type" => "start",
	       "val" => "Headline font sizes",
	       "name" => __( "Headline font sizes","wip")),

	array( "name" => __( "H1 headline","wip"),
	       "desc" => __( "Select a size for H1 elements","wip"),
	       "id" => $shortname."_h1_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "26px"),

	array( "name" => __( "H2 headline","wip"),
	       "desc" => __( "Select a size for H2 elements","wip"),
	       "id" => $shortname."_h2_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "24px"),

	array( "name" => __( "H3 headline","wip"),
	       "desc" => __( "Select a size for H3 elements","wip"),
	       "id" => $shortname."_h3_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "21px"),
		   
	array( "name" => __( "H4 headline","wip"),
	       "desc" => __( "Select a size for H4 elements","wip"),
	       "id" => $shortname."_h4_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "16px"),
		   
	array( "name" => __( "H5 headline","wip"),
	       "desc" => __( "Select a size for H5 elements","wip"),
	       "id" => $shortname."_h5_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "14px"),
		   
	array( "name" => __( "H6 headline","wip"),
	       "desc" => __( "Select a size for H6 elements","wip"),
	       "id" => $shortname."_h6_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "12px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Headline font sizes"),

	array( "type" => "end"),

/* END FONT SIZES */ 

),

array( "type" => "endtab"),

/* =================== END FONTS OPTION TAB =================== */


/* =================== COLORS OPTION TAB =================== */

array( "type" => "begintab",
	   "tab" => "Colors",
	   "element" =>
	   
/* START TEXT COLOR */ 

	array( "type" => "form",
	       "name" => "Colors"),

	array( "type" => "start",
	       "val" => "General colors",
	       "name" => __( "General colors","wip")),
		   
	array( "name" => __( "Text color","wip"),
	       "desc" => __( "Select a color for general text","wip"),
	       "id" => $shortname."_text_font_color",
	       "type" => "text",
	       "std" => "#616161"),

	array( "name" => __( "Copyright color","wip"),
	       "desc" => __( "Select a color for copyright text","wip"),
	       "id" => $shortname."_copyright_font_color",
	       "type" => "text",
	       "std" => "#fff"),

	array( "name" => __( "Link color","wip"),
	       "desc" => __( "Select a color for link","wip"),
	       "id" => $shortname."_link_color",
	       "type" => "text",
	       "std" => "#ff6644"),

	array( "name" => __( "Link color hover","wip"),
	       "desc" => __( "Select a color for link hover","wip"),
	       "id" => $shortname."_link_color_hover",
	       "type" => "text",
	       "std" => "#d14a2b"),

	array( "name" => __( "Border color","wip"),
	       "desc" => __( "Select a color for borders","wip"),
	       "id" => $shortname."_border_color",
	       "type" => "text",
	       "std" => "#ff6644"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Headline font sizes"),

	array( "type" => "end"),

	array( "type" => "start",
	       "val" => "Header colors",
	       "name" => __( "Header colors","wip")),
		   
	array( "name" => __( "Header color","wip"),
	       "desc" => __( "Select a color for header text (For example the menu)","wip"),
	       "id" => $shortname."_header_font_color",
	       "type" => "text",
	       "std" => "#fff"),

	array( "name" => __( "Header color hover","wip"),
	       "desc" => __( "Select a color for header text hover (For example the menu)","wip"),
	       "id" => $shortname."_header_hover_font_color",
	       "type" => "text",
	       "std" => "#fff"),

	array( "name" => __( "Submenu color","wip"),
	       "desc" => __( "Select a color for submenu.","wip"),
	       "id" => $shortname."_submenu_color",
	       "type" => "text",
	       "std" => "#fff"),
		   
	array( "name" => __( "Submenu text color","wip"),
	       "desc" => __( "Select a color for text of submenu.","wip"),
	       "id" => $shortname."_submenu_text_color",
	       "type" => "text",
	       "std" => "#fff"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Headline font sizes"),

	array( "type" => "end"),

/* END TEXT COLOR */ 

),

array( "type" => "endtab"),
	   
/* =================== END COLORS OPTION TAB =================== */

/* =================== BEGIN BACKGROUNDS TAB =================== */

array( "type" => "begintab",
	   "tab" => "Backgrounds",
	   "element" =>
	   

	array( "type" => "form",
	       "name" => "Backgrounds"),

/* START BACKGROUNDS */ 

	array( "type" => "start",
	       "val" => "Body Background",
	       "name" => __( "Body Background","wip")),

	array( "name" => __( "Color","wip"),
	       "desc" => __( "Select a color for body background.","wip"),
	       "id" => $shortname."_body_background_color",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Default image background","wip"),
	       "desc" => __( "Select a image for body background.","wip"),
	       "id" => $shortname."_body_background",
	       "type" => "background",
	       "options" => $backgrounds,
	       "std" => "/images/background/patterns/weave.png"),

	array( "name" => __( "Repeat","wip"),
	       "desc" => __( "Repeat","wip"),
	       "id" => $shortname."_body_background_repeat",
	       "type" => "select",
	       "options" => array(
	   	   		"" => "None",
	   	   		"repeat" => __( "Repeat","wip"),
				"no-repeat" => __( "No repeat","wip"),
	   			"repeat-x" => __( "Repeat orizzontal","wip"),
				"repeat-y" => __( "Repeat vertical","wip"),
		   ),
	       "std" => ""),

	array( "name" => __( "Background Position","wip"),
	       "desc" => __( "Background Position","wip"),
	       "id" => $shortname."_body_background_position",
	       "type" => "select",
	       "options" => array(
	   			"" => "None",
	   			"top left" => "top left",
				"top center" => "top center",
	   			"top right" => "top right",
				"center" => "center",
	   			"bottom left" => "bottom left",
				"bottom center" => "bottom center",
				"bottom right" => "bottom right",
		    ),
	       "std" => ""),

	array( "name" => __( "Background Attachment","wip"),
	       "desc" => __( "Background Attachment","wip"),
	       "id" => $shortname."_body_background_attachment",
	       "type" => "select",
	       "options" => array(
	   			"normal" => "normal",
				"fixed" => "fixed",
		    ),
	       "std" => ""),
	   
	array( "type" => "save-button",
	       "class" => "Body Background",
	       "value" => "Save"),

	array( "type" => "end"),

/* END BACKGROUNDS */ 

/* START HEADER BACKGROUNDS */ 

	array( "type" => "start",
	       "val" => "Header Backgrounds",
	       "name" => __( "Header Backgrounds","wip")),

	array( "name" => __( "Color","wip"),
	       "desc" => __( "Select a color for header background.","wip"),
	       "id" => $shortname."_header_background_color",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Default image background","wip"),
	       "desc" => __( "Select a image for header background.","wip"),
	       "id" => $shortname."_header_background",
	       "type" => "background",
	       "options" => $backgrounds,
	       "std" => "/images/background/patterns/weave.png"),

	array( "name" => __( "Repeat","wip"),
	       "desc" => __( "Repeat","wip"),
	       "id" => $shortname."_header_background_repeat",
	       "type" => "select",
	       "options" => array(
	   	   		"" => "None",
	   	   		"repeat" => __( "Repeat","wip"),
				"no-repeat" => __( "No repeat","wip"),
	   			"repeat-x" => __( "Repeat orizzontal","wip"),
				"repeat-y" => __( "Repeat vertical","wip"),
		   ),
	       "std" => ""),

	array( "name" => __( "Background Position","wip"),
	       "desc" => __( "Background Position","wip"),
	       "id" => $shortname."_header_background_position",
	       "type" => "select",
	       "options" => array(
	   			"" => "None",
	   			"top left" => "top left",
				"top center" => "top center",
	   			"top right" => "top right",
				"center" => "center",
	   			"bottom left" => "bottom left",
				"bottom center" => "bottom center",
				"bottom right" => "bottom right",
		    ),
	       "std" => ""),

	array( "name" => __( "Background Attachment","wip"),
	       "desc" => __( "Background Attachment","wip"),
	       "id" => $shortname."_header_background_attachment",
	       "type" => "select",
	       "options" => array(
	   			"normal" => "normal",
				"fixed" => "fixed",
		    ),
	       "std" => ""),
	   
	array( "type" => "save-button",
	       "class" => "Body Background",
	       "value" => "Save"),

	array( "type" => "end"),

/* END HEADER BACKGROUNDS */ 

/* START FOOTER BACKGROUNDS */ 

	array( "type" => "start",
	       "val" => "Footer Background",
	       "name" => __( "Footer Background","wip")),

	array( "name" => __( "Color","wip"),
	       "desc" => __( "Select a color for footer background.","wip"),
	       "id" => $shortname."_footer_background_color",
	       "type" => "text",
	       "std" => ""),
	   
	array( "name" => __( "Default image background","wip"),
	       "desc" => __( "Select a image for footer background.","wip"),
	       "id" => $shortname."_footer_background",
	       "type" => "background",
	       "options" => $backgrounds,
	       "std" => ""),
	   
	array( "name" => __( "Repeat","wip"),
	       "desc" => __( "Repeat","wip"),
	       "id" => $shortname."_footer_background_repeat",
	       "type" => "select",
	       "options" => array(
	   	   		"repeat" => __( "Repeat","wip"),
				"no-repeat" => __( "No repeat","wip"),
	   			"repeat-x" => __( "Repeat orizzontal","wip"),
				"repeat-y" => __( "Repeat vertical","wip"),
		    ),
	       "std" => ""),
	   
	array( "name" => __( "Background Position","wip"),
	       "desc" => __( "Background Position","wip"),
	       "id" => $shortname."_footer_background_position",
	       "type" => "select",
	       "options" => array(
	   			"" => "None",
	   			"top left" => "top left",
				"top center" => "top center",
	   			"top right" => "top right",
				"center" => "center",
	   			"bottom left" => "bottom left",
				"bottom center" => "bottom center",
				"bottom right" => "bottom right",
		    ),
	       "std" => ""),
		   
	array( "name" => __( "Background Attachment","wip"),
	       "desc" => __( "Background Attachment","wip"),
	       "id" => $shortname."_footer_background_attachment",
	       "type" => "select",
	       "options" => array(
	   			"normal" => "normal",
				"fixed" => "fixed",
		    ),
	       "std" => ""),
	   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Footer Background"),

	array( "type" => "end"),

/* END PAGE BACKGROUNDS */ 

),

array( "type" => "endtab"),
	   
/* END PAGE BACKGROUNDS */ 
	   
/* =================== END BACKGROUNDS TAB =================== */


array( "type" => "endpanel"),  

);

require_once get_template_directory() . '/core/admin/panel.php'; 

wip_optionpanel( $panel ); 

?>