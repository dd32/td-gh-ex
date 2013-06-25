<?php

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();

	$options[] = array(
		'name' => __( 'Design', 'activetab' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Logo', 'activetab' ),
		//'desc' => __( '', 'activetab' ),
		'id' => 'logo_url',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Show site title in the header', 'activetab' ),
		'desc' => sprintf( __( '<a href="%s">Edit site title</a>', 'activetab' ), admin_url( 'options-general.php' ) ),
		'id' => 'show_site_title',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Show site description in the header', 'activetab' ),
		'desc' => sprintf( __( '<a href="%s">Edit site description</a>', 'activetab' ), admin_url( 'options-general.php' ) ),
		'id' => 'show_site_description',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Show site title in the sidebar', 'activetab' ),
		//'desc' => sprintf( __( '<a href="%s">edit site title</a>', 'activetab' ), admin_url( 'options-general.php' ) ),
		'id' => 'show_sidebar_site_title',
		'std' => '0',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Show site description in the sidebar', 'activetab' ),
		//'desc' => sprintf( __( '<a href="%s">edit site description</a>', 'activetab' ), admin_url( 'options-general.php' ) ),
		'id' => 'show_sidebar_site_description',
		'std' => '0',
		'type' => 'checkbox'
	);


	$options[] = array(
		'name' => __( 'Code', 'activetab' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Head code', 'activetab' ),
		'desc' => __( 'Code will be added to head section just before closing [head] tag', 'activetab' ),
		'id' => 'code_head',
		'std' => '',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Footer code', 'activetab' ),
		'desc' => __( 'Code will be added to body section just before closing [body] tag', 'activetab' ),
		'id' => 'code_footer',
		'std' => '',
		'type' => 'textarea'
	);

	return $options;
}