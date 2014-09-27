<?php
/**
 * 	Writing Board Options Page
 * 	@Copyright: D5 Creation, All Rights, www.d5creation.com
 * 	Description: A framework for building theme options on Options Framework.
	Author: Devin Price
	Author URI: http://www.wptheming.com
	License: GPLv2
	Version: 1.3
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = 'writingboard';
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'writingboard'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */


function optionsframework_options() {
	
	// add_filter( 'wp_default_editor', create_function('', 'return "html";') ); 
	

	$options[] = array(
		'name' => 'Writing Board Options',
		'type' => 'heading');
		
	$options[] = array(
		'desc' => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can <a href="https://wordpress.org/support/view/theme-reviews/writing-board" target="_blank"><strong>Review Here</strong></a>.</span><br /><br /><span class="donation"> Need More Features and Options including Unlimited Slides and 100+ Advanced Features and Controls? Try <a href="http://d5creation.com/theme/writing-board/" target="_blank"><strong>Writing Board Extend</strong></a>.</span><br /> <br /><span class="donation"> You can Visit the Writing Board Extend Demo <a href="http://demo.d5creation.com/themes/?theme=Writing%20Board" target="_blank"><strong>Here</strong></a>.</span><a href="http://d5creation.com/theme/writing-board/" target="_blank" class="extendlink"> </a></div>',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Front Page Heading',
		'desc' => 'Input your heading text here. Plese limit it within 100 Letters. You can also input any HTML, Videos or iframe here. ',
		'id' => 'heading_text',
		'std' => 'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time',
		'type' => 'text' );


	foreach (range(1, 5 ) as $numslinksn) {
		
	$options[] = array(
		'name' => 'Social Link - '. $numslinksn, 
		'desc' => 'Input Your Social Page Link. Example: <b>http://profiles.wordpress.org/d5creation</b>.  If you do not want to show anything here leave the box blank. This Version supports only WordPress, Dribbble, Github, Tumblr, Flickr, Vimeo, Codepen and LinkedIn', 
		'id' => 'sl' . $numslinksn,
		'std' => '#',
		'type' => 'text');	
		
	}

		
	
	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<?php
}