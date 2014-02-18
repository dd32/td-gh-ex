<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'desc' => __('Phone number that appears on top bar.', 'options_check'),
		'id' => 'top_bar_phone',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array( 
		"name" => "Site header logo",
		"desc" => "Height 280px, width 72px max. Upload logo for header",
		"id" => "itrans_logo_image",
		"type" => "upload");
		
	$options[] = array(
		'name' => "Color Scheme",
		'desc' => "Images for layout.",
		'id' => "itrans_color_scheme",
		'std' => "blue",
		'type' => "images",
		'options' => array(
			'blue' => $imagepath . 'blue.png',		
			'red' => $imagepath . 'red.png',
			'green' => $imagepath . 'green.png',
			'yellow' => $imagepath . 'yellow.png',			
			'purple' => $imagepath . 'purple.png')
	);		
				
	$options[] = array(
		'name' => __('Social Links ', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Facebook', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_social_facebook',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Twitter', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_social_twitter',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Pinterest', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_social_pinterest',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Flickr', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_social_flickr',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('RSS', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_social_feed',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_social_instagram',
		'std' => '',
		'type' => 'text');
		
	/* Sliders */
	$options[] = array(
		'name' => __('Slider', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Slide1 Title', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide1_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slide1 Description', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide1_desc',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Slide1 Link text', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide1_linktext',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide1 Link URL', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide1_linkurl',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slide1 Image', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide1_image',
		'std' => '',
		'type' => 'upload');


	$options[] = array(
		'name' => __('Slide2 Title', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide2_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slide2 Description', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide2_desc',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Slide2 Link text', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide2_linktext',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide2 Link URL', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide2_linkurl',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slide2 Image', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide2_image',
		'std' => '',
		'type' => 'upload');



	$options[] = array(
		'name' => __('Slide3 Title', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide3_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slide3 Description', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide3_desc',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Slide3 Link text', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide3_linktext',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide3 Link URL', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide3_linkurl',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slide3 Image', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide3_image',
		'std' => '',
		'type' => 'upload');



	$options[] = array(
		'name' => __('Slide4 Title', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide4_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slide4 Description', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide4_desc',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Slide4 Link text', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide4_linktext',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide4 Link URL', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide4_linkurl',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slide4 Image', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'itrans_slide4_image',
		'std' => '',
		'type' => 'upload');


	return $options;
}