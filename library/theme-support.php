<?php
/*
 *
 */

	//	THEME SUPPORT
	//	=================================================================
	//

	// Adding WP 3+ Functions & Theme Support
	function bnw_theme_support() {

		// wp thumbnails (sizes handled in functions.php)
		add_theme_support( 'post-thumbnails' );

		// default thumb size
		set_post_thumbnail_size(125, 125, true);

		// wp custom background 
		add_theme_support( 'custom-background',
			array(
			'default-image' => '',    // background image default
			'default-color' => 'ECF0F1',    // background color default (dont add the #)
			'wp-head-callback' => '_custom_background_cb',
			'admin-head-callback' => '',
			'admin-preview-callback' => ''
			)
		);

		// rss thingy
		add_theme_support('automatic-feed-links');

		// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

		// adding post format support
		add_theme_support( 'post-formats',
			array(
				'aside',             // title less blurb
				'gallery',           // gallery of images
				'link',              // quick link to other site
				'image',             // an image
				'quote',             // a quick quote
				'status',            // a Facebook like status update
				'video',             // video
				'audio',             // audio
				'chat'               // chat transcript
			)
		);
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		
		// wp menus
		add_theme_support( 'menus' );

		// registering wp3+ menus
		register_nav_menus(
			array(
				//'top-nav' => __( 'Top Menu', 'bnwtheme' ),        // Top Menu in header
				'main-nav' => __( 'Main Menu', 'bnwtheme' ),      // main nav in header
				'footer-nav' => __( 'Footer Menu', 'bnwtheme' )   // Footer Menu
			)
		);
	} /* end bnw theme support */