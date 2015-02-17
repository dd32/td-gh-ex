<?php
/*
Plugin name: Hook Suffix Console
*/
add_action("admin_head", 'suffix2console');
function suffix2console() {
global $hook_suffix;
if (is_user_logged_in()) {
$str = "<script type=\"text/javascript\">console.log('%s')</script>";
printf($str, $hook_suffix);
}
}
?> 

<?php

require_once(dirname(__FILE__).'/include/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'azabujuban_register_required_plugins' );
function azabujuban_register_required_plugins() {
 
    $plugins = array(
 
        array(
            'name'                  => 'GMO Font Agent', // The plugin name
            'slug'                  => 'gmo-font-agent', // The plugin slug (typically the folder name)
 //           'source'                => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
 //           'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
 //           'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
 //           'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
 //           'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
 
        array(
            'name'      => 'GMO Showtime',
            'slug'      => 'gmo-showtime',
            'required'  => false,
        ),
 
    );
 
    $theme_text_domain = 'azabujuban';
 
    $config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
        )
    );
 
    tgmpa( $plugins, $config );
 
}




	
function azabujuban_custom_header_setup(){
	$args = array(
		'default-text-color'     => '220e10',
		'default-image'          => '%2$s/images/headers/koboreume.png',

		'height'                 => 230,
		'width'                  => 1600,
		'uploads'                => true,

		'wp-head-callback'       => 'twentythirteen_header_style',
		'admin-head-callback'    => 'twentythirteen_admin_header_style',
		'admin-preview-callback' => 'twentythirteen_admin_header_image',
	);
	add_theme_support( 'custom-header', $args );
}
add_action('after_setup_theme', 'azabujuban_custom_header_setup');

function azabujuban_header_image_setup(){
	global $_wp_default_headers;
	unregister_default_headers(array_keys($_wp_default_headers));
	
	register_default_headers( array(
		'koboreume' => array(
			'url'           => '%2$s/images/headers/koboreume.png',
			'thumbnail_url' => '%2$s/images/headers/koboreume-thumbnail.png',
			'description'   => _x( 'Koboreume', 'header image description', 'twentythirteen' )
		),
		'tsuyushiba' => array(
			'url'           => '%2$s/images/headers/tsuyushiba.png',
			'thumbnail_url' => '%2$s/images/headers/tsuyushiba-thumbnail.png',
			'description'   => _x( 'Tsuyushiba', 'header image description', 'twentythirteen' )
		),
		'sarasa_hanabishi' => array(
			'url'           => '%2$s/images/headers/sarasa_hanabishi.png',
			'thumbnail_url' => '%2$s/images/headers/sarasa_hanabishi-thumbnail.png',
			'description'   => _x( 'Sarasa Hanabishi', 'header image description', 'twentythirteen' )
		),
		'kikuseigaiha' => array(
			'url'           => '%2$s/images/headers/kikuseigaiha.png',
			'thumbnail_url' => '%2$s/images/headers/kikuseigaiha-thumbnail.png',
			'description'   => _x( 'Kikuseigaiha', 'header image description', 'twentythirteen' )
		),
		'ichimatsuhanabishi' => array(
			'url'           => '%2$s/images/headers/ichimatsuhanabishi.png',
			'thumbnail_url' => '%2$s/images/headers/ichimatsuhanabishi-thumbnail.png',
			'description'   => _x( 'Ichimatsuhanabishi', 'header image description', 'twentythirteen' )
		),
		'higaki' => array(
			'url'           => '%2$s/images/headers/higaki.png',
			'thumbnail_url' => '%2$s/images/headers/higaki_thumbnail.png',
			'description'   => _x( 'Higaki', 'header image description', 'twentythirteen' )
		),
		'sasa' => array(
			'url'           => '%2$s/images/headers/sasa.png',
			'thumbnail_url' => '%2$s/images/headers/sasa_thumbnail.png',
			'description'   => _x( 'Sasa', 'header image description', 'twentythirteen' )
		),
		'sayagata' => array(
			'url'           => '%2$s/images/headers/sayagata.png',
			'thumbnail_url' => '%2$s/images/headers/sayagata_thumbnail.png',
			'description'   => _x( 'Sayagata', 'header image description', 'twentythirteen' )
		),
		'sippoukomon' => array(
			'url'           => '%2$s/images/headers/sippoukomon.png',
			'thumbnail_url' => '%2$s/images/headers/sippoukomon_thumbnail.png',
			'description'   => _x( 'Sippoukomon', 'header image description', 'twentythirteen' )
		),
		'yotuwakuzusi' => array(
			'url'           => '%2$s/images/headers/yotuwakuzusi.png',
			'thumbnail_url' => '%2$s/images/headers/yotuwakuzusi_thumbnail.png',
			'description'   => _x( 'Yotuwakuzusi', 'header image description', 'twentythirteen' )
		),
	) );
}
add_action('after_setup_theme', 'azabujuban_header_image_setup', 12);

function azabujuban_original_customize( $wp_customize ) {
	
	$wp_customize->add_section( 'original_section', array(
		'title'          => 'Azabu Juban',
		'priority'       => 10000,
	));
	
	$wp_customize->add_setting('navbar_color', array(
		'default'           => '#f7f5e7',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'navbar_color', array(
		'label'    => 'Header Navigation Color',
		'section'  => 'original_section',
		'settings' => 'navbar_color',
	)));

	$wp_customize->add_setting('Header_Navigation_Opacity', array(
		'default'           => '100',
		'sanitize_callback' => '100',
		'type'           => 'option',
	));
	$wp_customize->add_control('Header_Navigation_Opacity', array(
		'label'    => 'Header Navigation Opacity(1-100)',
		'section'  => 'original_section',
		'settings' => 'Header_Navigation_Opacity',
		'type'           => 'text',
	));
	
	$wp_customize->add_setting('paging_navigation_color', array(
		'default'           => '#e8e5ce',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'paging_navigation_color', array(
		'label'    => 'Paging Navigation Color',
		'section'  => 'original_section',
		'settings' => 'paging_navigation_color',
	)));
	
	$wp_customize->add_setting('Navigation_Selected_Link_Color', array(
		'default'           => '#e8e5ce',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Navigation_Selected_Link_Color', array(
		'label'    => 'Navigation Selected Link Color',
		'section'  => 'original_section',
		'settings' => 'Navigation_Selected_Link_Color',
	)));
	
	$wp_customize->add_setting('footer_widget_area_color', array(
		'default'           => '#220e10',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_widget_area_color', array(
		'label'    => 'Footer Widget Area Color',
		'section'  => 'original_section',
		'settings' => 'footer_widget_area_color',
	)));
	
	$wp_customize->add_setting('site_info_color', array(
		'default'           => '#e8e5ce',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'site_info_color', array(
		'label'    => 'Site Info Color',
		'section'  => 'original_section',
		'settings' => 'site_info_color',
	)));
	$wp_customize->add_setting('Header_Text_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Header_Text_Colorr', array(
		'label'    => 'Header Text Color',
		'section'  => 'original_section',
		'settings' => 'Header_Text_Color',
	)));
	







	$wp_customize->add_setting('Navigation_Text_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Navigation_Text_Color', array(
		'label'    => 'Navigation Text Color',
		'section'  => 'original_section',
		'settings' => 'Navigation_Text_Color',
	)));
	$wp_customize->add_setting('Navigation_Link_Hover_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Navigation_Link_Hover_Color', array(
		'label'    => 'Navigation Link Hover Color',
		'section'  => 'original_section',
		'settings' => 'Navigation_Link_Hover_Color',
	)));
	$wp_customize->add_setting('Main_Text_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Main_Text_Color', array(
		'label'    => 'Main Text Color',
		'section'  => 'original_section',
		'settings' => 'Main_Text_Color',
	)));
	$wp_customize->add_setting('Accent_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Accent_Color', array(
		'label'    => 'Accent Color',
		'section'  => 'original_section',
		'settings' => 'Accent_Color',
	)));
	$wp_customize->add_setting('Main_Text_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Main_Text_Color', array(
		'label'    => 'Main Text Color',
		'section'  => 'original_section',
		'settings' => 'Main_Text_Color',
	)));
	$wp_customize->add_setting('Main_Link_Hover_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Main_Link_Hover_Color', array(
		'label'    => 'Main Link Hover Color',
		'section'  => 'original_section',
		'settings' => 'Main_Link_Hover_Color',
	)));
	$wp_customize->add_setting('Sidebar_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Sidebar_Background_Color', array(
		'label'    => 'Sidebar Background Color',
		'section'  => 'original_section',
		'settings' => 'Sidebar_Background_Color',
	)));
	$wp_customize->add_setting('Sidebar_Text_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Sidebar_Text_Color', array(
		'label'    => 'Sidebar Text Color',
		'section'  => 'original_section',
		'settings' => 'Sidebar_Text_Color',
	)));
	$wp_customize->add_setting('Sidebar_Link_Hover_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Sidebar_Link_Hover_Color', array(
		'label'    => 'Sidebar Link Hover Color',
		'section'  => 'original_section',
		'settings' => 'Sidebar_Link_Hover_Color',
	)));
	$wp_customize->add_setting('Paging_Navigation_Text_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Paging_Navigation_Text_Color', array(
		'label'    => 'Paging Navigation Text Color',
		'section'  => 'original_section',
		'settings' => 'Paging_Navigation_Text_Color',
	)));
	$wp_customize->add_setting('Paging_Navigation_Link_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Paging_Navigation_Link_Color', array(
		'label'    => 'Paging Navigation Link Color',
		'section'  => 'original_section',
		'settings' => 'Paging_Navigation_Link_Color',
	)));
	$wp_customize->add_setting('Footer_Text_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Footer_Text_Color', array(
		'label'    => 'Footer Text Color',
		'section'  => 'original_section',
		'settings' => 'Footer_Text_Color',
	)));
	$wp_customize->add_setting('Footer_Link_Hover_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Footer_Link_Hover_Color', array(
		'label'    => 'Footer Link Hover Color',
		'section'  => 'original_section',
		'settings' => 'Footer_Link_Hover_Color',
	)));
	$wp_customize->add_setting('Site_Info_Text_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Site_Info_Text_Color', array(
		'label'    => 'Site Info Text Color',
		'section'  => 'original_section',
		'settings' => 'Site_Info_Text_Color',
	)));
	$wp_customize->add_setting('Site_Info_Link_Hover_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Site_Info_Link_Hover_Color', array(
		'label'    => 'Site Info Link Hover Color',
		'section'  => 'original_section',
		'settings' => 'Site_Info_Link_Hover_Color',
	)));
	$wp_customize->add_setting('Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Background_Color', array(
		'label'    => 'Background Color',
		'section'  => 'original_section',
		'settings' => 'Background_Color',
	)));




	$wp_customize->add_setting('Video_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Video_Background_Color', array(
		'label'    => 'Video Background Color',
		'section'  => 'original_section',
		'settings' => 'Video_Background_Color',
	)));
	$wp_customize->add_setting('Status_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Status_Background_Color', array(
		'label'    => 'Status Background Color',
		'section'  => 'original_section',
		'settings' => 'Status_Background_Color',
	)));
	$wp_customize->add_setting('Quote_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Quote_Background_Color', array(
		'label'    => 'Quote Background Color',
		'section'  => 'original_section',
		'settings' => 'Quote_Background_Color',
	)));
	$wp_customize->add_setting('Link_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Link_Background_Color', array(
		'label'    => 'Link Background Color',
		'section'  => 'original_section',
		'settings' => 'Link_Background_Color',
	)));
	$wp_customize->add_setting('Image_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Image_Background_Color', array(
		'label'    => 'Image Background Color',
		'section'  => 'original_section',
		'settings' => 'Image_Background_Color',
	)));
	$wp_customize->add_setting('Gallery_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Gallery_Background_Color', array(
		'label'    => 'Gallery Background Color',
		'section'  => 'original_section',
		'settings' => 'Gallery_Background_Color',
	)));
	$wp_customize->add_setting('Chat_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Chat_Background_Color', array(
		'label'    => 'Chat Background Color',
		'section'  => 'original_section',
		'settings' => 'Chat_Background_Color',
	)));
	$wp_customize->add_setting('Audio_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Audio_Background_Color', array(
		'label'    => 'Audio Background Color',
		'section'  => 'original_section',
		'settings' => 'Audio_Background_Color',
	)));
	$wp_customize->add_setting('Aside_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Aside_Background_Color', array(
		'label'    => 'Aside Background Color',
		'section'  => 'original_section',
		'settings' => 'Aside_Background_Color',
	)));
	$wp_customize->add_setting('Standard_Background_Color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'Standard_Background_Color', array(
		'label'    => 'Standard Background Color',
		'section'  => 'original_section',
		'settings' => 'Standard_Background_Color',
	)));


	// Logo Image
    $wp_customize->add_setting('Logo_Image', array(
        'default'        => '',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'Logo_Image',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'Logo_Image',array(
            'label'     => 'Logo Image',
            'section'   => 'original_section',
            'settings'  => 'Logo_Image',
        )
    ));
	
	$wp_customize->remove_section('colors');
}
add_action('customize_register', 'azabujuban_original_customize');

function azabujuban_customize_css(){
	
	$Header_Navigation_Opacity = get_option('Header_Navigation_Opacity');
	$Header_Navigation_Opacity = $Header_Navigation_Opacity / 100;
	
	$navi_color = get_option('navbar_color');
	$navi_color = preg_replace("/^#/", '', $navi_color);

	$out = array();
	for($i = 0; $i < 6; $i+=2) {
	$hex = substr($navi_color, $i, 2);
	$out[] = hexdec($hex);
	}
	
	echo "<style type=\"text/css\">\n<!--\n";
	echo ".navbar { background-color:rgba(".$out[0].",".$out[1].",".$out[2].",".$Header_Navigation_Opacity."); }";
	echo ".paging-navigation { background-color:".get_option('paging_navigation_color')."; }";
	echo ".site-info { background-color:".get_option('site_info_color')."; }";
	echo ".site-footer .sidebar-container { background-color:".get_option('footer_widget_area_color')."; }";
	echo ".site-title,.site-description { color:".get_option('Header_Text_Color')."; }";
	echo ".nav-menu li:hover > a, .nav-menu li a:hover, .nav-menu li:focus > a, .nav-menu li a:focus,.nav-menu li:hover > a, .nav-menu li a:hover, .nav-menu li:focus > a, .nav-menu li a:focus,.nav-menu li a:hover { color:".get_option('Navigation_Link_Hover_Color')."; }";
	echo ".nav-menu li a { color:".get_option('Navigation_Text_Color')."; }";
	echo ".entry-title a,.entry-content,.entry-content a,.entry-meta a { color:".get_option('Main_Text_Color')."; }";
	
	echo ".entry-title, .entry-meta { color:".get_option('Accent_Color')."; }";

	echo ".entry-meta a:hover { color:".get_option('Main_Link_Hover_Color')."; }";
	echo ".widget { background-color:".get_option('Sidebar_Background_Color')."; }";
	echo ".sidebar-inner .widget .widget-title,.sidebar-inner .widget_calendar table, .sidebar-inner .widget_calendar td,.sidebar-inner .widget a { color:".get_option('Sidebar_Text_Color')."; }";	
	echo ".widget a:hover { color:".get_option('Sidebar_Link_Hover_Color')."; }";
	echo ".paging-navigation .meta-nav { background-color:".get_option('Paging_Navigation_Text_Color')."; }";
	echo ".paging-navigation .meta-nav { color:".get_option('Paging_Navigation_Link_Color')."; }";
	echo ".navigation a { color:".get_option('Paging_Navigation_Text_Color')."; }";
	echo ".navigation a:hover { color:".get_option('Paging_Navigation_Link_Color')."; }";
	echo ".nav-menu .current_page_item > a, .nav-menu .current_page_ancestor > a, .nav-menu .current-menu-item > a, .nav-menu .current-menu-ancestor > a { color:".get_option('Navigation_Selected_Link_Color')."; }";
	echo ".paging-navigation a:hover .meta-nav { background-color:".get_option('Paging_Navigation_Link_Color')."; }";
	echo ".paging-navigation a:hover .meta-nav { color:".get_option('Paging_Navigation_Text_Color')."; }";
	echo "#secondary .widget .widget-title, #secondary .widget_calendar table, #secondary .widget_calendar td, #secondary .widget a,.site-footer .widget { color:".get_option('Footer_Text_Color')."; }";	
	echo "#secondary .widget a:hover { color:".get_option('Footer_Link_Hover_Color')."; }";	
	echo ".paging-navigation a:hover .meta-nav { color:".get_option('Site_Info_Text_Color')."; }";
	echo ".site-info a { color:".get_option('Site_Info_Text_Color')."; }";
	echo ".site-info a:hover { color:".get_option('Site_Info_Link_Hover_Color')."; }";
	echo "#main { background-color:".get_option('Background_Color')."; }";

	if(!get_option('Logo_Image')==null){
		echo "#logo-image img{ margin-right:10px; }";
	}
	echo ".format-gallery { background-color:".get_option('Gallery_Background_Color')."; }";
	echo ".format-image { background-color:".get_option('Image_Background_Color')."; }";
	echo ".format-video { background-color:".get_option('Video_Background_Color')."; }";
	echo ".format-status { background-color:".get_option('Status_Background_Color')."; }";
	echo ".format-quote { background-color:".get_option('Quote_Background_Color')."; }";
	echo ".format-link { background-color:".get_option('Link_Background_Color')."; }";
	echo ".format-chat { background-color:".get_option('Chat_Background_Color')."; }";
	echo ".format-audio { background-color:".get_option('Audio_Background_Color')."; }";
	echo ".format-aside { background-color:".get_option('Aside_Background_Color')."; }";
	echo ".format-standard { background-color:".get_option('Standard_Background_Color')."; }";
	
	
	echo "-->\n</style>\n";
}
add_action('wp_head', 'azabujuban_customize_css');



function azabujuban_scripts(){
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js' );
}
add_action( 'wp_enqueue_scripts', 'azabujuban_scripts' );


function azabujuban_scriptsMore(){
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/more.js' );
}
add_action( 'admin_enqueue_scripts', 'azabujuban_scriptsMore' );



add_action('appearance_page_more', 'regist_more_css');
function regist_more_css() { ?>
<link rel='stylesheet' id='azabu_juban_style-css'  href='<?php echo get_stylesheet_directory_uri() .'/css/more.css' ?>' type='text/css' media='all' /><?php }

//More
function azabu_juban_menu_more() {
    $siteurl = get_option( 'siteurl' );
?>
<div class="moreWrap">
    <h2><img src="<?php echo get_stylesheet_directory_uri() .'/images/more/head_title.png' ?>" alt="WordPress Dedicated Ultraspeed Server GMO WP Clowd" ></h2>
    
    <div class="more_navigation">
    <ul>
    <li><a href="#hosting">WordPress Hosting</a></li>
    <li><a href="#themes">Themes</a></li>
    <li><a href="#plugins">Plugins</a></li>
    </ul>
    </div>
    
    
    <a id="hosting" name="hosting"></a>
    <div class="more_contents">
    
    <h3>GMO WP Cloud</h3>
    <div class="hosting">
    <a href="https://www.wpcloud.jp/en/?banner_id=themes" target="_blank"><p class="title">GMO WP Cloud</p>
    <p>GMO WP Cloud - The optimized WordPress cloud hosting service. <br>
    WordPress made it possible for you to build powerful websites without requiring coding skills. <br>  
    GMO WP Cloud features safe yet seamless WordPress site building experience to let you focus on site your content creation process.</p>
    <p class="more">View More</p></a>
    </div>
    
    
    <a id="themes" name="themes"></a>
    <h3>WordPress Themes</h3>
    
    <div class="themes">
    
    <div class="lead">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/themes_tidy.jpg' ?>" alt="tidy">
    <ul>
    <li><a href="https://wordpress.org/themes/tidy " class="download" target="_blank">Free Download</a></li>
    <li><a href="http://tidy.wpcloud.net/" class="demo" target="_blank">View Demo</a></li>
    </ul>
    <h4>Tidy</h4>
    <p>Tidy is a multi-purpose WordPress theme with ultimate simplicity. It is fully customizable, responsive and flexible.  Contents can be turned on and off as desired, and a wide variety of layout options to help you build a satisfactory website. The theme supports original slider, social media integration, Google advertisement & stats plugins along with the web font support with full color customization for enhanced flexibility.</p>
    </div>
    
	<div class="lead">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/themes_madeini.jpg' ?>" alt="Madeini">
    <ul>
    <li><a href="http://wordpress.org/themes/madeini" class="download" target="_blank">Free Download</a></li>
    <li><a href="http://madeini.wpcloud.net/" class="demo" target="_blank">View Demo</a></li>
    </ul>
    <h4>Madeini</h4>
    <p>Madeini is an upgraded version of Twenty Fourteen WordPress default theme with enhanced custom color and custom background image feature.  Enlarged homepage image makes it suitable for photography websites.</p>
    </div>

    <div>
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/themes_kimono.jpg' ?>" alt="Kimono">
    <ul>
    <li><a href="http://wordpress.org/themes/kimono" class="download" target="_blank">Free Download</a></li>
    <li><a href="http://kimono.wpcloud.net/" class="demo" target="_blank">View Demo</a></li>
    </ul>
    <h4>Kimono</h4>
    <p>Kimono is a simple, and user friendly WordPress theme that is focused on design. Its beautiful design inspiration comes from Japanese traditional garment called Kimono.  Slider is standard in this theme therefore no plugin or complicated setup is required.</p>
    </div>

    <div>
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/themes_kotenhanagara.jpg' ?>" alt="Kotenhanagara">
    <ul>
    <li><a href="http://wordpress.org/themes/kotenhanagara" class="download" target="_blank">Free Download</a></li>
    <li><a href="http://kotenhanagara.wpcloud.net/" class="demo" target="_blank">View Demo</a></li>
    </ul>
    <h4>Kotenhanagara</h4>
    <p>Kotenhanagara is a simple, easy-to-use and highly customizable WordPress theme. Beautiful design inspiration came from Japanese Urushi lacqerware, varnished with the traditional manners.  Background color can be customized as well as swappable flower patterned default background.</p>
    </div>

    <div>
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/themes_de_naani.jpg' ?>" alt="de naani.">
    <ul>
    <li><a href="https://wordpress.org/themes/de-naani" class="download" target="_blank">Free Download</a></li>
    <li><a href="http://denaani.wpcloud.net/" class="demo" target="_blank">View Demo</a></li>
    </ul>
    <h4>de naani.</h4>
    <p>'de naani.' is an upgraded version of Twenty-Twelve default theme which is designed to work perfectly with 'GMO Show Time' slider plugin and 'GMO Font agent'web font plugin. This theme also allow you to insert logo, and change site title/tagline positions.</p>
    </div>

    <div>
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/themes_azabu_juban.jpg' ?>" alt="Azabu Juban">
    <ul>
    <li><a href="http://wordpress.org/themes/azabu-juban" class="download" target="_blank">Free Download</a></li>
    <li><a href="http://azabujuban.wpcloud.net/" class="demo" target="_blank">View Demo</a></li>
    </ul>
    <h4>Azabu Juban</h4>
    <p>Azabu Juban is an upgraded version of Twenty Fourteen WordPress default theme, which is simple, easy-to-use and highly customizable. This theme features numbers of beautiful design templates with traditional Japanese taste which gives your website a unique look.</p>
    </div>

    
    </div>
    
    
    <a id="plugins" name="plugins"></a>
    <h3>Plugins</h3>
    
    <div class="plugins">
    
    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_showtime.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-showtime/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Showtime</h4>
    <p>GMO Showtime slider plugin gives cool effects to the slider in a snap. The control screen is simple, for anyone to easily use. Express user's originality with fully customizable link and color as well as 16 slider effects in 6 different layouts.</p>
    </div>
    </div>
    
    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_font_agent.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-font-agent/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Font Agent</h4>
    <p>GMO Font Agent plugin works with Google fonts, gives you a choice to use variety of stylish web fonts. The plugin is genericon and IcoMoon compatible, to enhance its usability. Icons can be inserted from the post editor.</p>
    </div>
    </div>

    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_sahre_connection.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-share-connection/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Share Connection</h4>
    <p>GMO Share Connection plugin is designed for easy social sharing by letting user choose place/pages to use icons. 9 social network services are supported in this plugin including Facebook and Twitter.</p>
    </div>
    </div>

    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_ads_master.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-ads-master/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Ads Master</h4>
    <p>GMO Ads Master is the ad banner plugin which enables you to place ad contents to the desired locations such as inside article, sidebar and footer. In addition to that, using this plugin let you setup Google Analytics tracking code and sitemap tool settings, and sitemap can be easily generated without playing with PHP files.</p>
    </div>
    </div>

    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_go_to_top.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-go-to-top/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Go to Top</h4>
    <p>GMO Go to Top is a simple plugin adds a simple button which allows users to scroll all the way up to the top by 1-click.  Button color, style, position can be modified or you can also upload your own button image.</p>
    </div>
    </div>

    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_page_trasitions.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-page-transitions/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Page Transitions</h4>
    <p>GMO Page Transitions adds Page Transitions actions to your site. Click on the link, and page will slide over to left or right. This effect will not apply when "target=_brank" is used.</p>
    </div>
    </div>

    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_tinymce_smiley.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-tinymce-smiley/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO TinyMCE Smiley</h4>
    <p>GMO TinyMCE Smiley is a plugin to let you instantly add smilies into your site from the toolbar..</p>
    </div>
    </div>

    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_google_map.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-google-map/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Google Map</h4>
    <p>With "GMO Google Map" plugin, you can use Google Maps on your website by simply embedding a shortcode in anywhere you desire. No special coding skill is required. Simply enter information (eg. address) to create a shortcode and paste it to complete.</p>
    </div>
    </div>
    
    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_showtime.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-widget-custom/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Widget Custom</h4>
    <p>This is a useful widget customizer plugin which enables you to insert images, ad and recommendation banners.</p>
    </div>
    </div>

    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_slider.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-slider/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Slider</h4>
    <p>GMO Slider plugin let you insert sliders in posts and pages. The control screen is simple, for anyone to easily use. GMO Slider supports images as well as text and video.  </p>
    </div>
    </div>

    <div class="plugins_detail">
    <div class="plugins_detail_l">
    <img src="<?php echo get_stylesheet_directory_uri() .'/images/more/ico_plugin_social_connection.gif' ?>">
    <p class="link"><a href="https://wordpress.org/plugins/gmo-social-connection/" target="_blank">Free Download</a></p>
    </div>
    <div class="plugins_detail_r">
    <h4>GMO Social Connection</h4>
    <p>GMO Social Connection let you easily place SNS share buttons on the articles. It also allows you to choose button position from top or bottom. Supported SNS are Facebook, Twitter and Google+.</p>
    </div>
    </div>
    
    
    </div>
    
    </div>
    
    
    <div class="quality">
    <h3>Quality Service</h3>
    <p class="lead">“Brought to you by Japan's leading one-stop provider of Internet services”</p>
    <p><img src="<?php echo get_stylesheet_directory_uri() .'/images/more/footer_logo_gmo.png' ?>" alt="GMO INTERNET GROUP" ></p>
    <p>GMO WP Cloud is operated by GMO Internet group, the number one provider of domain registration, web hosting, security, ecommerce and payment processing solutions in Japan.Under the corporate slogan "Internet for Everyone", GMO Internet Group's trusted service brand represents industry expertise, a proven track record and quality service.</p>
    <p><a href="http://www.gmo.jp/en/" target="_blank">> Visit GMO Internet Group</a></p>
    </div>
    
</div>
<?php
}
function azabu_juban_admin_menu() {
    add_theme_page( 'GMO WP Clowd', 'More', 'read','more', 'azabu_juban_menu_more' );
}

add_action( 'admin_menu', 'azabu_juban_admin_menu' );

//Dashboard
function azabu_juban_dashboard_widget_function() {
?>
<a href="https://www.wpcloud.jp/en/?banner_id=themes" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() .'/images/300250_wpcloud_0001.gif' ?>" style="width:100%"></a>
<?php
}
function azabu_juban_add_dashboard_widgets() {
wp_add_dashboard_widget('azabu_juban_dashboard_widget', 'GMO WP Cloud', 'azabu_juban_dashboard_widget_function');
global $wp_meta_boxes;
$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
$example_widget_backup = array('azabu_juban_dashboard_widget' => $normal_dashboard['azabu_juban_dashboard_widget']);
unset($normal_dashboard['azabu_juban_dashboard_widget']);
$sorted_dashboard = array_merge($example_widget_backup, $normal_dashboard);
$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action('wp_dashboard_setup', 'azabu_juban_add_dashboard_widgets' );

