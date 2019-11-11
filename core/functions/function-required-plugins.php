<?php

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
if (!function_exists('nova_lite_required_plugins')) {
	
	function nova_lite_required_plugins() {

		$plugins = array(

			array(
				'name'      => 'WIP Custom Login',
				'slug'      => 'wip-custom-login',
				'required'  => false,
			),

			array(
				'name'      => 'Chatbox Manager',
				'slug'      => 'wa-chatbox-manager',
				'required'  => false,
			),

		);
	
		tgmpa( $plugins );
	}
	
	add_action( 'tgmpa_register', 'nova_lite_required_plugins' );

}

?>