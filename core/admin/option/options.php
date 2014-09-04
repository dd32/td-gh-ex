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

require_once dirname(__FILE__) . '/default.php';

$panel = array (

/* =================== NAV =================== */

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "General" => __( "General","diarjolite") , "Fonts" => __( "Fonts","diarjolite") , "Colors" => __( "Colors","diarjolite")),   
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
	       "name" => __( "Load system","diarjolite")),

	array( "name" => __( "Load system","diarjolite"),
	       "desc" => __( "Select a load system, if you've some problems with the theme (for example a blank page).","diarjolite"),
	       "id" => $shortname."_loadsystem",
	       "type" => "select",
	       "options" => array(
			   "mode_a" => __( "Mode a","diarjolite"),
			   "mode_b" => __( "Mode b","diarjolite"),
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
	       "name" => __( "Skins","diarjolite")),

	array( "name" => __( "Theme skin","diarjolite"),
	       "desc" => __( "Select a skin, the options will be charged in accordance with the chosen style.","diarjolite"),
	       "id" => $shortname."_skins",
	       "type" => "select",
	       "options" => array(
	   	   "turquoise" => __( "Turquoise","diarjolite"),
	   	   "orange" => __( "Orange","diarjolite"),
	   	   "blue" => __( "Blue","diarjolite"),
	   	   "red" => __( "Red","diarjolite"),
	   	   "purple" => __( "Purple","diarjolite"),
	   	   "yellow" => __( "Yellow","diarjolite"),
	   	   "green" => __( "Green","diarjolite"),
	   	   "light_turquoise" => __( "Light & Turquoise","diarjolite"),
	   	   "light_orange" => __( "Light & Orange","diarjolite"),
	   	   "light_blue" => __( "Light & Blue","diarjolite"),
	   	   "light_red" => __( "Light & Red","diarjolite"),
	   	   "light_purple" => __( "Light & Purple","diarjolite"),
	   	   "light_yellow" => __( "Light & Yellow","diarjolite"),
	   	   "light_green" => __( "Light & Green","diarjolite"),
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
	       "name" => __( "General","diarjolite")),

	array( "name" => __( "Home Blog Layout","diarjolite"),
	       "desc" => __( "If you don't select a single page, select a layout for homepage","diarjolite"),
	       "id" => $shortname."_home",
	       "type" => "select",
	       "options" => array(
		   "full" => __( "Full Width","diarjolite"),
	   	   "left-sidebar" => __( "Left Sidebar","diarjolite"),
	   	   "right-sidebar" => __( "Right Sidebar","diarjolite"),
		   ),
	       "std" => "right-sidebar"),
	
	array( "name" => __( "Category Layout","diarjolite"),
	       "desc" => __( "Select a layout for category pages","diarjolite"),
	       "id" => $shortname."_category_layout",
	       "type" => "select",
	       "options" => array(
		   "full" => __( "Full Width","diarjolite"),
	   	   "left-sidebar" => __( "Left Sidebar","diarjolite"),
	   	   "right-sidebar" => __( "Right Sidebar","diarjolite"),
		   ),
	       "std" => "right-sidebar"),

	array( "name" => __( "Search Layout","diarjolite"),
	       "desc" => __( "Select a layout for search pages","diarjolite"),
	       "id" => $shortname."_search_layout",
	       "type" => "select",
	       "options" => array(
		   "full" => __( "Full Width","diarjolite"),
	   	   "left-sidebar" => __( "Left Sidebar","diarjolite"),
	   	   "right-sidebar" => __( "Right Sidebar","diarjolite"),
		   ),
	       "std" => "right-sidebar"),

	array( "name" => __( "Custom css","diarjolite"),
	       "desc" => __( "Insert your custom css code","diarjolite"),
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
	       "name" => __( "Header","diarjolite")),

	array( "name" => __( "Custom Logo","diarjolite"),
	       "desc" => __( "Insert the url of custom logo","diarjolite"),
           "id" => $shortname."_custom_logo",     
           "data" => "array",
           "type" => "url",
	       "std" => ""),
		   
	array( "name" => __( "Custom Favicon","diarjolite"),
	       "desc" => __( "Insert the url of custom favicon","diarjolite"),
           "id" => $shortname."_custom_favicon",     
           "data" => "array",
           "type" => "url",
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
	       "name" => __( "Footer","diarjolite")),

	array( "name" => __( "Sidebar layout","diarjolite"),
	       "desc" => __( "Select a layout for the bottom sidebar area","diarjolite"),
	       "id" => $shortname."_bottom_layout",
	       "type" => "select",
	       "options" => array(
	   	   "col-md-6"  => __( "Two Columns","diarjolite"),
	   	   "col-md-4"  => __( "Three Columns","diarjolite"),
	   	   "col-md-3"  => __( "Four Columns","diarjolite"),
		   ),
	       "std" => "col-md-3"),

	array( "name" => __( "Copyright Text","diarjolite"),
	       "desc" => __( "Insert copyright text","diarjolite"),
	       "id" => $shortname."_copyright_text",
	       "type" => "textarea",
	       "std" => ""),
		   
	array( "name" => __( "Facebook Url","diarjolite"),
	       "desc" => __( "Insert Facebook Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_facebook_button",
	       "type" => "url",
	       "std" => ""),
		   
	array( "name" => __( "Twitter Url","diarjolite"),
	       "desc" => __( "Insert Twitter Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_twitter_button",
	       "type" => "url",
	       "std" => ""),

	array( "name" => __( "Flickr Url","diarjolite"),
	       "desc" => __( "Insert Flickr Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_flickr_button",
	       "type" => "url",
	       "std" => ""),
	
	array( "name" => __( "Google Url","diarjolite"),
	       "desc" => __( "Insert Google Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_google_button",
	       "type" => "url",
	       "std" => ""),

	array( "name" => __( "Linkedin Url","diarjolite"),
	       "desc" => __( "Insert Linkedin Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_linkedin_button",
	       "type" => "url",
	       "std" => ""),

	array( "name" => __( "Pinterest Url","diarjolite"),
	       "desc" => __( "Insert Pinterest Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_pinterest_button",
	       "type" => "url",
	       "std" => ""),
		   
	array( "name" => __( "Tumblr Url","diarjolite"),
	       "desc" => __( "Insert Tumblr Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_tumblr_button",
	       "type" => "url",
	       "std" => ""),

	array( "name" => __( "Youtube Url","diarjolite"),
	       "desc" => __( "Insert Youtube Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_youtube_button",
	       "type" => "url",
	       "std" => ""),
		   
	array( "name" => __( "Skype Url","diarjolite"),
	       "desc" => __( "Insert Skype ID (empty if you want to hide the button), you can add <strong>'skype:'</strong>, after your ID (for example skype:alexvtn)","diarjolite"),
	       "id" => $shortname."_footer_skype_button",
	       "type" => "url",
	       "std" => ""),
		   
	array( "name" => __( "Instagram  Url","diarjolite"),
	       "desc" => __( "Insert Instagram Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_instagram_button",
	       "type" => "url",
	       "std" => ""),

		   
	array( "name" => __( "Github  Url","diarjolite"),
	       "desc" => __( "Insert Github Url (empty if you want to hide the button)","diarjolite"),
	       "id" => $shortname."_footer_github_button",
	       "type" => "url",
	       "std" => ""),

	array( "name" => __( "Email Address","diarjolite"),
	       "desc" => __( "Insert Email Address (empty if you want to hide the button), you can add <strong>'mailto:</strong>', after your email (for example mailto:info@wpinprogress.com)","diarjolite"),
	       "id" => $shortname."_footer_email_button",
	       "type" => "url",
	       "std" => ""),
		   
	array( "name" => __( "Feed Rss Button","diarjolite"),
	       "desc" => __( "You want display the Feed Rss button?","diarjolite"),
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
	       "name" => __( "Fonts","diarjolite")),

	array( "name" => __( "Font size","diarjolite"),
	       "desc" => __( "Select a size for logo","diarjolite"),
	       "id" => $shortname."_logo_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "50px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Fonts"),

	array( "type" => "end"),

/* END LOGO FONT */ 

/* START MENU FONT */ 

	array( "type" => "form",
	       "name" => "Fonts"),

	array( "type" => "start",
	       "val" => "Menu font",
	       "name" => __( "Menu font","diarjolite")),

	array( "name" => __( "Menu size","diarjolite"),
	       "desc" => __( "Select a size for menu","diarjolite"),
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
	       "name" => __( "Content font","diarjolite")),

	array( "name" => __( "Content size","diarjolite"),
	       "desc" => __( "Select a size for the content","diarjolite"),
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
	       "name" => __( "Headline font sizes","diarjolite")),

	array( "name" => __( "H1 headline","diarjolite"),
	       "desc" => __( "Select a size for H1 elements","diarjolite"),
	       "id" => $shortname."_h1_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "24px"),

	array( "name" => __( "H2 headline","diarjolite"),
	       "desc" => __( "Select a size for H2 elements","diarjolite"),
	       "id" => $shortname."_h2_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "22px"),

	array( "name" => __( "H3 headline","diarjolite"),
	       "desc" => __( "Select a size for H3 elements","diarjolite"),
	       "id" => $shortname."_h3_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "20px"),
		   
	array( "name" => __( "H4 headline","diarjolite"),
	       "desc" => __( "Select a size for H4 elements","diarjolite"),
	       "id" => $shortname."_h4_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "18px"),
		   
	array( "name" => __( "H5 headline","diarjolite"),
	       "desc" => __( "Select a size for H5 elements","diarjolite"),
	       "id" => $shortname."_h5_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "16px"),
		   
	array( "name" => __( "H6 headline","diarjolite"),
	       "desc" => __( "Select a size for H6 elements","diarjolite"),
	       "id" => $shortname."_h6_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "14px"),
		   
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
	       "name" => __( "General colors","diarjolite")),

	array( "name" => __( "Text color","diarjolite"),
	       "desc" => __( "Select a color for general text","diarjolite"),
	       "id" => $shortname."_text_font_color",
	       "type" => "text",
	       "std" => "#616161"),

	array( "name" => __( "Link color","diarjolite"),
	       "desc" => __( "Select a color for link","diarjolite"),
	       "id" => $shortname."_link_color",
	       "type" => "text",
	       "std" => "#48c9b0"),

	array( "name" => __( "Link color hover","diarjolite"),
	       "desc" => __( "Select a color for link hover","diarjolite"),
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
	       "name" => __( "Header, Sidebar and Footer","diarjolite")),

	array( "name" => __( "Background color","diarjolite"),
	       "desc" => __( "Select a color for the background","diarjolite"),
	       "id" => $shortname."_bars_background_color",
	       "type" => "text",
	       "std" => "#2D3032"),

	array( "name" => __( "Text color","diarjolite"),
	       "desc" => __( "Select a color for the text","diarjolite"),
	       "id" => $shortname."_bars_text_color",
	       "type" => "text",
	       "std" => "#ffffff"),

	array( "name" => __( "Borders color","diarjolite"),
	       "desc" => __( "Select a color for the borders","diarjolite"),
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

array( "type" => "endtab"),

array( "type" => "endpanel"),  

);

require_once dirname(__FILE__) . '/../panel.php'; 

diarjolite_panel( $panel ); 

?>