<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = wp_get_theme(get_stylesheet_directory() . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	$themename = 'discover';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$blog_home_array = array("on" => "on","off" => "off");
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => "Homepage Settings",
						"type" => "heading");																									
						
	$options[] = array( "name" => "Homepage Box 1 heading",
						"desc" => "Heading for homepage box1.",
						"id" => "box_head1",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 1 text",
						"desc" => "Textarea for homepage box1.",
						"id" => "box_text1",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Homepage Box 1 thumbnail image",
						"desc" => "215px x 130px exact. Upload your image for homepage box 1.",
						"id" => "box_image1",
						"type" => "upload");						
						
	$options[] = array( "name" => "Homepage Box 1 link",
						"desc" => "Paste here the link of the page or post.",
						"id" => "box_link1",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 2 heading",
						"desc" => "Heading for homepage box2.",
						"id" => "box_head2",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 2 text",
						"desc" => "Textarea for homepage box2.",
						"id" => "box_text2",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Homepage Box 2 thumbnail image",
						"desc" => "215px x 130px exact. Upload your image for homepage box 2.",
						"id" => "box_image2",
						"type" => "upload");						
						
	$options[] = array( "name" => "Homepage Box 2 link",
						"desc" => "Paste here the link of the page or post.",
						"id" => "box_link2",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 3 heading",
						"desc" => "Heading for homepage box3.",
						"id" => "box_head3",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 3 text",
						"desc" => "Textarea for homepage box3.",
						"id" => "box_text3",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Homepage Box 3 thumbnail image",
						"desc" => "215px x 130px exact. Upload your image for homepage box 3.",
						"id" => "box_image3",
						"type" => "upload");						
						
	$options[] = array( "name" => "Homepage Box 3 link",
						"desc" => "Paste here the link of the page or post.",
						"id" => "box_link3",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "Homepage Box 4 heading",
						"desc" => "Heading for homepage box4.",
						"id" => "box_head4",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 4 text",
						"desc" => "Textarea for homepage box4.",
						"id" => "box_text4",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Homepage Box 4 thumbnail image",
						"desc" => "215px x 130px exact. Upload your image for homepage box 4.",
						"id" => "box_image4",
						"type" => "upload");						
						
	$options[] = array( "name" => "Homepage Box 4 link",
						"desc" => "Paste here the link of the page or post.",
						"id" => "box_link4",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Blog Display",
						"desc" => "Select option to display blog post on homepage.",
						"id" => "blog_home",
						"std" => "off",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $blog_home_array);																																																																																																													
						
	$options[] = array( "name" => "Slider Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Welcome headline",
						"desc" => "Hompage slider welcome headline content.",
						"id" => "welcome_head",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Welcome text",
						"desc" => "Hompage slider welcome text content.",
						"id" => "welcome_text",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Welcome Button text",
						"desc" => "Hompage slider welcome button text.",
						"id" => "welcome_button",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Welcome Button link",
						"desc" => "Hompage slider welcome button link.",
						"id" => "welcome_button_link",
						"std" => "",
						"type" => "text");						
						
	$options[] = array( "name" => "Slider heading 1",
						"desc" => "Heading for the slider.",
						"id" => "slider_head1",
						"std" => "",
						"type" => "text");			
						
	$options[] = array( "name" => "Slider image 1",
						"desc" => "637px x 298px minimum. Upload your image for homepage slider.",
						"id" => "slider_image1",
						"type" => "upload");
						
	$options[] = array( "name" => "Slider image link",
						"desc" => "Paste here the link of the page or post.",
						"id" => "slider_link1",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Slider heading 2",
						"desc" => "Heading for the slider.",
						"id" => "slider_head2",
						"std" => "",
						"type" => "text");						
						
	$options[] = array( "name" => "Slider image 2",
						"desc" => "637px x 298px minimum. Upload your image for homepage slider.",
						"id" => "slider_image2",
						"type" => "upload");
						
	$options[] = array( "name" => "Slider image 2 link",
						"desc" => "Paste here the link of the page or post.",
						"id" => "slider_link2",
						"std" => "",
						"type" => "text");						

	$options[] = array( "name" => "Logo Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Logo image",
						"desc" => "Upload your logo image over here.",
						"id" => "logo_image",
						"type" => "upload");
						
	$options[] = array( "name" => "Footer Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Footer copyright text",
						"desc" => "Enter your company name here.",
						"id" => "footer_cr",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "Google Analytics Code",
						"desc" => "You can paste your Google Analytics or other tracking code in this box.",
						"id" => "go_code",
						"std" => "",
						"type" => "textarea");
						
															
	return $options;
}