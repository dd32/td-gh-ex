<?php
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 */

function optionsframework_options() {

	$imagepath =  get_template_directory_uri() . '/inc/panel/images/';

	// Web Layouts
	$web_layout = array(
		'full-width' => __( 'Full Width', 'accesspress-root' ),
		'boxed' => __( 'Boxed', 'accesspress-root' )
	);

	// Slider Transitions
	$transitions = array(
		'fade' => __('Fade', 'accesspress_parallax'),
		'horizontal' => __('Slide Horizontal', 'accesspress_parallax'),
		'vertical' => __('Slide Vertical', 'accesspress_parallax')
	);

	// Website Background Options
	$background_options = array(
		'none' => __('-- None --', 'accesspress_parallax'),
		'image' => __('Image', 'accesspress_parallax'),
		'color' => __('Color', 'accesspress_parallax'),
		'pattern' => __('Pattern', 'accesspress_parallax'),
	);

	//Background Pattern
	$background_pattern = array( 
		'pattern1' => $imagepath . 'patterns/80x80/pattern1.png',  
		'pattern2' => $imagepath . 'patterns/80x80/pattern2.png', 
		'pattern3' => $imagepath . 'patterns/80x80/pattern3.png', 
		'pattern4' => $imagepath . 'patterns/80x80/pattern4.png', 
		'pattern5' => $imagepath . 'patterns/80x80/pattern5.png',  
		'pattern6' => $imagepath . 'patterns/80x80/pattern6.png', 
		);

	//Sidebar layout
	$sidebar_layout = array(
		'left-sidebar' => $imagepath . 'left-sidebar.png', 
		'right-sidebar' => $imagepath . 'right-sidebar.png', 
		'both-sidebar' => $imagepath . 'both-sidebar.png',
		'no-sidebar' => $imagepath . 'no-sidebar.png',
		);

	// Website Background Options
	$blog_layout = array(
		'blog_layout1' => __('Blog Image Large', 'accesspress_parallax'),
		'blog_layout2' => __('Blog Image Medium', 'accesspress_parallax'),
		'blog_layout3' => __('Blog Image Alternate Medium', 'accesspress_parallax'),
		'blog_layout4' => __('Blog Full Content', 'accesspress_parallax'),
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
	$options_categories['0'] = "-- select category--";
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}


	// Pull all the categories into an array
	$options_categories_multicheck = array();
	$options_categories_multicheck_obj = get_categories();
	foreach ($options_categories_multicheck_obj as $category) {
		$options_categories_multicheck[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages['0'] = '-- select page --';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$about_content = "AccessPress Themes is an online WordPress themes store, that provides beautiful and useful themes. All of our themes are crafted with our years of experience. Our theme don't lack the basics and don't have a lot of non-sense features which you might never use. <br /><br /> AccessPress Themes has beautiful and elegant, fully responsive, multipurpose themes to meet your need for free and premium basis. Our themes have bunch of easily customizable options and features, someone with no programming knowledge can use our easy theme options panel and configure/setup the theme as needed. Our support is 24/7, even for the free themes! Turn around times are as less as 1 hour!";

	

	$options = array();
/* --------------------------GENERAL SETTINGS-------------------------- */
	$options[] = array(
		'name' => __( 'General Settings', 'accesspress-root' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Website Layout', 'accesspress-root' ),
		'id' => 'web_layout',
		'std' => 'full-width',
		'type' => 'select',
		'options' => $web_layout 
	);

	$options[] = array(
		'name' => __('Responsive', 'accesspress_parallax'),
		'id' => 'responsive',
		'on' => 'Enable',
		'off' => 'Disable',
		'std' => '1',
		'type' => 'switch');

	$options[] = array( 
		"name" => "Background",
		"desc" => "Image/Color/Pattern",
		"id" => "page_background_option",
		"std" => "none",
		"type" => "select",
		"options" => $background_options );

	$options[] = array( 
		"name" => "Background Image",
		"id" => "page_background_image",
		"class" =>"sub-option",
		"type" => "background",
		'std' => array(
			'image' => '',
			'repeat' => 'repeat',
			'position' => 'top center',
			'attachment'=>'scroll',
			'size' => 'auto' )
		);

	$options[] = array( 
		"name" => "Background Color",
		"desc" => "Color for the Background",
		"id" => "page_background_color",
		"std" => "#FFFFFF",
		"type" => "color" );

	$options[] = array(
		'name' => "Background Patterns",
		'id' => "page_background_pattern",
		'std' => "pattern1",
		'type' => "images",
		'options' => $background_pattern
	);

	$options[] = array(
		'name' => __( 'Upload Logo', 'accesspress-root' ),
		'id' => 'logo',
		'desc' => 'Standard size of the logo is 280X80px',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Upload Fav Icon', 'accesspress-root' ),
		'id' => 'fav_icon',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => "Single Post Layout",
		'id' => "single_post_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => $sidebar_layout
	);

	$options[] = array(
		'name' => "Single Page Layout",
		'id' => "single_page_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => $sidebar_layout
	);

	$options[] = array(
		'name' => "Archive Page Layout",
		'id' => "archive_page_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => $sidebar_layout
	);

	$options[] = array( 
		"name" => "Blog Post Layout",
		"id" => "blog_post_layout",
		"std" => "blog_layout1",
		"type" => "select",
		"options" => $blog_layout );

	$options[] = array(
		'name' => __('Exclude From Blog', 'options_framework_theme'),
		'desc' => __('Check the categories to exclude from blog page.', 'options_framework_theme'),
		'id' => 'exclude_from_blog',
		'type' => 'multicheck',
		'options' => $options_categories_multicheck);

/* --------------------------GENERAL SETTINGS-------------------------- */
	$options[] = array(
		'name' => __( 'Home Page Settings', 'accesspress-root' ),
		'type' => 'heading'
	);

	$home_order = of_get_option('home_order');
	if(empty($home_order)):
		$home_order = array(
			'text_slider' => '1', 
			'service_block' => '2',
			'call_to_action' => '3',
			'feature_block' => '4',
			'latest_post_block' => '5',
			'project_block' => '6',
	    	'testimonial_slider' => '7'
			);
	endif;

	foreach ($home_order as $key => $value) {
		if($key == 'text_slider'){
			$options[] = array(
			'name' => __( 'Text Slider', 'accesspress-root' ),
			'id'   => 'text_slider',
			'group'=> 'home_order', 
			'type' => 'groupstart'
			);

		if ( $options_categories ) {
			$options[] = array(
				'name' => __( 'Select a Category', 'accesspress-root' ),
				'desc' => __( 'Select the category for text slider.', 'accesspress-root' ),
				'id' => 'text_slider_cat',
				'type' => 'select',
				'options' => $options_categories
			);
		}

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'service_block'){
		$options[] = array(
			'name' => __( 'Service Block', 'accesspress-root' ),
			'id'   => 'service_block', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Service Section Title', 'accesspress-root' ),
			'id' => 'service_title',
			'std' => 'Service',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Service Section Desc', 'accesspress-root' ),
			'id' => 'service_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		for ($service_page_count = 1; $service_page_count <= 4; $service_page_count++) { 
			if ( $options_categories ) {
				$options[] = array(
					'name' => __( 'Service ', 'accesspress-root' ).$service_page_count,
					'id' => 'service'.$service_page_count,
					'type' => 'select',
					'options' => $options_pages
				);
			}
		}

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'call_to_action'){
		$options[] = array(
			'name' => __( 'Call To Action', 'accesspress-root' ),
			'id'   => 'call_to_action', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Title', 'accesspress-root' ),
			'id' => 'call_to_action_title',
			'std' => 'AccessPress Root',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Desc', 'accesspress-root' ),
			'id' => 'call_to_action_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		$options[] = array(
			'name' => __( 'Button Text', 'accesspress-root' ),
			'id' => 'call_to_action_button_text',
			'std' => 'Buy Now',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Button Link', 'accesspress-root' ),
			'id' => 'call_to_action_link',
			'std' => 'http://',
			'type' => 'url'
		);

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'feature_block'){
		$options[] = array(
			'name' => __( 'Feature Block', 'accesspress-root' ),
			'id'   => 'feature_block', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Feature Section Title', 'accesspress-root' ),
			'id' => 'feature_title',
			'std' => 'Our Features',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Feature Section Desc', 'accesspress-root' ),
			'id' => 'feature_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		for ($service_page_count = 1; $service_page_count <= 4; $service_page_count++) { 
			if ( $options_pages ) {
				$options[] = array(
					'name' => __( 'Feature ', 'accesspress-root' ).$service_page_count,
					'id' => 'feature'.$service_page_count,
					'type' => 'select',
					'options' => $options_pages
				);
			}
		}

		$options[] = array(
			'name' => __( 'Read More Text', 'accesspress-root' ),
			'id' => 'feature_readmore',
			'std' => 'Read More',
			'type' => 'text'
		);

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'latest_post_block'){
		$options[] = array(
			'name' => __( 'Latest Post Block', 'accesspress-root' ),
			'id'   => 'latest_post_block', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Title', 'accesspress-root' ),
			'id' => 'latest_post_title',
			'std' => 'AccessPress Root',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Desc', 'accesspress-root' ),
			'id' => 'latest_post_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		$options[] = array(
			'name' => __( 'No of Post', 'accesspress-root' ),
			'id' => 'latest_post_count',
			'std' => '2',
			'type' => 'num'
		);

		$options[] = array(
			'type' => 'groupend'
		);

	}elseif($key == 'project_block'){
		$options[] = array(
			'name' => __( 'Project Block', 'accesspress-root' ),
			'id'   => 'project_block', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		if ( $options_pages ) {
			$options[] = array(
				'name' => __( 'Project ', 'accesspress-root' ),
				'id' => 'project',
				'type' => 'select',
				'options' => $options_pages
			);
		}

		$options[] = array(
			'name' => __( 'Project Read More', 'accesspress-root' ),
			'id' => 'project_readmore',
			'std' => 'Read More',
			'type' => 'text'
		);

		if ( $options_categories ) {
			$options[] = array(
				'name' => __( 'Select a Category', 'accesspress-root' ),
				'desc' => __( 'Select the category for project.', 'accesspress-root' ),
				'id' => 'project_cat',
				'type' => 'select',
				'options' => $options_categories
			);
		}

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'testimonial_slider'){
		$options[] = array(
			'name' => __( 'Testimonial Slider', 'accesspress-root' ),
			'id'   => 'testimonial_slider', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Title', 'accesspress-root' ),
			'id' => 'testimonial_title',
			'std' => 'What Our Client Say',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Desc', 'accesspress-root' ),
			'id' => 'testimonial_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		if ( $options_categories ) {
			$options[] = array(
				'name' => __( 'Select a Category', 'accesspress-root' ),
				'desc' => __( 'Select the category for testimonial slider.', 'accesspress-root' ),
				'id' => 'testimonial_slider_cat',
				'type' => 'select',
				'options' => $options_categories
			);
		}

		$options[] = array(
			'type' => 'groupend'
		);
	}
}

/* --------------------------SLIDER IMAGES-------------------------- */

	$options[] = array(
		'name' => __( 'Slider Images', 'accesspress-root' ),
		'type' => 'heading'
	);

	for ($slider_count = 1; $slider_count < 6; $slider_count++) { 
	$options[] = array(
		'name' => __( 'Slider ', 'accesspress-root' ).$slider_count,
		'class' => 'title',
		'type' => 'title',
	);

	$options[] = array(
		'name' => __( 'Slider Image', 'accesspress-root' ),
		'id' => 'slider_image'.$slider_count,
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Slider Title', 'accesspress-root' ),
		'id' => 'slider_title'.$slider_count,
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Slider Description', 'accesspress-root' ),
		'id' => 'slider_desc'.$slider_count,
		'settings' => array('rows' => 2),
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Slider Button Text', 'accesspress-root' ),
		'id' => 'slider_button_text'.$slider_count,
		'std' => 'Read More',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Slider Button Link', 'accesspress-root' ),
		'id' => 'slider_button_link'.$slider_count,
		'std' => 'http://',
		'type' => 'url'
	);
	}

/* --------------------------SLIDER SETTINGS-------------------------- */
	$options[] = array(
		'name' => __('Slider Settings', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Slider', 'accesspress_parallax'),
		'id' => 'show_slider',
		'on' => 'Yes',
		'off' => 'No',
		'std' => '1',
		'type' => 'switch');

	$options[] = array(
		'name' => __('Show Pager', 'accesspress_parallax'),
		'id' => 'show_pager',
		'on' => 'Yes',
		'off' => 'No',
		'std' => '1',
		'type' => 'switch');

	$options[] = array(
		'name' => __('Show Controls', 'accesspress_parallax'),
		'id' => 'show_controls',
		'on' => 'Yes',
		'off' => 'No',
		'std' => '1',
		'type' => 'switch');

	$options[] = array(
		'name' => __('Auto Transition', 'accesspress_parallax'),
		'id' => 'auto_transition',
		'on' => 'Yes',
		'off' => 'No',
		'std' => '1',
		'type' => 'switch');

	$options[] = array(
		'name' => __('Slider Transition', 'accesspress_parallax'),
		'id' => 'slider_transition',
		'std' => 'fade',
		'type' => 'select',
		'options' => $transitions);

	$options[] = array(
		'name' => __('Slider Transition Speed', 'accesspress_parallax'),
		'id' => 'slider_speed',
		'std' => '5000',
		"min" 	=> "1000",
		"step"	=> "100",
		"max" 	=> "10000",
		"type" 	=> "sliderui");

	$options[] = array(
		'name' => __('Slider Pause Duration', 'accesspress_parallax'),
		'id' => 'slider_pause',
		'std' => '5000',
		"min" 	=> "1000",
		"step"	=> "100",
		"max" 	=> "8000",
		"type" 	=> "sliderui");

	$options[] = array(
		'name' => __('Show Caption', 'accesspress_parallax'),
		'id' => 'show_caption',
		'on' => 'Yes',
		'off' => 'No',
		'std' => '1',
		'type' => 'switch');
	
/* --------------------------SOCIAL SETTINGS-------------------------- */
	$options[] = array(
		'name' => __('Social Links', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Social Icon', 'accesspress_parallax'),
		'id' => 'show_social',
		'on' => 'Enable',
		'off' => 'Disable',
		'std' => '1',
		'type' => 'switch');

	$options[] = array(
		'name' => __('Facebook', 'accesspress_parallax'),
		'id' => 'facebook',
		'type' => 'url');

	$options[] = array(
		'name' => __('Twitter', 'accesspress_parallax'),
		'id' => 'twitter',
		'type' => 'url');

	$options[] = array(
		'name' => __('Google Plus', 'accesspress_parallax'),
		'id' => 'google_plus',
		'type' => 'url');

	$options[] = array(
		'name' => __('Youtube', 'accesspress_parallax'),
		'id' => 'youtube',
		'type' => 'url');

	$options[] = array(
		'name' => __('Pinterest', 'accesspress_parallax'),
		'id' => 'pinterest',
		'type' => 'url');

	$options[] = array(
		'name' => __('Linkedin', 'accesspress_parallax'),
		'id' => 'linkedin',
		'type' => 'url');

	$options[] = array(
		'name' => __('Instagram', 'accesspress_parallax'),
		'id' => 'instagram',
		'type' => 'url');

	$options[] = array(
		'name' => __('StumbleUpon', 'accesspress_parallax'),
		'id' => 'stumbleupon',
		'type' => 'url');

	$options[] = array(
		'name' => __('Skype', 'accesspress_parallax'),
		'id' => 'skype',
		'type' => 'text');

/* --------------------------CUSTOM CSS-------------------------- */
	$options[] = array(
		'name' => __('Custom CSS', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Custom CSS', 'accesspress_parallax'),
		'id' => 'custom_css',
		'type' => 'textarea',
		'desc' => 'Put your custom CSS here');

/* --------------------------CUSTOM JS-------------------------- */

	$options[] = array(
		'name' => __('Custom JS', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Custom JS', 'accesspress_parallax'),
		'id' => 'custom_js',
		'type' => 'textarea',
		'desc' => 'Put your analytics code/custom JS here');

/* --------------------------ABOUT SECTION-------------------------- */

	$options[] = array(
		'name' => __('About', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('About AccessPress Themes', 'accesspress_parallax'),
		'desc' => $about_content,
		'type' => 'info');

	$options[] = array( 
		"name" => "",
		"id" => "tab_id",
		"std" => "#options-group-1",
		"type" => "hidden" );

	return $options;
}