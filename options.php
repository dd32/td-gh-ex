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
	$themename = 'application';
	
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
	$test_array = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
	
	$slider_array = array("slider" => "slider","nivoslidedown" => "nivoslidedown","nivofadein" => "nivofadein");	
	$port_style_array = array("1" => "1","2" => "2","3" => "3","4" => "4");		
	
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
						
	$options[] = array( "name" => "Slider heading",
						"desc" => "Heading for the slider.",
						"id" => "slider_head1",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Slide 1 content",
						"desc" => "Content for the slide 1.",
						"id" => "slider_content1",
						"std" => "",
						"type" => "textarea");						
						
	$options[] = array( "name" => "Slider image",
						"desc" => "560px x 380px exact. Upload your image for homepage slider.",
						"id" => "slider_image1",
						"type" => "upload");
						
	$options[] = array( "name" => "Slider link",
						"desc" => "Paste here the link of the page or post.",
						"id" => "slider_link1",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Slider heading 2",
						"desc" => "Heading for the slider 2.",
						"id" => "slider_head2",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Slide 2 content",
						"desc" => "Content for the slide 2.",
						"id" => "slider_content2",
						"std" => "",
						"type" => "textarea");												
						
	$options[] = array( "name" => "Slider image 2",
						"desc" => "560px x 380px exact. Upload your image for homepage slider.",
						"id" => "slider_image2",
						"type" => "upload");
						
	$options[] = array( "name" => "Slider link 2",
						"desc" => "Paste here the link of the page or post.",
						"id" => "slider_link2",
						"std" => "",
						"type" => "text");																														
						
	$options[] = array( "name" => "Homepage Box 1 Title",
						"desc" => "Write your headline here.",
						"id" => "b_head_01",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 1 Content",
						"desc" => "Write your content here.",
						"id" => "b_co_01",
						"std" => "",
						"type" => "textarea");						
						
	$options[] = array( "name" => "Homepage Box 1 Link",
						"desc" => "The path of the page read more button will link to. For ex: http://www.yoursite.com",
						"id" => "b_link_01",
						"std" => "",
						"type" => "text");						
						
	$options[] = array( "name" => "Homepage Box 1 image",
						"desc" => "212px x 80px exact. Upload your box1 image over here.",
						"id" => "box_image1",
						"type" => "upload");										
						
	$options[] = array( "name" => "Homepage Box 2 Title",
						"desc" => "Write your headline here.",
						"id" => "b_head_02",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 2 Content",
						"desc" => "Write your content here.",
						"id" => "b_co_02",
						"std" => "",
						"type" => "textarea");						
						
	$options[] = array( "name" => "Homepage Box 2 Link",
						"desc" => "The path of the page read more button will link to. For ex: http://www.yoursite.com",
						"id" => "b_link_02",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 2 image",
						"desc" => "212px x 80px exact. Upload your box2 image over here.",
						"id" => "box_image2",
						"type" => "upload");											
						
	$options[] = array( "name" => "Homepage Box 3 Title",
						"desc" => "Write your headline here.",
						"id" => "b_head_03",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 3 Content",
						"desc" => "Write your content here.",
						"id" => "b_co_03",
						"std" => "",
						"type" => "textarea");						
						
	$options[] = array( "name" => "Homepage Box 3 Link",
						"desc" => "The path of the page read more button will link to. For ex: http://www.yoursite.com",
						"id" => "b_link_03",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "Homepage Box 3 image",
						"desc" => "212px x 80px exact. Upload your box3 image over here.",
						"id" => "box_image3",
						"type" => "upload");											
						
	$options[] = array( "name" => "Homepage Box 4 Title",
						"desc" => "Write your headline here.",
						"id" => "b_head_04",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Homepage Box 4 Content",
						"desc" => "Write your content here.",
						"id" => "b_co_04",
						"std" => "",
						"type" => "textarea");						
						
	$options[] = array( "name" => "Homepage Box 4 Link",
						"desc" => "The path of the page read more button will link to. For ex: http://www.yoursite.com",
						"id" => "b_link_04",
						"std" => "",
						"type" => "text");		
						
	$options[] = array( "name" => "Homepage Box 4 image",
						"desc" => "212px x 80px exact. Upload your box4 image over here.",
						"id" => "box_image4",
						"type" => "upload");																																																																													
						
	$options[] = array( "name" => "Logo Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Logo image",
						"desc" => "Upload your logo image over here.",
						"id" => "logo_image",
						"type" => "upload");
						
	$options[] = array( "name" => "Favicon image",
						"desc" => "Upload your favicon image over here or enter url.",
						"id" => "favicon_image",
						"type" => "upload");																																																							
						
	$options[] = array( "name" => "Footer Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Footer copyright text",
						"desc" => "Enter your company name here.",
						"id" => "footer_cr",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "Facebook",
						"desc" => "Insert your facebook URL here.",
						"id" => "footer_facebook",
						"std" => "",
						"type" => "text");												
						
	$options[] = array( "name" => "Twitter",
						"desc" => "Insert your link to the twitter page here.",
						"id" => "footer_twitter",
						"std" => "",
						"type" => "text");																								
						
	$options[] = array( "name" => "Google Analytics Code",
						"desc" => "You can paste your Google Analytics or other tracking code in this box.",
						"id" => "go_code",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Style Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Custom CSS",
						"desc" => "Add css to modify the theme here instead of adding it to style.css file.",
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea");						
						
															
	return $options;
}