<?php
//include class file
require_once ('application_functions.php');

$themename = "application";
$shortname = "tm";

$categories = get_categories('hide_empty=0');
$cats_all = array();
foreach ($categories as $category_list ) {
       $cats_all[$category_list->cat_ID] = $category_list->cat_name;
}

$pages = get_pages();
$pages_all = array();
foreach ($pages as $page_list ) {
       $pages_all[$page_list->ID] = $page_list->post_title;
}

$options = array (
 
array( "name" => $themename." Options",
	"type" => "title"),
	
//Navigation//
//////////////////////////////////////////////////////////////////////////////////////////	

array( "name" => "Navigation",
	"type" => "section"),
array( "type" => "open"),

array(	"name" => "Menu Pages",
		"desc" => "Hide all pages",
		"id" => $shortname."_menu_bar",
		"std" => '',
		"type" => "checkbox"),
		
array(	"name" => "Menu Categories",
		"desc" => "Hide all categories",
		"id" => $shortname."_cat_bar",
		"std" => '',
		"type" => "checkbox"),
		
array( "name" => "save",
	"type" => "savebutton"),		

//Footer settings//
//////////////////////////////////////////////////////////////////////////////////////////

array( "type" => "close"),

array( "name" => "Footer",
	"type" => "section"),
array( "type" => "open"),
	
array( "name" => "Footer copyright text",
	"desc" => "Enter your company name here.",
	"id" => $shortname."_footer_text",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box.",
	"id" => $shortname."_go_code",
	"type" => "textarea",
	"std" => ""),
	
array( "name" => "save",
	"type" => "savebutton"),
	
//follow//
//////////////////////////////////////////////////////////////////////////////////////////
array( "type" => "close"),

array( "name" => "Follow links",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Feedburner URL",
	"desc" => "Insert your Feedburner URL here.",
	"id" => $shortname."_feedburner",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Twitter",
	"desc" => "Insert your link to the twitter page here.",
	"id" => $shortname."_twitter",
	"type" => "text",
	"std" => ""),	
	
array( "name" => "save",
	"type" => "savebutton"),		
		
array( "type" => "close")
 
);

?>