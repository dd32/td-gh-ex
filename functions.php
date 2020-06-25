<?php
/*
	*Theme Name	: Rambo
	*Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI',get_template_directory_uri());	
	
	define('WEBRITI_TEMPLATE_DIR',get_template_directory());
	define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');

	require_once('theme_setup_data.php');
	require_once('child_theme_compatible.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' ); // for Default Menus
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/rambo_nav_walker.php' ); // for Custom Menus	
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/scripts/scripts.php' ); 
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php' ); //for comments
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/custom-sidebar.php' ); //for widget register
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php'); //for font library
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/rambo-site-intro-widget.php' ); //for Site Intro widgets
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/rambo-register-page-widget.php' ); //for Page / Service widgets
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tags.php' ); //for post meta content
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/rambo-sidebar-latest-news.php' ); //for sidebar Latest News custom widgets	
	
	
	//Customizer
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_pro_feature.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_header.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_recent_news.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_copyright.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_recommended_plugin.php');
	require_once (WEBRITI_THEME_FUNCTIONS_PATH . '/class-tgm-plugin-activation.php');

	add_action( 'tgmpa_register', 'rambo_register_required_plugins' );

	/**
	 * Register the required plugins for this theme.
	 *
	 * In this example, we register five plugins:
	 * - one included with the TGMPA library
	 * - two from an external source, one from an arbitrary source, one from a GitHub repository
	 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
	 *
	 * The variables passed to the `tgmpa()` function should be:
	 * - an array of plugin arrays;
	 * - optionally a configuration array.
	 * If you are not changing anything in the configuration array, you can remove the array and remove the
	 * variable from the function call: `tgmpa( $plugins );`.
	 * In that case, the TGMPA default settings will be used.
	 *
	 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
	 */
	function rambo_register_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(
			 // This is an example of how to include a plugin from the WordPress Plugin Repository.
	        array(
	            'name'      => 'Contact Form 7',
	            'slug'      => 'contact-form-7',
	            'required'  => false,
	        ),
	        array(
	            'name'      => 'Webriti Companion',
	            'slug'      => 'webriti-companion',
	            'required'  => false,
	        ),

		);

		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
	
	global $resetno; //user for reset function
	//content width
	if ( ! isset( $content_width ) ) $content_width = 900;	
	
	//wp title tag starts here
	function rambo_head( $title, $sep )
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
			$title = "$title $sep " . sprintf( _e('Page','rambo'), max( $paged, $page ) );
		return $title;
	}	
	add_filter( 'wp_title', 'rambo_head', 10,2 );

	function rambo_customizer_css() {
		wp_enqueue_style( 'rambo-customizer-info', WEBRITI_TEMPLATE_DIR_URI . '/css/pro-feature.css' );
	}
	add_action( 'admin_init', 'rambo_customizer_css' );
	
		add_action( 'after_setup_theme', 'rambo_setup' ); 	
		function rambo_setup()
		{	// Load text domain for translation-ready
			load_theme_textdomain( 'rambo', WEBRITI_TEMPLATE_DIR . '/languages' );	
			
		add_theme_support( 'post-thumbnails' ); //supports featured image
		add_theme_support( 'woocommerce' );//woocommerce
		add_theme_support( 'title-tag' ); //Title Tag
		add_theme_support( 'automatic-feed-links' ); // Feed Link
		add_theme_support( 'custom-background' ); // Custom Background
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		add_editor_style();

		//Custom logo
	
		add_theme_support( 'custom-logo' , array(
	
	   'class'       => 'navbar-brand',
	   'width'       => 300,
	   'height'      => 50,
	   'flex-width' => false,
	   'flex-height' => false,
	   'header-text' => array( 'site-title', 'site-description' ),
	   
		) );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'rambo' ) );
		
		// setup admin pannel defual data for index page
		$rambo_pro_theme=rambo_theme_data_setup();

		 //About Theme
   		 $theme = wp_get_theme(); // gets the current theme
		if ('Rambo' == $theme->name) {
        if (is_admin()) {
            require get_template_directory() . '/admin/admin-init.php';
        }
   	 }
	}
	
// change custom logo link class
	add_filter('get_custom_logo','rambo_change_logo_class');
	function rambo_change_logo_class($html)
	{
		$html = str_replace('class="custom-logo-link"', 'class="brand"', $html);
		return $html;
	}


//Cerate enwueu function in customizer setting
function rambo_customize_preview_js() {
	wp_enqueue_script( 'rambo-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20160816', true );
}
add_action( 'customize_preview_init', 'rambo_customize_preview_js' );


if ( ! function_exists( 'wp_body_open' ) ) {

	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
}

function rambo_hide_page_title()
{
    if( !is_shop() ) // is_shop is the conditional tag
        return true;
}
add_filter( 'woocommerce_show_page_title', 'rambo_hide_page_title' );
?>