<?php
include_once ('class-tgm-plugin-activation.php');

function smartcat_themes_register_required_plugins() {

	$plugins = array(
		array(
			'name' 		=> 'Tasty Restaurant Team',
			'slug' 		=> 'smartcat-team',
			'source'   	=> get_template_directory_uri() . '/inc/plugins/smartcat-team.zip',
			'required' 	=> true,
		),            
		array(
			'name' 		=> 'Tasty Restaurant Menu',
			'slug' 		=> 'smartcat-restaurant-menu',
			'source'   	=> get_template_directory_uri() . '/inc/plugins/smartcat-restaurant-menu.zip',
			'required' 	=> true,
		),

	);

    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Theme Extentions', 'tgmpa' ),
            'menu_title'                      => __( 'Smartcat Extentions', 'tgmpa' ),
            'installing'                      => __( 'Installing Extention: %s', 'tgmpa' ), // %s = extention name.
            'oops'                            => __( 'Something went wrong with the extention API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following extention: %1$s.', 'This theme requires the following extention: %1$s.' ), // %1$s = extention name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following extention: %1$s.', 'This theme recommends the following extention: %1$s.' ), // %1$s = extention name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s extention. Contact the administrator of this site for help on getting the extention installed.', 'Sorry, but you do not have the correct permissions to install the %s extentions. Contact the administrator of this site for help on getting the extentions installed.' ), // %1$s = extention name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required extention is currently inactive: %1$s.', 'The following required extentions are currently inactive: %1$s.' ), // %1$s = extention name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended extention is currently inactive: %1$s.', 'The following recommended extentions are currently inactive: %1$s.' ), // %1$s = extention name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s extention. Contact the administrator of this site for help on getting the extention activated.', 'Sorry, but you do not have the correct permissions to activate the %s extentions. Contact the administrator of this site for help on getting the extentions activated.' ), // %1$s = extention name(s).
            'notice_ask_to_update'            => _n_noop( 'The following extention needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following extentions need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = extention name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s extention. Contact the administrator of this site for help on getting the extention updated.', 'Sorry, but you do not have the correct permissions to update the %s extentions. Contact the administrator of this site for help on getting the extentions updated.' ), // %1$s = extention name(s).
            'install_link'                    => _n_noop( 'Begin installing extention', 'Begin installing extentions' ),
            'activate_link'                   => _n_noop( 'Begin activating extention', 'Begin activating extentions' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'extention_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All extentions installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'smartcat_themes_register_required_plugins' );