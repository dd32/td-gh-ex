<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

require_once dirname(__FILE__) . '/default.php';

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
	   
	array( "type" => "form",
	       "name" => "General"),

/* START LOAD SYSTEM */ 

	array( "type" => "startopen",
	       "val" => "Load system",
	       "name" => __( "Load system","wip")),

	array( "name" => __( "Load system","wip"),
	       "desc" => __( "Select a load system, if you've some problems with the theme (for example a blank page).","wip"),
	       "id" => $shortname."_loadsystem",
	       "type" => "select",
	       "options" => array(
			   "mode_a" => __( "Mode a","wip"),
			   "mode_b" => __( "Mode b","wip"),
		   ),
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END LOAD SYSTEM */ 

/* START SKINS */ 

	array( "type" => "start",
	       "val" => "Skins",
	       "name" => __( "Skins","wip")),

	array( "name" => __( "Theme skin","wip"),
	       "desc" => __( "Select a skin, the options will be charged in accordance with the chosen style.","wip"),
	       "id" => $shortname."_skins",
	       "type" => "select",
	       "options" => array(
	   	   "turquoise" => __( "Turquoise","wip"),
	   	   "orange" => __( "Orange","wip"),
	   	   "blue" => __( "Blue","wip"),
	   	   "red" => __( "Red","wip"),
	   	   "purple" => __( "Purple","wip"),
	   	   "yellow" => __( "Yellow","wip"),
	   	   "green" => __( "Green","wip"),
	   	   "light_turquoise" => __( "Light & Turquoise","wip"),
	   	   "light_orange" => __( "Light & Orange","wip"),
	   	   "light_blue" => __( "Light & Blue","wip"),
	   	   "light_red" => __( "Light & Red","wip"),
	   	   "light_purple" => __( "Light & Purple","wip"),
	   	   "light_yellow" => __( "Light & Yellow","wip"),
	   	   "light_green" => __( "Light & Green","wip"),
		   ),
	       "std" => "light_turquoise"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END SKINS */ 

/* START MAIN */ 

	array( "type" => "start",
	       "val" => "General",
	       "name" => __( "General","wip")),
	
	array( "name" => __( "Comments","wip"),
	       "desc" => __( "You want to view the comments after articles?","wip"),
	       "class" => "hidden",
	       "id" => $shortname."_view_comments",
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

/* START HEADER */ 

	array( "type" => "start",
	       "val" => "Header",
	       "name" => __( "Header","wip")),

	array( "name" => __( "Custom Logo","wip"),
	       "desc" => __( "Insert the url of your custom logo","wip"),
           "id" => $shortname."_custom_logo",     
           "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Custom Favicon","wip"),
	       "desc" => __( "Insert the url of your custom favicon","wip"),
           "id" => $shortname."_custom_favicon",     
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
		   
	array( "name" => __( "Skype Url","wip"),
	       "desc" => __( "Insert Skype ID (empty if you want to hide the button), you can add <strong>'skype:'</strong>, after your ID (for example skype:alexvtn)","wip"),
	       "id" => $shortname."_footer_skype_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Instagram  Url","wip"),
	       "desc" => __( "Insert Instagram Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_instagram_button",
	       "type" => "text",
	       "std" => ""),

		   
	array( "name" => __( "Github  Url","wip"),
	       "desc" => __( "Insert Github Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_github_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Email Address","wip"),
	       "desc" => __( "Insert Email Address (empty if you want to hide the button), you can add <strong>'mailto:</strong>', after your email (for example mailto:info@wpinprogress.com)","wip"),
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

/* START MENU FONT */ 

	array( "type" => "form",
	       "name" => "Fonts"),

	array( "type" => "start",
	       "val" => "Menu font",
	       "name" => __( "Menu font","wip")),

	array( "name" => __( "Menu size","wip"),
	       "desc" => __( "Select a size for menu","wip"),
	       "id" => $shortname."_menu_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "14px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Menu font"),

	array( "type" => "end"),

/* END MENU FONT */ 

/* START CONTENT FONT */ 

	array( "type" => "start",
	       "val" => "Content font",
	       "name" => __( "Content font","wip")),

	array( "name" => __( "Content size","wip"),
	       "desc" => __( "Select a size for the content","wip"),
	       "id" => $shortname."_content_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "14px"),
		   
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
	       "std" => "28px"),

	array( "name" => __( "H2 headline","wip"),
	       "desc" => __( "Select a size for H2 elements","wip"),
	       "id" => $shortname."_h2_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "26px"),

	array( "name" => __( "H3 headline","wip"),
	       "desc" => __( "Select a size for H3 elements","wip"),
	       "id" => $shortname."_h3_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "24px"),
		   
	array( "name" => __( "H4 headline","wip"),
	       "desc" => __( "Select a size for H4 elements","wip"),
	       "id" => $shortname."_h4_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "21px"),
		   
	array( "name" => __( "H5 headline","wip"),
	       "desc" => __( "Select a size for H5 elements","wip"),
	       "id" => $shortname."_h5_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "18px"),
		   
	array( "name" => __( "H6 headline","wip"),
	       "desc" => __( "Select a size for H6 elements","wip"),
	       "id" => $shortname."_h6_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "16px"),
		   
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

	array( "name" => __( "Link color","wip"),
	       "desc" => __( "Select a color for link","wip"),
	       "id" => $shortname."_link_color",
	       "type" => "text",
	       "std" => "#48c9b0"),

	array( "name" => __( "Link color hover","wip"),
	       "desc" => __( "Select a color for link hover","wip"),
	       "id" => $shortname."_link_color_hover",
	       "type" => "text",
	       "std" => "#1abc9c"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General colors"),

	array( "type" => "end"),

/* END TEXT COLOR */ 

/* START HEADER,SIDEBAR AND FOOTER COLOR */ 

	array( "type" => "form",
	       "name" => "Colors"),

	array( "type" => "start",
	       "val" => "Header, Sidebar and Footer",
	       "name" => __( "Header, Sidebar and Footer","wip")),

	array( "name" => __( "Background color","wip"),
	       "desc" => __( "Select a color for the background","wip"),
	       "id" => $shortname."_bars_background_color",
	       "type" => "text",
	       "std" => "#2D3032"),

	array( "name" => __( "Text color","wip"),
	       "desc" => __( "Select a color for the text","wip"),
	       "id" => $shortname."_bars_text_color",
	       "type" => "text",
	       "std" => "#ffffff"),

	array( "name" => __( "Borders color","wip"),
	       "desc" => __( "Select a color for the borders","wip"),
	       "id" => $shortname."_bars_borders_color",
	       "type" => "text",
	       "std" => "#444649"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General colors"),

	array( "type" => "end"),

/* END TEXT COLOR */ 

),

array( "type" => "endtab"),
	   
/* =================== END COLORS OPTION TAB =================== */

/* =================== BEGIN BACKGROUNDS TAB =================== */

array( "type" => "begintab",
	   "tab" => "Backgrounds",
	   "element" =>
	   
/* START BACKGROUNDS */ 

	array( "type" => "form",
	       "name" => "Backgrounds"),
	   
	array( "type" => "start",
	       "val" => "Body Background",
	       "name" => __( "Body Background","wip")),

	array( "name" => __( "Default pattern background","wip"),
	       "desc" => __( "Select a pattern for body background.","wip"),
	       "id" => $shortname."_body_background",
	       "type" => "background",
	       "options" => $bodybackgrounds,
	       "std" => "/images/background/patterns/pattern10.jpg"),

	array( "type" => "save-button",
	       "class" => "Body Background",
	       "value" => "Save"),

	array( "type" => "end"),

/* END BACKGROUNDS */ 

),

array( "type" => "endtab"),
	   
/* =================== END BACKGROUNDS TAB =================== */

array( "type" => "endpanel"),  

);

require_once dirname(__FILE__) . '/../panel.php'; 

lookilite_mainpanel( $panel ); 

?>