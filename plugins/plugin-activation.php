<?php
require_once get_template_directory() . '/plugins/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'bands_register_required_plugins' );
function bands_register_required_plugins() {
$plugins = array(
array(
'name'      => 'Audio Album',
'slug'      => 'audio-album',
'required'  => false,
),
array(
'name'      => 'Simple Podcasting',
'slug'      => 'simple-podcasting',
'required'  => false,
),
);
$config = array(
'id'           => 'bands',
'default_path' => '',
'menu'         => 'install-plugins',
'has_notices'  => true,
'dismissable'  => true,
'dismiss_msg'  => '<span style="font-weight:normal">Thank you for using Bands! If you\'re looking for more features and support, you can always seamlessly <a href="https://bandswp.com/" target="_blank" class="button-primary">Upgrade to Pro</a> at any time.</span>',
'is_automatic' => true,
'message'      => '',
);
tgmpa( $plugins, $config );
}