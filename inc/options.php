<?php
/**
 * Socialia Options Page
 * @ Copyright: D5 Creation, All Rights, www.d5creation.com
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = 'd5_socialia_pro';
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
	
	$options[] = array(
		'name' => 'General Options',
		'type' => 'heading');
		
	$options[] = array(
		'desc' => '<div class="infohead"><span class="donation">If you like this FREE Theme You can consider for a small Donation to us. Your Donation will be spent for the Disadvantaged Children and Students. You can visit our <a href="http://d5creation.com/donate/" target="_blank"><strong>DONATION PAGE</strong></a> and Take your decision.</span><br /><br /><span class="donation"> We appreciate an <a href="http://wordpress.org/support/view/theme-reviews/d5-socialia" target="_blank">Honest Review</a> of this Theme if you Love our Work.</span><br /> 
		<span class="donation"> Need More Features and Options including Exciting Slide and 100+ Advanced Features? Try <a href="http://d5creation.com/theme/socialia/" target="_blank"><strong>Socialia Extend</strong></a>.</span><br /> <br /><span class="donation"> You can Visit the Socialia Extend Demo <a href="http://demo.d5creation.com/wp/themes/d5socialia/" target="_blank"><strong>Here</strong></a>.</span></div>',
		'type' => 'info');
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">SLIDING IMAGES</span>',
		'type' => 'info');
			
	foreach (range(1, 12) as $opsinumber) {
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">' . 'Sliding Image - ' . $opsinumber . '</span>',
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Sliding Image',
		'desc' => 'Upload an Sliding Image. 950px X 300px image is recommended. Please upload an optimized image for smooth running of the slides.',
		'id' => 'slide-image-'. $opsinumber,
		'std' => get_template_directory_uri() . '/images/slides/(' . $opsinumber . ').jpg',
		'type' => 'upload');
		
	$options[] = array(
		'name' => 'Slide Image Title', 
		'desc' => 'Slide Title will go here. It should be limited within 100 Letters.', 
		'id' => 'slide-image-' . $opsinumber .'-title',
		'std' => 'Slide Image ' . $opsinumber .' Title | Welcome to D5 Socialia Theme, Visit D5 Creation for Details',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Image Description',
		'desc' => 'Input the Description of the Image. Please limit the words within 50 so that the layout should be clean and attractive.',
		'id' => 'slide-image-' . $opsinumber . '-description',
		'std' => 'D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.',
		'type' => 'text');

	$options[] = array(
		'name' => 'Image Link',
		'desc' => 'Input the URL where the image will redirect the visitors.',
		'id' => 'slide-image-' . $opsinumber . '-link',
		'std' => '#',
		'type' => 'text');
	}
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">SOCIAL LINKS</span>',
		'type' => 'info');
			
	$options[] = array(
		'name' => 'Facebook Link',
		'desc' => 'Input your Facebook URL here.',
		'id' => 'facebook_link',
		'std' => 'http://facebook.com/d5creation',
		'type' => 'text');

	$options[] = array(
		'name' => 'Twitter Link',
		'desc' => 'Input your Twitter URL here.',
		'id' => 'twitter_link',
		'std' => 'http://twitter.com/d5creation',
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