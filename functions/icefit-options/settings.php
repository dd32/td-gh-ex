<?php
/**
 *
 * Wortex Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2015 Mathieu Sarrasin - Iceable Media
 *
 * Admin settings template
 *
 */

// Load the icefit options framework
include_once('icefit-options.php');

// Set setting panel name and slug
$wortex_settings_name = __("Wortex Lite Settings", 'wortex');
$wortex_settings_slug = "wortex_settings";

// Set settings template
function wortex_settings_template() {

	$settings_options = array();

// START GO PRO PAGE

	$settings_options[] = array(
		'name'          => __('Go Pro', 'wortex'),
		'type'          => 'start_menu',
		'id'            => 'gopro_page',
		'icon'          => 'down',
	);

		$settings_options[] = array(
			'name'          => __('Upgrade to Wortex Pro!', 'wortex'),
			'desc'          => '',
			'id'            => 'gopro',
			'type'          => 'gopro',
			'default'       => '',
		);

	$settings_options[] = array('type' => 'end_menu');

// END GO PRO PAGE

//START MAIN SETTINGS PAGE

	$settings_options[] = array(
		'name'          => __('Main settings', 'wortex'),
		'type'          => 'start_menu',
		'id'            => 'main',
		'icon'          => 'control',
	);

		$settings_options[] = array(
			'name'          => __('Layout', 'wortex'),
			'desc'          => __('Choose between wide or boxed layout', 'wortex'),
			'id'            => 'layout',
			'type'          => 'radio',
			'default'       => 'Boxed',
			'values'		=> array (
								array( 'value' => 'Wide', 'display' => __('Wide', 'wortex') ),
								array( 'value' => 'Boxed', 'display' => __('Boxed', 'wortex') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Logo', 'wortex'),
			'desc'          => __('Upload your own logo', 'wortex'),
			'id'            => 'logo',
			'type'          => 'image',
			'default'       => '',
		);

		$settings_options[] = array(
			'name'          => __('Site Title', 'wortex'),
			'desc'          => __('Choose "display title" if you want to use a text-based title instead of an uploaded logo.', 'wortex'),
			'id'            => 'header_title',
			'type'          => 'radio',
			'default'       => 'Use Logo',
			'values'		=> array (
								array( 'value' => 'Use Logo', 'display' => __('Use Logo', 'wortex') ),
								array( 'value' => 'Display Title', 'display' => __('Display Title', 'wortex') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Favicon', 'wortex'),
			'desc'          => __('Set your favicon. 16x16 or 32x32 pixels, either 8-bit or 24-bit colors. PNG (W3C standard), GIF, or ICO.', 'wortex'),
			'id'            => 'favicon',
			'type'          => 'image',
			'default'       => '',
		);

		$settings_options[] = array(
			'name'          => __('Display Tagline', 'wortex'),
			'desc'          => __('Display your site description (tagline) on the right side of the header.', 'wortex'),
			'id'            => 'display_tagline',
			'type'          => 'radio',
			'default'       => 'Off',
			'values'		=> array (
								array( 'value' => 'Off', 'display' => __('Off', 'wortex') ),
								array( 'value' => 'On', 'display' => __('On', 'wortex') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Blog Index Shows', 'wortex'),
			'desc'          => __('Choose what content to display on Main Blog page and archives', 'wortex'),
			'id'            => 'blog_index_shows',
			'type'          => 'radio',
			'default'       => 'Excerpt',
			'values'		=> array (
								array( 'value' => 'Excerpt', 'display' => __('Excerpt', 'wortex') ),
								array( 'value' => 'Full content', 'display' => __('Full content', 'wortex') ),
								),
		);
		
		$settings_options[] = array(
			'name'          => __('Responsive mode', 'wortex'),
			'desc'          => __('Turn this setting off if you want your site to be unresponsive.', 'wortex'),
			'id'            => 'responsive_mode',
			'type'          => 'radio',
			'default'       => 'on',
			'values'		=> array (
								array( 'value' => 'on', 'display' => __('On', 'wortex') ),
								array( 'value' => 'off', 'display' => __('Off', 'wortex') ),
								),
		);

	$settings_options[] = array('type' => 'end_menu');
// END MAIN SETTINGS SECTION

// START HEADER IMAGE PAGE
	$settings_options[] = array(
		'name'          => __('Custom Header', 'wortex'),
		'type'          => 'start_menu',
		'id'            => 'custom_header',
		'icon'          => 'picture',
	);

		$settings_options[] = array(
			'name'          => __('Display custom header on Homepage', 'wortex'),
			'desc'          => __('Enable or disable display of custom header image on the front page.', 'wortex'),
			'id'            => 'home_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'wortex') ),
								array( 'value' => 'Off', 'display' => __('Off', 'wortex') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Display custom header on Blog Index', 'wortex'),
			'desc'          => __('Enable or disable display of custom header image on blog index pages.', 'wortex'),
			'id'            => 'blog_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'wortex') ),
								array( 'value' => 'Off', 'display' => __('Off', 'wortex') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Display custom header on Blog Posts', 'wortex'),
			'desc'          => __('Enable or disable display of custom header image on single blog posts', 'wortex'),
			'id'            => 'single_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'wortex') ),
								array( 'value' => 'Off', 'display' => __('Off', 'wortex') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Display custom header on Pages', 'wortex'),
			'desc'          => __('Enable or disable display of custom header image on individual pages.', 'wortex'),
			'id'            => 'pages_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'wortex') ),
								array( 'value' => 'Off', 'display' => __('Off', 'wortex') ),
								),
		);


	$settings_options[] = array('type' => 'end_menu');
// END HEADER IMAGE PAGE

// START SUPPORT PAGE
	$settings_options[] = array(
		'name'          => __('Support and Feedback', 'wortex'),
		'type'          => 'start_menu',
		'id'            => 'support_feedback',
		'icon'          => 'network',
	);

		$settings_options[] = array(
			'name'          => __('Support and Feedback', 'wortex'),
			'desc'          => '',
			'id'            => 'support_feedback',
			'type'          => 'support_feedback',
			'default'       => '',
		);

	$settings_options[] = array('type' => 'end_menu');
// END SUPPORT PAGE

	return $settings_options;
}
?>