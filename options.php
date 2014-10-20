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
 * If you are making your theme translatable, you should replace 'optimize'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_optimize
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'3' => __('3', 'optimize'),
		'5' => __('5', 'optimize'),
		'6' => __('6', 'optimize'),
		'8' => __('8', 'optimize'),
		'10' => __('10', 'optimize')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'optimize'),
		'two' => __('Pancake', 'optimize'),
		'three' => __('Omelette', 'optimize'),
		'four' => __('Crepe', 'optimize'),
		'five' => __('Waffle', 'optimize')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);
	

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
    'desc' => '<h2 style="color: #FFF !important;">' . esc_attr__( 'Upgrade to Premium Theme & Enable Full Features!', 'optimize' ) . '</h2>
            <li>' . esc_attr__( 'SEO Optimized WordPress Theme.', 'optimize' ) . '</li>
            <li>' . esc_attr__( 'More Slides for your slider.', 'optimize' ) . '</li>
            <li>' . esc_attr__( 'Theme Customization help & Support Forum.', 'optimize' ) . '</li>
            <li>' . esc_attr__( 'Page Speed Optimize for better result.', 'optimize' ) . '</li>
            <li>' . esc_attr__( 'Color Customize of theme.', 'optimize' ) . '</li>
            <li>' . esc_attr__( 'Custom Widgets and Functions.', 'optimize' ) . '</li>
            <li>' . esc_attr__( 'Social Media Integration.', 'optimize' ) . '</li>
            <li>' . esc_attr__( 'Responsive Website Design.', 'optimize' ) . '</li>
            <li>' . esc_attr__( 'Different Website Layout to Select.', 'optimize' ) . '</li>
            <li>' . esc_attr__( 'Many of Other customize feature for your blog or website.', 'optimize' ) . '</li>
            <p><span class="buypre"><a href="' . esc_url(__('http://www.insertcart.com/optimize/','optimize')) . '" target="_blank">' . esc_attr__( 'Upgrade Now', 'optimize' ) . '</a></span><span class="buypred"><a href="' . esc_url(__('http://www.insertcart.com/','optimize')) . '" target="_blank">' . esc_attr__( 'Shop More Themes !', 'optimize' ) . '</a></span></p>',
            'class' => 'tesingh',
            'type' => 'info');
	$options[] = array(
		'name' => __('Basic Settings', 'optimize'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Custom Favicon URL', 'optimize'),
		'desc' => __('Enter Favicon Image URL Specify a 16px x 16px image.', 'optimize'),
		'id' => 'optimize_favicon',
		'std' => '',
		'type' => 'upload');
	$options[] = array(
		'name' => __('Upload Site Logo', 'optimize'),
		'desc' => __('Upload Website Logo here. Note you can upload any size it will automatic resize .', 'optimize'),
		'id' => 'optimize_logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Show Author Profile', 'optimize'),
		'desc' => __('Check the box to show Author Profile Below the Post and Pages.', 'optimize'),
		'id' => 'optimize_author',
		'std' => '',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Latest Posts in Sidebar', 'optimize'),
		'desc' => __('Show 5 Latest Posts with Thumbnail in Sidebar.', 'optimize'),
		'id' => 'optimize_activate_ltposts',
		'std' => '1',
		'type' => 'checkbox');


				
$options[] = array(
		'name' => __('Custom Styling', 'optimize'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Custom CSS', 'optimize'),
		'desc' => __('Quickly add some CSS to your theme by adding it to this block.', 'optimize'),
		'id' => 'optimize_customcss',
		'std' => '',
		'type' => 'textarea');
		
$options[] = array(
		'name' => __('Ads Management', 'optimize'),
		'type' => 'heading');
	 $options[] = array(
		'name' => __( 'AD Code For Top Baner', 'optimize' ),
		'desc' => __('Paste Ad Code for top banner.', 'optimize'),
            'id' => 'optimize_ad1',
            'std' => '',
            'type' => 'textarea');
	$options[] = array(
		'name' => __('Paste Ads code below navigation', 'optimize'),
		'desc' => __('Activate Ads Space Below Navigation and put code in below test field.', 'optimize'),
		'id' => 'optimize_banner_top',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		 'name' => __( 'AD Code For Single Post', 'optimize' ),
            'desc' => __('Paste Ad code for single post it show ads below post title and before content.','optimize'),
            'id' => 'optimize_ad2',
            'std' => '',
            'type' => 'textarea');
   	
		
$options[] = array(
		'name' => __('Advance Options (Pro Only)', 'optimize'),
		'type' => 'heading');
			
				
		$options[] = array(
		'desc' => '<span class="pre-title">New Features</span>', 
		'type' => 'info');
		
		$options[] = array(
		'name' => __('Popular Posts in Sidebar', 'optimize'),
		'desc' => __('Display Popular Post Sidebar Widget.', 'optimize'),
		'id' => 'optimize_popular',
		'std' => '0',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Numbers of Latest and Popular posts to display)', 'optimize'),
		'desc' => __('<b>For Latest Posts</b>', 'optimize'),
		'id' => 'optimize_latestpostnumber',
		'std' => '5',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array(
		'desc' => __('<b>For Popular Posts</b>', 'optimize'),
		'id' => 'optimize_popularpostnumber',
		'std' => '5',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array(
		'name' => __('Social Share Buttons with count', 'optimize'),
		'desc' => __('Display social share buttons with count below post title.', 'optimize'),
		'id' => 'optimize_flowshare',
		'std' => '0',
		'type' => 'checkbox');
		
		$options[] = array(
		'name' => __('Responsive Website Design', 'optimize'),
		'desc' => __('Enable Responsive Design for you website to increase experience on Mobile Devices', 'optimize'),
		'id' => 'optimize_responsive',
		'std' => '0',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Excerpt Length (Number of words display in post description)', 'optimize'),
		'desc' => __('Number of words display in every post description Default is 45.', 'optimize'),
		'id' => 'optimize_excerp',
		'std' => '45',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array(
		'name' => __('Change Link Color', 'optimize'),
		'desc' => __('Select Links Color.', 'optimize'),
		'id' => 'optimize_linkcolor',
		'std' => '#2D89A7',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Change Link Hover Color.', 'optimize'),
		'id' => 'optimize_linkhover',
		'std' => '#FD4326',
		'type' => 'color' );
		
		$options[] = array(
		'desc' => __('Main Navigation Background.', 'optimize'),
		'id' => 'optimize_mainnavibg',
		'std' => '#F5F5F5',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Main Navigation hover Color.', 'optimize'),
		'id' => 'optimize_mainnavilinkcolor',
		'std' => '#FD4326',
		'type' => 'color' );
		$options[] = array(
		'name' => __('Main Navigation Colors', 'optimize'),
		'desc' => __('Navigation border Shadow color.', 'optimize'),
		'id' => 'optimize_botborder',
		'std' => '#FD4326',
		'type' => 'color' );
		$options[] = array(
		'name' => __('Home Icon from Main Navigation', 'optimize'),
		'desc' => __('Show or Hide Home Icon.', 'optimize'),
		'id' => 'optimize_homeicon',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		
		$options[] = array(
		'name' => __('Page Number Navigation Color Change ', 'optimize'),
		'desc' => __('Change Current Page Background.', 'optimize'),
		'id' => 'optimize_pageanvibg',
		'std' => '#333333',
		'type' => 'color' );
		$options[] = array(
			'desc' => __('Change background color of other pages.', 'optimize'),
		'id' => 'optimize_pageanvia',
		'std' => '#FD4326',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Numbers text Color Change.', 'optimize'),
		'id' => 'optimize_pageanvilink',
		'std' => '#ffffff',
		'type' => 'color' );
		
		$options[] = array( 'name' => __('Customize Theme Fonts', 'optimize'),
		'desc' => __('Change <b>Body (Theme) Font</b> color and Size.', 'optimize'),
		'id' => "optimize_bodyfonts",
		'std' => $typography_defaults,
		'type' => 'typography' );
		$options[] = array( 
		'desc' => __('Change <b>H1 Posts and Pages Title </b>Font color or Size.', 'optimize'),
		'id' => "optimize_entrytitle",
		'std' => $typography_entrytitle,
		'type' => 'typography' );
		$options[] = array(
		'name' => __('Footer Widget Area Settings', 'optimize'),
		'desc' => __('Show or Hide Footer Widget Area.', 'optimize'),
		'id' => 'optimize_footerwidget',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
				
		$options[] = array(
		'name' => __('Edit ""Continue reading" Button', 'optimize'),
		'desc' => __('Show or Hide "Continue reading" or Read more Button  Button .', 'optimize'),
		'id' => 'optimize_countinue',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(
		'desc' => __('Continue reading Button Color Change.', 'optimize'),
		'id' => 'optimize_readmorecolor',
		'std' => '#FD4326',
		'type' => 'color' );					
		$options[] = array(
		    'desc' => 'Paste You Custom text for Continue reading <b>Default: Continue reading &raquo; </b>.',
            'id' => 'optimize_fullstory',
            'std' => 'Continue reading &raquo;',
            'type' => 'text');				

		$options[] = array(
		'name' => "Website layout",
		'desc' => "Select Images for Website layout.",
		'id' => "optimize_layout",
		'std' => "s1",
		'type' => "images",
		'options' => array(
			's1' => $imagepath . 's1.png',
			'sl' => $imagepath . 'sl.png',
			'fc' => $imagepath . 'fc.png')
	);
		$options[] = array(
		'desc' => '<span class="pre-titleseo">SEO & Meta Options</span>', 
		'type' => 'info');
		$options[] = array(
		'name' => __('Google+ Publisher URL', 'optimize'),
		'desc' => __('Paste Your Google Publisher URL https://plus.google.com/YOUR-GOOGLE+ID/posts.', 'optimize'),
		'id' => 'optimize_googlepub',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Bing Site Verification', 'optimize'),
		'desc' => __('Enter the ID only. It will be verified by Yahoo as well.', 'optimize'),
		'id' => 'optimize_bingvari',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Google Site verification', 'optimize'),
		'desc' => __('Enter your ID only.', 'optimize'),
		'id' => 'optimize_googlevari',
		'std' => '',
		'type' => 'text');
		
		
		$options[] = array(
		'desc' => '<span class="pre-titlecus">Customization</span>', 
		'type' => 'info');
		$options[] = array(
		'name' => __('Breadcrumbs Options', 'optimize'),
		'desc' => __('Check Box to Enable or Disable Breadcrumbs.', 'optimize'),
		'id' => 'optimize_bread',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Enable Post Meta Info.', 'optimize'),
		'desc' => __('Check Box to Show or Hide Tags ', 'optimize'),
		'id' => 'optimize_tags',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'desc' => __('Check Box to Show or Hide Comments ', 'optimize'),
		'id' => 'optimize_comments',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'desc' => __('Check Box to Show or Hide Categories ', 'optimize'),
		'id' => 'optimize_categrious',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'desc' => __('Check Box to Show or Hide Author and date ', 'optimize'),
		'id' => 'optimize_autodate',
		'std' => '1',
		'type' => 'checkbox');
			
		$options[] = array(
		'name' => __('Next and Previous Post Link', 'optimize'),
		'desc' => __('Show or Hide Next and Previous Post Link below every post.', 'optimize'),
		'id' => 'optimize_links',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(
		'name' => __('Show or Hide Copy Right Text', 'optimize'),
		'desc' => __('Show or Hide Copyright Text and Link.', 'optimize'),
		'id' => 'optimize_copyright',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(
		    'desc' => 'Paste Ad code for single post it show ads below post title and before content.',
            'id' => 'optimize_ftarea',
            'std' => '&#169; 2013 Designed by: <a href="http://www.wrock.org/seo-optimized-wordpress-theme/" title="wRock.Org">wRock.Org</a> | Powered by <a href="http://wordpress.org/">WordPress</a>',
            'type' => 'textarea');				

	return $options;
}