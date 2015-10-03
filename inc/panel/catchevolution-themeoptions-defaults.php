<?php
/**
 * @package Catch Themes
 * @subpackage Catch_Evolution_Pro
 * @since Catch Evolution Pro 1.0
 */

/**
 * Set the default values for all the settings. If no user-defined values
 * is available for any setting, these defaults will be used.
 */
global $catchevolution_options_defaults;
$catchevolution_options_defaults = array(
	'fav_icon'							=> get_template_directory_uri().'/images/favicon.ico',
 	'remove_favicon'					=> '1',	
	'web_clip'							=> get_template_directory_uri().'/images/apple-touch-icon.png',
 	'remove_web_clip'					=> '1',
	'featured_logo_header'				=> get_template_directory_uri().'/images/logo.png',
	'disable_header'					=> '0',
 	'remove_header_logo'				=> '1',
 	'remove_site_title'					=> '0',
 	'remove_site_description'			=> '0',
	'site_title_above'					=> '0',
	'seperate_logo'						=> '0',
	'disable_header_menu'				=> '0',
	'search_display_text'				=> 'Search',
	'color_scheme'						=> 'light',
	'sidebar_layout'					=> 'right-sidebar',
	'content_layout'					=> 'excerpt',
	'reset_sidebar_layout'				=> '2',
 	'front_page_category'				=> array(),
	'exclude_slider_post'				=> '0',
 	'slider_qty'						=> 4,
	'enable_slider'						=> 'enable-slider-homepage',
	'featured_slider'					=> array(),
 	'transition_effect'					=> 'fade',
 	'transition_delay'					=> 4,
 	'transition_duration'				=> 1,
	'disable_footer_social'				=> 0,
 	'social_facebook'					=> '',
 	'social_twitter'					=> '',
 	'social_googleplus'					=> '',
 	'social_pinterest'					=> '',
 	'social_youtube'					=> '',
 	'social_vimeo'						=> '',
 	'social_linkedin'					=> '',
 	'social_aim'						=> '',
 	'social_myspace'					=> '',
 	'social_flickr'						=> '',
 	'social_tumblr'						=> '',
 	'social_deviantart'					=> '',
 	'social_dribbble'					=> '',
 	'social_wordpress'					=> '',
 	'social_rss'						=> '',
	'social_slideshare'					=> '',
 	'social_instagram'					=> '',
 	'social_skype'						=> '',
	'social_soundcloud'					=> '',
	'social_email'						=> '',
	'social_contact'					=> '',
	'social_xing'						=> '',
	'social_meetup'						=> '',
 	'custom_css'						=> '',
 	'analytic_header'					=> '',
 	'analytic_footer'					=> '',
 	'sidebar_layout'					=> 'right-sidebar',
 	'more_tag_text'						=> 'Continue Reading &rarr;',
 	'excerpt_length'					=> 30,
	'reset_more_tag'					=> '2',
	'feed_url'							=> '',
);
global $catchevolution_options_settings;
$catchevolution_options_settings = catchevolution_options_set_defaults( $catchevolution_options_defaults );

function catchevolution_options_set_defaults( $catchevolution_options_defaults ) {
	$catchevolution_options_settings = array_merge( $catchevolution_options_defaults, (array) get_option( 'catchevolution_options', array() ) );
	return $catchevolution_options_settings;
}


/**
 * Returns an array of color schemes registered for adventurous.
 *
 * @since Catch Evolution 2.6
 */
function catchevolution_color_schemes() {
	$options = array(
		'light' 		=> __( 'Light', 'catch-evolution' ),
		'dark'			=> __( 'Dark', 'catch-evolution' ),
	);

	return apply_filters( 'catchevolution_color_schemes', $options );
}


/**
 * Returns an array of sidebar layout options
 *
 * @since Catch Evolution 2.6
 */
function catchevolution_sidebar_layout_options() {
	$options = array(
		'right-sidebar' => __( 'Right Sidebar', 'catch-evolution' ),
		'left-sidebar' 	=> __( 'Left Sidebar', 'catch-evolution' ),
		'no-sidebar'	=> __( 'No Sidebar', 'catch-evolution' ),
		'three-columns'	=> __( 'Three Columns', 'catch-evolution' ),
	);

	return apply_filters( 'catchevolution_sidebar_layout_options', $options );
}


/**
 * Returns an array of content layout options
 *
 * @since Catch Evolution 2.6
 */
function catchevolution_content_layout_options() {
	$options = array(
		'full' 		=> __( 'Full Content Display', 'catch-evolution' ),
		'excerpt' 	=> __( 'Excerpt/Blog Display', 'catch-evolution' ),
	);

	return apply_filters( 'catchevolution_content_layout_options', $options );
}

/**
 * Returns an array of slider enable options
 *
 * @since Catch Evolution 2.6
 */
function catchevolution_enable_slider_options() {
	$options = array(
		'enable-slider-homepage'=> __( 'Homepage', 'catch-evolution' ),
		'enable-slider-allpage' => __( 'Entire Site', 'catch-evolution' ),
		'disable-slider' 		=> __( 'Disable', 'catch-evolution' ),
	);

	return apply_filters( 'catchevolution_enable_slider_options', $options );
}


/**
 * Returns an array of slider transition effects
 *
 * @since Catch Evolution 2.6
 */
function catchevolution_transition_effects() {
	$options = array(
		'fade'			=> __( 'fade', 'catch-evolution' ),
		'wipe' 			=> __( 'wipe', 'catch-evolution' ),
		'scrollUp' 		=> __( 'scrollUp', 'catch-evolution' ),
		'scrollDown'	=> __( 'scrollDown', 'catch-evolution' ),
		'scrollUp' 		=> __( 'scrollUp', 'catch-evolution' ),
		'scrollLeft'	=> __( 'scrollLeft', 'catch-evolution' ),
		'scrollRight'	=> __( 'scrollRight', 'catch-evolution' ),
		'blindX' 		=> __( 'blindX', 'catch-evolution' ),
		'blindY' 		=> __( 'blindY', 'catch-evolution' ),
		'blindZ' 		=> __( 'blindZ', 'catch-evolution' ),
		'cover' 		=> __( 'cover', 'catch-evolution' ),
		'shuffle' 		=> __( 'shuffle', 'catch-evolution' ),
	);

	return apply_filters( 'catchevolution_transition_effects', $options );
}