<?php
/**
 * Searchlight Options Page
 * @ Copyright: D5 Creation, All Rights, www.d5creation.com
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = 'searchlight';
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}
function optionsframework_options() {
	
	
// General Options
		$options[] = array(
		'name' => __('Searchlight Options', 'searchlight'), 
		'type' => 'heading');
		
	$options[] = array(
		'desc' => '<div class="infohead"><span class="donation">'. __('A Theme is an effort of many sleepless nights of Developers. You can contribute on this development translating this theme in your Language. You can send your translation/language file to us, ','searchlight').' <a href="http://d5creation.com/contact/" target="_blank"><strong>'. __('Contact Us.','searchlight') .'</a> '. __('You can inspire us writing a ','searchlight').'<a href="http://wordpress.org/support/view/theme-reviews/searchlight" target="_blank">'.__('Positive Review','searchlight').'</a> '.__('of our Theme.','searchlight').'</span><br /><br /><span class="donation"> '. __('Need More Features and Options including Exciting Multi Layer Slide, Unlimited Slides with layered Effects, Unlimited Featured Boxes, Color Changing Options, Easy Translation Option and 100+ Advanced Features? Try','searchlight').' <a href="http://d5creation.com/theme/searchlight/" target="_blank"><strong>Searchlight Extend</strong></a>.</span><br /> <br /><span class="donation"> '. __('You can Visit the Searchlight Extend Demo ','searchlight').' <a href="http://demo.d5creation.com/themes/?theme=simplify" target="_blank"><strong>'. __('Here','searchlight').'</strong></a>.</span><a href="http://d5creation.com/theme/searchlight/" target="_blank" class="extendlink"> </a></div>',
		'type' => 'info');
		
		
	$options[] = array(
		'name' => __('Banner Image', 'searchlight'),
		'desc' => __('You can upload a Banner Image for your site here', 'searchlight'), 
		'id' => 'banner-image',
		'std' => get_template_directory_uri() . '/images/banner.jpg',
		'type' => 'upload' );	
		
	$options[] = array(
		'name' => __('Fixed Header?', 'searchlight'),
		'desc' => __('Uncheck it if you do not want to show the Header Fixed. Default is Fixed.', 'searchlight'), 
		'id' => 'header-fixed',
		'std' => '1',
		'type' => 'checkbox' );	
	
	$options[] = array(
		'name' => __("Site Layout", 'searchlight'),
		'desc' => __("You can set the Site Layout for Whole the Site.", 'searchlight'),
		'id' => "site-layout",
		'std' => "2c-r-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => get_template_directory_uri() . '/images/1col.png',
			'2c-l-fixed' => get_template_directory_uri() . '/images/2cl.png',
			'2c-r-fixed' => get_template_directory_uri() . '/images/2cr.png')
	);

	$options[] = array(
		'name' => __('Contact Number', 'searchlight'),
		'desc' => __('Set Your Contact Number', 'searchlight'),
		'id' => 'contactnumber',
		'std' => '(000) 111-222',
		'type' => 'text',
		'class' => 'mini');	


// 	Color Settings

	$options[] = array(
		'desc' => '<span class="featured-area-title">'. __('Site Colors', 'searchlight') .'</span>', 
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Use This Customized Design', 'searchlight'), 
		'desc' => __('Check this box if you want to use the following Custom Style Code', 'searchlight'), 
		'id' => 'colorcssaccept',
		'std' => '0',
		'type' => 'checkbox' );	
	
	$options[] = array(
		'name' => __('Color 01', 'searchlight'), 
		'desc' => __('Change the Color', 'searchlight'). ' <b>#149755</b>', 
		'id' => 'color1',
		'std' => '#149755',
		'type' => 'color' );
	
	$options[] = array(
		'name' => __('Color 02', 'searchlight'), 
		'desc' => __('Change the Color', 'searchlight'). ' <b>#05D24D</b>', 
		'id' => 'color2',
		'std' => '#05D24D',
		'type' => 'color' );
	
	$options[] = array(
		'name' => __('Color 03', 'searchlight'), 
		'desc' => __('Change the Color', 'searchlight'). ' <b>#03D56B</b>', 
		'id' => 'color3',
		'std' => '#03D56B',
		'type' => 'color' );
		

// Social Links	
	$options[] = array(
		'desc' => '<span class="featured-area-title">'. __('Social Links', 'searchlight') .'</span>', 
		'type' => 'info');

		
	foreach (range(1, 5 ) as $numslinksn) {
		
	$options[] = array(
		'name' => __('Social Link - ', 'searchlight'). $numslinksn, 
		'desc' => __('Input Your Social Page Link. Example: <b>http://profiles.wordpress.org/d5creation</b>.  If you do not want to show anything here leave the box blank. This Version supports only WordPress, Dribbble, Github, Tumblr, YouTube, Flickr, Vimeo, Instagram, Codepen and LinkedIn', 'searchlight'), 
		'id' => 'sl' . $numslinksn,
		'std' => 'http://wordpress.org',
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
