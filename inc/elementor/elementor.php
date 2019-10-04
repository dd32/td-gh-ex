<?php

	define( 'AP_ELEMENTOR_WIDGETS_DIR', get_template_directory() . '/inc/elementor/widgets' );
	define( 'AP_ELEMENTOR_URL', get_template_directory() . '/inc/elementor' );

	/**
	 * Implements the compatibility for the Elementor plugin in Accesspress Parallax theme.
	 *
	 * @package    Accesspress Themes
	 * @subpackage Accesspress Parallax
	 * @since      version 2.0.1
	 */

	if ( ! function_exists( 'accesspress_parallax_elementor_active_page_check' ) ) :

		/**
		 * Check whether Elementor plugin is activated and is active on current page or not
		 *
		 * @return bool
		 *
		 * @since version 2.0.1
		 */
		function accesspress_parallax_elementor_active_page_check() {
			global $post;

			if ( defined( 'ELEMENTOR_VERSION' ) && get_post_meta( $post->ID, '_elementor_edit_mode', true ) ) {
				return true;
			}

			return false;
		}

	endif;

	/**
	 * Load the Accesspress Parallax Elementor widgets file and registers it
	 */
	if ( ! function_exists( 'accesspress_parallax_elementor_widgets_registered' ) ) :

		/**
		 * Load and register the required Elementor widgets file
		 *
		 * @param $widgets_manager
		 *
		 * @since version 2.0.1
		 */
		function accesspress_parallax_elementor_widgets_registered( $widgets_manager ) {

			// Require the files
			require AP_ELEMENTOR_WIDGETS_DIR . '/parallax-section.php';

			// Register the widgets
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Elementor_Section() );
		}

	endif;

	add_action( 'elementor/widgets/widgets_registered', 'accesspress_parallax_elementor_widgets_registered' );

	if ( ! function_exists( 'accesspress_parallax_elementor_category' ) ) :

		/**
		 * Add the Elementor category for use in Accesspress Parallax widgets
		 *
		 * @since version 2.0.1
		 */
		function accesspress_parallax_elementor_category() {

			// Register widget block category for Elementor section
			\Elementor\Plugin::instance()->elements_manager->add_category( 'accesspress-parallax-widget-blocks', array(
				'title' => esc_html__( 'Accesspress Parallax Blocks', 'accesspress-parallax' ),
			), 1 );
		}

	endif;

	add_action( 'elementor/init', 'accesspress_parallax_elementor_category' );