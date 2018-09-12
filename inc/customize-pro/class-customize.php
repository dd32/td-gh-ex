<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @package Gump
 * @since Gump 2.0.0
 */
final class Gump_Pro_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  2.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  2.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  2.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once get_template_directory() . '/inc/customize-pro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Gump_Pro_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Gump_Pro_Customize_Section_Pro(
				$manager,
				'gump_pro',
				array(
					'title'    => esc_html__( 'Get Gump Pro Now!', 'gump' ),
					'pro_text' => esc_html__( 'Gump Pro', 'gump' ),
					'pro_url'  => 'https://www.pankogut.com/wordpress-themes/gump-pro/?utm_source=customizer_button&utm_medium=wordpress_dashboard&utm_campaign=gump_pro',
					'priority' => 1
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'gump-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/customize-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'gump-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/customize-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
Gump_Pro_Customize::get_instance();
