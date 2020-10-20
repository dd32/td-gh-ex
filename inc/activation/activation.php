<?php

get_template_part( '/inc/activation/class-tgm-plugin-activation' );

function articlepress_tgm_plugins_activation() {

    // Activation
    $plugins = array(
        array(
            'name'               => esc_html( 'ShareMe Simple Social Share Plugin', 'articlepress' ),
			'slug'               => 'shareme',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'is_callable'        => '',
        )
    );

    // Configration
    $config = array(
		'id'           => 'articlepress',
		'default_path' => '', 
		'menu'         => 'articlepress-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',   
    );

    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'articlepress_tgm_plugins_activation' );