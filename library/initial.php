<?php
/*
 *
 */

	//	Let's get everything up and running.
	//	=================================================================
	function bnw_ahoy() {

		// let's get language support going, if you need it
		load_theme_textdomain( 'bnwtheme', get_template_directory() . '/library/translation' );

		// launching operation cleanup
		add_action( 'init', 'bnw_head_cleanup' );
		// A better title
		add_filter( 'wp_title', 'rw_title', 10, 3 );
		// remove WP version from RSS
		add_filter( 'the_generator', 'bnw_rss_version' );
		// remove pesky injected css for recent comments widget
		add_filter( 'wp_head', 'bnw_remove_wp_widget_recent_comments_style', 1 );
		// clean up comment styles in the head
		add_action( 'wp_head', 'bnw_remove_recent_comments_style', 1 );
		// clean up gallery output in wp
		add_filter( 'gallery_style', 'bnw_gallery_style' );

		// enqueue base scripts and styles
		add_action( 'wp_enqueue_scripts', 'bnw_scripts_and_styles', 999 );
		// ie conditional wrapper

		// launching this stuff after theme setup
		bnw_theme_support();

		// adding sidebars to Wordpress (these are created in functions.php)
		add_action( 'widgets_init', 'bnw_register_sidebars' );
		
		// adding sidebars to Wordpress (these are created in functions.php)
		add_action( 'widgets_init', 'bnw_register_widgets' );

		// cleaning up random code around images
		add_filter( 'the_content', 'bnw_filter_ptags_on_images' );
		// cleaning up excerpt
		add_filter( 'excerpt_more', 'bnw_excerpt_more' );

	} /* end bnw ahoy */

	// let's get this party started
	add_action( 'after_setup_theme', 'bnw_ahoy' );
	
	
	//	OEMBED SIZE OPTIONS
	//	=================================================================
	if ( ! isset( $content_width ) ) {
		$content_width = 640;
	}
	
	//	THUMBNAIL SIZE OPTIONS
	//	=================================================================
	
	// Thumbnail sizes
	add_image_size( 'bnw-thumb-1170', 1170, 9999, true );
	add_image_size( 'bnw-thumb-750', 750, 9999, true );
	add_image_size( 'bnw-thumb-450', 450, 9999, true );
	add_image_size( 'bnw-thumb-290', 290, 9999, true );
	add_image_size( 'bnw-thumb-200', 200, 9999, true );
	add_image_size( 'bnw-thumb-100', 100, 9999, true );
	/*
	to add more sizes, simply copy a line from above
	and change the dimensions & name. As long as you
	upload a "featured image" as large as the biggest
	set width or height, all the other sizes will be
	auto-cropped.

	To call a different size, simply change the text
	inside the thumbnail function.

	For example, to call the 300 x 300 sized image,
	we would use the function:
	<?php the_post_thumbnail( 'bnw-thumb-300' ); ?>
	for the 600 x 100 image:
	<?php the_post_thumbnail( 'bnw-thumb-600' ); ?>

	You can change the names and dimensions to whatever
	you like. Enjoy!
	*/
	/*
	add_filter( 'image_size_names_choose', 'bnw_custom_image_sizes' );

	function bnw_custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
			'bnw-thumb-600' => __('600px by 150px'),
			'bnw-thumb-300' => __('300px by 100px'),
		) );
	}
	*/
	/*
	The function above adds the ability to use the dropdown menu to select
	the new images sizes you have just created from within the media manager
	when you add media to your content blocks. If you add more image sizes,
	duplicate one of the lines in the array and name it according to your
	new image size.
	*/