<?php

if (!function_exists('novalite_customize_panel_function')) {

	function novalite_customize_panel_function() {
		
		$theme_panel = array ( 

			/* START SUPPORT SECTION */ 

			array(
			
				'title' => esc_html__( 'Upgrade to Nova Premium','nova-lite'),
				'id' => 'nova-lite-customize-info',
				'type' => 'nova-lite-customize-info',
				'section' => 'nova-lite-customize-info',
				'priority' => '09',

			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => esc_html__( "General","nova-lite"),
				"description" => esc_html__( "General","nova-lite"),
				"type" => "panel",
				"id" => "general_panel",
				"priority" => "10",
				
			),

			/* SKINS */ 

			array( 

				"title" => esc_html__( "Color Scheme","nova-lite"),
				"type" => "section",
				"panel" => "general_panel",
				"priority" => "11",
				"id" => "colorscheme_section",

			),

			array(
				
				"label" => esc_html__( "Predefined Color Schemes","nova-lite"),
				"description" => esc_html__( "Choose your Color Scheme","nova-lite"),
				"id" => "novalite_skin",
				"type" => "select",
				"section" => "colorscheme_section",
				"options" => array (

				   "turquoise" => esc_html__( "Turquoise","nova-lite"),
				   "orange" => esc_html__( "Orange","nova-lite"),
				   "blue" => esc_html__( "Blue","nova-lite"),
				   "red" => esc_html__( "Red","nova-lite"),
				   "purple" => esc_html__( "Purple","nova-lite"),
				   "yellow" => esc_html__( "Yellow","nova-lite"),
				   "green" => esc_html__( "Green","nova-lite"),
				   "light_turquoise" => esc_html__( "Light & Turquoise","nova-lite"),
				   "light_orange" => esc_html__( "Light & Orange","nova-lite"),
				   "light_blue" => esc_html__( "Light & Blue","nova-lite"),
				   "light_red" => esc_html__( "Light & Red","nova-lite"),
				   "light_purple" => esc_html__( "Light & Purple","nova-lite"),
				   "light_yellow" => esc_html__( "Light & Yellow","nova-lite"),
				   "light_green" => esc_html__( "Light & Green","nova-lite"),

				),
				
				"std" => "orange",
			
			),

			/* MAIN SETTINGS SECTION */ 

			array( 

				"title" => esc_html__( "Settings","nova-lite"),
				"type" => "section",
				"id" => "settings_section",
				"panel" => "general_panel",
				"priority" => "12",

			),

			array(
				
				"label" => esc_html__("Homepage site description","nova-lite"),
				"description" => esc_html__("Do you want to display the site description on homepage?.","nova-lite"),
				"id" => "novalite_homepage_description",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => esc_html__( "No","nova-lite"),
				   "on" => esc_html__( "Yes","nova-lite"),
				),
				
				"std" => "off",
			
			),

			/* LAYOUTS SECTION */ 

			array( 

				"title" => esc_html__( "Layouts","nova-lite"),
				"type" => "section",
				"id" => "layouts_section",
				"panel" => "general_panel",
				"priority" => "13",

			),

			array(
				
				"label" => esc_html__("Home Blog Layout","nova-lite"),
				"description" => esc_html__("If you've set the latest articles, for the homepage, choose a layout.","nova-lite"),
				"id" => "novalite_home",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","nova-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","nova-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","nova-lite"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => esc_html__("Category Layout","nova-lite"),
				"description" => esc_html__("Select a layout for category pages.","nova-lite"),
				"id" => "novalite_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","nova-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","nova-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","nova-lite"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => esc_html__("Search Layout","nova-lite"),
				"description" => esc_html__("Select a layout for search page.","nova-lite"),
				"id" => "novalite_search_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","nova-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","nova-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","nova-lite"),
				),
				
				"std" => "right-sidebar",
			
			),

			/* HEADER AREA SECTION */ 

			array( 

				"title" => esc_html__( "Header","nova-lite"),
				"type" => "section",
				"id" => "header_section",
				"panel" => "general_panel",
				"priority" => "14",

			),

			array( 

				"label" => esc_html__( "Custom Logo","nova-lite"),
				"description" => esc_html__( "Insert the url of your custom logo","nova-lite"),
				"id" => "novalite_custom_logo",
				"type" => "upload",
				"section" => "header_section",
				"std" => "",

			),

			/* FOOTER AREA SECTION */ 

			array( 

				"title" => esc_html__( "Footer","nova-lite"),
				"type" => "section",
				"id" => "footer_section",
				"panel" => "general_panel",
				"priority" => "15",

			),

			array( 

				"label" => esc_html__( "Copyright Text","nova-lite"),
				"description" => esc_html__( "Insert your copyright text.","nova-lite"),
				"id" => "novalite_copyright_text",
				"type" => "textarea",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Facebook Url","nova-lite"),
				"description" => esc_html__( "Insert Facebook Url (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_facebook_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Twitter Url","nova-lite"),
				"description" => esc_html__( "Insert Twitter Url (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_twitter_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Flickr Url","nova-lite"),
				"description" => esc_html__( "Insert Flickr Url (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_flickr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Google Url","nova-lite"),
				"description" => esc_html__( "Insert Google Url (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_google_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Linkedin Url","nova-lite"),
				"description" => esc_html__( "Insert Linkedin Url (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_linkedin_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Pinterest Url","nova-lite"),
				"description" => esc_html__( "Insert Pinterest Url (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_pinterest_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Tumblr Url","nova-lite"),
				"description" => esc_html__( "Insert Tumblr Url (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_tumblr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Youtube Url","nova-lite"),
				"description" => esc_html__( "Insert Youtube Url (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_youtube_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Skype Url","nova-lite"),
				"description" => esc_html__( "Insert Skype ID (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_skype_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Instagram Url","nova-lite"),
				"description" => esc_html__( "Insert Instagram ID (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_instagram_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Github Url","nova-lite"),
				"description" => esc_html__( "Insert Github ID (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_github_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Email Address","nova-lite"),
				"description" => esc_html__( "Insert Email Address (empty if you want to hide the button)","nova-lite"),
				"id" => "novalite_footer_email_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array(
				
				"label" => esc_html__( "Feed Rss Button","nova-lite"),
				"description" => esc_html__( "Do you want to display the Feed Rss button?","nova-lite"),
				"id" => "novalite_footer_rss_button",
				"type" => "select",
				"section" => "footer_section",
				"options" => array (
				   "off" => esc_html__( "No","nova-lite"),
				   "on" => esc_html__( "Yes","nova-lite"),
				),
				
				"std" => "off",
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				"title" => esc_html__( "Typography","nova-lite"),
				"description" => esc_html__( "Typography","nova-lite"),
				"type" => "panel",
				"id" => "typography_panel",
				"priority" => "11",
				
			),

			/* LOGO */ 

			array( 

				"title" => esc_html__( "Logo","nova-lite"),
				"type" => "section",
				"id" => "logo_section",
				"panel" => "typography_panel",
				"priority" => "10",

			),

			array( 

				"label" => esc_html__( "Font size","nova-lite"),
				"description" => esc_html__( "Insert a size, for logo font (For example, 70px) ","nova-lite"),
				"id" => "novalite_logo_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "70px",

			),
			
			/* MENU */ 

			array( 

				"title" => esc_html__( "Menu","nova-lite"),
				"type" => "section",
				"id" => "menu_section",
				"panel" => "typography_panel",
				"priority" => "12",

			),

			array( 

				"label" => esc_html__( "Font size","nova-lite"),
				"description" => esc_html__( "Insert a size, for menu font (For example, 14px) ","nova-lite"),
				"id" => "novalite_menu_font_size",
				"type" => "text",
				"section" => "menu_section",
				"std" => "14px",

			),

			/* CONTENT */ 

			array( 

				"title" => esc_html__( "Content","nova-lite"),
				"type" => "section",
				"id" => "content_section",
				"panel" => "typography_panel",
				"priority" => "13",

			),

			array( 

				"label" => esc_html__( "Font size","nova-lite"),
				"description" => esc_html__( "Insert a size, for content font (For example, 14px) ","nova-lite"),
				"id" => "novalite_content_font_size",
				"type" => "text",
				"section" => "content_section",
				"std" => "14px",

			),


			/* HEADLINES */ 

			array( 

				"title" => esc_html__( "Headlines","nova-lite"),
				"type" => "section",
				"id" => "headlines_section",
				"panel" => "typography_panel",
				"priority" => "14",

			),

			array( 

				"label" => esc_html__( "H1 headline","nova-lite"),
				"description" => esc_html__( "Insert a size, for H1 elements (For example, 24px) ","nova-lite"),
				"id" => "novalite_h1_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "24px",

			),

			array( 

				"label" => esc_html__( "H2 headline","nova-lite"),
				"description" => esc_html__( "Insert a size, for H2 elements (For example, 22px) ","nova-lite"),
				"id" => "novalite_h2_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "22px",

			),

			array( 

				"label" => esc_html__( "H3 headline","nova-lite"),
				"description" => esc_html__( "Insert a size, for H3 elements (For example, 20px) ","nova-lite"),
				"id" => "novalite_h3_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "20px",

			),

			array( 

				"label" => esc_html__( "H4 headline","nova-lite"),
				"description" => esc_html__( "Insert a size, for H4 elements (For example, 18px) ","nova-lite"),
				"id" => "novalite_h4_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "18px",

			),

			array( 

				"label" => esc_html__( "H5 headline","nova-lite"),
				"description" => esc_html__( "Insert a size, for H5 elements (For example, 16px) ","nova-lite"),
				"id" => "novalite_h5_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "16px",

			),

			array( 

				"label" => esc_html__( "H6 headline","nova-lite"),
				"description" => esc_html__( "Insert a size, for H6 elements (For example, 14px) ","nova-lite"),
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