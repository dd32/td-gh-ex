<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */

if ( ! defined( 'GRIDALICIOUS_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Returns the default options for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_get_default_theme_options() {
	
	$default_theme_options = array(
		//Site Title an Tagline
		'logo'												=> get_template_directory_uri() . '/images/headers/logo.png',
		'logo_alt_text' 									=> '',
		'logo_disable'										=> 1,
		'move_title_tagline'								=> 0,
		
		//Layout
		'theme_layout' 										=> 'right-sidebar',
		'content_layout'									=> 'excerpt-image-left',
		'single_post_image_layout'							=> 'featured',
		
		//Header Image
		'enable_featured_header_image'						=> 'disabled',
		'featured_image_size'								=> 'featured-header',
		'featured_header_image_url'							=> '',
		'featured_header_image_alt'							=> '',
		'featured_header_image_base'						=> 0,

		//Breadcrumb Options
		'breadcumb_option'									=> 0,
		'breadcumb_onhomepage'								=> 0,
		'breadcrumb_seperator'								=> '&raquo;',

		//Custom CSS
		'custom_css'										=> '',

		//Excerpt Options
		'excerpt_length'									=> '40',
		'excerpt_more_text'									=> __( 'Read More ...', 'gridalicious' ),
		
		//Homepage / Frontpage Settings
		'front_page_category'								=> array(),
		
		//Pagination Options
		'pagination_type'									=> 'default',

		//Promotion Headline Options
		'promotion_headline_option'							=> 'homepage',
		'promotion_headline'								=> __( 'Gridalicious is a Premium Responsive WordPress Theme', 'gridalicious' ),
		'promotion_subheadline'								=> __( 'This is promotion headline. You can edit this from Appearance -> Customize -> Theme Options -> Promotion Headline Options', 'gridalicious' ),
		'promotion_headline_button'							=> __( 'Reviews', 'gridalicious' ),
		'promotion_headline_url'							=> esc_url( 'http://wordpress.org/support/view/theme-reviews/gridalicious' ),
		'promotion_headline_target'							=> 1,

		//Search Options
		'search_text'										=> __( 'Search...', 'gridalicious' ),

		//Basic Color Options
		'color_scheme' 										=> 'light',	
		
		//Featured Content Options
		'featured_content_option'							=> 'homepage',
		'featured_content_layout'							=> 'layout-three',
		//move_posts_home replaced with featured_content_position from version 1.1
		'move_posts_home'									=> 0,
		'featured_content_position'							=> 0,
		'featured_content_headline'							=> '',
		'featured_content_subheadline'						=> '',
		'featured_content_type'								=> 'demo-featured-content',
		'featured_content_number'							=> '4',

		//Featured Grid Content Options
		'featured_grid_content_option'						=> 'homepage',
		'featured_grid_content_type'						=> 'demo-featured-grid-content',
		'featured_grid_content_number'						=> '3',
		
		//Reset all settings
		'reset_all_settings'								=> 0,
	);

	return apply_filters( 'gridalicious_default_theme_options', $default_theme_options );
}


/**
 * Returns an array of color schemes registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_color_schemes() {
	$color_scheme_options = array(
		'light' => array(
			'value' 				=> 'light',
			'label' 				=> __( 'Light', 'gridalicious' ),
		),
		'dark' => array(
			'value' 				=> 'dark',
			'label' 				=> __( 'Dark', 'gridalicious' ),
		),
	);

	return apply_filters( 'gridalicious_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of layout options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> array(
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'gridalicious' ),
		),
		'right-sidebar' => array(
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'gridalicious' ),
		),
		'no-sidebar'	=> array(
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'gridalicious' ),
		),
	);
	return apply_filters( 'gridalicious_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-image-left' => array(
			'value' => 'excerpt-image-left',
			'label' => __( 'Show Excerpt (Image Left)', 'gridalicious' ),
		),		
		'full-content' => array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content (No Featured Image)', 'gridalicious' ),
		),
	);

	return apply_filters( 'gridalicious_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Gridalicious 0.1
 */
function gridalicious_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'gridalicious' ),
		),
		'exclude-home' 		=> array(
			'value'	=> 'exclude-home',
			'label' => __( 'Excluding Homepage', 'gridalicious' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'gridalicious' ),
		),
		'entire-site-page-post' 	=> array(
			'value' => 'entire-site-page-post',
			'label' => __( 'Entire Site, Page/Post Featured Image', 'gridalicious' ),
		),
		'pages-posts' 	=> array(
			'value' => 'pages-posts',
			'label' => __( 'Pages and Posts', 'gridalicious' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'gridalicious' ),
		),
	);

	return apply_filters( 'gridalicious_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_image_size_options() {
	$featured_image_size_options = array(
		'featured-header' => array(
			'value' => 'featured-header',
			'label' => __( 'Featured Header Size', 'gridalicious' ),
		),
		'featured' => array(
			'value' => 'featured',
			'label' => __( 'Featured Size', 'gridalicious' ),
		),
		'full-size' => array(
			'value' => 'full-size',
			'label' => __( 'Full Size', 'gridalicious' ),
		),
	);

	return apply_filters( 'gridalicious_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content and grid content layout options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_grid_content_options() {
	$featured_grid_content_content_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'gridalicious' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'gridalicious' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'gridalicious' ),
		),
	);

	return apply_filters( 'gridalicious_featured_grid_content_options', $featured_grid_content_content_options );
}



/**
 * Returns an array of feature content types registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => array(
			'value' => 'demo-featured-content',
			'label' => __( 'Demo Featured Content', 'gridalicious' ),
		),
		'featured-page-content' => array(
			'value' => 'featured-page-content',
			'label' => __( 'Featured Page Content', 'gridalicious' ),
		)
	);

	return apply_filters( 'gridalicious_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_content_layout_options() {
	$featured_content_layout_option = array(
		'layout-three' 		=> array(
			'value'	=> 'layout-three',
			'label' => __( '3 columns', 'gridalicious' ),
		),
		'layout-four' 	=> array(
			'value' => 'layout-four',
			'label' => __( '4 columns', 'gridalicious' ),
		),
	);

	return apply_filters( 'gridalicious_featured_content_layout_options', $featured_content_layout_option );
}


/**
 * Returns an array of feature grid content types registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_grid_content_types() {
	$featured_grid_content_types = array(
		'demo-featured-grid-content' => array(
			'value' => 'demo-featured-grid-content',
			'label' => __( 'Demo Featured Grid Content', 'gridalicious' ),
		),
		'featured-page-grid-content' => array(
			'value' => 'featured-page-grid-content',
			'label' => __( 'Featured Page Grid Content', 'gridalicious' ),
		),
	);

	return apply_filters( 'gridalicious_featured_grid_content_types', $featured_grid_content_types );
}


/**
 * Returns an array of color schemes registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_get_pagination_types() {
	$pagination_types = array(
		'default' => array(
			'value' => 'default',
			'label' => __( 'Default(Older Posts/Newer Posts)', 'gridalicious' ),
		),
		'numeric' => array(
			'value' => 'numeric',
			'label' => __( 'Numeric', 'gridalicious' ),
		),
		'infinite-scroll-click' => array(
			'value' => 'infinite-scroll-click',
			'label' => __( 'Infinite Scroll (Click)', 'gridalicious' ),
		),
		'infinite-scroll-scroll' => array(
			'value' => 'infinite-scroll-scroll',
			'label' => __( 'Infinite Scroll (Scroll)', 'gridalicious' ),
		),
	);

	return apply_filters( 'gridalicious_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'featured' => array(
			'value' => 'featured',
			'label' => __( 'Featured', 'gridalicious' ),
		),
		'full-size' => array(
			'value' => 'full-size',
			'label' => __( 'Full Size', 'gridalicious' ),
		),
		'disabled' => array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'gridalicious' ),
		),
	);
	return apply_filters( 'gridalicious_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Gridalicious 0.1
*/
function gridalicious_get_social_icons_list() {
	$gridalicious_social_icons_list =	array( 
											__( 'Facebook', 'gridalicious' ), 
											__( 'Twitter', 'gridalicious' ), 
											__( 'Googleplus', 'gridalicious' ),
											__( 'Email', 'gridalicious' ),
											__( 'Feed', 'gridalicious' ),	
											__( 'WordPress', 'gridalicious' ), 
											__( 'GitHub', 'gridalicious' ), 
											__( 'LinkedIn', 'gridalicious' ), 
											__( 'Pinterest', 'gridalicious' ), 
											__( 'Flickr', 'gridalicious' ), 
											__( 'Vimeo', 'gridalicious' ), 
											__( 'YouTube', 'gridalicious' ), 
											__( 'Tumblr', 'gridalicious' ), 
											__( 'Instagram', 'gridalicious' ), 
											__( 'PollDaddy', 'gridalicious' ),
											__( 'CodePen', 'gridalicious' ), 
											__( 'Path', 'gridalicious' ), 
											__( 'Dribbble', 'gridalicious' ), 
											__( 'Skype', 'gridalicious' ), 
											__( 'Digg', 'gridalicious' ), 
											__( 'Reddit', 'gridalicious' ), 
											__( 'StumbleUpon', 'gridalicious' ), 
											__( 'Pocket', 'gridalicious' ), 
											__( 'DropBox', 'gridalicious' ),
											__( 'Foursquare', 'gridalicious' ),											
											__( 'Spotify', 'gridalicious' ),
											__( 'Twitch', 'gridalicious' ),
										);

	return apply_filters( 'gridalicious_social_icons_list', $gridalicious_social_icons_list );
}


/**
 * Returns an array of metabox layout options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'gridalicious-layout-option',
			'value' => 'default',
			'label' => __( 'Default', 'gridalicious' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'gridalicious-layout-option',
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'gridalicious' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'gridalicious-layout-option',
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'gridalicious' ),
		),
		'no-sidebar'	=> array(
			'id' 	=> 'gridalicious-layout-option',
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'gridalicious' ),
		),
	);
	return apply_filters( 'gridalicious_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'gridalicious-header-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'gridalicious' ),
		),
		'enable' => array(
			'id'		=> 'gridalicious-header-image',
			'value' 	=> 'enable',
			'label' 	=> __( 'Enable', 'gridalicious' ),
		),	
		'disable' => array(
			'id'		=> 'gridalicious-header-image',
			'value' 	=> 'disable',
			'label' 	=> __( 'Disable', 'gridalicious' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}


/**
 * Returns an array of metabox featured image options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'		=> 'gridalicious-featured-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'gridalicious' ),
		),							   
		'featured' => array(
			'id'		=> 'gridalicious-featured-image',
			'value' 	=> 'featured',
			'label' 	=> __( 'Featured Image', 'gridalicious' )
		),
		'full' => array(
			'id' => 'gridalicious-featured-image',
			'value' => 'full',
			'label' => __( 'Full Size', 'gridalicious' )
		),
		'disable' => array(
			'id' => 'gridalicious-featured-image',
			'value' => 'disable',
			'label' => __( 'Disable Image', 'gridalicious' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}


/**
 * Returns gridalicious_contents registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_get_content() {
	$theme_data = wp_get_theme();

	$gridalicious_content['left'] 	= sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved.', '1: Year, 2: Site Title with home URL', 'gridalicious' ), date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

	$gridalicious_content['right']	= esc_attr( $theme_data->get( 'Name') ) . '&nbsp;' . __( 'by', 'gridalicious' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_attr( $theme_data->get( 'Author' ) ) .'</a>';

	return apply_filters( 'gridalicious_get_content', $gridalicious_content );
}