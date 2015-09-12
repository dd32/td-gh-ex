<?php

if (!function_exists('alhenalite_customize_panel_function')) {

	function alhenalite_customize_panel_function() {
		
		$theme_panel = array ( 

			array(
				
				"label" => __( "Full Image Background","alhenalite"),
				"description" => __( "Do you want to set a full background image? (After the upload, check 'Fixed', from the Background Attachment section)","alhenalite"),
				"id" => "wip_full_image_background",
				"type" => "select",
				"section" => "background_image",
				"options" => array (
				   "off" => __( "No","alhenalite"),
				   "on" => __( "Yes","alhenalite"),
				),
				
				"std" => "off",
			
			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => __( "General","alhenalite"),
				"description" => __( "General","alhenalite"),
				"type" => "panel",
				"id" => "general_panel",
				"priority" => "10",
				
			),

			array( 

				"title" => __( "Load system","alhenalite"),
				"type" => "section",
				"id" => "loadsystem_section",
				"panel" => "general_panel",
				"priority" => "10",

			),

			array(
				
				"label" => __( "Choose a load system","alhenalite"),
				"description" => __( "Select a load system, if you've some problems with the theme (for example a blank page).","alhenalite"),
				"id" => "wip_loadsystem",
				"type" => "select",
				"section" => "loadsystem_section",
				"options" => array (
				   "mode_a" => __( "Mode a","alhenalite"),
				   "mode_b" => __( "Mode b","alhenalite"),
				),
				
				"std" => "mode_a",
			
			),

			/* SKINS */ 

			array( 

				"title" => __( "Color Scheme","alhenalite"),
				"type" => "section",
				"panel" => "general_panel",
				"priority" => "11",
				"id" => "colorscheme_section",

			),

			array(
				
				"label" => __( "Predefined Color Schemes","alhenalite"),
				"description" => __( "Choose your Color Scheme","alhenalite"),
				"id" => "wip_skin",
				"type" => "select",
				"section" => "colorscheme_section",
				"options" => array (

				   "light_blue" => __( "Light & Blue","alhenalite"),
				   "light_turquoise" => __( "Light & Turquoise","alhenalite"),
				   "light_orange" => __( "Light & Orange","alhenalite"),
				   "light_red" => __( "Light & Red","alhenalite"),
				   "light_purple" => __( "Light & Purple","alhenalite"),
				   "light_yellow" => __( "Light & Yellow","alhenalite"),
				   "light_green" => __( "Light & Green","alhenalite"),
				   "dark_blue" => __( "Dark & Blue","alhenalite"),
				   "dark_turquoise" => __( "Dark & Turquoise","alhenalite"),
				   "dark_orange" => __( "Dark & Orange","alhenalite"),
				   "dark_red" => __( "Dark & Red","alhenalite"),
				   "dark_purple" => __( "Dark & Purple","alhenalite"),
				   "dark_yellow" => __( "Dark & Yellow","alhenalite"),
				   "dark_green" => __( "Dark & Green","alhenalite")
				
				),
				
				"std" => "turquoise",
			
			),

			/* SETTINGS SECTION */ 

			array( 

				"title" => __( "Settings","alhenalite"),
				"type" => "section",
				"id" => "settings_section",
				"panel" => "general_panel",
				"priority" => "13",

			),

			array(
				
				"label" => __( "Comments","alhenalite"),
				"description" => __( "Do you want to view the comments after articles?","alhenalite"),
				"id" => "wip_view_comments",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => __( "No","alhenalite"),
				   "on" => __( "Yes","alhenalite"),
				),
				
				"std" => "off",
			
			),

			array( 

				"title" => __( "Styles","alhenalite"),
				"type" => "section",
				"id" => "styles_section",
				"panel" => "general_panel",
				"priority" => "14",

			),

			array( 

				"label" => __( "Custom css","alhenalite"),
				"description" => __( "Insert your custom css code.","alhenalite"),
				"id" => "wip_custom_css_code",
				"type" => "textarea",
				"section" => "styles_section",
				"std" => "",

			),

			/* LAYOUTS SECTION */ 

			array( 

				"title" => __( "Layouts","alhenalite"),
				"type" => "section",
				"id" => "layouts_section",
				"panel" => "general_panel",
				"priority" => "16",

			),

			array(
				
				"label" => __("Home Blog Layout","alhenalite"),
				"description" => __("If you've set the latest articles, for the homepage, choose a layout.","alhenalite"),
				"id" => "wip_home",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width","alhenalite"),
				   "left-sidebar" => __( "Left Sidebar","alhenalite"),
				   "right-sidebar" => __( "Right Sidebar","alhenalite"),
				),
				
				"std" => "right-sidebar",
			
			),
	

			array(
				
				"label" => __("Category Layout","alhenalite"),
				"description" => __("Select a layout for category pages.","alhenalite"),
				"id" => "wip_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width","alhenalite"),
				   "left-sidebar" => __( "Left Sidebar","alhenalite"),
				   "right-sidebar" => __( "Right Sidebar","alhenalite"),
				),
				
				"std" => "right-sidebar",
			
			),

			/* HEADER AREA SECTION */ 

			array( 

				"title" => __( "Header","alhenalite"),
				"type" => "section",
				"id" => "header_section",
				"panel" => "general_panel",
				"priority" => "19",

			),

			array( 

				"label" => __( "Custom Logo","alhenalite"),
				"description" => __( "Upload an image as logo","alhenalite"),
				"id" => "wip_custom_logo",
				"type" => "upload",
				"section" => "header_section",
				"std" => "",

			),

			/* FOOTER AREA SECTION */ 

			array( 

				"title" => __( "Footer","alhenalite"),
				"type" => "section",
				"id" => "footer_section",
				"panel" => "general_panel",
				"priority" => "20",

			),

			array( 

				"label" => __( "Copyright Text","alhenalite"),
				"description" => __( "Insert your copyright text.","alhenalite"),
				"id" => "wip_copyright_text",
				"type" => "textarea",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Facebook Url","alhenalite"),
				"description" => __( "Insert Facebook Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_facebook_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Twitter Url","alhenalite"),
				"description" => __( "Insert Twitter Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_twitter_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Flickr Url","alhenalite"),
				"description" => __( "Insert Flickr Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_flickr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Google Url","alhenalite"),
				"description" => __( "Insert Google Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_google_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Linkedin Url","alhenalite"),
				"description" => __( "Insert Linkedin Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_linkedin_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Myspace Url","alhenalite"),
				"description" => __( "Insert Myspace Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_myspace_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Pinterest Url","alhenalite"),
				"description" => __( "Insert Pinterest Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_pinterest_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Tumblr Url","alhenalite"),
				"description" => __( "Insert Tumblr Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_tumblr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Youtube Url","alhenalite"),
				"description" => __( "Insert Youtube Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_youtube_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Vimeo Url","alhenalite"),
				"description" => __( "Insert Vimeo Url (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_vimeo_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Skype Url","alhenalite"),
				"description" => __( "Insert Skype ID (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_skype_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Email Address","alhenalite"),
				"description" => __( "Insert Email Address (empty if you want to hide the button)","alhenalite"),
				"id" => "wip_footer_email_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array(
				
				"label" => __( "Feed Rss Button","alhenalite"),
				"description" => __( "Do you want to display the Feed Rss button?","alhenalite"),
				"id" => "wip_footer_rss_button",
				"type" => "select",
				"section" => "footer_section",
				"options" => array (
				   "off" => __( "No","alhenalite"),
				   "on" => __( "Yes","alhenalite"),
				),
				
				"std" => "off",
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				"title" => __( "Typography","alhenalite"),
				"description" => __( "Typography","alhenalite"),
				"type" => "panel",
				"id" => "typography_panel",
				"priority" => "11",
				
			),

			/* LOGO */ 

			array( 

				"title" => __( "Logo","alhenalite"),
				"type" => "section",
				"id" => "logo_section",
				"panel" => "typography_panel",
				"priority" => "10",

			),

			array( 

				"label" => __( "Font size","alhenalite"),
				"description" => __( "Insert a size, for logo font (For example, 60px) ","alhenalite"),
				"id" => "wip_logo_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "70px",

			),
			
			/* MENU */ 

			array( 

				"title" => __( "Menu","alhenalite"),
				"type" => "section",
				"id" => "menu_section",
				"panel" => "typography_panel",
				"priority" => "12",

			),

			array( 

				"label" => __( "Font size","alhenalite"),
				"description" => __( "Insert a size, for menu font (For example, 14px) ","alhenalite"),
				"id" => "wip_menu_font_size",
				"type" => "text",
				"section" => "menu_section",
				"std" => "14px",

			),

			/* CONTENT */ 

			array( 

				"title" => __( "Content","alhenalite"),
				"type" => "section",
				"id" => "content_section",
				"panel" => "typography_panel",
				"priority" => "13",

			),

			array( 

				"label" => __( "Font size","alhenalite"),
				"description" => __( "Insert a size, for content font (For example, 14px) ","alhenalite"),
				"id" => "wip_content_font_size",
				"type" => "text",
				"section" => "content_section",
				"std" => "14px",

			),


			/* HEADLINES */ 

			array( 

				"title" => __( "Headlines","alhenalite"),
				"type" => "section",
				"id" => "headlines_section",
				"panel" => "typography_panel",
				"priority" => "14",

			),

			array( 

				"label" => __( "H1 headline","alhenalite"),
				"description" => __( "Insert a size, for for H1 elements (For example, 24px) ","alhenalite"),
				"id" => "wip_h1_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "24px",

			),

			array( 

				"label" => __( "H2 headline","alhenalite"),
				"description" => __( "Insert a size, for for H2 elements (For example, 22px) ","alhenalite"),
				"id" => "wip_h2_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "22px",

			),

			array( 

				"label" => __( "H3 headline","alhenalite"),
				"description" => __( "Insert a size, for for H3 elements (For example, 20px) ","alhenalite"),
				"id" => "wip_h3_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "20px",

			),

			array( 

				"label" => __( "H4 headline","alhenalite"),
				"description" => __( "Insert a size, for for H4 elements (For example, 18px) ","alhenalite"),
				"id" => "wip_h4_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "18px",

			),

			array( 

				"label" => __( "H5 headline","alhenalite"),
				"description" => __( "Insert a size, for for H5 elements (For example, 16px) ","alhenalite"),
				"id" => "wip_h5_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "16px",

			),

			array( 

				"label" => __( "H6 headline","alhenalite"),
				"description" => __( "Insert a size, for for H6 elements (For example, 14px) ","alhenalite"),
				"id" => "wip_h6_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "14px",

			),
		);
		
		new alhenalite_customize($theme_panel);
		
	} 
	
	add_action( 'alhenalite_customize_panel', 'alhenalite_customize_panel_function', 10, 2 );

}

do_action('alhenalite_customize_panel');

?>