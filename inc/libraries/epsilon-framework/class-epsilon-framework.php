<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once dirname( __FILE__ ) . '/class-epsilon-autoloader.php';

class Epsilon_Framework {
	/**
	 * Epsilon_Framework constructor.
	 */
	public function __construct() {
		/**
		 * Customizer enqueues & controls
		 */
		add_action( 'customize_register', array( $this, 'init_controls' ), 0 );

		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customizer_enqueue_scripts' ), 25 );
		add_action( 'customize_preview_init', array( $this, 'customize_preview_styles' ), 25 );

		/**
		 *
		 */
		add_action( 'wp_ajax_epsilon_framework_ajax_action', array(
			$this,
			'epsilon_framework_ajax_action'
		) );
		add_action( 'wp_ajax_nopriv_epsilon_framework_ajax_action', array(
			$this,
			'epsilon_framework_ajax_action'
		) );


	}

	/**
	 * Init custom controls
	 *
	 * @param object $wp_customize
	 */
	public function init_controls( $wp_customize ) {
		$controls = array( 'slider', 'toggle', 'typography', 'upsell', 'color-scheme' );
		$sections = array( 'pro', 'recommended-actions' );

		$path = get_template_directory() . '/inc/libraries/epsilon-framework';

		foreach ( $controls as $control ) {
			if ( file_exists( $path . '/controls/class-epsilon-control-' . $control . '.php' ) ) {
				require_once $path . '/controls/class-epsilon-control-' . $control . '.php';
			}
		}

		foreach ( $sections as $section ) {
			if ( file_exists( $path . '/sections/class-epsilon-section-' . $section . '.php' ) ) {
				require_once $path . '/sections/class-epsilon-section-' . $section . '.php';
			}
		}
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	public function customize_preview_styles() {
		wp_enqueue_style( 'epsilon-styles', get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/css/style.css' );
		wp_enqueue_script( 'epsilon-previewer', get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/js/epsilon-previewer.js', array(
			'jquery',
			'customize-preview'
		), 2, true );

		wp_localize_script( 'epsilon-previewer', 'WPUrls', array(
			'siteurl' => get_option( 'siteurl' ),
			'theme'   => get_template_directory_uri(),
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		) );
	}

	/*
	 * Our Customizer script
	 *
	 * Dependencies: Customizer Controls script (core)
	 */
	public function customizer_enqueue_scripts() {
		wp_enqueue_script( 'epsilon-object', get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/js/epsilon.js', array( 'jquery' ) );
		wp_localize_script( 'epsilon-object', 'WPUrls', array(
			'siteurl' => get_option( 'siteurl' ),
			'theme'   => get_template_directory_uri(),
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		) );
		wp_enqueue_style( 'epsilon-styles', get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/css/style.css' );

	}

	/**
	 * Ajax handler
	 */
	public function epsilon_framework_ajax_action() {
		if ( $_POST['action'] !== 'epsilon_framework_ajax_action' ) {
			wp_die( json_encode( array( 'status' => false, 'error' => 'Not allowed' ) ) );
		}

		if ( count( $_POST['args']['action'] ) !== 2 ) {
			wp_die( json_encode( array( 'status' => false, 'error' => 'Not allowed' ) ) );
		}

		if ( ! class_exists( $_POST['args']['action'][0] ) ) {
			wp_die( json_encode( array( 'status' => false, 'error' => 'Class does not exist' ) ) );
		}

		$class  = $_POST['args']['action'][0];
		$method = $_POST['args']['action'][1];
		$args   = $_POST['args']['args'];

		$response = $class::$method( $args );

		if ( 'ok' == $response ) {
			wp_die( json_encode( array( 'status' => true, 'message' => 'ok' ) ) );
		}

		wp_die( json_encode( array( 'status' => false, 'message' => 'nok' ) ) );
	}

	/**
	 * @param $args
	 *
	 * @return string
	 */
	public static function dismiss_required_action( $args ) {
		$option = get_option( $args['option'] );

		if ( $option ):
			$option[ $args['id'] ] = false;
			update_option( $args['option'], $option );
		else:
			$option = array(
				$args['id'] => false,
			);
			update_option( $args['option'], $option );
		endif;

		return 'ok';
	}
}