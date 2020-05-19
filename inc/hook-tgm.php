<?php
/**
 * Recommended plugins
 *
 * @package appdetail
 */

if ( ! function_exists( 'appdetail_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function appdetail_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Client Partner Showcase', 'appdetail' ),
                'slug'     => 'client-partner-showcase',
                'required' => false,
            ),
			
			 array(
                'name'     => esc_html__( 'Pricing Table', 'appdetail' ),
                'slug'     => 'pricetable-wp',
                'required' => false,
            ),
			 array(
                'name'     => esc_html__( 'Coming Soon Countdown', 'appdetail' ),
                'slug'     => 'coming-soon-countdown',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'appdetail_recommended_plugins' );
