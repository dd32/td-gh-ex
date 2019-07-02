<?php

if( ! defined( 'ABSPATH' ) ) {
	exit; 	// exit if accessed directly
}

add_action( 'tgmpa_register', 'arrival_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */

function arrival_register_required_plugins() {	

	$plugins = array(
		
		/**
		 * Plugins from WordPress repository
		 */
		array(
            'name'             => esc_html__( 'Operation Demo Importer', 'arrival' ),
            'slug'             => 'operation-demo-importer',
            'source'           => 'https://wordpress.org/plugins/operation-demo-importer/',
            'required'         => false,
        ),
		array(
            'name'             => esc_html__( 'Ultra Companion', 'arrival' ),
            'slug'             => 'ultra-companion',
            'source'           => 'https://wordpress.org/plugins/ultra-companion/',
            'required'         => false,
        ),
       
		
	);

	// Settings for plugin installation screen
	$config = array(
		'id'           => 'tgmpa-arrival',
		'default_path' => '',
		'menu'         => 'arrival-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',		
	);

	tgmpa( $plugins, $config );

}

/* PHP Closing tag is omitted */