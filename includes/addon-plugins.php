<?php
// ============================== Recommended Plugins =========================
/**
 * Add plugin automation file
 */

require_once( get_template_directory() . '/includes/class-tgm-plugin-activation.php' );


add_action( 'tgmpa_register', 'weaverx_install_tgm_plugins' );

function weaverx_install_tgm_plugins() {
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     => 'Weaver Xtreme Theme Support', // The plugin name
			'slug'     => 'weaverx-theme-support', // The plugin slug (typically the folder name)
			'required' => false
		),

		array(
			'name'     => 'ATW Show Posts', // The plugin name
			'slug'     => 'show-posts', // The plugin slug (typically the folder name)
			'required' => false
		),
	);


	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'weaver-xtreme';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */

	$config = array(
		'domain'           => $theme_text_domain, // Text domain - likely want to be the same as your theme.
		'default_path'     => '', // Default absolute path to pre-packaged plugins
		'parent_menu_slug' => 'themes.php', // Default parent menu slug
		'parent_url_slug'  => 'themes.php', // Default parent URL slug
		'menu'             => 'install-weaverx-addons', // Menu slug
		'has_notices'      => true, // Show admin notices or not
		'is_automatic'     => true, // Automatically activate plugins after installation or not
		'message'          => __('<p>The following plugins are highly recommended for full functioning of the Weaver Xtreme theme.
The <em>Weaver Xtreme Theme Support</em> plugin provides important extra theme functionality, including several shortcodes
that help you customize your content for desktop or mobile device appearance.</p>
<p>The <em>ATW Show Posts</em> plugin provides an extremely useful shortcode, [show_posts], that allows you to display
any number of selected posts on pages, the header, the footer, or in sidebars. This capability was formerly part of the
Theme Support plugin, but has been separated because of its general usefulness for other themes.</p>','weaver-xtreme' /*adm*/),
			// Message to output right before the plugins table
		'strings'          => array(
			'page_title'                      => __( 'The <em>Weaver X</em> Theme Recommended Plugins', $theme_text_domain ),
			'menu_title'                      => __( '<small>&times;Recommended Plugins</small>', $theme_text_domain ),
			'installing'                      => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                            => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'  => _n_noop( 'The <em>Weaver Xtreme Theme</em> recommends this plugin, %1$s, to enhance your theme experience.', 'The <em>Weaver Xtreme Theme</em> recommends these plugins, %1$s,  to enhance your theme experience.' ), // %1$s = plugin name(s)
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended' => _n_noop( 'Please activate this recommended plugin, %1$s, to enhance your <em>Weaver Xtreme Theme</em> experience.', 'Please activate these recommended plugins, %1$s, to enhance your <em>Weaver Xtreme Theme</em> experience.' ), // %1$s = plugin name(s)
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with Weaver X: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                   => _n_noop( 'Open Plugins Admin Page to Activate', 'Open Plugins Admin Page to Activate' ),
			'return'                          => __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                => __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
		)
	);

	tgmpa( $plugins, $config );
}

//--

?>
