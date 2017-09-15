<?php
/**
 * Plugin recommendation
 *
 * @package Best_Business
 */

// Load TGM library.
require_once trailingslashit( get_template_directory() ) . 'vendors/tgm/class-tgm-plugin-activation.php';

if ( ! function_exists( 'best_business_register_recommended_plugins' ) ) :

	/**
	 * Register recommended plugins.
	 *
	 * @since 1.0.0
	 */
	function best_business_register_recommended_plugins() {

		$plugins = array(
			array(
				'name'     => esc_html__( 'Axle Demo Importer', 'best-business' ),
				'slug'     => 'axle-demo-importer',
				'required' => false,
			),
		);

		$config = array();

		tgmpa( $plugins, $config );

	}

endif;

add_action( 'tgmpa_register', 'best_business_register_recommended_plugins' );
