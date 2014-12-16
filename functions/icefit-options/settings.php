<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013-2014 Mathieu Sarrasin - Iceable Media
 *
 * Admin settings template
 *
 */

// Load the icefit options framework
include_once('icefit-options.php');

// Set setting panel name and slug
$boldr_settings_name = __('BoldR Lite Settings', 'boldr');
$boldr_settings_slug = 'boldr_settings';

// Set settings template
function boldr_settings_template() {

	$settings_options = array();

// START PAGE 0

	$settings_options[] = array(
		'name'          => __('Go Pro', 'boldr'),
		'type'          => 'start_menu',
		'id'            => 'gopro_page',
		'icon'          => 'down',
	);

		$settings_options[] = array(
			'name'          => __('Upgrade to BoldR Pro!', 'boldr'),
			'desc'          => '',
			'id'            => 'gopro',
			'type'          => 'gopro',
			'default'       => '',
		);

	$settings_options[] = array('type' => 'end_menu');

// END PAGE 0


// START PAGE 1
	$settings_options[] = array(
		'name'          => __('Main settings', 'boldr'),
		'type'          => 'start_menu',
		'id'            => 'main',
		'icon'          => 'control',
	);

		$settings_options[] = array(
			'name'          => __('Logo', 'boldr'),
			'desc'          => __('Upload your own logo', 'boldr'),
			'id'            => 'logo',
			'type'          => 'image',
			'default'       => '',
		);

		$settings_options[] = array(
			'name'          => __('Site Title', 'boldr'),
			'desc'          => __('Choose "display title" if you want to use a text-based title instead of an uploaded logo.', 'boldr'),
			'id'            => 'header_title',
			'type'          => 'radio',
			'default'       => 'Use Logo',
			'values'		=> array (
								array( 'value' => 'Use Logo', 'display' => __('Use Logo', 'boldr') ),
								array( 'value' => 'Display Title', 'display' => __('Display Title', 'boldr') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Favicon', 'boldr'),
			'desc'          => __('Set your favicon. 16x16 or 32x32 pixels, either 8-bit or 24-bit colors. PNG (W3C standard), GIF, or ICO.', 'boldr'),
			'id'            => 'favicon',
			'type'          => 'image',
			'default'       => '',
		);

		$settings_options[] = array(
			'name'          => __('Display Tagline', 'boldr'),
			'desc'          => __('Display your site description (tagline) on the right side of the header.', 'boldr'),
			'id'            => 'header_tagline',
			'type'          => 'radio',
			'default'       => 'Off',
			'values'		=> array (
								array( 'value' => 'Off', 'display' => __('Off', 'boldr') ),
								array( 'value' => 'On', 'display' => __('On', 'boldr') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Blog Index Shows', 'boldr'),
			'desc'          => __('Choose what content to display on Main Blog page and archives', 'boldr'),
			'id'            => 'blog_index_shows',
			'type'          => 'radio',
			'default'       => 'Excerpt',
			'values'		=> array (
								array( 'value' => 'Excerpt', 'display' => __('Excerpt', 'boldr') ),
								array( 'value' => 'Full content', 'display' => __('Full content', 'boldr') ),
								),

		);

		$settings_options[] = array(
			'name'          => __('Responsive mode', 'boldr'),
			'desc'          => __('Turn this setting off if you want your site to be unresponsive.', 'boldr'),
			'id'            => 'responsive_mode',
			'type'          => 'radio',
			'default'       => 'on',
			'values'		=> array (
								array( 'value' => 'on', 'display' => __('On', 'boldr') ),
								array( 'value' => 'off', 'display' => __('Off', 'boldr') ),
								),
		);

	$settings_options[] = array('type' => 'end_menu');
// END PAGE 1
// START PAGE 2
	$settings_options[] = array(
		'name'          => __('Custom Header', 'boldr'),
		'type'          => 'start_menu',
		'id'            => 'custom_header',
		'icon'          => 'picture',
	);

		$settings_options[] = array(
			'name'          => __('Display custom header on Homepage', 'boldr'),
			'desc'          => __('Enable or disable display of custom header image on the front page.', 'boldr'),
			'id'            => 'home_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'boldr') ),
								array( 'value' => 'Off', 'display' => __('Off', 'boldr') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Display custom header on Blog Index', 'boldr'),
			'desc'          => __('Enable or disable display of custom header image on blog index pages.', 'boldr'),
			'id'            => 'blog_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'boldr') ),
								array( 'value' => 'Off', 'display' => __('Off', 'boldr') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Display custom header on Blog Posts', 'boldr'),
			'desc'          => __('Enable or disable display of custom header image on single blog posts', 'boldr'),
			'id'            => 'single_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'boldr') ),
								array( 'value' => 'Off', 'display' => __('Off', 'boldr') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Display custom header on Pages', 'boldr'),
			'desc'          => __('Enable or disable display of custom header image on individual pages.', 'boldr'),
			'id'            => 'pages_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'boldr') ),
								array( 'value' => 'Off', 'display' => __('Off', 'boldr') ),
								),
		);


	$settings_options[] = array('type' => 'end_menu');
// END PAGE 2
// START PAGE 3
	$settings_options[] = array(
		'name'          => __('Support and Feedback', 'boldr'),
		'type'          => 'start_menu',
		'id'            => 'support_feedback',
		'icon'          => 'network',
	);

		$settings_options[] = array(
			'name'          => __('Support and Feedback', 'boldr'),
			'desc'          => '',
			'id'            => 'support_feedback',
			'type'          => 'support_feedback',
			'default'       => '',
		);

	$settings_options[] = array('type' => 'end_menu');
// END PAGE 3

	return $settings_options;
}
?>