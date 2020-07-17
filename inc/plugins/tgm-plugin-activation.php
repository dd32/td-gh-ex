<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 */

function bawwp_tgmpa_register() {

	// Get array of recommended plugins
	$plugins = array(

		array(
			'name'				=> 'SEOS',
			'slug'				=> 'seos',
			'required'			=> false,
			'force_activation'	=> false,
		),

	);

	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'bawwp_theme',
		'domain'       => 'bawwp',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => false,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'bawwp_tgmpa_register' );