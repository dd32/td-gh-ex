<?php
/**
 * Recommended plugins
 *
 * @package arenabiz
 */

if ( ! function_exists( 'arenabiz_recommended_plugins' ) ) :

	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function arenabiz_recommended_plugins() {

		$plugins = array(
			array(
				'name'     => esc_html__( 'Zen Toolkit', 'arenabiz' ),
				'slug'     => 'zen-toolkit',
				'required' => false,
			),
		);

		tgmpa( $plugins );

	}

endif;

add_action( 'tgmpa_register', 'arenabiz_recommended_plugins' );
