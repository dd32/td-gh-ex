<?php
/**
 * Selfie Options Page
 * @ Copyright: D5 Creation, All Rights, www.d5creation.com
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = 'selfie';
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}
function optionsframework_options() {
	
	$selfie_theme_data = wp_get_theme(); 
	$selfie_author_uri = $selfie_theme_data->get( 'AuthorURI' );
	$selfie_theme_uri = $selfie_theme_data->get( 'ThemeURI' );
	$selfie_author_uri_clean = parse_url($selfie_author_uri, PHP_URL_HOST);
	
	$options[] = array(
		'name' => __('Selfie Options', 'selfie'), 
		'type' => 'heading');
		
	$options[] = array(
		'desc' => '<div class="infohead"><span class="donation">'. __('If you like this FREE Theme You can consider for a small Donation to us. Your Donation will be spent for the Disadvantaged Children and Students. You can visit our', 'selfie') . ' <a href="'.$selfie_author_uri.'donate/" target="_blank"><strong>' . __('DONATION PAGE', 'selfie').'</strong></a> '. __('and Take your decision.', 'selfie').'</span><br /><br /><span class="donation"> '.__('We appreciate an', 'selfie').' <a href="http://wordpress.org/support/view/theme-reviews/selfie" target="_blank">'. __('Honest Review', 'selfie').'</a> '. __('of this Theme if you Love our Work.', 'selfie').'</span><br /> 
		<span class="donation">Selfie Extend '.__('is a Revolutionary One Page Theme with Hundreds of Features and Opportunities including Slides, Portfolio, Gallery, Services, Videos etc for Self Hosted WordPress Sites. Try', 'selfie').' <a href="'.$selfie_theme_uri.'" target="_blank"><strong>Selfie Extend</strong></a>.</span><br /> <br /><span class="donation"> '.__('You can Visit the', 'selfie').' Selfie Extend <a href="http://demo.'.$selfie_author_uri_clean.'/themes/?theme=Selfie" target="_blank"><strong>'.__('Demo Here', 'selfie').'</strong></a>.</span><a href="'.$selfie_theme_uri.'" target="_blank" class="extendlink"> </a></div>',
		'type' => 'info');

	$options[] = array(
		'name' => __('Contact Number', 'selfie'), 
		'desc' => __('Set Your Contact Number', 'selfie'), 
		'id' => 'contactnumber',
		'std' => '(000) 111-222',
		'type' => 'text',
		'class' => 'mini');	
		
	foreach (range(1, 5 ) as $numslinksn) {
		
	$options[] = array(
		'name' => __('Social Link - ', 'selfie'). $numslinksn, 
		'desc' => __('Input Your Social Page Link. Example: <b>http://profiles.wordpress.org/d5creation</b>.  If you do not want to show anything here leave the box blank. This Version supports only WordPress, Dribbble, Github, Tumblr, YouTube, Flickr, Vimeo, Instagram, Codepen and LinkedIn', 'selfie'),  
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
