<?php

/*
** Register Theme Customizer
*/
function ashe_customize_register( $wp_customize ) {

/*
** Sanitization Callbacks =====
*/
	// checkbox
	function ashe_sanitize_checkbox( $input ) {
		return $input ? true : false;
	}
	
	// select
	function ashe_sanitize_select( $input, $setting ) {
		
		// check for slug
		$input = sanitize_key( $input );
		
		// get all select options
		$options = $setting->manager->get_control( $setting->id )->choices;
		
		// return default if not valid
		return ( array_key_exists( $input, $options ) ? $input : $setting->default );
	}

	// number absint
	function ashe_sanitize_number_absint( $number, $setting ) {

		// ensure $number is an absolute integer
		$number = absint( $number );

		// return default if not integer
		return ( $number ? $number : $setting->default );

	}

	// textarea
	function ashe_sanitize_textarea( $input ) {

		$allowedtags = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'target' => array(),
			),
			'i' => array(
				'class' => array(),
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
		);

		// return filtered html
		return wp_kses( $input, $allowedtags );

	}


/*
** Reusable Functions =====
*/
	// checkbox
	function ashe_checkbox_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_checkbox'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'ashe_'. $section,
			'type'		=> 'checkbox',
			'priority'	=> $priority
		) );
	}

	// text
	function ashe_text_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'ashe_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// color
	function ashe_color_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ashe_options['. $section .'_'. $id .']', array(
			'label' 	=> $name,
			'section' 	=> 'ashe_'. $section,
			'priority'	=> $priority
		) ) );
	}

	// textarea
	function ashe_textarea_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_textarea'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'ashe_'. $section,
			'type'		=> 'textarea',
			'priority'	=> $priority
		) );
	}

	// url
	function ashe_url_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'ashe_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// number absint
	function ashe_number_absint_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_number_absint'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> 'ashe_'. $section,
			'type'			=> 'number',
			'input_attrs' 	=> $atts,
			'priority'		=> $priority
		) );
	}

	// select
	function ashe_select_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_select'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> 'ashe_'. $section,
			'type'			=> 'select',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// radio
	function ashe_radio_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default'	 => ashe_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ashe_sanitize_select'
		) );
		$wp_customize->add_control( 'ashe_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> 'ashe_'. $section,
			'type'			=> 'radio',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// image
	function ashe_image_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
		    'default' 	=> ashe_options( $section .'_'. $id),
		    'type' 		=> 'option',
		    'transport' => $transport,
		    'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, 'ashe_options['. $section .'_'. $id .']', array(
				'label'    => $name,
				'section'  => 'ashe_'. $section,
				'priority' => $priority
			)
		) );
	}

	// image crop
	function ashe_image_crop_control( $section, $id, $name, $width, $height, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'ashe_options['. $section .'_'. $id .']', array(
			'default' 	=> '',
			'type' 		=> 'option',
			'transport' => $transport,
			'sanitize_callback' => 'ashe_sanitize_number_absint'
		) );
		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'ashe_options['. $section .'_'. $id .']', array(
				'label'    		=> $name,
				'section'  		=> 'ashe_'. $section,
				'flex_width'  	=> false,
				'flex_height' 	=> false,
				'width'       	=> $width,
				'height'      	=> $height,
				'priority' 		=> $priority
			)
		) );
	}



/*
** General Layouts =====
*/
	// add General Layouts section
	$wp_customize->add_section( 'ashe_general' , array(
		'title'		 => esc_html__( 'General Layouts', 'ashe' ),
		'priority'	 => 3,
		'capability' => 'edit_theme_options'
	) );

	// Sidebar Width
	ashe_number_absint_control( 'general', 'sidebar_width', esc_html__( 'Sidebar Width', 'ashe' ), array( 'step' => '10' ), 'postMessage', 3 );

	// Background Image
	ashe_image_control( 'general', 'bg_image', esc_html__( 'Background Image', 'ashe' ), 'postMessage', 7 );

	$bg_image_size = array(
		'cover'   => esc_html__( 'Cover', 'ashe' ),
		'initial' => esc_html__( 'Pattern', 'ashe' )
	);

	// Background Image Size
	ashe_radio_control( 'general', 'bg_image_size', esc_html__( 'Site Background Image Size', 'ashe' ), $bg_image_size, 'postMessage', 9 );

	$bg_image_type = array(
		'scroll' 	=> esc_html__( 'Scrollable', 'ashe' ),
		'fixed' 	=> esc_html__( 'Fixed', 'ashe' )
	);

	// Background Image Type
	ashe_radio_control( 'general', 'bg_image_type', esc_html__( 'Background Image Type', 'ashe' ), $bg_image_type, 'postMessage', 11 );


	$boxed_width = array(
		'full' 		=> esc_html__( 'Full', 'ashe' ),
		'contained' => esc_html__( 'Contained', 'ashe' ),
		'boxed' 	=> esc_html__( 'Boxed', 'ashe' ),
	);

	// Header Width
	ashe_select_control( 'general', 'header_width', esc_html__( 'Header Width', 'ashe' ), $boxed_width, 'postMessage', 25 );

	$boxed_width_slider = array(
		'full' => esc_html__( 'Full', 'ashe' ),
		'boxed' => esc_html__( 'Boxed', 'ashe' ),
	);

	// Slider Width
	ashe_select_control( 'general', 'slider_width', esc_html__( 'Slider Width', 'ashe' ), $boxed_width_slider, 'refresh', 27 );

	// Content Width
	ashe_select_control( 'general', 'content_width', esc_html__( 'Content Width', 'ashe' ), $boxed_width_slider, 'refresh', 29 );

	// Single Content Width
	ashe_select_control( 'general', 'single_width', esc_html__( 'Single Content Width', 'ashe' ), $boxed_width_slider, 'refresh', 31 );

	// Footer Width
	ashe_select_control( 'general', 'footer_width', esc_html__( 'Footer Width', 'ashe' ), $boxed_width, 'refresh', 33 );


/*
** Top Bar =====
*/
	// add Top Bar section
	$wp_customize->add_section( 'ashe_top_bar' , array(
		'title'		 => esc_html__( 'Top Bar', 'ashe' ),
		'priority'	 => 5,
		'capability' => 'edit_theme_options'
	) );

	// Top Bar label
	ashe_checkbox_control( 'top_bar', 'label', esc_html__( 'Top Bar', 'ashe' ), 'refresh', 1 );


/*
** Page Header =====
*/
	// add Page Header section
	$wp_customize->add_section( 'ashe_page_header' , array(
		'title'		 => esc_html__( 'Page Header', 'ashe' ),
		'priority'	 => 21,
		'capability' => 'edit_theme_options'
	) );

	// Page Header label
	ashe_checkbox_control( 'page_header', 'label', esc_html__( 'Page Header', 'ashe' ), 'refresh', 1 );

	// Background Image
	ashe_image_control( 'page_header', 'bg_image', esc_html__( 'Background Image', 'ashe' ), 'postMessage', 5 );

	// Background Image Size
	ashe_radio_control( 'page_header', 'bg_image_size', esc_html__( 'Background Image Size', 'ashe' ), $bg_image_size, 'postMessage', 7 );

	// Logo Image
	ashe_image_control( 'page_header', 'logo', esc_html__( 'Image', 'ashe' ), 'refresh', 11 );

	// Logo Width
	ashe_number_absint_control( 'page_header', 'logo_width', esc_html__( 'Width', 'ashe' ), array( 'step' => '10' ), 'postMessage', 13 );

	// Show Tagline
	ashe_checkbox_control( 'page_header', 'show_tagline', esc_html__( 'Show Tagline', 'ashe' ), 'refresh', 17 );


/*
** Main Navigation =====
*/
	// add Main Navigation section
	$wp_customize->add_section( 'ashe_main_nav' , array(
		'title'		 => esc_html__( 'Main Navigation', 'ashe' ),
		'priority'	 => 23,
		'capability' => 'edit_theme_options'
	) );

	// Main Navigation
	ashe_checkbox_control( 'main_nav', 'label', esc_html__( 'Main Navigation', 'ashe' ), 'refresh', 1 );

	$main_nav_align = array(
		'left' => esc_html__( 'Left', 'ashe' ),
		'center' => esc_html__( 'Center', 'ashe' ),
		'right' => esc_html__( 'Right', 'ashe' ),
	);

	// Align
	ashe_select_control( 'main_nav', 'align', esc_html__( 'Align', 'ashe' ), $main_nav_align, 'refresh', 7 );

	// Show Search Icon
	ashe_checkbox_control( 'main_nav', 'show_search', esc_html__( 'Show Search Icon', 'ashe' ), 'refresh', 13 );


/*
** Featured Slider =====
*/
	// add featured slider section
	$wp_customize->add_section( 'ashe_featured_slider' , array(
		'title'		 => esc_html__( 'Featured Slider', 'ashe' ),
		'priority'	 => 25,
		'capability' => 'edit_theme_options'
	) );

	// Featured Slider
	ashe_checkbox_control( 'featured_slider', 'label', esc_html__( 'Featured Slider', 'ashe' ), 'refresh', 1 );

	$slider_display = array(
		'all' 		=> 'All Posts',
		'category' 	=> 'by Post Category'
	);
	 
	// Display
	ashe_select_control( 'featured_slider', 'display', esc_html__( 'Display Posts', 'ashe' ), $slider_display, 'refresh', 2 );

	$slider_cats = array();

	foreach ( get_categories() as $categories => $category ) {
	    $slider_cats[$category->term_id] = $category->name;
	}
	 
	// Category
	ashe_select_control( 'featured_slider', 'category', esc_html__( 'Select Category', 'ashe' ), $slider_cats, 'refresh', 3 );

	// Number of Slides
	ashe_number_absint_control( 'featured_slider', 'amount', esc_html__( 'Number of Slides', 'ashe' ), array( 'step' => '1', 'max' => '5' ), 'refresh', 10 );

	$slider_culumns = array( 'step' => '1', 'min' => '1', 'max' => '4' );

	// Navigation
	ashe_checkbox_control( 'featured_slider', 'navigation', esc_html__( 'Show Navigation Arrows', 'ashe' ), 'refresh', 25 );

	// Pagination
	ashe_checkbox_control( 'featured_slider', 'pagination', esc_html__( 'Show Pagination Dots', 'ashe' ), 'refresh', 30 );


/*
** Featured Links =====
*/
	// add featured links section
	$wp_customize->add_section( 'ashe_featured_links' , array(
		'title'		 => esc_html__( 'Featured Links', 'ashe' ),
		'priority'	 => 27,
		'capability' => 'edit_theme_options'
	) );

	// Featured Links
	ashe_checkbox_control( 'featured_links', 'label', esc_html__( 'Featured Links', 'ashe' ), 'refresh', 1 );

	// Link #1 Title
	ashe_text_control( 'featured_links', 'title_1', esc_html__( 'Title', 'ashe' ), 'refresh', 9 );

	// Link #1 URL
	ashe_url_control( 'featured_links', 'url_1', esc_html__( 'URL', 'ashe' ), 'refresh', 11 );

	// Link #1 Image
	ashe_image_crop_control( 'featured_links', 'image_1', esc_html__( 'Image', 'ashe' ), 600, 400, 'refresh', 13 );

	// Link #2 Title
	ashe_text_control( 'featured_links', 'title_2', esc_html__( 'Title', 'ashe' ), 'refresh', 15 );

	// Link #2 URL
	ashe_url_control( 'featured_links', 'url_2', esc_html__( 'URL', 'ashe' ), 'refresh', 17 );

	// Link #2 Image
	ashe_image_crop_control( 'featured_links', 'image_2', esc_html__( 'Image', 'ashe' ), 600, 400, 'refresh', 19 );

	// Link #3 Title
	ashe_text_control( 'featured_links', 'title_3', esc_html__( 'Title', 'ashe' ), 'refresh', 21 );

	// Link #3 URL
	ashe_url_control( 'featured_links', 'url_3', esc_html__( 'URL', 'ashe' ), 'refresh', 23 );

	// Link #3 Image
	ashe_image_crop_control( 'featured_links', 'image_3', esc_html__( 'Image', 'ashe' ), 600, 400, 'refresh', 25 );


/*
** Blog Page =====
*/
	// add Blog Page section
	$wp_customize->add_section( 'ashe_blog_page' , array(
		'title'		 => esc_html__( 'Blog Page', 'ashe' ),
		'priority'	 => 29,
		'capability' => 'edit_theme_options'
	) );

	$post_description = array(
		'none' 		=> esc_html__( 'None', 'ashe' ),
		'excerpt' 	=> esc_html__( 'Post Excerpt', 'ashe' ),
		'content' 	=> esc_html__( 'Post Content', 'ashe' ),
	);

	// Post Description
	ashe_select_control( 'blog_page', 'post_description', esc_html__( 'Post Description', 'ashe' ), $post_description, 'refresh', 3 );

	$post_pagination = array(
		'default' 	=> esc_html__( 'Default', 'ashe' ),
		'numeric' 	=> esc_html__( 'Numeric', 'ashe' ),
	);

	// Post Pagination
	ashe_select_control( 'blog_page', 'post_pagination', esc_html__( 'Post Pagination', 'ashe' ), $post_pagination, 'refresh', 5 );

	// Show Categories
	ashe_checkbox_control( 'blog_page', 'show_categories', esc_html__( 'Show Categories', 'ashe' ), 'refresh', 6 );

	// Show Date
	ashe_checkbox_control( 'blog_page', 'show_date', esc_html__( 'Show Date', 'ashe' ), 'refresh', 7 );

	// Show Dropcups
	ashe_checkbox_control( 'blog_page', 'show_dropcups', esc_html__( 'Show Dropcups', 'ashe' ), 'refresh', 9 );

	// Show Author
	ashe_checkbox_control( 'blog_page', 'show_author', esc_html__( 'Show Author', 'ashe' ), 'refresh', 13 );

	// Show Comments
	ashe_checkbox_control( 'blog_page', 'show_comments', esc_html__( 'Show Comments', 'ashe' ), 'refresh', 15 );

	$related_posts = array(
		'none' 		=> esc_html__( 'None', 'ashe' ),
		'related' 	=> esc_html__( 'Related', 'ashe' ),
	);

	// Related Posts Orderby
	ashe_select_control( 'blog_page', 'related_orderby', esc_html__( 'Display', 'ashe' ), $related_posts, 'refresh', 23 );


/*
** Single Page =====
*/
	// add single Page section
	$wp_customize->add_section( 'ashe_single_page' , array(
		'title'		 => esc_html__( 'Single Page', 'ashe' ),
		'priority'	 => 31,
		'capability' => 'edit_theme_options'
	) );

	// Show Categories
	ashe_checkbox_control( 'single_page', 'show_categories', esc_html__( 'Show Categories', 'ashe' ), 'refresh', 5 );

	// Show Date
	ashe_checkbox_control( 'single_page', 'show_date', esc_html__( 'Show Date', 'ashe' ), 'refresh', 7 );

	// Show Author
	ashe_checkbox_control( 'single_page', 'show_author', esc_html__( 'Show Author', 'ashe' ), 'refresh', 13 );

	// Show Comments
	ashe_checkbox_control( 'single_page', 'show_comments', esc_html__( 'Show Comments', 'ashe' ), 'refresh', 15 );

	// Show Author Description
	ashe_checkbox_control( 'single_page', 'show_author_desc', esc_html__( 'Show Author Description', 'ashe' ), 'refresh', 18 );

	// Related Posts Orderby
	ashe_select_control( 'single_page', 'related_orderby', esc_html__( 'Related Posts - Display', 'ashe' ), $related_posts, 'refresh', 23 );



/*
** Social Media =====
*/
	// add social media section
	$wp_customize->add_section( 'ashe_social_media' , array(
		'title'		 => esc_html__( 'Social Media', 'ashe' ),
		'priority'	 => 33,
		'capability' => 'edit_theme_options'
	) );
	
	// Social Window
	ashe_checkbox_control( 'social_media', 'window', esc_html__( 'Show Social Icons in New Window', 'ashe' ), 'refresh', 1 );

	// Social Icons Array
	$social_icons = array(
		'facebook' 				=> '&#xf09a;',
		'facebook-official'		=> '&#xf230;',
		'facebook-square' 		=> '&#xf082;',
		'twitter' 				=> '&#xf099;',
		'twitter-square' 		=> '&#xf081;',
		'google' 				=> '&#xf1a0;',
		'google-plus' 			=> '&#xf0d5;',
		'google-plus-official'	=> '&#xf2b3;',
		'google-plus-square'	=> '&#xf0d4;',
		'linkedin'				=> '&#xf0e1;',
		'linkedin-square' 		=> '&#xf08c;',
		'pinterest' 			=> '&#xf0d2;',
		'pinterest-p' 			=> '&#xf231;',
		'pinterest-square'		=> '&#xf0d3;',
		'behance' 				=> '&#xf1b4;',
		'behance-square'		=> '&#xf1b5;',
		'tumblr' 				=> '&#xf173;',
		'tumblr-square' 		=> '&#xf174;',
		'reddit' 				=> '&#xf1a1;',
		'reddit-alien' 			=> '&#xf281;',
		'reddit-square' 		=> '&#xf1a2;',
		'dribbble' 				=> '&#xf17d;',
		'vk' 					=> '&#xf189;',
		'skype' 				=> '&#xf17e;',
		'film' 					=> '&#xf008;',
		'youtube-play' 			=> '&#xf16a;',
		'youtube' 				=> '&#xf167;',
		'youtube-square' 		=> '&#xf166;',
		'vimeo-square' 			=> '&#xf194;',
		'soundcloud' 			=> '&#xf1be;',
		'instagram' 			=> '&#xf16d;',
		'flickr' 				=> '&#xf16e;',
		'rss' 					=> '&#xf09e;',
		'rss-square' 			=> '&#xf143;',
		'heart' 				=> '&#xf004;',
		'heart-o' 				=> '&#xf08a;',
		'github' 				=> '&#xf09b;',
		'github-alt' 			=> '&#xf113;',
		'github-square' 		=> '&#xf092;',
		'stack-overflow' 		=> '&#xf16c;',
		'qq' 					=> '&#xf1d6;',
		'weibo' 				=> '&#xf18a;',
		'weixin' 				=> '&#xf1d7;',
		'xing' 					=> '&#xf168;',
		'xing-square' 			=> '&#xf169;',
		'gamepad' 				=> '&#xf11b;',
		'medium' 				=> '&#xf23a;',
		'envelope' 				=> '&#xf0e0;',
		'envelope-o' 			=> '&#xf003;',
		'envelope-square ' 		=> '&#xf199;',
		'etsy' 					=> '&#xf2d7;',
		'snapchat' 				=> '&#xf2ab;',
		'snapchat-ghost' 		=> '&#xf2ac;',
		'snapchat-square'		=> '&#xf2ad;',
		'meetup' 				=> '&#xf2e0;',
	);

	// Social #1 Icon
	ashe_select_control( 'social_media', 'icon_1', esc_html__( 'Select Icon', 'ashe' ), $social_icons, 'refresh', 3 );

	// Social #1 Icon
	ashe_url_control( 'social_media', 'url_1', esc_html__( 'URL', 'ashe' ), 'refresh', 5 );

	// Social #2 Icon
	ashe_select_control( 'social_media', 'icon_2', esc_html__( 'Select Icon', 'ashe' ), $social_icons, 'refresh', 7 );

	// Social #2 Icon
	ashe_url_control( 'social_media', 'url_2', esc_html__( 'URL', 'ashe' ), 'refresh', 9 );

	// Social #3 Icon
	ashe_select_control( 'social_media', 'icon_3', esc_html__( 'Select Icon', 'ashe' ), $social_icons, 'refresh', 11 );

	// Social #3 Icon
	ashe_url_control( 'social_media', 'url_3', esc_html__( 'URL', 'ashe' ), 'refresh', 13 );

	// Social #4 Icon
	ashe_select_control( 'social_media', 'icon_4', esc_html__( 'Select Icon', 'ashe' ), $social_icons, 'refresh', 15 );

	// Social #4 Icon
	ashe_url_control( 'social_media', 'url_4', esc_html__( 'URL', 'ashe' ), 'refresh', 17 );


/*
** Page Footer =====
*/
	// add page footer section
	$wp_customize->add_section( 'ashe_page_footer' , array(
		'title'		 => esc_html__( 'Page Footer', 'ashe' ),
		'priority'	 => 35,
		'capability' => 'edit_theme_options'
	) );

	// Copyright
	ashe_textarea_control( 'page_footer', 'copyright', esc_html__( 'Copyright', 'ashe' ), 'refresh', 3 );

}
add_action( 'customize_register', 'ashe_customize_register' );


/*
** Bind JS handlers to instantly live-preview changes
*/
function ashe_customize_preview_js() {
	wp_enqueue_script( 'ashe-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.min.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'ashe_customize_preview_js' );

/*
** Load dynamic logic for the customizer controls area.
*/
function ashe_panels_js() {
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ) );
	wp_enqueue_style( 'customizer-ui-css', get_theme_file_uri( '/assets/css/customizer-ui.css' ) );
	wp_enqueue_script( 'ashe-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.min.js' ), array(), '1.0', true );

}
add_action( 'customize_controls_enqueue_scripts', 'ashe_panels_js' );
