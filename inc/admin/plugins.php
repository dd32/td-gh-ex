<?php
/**
 * Add required and recommended plugins.
 *
 * @package Bayn Lite
 */

add_action( 'tgmpa_register', 'bayn_lite_register_required_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function bayn_lite_register_required_plugins() {
	$plugins = bayn_lite_required_plugins();

	$config = array(
		'id'          => 'bayn-lite',
		'has_notices' => false,
	);

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function bayn_lite_required_plugins() {
	return array(
		array(
			'name' => esc_html__( 'Jetpack', 'bayn-lite' ),
			'slug' => 'jetpack',
		),
	);
}
