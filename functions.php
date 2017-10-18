<?php
/**
 * Bar Restaurant theme's functions and definitions.
 *
 * @package Bar Restaurant
 */

require_once (get_template_directory() . '/inc/class-tgm-plugin-activation.php');
if ( ! function_exists( 'bar_restaurant_setup' ) ) :

function bar_restaurant_setup() {
	
	load_theme_textdomain( 'bar-restaurant', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
  ) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Top Header Menu', 'bar-restaurant' ),
	) );
	add_theme_support( 'html5' );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) );
}
endif;
add_action( 'after_setup_theme', 'bar_restaurant_setup' );

function bar_restaurant_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bar_restaurant_content_width', 640 );
}
add_action( 'after_setup_theme', 'bar_restaurant_content_width', 0 );

function bar_restaurant_custom_excerpt_Length( $length ) {
  if(is_admin()){
    return $length;
  }
  return 34;
}
add_filter( 'excerpt_length', 'bar_restaurant_custom_excerpt_Length', 999 );
function bar_restaurant_custom_excerpt_Length_more( $more ) {
  if(is_admin()){
    return $more;
  }
  return ' {...}';
}
add_filter( 'excerpt_more', 'bar_restaurant_custom_excerpt_Length_more' );
add_action( 'admin_menu', 'bar_restaurant_admin_menu');
function bar_restaurant_admin_menu( ) {
    add_theme_page( __('Pro Feature','bar-restaurant'), __('Bar Restaurant Pro','bar-restaurant'), 'manage_options', 'bar-restaurant-pro-buynow', 'bar_restaurant_pro_buy_now', 300 ); 
  
}
function bar_restaurant_pro_buy_now(){ ?>
  <script>window.location = "https://voilathemes.com/products/bar-restaurant-pro-wordpress-theme/";</script>
<?php }
/*
* TGM plugin activation register hook 
*/
add_action( 'tgmpa_register', 'bar_restaurant_action_tgm_plugin_active_register_required_plugins' );
function bar_restaurant_action_tgm_plugin_active_register_required_plugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Page Builder by SiteOrigin','bar-restaurant'),
           'slug'      => 'siteorigin-panels',
           'required'  => false,
        ),
        array(
           'name'      => __('SiteOrigin Widgets Bundle','bar-restaurant'),
           'slug'      => 'so-widgets-bundle',
           'required'  => false,
        ),
        array(
           'name'      => __('Contact Form 7','bar-restaurant'),
           'slug'      => 'contact-form-7',
           'required'  => false,
        ),
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'bar-restaurant-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Required Plugins', 'bar-restaurant' ),
           'menu_title'                      => __( 'Install Plugins', 'bar-restaurant' ),
           'installing'                      => __( 'Installing Plugin: %s', 'bar-restaurant' ), 
           'oops'                            => __( 'Something went wrong with the plugin API.', 'bar-restaurant' ),
           'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','bar-restaurant' ), 
           'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','bar-restaurant' ), 
           'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','bar-restaurant' ), 
           'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','bar-restaurant' ), 
           'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','bar-restaurant' ), 
           'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','bar-restaurant' ), 
           'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','bar-restaurant' ), 
           'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','bar-restaurant' ), 
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','bar-restaurant' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','bar-restaurant' ),
           'return'                          => __( 'Return to Required Plugins Installer', 'bar-restaurant' ),
           'plugin_activated'                => __( 'Plugin activated successfully.', 'bar-restaurant' ),
           'complete'                        => __( 'All plugins installed and activated successfully. %s', 'bar-restaurant' ), 
           'nag_type'                        => 'updated'
        )
      );
      bar_restaurant( $plugins, $config );
    }
}
/**
 * wp enqueue style and script.
 */
require_once get_template_directory() . '/inc/enqueue-file.php';