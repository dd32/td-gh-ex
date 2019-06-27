<?php
/**
 * Backdrop Core ( src/Contracts/Customize/Customize.php )
 *
 * This file ( src/Contracts/Customize/Customize.php ) shows some basics on how to setup a WordPress
 * Customization API. This will place all of your theme options for the customizer.
 *
 * @package      Backdrop Core
 * @copyright    Copyright (C) 2019. Benjamin Lu
 * @license      GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author       Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Contracts\Customize;

/**
 * Customize
 *
 * @since  1.0.0
 * @access public
 *
 * @link   ( https://developer.wordpress.org/themes/customize-api )
 */
abstract class Customize {
	/**
	 * Construct
	 */
	public function __construct() {
		add_action( 'customize_register', [ $this, 'register_panels' ] );
		add_action( 'customize_register', [ $this, 'register_sections' ] );
		add_action( 'customize_register', [ $this, 'register_settings' ] );
		add_action( 'customize_register', [ $this, 'register_controls' ] );
	}

	/**
	 * Register register_panels
	 */
	public function register_panels( $manager ) {}
	
	/**
	 * Register register_sections
	 */
	public function register_sections( $manager ) {}

	/**
	 * Register register_settings
	 */
	public function register_settings( $manager ) {}

	/**
	 * Register register_controls
	 */
	public function register_controls( $manager ) {}
}