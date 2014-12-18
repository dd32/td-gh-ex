<?php
/**
 * SPARK Options Page
 * @ Copyright: D5 Creation, All Rights, www.d5creation.com
 */

function optionsframework_option_name() {

	// Change this to use your theme slug
	return 'spark';
}
function optionsframework_options() {
	
	
//	General Options
	$options[] = array(
		'name' => __('SPARK Options', 'spark'), 
		'type' => 'heading');
		
	$options[] = array(
		'desc' => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can <a href="https://wordpress.org/support/view/theme-reviews/spark-press" target="_blank"><strong>Review Here</strong></a>.</span><br /><br /><br /><span class="donation"> Need More Features and Options including 3D Slides, Unlimited Slide Images, Links from Featured Boxes and 100+ Advanced Features and Controls? Try <a href="http://d5creation.com/theme/spark/" target="_blank"><strong>SPARK Extend</strong></a></span><br /> <br /><br /><span class="donation"> You can Visit the SPARK Extend <a href="http://demo.d5creation.com/themes/?theme=SPARK" target="_blank"><strong>DEMO 1</strong></a> and <a href="http://demo.d5creation.com/themes/?theme=SPARK-2" target="_blank"><strong>DEMO 2</strong></a></span><a href="http://d5creation.com/theme/spark/" target="_blank" class="extendlink"> </a></div>',
		'type' => 'info');
	

	$options[] = array(
		'name' => __('Front Page Heading', 'spark'), 
		'desc' => __('Input your heading text here.  Please limit it within 30 Letters.', 'spark'), 
		'id' => 'heading_text',
		'std' => __('Welcome to the SPARK WordPress Theme!', 'spark'), 
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Front Page Heading Description', 'spark'),  
		'desc' => __('Input your heading description here. Please limit it within 100 Letters.', 'spark'),  
		'id' => 'heading_des',
		'std' => __('You can use SPARK Extend Theme for more options, more functions and more visual elements. Extend Version has come with simple color customization option.', 'spark'), 
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Banner Image', 'spark'), 
		'desc' => __('Upload a Banner Image. 1050px X 400px image is recommended', 'spark'), 
		'id' => 'slide-image1',
		'std' => get_template_directory_uri() . '/images/slide-image/slide-image1.jpg',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => '<span class="featured-area-sub-title">'. __('FEATURED BOXES', 'spark') .'</span>', 
		'type' => 'info');

	$options[] = array(
		'desc' => '<span class="featured-area-title">'. __('First Row Featured Boxs', 'spark') .'</span>', 
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Show First Row Featured Boxs', 'spark'),
		'desc' => __('Uncheck this if you do not want to show the First Row Featured Boxs', 'spark'), 
		'id' => 'frfbox',
		'std' => '1',
		'type' => 'checkbox' );	
	
	$options[] = array(
		'name' => __('Row Subject', 'spark'), 
		'desc' => __('Input your Row Title Here', 'spark'),
		'id' => 'featuredr-title',
		'std' => 'Recent Works',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Row Description', 'spark'), 
		'desc' => __('Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive. You can also input any HTML, Videos or iframe here. But please keep in mind about the limitation of width of the box.', 'spark'), 
		'id' => 'featuredr-description',
		'std' => 'The Color changing options of SPARK will give the WordPress Driven Site an attractive look.',
		'type' => 'textarea' );
		

	foreach (range(1, 3 ) as $fbsinumber) {
		
	$options[] = array(
		'desc' => '<b>FEATURED BOX: ' . $fbsinumber . '</b>',
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Image', 'spark'), 
		'desc' => __('Upload an image for the Featured Box. 230px X 115px image is recommended.  If you do not want to show anything here leave the box blank.', 'spark'), 
		'id' => 'featured-image' . $fbsinumber,
		'std' => get_template_directory_uri() . '/images/featured-image' . $fbsinumber . '.jpg',
		'type' => 'upload');	
	
	$options[] = array(
		'name' => __('Title', 'spark'), 
		'desc' => __('Input your Featured Title here. Please limit it within 30 Letters. If you do not want to show anything here leave the box blank.', 'spark'), 
		'id' => 'featured-title'  . $fbsinumber,
		'std' => 'SPARK WordPress Theme for Business',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Description', 'spark'), 
		'desc' => __('Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive. You can also input any HTML, Videos or iframe here. But Please keep in mind about the limitation of Width of the box.', 'spark'), 
		'id' => 'featured-description' . $fbsinumber,
		'std' => 'The Color changing options of SPARK will give the WordPress Driven Site an attractive look. SPARK is super elegant and Professional Responsive Theme which will create the business widely expressed.',
		'type' => 'textarea' );

	}
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">'. __('Second Row Featured Boxs', 'spark') .'</span>', 
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Row Subject', 'spark'), 
		'desc' => __('Input your Row Title Here.', 'spark'), 
		'id' => 'featuredrsecond-title',
		'std' => 'Our Services',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Row Description', 'spark'),
		'desc' => __('Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive. You can also input any HTML, Videos or iframe here. But Please keep in mind about the limitation of Width of the box.', 'spark'), 
		'id' => 'featuredrsecond-description',
		'std' => 'SPARK is super elegant and Professional Responsive Theme which will create the business widely expressed.',
		'type' => 'textarea' );
		
	foreach (range(1, 3 ) as $fbsinumber) {
	
	$options[] = array(
		'desc' => '<b>FEATURED BOX: ' . $fbsinumber . '</b>',
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Title', 'spark'), 
		'desc' => __('Input your Featured Title here. Please limit it within 30 Letters. If you do not want to show anything here leave the box blank.', 'spark'), 
		'id' => 'featured-title2' . $fbsinumber,
		'std' => 'SPARK Theme for Business',
		'type' => 'text'); 
	
	$options[] = array(
		'name' => __('Description', 'spark'), 
		'desc' => __('Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive. You can also input any HTML, Videos or iframe here. But Please keep in mind about the limitation of Width of the box.', 'spark'), 
		'id' => 'featured-description2' . $fbsinumber,
		'std' => ' SPARK is super elegant and Professional Responsive Theme which will create the business widely expressed. The Color changing options of SPARK will give the WordPress Driven Site an attractive look.',
		'type' => 'textarea' );

	}
	
	$options[] = array(
		'desc' => '<span class="featured-area-sub-title">'. __('STAFF   BOXES', 'spark') .'</span>', 
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Staff Boxes Heading', 'spark'), 
		'desc' => __('Set the Staff Boxes Heading', 'spark'), 
		'id' => 'staffboxes-heading',
		'std' => 'WE ARE INSIDE',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Staff Boxes Heading Description', 'spark'), 
		'desc' => __('Set the Staff Boxes Heading description', 'spark'), 
		'id' => 'staffboxes-heading-des',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
		'type' => 'textarea');
		
	foreach (range(1, 6 ) as $staffboxsnumber) {
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">Staff Box: ' . $staffboxsnumber . '</span>', 
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Staff Image', 'spark'), 
		'desc' => __('Uoload the Staff Image. The Sample Image is 300px X 200px', 'spark'), 
		'id' => 'staffboxes-image' . $staffboxsnumber,
		'std' => get_template_directory_uri() . '/images/stf.jpg',
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('Name', 'spark'), 
		'desc' => __('Staff Name', 'spark'), 
		'id' => 'staffboxes-title' . $staffboxsnumber,
		'std' => 'OUR PROUD STAFF '. $staffboxsnumber,
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Designation', 'spark'), 
		'desc' => __('Input the Designation', 'spark'), 
		'id' => 'staffboxes-description' . $staffboxsnumber,
		'std' => 'Service Executive',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Social Link', 'spark'), 
		'desc' => __('Input Your Social Page Link. Example: <b>http://profiles.wordpress.org/d5creation</b>.  If you do not want to show anything here leave the box blank. This Version supports only WordPress, Dribbble, Github, Tumblr, Flickr, Vimeo, Codepen and LinkedIn', 'spark'), 
		'id' => 'staffboxes-linka' .$staffboxsnumber,
		'std' => 'http://profiles.wordpress.org/d5creation',
		'type' => 'text');	
	
	$options[] = array(
		'id' => 'staffboxes-linkb' . $staffboxsnumber,
		'std' => 'http://profiles.wordpress.org/d5creation',
		'type' => 'text');	
		
	$options[] = array(
		'id' => 'staffboxes-linkc' . $staffboxsnumber,
		'std' => 'http://profiles.wordpress.org/d5creation',
		'type' => 'text');			

	$options[] = array(
		'name' => 'Profile Link', 
		'desc' => 'Input the Staff Profile URL here.', 
		'id' => 'staffboxes-link' . $staffboxsnumber,
		'std' => '#',
		'type' => 'text');
		
	}
	
// Social Links	
	$options[] = array(
		'desc' => '<span class="featured-area-sub-title">'. __('SOCIAL   LINKS', 'spark') .'</span>', 
		'type' => 'info');
		
	foreach (range(1, 5 ) as $numslinksn) {
		
	$options[] = array(
		'name' => 'Social Link - '. $numslinksn, 
		'desc' => __('Input Your Social Page Link. Example: <b>http://profiles.wordpress.org/d5creation</b>.  If you do not want to show anything here leave the box blank. This Version supports only WordPress, Dribbble, Github, Tumblr, Flickr, Vimeo, Codepen and LinkedIn', 'spark'),  
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
