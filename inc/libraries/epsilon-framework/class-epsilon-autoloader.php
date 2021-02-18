<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Epsilon_Autoloader
 */
class Epsilon_Autoloader {
	public function __construct() {
		spl_autoload_register( array( $this, 'load' ) );
	}

	/**
	 * @param $class
	 */
	public function load( $class ) {
		/**
		 * All classes are prefixed with Sigma_
		 */
		$parts = explode( '_', $class );
		$bind  = implode( '-', $parts );

		$directories = array(
			get_template_directory(),
			get_template_directory() . '/controls/',
			get_template_directory() . '/sections/',
		);

		foreach ( $directories as $directory ) {
			if ( file_exists( $directory . '/class-' . strtolower( $bind ) . '.php' ) ) {
				require_once $directory . '/class-' . strtolower( $bind ) . '.php';

				return;
			}
		}

	}
}

$autoloader = new Epsilon_Autoloader();