<?php

if (!function_exists('alhenalite_customize_panel_function')) {

	function alhenalite_customize_panel_function() {
		
		$theme_panel = array ( 

			/* START SUPPORT SECTION */ 

			array(
			
				"title" => __( "Get support","alhena-lite"),
				"id" => "alhenalite-customize-info",
				"type" => "alhenalite-customize-info",
				"section" => "alhenalite-customize-info",
				"priority" => "09",

			),

			/* START BACKGROUND SECTION */ 

			array(
				
				"label" => __( "Full Image Background","alhena-lite"),
				"description" => __( "Do you want to set a full background image? (After the upload, check 'Fixed', from the Background Attachment section)","alhena-lite"),
				"id" => "wip_full_image_background",
				"type" => "select",
				"section" => "background_image",
				"options" => array (
				   "off" => __( "No","alhena-lite"),
				   "on" => __( "Yes","alhena-lite"),
				),
				
				"std" => "off",
			
			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => __( "General","alhena-lite"),
				"description" => __( "General","alhena-lite"),
				"type" => "panel",
				"id" => "general_panel",
				"priority" => "10",
				
			),

			array( 

				"title" => __( "Load system","alhena-lite"),
				"type" => "section",
				"id" => "loadsystem_section",
				"panel" => "general_panel",
				"priority" => "10",

			),

			array(
				
				"label" => __( "Choose a load system","alhena-lite"),
				"description" => __( "Select a load system, if you've some problems with the theme (for example a blank page).","alhena-lite"),
				"id" => "wip_loadsystem",
				"type" => "select",
				"section" => "loadsystem_section",
				"options" => array (
				   "mode_a" => __( "Mode a","alhena-lite"),
				   "mode_b" => __( "Mode b","alhena-lite"),
				),
				
				"std" => "mode_a",
			
			),

			/* SKINS */ 

			array( 

				"title" => __( "Color Scheme","alhena-lite"),
				"type" => "section",
				"panel" => "general_panel",
				"priority" => "11",
				"id" => "colorscheme_section",

			),

			array(
				
				"label" => __( "Predefined Color Schemes","alhena-lite"),
				"description" => __( "Choose your Color Scheme","alhena-lite"),
				"id" => "wip_skin",
				"type" => "select",
				"section" => "colorscheme_section",
				"options" => array (

				   "light_orange" => __( "Light&Orange","alhena-lite"),
				   "light_turquoise" => __( "Light&Turquoise","alhena-lite"),
				   "light_blue" => __( "Light&Blue","alhena-lite"),
				   "light_red" => __( "Light&Red","alhena-lite"),
				   "light_pink" => __( "Light&Pink","alhena-lite"),
				   "light_purple" => __( "Light&Purple","alhena-lite"),
				   "light_yellow" => __( "Light&Yellow","alhena-lite"),
				   "light_green" => __( "Light&Green","alhena-lite"),
				   "orange" => __( "Orange","alhena-lite"),
				   "turquoise" => __( "Turquoise","alhena-lite"),
				   "blue" => __( "Blue","alhena-lite"),
				   "red" => __( "Red","alhena-lite"),
				   "pink" => __( "Pink","alhena-lite"),
				   "purple" => __( "Purple","alhena-lite"),
				   "yellow" => __( "Yellow","alhena-lite"),
				   "green" => __( "Green","alhena-lite"),
				   "dark_orange" => __( "Dark&Orange","alhena-lite"),
				   "dark_turquoise" => __( "Dark&Turquoise","alhena-lite"),
				   "dark_blue" => __( "Dark&Blue","alhena-lite"),
				   "dark_red" => __( "Dark&Red","alhena-lite"),
				   "dark_pink" => __( "Dark&Pink","alhena-lite"),
				   "dark_purple" => __( "Dark&Purple","alhena-lite"),
				   "dark_yellow" => __( "Dark&Yellow","alhena-lite"),
				   "dark_green" => __( "Dark&Green","alhena-lite"),
				
				),
				
				"std" => "light_blue",
			
			),

			/* PAGE WIDTH */ 

			array( 

				"title" => __( "Page width",'alhena-lite'),
				"type" => "section",
				"id" => "pagewidth_section",
				"panel" => "general_panel",
				"priority" => "12",

			),

			array( 

				"label" => __( "Screen greater than 768px",'alhena-lite'),
				"description" => __( "Set a width, for a screen greater than 768 pixel (for example 750 and not 750px ) ",'alhena-lite'),
				"id" => "wip_screen1",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "750",

			),

			array( 

				"label" => __( "Screen greater than 992px",'alhena-lite'),
				"description" => __( "Set a width, for a screen greater than 992 pixel (for example 940 and not 940px ) ",'alhena-lite'),
				"id" => "wip_screen2",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "940",

			),

			array( 

				"label" => __( "Screen greater than 1200px",'alhena-lite'),
				"description" => __( "Set a width, in px, for a screen greater than 1200 pixel (for example 1170 and not 1170px ) ",'alhena-lite'),
				"id" => "wip_screen3",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "1170",

			),

			/* SETTINGS SECTION */ 

			array( 

				"title" => __( "Settings","alhena-lite"),
				"type" => "section",
				"id" => "settings_section",
				"panel" => "general_panel",
				"priority" => "13",

			),

			array(
				
				"label" => __( "Comments","alhena-lite"),
				"description" => __( "Do you want to view the comments after articles?","alhena-lite"),
				"id" => "wip_view_comments",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => __( "No","alhena-lite"),
				   "on" => __( "Yes","alhena-lite"),
				),
				
				"std" => "off",
			
			),

			array( 

				"title" => __( "Styles","alhena-lite"),
				"type" => "section",
				"id" => "styles_section",
				"panel" => "general_panel",
				"priority" => "14",

			),

			array( 

				"label" => __( "Custom css","alhena-lite"),
				"description" => __( "Insert your custom css code.","alhena-lite"),
				"id" => "wip_custom_css_code",
				"type" => "textarea",
				"section" => "styles_section",
				"std" => "",

			),

			/* LAYOUTS SECTION */ 

			array( 

				"title" => __( "Layouts","alhena-lite"),
				"type" => "section",
				"id" => "layouts_section",
				"panel" => "general_panel",
				"priority" => "16",

			),

			array(
				
				"label" => __("Home Blog Layout","alhena-lite"),
				"description" => __("If you've set the latest articles, for the homepage, choose a layout.","alhena-lite"),
				"id" => "wip_home",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width","alhena-lite"),
				   "left-sidebar" => __( "Left Sidebar","alhena-lite"),
				   "right-sidebar" => __( "Right Sidebar","alhena-lite"),
				   "masonry" => __( "Masonry","alhena-lite"),
				),
				
				"std" => "right-sidebar",
			
			),
	
			array(
				
				"label" => __("Category Layout","alhena-lite"),
				"description" => __("Select a layout for category pages.","alhena-lite"),
				"id" => "wip_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width","alhena-lite"),
				   "left-sidebar" => __( "Left Sidebar","alhena-lite"),
				   "right-sidebar" => __( "Right Sidebar","alhena-lite"),
				   "masonry" => __( "Masonry","alhena-lite"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => __("WooCommerce Category Layout","alhena-lite"),
				"description" => __("Select a layout for the woocommerce categories.","alhena-lite"),
				"id" => "wip_woocommerce_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width","alhena-lite"),
				   "left-sidebar" => __( "Left Sidebar","alhena-lite"),
				   "right-sidebar" => __( "Right Sidebar","alhena-lite"),
				),
				
				"std" => "right-sidebar",
			
			),
			
			/* HEADER AREA SECTION */ 

			array( 

				"title" => __( "Header","alhena-lite"),
				"type" => "section",
				"id" => "header_section",
				"panel" => "general_panel",
				"priority" => "19",

			),

			array( 

				"label" => __( "Custom Logo","alhena-lite"),
				"description" => __( "Upload an image as logo","alhena-lite"),
				"id" => "wip_custom_logo",
				"type" => "upload",
				"section" => "header_section",
				"std" => "",

			),

			/* FOOTER AREA SECTION */ 

			array( 

				"title" => __( "Footer","alhena-lite"),
				"type" => "section",
				"id" => "footer_section",
				"panel" => "general_panel",
				"priority" => "20",

			),

			array( 

				"label" => __( "Copyright Text","alhena-lite"),
				"description" => __( "Insert your copyright text.","alhena-lite"),
				"id" => "wip_copyright_text",
				"type" => "textarea",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Facebook Url","alhena-lite"),
				"description" => __( "Insert Facebook Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_facebook_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Twitter Url","alhena-lite"),
				"description" => __( "Insert Twitter Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_twitter_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Flickr Url","alhena-lite"),
				"description" => __( "Insert Flickr Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_flickr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Google Url","alhena-lite"),
				"description" => __( "Insert Google Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_google_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Linkedin Url","alhena-lite"),
				"description" => __( "Insert Linkedin Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_linkedin_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Myspace Url","alhena-lite"),
				"description" => __( "Insert Myspace Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_myspace_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Pinterest Url","alhena-lite"),
				"description" => __( "Insert Pinterest Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_pinterest_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Tumblr Url","alhena-lite"),
				"description" => __( "Insert Tumblr Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_tumblr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Youtube Url","alhena-lite"),
				"description" => __( "Insert Youtube Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_youtube_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Vimeo Url","alhena-lite"),
				"description" => __( "Insert Vimeo Url (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_vimeo_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Skype Url","alhena-lite"),
				"description" => __( "Insert Skype ID (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_skype_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Email Address","alhena-lite"),
				"description" => __( "Insert Email Address (empty if you want to hide the button)","alhena-lite"),
				"id" => "wip_footer_email_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array(
				
				"label" => __( "Feed Rss Button","alhena-lite"),
				"description" => __( "Do you want to display the Feed Rss button?","alhena-lite"),
				"id" => "wip_footer_rss_button",
				"type" => "select",
				"section" => "footer_section",
				"options" => array (
				   "off" => __( "No","alhena-lite"),
				   "on" => __( "Yes","alhena-lite"),
				),
				
				"std" => "off",
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				"title" => __( "Typography","alhena-lite"),
				"description" => __( "Typography","alhena-lite"),
				"type" => "panel",
				"id" => "typography_panel",
				"priority" => "11",
				
			),

			/* LOGO */ 

			array( 

				"title" => __( "Logo","alhena-lite"),
				"type" => "section",
				"id" => "logo_section",
				"panel" => "typography_panel",
				"priority" => "10",

			),

			array( 

				"label" => __( "Font size","alhena-lite"),
				"description" => __( "Insert a size, for logo font (For example, 60px) ","alhena-lite"),
				"id" => "wip_logo_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "45px",

			),
			
			/* MENU */ 

			array( 

				"title" => __( "Menu","alhena-lite"),
				"type" => "section",
				"id" => "menu_section",
				"panel" => "typography_panel",
				"priority" => "12",

			),

			array( 

				"label" => __( "Font size","alhena-lite"),
				"description" => __( "Insert a size, for menu font (For example, 14px) ","alhena-lite"),
				"id" => "wip_menu_font_size",
				"type" => "text",
				"section" => "menu_section",
				"std" => "14px",

			),

			/* CONTENT */ 

			array( 

				"title" => __( "Content","alhena-lite"),
				"type" => "section",
				"id" => "content_section",
				"panel" => "typography_panel",
				"priority" => "13",

			),

			array( 

				"label" => __( "Font size","alhena-lite"),
				"description" => __( "Insert a size, for content font (For example, 14px) ","alhena-lite"),
				"id" => "wip_content_font_size",
				"type" => "text",
				"section" => "content_section",
				"std" => "14px",

			),


			/* HEADLINES */ 

			array( 

				"title" => __( "Headlines","alhena-lite"),
				"type" => "section",
				"id" => "headlines_section",
				"panel" => "typography_panel",
				"priority" => "14",

			),

			array( 

				"label" => __( "H1 headline","alhena-lite"),
				"description" => __( "Insert a size, for for H1 elements (For example, 24px) ","alhena-lite"),
				"id" => "wip_h1_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "24px",

			),

			array( 

				"label" => __( "H2 headline","alhena-lite"),
				"description" => __( "Insert a size, for for H2 elements (For example, 22px) ","alhena-lite"),
				"id" => "wip_h2_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "22px",

			),

			array( 

				"label" => __( "H3 headline","alhena-lite"),
				"description" => __( "Insert a size, for for H3 elements (For example, 20px) ","alhena-lite"),
				"id" => "wip_h3_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "20px",

			),

			array( 

				"label" => __( "H4 headline","alhena-lite"),
				"description" => __( "Insert a size, for for H4 elements (For example, 18px) ","alhena-lite"),
				"id" => "wip_h4_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "18px",

			),

			array( 

				"label" => __( "H5 headline","alhena-lite"),
				"description" => __( "Insert a size, for for H5 elements (For example, 16px) ","alhena-lite"),
				"id" => "wip_h5_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "16px",

			),

			array( 

				"label" => __( "H6 headline","alhena-lite"),
				"description" => __( "Insert a size, for for H6 elements (For example, 14px) ","alhena-lite"),
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