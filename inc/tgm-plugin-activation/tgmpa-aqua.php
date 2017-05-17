<?php
/**
 * This file contains the recommended plugin lists to Aquaparallax theme
 */

/**
 * Register the recommended plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */

add_action( 'tgmpa_register', 'aqua_register_required_plugins' );

function aqua_register_required_plugins() {
	
	$plugins = array(

		array(
			'name'         => 'Aqua Testimonial', // The plugin name.
			'slug'         => 'aqua-testimonial', // The plugin slug (typically the folder name).
			'source'       => 'http://dev.vegamsoft.com/blogtheme/plugin/aqua-testimonial.zip', // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
	

	    array(
			'name'         => 'Wonderplugin Grid Gallery', // The plugin name.
			'slug'         => 'wonderplugin-grid-gallery', // The plugin slug (typically the folder name).
			'source'       => 'https://www.wonderplugin.com/download/wonderplugin-gridgallery-free.zip', // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
	 
	);

	$config = array(
		'id'           => 'aquaparallax',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => esc_html( 'Install Required Plugins', 'aquaparallax' ),
			'menu_title'                      => esc_html( 'Install Plugins', 'aquaparallax' ),
			/* translators: %s: plugin name. */
			'installing'                      => esc_html( 'Installing Plugin: %s', 'aquaparallax' ),
			/* translators: %s: plugin name. */
			'updating'                        => esc_html( 'Updating Plugin: %s', 'aquaparallax' ),
			'oops'                            => esc_html( 'Something went wrong with the plugin API.', 'aquaparallax' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). */
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'aquaparallax'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). */
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'aquaparallax'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'aquaparallax'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). */
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'aquaparallax'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'aquaparallax'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'aquaparallax'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'aquaparallax'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'aquaparallax'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'aquaparallax'
			),
			'return'                          => esc_html( 'Return to Required Plugins Installer', 'aquaparallax' ),
			'plugin_activated'                => esc_html( 'Plugin activated successfully.', 'aquaparallax' ),
			'activated_successfully'          => esc_html( 'The following plugin was activated successfully:', 'aquaparallax' ),
			/* translators: 1: plugin name.  */
			'plugin_already_active'           => esc_html( 'No action taken. Plugin %1$s was already active.', 'aquaparallax' ),  
			/* translators: 1: plugin name. */
			'plugin_needs_higher_version'     => esc_html( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'aquaparallax' ),
			/* translators: 1: dashboard link. */
			'complete'                        => esc_html( 'All plugins installed and activated successfully. %1$s', 'aquaparallax' ),
			'dismiss'                         => esc_html( 'Dismiss this notice', 'aquaparallax' ),
			'notice_cannot_install_activate'  => esc_html( 'There are one or more required or recommended plugins to install, update or activate.', 'aquaparallax' ),
			'contact_admin'                   => esc_html( 'Please contact the administrator of this site for help.', 'aquaparallax' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		
	);

	tgmpa( $plugins, $config );
}
