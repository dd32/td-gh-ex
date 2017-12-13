<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$theme_footer_widgets = array(
		'3' => __('Three', 'aadya'),
		'4' => __('Four', 'aadya')
	);
	
	$theme_layout_array = array(
		'boxed' => __('Default', 'aadya'),
		'wide' => __('Wide', 'aadya')
	);
	
	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'aadya'),
		'two' => __('Pancake', 'aadya'),
		'three' => __('Omelette', 'aadya'),
		'four' => __('Crepe', 'aadya'),
		'five' => __('Waffle', 'aadya')
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
	
	$imagepath =  get_template_directory_uri() . '/inc/admin/images/';

	$options = array();
	
	//Settings for Basic Settings Tab
	$options[] = array(
		'name' => __('Basic Settings', 'aadya'),
		'type' => 'heading');
		
		
	$options[] = array(
		'name' =>  __('Header Background', 'aadya'),
		'desc' => __('Change the header background CSS.', 'aadya'),
		'id' => 'site_header_background',
		'std' => $background_defaults,
		'type' => 'background' );		
		
	$options[] = array(
		'name' =>  __('Body Background', 'aadya'),
		'desc' => __('Change the body background CSS.', 'aadya'),
		'id' => 'body_background',
		'std' => $background_defaults,
		'type' => 'background' );		

	$options[] = array(
		'name' => __('Site Logo', 'aadya'),
		'desc' => __('If set this will be used as your sites logo.', 'aadya'),
		'id' => 'site_logo',
		'type' => 'upload');			
		
	$options[] = array(
		'name' => __('Theme Layout', 'aadya'),
		'desc' => __('This option allows you to set wider theme layout.', 'aadya'),
		'id' => 'theme_layout',
		'std' => 'Default',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $theme_layout_array);			
		
	$options[] = array(
		'name' => "Page Layout",
		'desc' => "These are layouts for your posts & pages. By default, Pages will follow this setting unless you use any other page templates that are available in template dropdown.",
		'id' => "page_layouts",
		'std' => "content-sidebar",
		'type' => "images",
		'options' => array(
			'full-width' => $imagepath . 'full-width.png',
			'sidebar-content' => $imagepath . 'sidebar-content.png',
			'content-sidebar' => $imagepath . 'content-sidebar.png',
			'sidebar-content-sidebar' => $imagepath . 'sidebar-content-sidebar.png',
			'content-sidebar-sidebar' => $imagepath . 'content-sidebar-sidebar.png',)
	);		
	
	
	$options[] = array(
		'name' => __('Widget Areas in Extended Footer', 'aadya'),
		'desc' => __('This option allows you to set how many widget areas you want in footer. Default is 3.', 'aadya'),
		'id' => 'extended_footer_count',
		'std' => '3',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $theme_footer_widgets);		
	
	$options[] = array(
		'name' => __('Copyright Text', 'aadya'),
		'desc' => __('Your sites copyright statement.', 'aadya'),
		'id' => 'copyright_text',
		'std' => '&copy; All rights reserved.',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Front Page Settings', 'aadya'),
		'type' => 'heading');	
		
	$options[] = array(
		'name' => __('Settings for Slider on Home page. (This is displayed on Front Page template with Slider Only.)', 'aadya'),
		'desc' => __('Check to display Slider. Defaults to False.', 'aadya'),
		'id' => 'display_slider',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Slider Image 1', 'aadya'),
		'desc' => __('Set image for slider. Preferred size 1350x450', 'aadya'),
		'id' => 'slider_img_1',
		'type' => 'upload');
		
	$options[] = array(		
		'desc' => __('Heading of Image 1.', 'aadya'),
		'id' => 'slider_image_heading_1',
		'std' => 'Heading 1',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Caption of Image 1.', 'aadya'),
		'id' => 'slider_image_caption_1',
		'std' => 'Caption 1',
		'type' => 'textarea');		

	$options[] = array(		
		'desc' => __('Set title for Button.', 'aadya'),
		'id' => 'slider_image_button_1',
		'std' => 'Learn more',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Link for Button', 'aadya'),
		'id' => 'slider_image_button_1_link',
		'type' => 'select',
		'options' => $options_pages);		

	$options[] = array(
		'name' => __('Slider Image 2', 'aadya'),
		'desc' => __('Set image for slider. Preferred size 1350x450', 'aadya'),
		'id' => 'slider_img_2',
		'type' => 'upload');
		
	$options[] = array(		
		'desc' => __('Heading of Image 2.', 'aadya'),
		'id' => 'slider_image_heading_2',
		'std' => 'Heading 2',
		'type' => 'text');			
		
	$options[] = array(		
		'desc' => __('Caption of Image 2.', 'aadya'),
		'id' => 'slider_image_caption_2',
		'std' => 'Caption 2',
		'type' => 'textarea');		
		
	$options[] = array(		
		'desc' => __('Set title for Button.', 'aadya'),
		'id' => 'slider_image_button_2',
		'std' => 'Learn more',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Link for Button', 'aadya'),
		'id' => 'slider_image_button_2_link',
		'type' => 'select',
		'options' => $options_pages);			

	$options[] = array(
		'name' => __('Slider Image 3', 'aadya'),
		'desc' => __('Set image for slider. Preferred size 1350x450', 'aadya'),
		'id' => 'slider_img_3',
		'type' => 'upload');	

	$options[] = array(		
		'desc' => __('Heading of Image 3.', 'aadya'),
		'id' => 'slider_image_heading_3',
		'std' => 'Heading 3',
		'type' => 'text');			
		
	$options[] = array(		
		'desc' => __('Caption of Image 3.', 'aadya'),
		'id' => 'slider_image_caption_3',
		'std' => 'Caption 3',
		'type' => 'textarea');		

	$options[] = array(		
		'desc' => __('Set title for Button.', 'aadya'),
		'id' => 'slider_image_button_3',
		'std' => 'Learn more',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Link for Button', 'aadya'),
		'id' => 'slider_image_button_3_link',
		'type' => 'select',
		'options' => $options_pages);		
		
	$options[] = array(
		'name' => __('Slider Image 4', 'aadya'),
		'desc' => __('Set image for slider. Preferred size 1350x450', 'aadya'),
		'id' => 'slider_img_4',
		'type' => 'upload');	

	$options[] = array(		
		'desc' => __('Heading of Image 4.', 'aadya'),
		'id' => 'slider_image_heading_4',
		'std' => 'Heading 4',
		'type' => 'text');			
		
	$options[] = array(		
		'desc' => __('Caption of Image 4.', 'aadya'),
		'id' => 'slider_image_caption_4',
		'std' => 'Caption 4',
		'type' => 'textarea');		
		
	$options[] = array(		
		'desc' => __('Set title for Button.', 'aadya'),
		'id' => 'slider_image_button_4',
		'std' => 'Learn more',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Link for Button', 'aadya'),
		'id' => 'slider_image_button_4_link',
		'type' => 'select',
		'options' => $options_pages);		
		
	$options[] = array(
		'name' => __('Blurb Settings - Following section allows you to configure your blurb on front page.', 'aadya'),
		'desc' => __('<b>Following section will allow you to set text and button settings</b>', 'aadya'),
		'type' => 'info');				
		
	$options[] = array(
		//'name' => __('Check to display Blurb Text on home page.', 'aadya'),
		'desc' => __('Check to display Blurb on home page.', 'aadya'),
		'id' => 'display_blurb',
		'std' => '1',
		'type' => 'checkbox');		
		
	$options[] = array(
		//'name' => __('Blurb Text', 'aadya'),
		'desc' => __('Enter text here to be displayed in Blurb Heading.', 'aadya'),
		'id' => 'blurb_heading',
		'std' => 'Hello World!',
		'type' => 'text');			
		
	$options[] = array(
		//'name' => __('Blurb Text', 'aadya'),
		'desc' => __('Enter text here to be displayed in Blurb Section.', 'aadya'),
		'id' => 'blurb_text',
		'std' => 'Welcome to Our Agency. We specialize in Web Design and Development. Check out our outstanding portfolio, and get in touch with Us!',
		'type' => 'textarea');	

	$options[] = array(
		//'name' => __('Check to display Blurb Button.', 'aadya'),
		'desc' => __('Check to display Blurb Button.', 'aadya'),
		'id' => 'display_blurb_button',
		'std' => '1',
		'type' => 'checkbox');		
		
	$options[] = array(
		//'name' => __('Blurb Button Title', 'aadya'),
		'desc' => __('Set title for Blurb Button.', 'aadya'),
		'id' => 'blurb_button_title',
		'std' => 'Get In Touch',
		'type' => 'text');		
		
	$options[] = array(
		//'name' => __('Select a Page to link to Blurb Button', 'aadya'),
		'desc' => __('Link for Blurb Button', 'aadya'),
		'id' => 'blurb_button_link_page',
		'type' => 'select',
		'options' => $options_pages);	

	$options[] = array(
		'name' => __('Widget Areas/Rows in Front Page', 'aadya'),
		'desc' => __('This option allows you to set how many widget areas/rows you want in Frontpage. Default is 2. You can add other widget to this area and they will be displyed horizontally in a row', 'aadya'),
		'id' => 'front_page_widget_section_count',
		'std' => '2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $theme_footer_widgets);		

	$options[] = array(
					'name' => __('Check to Show Row Titles on Front page', 'aadya'),
					'desc' => __('If checked it gives you options to set row header/title for each row (we have max four) you configure on home page. By default all titles are blank', 'aadya'),
					'id' => 'showhide_row_titles',
					'type' => 'checkbox');

	$options[] = array(
			'name' => __('Row One Header/Title', 'aadya'),
			'desc' => __('This text is used to set title of row one. If set to blank no title is displayed.', 'aadya'),
			'id' => 'front_page_row_one_title',
			'std' => '',
			'class' => 'hidden',
			'type' => 'text');		
			
	$options[] = array(
			'name' => __('Row Two Header/Title', 'aadya'),
			'desc' => __('This text is used to set title of row two. If set to blank no title is displayed.', 'aadya'),
			'id' => 'front_page_row_two_title',
			'std' => '',
			'class' => 'hidden',
			'type' => 'text');		

	$options[] = array(
			'name' => __('Row Three Header/Title', 'aadya'),
			'desc' => __('This text is used to set title of row three. If set to blank no title is displayed.', 'aadya'),
			'id' => 'front_page_row_three_title',
			'std' => '',
			'class' => 'hidden',
			'type' => 'text');		
			
	$options[] = array(
			'name' => __('Row Four Header/Title', 'aadya'),
			'desc' => __('This text is used to set title of row four. If set to blank no title is displayed.', 'aadya'),
			'id' => 'front_page_row_four_title',
			'std' => '',
			'class' => 'hidden',
			'type' => 'text');		
			
	$options[] = array(		
		'name' => __('Slider Interval', 'aadya'),	
		'desc' => __('Set interval for slider.(In miliseconds e.g. For 3 seconds set it 3000)', 'aadya'),
		'id' => 'slider_interval',
		'std' => '3000',
		'type' => 'text');			
			
	$options[] = array(
		'name' => __('Misc Settings', 'aadya'),
		'type' => 'heading');		
	
	/*	
	$options[] = array(
		'name' => __('Set your Favicon', 'aadya'),
		'desc' => __('Set your Favicon. Add complete url for icon image' , 'aadya'),
		'id' => 'favicon_url',
		'std' => '',
		'type' => 'text');				
    */
	
	$options[] = array(
		'name' => __('Display Search Icon in Nav Menu', 'aadya'),
		'desc' => __('Check to display Search in Nav Menu. Defaults to True.', 'aadya'),
		'id' => 'display_nav_search',
		'std' => '1',
		'type' => 'checkbox');			
		
	$options[] = array(
		'name' => __('Display Post Meta Information', 'aadya'),
		'desc' => __('Check to display Post Meta Information. Defaults to True.', 'aadya'),
		'id' => 'display_post_meta_info',
		'std' => '1',
		'type' => 'checkbox');		
		
	$options[] = array(
		'name' => __('Display Post/Page Navigation and Category/Tags on Single Post/Page', 'aadya'),
		'desc' => __('Check to display Post/Page Navigation and Category/Tags on Single Post/Page. Defaults to True.', 'aadya'),
		'id' => 'display_post_page_nav',
		'std' => '1',
		'type' => 'checkbox');	
		
	$options[] = array(
		'name' => __('Display Featured Image on top of Single Post/Page', 'aadya'),
		'desc' => __('Check to Display Featured Image on top of Single Post/Page. Defaults to True.', 'aadya'),
		'id' => 'display_featured_img_on_page_post',
		'std' => '1',
		'type' => 'checkbox');	
		

		
	return $options;
}