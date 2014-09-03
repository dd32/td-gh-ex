<?php
/**
* @Theme Name	:	Corpbiz
* @file         :	functions.php
* @package      :	Corpbiz
* @author       :	Priyanshu Mittal
* @filesource   :	wp-content/themes/corpbiz/functions.php
* Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI',get_template_directory_uri());	
	define('WEBRITI_TEMPLATE_DIR',get_template_directory());
	define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');	
	define('WEBRITI_THEME_OPTIONS_PATH',WEBRITI_TEMPLATE_DIR_URI.'/functions/theme_options');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php'); 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/webriti_nav_walker.php');
	//wp title tag starts here
	function webriti_head( $title, $sep )
	{	global $paged, $page;		
		if ( is_feed() )
			return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( _e( 'Page', 'corpbiz' ), max( $paged, $page ) );
		return $title;
	}	
	add_filter( 'wp_title', 'webriti_head', 10, 2);
	
	add_action( 'after_setup_theme', 'webriti_setup' ); 	
	function webriti_setup()
	{	
		global $content_width;
        if ( ! isset( $content_width ) ){
              $content_width = 700;
        }
		// Load text domain for translation-ready
		load_theme_textdomain( 'corpbiz', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'corpbiz' ) ); //Navigation
		register_nav_menu( 'secondary', __( 'Secondary Menu', 'corpbiz' ) ); //Navigation
		// theme support 	
		//$args = array('default-color' => '#ffffff');
		//add_theme_support( 'custom-background', $args  ); 
		add_theme_support( 'automatic-feed-links');
		
		require_once('theme_setup_data.php');
		// setup admin pannel defual data for index page		
		$corpbiz_options=theme_data_setup();
		
		$current_theme_options = get_option('corpbiz_options'); // get existing option data 		
		if($current_theme_options)
		{ 	$corpbiz_options = array_merge($corpbiz_options, $current_theme_options);
			update_option('corpbiz_options',$corpbiz_options);	// Set existing and new option data			
		}
		else
		{
			add_option('corpbiz_options', $corpbiz_options);
		}
		require( WEBRITI_THEME_FUNCTIONS_PATH . '/theme_options/option_pannel.php' ); // for Option Panel Settings		
		
	} 
	
	add_filter('get_avatar','webriti_gravatar_class');
	function webriti_gravatar_class($class) {
		$class = str_replace("class='avatar", "class='img-responsive comment_img img-circle media-object", $class);
		return $class;
	}
	
		
	add_action( 'widgets_init', 'webriti_widgets_init');
	function webriti_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'corpbiz' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'corpbiz' ),
			'before_widget' => '<div class="sidebar_widget" >',
			'after_widget' => '</div>',
			'before_title' => '<div class="sidebar_widget_title"><h2>',
			'after_title' => '</h2></div>',
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'corpbiz' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'corpbiz' ),
			'before_widget' => '<div class="col-md-4 col-sm-6 footer_widget_column">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="footer_widget_title">',
			'after_title' => '</h2>',
		) );
	}
	
	/********** Image Resize *************/
	if ( function_exists( 'add_image_size' ) ) 
	{ 
		add_image_size('webriti_page_thumb',750,345,true);
		add_image_size('webriti_blog_thumb',750,345,true);
		add_image_size('webriti_sidebar_thumb',100,100,true);
	}
	
	// code for home slider post types 
	add_filter( 'intermediate_image_sizes', 'webriti_image_presets');
	function webriti_image_presets($sizes){
	   $type = get_post_type($_REQUEST['post_id']);
	   
		foreach($sizes as $key => $value){
			if($type=='post' && $value != 'webriti_blog_thumb' && $value != 'webriti_sidebar_thumb')
			{        unset($sizes[$key]); }		
			else if($type=='page' && $value != 'webriti_page_thumb')
			{        unset($sizes[$key]); }		
		}
		return $sizes;	 
	}
	
	/*******corpbiz css and js *******/
	function webriti_scripts()
	{	
		wp_enqueue_style('bootstrap-css', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap.css');
		wp_enqueue_style('theme-menu', WEBRITI_TEMPLATE_DIR_URI . '/css/theme-menu.css');
		wp_enqueue_style('font', WEBRITI_TEMPLATE_DIR_URI . '/css/font/font.css');	
		wp_enqueue_style('font-awesome-min', WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome-4.0.3/css/font-awesome.min.css');	
		wp_enqueue_style('media-responsive', WEBRITI_TEMPLATE_DIR_URI . '/css/media-responsive.css');	
		
		wp_enqueue_script('menu', WEBRITI_TEMPLATE_DIR_URI .'/js/menu/menu.js',array('jquery'));
		wp_enqueue_script('bootstrap-min', WEBRITI_TEMPLATE_DIR_URI .'/js/bootstrap.min.js');
		
		if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
	}
	add_action('wp_enqueue_scripts', 'webriti_scripts');
	
	// Read more tag to formatting in blog page 	
	function webriti_content_more($more)
	{  global $post;
		return '<div class="blog-btn-col"><a href="' . get_permalink() . "\" class=\"blog-btn\">Read More</a></div>";
	}   
	add_filter( 'the_content_more_link', 'webriti_content_more' );

?>