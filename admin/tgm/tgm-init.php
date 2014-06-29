<?php

/**
 * TGM Init Class
 */
include_once ('class-tgm-plugin-activation.php');

function newsmag_recommended_plugins() {

	$plugins = array(
		array(
			'name' 		=> 'Redux Framework',
			'slug' 		=> 'redux-framework',
			'required' 	=> false,
		),
		array(
            'name'               => 'Advanced Custom Fields Pro', // The plugin name.
            'slug'               => 'acf5-beta-master', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/AdvancedCustomFields/acf5-beta/archive/master.zip',
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'external_url'       => 'https://github.com/AdvancedCustomFields/acf5-beta', // If set, overrides default API URL and points to an external URL.
        ),

        array(
            'name'               => 'Contact Form 7', // The plugin name.
            'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),



        
	);

	$config = array(
		'domain'       		=> 'newsmag',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'plugins.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'plugins.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'newsmag_recommended_plugins' );