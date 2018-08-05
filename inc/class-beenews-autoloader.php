<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class beenews_Autoloader
 */
class beenews_Autoloader {
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
			get_template_directory() . '/inc/',
			get_template_directory() . '/inc/library/',
			get_template_directory() . '/inc/library/welcome-screen/'
		);

		foreach ( $directories as $directory ) {
		//echo  $directory . 'class-' . strtolower( $bind ) . '.php' . "\n";

			if ( file_exists( $directory . '/class-' . strtolower( $bind ) . '.php' ) ) {
				include_once $directory . '/class-' . strtolower( $bind ) . '.php';
				
				//echo $directory . 'class-' . strtolower( $bind ) . '.php' . "\n";
	
				return;
			}
		}

	}
}

$autoloader = new beenews_Autoloader();