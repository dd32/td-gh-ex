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
		'3' => __('3', 'promax'),
		'5' => __('5', 'promax'),
		'6' => __('6', 'promax'),
		'8' => __('8', 'promax'),
		'10' => __('10', 'promax')
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
	

	// Typography Defaults
	$typography_defaults = array(
		'size' => '13px',
		'face' => 'false',
		'style' => 'normal',
		'color' => '#555555' );
	$typography_entrytitle = array(
		'size' => '28px',
		'face' => 'false',
		'style' => 'normal',
		'color' => '#555555' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => false,
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
		'desc' => sprintf( __( '<h2 style="color: #FFF !important;">Upgrade to Premium Theme & Enable Full Features!</h2>
		<li>SEO Optimized WordPress Theme.</li>
		<li><a href="https://developers.google.com/speed/pagespeed/insights">Page Speed</a>Optimize for better result.</li>
		<li>Color Customize of theme.</li>
		<li>Custom Widgets and Functions.</li>
		<li>Social Media Integration.</li>
		<li>Responsive Website Design.</li>
		<li>Different Website Layout to Select.</li>
		<li>Many of Other customize feature for your blog or website.</li>
		<p><span class="buypre"><a href="http://www.wrock.org/product/promax-premium-theme/">Upgrade Now</a></span><span class="buypred"><a href="http://www.wrock.org/shop/">Shop More Themes !</a></span></p>'),'promax'),
		'class' => 'tesingh',
		'type' => 'info');
	$options[] = array(
		'name' => __('Basic Settings', 'promax'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Custom Favicon URL', 'promax'),
		'desc' => __('Enter Favicon Image URL Specify a 16px by 16px image in .ico format .', 'promax'),
		'id' => 'promax_favicon',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Upload Site Logo', 'promax'),
		'desc' => __('Upload Website Logo to fit here. Note you can upload any size it will automatic resize .', 'promax'),
		'id' => 'promax_logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Show Author Profile', 'promax'),
		'desc' => __('Check the box to show Author Profile Below the Post and Pages.', 'promax'),
		'id' => 'promax_author',
		'std' => '',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Latest Posts Below Navigation', 'promax'),
		'desc' => __('Show 5 Latest Posts with Thumbnail (Only Premium User Customize).', 'promax'),
		'id' => 'promax_latest',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'name' => __('Show Popular Posts in Sidebar', 'promax'),
		'desc' => __('Check the box to Show Popular Posts with Thumbnail in Sidebar (Only Premium User Customize).', 'promax'),
		'id' => 'promax_popular',
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
		
$options[] = array(
		'name' => __('Premium Features', 'magazine'),
		'type' => 'heading');
				
		$options[] = array(
		'desc' => '<span class="pre-title">New Features</span>', 
		'type' => 'info');
		
		$options[] = array(
		'name' => __('Social Share Buttons with count', 'promax'),
		'desc' => __('Display social share buttons with count below post title.', 'promax'),
		'id' => 'promax_flowshare',
		'std' => '0',
		'type' => 'checkbox');
		
		$options[] = array(
		'name' => __('Responsive Website Design', 'promax'),
		'desc' => __('Enable Responsive Design for you website to increase exprience on Mobile Devices', 'promax'),
		'id' => 'promax_responsive',
		'std' => '0',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Excerpt Length (Number of words display in post description)', 'promax'),
		'desc' => __('Number of words display in every post description Default is 45.', 'promax'),
		'id' => 'promax_excerp',
		'std' => '25',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array(
		'name' => __('Numbers of Latest and Populat posts to display)', 'promax'),
		'desc' => __('<b>For Latest Posts</b>', 'promax'),
		'id' => 'promax_latestpostnumber',
		'std' => '5',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array(
		'desc' => __('<b>For Popular Posts</b>', 'promax'),
		'id' => 'promax_popularpostnumber',
		'std' => '5',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array(
		'name' => __('Home Icon from Top and Main Navigation', 'promax'),
		'desc' => __('Show or Hide Home Icon.', 'promax'),
		'id' => 'promax_homeicon',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		
		$options[] = array(	
		'name' =>  __('Customize Theme Background', 'promax'),
		'desc' => __('Header Background color.', 'promax'),
		'id' => 'promax_headerbg',
		'std' => '#343434',
		'type' => 'color' );
		
		$options[] = array(	
		'desc' => __('Footer Widget background color.', 'promax'),
		'id' => 'promax_ftwidget',
		'std' => '#343434',
		'type' => 'color' );
		
	
		$options[] = array(
		'name' => __('Change Link Color', 'promax'),
		'desc' => __('Select Links Color.', 'promax'),
		'id' => 'promax_linkcolor',
		'std' => '#2D89A7',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Change Link Hover Color.', 'promax'),
		'id' => 'promax_linkhover',
		'std' => '#FD4326',
		'type' => 'color' );
		
		$options[] = array(
		'name' => __('Main Navigation Colors', 'promax'),
		'desc' => __('Main Naigation Background.', 'promax'),
		'id' => 'promax_mainnavibg',
		'std' => '#5B89B8',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Main Navigation hover Color.', 'promax'),
		'id' => 'promax_mainnavilinkcolor',
		'std' => '#333333',
		'type' => 'color' );
		
		$options[] = array(	
		'desc' => __('Categories Navigation color.', 'promax'),
		'id' => 'promax_botborder',
		'std' => '#ffffff',
		'type' => 'color' );
		
		$options[] = array(	
		'desc' => __('Categories Navigation Hover color.', 'promax'),
		'id' => 'promax_topnavibgcolorh',
		'std' => '#E9E9E9',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('<b>Latest Posts and Breadcrumb</b> background Color change', 'promax'),
		'id' => 'promax_posthd',
		'std' => '#DC3030',
		'type' => 'color' );
		$options[] = array(
		    'desc' => 'Change Text of Latest Post.',
            'id' => 'promax_latestchange',
            'std' => 'Latest Posts',
            'type' => 'text');	
		$options[] = array(
		'name' => __('Edit Categories & date/author stamp from thumbnail', 'promax'),
		'desc' => __('Show or Hode Date & Author Stamp from Thumbnain in index and other archive pages .', 'promax'),
		'id' => 'promax_authstamp',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(				
		'desc' => __('Display Shadow of every post on main page .', 'promax'),
		'id' => 'promax_imagshadow',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(				
		'desc' => __('Show or Hode Categories Button from Thumbnain in index and other archive pages .', 'promax'),
		'id' => 'promax_homecat',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(
		'desc' => __('Categories Background Color Change.', 'promax'),
		'id' => 'promax_homecatbg',
		'std' => '#4DD247',
		'type' => 'color' );		
	
		$options[] = array(
		'name' => __('Page Number Navigation Color Chnage ', 'promax'),
		'desc' => __('Change Current Page Background.', 'promax'),
		'id' => 'promax_pageanvibg',
		'std' => '#333333',
		'type' => 'color' );
		$options[] = array(
			'desc' => __('Change backgroud color of other pages.', 'promax'),
		'id' => 'promax_pageanvia',
		'std' => '#5B89B8',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Numbers text Color Change.', 'promax'),
		'id' => 'promax_pageanvilink',
		'std' => '#ffffff',
		'type' => 'color' );
		$options[] = array(
		'name' => __('Other customize color & design', 'promax'),
		'desc' => __('Sidebar Widget hading background Color change', 'promax'),
		'id' => 'promax_sidebarbg',
		'std' => '#7EA8D3',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Latest Post widget Link Color', 'promax'),
		'id' => 'promax_latesta',
		'std' => '#4DD247',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('<b>Recent Posts and Breadcrumb</b> background Color change', 'promax'),
		'id' => 'promax_posthd',
		'std' => '#DC3030',
		'type' => 'color' );
		
		$options[] = array( 'name' => __('Customize Theme Fonts', 'promax'),
		'desc' => __('Change <b>Body (Theme) Font</b> color and Size.', 'promax'),
		'id' => "promax_bodyfonts",
		'std' => $typography_defaults,
		'type' => 'typography' );
		$options[] = array( 
		'desc' => __('Change <b>H1 Posts and Pages Title </b>Font color or Size.', 'promax'),
		'id' => "promax_entrytitle",
		'std' => $typography_entrytitle,
		'type' => 'typography' );
		$options[] = array(
		'name' => __('Footer Widget Area Settings', 'promax'),
		'desc' => __('Show or Hide Footer Widget Area.', 'promax'),
		'id' => 'promax_footerwidget',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
				
					
		$options[] = array(
		'name' => "Website layout",
		'desc' => "Select Images for Website layout.",
		'id' => "promax_layout",
		'std' => "s1",
		'type' => "images",
		'options' => array(
			's1' => $imagepath . 's1.png',
			's2' => $imagepath . 's2.png',
			
			)
	);
		$options[] = array(
		'desc' => '<span class="pre-titleseo">SEO & Meta Options</span>', 
		'type' => 'info');
		$options[] = array(
		'name' => __('Google+ Publisher URL', 'promax'),
		'desc' => __('Paste Your Google Publisher URL https://plus.google.com/YOUR-GOOGLE+ID/posts.', 'promax'),
		'id' => 'promax_googlepub',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Bing Site Verification', 'promax'),
		'desc' => __('Enter the ID only. It will be verified by Yahoo as well.', 'promax'),
		'id' => 'promax_bingvari',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Google Site varification', 'promax'),
		'desc' => __('Enter your ID only.', 'promax'),
		'id' => 'promax_googlevari',
		'std' => '',
		'type' => 'text');
		
		
		$options[] = array(
		'desc' => '<span class="pre-titlecus">Customization</span>', 
		'type' => 'info');
		$options[] = array(
		'name' => __('Breadcrumbs Options', 'promax'),
		'desc' => __('Check Box to Enable or Disable Breadcrumbs.', 'promax'),
		'id' => 'promax_bread',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Enable Post Meta Info.', 'promax'),
		'desc' => __('Check Box to Show or Hide Tags ', 'promax'),
		'id' => 'promax_tags',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'desc' => __('Check Box to Show or Hide Comments ', 'promax'),
		'id' => 'promax_comments',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'desc' => __('Check Box to Show or Hide Categories ', 'promax'),
		'id' => 'promax_categrious',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'desc' => __('Check Box to Show or Hide Author and date ', 'promax'),
		'id' => 'promax_autodate',
		'std' => '1',
		'type' => 'checkbox');
			
		$options[] = array(
		'name' => __('Next and Previous Post Link', 'promax'),
		'desc' => __('Show or Hide Next and Previous Post Link below every post.', 'promax'),
		'id' => 'promax_links',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(
		'name' => __('Show or Hide Copy Right Text', 'promax'),
		'desc' => __('Show or Hode Copyright Text and Link.', 'promax'),
		'id' => 'promax_copyright',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(
		    'desc' => 'Paste Ad code for single post it show ads below post title and before content.',
            'id' => 'promax_ftarea',
            'std' => 'Copyright  &#169; 2013 Designed by: <a href="http://www.wrock.org/promax" title="wRock.Org">wRock.Org</a> | Powered by <a href="http://wordpress.org/"> WordPress</a>',
            'type' => 'textarea');		

		
		
	return $options;
}