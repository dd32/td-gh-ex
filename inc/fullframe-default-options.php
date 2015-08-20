<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Full Frame
 * @since Full Frame 1.0 
 */

if ( ! defined( 'FULLFRAME_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Returns the default options for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_get_default_theme_options() {
	
	$default_theme_options = array(
		//Site Title an Tagline
		'logo'												=> get_template_directory_uri() . '/images/headers/logo.png',
		'logo_alt_text' 									=> '',
		'logo_disable'										=> 1,
		'move_title_tagline'								=> 0,
		
		//Layout
		'theme_layout' 										=> 'right-sidebar',
		'content_layout'									=> 'excerpt-featured-image',
		'single_post_image_layout'							=> 'disabled',
		
		//Header Image
		'enable_featured_header_image'						=> 'exclude-home-page-post',
		'featured_image_size'								=> 'slider',
		'featured_header_image_url'							=> '',
		'featured_header_image_alt'							=> '',
		'featured_header_image_base'						=> 0,

		//Breadcrumb Options
		'breadcumb_option'									=> 0,
		'breadcumb_onhomepage'								=> 0,
		'breadcumb_seperator'								=> '&raquo;',

		//Custom CSS
		'custom_css'										=> '',

		//Excerpt Options
		'excerpt_length'									=> '40',
		'excerpt_more_text'									=> __( 'Read More ...', 'full-frame' ),
		
		//Homepage / Frontpage Settings
		'front_page_category'								=> array(),
		
		//Pagination Options
		'pagination_type'									=> 'default',

		//Promotion Headline Options
		'promotion_headline_option'							=> 'homepage',
		'promotion_headline'								=> __( 'Full Frame is a Premium Responsive WordPress Theme', 'full-frame' ),
		'promotion_subheadline'								=> __( 'This is promotion headline. You can edit this from Appearance -> Customize -> Theme Options -> Promotion Headline Options', 'full-frame' ),
		'promotion_headline_button'							=> __( 'Reviews', 'full-frame' ),
		'promotion_headline_url'							=> esc_url( 'http://wordpress.org/support/view/theme-reviews/full-frame' ),
		'promotion_headline_target'							=> 1,

		//Search Options
		'search_text'										=> __( 'Search...', 'full-frame' ),

		//Basic Color Options
		'color_scheme' 										=> 'light',	
		
		//Featured Content Options
		'featured_content_option'							=> 'homepage',
		'featured_content_layout'							=> 'layout-three',
		'featured_content_slider'							=> 0,
		'featured_content_position'							=> 0,
		'featured_content_headline'							=> '',
		'featured_content_subheadline'						=> '',
		'featured_content_type'								=> 'demo-featured-content',
		'featured_content_enable_title'						=> 1,
		'featured_content_enable_excerpt_content'			=> 0,
		'featured_content_number'							=> '4',

		'featured_content_background_image'					=> get_template_directory_uri() . '/images/default-featured-bg.jpg',

		//Featured Slider Options
		'featured_slider_option'							=> 'homepage',
		'featured_slider_image_loader'						=> 'true',
		'featured_slide_transition_effect'					=> 'fadeout',
		'featured_slide_transition_delay'					=> '4',
		'featured_slide_transition_length'					=> '1',
		'featured_slider_type'								=> 'demo-featured-slider',
		'featured_slide_number'								=> '4',
		
		//Reset all settings
		'reset_all_settings'								=> 0,
	);

	return apply_filters( 'fullframe_default_theme_options', $default_theme_options );
}


/**
 * Returns an array of color schemes registered for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_color_schemes() {
	$color_scheme_options = array(
		'light' => array(
			'value' 				=> 'light',
			'label' 				=> __( 'Light', 'full-frame' ),
		),
		'dark' => array(
			'value' 				=> 'dark',
			'label' 				=> __( 'Dark', 'full-frame' ),
		),
	);

	return apply_filters( 'fullframe_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of layout options registered for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> array(
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'full-frame' ),
		),
		'right-sidebar' => array(
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'full-frame' ),
		),
		'no-sidebar'	=> array(
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'full-frame' ),
		),
	);
	return apply_filters( 'fullframe_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-featured-image' => array(
			'value' => 'excerpt-featured-image',
			'label' => __( 'Show Excerpt', 'full-frame' ),
		),		
		'full-content' => array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content (No Featured Image)', 'full-frame' ),
		),
	);

	return apply_filters( 'fullframe_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Fullframe 1.0
 */
function fullframe_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'full-frame' ),
		),
		'exclude-home' 		=> array(
			'value'	=> 'exclude-home',
			'label' => __( 'Excluding Homepage', 'full-frame' ),
		),
		'exclude-home-page-post' 	=> array(
			'value' => 'exclude-home-page-post',
			'label' => __( 'Excluding Homepage, Page/Post Featured Image', 'full-frame' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'full-frame' ),
		),
		'entire-site-page-post' 	=> array(
			'value' => 'entire-site-page-post',
			'label' => __( 'Entire Site, Page/Post Featured Image', 'full-frame' ),
		),
		'pages-posts' 	=> array(
			'value' => 'pages-posts',
			'label' => __( 'Pages and Posts', 'full-frame' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'full-frame' ),
		),
	);

	return apply_filters( 'fullframe_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Fullframe 1.0
 */
function fullframe_featured_image_size_options() {
	$featured_image_size_options = array(
		'full' 		=> array(
			'value'	=> 'full',
			'label' => __( 'Full Image', 'full-frame' ),
		),
		'large' 	=> array(
			'value' => 'large',
			'label' => __( 'Large Image', 'full-frame' ),
		),
		'slider'		=> array(
			'value' => 'slider',
			'label' => __( 'Slider Image', 'full-frame' ),
		),
	);

	return apply_filters( 'fullframe_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content and slider layout options registered for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_featured_slider_content_options() {
	$featured_slider_content_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'full-frame' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'full-frame' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'full-frame' ),
		),
	);

	return apply_filters( 'fullframe_featured_slider_content_options', $featured_slider_content_options );
}


/**
 * Returns an array of feature content types registered for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => array(
			'value' => 'demo-featured-content',
			'label' => __( 'Demo Featured Content', 'full-frame' ),
		),
		'featured-page-content' => array(
			'value' => 'featured-page-content',
			'label' => __( 'Featured Page Content', 'full-frame' ),
		)
	);

	return apply_filters( 'fullframe_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_featured_content_layout_options() {
	$featured_content_layout_option = array(
		'layout-three' 		=> array(
			'value'	=> 'layout-three',
			'label' => __( '3 columns', 'full-frame' ),
		),
		'layout-four' 	=> array(
			'value' => 'layout-four',
			'label' => __( '4 columns', 'full-frame' ),
		),
	);

	return apply_filters( 'fullframe_featured_content_layout_options', $featured_content_layout_option );
}

/**
 * Returns an array of featured content show registered for fullframe.
 *
 * @since Fullframe 1.6
 */
function fullframe_featured_content_show() {
	$featured_content_show_option = array(
		'excerpt' 		=> array(
			'value'	=> '1',
			'label' => __( 'Show Excerpt', 'full-frame' ),
		),
		'full-content' 	=> array(
			'value' => '2',
			'label' => __( 'Show Full Content', 'full-frame' ),
		),
		'hide-content' 	=> array(
			'value' => '0',
			'label' => __( 'Hide Content', 'full-frame' ),
		),
	);

	return apply_filters( 'fullframe_featured_content_show', $featured_content_show_option );
}


/**
 * Returns an array of feature slider types registered for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_featured_slider_types() {
	$featured_slider_types = array(
		'demo-featured-slider' => array(
			'value' => 'demo-featured-slider',
			'label' => __( 'Demo Featured Slider', 'full-frame' ),
		),
		'featured-page-slider' => array(
			'value' => 'featured-page-slider',
			'label' => __( 'Featured Page Slider', 'full-frame' ),
		),
	);

	return apply_filters( 'fullframe_featured_slider_types', $featured_slider_types );
}


/**
 * Returns an array of feature slider transition effects
 *
 * @since Fullframe 1.0
 */
function fullframe_featured_slide_transition_effects() {
	$featured_slide_transition_effects = array(
		'fade' 		=> array(
			'value'	=> 'fade',
			'label' => __( 'Fade', 'full-frame' ),
		),
		'fadeout' 	=> array(
			'value'	=> 'fadeout',
			'label' => __( 'Fade Out', 'full-frame' ),
		),
		'none' 		=> array(
			'value' => 'none',
			'label' => __( 'None', 'full-frame' ),
		),
		'scrollHorz'=> array(
			'value' => 'scrollHorz',
			'label' => __( 'Scroll Horizontal', 'full-frame' ),
		),
		'scrollVert'=> array(
			'value' => 'scrollVert',
			'label' => __( 'Scroll Vertical', 'full-frame' ),
		),
		'flipHorz'	=> array(
			'value' => 'flipHorz',
			'label' => __( 'Flip Horizontal', 'full-frame' ),
		),
		'flipVert'	=> array(
			'value' => 'flipVert',
			'label' => __( 'Flip Vertical', 'full-frame' ),
		),
		'tileSlide'	=> array(
			'value' => 'tileSlide',
			'label' => __( 'Tile Slide', 'full-frame' ),
		),
		'tileBlind'	=> array(
			'value' => 'tileBlind',
			'label' => __( 'Tile Blind', 'full-frame' ),
		),
		'shuffle'	=> array(
			'value' => 'shuffle',
			'label' => __( 'Suffle', 'full-frame' ),
		)
	);

	return apply_filters( 'fullframe_featured_slide_transition_effects', $featured_slide_transition_effects );
}


/**
 * Returns an array of featured slider image loader options
 *
 * @since Full Frame 2.3
 */
function fullframe_featured_slider_image_loader() {
	$color_scheme_options = array(
		'true' => array(
			'value' 				=> 'true',
			'label' 				=> __( 'True', 'full-frame' ),
		),
		'wait' => array(
			'value' 				=> 'wait',
			'label' 				=> __( 'Wait', 'full-frame' ),
		),
		'false' => array(
			'value' 				=> 'false',
			'label' 				=> __( 'False', 'full-frame' ),
		),		
	);

	return apply_filters( 'fullframe_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of color schemes registered for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_get_pagination_types() {
	$pagination_types = array(
		'default' => array(
			'value' => 'default',
			'label' => __( 'Default(Older Posts/Newer Posts)', 'full-frame' ),
		),
		'numeric' => array(
			'value' => 'numeric',
			'label' => __( 'Numeric', 'full-frame' ),
		),
		'infinite-scroll-click' => array(
			'value' => 'infinite-scroll-click',
			'label' => __( 'Infinite Scroll (Click)', 'full-frame' ),
		),
		'infinite-scroll-scroll' => array(
			'value' => 'infinite-scroll-scroll',
			'label' => __( 'Infinite Scroll (Scroll)', 'full-frame' ),
		),
	);

	return apply_filters( 'fullframe_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Full Frame 1.0
 */
function fullframe_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'featured' => array(
			'value' => 'featured',
			'label' => __( 'Featured', 'full-frame' ),
		),
		'full-size' => array(
			'value' => 'full-size',
			'label' => __( 'Full Size', 'full-frame' ),
		),
		'disabled' => array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'full-frame' ),
		),
	);
	return apply_filters( 'fullframe_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Fullframe 1.0
*/
function fullframe_get_social_icons_list() {
	$fullframe_social_icons_list =	array( 
											__( 'Facebook', 'full-frame' ), 
											__( 'Twitter', 'full-frame' ), 
											__( 'Googleplus', 'full-frame' ),
											__( 'Email', 'full-frame' ),
											__( 'Feed', 'full-frame' ),	
											__( 'WordPress', 'full-frame' ), 
											__( 'GitHub', 'full-frame' ), 
											__( 'LinkedIn', 'full-frame' ), 
											__( 'Pinterest', 'full-frame' ), 
											__( 'Flickr', 'full-frame' ), 
											__( 'Vimeo', 'full-frame' ), 
											__( 'YouTube', 'full-frame' ), 
											__( 'Tumblr', 'full-frame' ), 
											__( 'Instagram', 'full-frame' ), 
											__( 'PollDaddy', 'full-frame' ),
											__( 'CodePen', 'full-frame' ), 
											__( 'Path', 'full-frame' ), 
											__( 'Dribbble', 'full-frame' ), 
											__( 'Skype', 'full-frame' ), 
											__( 'Digg', 'full-frame' ), 
											__( 'Reddit', 'full-frame' ), 
											__( 'StumbleUpon', 'full-frame' ), 
											__( 'Pocket', 'full-frame' ), 
											__( 'DropBox', 'full-frame' ),
											__( 'Foursquare', 'full-frame' ),											
											__( 'Spotify', 'full-frame' ),
											__( 'Twitch', 'full-frame' ),
										);

	return apply_filters( 'fullframe_social_icons_list', $fullframe_social_icons_list );
}


/**
 * Returns an array of metabox layout options registered for fullframe.
 *
 * @since Full Frame 1.0
 */
function fullframe_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'fullframe-layout-option',
			'value' => 'default',
			'label' => __( 'Default', 'full-frame' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'fullframe-layout-option',
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'full-frame' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'fullframe-layout-option',
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'full-frame' ),
		),
		'no-sidebar'	=> array(
			'id' 	=> 'fullframe-layout-option',
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'full-frame' ),
		)
	);
	return apply_filters( 'fullframe_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for fullframe.
 *
 * @since Full Frame 1.0
 */
function fullframe_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'fullframe-header-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'full-frame' ),
		),
		'enable' => array(
			'id'		=> 'fullframe-header-image',
			'value' 	=> 'enable',
			'label' 	=> __( 'Enable', 'full-frame' ),
		),	
		'disable' => array(
			'id'		=> 'fullframe-header-image',
			'value' 	=> 'disable',
			'label' 	=> __( 'Disable', 'full-frame' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}


/**
 * Returns an array of metabox featured image options registered for fullframe.
 *
 * @since Full Frame 1.0
 */
function fullframe_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'		=> 'fullframe-featured-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'full-frame' ),
		),							   
		'featured' => array(
			'id'		=> 'fullframe-featured-image',
			'value' 	=> 'featured',
			'label' 	=> __( 'Featured Image', 'full-frame' )
		),
		'full' => array(
			'id' => 'fullframe-featured-image',
			'value' => 'full',
			'label' => __( 'Full Size', 'full-frame' )
		),
		'disable' => array(
			'id' => 'fullframe-featured-image',
			'value' => 'disable',
			'label' => __( 'Disable Image', 'full-frame' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}


/**
 * Returns fullframe_contents registered for fullframe.
 *
 * @since Fullframe 1.0
 */
function fullframe_get_content() {
	$theme_data = wp_get_theme();

	$fullframe_content['left'] 	= sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved.', '1: Year, 2: Site Title with home URL', 'full-frame' ), date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

	$fullframe_content['right']	= esc_attr( $theme_data->get( 'Name') ) . '&nbsp;' . __( 'by', 'full-frame' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_attr( $theme_data->get( 'Author' ) ) .'</a>';

	return apply_filters( 'fullframe_get_content', $fullframe_content );
}