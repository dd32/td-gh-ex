<?php
	/**
	* This file represents an example of the code that themes would use to register
	* the required plugins.
	*
	
	*
	* @package Creation-Plugin-Activation
	
	*/
	
	require_once get_template_directory() . '/lib/admela-tgm-plugin/class-tgm-plugin-activation.php';
	
	add_action( 'admela_register', 'admela_register_required_plugins' );
	
	if( ! function_exists('admela_register_required_plugins')){
	
	function admela_register_required_plugins() {
	
	$plugins = array( // This is an example of how to include a plugin pre-packaged with a theme.
	array(
		'name' => esc_html__('admela user profile and ad settings','admela'), // The plugin name.
		'slug' => esc_html__('admela-userprofile-ad-settings','admela'), // The plugin slug (typically the folder name).
		'source' => 'http://userthemes.com/wp-content/uploads/admela-userprofile-ad-settings.zip', // The plugin source.
		'required' => false, // If false, the plugin is only 'recommended' instead of required.
		'version' => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
		'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
	    
	),
				
	);
	
	
	
	$config = array(
		'has_notices' => true, // Show admin notices or not.
		'dismissable' => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true, // Automatically activate plugins after installation or not.
			'strings' => array(
			'page_title' => esc_html__( 'Install Required Plugins', 'admela' ),
			'menu_title' => esc_html__( 'Install Plugins', 'admela' ),
			'installing' => esc_html__( 'Installing Plugin: %s', 'admela' ) // %s = plugin name.
			)
	);
	
	admela( $plugins, $config );
	
	}
	}