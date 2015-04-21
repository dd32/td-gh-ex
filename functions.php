<?php
/**Theme Name	: Appointment
 * Theme Core Functions and Codes
*/
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI', get_template_directory_uri());
    define('WEBRITI_TEMPLATE_DIR' , get_template_directory());
    define('WEBRITI_THEME_FUNCTIONS_PATH' , WEBRITI_TEMPLATE_DIR.'/functions');
    define('WEBRITI_THEME_OPTIONS_PATH' , WEBRITI_TEMPLATE_DIR_URI.'/functions/theme_options');
	require( WEBRITI_THEME_FUNCTIONS_PATH .'/scripts/script.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH .'/menu/default_menu_walker.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH .'/menu/appoinment_nav_walker.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH .'/widgets/sidebars.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH .'/widgets/appointment_info_widget.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tag.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php');
    
	/* Theme Setup Function */
	add_action( 'after_setup_theme', 'appointment_setup' );
	
	function appointment_setup()
	{	
	// Load text domain for translation-ready
    load_theme_textdomain( 'appointment', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );

    add_theme_support( 'post-thumbnails' ); //supports featured image
	// Register primary menu 
    register_nav_menu( 'primary', __( 'Primary Menu', 'appointment' ) );
	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
	// Set the content_width with 900
    if ( ! isset( $content_width ) ) $content_width = 900;
	
	require_once('theme_setup_data.php');
		// setup admin pannel defual data for index page		
		$appointment_options=theme_data_setup();
		
		$current_theme_options = get_option('appointment_options'); // get existing option data 		
		if($current_theme_options)
		{ 	$appointment_options = array_merge($appointment_options, $current_theme_options);
			update_option('appointment_options',$appointment_options);	// Set existing and new option data			
		}
		else
		{
			add_option('appointment_options', $appointment_options);
		}
		require( WEBRITI_THEME_FUNCTIONS_PATH . '/theme_options/option_pannel.php' ); // for Option Panel Settings		
}
// set appoinment page title       
function appointment_title( $title, $sep )
{	
    global $paged, $page;
		
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
			$title = "$title $sep " . sprintf( _e( 'Page', 'appointment' ), max( $paged, $page ) );
		return $title;
}	
add_filter( 'wp_title', 'appointment_title', 10,2 );

add_filter('get_avatar','appointment_add_gravatar_class');

function appointment_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-circle", $class);
    return $class;
}
function appointment_add_to_author_profile( $contactmethods ) {
		$contactmethods['facebook_profile'] = __('Facebook Profile URL','appointment');
		$contactmethods['twitter_profile'] = __('Twitter Profile URL','appointment');
		$contactmethods['linkedin_profile'] = __('Linkedin Profile URL','appointment');
		$contactmethods['google_profile'] = __('Google Profile URL','appointment');
		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'appointment_add_to_author_profile', 10, 1);
	
	/********** Image Resize *************/
	if ( function_exists( 'add_image_size' ) ) 
	{ 
	add_image_size('appointment_latest_news_img',190,190,true);
	add_image_size('webriti_blogdetail_img',750,350,true);
	add_image_size('webriti_blogright_img',270,260,true);
	}
	
	function appointment_excerpt_length($length ) {
	        return 25;
	        }
	        add_filter( 'excerpt_length', 'appointment_excerpt_length', 999 );
	       
	        add_filter('get_the_excerpt','appointment_post_slider_excerpt');
	        add_filter('excerpt_more','__return_false');
        function appointment_post_slider_excerpt($output){
		
		     if(empty($output))
			 {
			 }
			 else
			 {
			      if(str_word_count($output) < 25)
				{
					return '<div class="slide-text-bg2">' .'<span>'.$output.'</span>'.'</div>';
				}
				else
				{
					return '<div class="slide-text-bg2">' .'<span>'.$output.'</span>'.'</div>'.
	                       '<div class="blog-btn-area-sm"><a href="' . get_permalink() . '" class="blog-btn-sm">Read More</a></div>';
				}
			 }
				
                
        }
						
		function get_home_blog_excerpt()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);		
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 145);		
		$len=strlen($excerpt);	 
		if($original_len>275) {
		$excerpt = $excerpt;
		return $excerpt . '<div class="blog-btn-area-sm"><a href="' . get_permalink() . '" class="blog-btn-sm">Read More</a></div>';
		}
		else
		{ return $excerpt; }
	}
?>