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
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	
	
	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
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
	
	// Typography Options
	$typography_options_main = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial','Arial text' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);
	
	// Define Array
	// ===================================================
		// Show Post 
		$post_array = array(
			'one' => __('1', 'options_framework_theme'),
			'two' => __('2', 'options_framework_theme'),
			'three' => __('3', 'options_framework_theme'),
			'four' => __('4', 'options_framework_theme'),
			'five' => __('5', 'options_framework_theme'),
			'six' => __('6', 'options_framework_theme'),
			'seven' => __('7', 'options_framework_theme'),
			'eight' => __('8', 'options_framework_theme'),
			'nine' => __('9', 'options_framework_theme'),
			'ten' => __('10', 'options_framework_theme')
		);
		
		// Multicheck Defaults
		$multicheck_defaults_post = array(
			'one' => '1',
			'two' => '1',
			'three' => '1',
			'four' => '1',
			'five' => '1',
		);
		
		// Multicheck Array Post Meta
		$multicheck_array_post = array(
			'one' => __('Author', 'options_framework_theme'),
			'two' => __('Date', 'options_framework_theme'),
			'three' => __('Categories', 'options_framework_theme'),
			'four' => __('Comments ', 'options_framework_theme'),
			'five' => __('Tags', 'options_framework_theme')
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
		
		// HomePage Display
		$homepage_display = array(
			'one' => __('Latest posts - Blog Layout', 'options_framework_theme'),
			'two' => __('Custom Home Page', 'options_framework_theme'),
			'three' => __('Select Page for HomePage', 'options_framework_theme'),
		);
	
	//===================================================
	
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/admin/images/';

	$options = array();
	
	// General
	// ===================================================
	$options[] = array(
		'name' => __('General', 'options_framework_theme'),
		'type' => 'heading');
		
		// Custom Favicon
		$options[] = array(
			'name' => __('Custom Favicon', 'options_framework_theme'),
			'desc' => __('Upload a 16x16px Png/Gif image that will be your 	favicon.', 'options_framework_theme'),
			'id' => 'custom_favicon',
			'type' => 'upload');
			
		// Apple touch icon
		$options[] = array(
			'name' => __('Apple touch icon', 'options_framework_theme'),
			'desc' => __('Upload a 129x129px Png/Gif image that will be your 	Apple touch icon.', 'options_framework_theme'),
			'id' => 'apple_touch_icon',
			'type' => 'upload');
			
		// Custom CSS
		$options[] = array(
			'name' => __('Custom CSS', 'options_framework_theme'),
			'desc' => __('Want to add any custom CSS code? Put in here.', 'options_framework_theme'),
			'id' => 'custom_css',
			'std' => '',
			'type' => 'textarea');
			
		// Custom JavaScript
		$options[] = array(
			'name' => __('Custom JavaScript', 'options_framework_theme'),
			'desc' => __('You can paste your JavaScript code in this box. This will be automatically added to the footer.', 'options_framework_theme'),
			'id' => 'custom_javascript',
			'std' => '',
			'type' => 'textarea');
			
		// Page Comment
		$options[] = array(
			'name' => __('Page Comment', 'options_framework_theme'),
			'desc' => __('Comments on pages. Uncheck if you want to hide Page Comment.', 'options_framework_theme'),
			'id' => 'page_comment',
			'std' => '1',
			'type' => 'checkbox');
			
		// Breadcrumbs
		$options[] = array(
			'name' => __('Breadcrumbs', 'options_framework_theme'),
			'desc' => __('Breadcrumbs settings. Uncheck if you want to hide Breadcrumbs.', 'options_framework_theme'),
			'id' => 'breadcrumbs',
			'std' => '1',
			'type' => 'checkbox');
		
		// Social Icon Links
		$options[] = array(
			'name' => __('Social Icon Links', 'options_framework_theme'),
			'desc' => __('Add your social URL here', 'options_framework_theme'),
			'type' => 'info');
			
			// Facebook URL
			$options[] = array(
			'name' => __('Facebook URL', 'options_framework_theme'),
			'desc' => __('Facebook URL', 'options_framework_theme'),
			'id' => 'facebook_url',
			'std' => '',
			'type' => 'text');
			
			// Google Plus URL
			$options[] = array(
			'name' => __('Google Plus URL', 'options_framework_theme'),
			'desc' => __('Google Plus URL', 'options_framework_theme'),
			'id' => 'googleplus_url',
			'std' => '',
			'type' => 'text');
			
			// LinkedIn URL
			$options[] = array(
			'name' => __('LinkedIn URL', 'options_framework_theme'),
			'desc' => __('LinkedIn URL', 'options_framework_theme'),
			'id' => 'linkedin_url',
			'std' => '',
			'type' => 'text');
			
			// Twitter URL
			$options[] = array(
			'name' => __('Twitter URL', 'options_framework_theme'),
			'desc' => __('Twitter URL', 'options_framework_theme'),
			'id' => 'twitter_url',
			'std' => '',
			'type' => 'text');
			
			// YouTube URL
			$options[] = array(
			'name' => __('YouTube URL', 'options_framework_theme'),
			'desc' => __('YouTube URL', 'options_framework_theme'),
			'id' => 'youtube_url',
			'std' => '',
			'type' => 'text');
			
			
			
	// Header
	// ===================================================
	$options[] = array(
		'name' => __('Header', 'options_framework_theme'),
		'type' => 'heading');
		// Custom Logo
		$options[] = array(
			'name' => __('Enable Custom Logo', 'options_framework_theme'),
			'desc' => __('Click here to Enable Custom Logo', 'options_framework_theme'),
			'id' => 'check_custom_logo',
			'type' => 'checkbox');
		
		// Upload custom logo
		$options[] = array(
			'name' => __('Upload Custom Logo', 'options_framework_theme'),
			'desc' => __('This option is hidden unless activated by a checkbox click.', 'options_framework_theme'),
			'id' => 'check_custom_logo_enable',
			'class' => 'hidden',
			'type' => 'upload');
		
		// Site Description
		$options[] = array(
			'name' => __('Site Description', 'options_framework_theme'),
			'desc' => __('If you want to hide the description just uncheck it.', 'options_framework_theme'),
			'id' => 'site_des_check',
			'std' => '1',
			'type' => 'checkbox');
			
		// Site Title
		$options[] = array(
			'name' => __('Site Title', 'options_framework_theme'),
			'desc' => __('If you want to hide the description just uncheck it.', 'options_framework_theme'),
			'id' => 'site_title_check',
			'std' => '1',
			'type' => 'checkbox');
		
		// Site Title color
		$options[] = array(
			'name' => __('Site Title color', 'options_framework_theme'),
			'desc' => __('You can change the site title color.', 'options_framework_theme'),
			'id' => 'site_title_color',
			'std' => '',
			'type' => 'color' );
		
		// Site Description color
		$options[] = array(
			'name' => __('Site Description color', 'options_framework_theme'),
			'desc' => __('You can change the site description color.', 'options_framework_theme'),
			'id' => 'site_des_color',
			'std' => '',
			'type' => 'color' );
		
		
		// Top Header Email
			$options[] = array(
			'name' => __('Top Header Email', 'options_framework_theme'),
			'desc' => __('Top Header Email', 'options_framework_theme'),
			'id' => 'top_header_email',
			'std' => 'contact@domain.com',
			'type' => 'text');
		
		// Top Header Phone
			$options[] = array(
			'name' => __('Top Header Phone', 'options_framework_theme'),
			'desc' => __('Top Header Phone', 'options_framework_theme'),
			'id' => 'top_header_phone',
			'std' => '',
			'type' => 'text');
			
	// Homepage Settings
	// ===================================================
	/*$options[] = array(
		'name' => __('Home', 'options_framework_theme'),
		'type' => 'heading');
		
		// HomePage Display
		$options[] = array(
			'name' => __('HomePage Display', 'options_framework_theme'),
			'desc' => __('HomePage Display', 'options_framework_theme'),
			'id' => 'example_radio',
			'std' => 'two',
			'type' => 'radio',
			'options' => $homepage_display);
			
		// Select Page For Homepage
		$options[] = array(
		'name' => __('Selec Page For Homepage', 'options_framework_theme'),
		'desc' => __('Selec Page For Homepage', 'options_framework_theme'),
		'id' => 'home_select_page',
		'type' => 'select',
		'options' => $options_pages);
		
		// Slider
		$options[] = array(
			'name' => __('Slider', 'options_framework_theme'),
			'desc' => __('Check to show Slider on home.', 'options_framework_theme'),
			'id' => 'slider_home',
			'std' => '0',
			'type' => 'checkbox');
		
		// Top Call of Action
		$options[] = array(
			'name' => __('Top Call of Action', 'options_framework_theme'),
			'desc' => __('Check to show Top Call of Action on home.', 'options_framework_theme'),
			'id' => 'top_call_of_action_home',
			'std' => '0',
			'type' => 'checkbox');
		
			// Top Call of Action Text
			$options[] = array(
			'name' => __('Call of Action Text', 'options_framework_theme'),
			'desc' => __('Call of Action Text.', 'options_framework_theme'),
			'id' => 'top_call_of_action_text',
			'std' => '',
			'type' => 'textarea');
			
			// Top Call of Action Button Text Left
			$options[] = array(
			'name' => __('Call of Action Button Text Left', 'options_framework_theme'),
			'desc' => __('Call of Action Button Text Left.', 'options_framework_theme'),
			'id' => 'cfa_btn_left',
			'std' => '',
			'class' => 'mini',
			'type' => 'text');
			
			// Top Call of Action Button Text Left url
			$options[] = array(
			'name' => __('Call of Action Button Text Left url', 'options_framework_theme'),
			'desc' => __('Call of Action Button Text Left url.', 'options_framework_theme'),
			'id' => 'cfa_btn_left_url',
			'std' => '',
			'type' => 'text');
			
			// Top Call of Action Button Text Right 
			$options[] = array(
			'name' => __('Call of Action Button Text Right', 'options_framework_theme'),
			'desc' => __('Call of Action Button Text Right.', 'options_framework_theme'),
			'id' => 'cfa_btn_right',
			'std' => '',
			'class' => 'mini',
			'type' => 'text');
			
			// Top Call of Action Button Text Right url
			$options[] = array(
			'name' => __('Call of Action Button Text Right url', 'options_framework_theme'),
			'desc' => __('Call of Action Button Text Right url.', 'options_framework_theme'),
			'id' => 'cfa_btn_left_url',
			'std' => '',
			'type' => 'text');
			
		// Show Blog On HomePage
		$options[] = array(
			'name' => __('Show blog post on HomePage', 'options_framework_theme'),
			'desc' => __('Check to show blog post on HomePage.', 'options_framework_theme'),
			'id' => 'show_blog_post_home',
			'std' => '1',
			'type' => 'checkbox');
		
		// Featured Area
		// Services Area
		// Blog Post
		// Testimonials Area
		// Partners Area
		// Twitter Area
		// Bottom Call of Action
		*/
	// Blog Settings
	// ===================================================
	/*
	$options[] = array(
		'name' => __('Blog', 'options_framework_theme'),
		'type' => 'heading');
		
		// Blog Post Count
		$options[] = array(
			'name' => __('Post Show In Blog', 'options_framework_theme'),
			'desc' => __('Post Show In Blog', 'options_framework_theme'),
			'id' => 'post_show_blog',
			'std' => 'five',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $post_array);
		
		// Select Category for Slider
		if ( $options_categories ) {
		$options[] = array(
			'name' => __('Select Category for Slider', 'options_framework_theme'),
			'desc' => __('Select Category for Slider', 'options_framework_theme'),
			'id' => 'blog_slider_category',
			'type' => 'select',
			'options' => $options_categories);
		}
		
		// Select Tag
		if ( $options_tags ) {
		$options[] = array(
			'name' => __('Select Tag', 'options_check'),
			'desc' => __('Passed an array of tags with term_id and term_name', 'options_check'),
			'id' => 'blog_slider_tags',
			'type' => 'select',
			'options' => $options_tags);
		}
		
		// Post Meta Settings
		$options[] = array(
			'name' => __('Post Meta Settings', 'options_framework_theme'),
			'desc' => __('Post Meta Settings', 'options_framework_theme'),
			'id' => 'post_meta_check',
			'std' => $multicheck_defaults_post, // These items get checked by default
			'type' => 'multicheck',
			'options' => $multicheck_array_post);
		
		// Share Post Settings
		// Related Posts Settings
		// jQuery Comments Settings
		*/
	// Archives Settings
	// ===================================================
	/*
	$options[] = array(
		'name' => __('Archives', 'options_framework_theme'),
		'type' => 'heading');
		
		// 
		/*
		$options[] = array(
			'name' => __('Input Radio (one)', 'options_framework_theme'),
			'desc' => __('Radio select with default options "one".', 'options_framework_theme'),
			'id' => 'example_radio',
			'std' => 'one',
			'type' => 'radio',
			'options' => $test_array); *//*
		
		// Blog Post Count
		$options[] = array(
			'name' => __('Post Show In Blog', 'options_framework_theme'),
			'desc' => __('Post Show In Blog', 'options_framework_theme'),
			'id' => 'post_show_archive',
			'std' => 'five',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $post_array);
		
		// Select Category for Slider
		if ( $options_categories ) {
		$options[] = array(
			'name' => __('Select Category for Slider', 'options_framework_theme'),
			'desc' => __('Select Category for Slider', 'options_framework_theme'),
			'id' => 'archive_slider_category',
			'type' => 'select',
			'options' => $options_categories);
		}
		
		// Archive Meta Settings
		$options[] = array(
			'name' => __('Archive Meta Settings', 'options_framework_theme'),
			'desc' => __('Archive Meta Settings', 'options_framework_theme'),
			'id' => 'archive_meta_check',
			'std' => $multicheck_defaults_post, // These items get checked by default
			'type' => 'multicheck',
			'options' => $multicheck_array_post);
		
	*/
	// Typography Settings
	// ===================================================
	/*
	$options[] = array(
		'name' => __('Typography', 'options_framework_theme'),
		'type' => 'heading');
		
		// General Typography
		$options[] = array(
			'name' => __('General Typography', 'options_framework_theme'),
			'desc' => __('General Typography.', 'options_framework_theme'),
			'id' => "general_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
		
		// Top Header Typography
		$options[] = array(
			'name' => __('Top Header Typography', 'options_framework_theme'),
			'desc' => __('Used header.', 'options_framework_theme'),
			'id' => "top_header_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
		
		// Logo Typography
		$options[] = array(
			'name' => __('Logo Typography', 'options_framework_theme'),
			'desc' => __('Logo Typography.', 'options_framework_theme'),
			'id' => "logo_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
			
		// TagLine Typography
		$options[] = array(
			'name' => __('TagLine Typography', 'options_framework_theme'),
			'desc' => __('TagLine Typography.', 'options_framework_theme'),
			'id' => "logo_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
			
		// Top Menu Typography
		$options[] = array(
			'name' => __('Top Menu Typography', 'options_framework_theme'),
			'desc' => __('Top Menu Typography.', 'options_framework_theme'),
			'id' => "top_menu_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
		
		// Heading Typography
		$options[] = array(
			'name' => __('Heading Font', 'options_framework_theme'),
			'desc' => __('Heading Font', 'options_framework_theme'),
			'id' => "heading_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
		
		// Post Title Typography
		$options[] = array(
			'name' => __('Post Title Typography', 'options_framework_theme'),
			'desc' => __('Post Title Typography', 'options_framework_theme'),
			'id' => "post_title_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
			
		// Post Meta Typography
		$options[] = array(
			'name' => __('Post Meta Typography', 'options_framework_theme'),
			'desc' => __('Post Meta Typography', 'options_framework_theme'),
			'id' => "post_meta_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
		
		// Widget Title Typography
		$options[] = array(
			'name' => __('Widget Title Typography', 'options_framework_theme'),
			'desc' => __('Widget Title Typography', 'options_framework_theme'),
			'id' => "widget_title_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
		
		// Footer Menu Typography
		$options[] = array(
			'name' => __('Footer Menu Typography', 'options_framework_theme'),
			'desc' => __('Select Footer Menu Typography', 'options_framework_theme'),
			'id' => "footer_menu_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
			
		// Footer Menu Typography
		$options[] = array(
			'name' => __('Footer Menu Typography', 'options_framework_theme'),
			'desc' => __('Footer Menu Typography', 'options_framework_theme'),
			'id' => "footer_menu_typography",
			'std' => $typography_defaults,
			'type' => 'typography',
			'options' => $typography_options_main );
		
		// Footer Copyright Typography
		$options[] = array( 'name' => __('Footer Copyright Typography', 'options_framework_theme'),
			'desc' => __('Footer Copyright Typography.', 'options_framework_theme'),
			'id' => "footer_copyright_typography",
			'std' => $typography_defaults,
			'type' => 'typography' );

		// 
		*/
	// Layout Settings
	// ===================================================
	/*
	$options[] = array(
		'name' => __('Layout', 'options_framework_theme'),
		'type' => 'heading');
		
		// Home Page Layout
		$options[] = array(
			'name' => "Home Page Layout",
			'desc' => "Home Page Layout.",
			'id' => "home_layout",
			'std' => "2c-r-fixed",
			'type' => "images",
			'options' => array(
				'1col-fixed' => $imagepath . '1col.png',
				'2c-l-fixed' => $imagepath . '2cl.png',
				'2c-r-fixed' => $imagepath . '2cr.png')
		);
		
		// Blog Page Layout
		$options[] = array(
			'name' => "Blog Page Layout",
			'desc' => "Blog Page Layout.",
			'id' => "blog_layout",
			'std' => "2c-l-fixed",
			'type' => "images",
			'options' => array(
				'1col-fixed' => $imagepath . '1col.png',
				'2c-l-fixed' => $imagepath . '2cl.png',
				'2c-r-fixed' => $imagepath . '2cr.png')
		);
		// Archives Page Layout
		$options[] = array(
			'name' => "Archives Page Layout",
			'desc' => "Archives Page Layout.",
			'id' => "archive_layout",
			'std' => "2c-l-fixed",
			'type' => "images",
			'options' => array(
				'1col-fixed' => $imagepath . '1col.png',
				'2c-l-fixed' => $imagepath . '2cl.png',
				'2c-r-fixed' => $imagepath . '2cr.png')
		);
		// Single Post Layout
		$options[] = array(
			'name' => "Single Post Layout",
			'desc' => "Single Post Layout.",
			'id' => "single_post_layout",
			'std' => "2c-l-fixed",
			'type' => "images",
			'options' => array(
				'1col-fixed' => $imagepath . '1col.png',
				'2c-l-fixed' => $imagepath . '2cl.png',
				'2c-r-fixed' => $imagepath . '2cr.png')
		);
		// Single Page Layout
		$options[] = array(
			'name' => "Single Page Layout",
			'desc' => "Single Page Layout.",
			'id' => "single_page_layout",
			'std' => "2c-l-fixed",
			'type' => "images",
			'options' => array(
				'1col-fixed' => $imagepath . '1col.png',
				'2c-l-fixed' => $imagepath . '2cl.png',
				'2c-r-fixed' => $imagepath . '2cr.png')
		);
	*/
	// Style Settings
	// ===================================================
	/*
	$options[] = array(
		'name' => __('Style', 'options_framework_theme'),
		'type' => 'heading');
		
		// Body Background
		$options[] = array(
			'name' =>  __('Body Background', 'options_framework_theme'),
			'desc' => __('Body Background CSS.', 'options_framework_theme'),
			'id' => 'body_background',
			'std' => $background_defaults,
			'type' => 'background' );
		
		// Global main Color
		$options[] = array(
			'name' => __('Global main Color', 'options_framework_theme'),
			'desc' => __('Select Global main Color.', 'options_framework_theme'),
			'id' => 'global_main_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
			
		// Highlighted Text Color
		$options[] = array(
			'name' => __('Highlighted Text Color', 'options_framework_theme'),
			'desc' => __('Select Highlighted Text Color', 'options_framework_theme'),
			'id' => 'highlight_text_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
			
		// Links Color
		$options[] = array(
			'name' => __('Links Color', 'options_framework_theme'),
			'desc' => __('Select Links Color.', 'options_framework_theme'),
			'id' => 'global_link_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
			
		// Links Hover Color
		$options[] = array(
			'name' => __('Links Hover Color', 'options_framework_theme'),
			'desc' => __('Select Links Hover Color.', 'options_framework_theme'),
			'id' => 'global_link_hover_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
			
		// Top Navigation Background
		$options[] = array(
			'name' => __('Top Navigation Background', 'options_framework_theme'),
			'desc' => __('Select Top Navigation Background.', 'options_framework_theme'),
			'id' => 'top_menu_bg_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
		
		// Top Navigation link color
		$options[] = array(
			'name' => __('Top Navigation link color', 'options_framework_theme'),
			'desc' => __('Top Navigation link color.', 'options_framework_theme'),
			'id' => 'top_menu_link_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
			
		// Top Navigation link hover color
		$options[] = array(
			'name' => __('Top Navigation link hover color', 'options_framework_theme'),
			'desc' => __('Top Navigation link hover color.', 'options_framework_theme'),
			'id' => 'top_menu_link_hover_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
		
		// Sidebar Background
		$options[] = array(
			'name' =>  __('Sidebar Background', 'options_framework_theme'),
			'desc' => __('Sidebar Background', 'options_framework_theme'),
			'id' => 'sidebar_background',
			'std' => $background_defaults,
			'type' => 'background' );
			
		// Sidebar Title color
		$options[] = array(
			'name' => __('Sidebar Title color', 'options_framework_theme'),
			'desc' => __('Sidebar Title color.', 'options_framework_theme'),
			'id' => 'sidebar_title_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
		
		// Footer Title Color
		$options[] = array(
			'name' => __('Footer Title Color', 'options_framework_theme'),
			'desc' => __('Footer Title Color.', 'options_framework_theme'),
			'id' => 'footer_title_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
		
		// Footer link Color
		$options[] = array(
			'name' => __('Footer link Color', 'options_framework_theme'),
			'desc' => __('Footer link Color', 'options_framework_theme'),
			'id' => 'footer_link_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
			
		// Footer link hover Color
		$options[] = array(
			'name' => __('Footer link hover Color', 'options_framework_theme'),
			'desc' => __('Footer link hover Color.', 'options_framework_theme'),
			'id' => 'footer_link_hover_color',
			'std' => '#8D8D8D',
			'type' => 'color' );
		
		// Footer Background
		$options[] = array(
			'name' =>  __('Footer Background', 'options_framework_theme'),
			'desc' => __('Footer Background', 'options_framework_theme'),
			'id' => 'footer_background',
			'std' => $background_defaults,
			'type' => 'background' );
	*/
	// Footer Settings
	// ===================================================
	$options[] = array(
		'name' => __('Footer', 'options_framework_theme'),
		'type' => 'heading' );
		
		// Footer Social Icon Background Color
		$options[] = array(
			'name' => __('Footer Social Icon Background Color', 'options_framework_theme'),
			'desc' => __('Change Your Footer Social Icon Background Color', 'options_framework_theme'),
			'id' => 'footer_sicon_bg_color',
			'std' => '',
			'type' => 'color' );
		
		// Footer Social Icon Background hover Color
		$options[] = array(
			'name' => __('Footer Social Icon Background hover Color', 'options_framework_theme'),
			'desc' => __('Change Your Footer Social Icon Background hover Color', 'options_framework_theme'),
			'id' => 'footer_sicon_bg_hover_color',
			'std' => '',
			'type' => 'color' );
		
		// Footer Social Icon link Color
		$options[] = array(
			'name' => __('Footer Social Icon link Color', 'options_framework_theme'),
			'desc' => __('Change Your Footer Social Icon link Color', 'options_framework_theme'),
			'id' => 'footer_sicon_link_color',
			'std' => '',
			'type' => 'color' );
		
		// Footer Social Icon link hover Color
		$options[] = array(
			'name' => __('Footer Social Icon link hover Color', 'options_framework_theme'),
			'desc' => __('Change Your Footer Social Icon link hover Color', 'options_framework_theme'),
			'id' => 'footer_sicon_link_hover_color',
			'std' => '',
			'type' => 'color' );
		
		/**
		 * For $settings options see:
		 * http://codex.wordpress.org/Function_Reference/wp_editor
		 *
		 * 'media_buttons' are not supported as there is no post to attach items to
		 * 'textarea_name' is set by the 'id' you choose
		 */

		$wp_editor_settings = array(
			'wpautop' => true, // Default
			'textarea_rows' => 5,
			'tinymce' => array( 'plugins' => 'wordpress' )
		);

		$options[] = array(
			'name' => __('Footer Copyright', 'options_framework_theme'),
			'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_framework_theme' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
			'id' => 'footer_copyright',
			'type' => 'editor',
			'settings' => $wp_editor_settings );
	
	// Contact Page Settings
	// ===================================================
	/*
	$options[] = array(
		'name' => __('Contact', 'options_framework_theme'),
		'type' => 'heading');
		
		// Dialog Contact
		$options[] = array(
			'name' => __('Custom contact page settings', 'options_framework_theme'),
			'desc' => __('Set your custom contact page.', 'options_framework_theme'),
			'type' => 'info');
		
		// Selec Page For Contact
			$options[] = array(
			'name' => __('Selec Page For Contact', 'options_framework_theme'),
			'desc' => __('Selec Page For Contact', 'options_framework_theme'),
			'id' => 'contact_select_page',
			'type' => 'select',
			'options' => $options_pages);
			
		// Google Map Code
			$options[] = array(
			'name' => __('Google Map Code', 'options_framework_theme'),
			'desc' => __('Google Map Code.', 'options_framework_theme'),
			'id' => 'gmap_contact_page',
			'std' => '',
			'type' => 'textarea');
		*/
	// Info Settings
	// ===================================================
	/*
	$options[] = array(
		'name' => __('Info', 'options_framework_theme'),
		'type' => 'heading');
	
		$options[] = array(
			'name' => __('Example Info', 'options_framework_theme'),
			'desc' => __('', 'options_framework_theme'),
			'type' => 'info');

	*/
	return $options;
}