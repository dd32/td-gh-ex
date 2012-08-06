<?php
/* 	COLORFUL Theme's Functions
	Copyright: 2012, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since COLORFUL 1.0
*/
   
  
  	add_theme_support( 'automatic-feed-links' );
  	register_nav_menu( 'main-menu', 'Main Menu' );
 	


//	Set the content width based on the theme's design and stylesheet.
	if ( ! isset( $content_width ) ) $content_width = 584;


// 	Checks is WP is at least a certain version (makes sure it has sufficient comparison decimals). This function is required if the version check needed
	function is_wp_version( $is_ver ) {
    $wp_ver = explode( '.', get_bloginfo( 'version' ) );
    $is_ver = explode( '.', $is_ver );
    for( $i=0; $i<=count( $is_ver ); $i++ )
        if( !isset( $wp_ver[$i] ) ) array_push( $wp_ver, 0 );
 
    foreach( $is_ver as $i => $is_val )
        if( $wp_ver[$i] < $is_val ) return false;
    return true;
	}

// 	Tell WordPress for wp_title in order to modify document title content
	function colorful_filter_wp_title( $title ) {
    $site_name = get_bloginfo( 'name' );
    $filtered_title = $site_name . $title;
    return $filtered_title;
	}
	add_filter( 'wp_title', 'colorful_filter_wp_title' );


// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	}
	
	add_editor_style();
		
// 	WordPress 3.4 Custom Background Support	
	$colorful_custom_background = array(
	'default-color'          => '',
	'default-image'          => '',
	);
	add_theme_support( 'custom-background', $colorful_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$colorful_custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 90,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '000000',
	'header-text'            => true,
	'uploads'                => false,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $colorful_custom_header );
	
// 	Functions for adding script
	function d5corporate_enqueue_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'd5corporate-menu-style', get_template_directory_uri(). '/js/menu.js' );
	wp_enqueue_style('d5businessline-gfonts1', 'http://fonts.googleapis.com/css?family=Creepster', false );
	
	}
	add_action( 'wp_enqueue_scripts', 'd5corporate_enqueue_scripts' );

//	Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and colorful_continue_reading_link().
//	function tied to the excerpt_more filter hook.
	function colorful_auto_excerpt_more( $more ) {
	return ' &hellip;' . colorful_continue_reading_link();
	}
	add_filter( 'excerpt_more', 'colorful_auto_excerpt_more' );

//	D5 BusinessLine and WordPress Credit
	function colorful_credit() {
		echo '| COLORFUL Theme by: <a href="http://d5creation.com" target="_blank"><img  width="30px" src="' . get_template_directory_uri() . '/images/d5logofooter.png" /> D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a>';
	}


//	Adds a pretty "Continue Reading" link to custom post excerpts.
	function colorful_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= colorful_continue_reading_link();
	}
	return $output;
	}
	add_filter( 'get_the_excerpt', 'colorful_custom_excerpt_more' );


//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function colorful_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'colorful_page_menu_args' );


//	Registers the Widgets and Sidebars for the site
	function colorful_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'colorful' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Secondary Sidebar', 'colorful' ),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'colorful' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'colorful' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'colorful' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'colorful' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
	add_action( 'widgets_init', 'colorful_widgets_init' );


//	Remove WordPress Custom Header Support for the theme colorful
//	remove_theme_support('custom-header');