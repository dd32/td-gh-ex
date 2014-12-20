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
 * If you are making your theme translatable, you should replace 'accesspress_parallax'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// $settings = get_option('accesspress_parallax');
	// 	$count = count($settings['parallax_section']);
	// 	update_option('accesspress_parallax_count', $count );

	// Test data
	$transitions = array(
		'fade' => __('Fade', 'accesspress_parallax'),
		'horizontal' => __('Slide Horizontal', 'accesspress_parallax'),
		'vertical' => __('Slide Vertical', 'accesspress_parallax')
	);

	$overlay = array(
		'overlay1' => __('Overlay 1', 'accesspress_parallax'),
		'overlay2' => __('Overlay 2', 'accesspress_parallax'),
		'overlay3' => __('Overlay 3', 'accesspress_parallax'),
		'overlay4'  => __( 'Overlay 4', 'options-framework')
	);

	$section_template = array(
		'default_template' => __('Default Section', 'accesspress_parallax'),
		'service_template' => __('Service Section', 'accesspress_parallax'),
		'team_template' => __('Team Section', 'accesspress_parallax'),
		'portfolio_template' => __('Portfolio Section', 'accesspress_parallax'),
		'testimonial_template' => __('Testimonial Section', 'accesspress_parallax'),
		'blog_template' => __('Blog Section', 'accesspress_parallax'),
		'action_template' => __('Call to Action Section', 'accesspress_parallax'),
		'googlemap_template' => __('Google Map Section', 'accesspress_parallax'),
		'blank_template' => __('Blank Section', 'accesspress_parallax'),
	);

	$check = array(
		'yes' => __('Yes', 'accesspress_parallax'),
		'no' => __('No', 'accesspress_parallax')
	);

	$test_array = array(
		'one' => __('One', 'accesspress_parallax'),
		'two' => __('Two', 'accesspress_parallax'),
		'three' => __('Three', 'accesspress_parallax'),
		'four' => __('Four', 'accesspress_parallax'),
		'five' => __('Five', 'accesspress_parallax')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'accesspress_parallax'),
		'two' => __('Pancake', 'accesspress_parallax'),
		'three' => __('Omelette', 'accesspress_parallax'),
		'four' => __('Crepe', 'accesspress_parallax'),
		'five' => __('Waffle', 'accesspress_parallax')
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
		'attachment'=>'scroll',
		'size' => 'cover',
		 );

	// Parallax Defaults
	$parallax_defaults = NULL;

	$about_content = "<p>".__('AccessPress Parallax - is a FREE WordPress theme by','accesspress_parallax')." <a target='_blank' href='".esc_url('http://www.accesspressthemes.com/')."'>AccessPress Themes</a> ".__('- A WordPress Division of Access Keys.','accesspress_parallax')."</p>"; 
    $about_content .= "<p>".__(' Access Keys - has developed more than 350 WordPress websites for its clients.','accesspress_parallax')."</p>";
    $about_content .= "<p>".__('AccessPress Parallax is multi-purpose, is suitable for  travel, corporate, portfolio, photography, green thinking, nature, health, small biz, personal,  and any other creative and minimalistic style website, corporate, agencies, bloggers anyone and everyone. ','accesspress_parallax')."</p><br />";
    $about_content .= "<h4>".__('Other products by AccessPressThemes','accesspress_parallax')."</h4>";
    $about_content .= "<div class='product clearfix'>";
    $about_content .= "<div class='logo-product'>";
	$about_content .= "<img alt='AccessPress Lite' src='".get_template_directory_uri()."/images/accesspresslite.png'>";
	$about_content .= "</div>";
	$about_content .= "<div class='productext'>";
	$about_content .= __('AccessPress Lite - Free WordPress theme, available in WordPress.org','accesspress_parallax')."</br />";
	$about_content .= __('See Demo ','accesspress_parallax')."<a target='_blank' href='".esc_url('http://accesspressthemes.com/wordpress-themes/accesspress-lite/')."'>".__('Here','accesspress_parallax')."</a>";
	$about_content .= "</div>";
    $about_content .= "</div>";

    $about_content .= "<div class='product clearfix'>";
    $about_content .= "<div class='logo-product'>";
	$about_content .= "<img alt='AccessPress Lite' src='".get_template_directory_uri()."/images/accesspresspro.png'>";
	$about_content .= "</div>";
	$about_content .= "<div class='productext'>";
	$about_content .= __('AccessPress Pro - Premium version of AccessPress lite','accesspress_parallax')."</br />";
	$about_content .= __('See Demo ','accesspress_parallax')."<a target='_blank' href='".esc_url('http://accesspressthemes.com/wordpress-themes/accesspress_parallax-pro/')."'>".__('Here','accesspress_parallax')."</a>";
	$about_content .= "</div>";
    $about_content .= "</div><br/>";

    $about_content .= "<h4>".__('Get in touch','accesspress_parallax')."</h4>";
    $about_content .= __('If you have any question/feedback, please get in touch:','accesspress_parallax')."<br /><br />";
    $about_content .= __('General enquiries:','accesspress_parallax')." <a href='mailto:".esc_url('info@accesspressthemes.com')."'>info@accesspressthemes.com</a><br /><br />";
    $about_content .= __('Support:','accesspress_parallax')." <a href='mailto:".esc_url('support@accesspressthemes.com')."'>support@accesspressthemes.com</a><br /><br />";
    $about_content .= __('Sales:','accesspress_parallax')." <a href='mailto:".esc_url('sales@accesspressthemes.com')."'>sales@accesspressthemes.com</a><br/><br /><br />";

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	$options_categories[''] = 'Select a Category:';
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
	$imagepath =  get_template_directory_uri() . '/inc/options-framework/images/';

	$options = array();

	$options[] = array(
		'name' => __('General Settings', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Enable Parallax', 'accesspress_parallax'),
		'desc' => __('Check To enable', 'accesspress_parallax'),
		'id' => 'enable_parallax',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Enable Responsive', 'accesspress_parallax'),
		'desc' => __('Check To enable', 'accesspress_parallax'),
		'id' => 'enable_responsive',
		'std' => '1',
		'type' => 'checkbox');


	$options[] = array(
		'name' => __('Upload Logo', 'accesspress_parallax'),
		'desc' => '<a target="_blank" href="'.admin_url().'themes.php?page=custom-header" class="button">'.__('Upload', 'accesspress_parallax').'</a>',
		'type' => 'info');

	$options[] = array(
		'name' => __('Upload Fav Icon', 'accesspress_parallax'),
		'id' => 'fav_icon',
		'class' => 'sub-option',
		'type' => 'upload');

	$options[] = array(
		'name' => "Select Header Layout",
		'id' => "header_layout",
		'std' => "logo-side",
		'type' => "images",
		'options' => array(
			'logo-side' => $imagepath . 'logo-side.jpg',
			'logo-top' => $imagepath . 'logo-top.jpg')
	);

	$options[] = array(
		'name' => __('Parallax Settings', 'accesspress_parallax'),
		'type' => 'heading');


	$options[] = array(
		'id' => 'parallax_section',
		'std' => $parallax_defaults,
		'options' => $options_pages,
		'overlay' => $overlay,
		'category' => $options_categories,
		'layout' => $section_template,
		'type' => 'parallaxsection' );


	$options[] = array(
		'id' => 'add_new_section',
		'type' => 'button' );

	/*Post Section Ends*/
	$options[] = array(
		'name' => __('Post Settings', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Posted Date', 'accesspress_parallax'),
		'desc' => __('Check To enable', 'accesspress_parallax'),
		'id' => 'post_date',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Post Author', 'accesspress_parallax'),
		'desc' => __('Check To enable', 'accesspress_parallax'),
		'id' => 'post_author',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Post Footer text', 'accesspress_parallax'),
		'desc' => __('Check To enable', 'accesspress_parallax'),
		'id' => 'post_footer',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Prev Next Pagination', 'accesspress_parallax'),
		'desc' => __('Check To enable', 'accesspress_parallax'),
		'id' => 'post_pagination',
		'std' => '1',
		'type' => 'checkbox');
	
	/*Parallax Section Ends*/
	$options[] = array(
		'name' => __('Slider Settings', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Slider', 'accesspress_parallax'),
		'id' => 'show_slider',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Category', 'accesspress_parallax'),
		'id' => 'slider_category',
		'type' => 'select',
		'options' => $options_categories);
	}

	$options[] = array(
		'name' => __('Show full window', 'accesspress_parallax'),
		'id' => 'slider_full_window',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Show Pager', 'accesspress_parallax'),
		'id' => 'show_pager',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Show Controls', 'accesspress_parallax'),
		'id' => 'show_controls',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Auto Transition', 'accesspress_parallax'),
		'id' => 'auto_transition',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Slider Transition', 'accesspress_parallax'),
		'id' => 'slider_transition',
		'std' => 'fade',
		'type' => 'radio',
		'options' => $transitions);

	$options[] = array(
		'name' => __('Slider Transition Speed', 'accesspress_parallax'),
		'id' => 'slider_speed',
		'std' => '5000',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slider Pause Duration', 'accesspress_parallax'),
		'id' => 'slider_pause',
		'std' => '5000',
		'type' => 'text');

	$options[] = array(
		'name' => __('Show Caption', 'accesspress_parallax'),
		'id' => 'show_caption',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Social Links', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Social Icon', 'accesspress_parallax'),
		'desc' => __('Check To enable', 'accesspress_parallax'),
		'id' => 'show_social',
		'std' => '1',
		'type' => 'checkbox');

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
		'name' => __('Fickr', 'accesspress_parallax'),
		'id' => 'flickr',
		'type' => 'url');

	$options[] = array(
		'name' => __('Vimeo', 'accesspress_parallax'),
		'id' => 'vimeo',
		'type' => 'url');

	$options[] = array(
		'name' => __('Instagram', 'accesspress_parallax'),
		'id' => 'instagram',
		'type' => 'url');

	$options[] = array(
		'name' => __('Skype', 'accesspress_parallax'),
		'id' => 'skype',
		'type' => 'text');

	$options[] = array(
		'name' => __('Tools', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Custom CSS', 'accesspress_parallax'),
		'id' => 'custom_css',
		'type' => 'textarea',
		'desc' => 'Put your custom CSS here');

	$options[] = array(
		'name' => __('Custom JS', 'accesspress_parallax'),
		'id' => 'custom_js',
		'type' => 'textarea',
		'desc' => 'Put your analytics code/custom JS here');

	$options[] = array(
		'name' => __('About', 'accesspress_parallax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('About AccessPress Themes', 'accesspress_parallax'),
		'desc' => $about_content,
		'type' => 'info');
return $options;
}
