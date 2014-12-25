<?php
/**
 * @package Blue Planet
 * @since Blue Planet 1.0.0
 */

/**
 * Set the default values for all the settings. If no user-defined values
 * is available for any setting, these defaults will be used.
 */
global $blueplanet_options_defaults;
$blueplanet_options_defaults = array(
		'custom_favicon'               => '',
		'custom_css'                   => '*{outline:none;}',
		'feedburner_url'               => '',
		'flg_enable_goto_top'          => '0',
		'banner_background_color'      => '#00ADB3',
		'search_placeholder'           => __( 'Search here...', 'blue-planet' ),
		'flg_hide_search_box'          => '1',
		'flg_hide_social_icons'        => '0',
		'flg_enable_footer_widgets'    => '0',
		'number_of_footer_widgets'     => '3',
		'copyright_text'               => __( 'Copyright &copy; All Rights Reserved.', 'blue-planet' ),
		'flg_hide_powered_by'          => '1',
		'flg_hide_footer_social_icons' => '0',
		'default_layout'               => 'right-sidebar',
		'content_layout'               => 'excerpt',
		'read_more_text'               => __( 'Read more', 'blue-planet' ),
		'excerpt_length'               => '50',
		'slider_status'                => 'none',
		'transition_effect'            => 'fade',
		'direction_nav'                => '1',
		'slider_autoplay'              => '1',
		'transition_delay'             => 4,
		'transition_length'            => 1,
		'main_slider_image'            => array(),
		'slider_status_2'              => 'none',
		'number_of_slides_2'           => 3,
		'slider_category_2'            => '',
		'control_nav_2'                => '1',
		'direction_nav_2'              => '1',
		'transition_effect_2'          => 'fade',
		'slider_autoplay_2'            => '1',
		'slider_caption_2'             => '1',
		'transition_delay_2'           => 4,
		'transition_length_2'          => 1,
		'javascript_header'            => '',
		'javascript_footer'            => '',
		'social_facebook'              => '',
		'social_twitter'               => '',
		'social_googleplus'            => '',
		'social_youtube'               => '',
		'social_pinterest'             => '',
		'social_linkedin'              => '',
		'social_vimeo'                 => '',
		'social_flickr'                => '',
		'social_tumblr'                => '',
		'social_dribbble'              => '',
		'social_deviantart'            => '',
		'social_rss'                   => '',
		'social_instagram'             => '',
		'social_skype'                 => '',
		'social_500px'                 => '',
		'social_email'                 => '',
		'social_forrst'                => '',
		'social_stumbleupon'           => '',
		'social_digg'                  => '',
);
global $blueplanet_options_settings;
$blueplanet_options_settings = get_option( 'blueplanet_options' );

// $blueplanet_options_settings = blueplanet_options_set_defaults( $blueplanet_options_defaults );

// function blueplanet_options_set_defaults( $blueplanet_options_defaults ) {
// 	if(!get_option('blueplanet_options')){
// 		add_option('blueplanet_options', $blueplanet_options_defaults);
// 	}
// 	$blueplanet_options_settings = array_merge( $blueplanet_options_defaults, (array) get_option( 'blueplanet_options', array() ) );
// 	return $blueplanet_options_settings;
// }

function blueplanet_get_option( $key ){

	global $blueplanet_options_settings;
	global $blueplanet_options_defaults;

	$output = '';

	// Set default value first
	if ( is_array( $blueplanet_options_defaults ) && isset( $blueplanet_options_defaults[$key] ) ) {
		$output = $blueplanet_options_defaults[$key];
	}

	// Has any value?
	if ( is_array( $blueplanet_options_settings ) && isset( $blueplanet_options_settings[$key] ) ) {
		$output = $blueplanet_options_settings[$key];
	}

	return $output;

}

function blueplanet_get_option_all(){

	global $blueplanet_options_settings;
	global $blueplanet_options_defaults;

	$output = array();
	$output = array_merge( $blueplanet_options_defaults, (array)$blueplanet_options_settings );
	return $output;

}
