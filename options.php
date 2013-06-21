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
		'name' => __( 'Show site title', 'activetab' ),
		'desc' => sprintf( __( '<a href="%s">Edit site title</a>', 'activetab' ), admin_url( 'options-general.php' ) ),
		'id' => 'show_site_title',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Show site description', 'activetab' ),
		'desc' => sprintf( __( '<a href="%s">Edit site description</a>', 'activetab' ), admin_url( 'options-general.php' ) ),
		'id' => 'show_site_description',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Show sidebar site title', 'activetab' ),
		//'desc' => sprintf( __( '<a href="%s">Edit site title</a>', 'activetab' ), admin_url( 'options-general.php' ) ),
		'id' => 'show_sidebar_site_title',
		'std' => '0',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Show sidebar site description', 'activetab' ),
		//'desc' => sprintf( __( '<a href="%s">Edit site description</a>', 'activetab' ), admin_url( 'options-general.php' ) ),
		'id' => 'show_sidebar_site_description',
		'std' => '0',
		'type' => 'checkbox'
	);


	$options[] = array(
		'name' => __( 'Code', 'activetab' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'CSS head code', 'activetab' ),
		'desc' => __( 'Code will be added to head section and wrapped with [style] tags', 'activetab' ),
		'id' => 'code_head_css',
		'std' => '',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'JavaScript head code', 'activetab' ),
		'desc' => __( 'Code will be added to head section and wrapped with [script] tags', 'activetab' ),
		'id' => 'code_head_js',
		'std' => '',
		'type' => 'textarea'
	);

	return $options;
}