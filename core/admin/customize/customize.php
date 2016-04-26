<?php

if (!function_exists('suevafree_customize_panel_function')) {

	function suevafree_customize_panel_function() {
		
		$theme_panel = array ( 

			array(
				
				"label" => __( "Full Image Background","suevafree"),
				"description" => __( "Do you want to set a full background image? (After the upload, check 'Fixed', from the Background Attachment section)","suevafree"),
				"id" => "suevafree_full_image_background",
				"type" => "select",
				"section" => "background_image",
				"options" => array (
				   "off" => __( "No","suevafree"),
				   "on" => __( "Yes","suevafree"),
				),
				
				"std" => "off",
			
			),

			/* START SUPPORT SECTION */ 

			array(
			
				"title" => __( "Get support","suevafree"),
				"id" => "suevafree-customize-info",
				"type" => "suevafree-customize-info",
				"section" => "suevafree-customize-info",
				"priority" => "08",

			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => __( "General","suevafree"),
				"description" => __( "General","suevafree"),
				"type" => "panel",
				"id" => "general_panel",
				"priority" => "10",
				
			),

			array( 

				"title" => __( "Load system","suevafree"),
				"type" => "section",
				"id" => "loadsystem_section",
				"panel" => "general_panel",
				"priority" => "09",

			),

			array(
				
				"label" => __( "Choose a load system","suevafree"),
				"description" => __( "Select a load system, if you've some problems with the theme (for example a blank page).","suevafree"),
				"id" => "suevafree_loadsystem",
				"type" => "select",
				"section" => "loadsystem_section",
				"options" => array (
				   "mode_a" => __( "Mode a","suevafree"),
				   "mode_b" => __( "Mode b","suevafree"),
				),
				
				"std" => "mode_a",
			
			),

			/* SKINS */ 

			array( 

				"title" => __( "Color Scheme","suevafree"),
				"type" => "section",
				"panel" => "general_panel",
				"priority" => "10",
				"id" => "colorscheme_section",

			),

			array(
				
				"label" => __( "Predefined Color Schemes","suevafree"),
				"description" => __( "Choose your Color Scheme","suevafree"),
				"id" => "suevafree_skin",
				"type" => "select",
				"section" => "colorscheme_section",
				"options" => array (

				   "cyan" => __( "Cyan","suevafree"),
				   "orange" => __( "Orange","suevafree"),
				   "blue" => __( "Blue","suevafree"),
				   "red" => __( "Red","suevafree"),
				   "pink" => __( "Pink","suevafree"),
				   "purple" => __( "Purple","suevafree"),
				   "yellow" => __( "Yellow","suevafree"),
				   "green" => __( "Green","suevafree"),
				   "black" => __( "Black","suevafree"),

				),
				
				"std" => "orange",
			
			),

			/* PAGE WIDTH */ 

			array( 

				"title" => __( "Page width",'suevafree'),
				"type" => "section",
				"id" => "pagewidth_section",
				"panel" => "general_panel",
				"priority" => "11",

			),

			array( 

				"label" => __( "Screen greater than 768px",'suevafree'),
				"description" => __( "Set a width, for a screen greater than 768 pixel (for example 750 and not 750px ) ",'suevafree'),
				"id" => "suevafree_screen1",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "750",

			),

			array( 

				"label" => __( "Screen greater than 992px",'suevafree'),
				"description" => __( "Set a width, for a screen greater than 992 pixel (for example 940 and not 940px ) ",'suevafree'),
				"id" => "suevafree_screen2",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "940",

			),

			array( 

				"label" => __( "Screen greater than 1200px",'suevafree'),
				"description" => __( "Set a width, in px, for a screen greater than 1200 pixel (for example 1170 and not 1170px ) ",'suevafree'),
				"id" => "suevafree_screen3",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "940",

			),

			array( 

				"label" => __( "Screen greater than 1400px",'suevafree'),
				"description" => __( "Set a width, in px, for a screen greater than 1400px pixel (for example 1370 and not 1370px ) ",'suevafree'),
				"id" => "suevafree_screen4",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "940",

			),

			/* SETTINGS SECTION */ 

			array( 

				"title" => __( "Settings","suevafree"),
				"type" => "section",
				"id" => "settings_section",
				"panel" => "general_panel",
				"priority" => "12",

			),

			array(
				
				"label" => __( "Read more","suevafree"),
				"description" => __( "Do you want to display the read more button?","suevafree"),
				"id" => "suevafree_view_readmore",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => __( "No","suevafree"),
				   "on" => __( "Yes","suevafree"),
				),
				
				"std" => "on",
			
			),

			array(
				
				"label" => __( "Author","suevafree"),
				"description" => __( "Do you want to view the author?","suevafree"),
				"id" => "suevafree_view_author",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => __( "No","suevafree"),
				   "on" => __( "Yes","suevafree"),
				),
				
				"std" => "off",
			
			),
			
			array(
				
				"label" => __( "Back to top button.","suevafree"),
				"description" => __( "Do you want to display a button to back on the top of the site?","suevafree"),
				"id" => "suevafree_view_back_to_top",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => __( "No","suevafree"),
				   "on" => __( "Yes","suevafree"),
				),
				
				"std" => "on",
			
			),

			array( 

				"title" => __( "Styles","suevafree"),
				"type" => "section",
				"id" => "styles_section",
				"panel" => "general_panel",
				"priority" => "13",

			),

			array( 

				"label" => __( "Custom css","suevafree"),
				"description" => __( "Insert your custom css code.","suevafree"),
				"id" => "suevafree_custom_css_code",
				"type" => "textarea",
				"section" => "styles_section",
				"std" => "",

			),

			/* LAYOUTS SECTION */ 

			array( 

				"title" => __( "Layouts","suevafree"),
				"type" => "section",
				"id" => "layouts_section",
				"panel" => "general_panel",
				"priority" => "14",

			),

			array(
				
				"label" => __("Main Layout","suevafree"),
				"description" => __("Choose a layout for your site.","suevafree"),
				"id" => "suevafree_body_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "default" => __( "Default","suevafree"),
				   "minimal" => __( "Minimal Layout","suevafree"),
				),
				
				"std" => "default",
			
			),
	
			array(
				
				"label" => __("Home Blog Layout","suevafree"),
				"description" => __("If you've set the latest articles, for the homepage, choose a layout.","suevafree"),
				"id" => "suevafree_home",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width","suevafree"),
				   "left-sidebar" => __( "Left Sidebar","suevafree"),
				   "right-sidebar" => __( "Right Sidebar","suevafree"),
				   "masonry" => __( "Masonry","suevafree"),
				),
				
				"std" => "masonry",
			
			),
	

			array(
				
				"label" => __("Category Layout","suevafree"),
				"description" => __("Select a layout for category pages.","suevafree"),
				"id" => "suevafree_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width","suevafree"),
				   "left-sidebar" => __( "Left Sidebar","suevafree"),
				   "right-sidebar" => __( "Right Sidebar","suevafree"),
				   "masonry" => __( "Masonry","suevafree"),
				),
				
				"std" => "masonry",
			
			),

			array(
				
				"label" => __("WooCommerce Category Layout","suevafree"),
				"description" => __("Select a layout for the woocommerce categories.","suevafree"),
				"id" => "suevafree_woocommerce_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width","suevafree"),
				   "left-sidebar" => __( "Left Sidebar","suevafree"),
				   "right-sidebar" => __( "Right Sidebar","suevafree"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => __("Search Layout","suevafree"),
				"description" => __("Select a layout for the search section.","suevafree"),
				"id" => "suevafree_search_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => __( "Full Width","suevafree"),
				   "left-sidebar" => __( "Left Sidebar","suevafree"),
				   "right-sidebar" => __( "Right Sidebar","suevafree"),
				   "masonry" => __( "Masonry","suevafree"),
				),
				
				"std" => "masonry",
			
			),

			array(
				
				"label" => __("Menu Layout","suevafree"),
				"description" => __("Choose a layout for the menu.","suevafree"),
				"id" => "suevafree_menu_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "" => __( "Default","suevafree"),
				   "menubar" => __( "Alternative menu","suevafree"),
				),
				
				"std" => "",
			
			),

			/* THUMBNAILS SECTION */ 

			array( 

				"title" => __( "Thumbnails","suevafree"),
				"type" => "section",
				"id" => "thumbnails_section",
				"panel" => "general_panel",
				"priority" => "15",

			),

			array( 

				"label" => __( "Blog Thumbnail","suevafree"),
				"description" => __( "Insert the height for blog thumbnail (Use a plugin like Regenerate Thumbnails, to regenerate each thumbnail)","suevafree"),
				"id" => "suevafree_blog_thumbinal",
				"type" => "text",
				"section" => "thumbnails_section",
				"std" => "429",

			),


			/* HEADER AREA SECTION */ 

			array( 

				"title" => __( "Header","suevafree"),
				"type" => "section",
				"id" => "header_section",
				"panel" => "general_panel",
				"priority" => "16",

			),

			array( 

				"label" => __( "Custom Logo","suevafree"),
				"description" => __( "Insert the url of your custom logo","suevafree"),
				"id" => "suevafree_custom_logo",
				"type" => "upload",
				"section" => "header_section",
				"std" => "",

			),

			/* FOOTER AREA SECTION */ 

			array( 

				"title" => __( "Footer","suevafree"),
				"type" => "section",
				"id" => "footer_section",
				"panel" => "general_panel",
				"priority" => "17",

			),

			array( 

				"label" => __( "Copyright Text","suevafree"),
				"description" => __( "Insert your copyright text.","suevafree"),
				"id" => "suevafree_copyright_text",
				"type" => "textarea",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Facebook Url","suevafree"),
				"description" => __( "Insert Facebook Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_facebook_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Twitter Url","suevafree"),
				"description" => __( "Insert Twitter Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_twitter_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Flickr Url","suevafree"),
				"description" => __( "Insert Flickr Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_flickr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Google Url","suevafree"),
				"description" => __( "Insert Google Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_google_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Linkedin Url","suevafree"),
				"description" => __( "Insert Linkedin Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_linkedin_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Myspace Url","suevafree"),
				"description" => __( "Insert Myspace Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_myspace_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Pinterest Url","suevafree"),
				"description" => __( "Insert Pinterest Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_pinterest_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Tumblr Url","suevafree"),
				"description" => __( "Insert Tumblr Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_tumblr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Youtube Url","suevafree"),
				"description" => __( "Insert Youtube Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_youtube_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Vimeo Url","suevafree"),
				"description" => __( "Insert Vimeo Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_vimeo_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Instagram Url","suevafree"),
				"description" => __( "Insert Instagram Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_instagram_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Deviantart Url","suevafree"),
				"description" => __( "Insert Deviantart Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_deviantart_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Github Url","suevafree"),
				"description" => __( "Insert Github Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_github_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Xing Url","suevafree"),
				"description" => __( "Insert Xing Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_xing_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),
			
			array( 

				"label" => __( "Dribbble Url","suevafree"),
				"description" => __( "Insert Dribbble Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_dribbble_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),
			
			array( 

				"label" => __( "Dropbox Url","suevafree"),
				"description" => __( "Insert Dropbox Url (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_dropbox_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),
			
			array( 

				"label" => __( "Whatsapp Number","suevafree"),
				"description" => __( "Insert Whatsapp number (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_whatsapp_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Skype Url","suevafree"),
				"description" => __( "Insert Skype ID (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_skype_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => __( "Email Address","suevafree"),
				"description" => __( "Insert Email Address (leave empty if you want to hide the button)","suevafree"),
				"id" => "suevafree_footer_email_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array(
				
				"label" => __( "Feed Rss Button","suevafree"),
				"description" => __( "Do you want to display the Feed Rss button?","suevafree"),
				"id" => "suevafree_footer_rss_button",
				"type" => "select",
				"section" => "footer_section",
				"options" => array (
				   "off" => __( "No","suevafree"),
				   "on" => __( "Yes","suevafree"),
				),
				
				"std" => "off",
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				"title" => __( "Typography","suevafree"),
				"description" => __( "Typography","suevafree"),
				"type" => "panel",
				"id" => "typography_panel",
				"priority" => "11",
				
			),

			/* LOGO */ 

			array( 

				"title" => __( "Logo","suevafree"),
				"type" => "section",
				"id" => "logo_section",
				"panel" => "typography_panel",
				"priority" => "10",

			),

			array( 

				"label" => __( "Font size","suevafree"),
				"description" => __( "Insert a size, for logo font (For example, 60px) ","suevafree"),
				"id" => "suevafree_logo_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "70px",

			),
			
			array( 

				"label" => __( "Description font size","suevafree"),
				"description" => __( "Insert a size, for logo description (For example, 14px) ","suevafree"),
				"id" => "suevafree_logo_description_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "14px",

			),
			
			/* MENU */ 

			array( 

				"title" => __( "Menu","suevafree"),
				"type" => "section",
				"id" => "menu_section",
				"panel" => "typography_panel",
				"priority" => "11",

			),

			array( 

				"label" => __( "Font size","suevafree"),
				"description" => __( "Insert a size, for menu font (For example, 14px) ","suevafree"),
				"id" => "suevafree_menu_font_size",
				"type" => "text",
				"section" => "menu_section",
				"std" => "14px",

			),

			/* CONTENT */ 

			array( 

				"title" => __( "Content","suevafree"),
				"type" => "section",
				"id" => "content_section",
				"panel" => "typography_panel",
				"priority" => "12",

			),

			array( 

				"label" => __( "Font size","suevafree"),
				"description" => __( "Insert a size, for content font (For example, 14px) ","suevafree"),
				"id" => "suevafree_content_font_size",
				"type" => "text",
				"section" => "content_section",
				"std" => "14px",

			),


			/* HEADLINES */ 

			array( 

				"title" => __( "Headlines","suevafree"),
				"type" => "section",
				"id" => "headlines_section",
				"panel" => "typography_panel",
				"priority" => "13",

			),

			array( 

				"label" => __( "H1 headline","suevafree"),
				"description" => __( "Insert a size, for for H1 elements (For example, 24px) ","suevafree"),
				"id" => "suevafree_h1_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "24px",

			),

			array( 

				"label" => __( "H2 headline","suevafree"),
				"description" => __( "Insert a size, for for H2 elements (For example, 22px) ","suevafree"),
				"id" => "suevafree_h2_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "22px",

			),

			array( 

				"label" => __( "H3 headline","suevafree"),
				"description" => __( "Insert a size, for for H3 elements (For example, 20px) ","suevafree"),
				"id" => "suevafree_h3_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "20px",

			),

			array( 

				"label" => __( "H4 headline","suevafree"),
				"description" => __( "Insert a size, for for H4 elements (For example, 18px) ","suevafree"),
				"id" => "suevafree_h4_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "18px",

			),

			array( 

				"label" => __( "H5 headline","suevafree"),
				"description" => __( "Insert a size, for for H5 elements (For example, 16px) ","suevafree"),
				"id" => "suevafree_h5_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "16px",

			),

			array( 

				"label" => __( "H6 headline","suevafree"),
				"description" => __( "Insert a size, for for H6 elements (For example, 14px) ","suevafree"),
				"id" => "suevafree_h6_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "14px",

			),
		);
		
		new suevafree_customize($theme_panel);
		
	} 
	
	add_action( 'suevafree_customize_panel', 'suevafree_customize_panel_function', 10, 2 );

}

do_action('suevafree_customize_panel');

?>