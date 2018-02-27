<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Ansia_Updgrade_Pro_Button {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
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
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
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
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'inc/pro-button/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Ansia_Updgrade_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Ansia_Updgrade_Section_Pro(
				$manager,
				'cresta_ansia_buy_pro',
				array(
					'priority' => 1,
					'title'    => esc_html__( 'Ansia PRO Theme', 'ansia' ),
					'pro_text' => esc_html__( 'More Info',         'ansia' ),
					'pro_url'  => 'https://crestaproject.com/downloads/ansia/',
				)
			)
		);
		$manager->add_section(
			new Ansia_Updgrade_Section_Pro(
				$manager,
				'cresta_ansia_documentation',
				array(
					'priority' => 999,
					'title'    => esc_html__( 'Ansia documentation', 'ansia' ),
					'pro_text' => esc_html__( 'Documentation',         'ansia' ),
					'pro_url'  => admin_url( add_query_arg( array( 'page' => 'ansia-welcome', 'tab' => 'documentation' ), 'themes.php' ) ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ansia-customize-controls-pro-button', trailingslashit( get_template_directory_uri() ) . 'inc/pro-button/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ansia-customize-controls-pro-button', trailingslashit( get_template_directory_uri() ) . 'inc/pro-button/customize-controls.css' );
	}
}

// Doing this customizer thang!
Ansia_Updgrade_Pro_Button::get_instance();
