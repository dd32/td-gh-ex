<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'promax'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'promax'),
		'two' => __('Two', 'promax'),
		'three' => __('Three', 'promax'),
		'four' => __('Four', 'promax'),
		'five' => __('Five', 'promax')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'promax'),
		'two' => __('Pancake', 'promax'),
		'three' => __('Omelette', 'promax'),
		'four' => __('Crepe', 'promax'),
		'five' => __('Waffle', 'promax')
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
		'name' => __('Basic Settings', 'promax'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Custom Favicon URL', 'promax'),
		'desc' => __('Enter Favicon Image URL in .ico format .', 'promax'),
		'id' => 'promax_favicon',
		'std' => '',
		'type' => 'text');
	

	$options[] = array(
		'name' => __('Show Author Profile', 'promax'),
		'desc' => __('Check the box to show Author Profile Below the Post and Pages.', 'promax'),
		'id' => 'promax_author',
		'std' => '',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Popular Posts in Sidebar', 'promax'),
		'desc' => __('Check the box to Show Popular Posts with Thumbnail in Sidebar.', 'promax'),
		'id' => 'promax_popular',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'name' => __('Show Popular Posts in Sidebar', 'promax'),
		'desc' => __('Check the box to Show 5 Latest Posts below navigation', 'promax'),
		'id' => 'promax_latest',
		'std' => '1',
		'type' => 'checkbox');

		
$options[] = array(
		'name' => __('Social Media', 'promax'),
		'type' => 'heading');
		
		$options[] = array(
		'name' => __('Facebook Link', 'promax'),
		'desc' => __('Enter your Facebook URL if you have one.', 'promax'),
		'id' => 'fb',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Twitter Follow Link', 'promax'),
		'desc' => __('Enter your Twitter URL if you have one.', 'promax'),
		'id' => 'tw',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('YouTube Channel Link', 'promax'),
		'desc' => __('Enter your YouTube URL if you have one.', 'promax'),
		'id' => 'yt',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Google+ URL', 'promax'),
		'desc' => __('Enter your Google+ Link if you have one.', 'promax'),
		'id' => 'gp',
		'std' => '',
		'type' => 'text');

		
$options[] = array(
		'name' => __('Custom Styling', 'promax'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Custom CSS', 'promax'),
		'desc' => __('Quickly add some CSS to your theme by adding it to this block.', 'promax'),
		'id' => 'promax_customcss',
		'std' => '',
		'type' => 'textarea');
		
$options[] = array(
		'name' => __('Ads Management', 'promax'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Paste Ads code for header.', 'promax'),
		'desc' => __('Enter your ads code here, preferably units Ex. 728*90 lead-board ad.', 'promax'),
		'id' => 'banner_top',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		 'name' => __( 'AD Code For Single Post', 'promax' ),
            'desc' => 'Paste Ad code for single post it show ads below post title and before content.',
            'id' => 'promax_ad2',
            'std' => '',
            'type' => 'textarea');
     $options[] = array(
		'name' => __( 'AD Code For Footer', 'promax' ),
            'desc' => 'Paste Ad Code for Footer Area.',
            'id' => 'promax_ad1',
            'std' => '',
            'type' => 'textarea');	
		


	return $options;
}