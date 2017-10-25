<?php

if (!function_exists('alhenalite_customize_panel_function')) {

	function alhenalite_customize_panel_function() {
		
		$theme_panel = array ( 

			/* START SUPPORT SECTION */ 

			array(
			
				"title" => esc_html__( "Get support","alhena-lite"),
				"id" => "alhenalite-customize-info",
				"type" => "alhenalite-customize-info",
				"section" => "alhenalite-customize-info",
				"priority" => "09",

			),

			/* START BACKGROUND SECTION */ 

			array(
				
				"label" => esc_html__( "Full Image Background","alhena-lite"),
				"description" => esc_html__( "Do you want to set a full background image? (After the upload, check 'Fixed', from the Background Attachment section)","alhena-lite"),
				"id" => "wip_full_image_background",
				"type" => "select",
				"section" => "background_image",
				"options" => array (
				   "off" => esc_html__( "No","alhena-lite"),
				   "on" => esc_html__( "Yes","alhena-lite"),
				),
				
				"std" => "off",
			
			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => esc_html__( "General","alhena-lite"),
				"description" => esc_html__( "General","alhena-lite"),
				"type" => "panel",
				"id" => "general_panel",
				"priority" => "10",
				
			),

			/* SKINS */ 

			array( 

				"title" => esc_html__( "Color Scheme","alhena-lite"),
				"type" => "section",
				"panel" => "general_panel",
				"priority" => "11",
				"id" => "colorscheme_section",

			),

			array(
				
				"label" => esc_html__( "Predefined Color Schemes","alhena-lite"),
				"description" => esc_html__( "Choose your Color Scheme","alhena-lite"),
				"id" => "wip_skin",
				"type" => "select",
				"section" => "colorscheme_section",
				"options" => array (

				   "light_orange" => esc_html__( "Light&Orange","alhena-lite"),
				   "light_turquoise" => esc_html__( "Light&Turquoise","alhena-lite"),
				   "light_blue" => esc_html__( "Light&Blue","alhena-lite"),
				   "light_red" => esc_html__( "Light&Red","alhena-lite"),
				   "light_pink" => esc_html__( "Light&Pink","alhena-lite"),
				   "light_purple" => esc_html__( "Light&Purple","alhena-lite"),
				   "light_yellow" => esc_html__( "Light&Yellow","alhena-lite"),
				   "light_green" => esc_html__( "Light&Green","alhena-lite"),
				   "orange" => esc_html__( "Orange","alhena-lite"),
				   "turquoise" => esc_html__( "Turquoise","alhena-lite"),
				   "blue" => esc_html__( "Blue","alhena-lite"),
				   "red" => esc_html__( "Red","alhena-lite"),
				   "pink" => esc_html__( "Pink","alhena-lite"),
				   "purple" => esc_html__( "Purple","alhena-lite"),
				   "yellow" => esc_html__( "Yellow","alhena-lite"),
				   "green" => esc_html__( "Green","alhena-lite"),
				   "dark_orange" => esc_html__( "Dark&Orange","alhena-lite"),
				   "dark_turquoise" => esc_html__( "Dark&Turquoise","alhena-lite"),
				   "dark_blue" => esc_html__( "Dark&Blue","alhena-lite"),
				   "dark_red" => esc_html__( "Dark&Red","alhena-lite"),
				   "dark_pink" => esc_html__( "Dark&Pink","alhena-lite"),
				   "dark_purple" => esc_html__( "Dark&Purple","alhena-lite"),
				   "dark_yellow" => esc_html__( "Dark&Yellow","alhena-lite"),
				   "dark_green" => esc_html__( "Dark&Green","alhena-lite"),
				
				),
				
				"std" => "light_blue",
			
			),

			/* PAGE WIDTH */ 

			array( 

				"title" => esc_html__( "Page width",'alhena-lite'),
				"type" => "section",
				"id" => "pagewidth_section",
				"panel" => "general_panel",
				"priority" => "12",

			),

			array( 

				"label" => esc_html__( "Screen greater than 768px",'alhena-lite'),
				"description" => esc_html__( "Set a width, for a screen greater than 768 pixel (for example 750 and not 750px ) ",'alhena-lite'),
				"id" => "wip_screen1",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "750",

			),

			array( 

				"label" => esc_html__( "Screen greater than 992px",'alhena-lite'),
				"description" => esc_html__( "Set a width, for a screen greater than 992 pixel (for example 940 and not 940px ) ",'alhena-lite'),
				"id" => "wip_screen2",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "940",

			),

			array( 

				"label" => esc_html__( "Screen greater than 1200px",'alhena-lite'),
				"description" => esc_html__( "Set a width, in px, for a screen greater than 1200 pixel (for example 1170 and not 1170px ) ",'alhena-lite'),
				"id" => "wip_screen3",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "1170",

			),

			/* SETTINGS SECTION */ 

			array( 

				"title" => esc_html__( "Settings","alhena-lite"),
				"type" => "section",
				"id" => "settings_section",
				"panel" => "general_panel",
				"priority" => "13",

			),

			array(
				
				"label" => esc_html__( "Comments","alhena-lite"),
				"description" => esc_html__( "Do you want to view the comments after articles?","alhena-lite"),
				"id" => "wip_view_comments",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => esc_html__( "No","alhena-lite"),
				   "on" => esc_html__( "Yes","alhena-lite"),
				),
				
				"std" => "off",
			
			),

			/* LAYOUTS SECTION */ 

			array( 

				"title" => esc_html__( "Layouts","alhena-lite"),
				"type" => "section",
				"id" => "layouts_section",
				"panel" => "general_panel",
				"priority" => "16",

			),

			array(
				
				"label" => esc_html__("Home Blog Layout","alhena-lite"),
				"description" => esc_html__("If you've set the latest articles, for the homepage, choose a layout.","alhena-lite"),
				"id" => "wip_home",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","alhena-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","alhena-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","alhena-lite"),
				   "masonry" => esc_html__( "Masonry","alhena-lite"),
				),
				
				"std" => "right-sidebar",
			
			),
	
			array(
				
				"label" => esc_html__("Category Layout","alhena-lite"),
				"description" => esc_html__("Select a layout for category pages.","alhena-lite"),
				"id" => "wip_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","alhena-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","alhena-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","alhena-lite"),
				   "masonry" => esc_html__( "Masonry","alhena-lite"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => esc_html__("WooCommerce Category Layout","alhena-lite"),
				"description" => esc_html__("Select a layout for the woocommerce categories.","alhena-lite"),
				"id" => "wip_woocommerce_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","alhena-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","alhena-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","alhena-lite"),
				),
				
				"std" => "right-sidebar",
			
			),
			
			/* HEADER AREA SECTION */ 

			array( 

				"title" => esc_html__( "Header","alhena-lite"),
				"type" => "section",
				"id" => "header_section",
				"panel" => "general_panel",
				"priority" => "19",

			),

			array( 

				"label" => esc_html__( "Custom Logo","alhena-lite"),
				"description" => esc_html__( "Upload an image as logo","alhena-lite"),
				"id" => "wip_custom_logo",
				"type" => "upload",
				"section" => "header_section",
				"std" => "",

			),

			/* FOOTER AREA SECTION */ 

			array( 

				"title" => esc_html__( "Footer","alhena-lite"),
				"type" => "section",
				"id" => "footer_section",
				"panel" => "general_panel",
				"priority" => "20",

			),

			array( 

				"label" => esc_html__( "Copyright Text","alhena-lite"),
				"description" => esc_html__( "Insert your copyright text.","alhena-lite"),
				"id" => "wip_copyright_text",
				"type" => "textarea",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Facebook Url","alhena-lite"),
				"description" => esc_html__( "Insert Facebook Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_facebook_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Twitter Url","alhena-lite"),
				"description" => esc_html__( "Insert Twitter Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_twitter_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Flickr Url","alhena-lite"),
				"description" => esc_html__( "Insert Flickr Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_flickr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Google Url","alhena-lite"),
				"description" => esc_html__( "Insert Google Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_google_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Linkedin Url","alhena-lite"),
				"description" => esc_html__( "Insert Linkedin Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_linkedin_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Pinterest Url","alhena-lite"),
				"description" => esc_html__( "Insert Pinterest Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_pinterest_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Tumblr Url","alhena-lite"),
				"description" => esc_html__( "Insert Tumblr Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_tumblr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Youtube Url","alhena-lite"),
				"description" => esc_html__( "Insert Youtube Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_youtube_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Vimeo Url","alhena-lite"),
				"description" => esc_html__( "Insert Vimeo Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_vimeo_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Skype Url","alhena-lite"),
				"description" => esc_html__( "Insert Skype ID (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_skype_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Instagram Url","alhena-lite"),
				"description" => esc_html__( "Insert Instagram Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_instagram_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Deviantart Url","alhena-lite"),
				"description" => esc_html__( "Insert Deviantart Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_deviantart_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Github Url","alhena-lite"),
				"description" => esc_html__( "Insert Github Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_github_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Xing Url","alhena-lite"),
				"description" => esc_html__( "Insert Xing Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_xing_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),


			array( 

				"label" => esc_html__( "Whatsapp Number","alhena-lite"),
				"description" => esc_html__( "Insert Whatsapp Number (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_whatsapp_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Telegram account","alhena-lite"),
				"description" => esc_html__( "Insert Telegram account (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_telegram_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Email Address","alhena-lite"),
				"description" => esc_html__( "Insert Email Address (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_email_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array(
				
				"label" => esc_html__( "Feed Rss Button","alhena-lite"),
				"description" => esc_html__( "Do you want to display the Feed Rss button?","alhena-lite"),
				"id" => "wip_footer_rss_button",
				"type" => "select",
				"section" => "footer_section",
				"options" => array (
				   "off" => esc_html__( "No","alhena-lite"),
				   "on" => esc_html__( "Yes","alhena-lite"),
				),
				
				"std" => "off",
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				"title" => esc_html__( "Typography","alhena-lite"),
				"description" => esc_html__( "Typography","alhena-lite"),
				"type" => "panel",
				"id" => "typography_panel",
				"priority" => "11",
				
			),

			/* LOGO */ 

			array( 

				"title" => esc_html__( "Logo","alhena-lite"),
				"type" => "section",
				"id" => "logo_section",
				"panel" => "typography_panel",
				"priority" => "10",

			),

			array( 

				"label" => esc_html__( "Font size","alhena-lite"),
				"description" => esc_html__( "Insert a size, for logo font (For example, 60px) ","alhena-lite"),
				"id" => "wip_logo_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "45px",

			),
			
			/* MENU */ 

			array( 

				"title" => esc_html__( "Menu","alhena-lite"),
				"type" => "section",
				"id" => "menu_section",
				"panel" => "typography_panel",
				"priority" => "12",

			),

			array( 

				"label" => esc_html__( "Font size","alhena-lite"),
				"description" => esc_html__( "Insert a size, for menu font (For example, 14px) ","alhena-lite"),
				"id" => "wip_menu_font_size",
				"type" => "text",
				"section" => "menu_section",
				"std" => "14px",

			),

			array(
				
				"label" => esc_html__("Menu weight","alhena-lite"),
				"description" => esc_html__("Choose a font weight for the menu.","alhena-lite"),
				"id" => "wip_menu_font_weight",
				"type" => "select",
				"section" => "menu_section",
				"options" => array(
					"400" => esc_html__( "400","alhena-lite"),
					"500" => esc_html__( "500","alhena-lite"),
					"600" => esc_html__( "600","alhena-lite"),
					"700" => esc_html__( "700","alhena-lite"),
					"800" => esc_html__( "800","alhena-lite"),
				),

				"std" => "500",
			
			),
			
			array(
				
				"label" => esc_html__("Text transform","alhena-lite"),
				"description" => esc_html__("Do you want to display an uppercase menu?.","alhena-lite"),
				"id" => "wip_menu_text_transform",
				"type" => "select",
				"section" => "menu_section",
				"options" => array(
					"none" => esc_html__( "None","alhena-lite"),
					"uppercase" => esc_html__( "Uppercase","alhena-lite"),
				),

				"std" => "uppercase",
			
			),

			/* CONTENT */ 

			array( 

				"title" => esc_html__( "Content","alhena-lite"),
				"type" => "section",
				"id" => "content_section",
				"panel" => "typography_panel",
				"priority" => "13",

			),

			array( 

				"label" => esc_html__( "Font size","alhena-lite"),
				"description" => esc_html__( "Insert a size, for content font (For example, 14px) ","alhena-lite"),
				"id" => "wip_content_font_size",
				"type" => "text",
				"section" => "content_section",
				"std" => "14px",

			),


			/* HEADLINES */ 

			array( 

				"title" => esc_html__( "Headlines","alhena-lite"),
				"type" => "section",
				"id" => "headlines_section",
				"panel" => "typography_panel",
				"priority" => "14",

			),

			array( 

				"label" => esc_html__( "H1 headline","alhena-lite"),
				"description" => esc_html__( "Insert a size, for for H1 elements (For example, 24px) ","alhena-lite"),
				"id" => "wip_h1_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "24px",

			),

			array( 

				"label" => esc_html__( "H2 headline","alhena-lite"),
				"description" => esc_html__( "Insert a size, for for H2 elements (For example, 22px) ","alhena-lite"),
				"id" => "wip_h2_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "22px",

			),

			array( 

				"label" => esc_html__( "H3 headline","alhena-lite"),
				"description" => esc_html__( "Insert a size, for for H3 elements (For example, 20px) ","alhena-lite"),
				"id" => "wip_h3_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "20px",

			),

			array( 

				"label" => esc_html__( "H4 headline","alhena-lite"),
				"description" => esc_html__( "Insert a size, for for H4 elements (For example, 18px) ","alhena-lite"),
				"id" => "wip_h4_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "18px",

			),

			array( 

				"label" => esc_html__( "H5 headline","alhena-lite"),
				"description" => esc_html__( "Insert a size, for for H5 elements (For example, 16px) ","alhena-lite"),
				"id" => "wip_h5_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "16px",

			),

			array( 

				"label" => esc_html__( "H6 headline","alhena-lite"),
				"description" => esc_html__( "Insert a size, for for H6 elements (For example, 14px) ","alhena-lite"),
				"id" => "wip_h6_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "14px",

			),

			array(
				
				"label" => esc_html__("Titles weight","alhena-lite"),
				"description" => esc_html__("Choose a font weight for the titles.","alhena-lite"),
				"id" => "wip_titles_font_weight",
				"type" => "select",
				"section" => "headlines_section",
				"options" => array(
					"400" => esc_html__( "400","alhena-lite"),
					"500" => esc_html__( "500","alhena-lite"),
					"600" => esc_html__( "600","alhena-lite"),
					"700" => esc_html__( "700","alhena-lite"),
					"800" => esc_html__( "800","alhena-lite"),
				),

				"std" => "400",
			
			),
			
			array(
				
				"label" => esc_html__("Text transform","alhena-lite"),
				"description" => esc_html__("Do you want to display an uppercase title?.","alhena-lite"),
				"id" => "wip_titles_text_transform",
				"type" => "select",
				"section" => "headlines_section",
				"options" => array(
					"none" => esc_html__( "None","alhena-lite"),
					"uppercase" => esc_html__( "Uppercase","alhena-lite"),
				),

				"std" => "none",
			
			),
			
		);
		
		new alhenalite_customize($theme_panel);
		
	} 
	
	add_action( 'alhenalite_customize_panel', 'alhenalite_customize_panel_function', 10, 2 );

}

do_action('alhenalite_customize_panel');

?>