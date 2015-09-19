<?php

if (!function_exists('lookilite_customize_panel_function')) {

	function lookilite_customize_panel_function() {
		
		$theme_panel = array ( 

			/* FULL IMAGE BACKGROUND */ 

			array(
				
				"label" => __( "Full Image Background",'lookilite'),
				"description" => __( "Do you want to set a full background image? (After the upload, check 'Fixed', from the Background Attachment section)",'lookilite'),
				"id" => "lookilite_full_image_background",
				"type" => "select",
				"section" => "background_image",
				"options" => array (
				   "off" => __( "No",'lookilite'),
				   "on" => __( "Yes",'lookilite'),
				),
				
				"std" => "off",
			
			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => __( "General",'lookilite'),
				"description" => __( "General",'lookilite'),
				"type" => "panel",
				"id" => "general_panel",
				"priority" => "10",
				
			),

			array( 

				"title" => __( "Load system",'lookilite'),
				"type" => "section",
				"id" => "loadsystem_section",
				"panel" => "general_panel",
				"priority" => "10",

			),

			array(
				
				"label" => __( "Choose a load system",'lookilite'),
				"description" => __( "Select a load system, if you've some problems with the theme (for example a blank page).",'lookilite'),
				"id" => "lookilite_skins",
				"type" => "select",
				"section" => "loadsystem_section",
				"options" => array (
				   "mode_a" => __( "Mode a",'lookilite'),
				   "mode_b" => __( "Mode b",'lookilite'),
				),
				
				"std" => "mode_a",
			
			),

			/* SKINS */ 

			array( 

				"title" => __( "Color Scheme",'lookilite'),
				"type" => "section",
				"panel" => "general_panel",
				"priority" => "11",
				"id" => "colorscheme_section",

			),

			array(
				
				"label" => __( "Predefined Color Schemes",'lookilite'),
				"description" => __( "Choose your Color Scheme",'lookilite'),
				"id" => "lookilite_skin",
				"type" => "select",
				"section" => "colorscheme_section",
				"options" => array (
				   "turquoise" => __( "Turquoise",'lookilite'),
				   "orange" => __( "Orange",'lookilite'),
				   "blue" => __( "Blue",'lookilite'),
				   "red" => __( "Red",'lookilite'),
				   "purple" => __( "Purple",'lookilite'),
				   "yellow" => __( "Yellow",'lookilite'),
				   "green" => __( "Green",'lookilite'),
				   "light_turquoise" => __( "White & Turquoise",'lookilite'),
				   "light_orange" => __( "White & Orange",'lookilite'),
				   "light_blue" => __( "White & Blue",'lookilite'),
				   "light_red" => __( "White & Red",'lookilite'),
				   "light_purple" => __( "White & Purple",'lookilite'),
				   "light_yellow" => __( "White & Yellow",'lookilite'),
				   "light_green" => __( "White & Green",'lookilite'),
				),
				
				"std" => "turquoise",
			
			),

			array( 

				"title" => __( "Styles",'lookilite'),
				"type" => "section",
				"id" => "styles_section",
				"panel" => "general_panel",
				"priority" => "12",

			),

			array( 

				"label" => __( "Custom css",'lookilite'),
				"description" => __( "Insert your custom css code.",'lookilite'),
				"id" => "lookilite_custom_css_code",
				"type" => "custom_css",
				"section" => "styles_section",
				"std" => "",

			),

			/* LOGIN AREA SECTION */ 

			array( 

				"title" => __( "Login Area",'lookilite'),
				"type" => "section",
				"id" => "login_area_section",
				"panel" => "general_panel",
				"priority" => "13",

			),

			array( 

				"label" => __( "Custom Logo",'lookilite'),
				"description" => __( "Upload your custom logo, for the admin area.( Max 320px as width )",'lookilite'),
				"id" => "lookilite_login_logo",
				"type" => "upload",
				"section" => "login_area_section",
				"std" => "",

			),


			array( 

				"label" => __( "Height",'lookilite'),
				"description" => __( "Insert the height of your custom logo, without 'px' (for example 550 and not 550px).",'lookilite'),
				"id" => "lookilite_login_logo_height",
				"type" => "text",
				"section" => "login_area_section",
				"std" => "550",

			),

			/* HEADER AREA SECTION */ 

			array( 

				"title" => __( "Header",'lookilite'),
				"type" => "section",
				"id" => "header_section",
				"panel" => "general_panel",
				"priority" => "14",

			),

			array( 

				"label" => __( "Custom Logo",'lookilite'),
				"description" => __( "Upload your custom logo",'lookilite'),
				"id" => "lookilite_custom_logo",
				"type" => "upload",
				"section" => "header_section",
				"std" => "",

			),

			/* FOOTER AREA SECTION */ 

			array( 

				"title" => __( "Footer",'lookilite'),
				"type" => "section",
				"id" => "footer_section",
				"panel" => "general_panel",
				"priority" => "15",

			),

			array( 

				"label" => __( "Copyright Text",'lookilite'),
				"description" => __( "Insert your copyright text.",'lookilite'),
				"id" => "lookilite_copyright_text",
				"type" => "textarea",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Facebook Url",'lookilite'),
				"description" => __( "Insert Facebook Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_facebook_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Twitter Url",'lookilite'),
				"description" => __( "Insert Twitter Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_twitter_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Flickr Url",'lookilite'),
				"description" => __( "Insert Flickr Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_flickr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Google Url",'lookilite'),
				"description" => __( "Insert Google Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_google_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Linkedin Url",'lookilite'),
				"description" => __( "Insert Linkedin Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_linkedin_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Pinterest Url",'lookilite'),
				"description" => __( "Insert Pinterest Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_pinterest_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Tumblr Url",'lookilite'),
				"description" => __( "Insert Tumblr Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_tumblr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Youtube Url",'lookilite'),
				"description" => __( "Insert Youtube Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_youtube_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Skype Url",'lookilite'),
				"description" => __( "Insert Skype ID (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_skype_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Instagram Url",'lookilite'),
				"description" => __( "Insert Instagram Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_instagram_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Github Url",'lookilite'),
				"description" => __( "Insert Github Url (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_github_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Email Address",'lookilite'),
				"description" => __( "Insert Email Address (empty if you want to hide the button)",'lookilite'),
				"id" => "lookilite_footer_email_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array(
				
				"label" => __( "Feed Rss Button",'lookilite'),
				"description" => __( "Do you want to display the Feed Rss button?",'lookilite'),
				"id" => "lookilite_footer_rss_button",
				"type" => "select",
				"section" => "footer_section",
				"options" => array (
				   "off" => __( "No",'lookilite'),
				   "on" => __( "Yes",'lookilite'),
				),
				
				"std" => "off",
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				"title" => __( "Typography",'lookilite'),
				"description" => __( "Typography",'lookilite'),
				"type" => "panel",
				"id" => "typography_panel",
				"priority" => "11",
				
			),

			/* MENU */ 

			array( 

				"title" => __( "Menu",'lookilite'),
				"type" => "section",
				"id" => "menu_section",
				"panel" => "typography_panel",
				"priority" => "10",

			),

			array( 

				"label" => __( "Font size",'lookilite'),
				"description" => __( "Insert a size, for menu font (For example, 14px) ",'lookilite'),
				"id" => "lookilite_menu_font_size",
				"type" => "text",
				"section" => "menu_section",
				"std" => "14px",

			),

			/* CONTENT */ 

			array( 

				"title" => __( "Content",'lookilite'),
				"type" => "section",
				"id" => "content_section",
				"panel" => "typography_panel",
				"priority" => "12",

			),

			array( 

				"label" => __( "Font size",'lookilite'),
				"description" => __( "Insert a size, for content font (For example, 14px) ",'lookilite'),
				"id" => "lookilite_content_font_size",
				"type" => "text",
				"section" => "content_section",
				"std" => "14px",

			),


			/* HEADLINES */ 

			array( 

				"title" => __( "Headlines",'lookilite'),
				"type" => "section",
				"id" => "headlines_section",
				"panel" => "typography_panel",
				"priority" => "13",

			),

			array( 

				"label" => __( "H1 headline",'lookilite'),
				"description" => __( "Insert a size, for for H1 elements (For example, 24px) ",'lookilite'),
				"id" => "lookilite_h1_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "24px",

			),

			array( 

				"label" => __( "H2 headline",'lookilite'),
				"description" => __( "Insert a size, for for H2 elements (For example, 22px) ",'lookilite'),
				"id" => "lookilite_h2_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "22px",

			),

			array( 

				"label" => __( "H3 headline",'lookilite'),
				"description" => __( "Insert a size, for for H3 elements (For example, 20px) ",'lookilite'),
				"id" => "lookilite_h3_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "20px",

			),

			array( 

				"label" => __( "H4 headline",'lookilite'),
				"description" => __( "Insert a size, for for H4 elements (For example, 18px) ",'lookilite'),
				"id" => "lookilite_h4_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "18px",

			),

			array( 

				"label" => __( "H5 headline",'lookilite'),
				"description" => __( "Insert a size, for for H5 elements (For example, 16px) ",'lookilite'),
				"id" => "lookilite_h5_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "16px",

			),

			array( 

				"label" => __( "H6 headline",'lookilite'),
				"description" => __( "Insert a size, for for H6 elements (For example, 14px) ",'lookilite'),
				"id" => "lookilite_h6_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "14px",

			),
		);
		
		new lookilite_customize($theme_panel);
		
	} 
	
	add_action( 'lookilite_customize_panel', 'lookilite_customize_panel_function', 10, 2 );

}

do_action('lookilite_customize_panel');

?>