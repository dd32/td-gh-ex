<?php
/**
 * astrology theme's functions and definitions.
 *
 * @package astrology
 */
require_once (dirname(__FILE__) . '/inc/class-tgm-plugin-activation.php');
if ( ! function_exists( 'AstrologySetup' ) ) :

function AstrologySetup() {
	
	load_theme_textdomain( 'astrology', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' ); 

	add_theme_support( 'custom-logo' );
	
	add_editor_style();
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'astrology' ),
		'footer' => esc_html__( 'Footer', 'astrology' ),
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) );
	function AstrologyActiveWidgets($active){

	    //Bundled Widgets
        $active['video'] = true;
        $active['testimonial'] = true;
        $active['taxonomy'] = true;
        $active['social-media-buttons'] = true;
        $active['simple-masonry'] = true;
        $active['slider'] = true;
        $active['cta'] = true;
        $active['contact'] = true;
        $active['features'] = true;
        $active['headline'] = true;
        $active['hero'] = true;
        $active['icon'] = true;
        $active['image-grid'] = true;
        $active['price-table'] = true;
        $active['layout-slider'] = true;
	    return $active;
  	}
}

endif;

add_action( 'after_setup_theme', 'AstrologySetup' );

function AstrologyContentWidth() {
	$GLOBALS['content_width'] = apply_filters( 'astrology_content_width', 640 );
}
add_action( 'after_setup_theme', 'AstrologyContentWidth', 0 );

function AstrologerCustomExcerptLength( $length ) {
    return 34;
}
add_filter( 'excerpt_length', 'AstrologerCustomExcerptLength', 999 );
function AstrologerCustomExcerptLengthMore( $more ) {
    return ' {...}';
}
add_filter( 'excerpt_more', 'AstrologerCustomExcerptLengthMore' );

/*
* TGM plugin activation register hook 
*/
add_action( 'tgmpa_register', 'AstrologyActionTgmPluginActiveRegisterRequiredPlugins' );
function AstrologyActionTgmPluginActiveRegisterRequiredPlugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Page Builder by SiteOrigin','astrology'),
           'slug'      => 'siteorigin-panels',
           'required'  => true,
        ),
        array(
           'name'      => __('SiteOrigin Widgets Bundle','astrology'),
           'slug'      => 'so-widgets-bundle',
           'required'  => true,
        )
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'astrology-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Required Plugins', 'astrology' ),
           'menu_title'                      => __( 'Install Plugins', 'astrology' ),
           'installing'                      => __( 'Installing Plugin: %s', 'astrology' ), 
           'oops'                            => __( 'Something went wrong with the plugin API.', 'astrology' ),
           'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','astrology' ), 
           'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','astrology' ), 
           'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','astrology' ), 
           'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','astrology' ), 
           'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','astrology' ), 
           'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','astrology' ), 
           'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','astrology' ), 
           'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','astrology' ), 
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','astrology' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','astrology' ),
           'return'                          => __( 'Return to Required Plugins Installer', 'astrology' ),
           'plugin_activated'                => __( 'Plugin activated successfully.', 'astrology' ),
           'complete'                        => __( 'All plugins installed and activated successfully. %s', 'astrology' ), 
           'nag_type'                        => 'updated'
        )
      );
      Astrology( $plugins, $config );
    }
}
/**
 * wp enqueue style and script.
 */
require_once get_template_directory() . '/inc/enqueue-file.php';

/**
 * widgets.
 */
require_once get_template_directory() . '/inc/widgets.php';

/**
 * customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * default astrology functions.
 */
require_once get_template_directory() . '/inc/default.php';
require_once get_template_directory() . '/inc/breadcumbs.php';