<?php
/**
 *
 * Prevents the theme from running on WordPress versions prior to 4.1,
 *
 * @package aesblo
 * @since 1.0.0
 */

class Aesblo_Back_Compact {
	/**
	 * The message for output.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private $message;
	
	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		$this->message = $this->get_message();
		
		add_action( 'after_switch_theme',				array( $this, 'switch_theme' ) );
		add_action( 'load-customize.php', 				array( $this, 'customize' ) );
		add_action( 'template_redirect', 				array( $this, 'preview' ) );
	}
	
	/**
	 * Get message.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return string
	 */
	private function get_message() {
		return sprintf( __( 'Aesblo requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'aesblo' ), $GLOBALS['wp_version'] );
	}
	
	/**
	 * Prevent switching to old versions of WordPress.
	 *
	 * Switches to the default theme.
	 *
	 * @since 1.0.0
	 * @access public
	 */	
	public function switch_theme() {
		switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
		unset( $_GET['activated'] );
		add_action( 'admin_notices', array( $this, 'upgrade_notice' ) );		
	}
	
	/**
	 * Add message for unsuccessful theme switch.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function upgrade_notice() {
		printf( '<div class="error"><p>%s</p></div>', $this->message );
	}
	
	/**
	 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function customize() {
		wp_die( $this->message, '', array(
			'back_link' => true
		) );
	}
	
	/**
	 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function preview() {
		if ( isset( $_GET['preview'] ) ) {
			wp_die( $this->message );
		}		
	}
}

new Aesblo_Back_Compact;
