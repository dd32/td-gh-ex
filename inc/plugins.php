<?php
/**
 * Recommended and Required Theme Plugins functions.
 *
 * @package Fmi
 */

// Include TGM Class.
require_once get_template_directory() . '/inc/classes/class-tgm-plugin-activation.php';

/**
 * Register Required Plugins
 */
function vs_theme_register_required_plugins() {

  $plugins = array(

    array(
      'name'               => 'Kirki',
      'slug'               => 'kirki',
      'required'           => false,
      'force_activation'   => false,
      'force_deactivation' => false,
    ),
    
  );

  $config = array(
    'id'           => 'vs',
    'default_path' => '',
    'menu'         => 'vs-install-plugins',
    'has_notices'  => true,
    'dismissable'  => true,
    'dismiss_msg'  => '',
    'is_automatic' => true,
    'message'      => '',
  );

  tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'vs_theme_register_required_plugins' );
