<?php
/**
 * The main Kirki object
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2015, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Early exit if the class already exists
if ( class_exists( 'Kirki_Toolkit' ) ) {
	return;
}

class Kirki_Toolkit {

	/** @var Kirki The only instance of this class */
	public static $instance = null;

	public static $version = '1.0.2';

	public $font_registry = null;
	public $scripts       = null;
	public $api           = null;
	public $styles        = array();

	/**
	 * Access the single instance of this class
	 * @return Kirki
	 */
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new Kirki_Toolkit();
		}
		return self::$instance;
	}

	/**
	 * Shortcut method to get the translation strings
	 */
	public static function i18n() {

		$i18n = array(
			'background-color'      => __( 'Background Color', 'beam' ),
			'background-image'      => __( 'Background Image', 'beam' ),
			'no-repeat'             => __( 'No Repeat', 'beam' ),
			'repeat-all'            => __( 'Repeat All', 'beam' ),
			'repeat-x'              => __( 'Repeat Horizontally', 'beam' ),
			'repeat-y'              => __( 'Repeat Vertically', 'beam' ),
			'inherit'               => __( 'Inherit', 'beam' ),
			'background-repeat'     => __( 'Background Repeat', 'beam' ),
			'cover'                 => __( 'Cover', 'beam' ),
			'contain'               => __( 'Contain', 'beam' ),
			'background-size'       => __( 'Background Size', 'beam' ),
			'fixed'                 => __( 'Fixed', 'beam' ),
			'scroll'                => __( 'Scroll', 'beam' ),
			'background-attachment' => __( 'Background Attachment', 'beam' ),
			'left-top'              => __( 'Left Top', 'beam' ),
			'left-center'           => __( 'Left Center', 'beam' ),
			'left-bottom'           => __( 'Left Bottom', 'beam' ),
			'right-top'             => __( 'Right Top', 'beam' ),
			'right-center'          => __( 'Right Center', 'beam' ),
			'right-bottom'          => __( 'Right Bottom', 'beam' ),
			'center-top'            => __( 'Center Top', 'beam' ),
			'center-center'         => __( 'Center Center', 'beam' ),
			'center-bottom'         => __( 'Center Bottom', 'beam' ),
			'background-position'   => __( 'Background Position', 'beam' ),
			'background-opacity'    => __( 'Background Opacity', 'beam' ),
			'ON'                    => __( 'ON', 'beam' ),
			'OFF'                   => __( 'OFF', 'beam' ),
			'all'                   => __( 'All', 'beam' ),
			'cyrillic'              => __( 'Cyrillic', 'beam' ),
			'cyrillic-ext'          => __( 'Cyrillic Extended', 'beam' ),
			'devanagari'            => __( 'Devanagari', 'beam' ),
			'greek'                 => __( 'Greek', 'beam' ),
			'greek-ext'             => __( 'Greek Extended', 'beam' ),
			'khmer'                 => __( 'Khmer', 'beam' ),
			'latin'                 => __( 'Latin', 'beam' ),
			'latin-ext'             => __( 'Latin Extended', 'beam' ),
			'vietnamese'            => __( 'Vietnamese', 'beam' ),
			'serif'                 => _x( 'Serif', 'font style', 'beam' ),
			'sans-serif'            => _x( 'Sans Serif', 'font style', 'beam' ),
			'monospace'             => _x( 'Monospace', 'font style', 'beam' ),
		);

		$config = apply_filters( 'kirki/config', array() );

		if ( isset( $config['i18n'] ) ) {
			$i18n = wp_parse_args( $config['i18n'], $i18n );
		}

		return $i18n;

	}

	/**
	 * Shortcut method to get the font registry.
	 */
	public static function fonts() {
		return self::get_instance()->font_registry;
	}

	/**
	 * Constructor is private, should only be called by get_instance()
	 */
	private function __construct() {
	}

}
