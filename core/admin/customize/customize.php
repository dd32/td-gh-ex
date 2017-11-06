<?php

if (!function_exists('novalite_customize_panel_function')) {

	function novalite_customize_panel_function() {
		
		$theme_panel = array ( 

			array(
				
				"label" => esc_html__( "Full Image Background","novalite"),
				"description" => esc_html__( "Do you want to set a full background image? (After the upload, check 'Fixed', from the Background Attachment section)","novalite"),
				"id" => "novalite_full_image_background",
				"type" => "select",
				"section" => "background_image",
				"options" => array (
				   "off" => esc_html__( "No","novalite"),
				   "on" => esc_html__( "Yes","novalite"),
				),
				
				"std" => "off",
			
			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => esc_html__( "General","novalite"),
				"description" => esc_html__( "General","novalite"),
				"type" => "panel",
				"id" => "general_panel",
				"priority" => "10",
				
			),

			/* SKINS */ 

			array( 

				"title" => esc_html__( "Color Scheme","novalite"),
				"type" => "section",
				"panel" => "general_panel",
				"priority" => "11",
				"id" => "colorscheme_section",

			),

			array(
				
				"label" => esc_html__( "Predefined Color Schemes","novalite"),
				"description" => esc_html__( "Choose your Color Scheme","novalite"),
				"id" => "novalite_skin",
				"type" => "select",
				"section" => "colorscheme_section",
				"options" => array (

				   "turquoise" => esc_html__( "Turquoise","novalite"),
				   "orange" => esc_html__( "Orange","novalite"),
				   "blue" => esc_html__( "Blue","novalite"),
				   "red" => esc_html__( "Red","novalite"),
				   "purple" => esc_html__( "Purple","novalite"),
				   "yellow" => esc_html__( "Yellow","novalite"),
				   "green" => esc_html__( "Green","novalite"),
				   "light_turquoise" => esc_html__( "Light & Turquoise","novalite"),
				   "light_orange" => esc_html__( "Light & Orange","novalite"),
				   "light_blue" => esc_html__( "Light & Blue","novalite"),
				   "light_red" => esc_html__( "Light & Red","novalite"),
				   "light_purple" => esc_html__( "Light & Purple","novalite"),
				   "light_yellow" => esc_html__( "Light & Yellow","novalite"),
				   "light_green" => esc_html__( "Light & Green","novalite"),

				),
				
				"std" => "orange",
			
			),

			/* SETTINGS SECTION */ 

			array( 

				"title" => esc_html__( "Styles","novalite"),
				"type" => "section",
				"id" => "styles_section",
				"panel" => "general_panel",
				"priority" => "12",

			),

			array( 

				"label" => esc_html__( "Custom css","novalite"),
				"description" => esc_html__( "Insert your custom css code.","novalite"),
				"id" => "novalite_custom_css_code",
				"type" => "custom_css",
				"section" => "styles_section",
				"std" => "",

			),

			/* LAYOUTS SECTION */ 

			array( 

				"title" => esc_html__( "Layouts","novalite"),
				"type" => "section",
				"id" => "layouts_section",
				"panel" => "general_panel",
				"priority" => "13",

			),

			array(
				
				"label" => esc_html__("Home Blog Layout","novalite"),
				"description" => esc_html__("If you've set the latest articles, for the homepage, choose a layout.","novalite"),
				"id" => "novalite_home",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","novalite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","novalite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","novalite"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => esc_html__("Category Layout","novalite"),
				"description" => esc_html__("Select a layout for category pages.","novalite"),
				"id" => "novalite_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","novalite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","novalite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","novalite"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => esc_html__("Search Layout","novalite"),
				"description" => esc_html__("Select a layout for search page.","novalite"),
				"id" => "novalite_search_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","novalite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","novalite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","novalite"),
				),
				
				"std" => "right-sidebar",
			
			),

			/* HEADER AREA SECTION */ 

			array( 

				"title" => esc_html__( "Header","novalite"),
				"type" => "section",
				"id" => "header_section",
				"panel" => "general_panel",
				"priority" => "14",

			),

			array( 

				"label" => esc_html__( "Custom Logo","novalite"),
				"description" => esc_html__( "Insert the url of your custom logo","novalite"),
				"id" => "novalite_custom_logo",
				"type" => "upload",
				"section" => "header_section",
				"std" => "",

			),

			/* FOOTER AREA SECTION */ 

			array( 

				"title" => esc_html__( "Footer","novalite"),
				"type" => "section",
				"id" => "footer_section",
				"panel" => "general_panel",
				"priority" => "15",

			),

			array( 

				"label" => esc_html__( "Copyright Text","novalite"),
				"description" => esc_html__( "Insert your copyright text.","novalite"),
				"id" => "novalite_copyright_text",
				"type" => "textarea",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Facebook Url","novalite"),
				"description" => esc_html__( "Insert Facebook Url (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_facebook_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Twitter Url","novalite"),
				"description" => esc_html__( "Insert Twitter Url (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_twitter_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Flickr Url","novalite"),
				"description" => esc_html__( "Insert Flickr Url (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_flickr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Google Url","novalite"),
				"description" => esc_html__( "Insert Google Url (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_google_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Linkedin Url","novalite"),
				"description" => esc_html__( "Insert Linkedin Url (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_linkedin_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Pinterest Url","novalite"),
				"description" => esc_html__( "Insert Pinterest Url (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_pinterest_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Tumblr Url","novalite"),
				"description" => esc_html__( "Insert Tumblr Url (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_tumblr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Youtube Url","novalite"),
				"description" => esc_html__( "Insert Youtube Url (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_youtube_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Skype Url","novalite"),
				"description" => esc_html__( "Insert Skype ID (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_skype_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Instagram Url","novalite"),
				"description" => esc_html__( "Insert Instagram ID (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_instagram_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Github Url","novalite"),
				"description" => esc_html__( "Insert Github ID (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_github_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Email Address","novalite"),
				"description" => esc_html__( "Insert Email Address (empty if you want to hide the button)","novalite"),
				"id" => "novalite_footer_email_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array(
				
				"label" => esc_html__( "Feed Rss Button","novalite"),
				"description" => esc_html__( "Do you want to display the Feed Rss button?","novalite"),
				"id" => "novalite_footer_rss_button",
				"type" => "select",
				"section" => "footer_section",
				"options" => array (
				   "off" => esc_html__( "No","novalite"),
				   "on" => esc_html__( "Yes","novalite"),
				),
				
				"std" => "off",
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				"title" => esc_html__( "Typography","novalite"),
				"description" => esc_html__( "Typography","novalite"),
				"type" => "panel",
				"id" => "typography_panel",
				"priority" => "11",
				
			),

			/* LOGO */ 

			array( 

				"title" => esc_html__( "Logo","novalite"),
				"type" => "section",
				"id" => "logo_section",
				"panel" => "typography_panel",
				"priority" => "10",

			),

			array( 

				"label" => esc_html__( "Font size","novalite"),
				"description" => esc_html__( "Insert a size, for logo font (For example, 70px) ","novalite"),
				"id" => "novalite_logo_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "70px",

			),
			
			/* MENU */ 

			array( 

				"title" => esc_html__( "Menu","novalite"),
				"type" => "section",
				"id" => "menu_section",
				"panel" => "typography_panel",
				"priority" => "12",

			),

			array( 

				"label" => esc_html__( "Font size","novalite"),
				"description" => esc_html__( "Insert a size, for menu font (For example, 14px) ","novalite"),
				"id" => "novalite_menu_font_size",
				"type" => "text",
				"section" => "menu_section",
				"std" => "14px",

			),

			/* CONTENT */ 

			array( 

				"title" => esc_html__( "Content","novalite"),
				"type" => "section",
				"id" => "content_section",
				"panel" => "typography_panel",
				"priority" => "13",

			),

			array( 

				"label" => esc_html__( "Font size","novalite"),
				"description" => esc_html__( "Insert a size, for content font (For example, 14px) ","novalite"),
				"id" => "novalite_content_font_size",
				"type" => "text",
				"section" => "content_section",
				"std" => "14px",

			),


			/* HEADLINES */ 

			array( 

				"title" => esc_html__( "Headlines","novalite"),
				"type" => "section",
				"id" => "headlines_section",
				"panel" => "typography_panel",
				"priority" => "14",

			),

			array( 

				"label" => esc_html__( "H1 headline","novalite"),
				"description" => esc_html__( "Insert a size, for H1 elements (For example, 24px) ","novalite"),
				"id" => "novalite_h1_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "24px",

			),

			array( 

				"label" => esc_html__( "H2 headline","novalite"),
				"description" => esc_html__( "Insert a size, for H2 elements (For example, 22px) ","novalite"),
				"id" => "novalite_h2_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "22px",

			),

			array( 

				"label" => esc_html__( "H3 headline","novalite"),
				"description" => esc_html__( "Insert a size, for H3 elements (For example, 20px) ","novalite"),
				"id" => "novalite_h3_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "20px",

			),

			array( 

				"label" => esc_html__( "H4 headline","novalite"),
				"description" => esc_html__( "Insert a size, for H4 elements (For example, 18px) ","novalite"),
				"id" => "novalite_h4_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "18px",

			),

			array( 

				"label" => esc_html__( "H5 headline","novalite"),
				"description" => esc_html__( "Insert a size, for H5 elements (For example, 16px) ","novalite"),
				"id" => "novalite_h5_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "16px",

			),

			array( 

				"label" => esc_html__( "H6 headline","novalite"),
				"description" => esc_html__( "Insert a size, for H6 elements (For example, 14px) ","novalite"),
				"id" => "novalite_h6_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "14px",

			),
		);
		
		new novalite_customize($theme_panel);
		
	} 
	
	add_action( 'novalite_customize_panel', 'novalite_customize_panel_function', 10, 2 );

}

do_action('novalite_customize_panel');

?>