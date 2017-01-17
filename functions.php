<?php
/**Theme Name	: Corpbiz
 * Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI',get_template_directory_uri());	
	define('WEBRITI_TEMPLATE_DIR',get_template_directory());
	define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');	
	define('WEBRITI_THEME_OPTIONS_PATH',WEBRITI_TEMPLATE_DIR_URI.'/functions/theme_options');
	
	// Add default data file 
	require_once('theme_setup_data.php');
	
	// Adding customizer files
	//require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_home_page.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_home_page.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_typography.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_footer_customization.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_texonomy_archive.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_layout_manager.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-template.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_theme_style.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_pro.php');
	
	
	
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php'); 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/webriti_nav_walker.php'); 
	require_once( WEBRITI_THEME_FUNCTIONS_PATH . '/scripts/scripts.php'); 
	require_once( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php'); 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/excerpt/excerpt.php');
	// custom widget files
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/custom-sidebar.php');
	
	//Template-tag
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tags.php'); 
	//Webriti shortcodes
	
	//content width
	if ( ! isset( $content_width ) ) $content_width = 700;//In PX		
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
	{	// Load text domain for translation-ready
		load_theme_textdomain( 'corpbiz', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'corpbiz' ) ); //Navigation
		register_nav_menu( 'secondary', __( 'Footer Menu', 'corpbiz' ) ); //Navigation
		// theme support 	
		//$args = array('default-color' => '#ffffff');
		//add_theme_support( 'custom-background', $args ); 
		add_theme_support( 'automatic-feed-links');
		
		//Add Title Tag Support
		add_theme_support( 'title-tag' );

		
	} 
	function add_to_author_profile( $contactmethods ) {
		$contactmethods['youtube_profile'] = 'Youtube Profile URL';
		$contactmethods['google_profile'] = 'Google Profile URL';
		$contactmethods['twitter_profile'] = 'Twitter Profile URL';
		$contactmethods['facebook_profile'] = 'Facebook Profile URL';
		$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);
	
	add_filter('get_avatar','add_gravatar_class');
	function add_gravatar_class($class) {
		$class = str_replace("class='avatar", "class='img-responsive comment_img img-circle media-object", $class);
		return $class;
	}
	// Read more tag to formatting in blog page 	
	function new_content_more($more)
	{  global $post;
		return '<div class="blog-btn-col"><a href="' . get_permalink() . "\" class=\"more-link\">Read More</a></div>";
	}   
	add_filter( 'the_content_more_link', 'new_content_more' );
?>