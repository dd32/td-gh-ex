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

final class Kirki_Toolkit {

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
			'background-color'      => __( 'Background Color', 'beonepage' ),
			'background-image'      => __( 'Background Image', 'beonepage' ),
			'no-repeat'             => __( 'No Repeat', 'beonepage' ),
			'repeat-all'            => __( 'Repeat All', 'beonepage' ),
			'repeat-x'              => __( 'Repeat Horizontally', 'beonepage' ),
			'repeat-y'              => __( 'Repeat Vertically', 'beonepage' ),
			'inherit'               => __( 'Inherit', 'beonepage' ),
			'background-repeat'     => __( 'Background Repeat', 'beonepage' ),
			'cover'                 => __( 'Cover', 'beonepage' ),
			'contain'               => __( 'Contain', 'beonepage' ),
			'background-size'       => __( 'Background Size', 'beonepage' ),
			'fixed'                 => __( 'Fixed', 'beonepage' ),
			'scroll'                => __( 'Scroll', 'beonepage' ),
			'background-attachment' => __( 'Background Attachment', 'beonepage' ),
			'left-top'              => __( 'Left Top', 'beonepage' ),
			'left-center'           => __( 'Left Center', 'beonepage' ),
			'left-bottom'           => __( 'Left Bottom', 'beonepage' ),
			'right-top'             => __( 'Right Top', 'beonepage' ),
			'right-center'          => __( 'Right Center', 'beonepage' ),
			'right-bottom'          => __( 'Right Bottom', 'beonepage' ),
			'center-top'            => __( 'Center Top', 'beonepage' ),
			'center-center'         => __( 'Center Center', 'beonepage' ),
			'center-bottom'         => __( 'Center Bottom', 'beonepage' ),
			'background-position'   => __( 'Background Position', 'beonepage' ),
			'background-opacity'    => __( 'Background Opacity', 'beonepage' ),
			'on'                    => __( 'ON', 'beonepage' ),
			'off'                   => __( 'OFF', 'beonepage' ),
			'all'                   => __( 'All', 'beonepage' ),
			'cyrillic'              => __( 'Cyrillic', 'beonepage' ),
			'cyrillic-ext'          => __( 'Cyrillic Extended', 'beonepage' ),
			'devanagari'            => __( 'Devanagari', 'beonepage' ),
			'greek'                 => __( 'Greek', 'beonepage' ),
			'greek-ext'             => __( 'Greek Extended', 'beonepage' ),
			'khmer'                 => __( 'Khmer', 'beonepage' ),
			'latin'                 => __( 'Latin', 'beonepage' ),
			'latin-ext'             => __( 'Latin Extended', 'beonepage' ),
			'vietnamese'            => __( 'Vietnamese', 'beonepage' ),
			'hebrew'                => __( 'Hebrew', 'beonepage' ),
			'arabic'                => __( 'Arabic', 'beonepage' ),
			'bengali'               => __( 'Bengali', 'beonepage' ),
			'gujarati'              => __( 'Gujarati', 'beonepage' ),
			'tamil'                 => __( 'Tamil', 'beonepage' ),
			'telugu'                => __( 'Telugu', 'beonepage' ),
			'thai'                  => __( 'Thai', 'beonepage' ),
			'serif'                 => _x( 'Serif', 'font style', 'beonepage' ),
			'sans-serif'            => _x( 'Sans Serif', 'font style', 'beonepage' ),
			'monospace'             => _x( 'Monospace', 'font style', 'beonepage' ),
			'font-family'           => __( 'Font Family', 'beonepage' ),
			'font-size'             => __( 'Font Size', 'beonepage' ),
			'font-weight'           => __( 'Font Weight', 'beonepage' ),
			'line-height'           => __( 'Line Height', 'beonepage' ),
			'letter-spacing'        => __( 'Letter Spacing', 'beonepage' ),
			'top'                   => __( 'Top', 'beonepage' ),
			'bottom'                => __( 'Bottom', 'beonepage' ),
			'left'                  => __( 'Left', 'beonepage' ),
			'right'                 => __( 'Right', 'beonepage' ),
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

	/**
	 * Return true if we are debugging Kirki.
	 */
	public static function kirki_debug() {
		return (bool) ( defined( 'KIRKI_DEBUG' ) && KIRKI_DEBUG );
	}

    /**
     * Take a path and return it clean
     *
     * @param string $path
	 * @return string
     */
    public static function clean_file_path( $path ) {
        $path = str_replace( '', '', str_replace( array( "\\", "\\\\" ), '/', $path ) );
        if ( '/' === $path[ strlen( $path ) - 1 ] ) {
            $path = rtrim( $path, '/' );
        }
        return $path;
    }

	/**
	 * Determine if we're on a parent theme
	 *
	 * @param $file string
	 * @return bool
	 */
	public static function is_parent_theme( $file ) {
		$file = self::clean_file_path( $file );
		$dir  = self::clean_file_path( get_template_directory() );
		$file = str_replace( '//', '/', $file );
		$dir  = str_replace( '//', '/', $dir );
		if ( false !== strpos( $file, $dir ) ) {
			return true;
		}
		return false;
	}

	/**
	 * Determine if we're on a child theme.
	 *
	 * @param $file string
	 * @return bool
	 */
	public static function is_child_theme( $file ) {
		$file = self::clean_file_path( $file );
		$dir  = self::clean_file_path( get_stylesheet_directory() );
		$file = str_replace( '//', '/', $file );
		$dir  = str_replace( '//', '/', $dir );
		if ( false !== strpos( $file, $dir ) ) {
			return true;
		}
		return false;
	}

	/**
	 * Determine if we're running as a plugin
	 */
	private static function is_plugin() {
		if ( false !== strpos( self::clean_file_path( __FILE__ ), self::clean_file_path( get_stylesheet_directory() ) ) ) {
			return false;
		}
		if ( false !== strpos( self::clean_file_path( __FILE__ ), self::clean_file_path( get_template_directory_uri() ) ) ) {
			return false;
		}
		if ( false !== strpos( self::clean_file_path( __FILE__ ), self::clean_file_path( WP_CONTENT_DIR . '/themes/' ) ) ) {
			return false;
		}
		return true;
	}

	/**
	 * Determine if we're on a theme
	 *
	 * @param $file string
	 * @return bool
	 */
	public static function is_theme( $file ) {
		if ( true == self::is_child_theme( $file ) || true == self::is_parent_theme( $file ) ) {
			return true;
		}
		return false;
	}
}
