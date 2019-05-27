<?php
/**
 * Recommended plugins
 *
 * @package Better Health
 */
if ( ! function_exists( 'better_health_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function better_health_recommended_plugins() {
		
		$plugins = array(

			array(
				'name'     => esc_html__( 'One Click Demo Import', 'sparker' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
			
			array(
				'name'     => esc_html__( 'Contact Us', 'sparker' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),

			array(
				'name'     => esc_html__( 'WooCommerce', 'sparker' ),
				'slug'     => 'woocommerce',
				'required' => false,
			),		   
		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'better_health_recommended_plugins' );
