<?php
// ============================== Recommended Plugins =========================
/**
 * Add plugin automation file
 */

require_once( get_template_directory() . WEAVERX_ADMIN_DIR . '/class-tgm-plugin-activation.php' );


add_action( 'tgmpa_register', 'weaverx_install_tgm_plugins' );

function weaverx_install_tgm_plugins() {
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     => __("Weaver Xtreme Theme Support (IMPORTANT for full theme functionality)", 'weaver-xtreme' /*adm*/), // The plugin name
			'slug'     => 'weaverx-theme-support', // The plugin slug (typically the folder name)
			'required' => false
		),

		array(
			'name'     => __('Weaver Show Posts (shortcode to show selected posts)', 'weaver-xtreme' /*adm*/), // The plugin name
			'slug'     => 'show-posts', // The plugin slug (typically the folder name)
			'required' => false
		),

		array(
			'name'     => __('Gutenberg', 'weaver-xtreme' /*adm*/), // The plugin name
			'slug'     => 'gutenberg', // The plugin slug (typically the folder name)
			'required' => false
		),

		array(
			'name'     => __('Widget Shortcode (display widgets anywhere)', 'weaver-xtreme' /*adm*/), // The plugin name
			'slug'     => 'widget-shortcode', // The plugin slug (typically the folder name)
			'required' => false
		),

	);



	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */

	$config = array(
		'id'           => 'weaver-xtreme',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'     => '', // Default absolute path to pre-packaged plugins
		'menu'             => 'install-weaverx-addons', // Menu slug
		'has_notices'      => true, // Show admin notices or not
		'is_automatic'     => true, // Automatically activate plugins after installation or not
		'message'          =>
		__('<p>The following plugins are recommended for an optimal Weaver Xtreme theme experience. Only the <em>Weaver Xtreme Theme Support</em> plugin is important, the rest are optional, but may make it easier to create content with Weaver Xtreme.</p>
<p>The <em><strong>Weaver Xtreme Theme Support</strong></em> plugin includes several shortcodes that help you customize your content for desktop or mobile device appearance, as well as the Legacy check-box options interface which has been largely replaced with the Customizer interface.</p>
<p>The <em><strong>Weaver Show Posts</strong></em> plugin provides [show_posts] shortcode which allows you to display
any number of posts on pages, selected by filtering conditions, in the header, the footer, or in sidebars.</p>
<p><em><strong>WP Edit</strong></em> provides enhanced page and post editing, including Manual Excerpts. </p>
<p><em><strong>Widget Shortcode</strong></em> allows you to display a widget anywhere a shortcode is allowed.</p>', 'weaver-xtreme' /*adm*/),
			// Message to output right before the plugins table
		'strings'          => array(
			'page_title'                      => __( 'The <em>Weaver Xtreme</em> Theme Recommended Plugins', 'weaver-xtreme' ),
			'menu_title'                      => __( '<small>&times;Recommended Plugins</small>', 'weaver-xtreme' ),
			'installing'                      => __( 'Installing Plugin: %s', 'weaver-xtreme' ), // %1$s = plugin name
			'oops'                            => __( 'Something went wrong with the plugin API.', 'weaver-xtreme' ),

			'notice_can_install_recommended'  => _n_noop( 'The <em>Weaver Xtreme Theme</em> recommends this plugin, %1$s, to enhance your theme experience.', 'The <em>Weaver Xtreme Theme</em> recommends these plugins, %1$s,  to enhance your theme experience.', 'weaver-xtreme' ), // %1$s = plugin name(s)
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'weaver-xtreme' ), // %1$s = plugin name(s)

			'notice_can_activate_recommended' => _n_noop( 'Please activate this recommended plugin, %1$s, to enhance your <em>Weaver Xtreme Theme</em> experience.', 'Please activate these recommended plugins, %1$s, to enhance your <em>Weaver Xtreme Theme</em> experience.', 'weaver-xtreme' ), // %1$s = plugin name(s)

			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with Weaver X: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' , 'weaver-xtreme'), // %1$s = plugin name(s)


			'activate_link'                   => _n_noop( 'Open Plugins Admin Page to Activate', 'Open Plugins Admin Page to Activate' , 'weaver-xtreme'),
			'return'                          => __( 'Return to Required Plugins Installer', 'weaver-xtreme' )
		)
	);

	tgmpa( $plugins, $config );
}

//--

?>
