<?php
/**
 * Smartia Options Page
 * @ Copyright: D5 Creation, All Rights, www.d5creation.com
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = 'smartia';
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'design'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */


function optionsframework_options() {
	
	add_filter( 'wp_default_editor', create_function('', 'return "html";') );
	
	$wp_editor_settings = array(
		'wpautop' => false, // Default
		'textarea_rows' => 5,
		'editor_css' => '<style>.wp-editor-tools, .quicktags-toolbar { display:none; hidden; height:0px;} </style>',
		'quicktags' => true
	);	

	$options[] = array(
		'name' => 'Smartia Options',
		'type' => 'heading');
		
	$options[] = array(
		'desc' => '<div class="infohead"><span class="donation">If you like this FREE Theme You can consider for a small Donation to us. Your Donation will be spent for the Disadvantaged Children and Students. You can visit our <a href="http://d5creation.com/donate/" target="_blank"><strong>DONATION PAGE</strong></a> and Take your decision.</span><br /><br /><span class="donation"> We appreciate an <a href="http://wordpress.org/support/view/theme-reviews/d5-smartia" target="_blank">Honest Review</a> of this Theme if you Love our Work.</span><br /> 
		<span class="donation"> Need More Features and Options including Exciting Slide and 100+ Advanced Features? Try <a href="http://d5creation.com/theme/smartia/" target="_blank"><strong>Smartia Extend</strong></a>.</span><br /> <br /><span class="donation"> You can Visit the Smartia Extend Demo <a href="http://demo.d5creation.com/wp/themes/d5smartblog/" target="_blank"><strong>Here</strong></a>.</span></div>',
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Header Left Ad Code',
		'desc' => 'You can input any Custom HTML Code Here. The Box size is 180px X 150px',
		'id' => 'adcodel',
		'std' => '<a href="#" target="_blank"><img src="'.get_template_directory_uri() . '/images/bannerad.jpg'. '" /></a>',
		'type' => 'editor',
		'settings' => $wp_editor_settings );	
		
	$options[] = array(
		'name' => 'Header Right Ad Code',
		'desc' => 'You can input any Custom HTML Code Here. The Box size is 180px X 150px',
		'id' => 'adcoder',
		'std' => '<a href="#" target="_blank"><img src="'.get_template_directory_uri() . '/images/bannerad.jpg'. '" /></a>',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
	$options[] = array(
		'name' => 'Blog Index Page Top Ad Code',
		'desc' => 'You can input any Custom HTML Code Here.',
		'id' => 'adcodebi',
		'std' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
	$options[] = array(
		'name' => 'Single Page Top Ad Code',
		'desc' => 'You can input any Custom HTML Code Here.',
		'id' => 'adcodesp',
		'std' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
	
	foreach (range(1,2) as $opsinumber) {
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">' . 'Sliding Image - ' . $opsinumber . '</span>',
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Sliding Image',
		'desc' => 'Upload an Sliding Image. Minimum 1300px X 390px or ratio image is recommended. Please upload an optimized image for smooth running of the slides.',
		'id' => 'slide-image-'. $opsinumber,
		'std' => get_template_directory_uri() . '/images/slides/(' . $opsinumber . ').jpg',
		'type' => 'upload');
		
	$options[] = array(
		'name' => 'Slide Image Title', 
		'desc' => 'Slide Title will go here. It should be limited within 100 Letters.', 
		'id' => 'slide-image-' . $opsinumber .'-title',
		'std' => 'Slide Image ' . $opsinumber .' Title | Welcome to D5 Smartia Theme, Visit D5 Creation for Details',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Image Description',
		'desc' => 'Input the Description of the Image. Please limit the words within 50 so that the layout should be clean and attractive.',
		'id' => 'slide-image-' . $opsinumber . '-description',
		'std' => 'You can use D5 Smartia for Black and White looking Smart Blogging, Personal or Corporate Websites.  This is a Sample Description and you can change these from Samrtia Options.',
		'type' => 'textarea');

	}

	$options[] = array(
		'name' => 'Linked In Link',
		'desc' => 'Input your Linked In URL here.',
		'id' => 'lin_link',
		'std' => 'http://d5creation.com',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'You Tube Link',
		'desc' => 'Input your You Tube URL here.',
		'id' => 'ytube_link',
		'std' => 'http://d5creation.com',
		'type' => 'text');
	
	$options[] = array(
		'name' => 'Blog/News Link',
		'desc' => 'Input your Blog/News URL here.',
		'id' => 'blog_link',
		'std' => 'http://d5creation.com/news',
		'type' => 'text');
		
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