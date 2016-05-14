<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'safreen' ),
				'background-image'      => esc_attr__( 'Background Image', 'safreen' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'safreen' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'safreen' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'safreen' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'safreen' ),
				'inherit'               => esc_attr__( 'Inherit', 'safreen' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'safreen' ),
				'cover'                 => esc_attr__( 'Cover', 'safreen' ),
				'contain'               => esc_attr__( 'Contain', 'safreen' ),
				'background-size'       => esc_attr__( 'Background Size', 'safreen' ),
				'fixed'                 => esc_attr__( 'Fixed', 'safreen' ),
				'scroll'                => esc_attr__( 'Scroll', 'safreen' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'safreen' ),
				'left-top'              => esc_attr__( 'Left Top', 'safreen' ),
				'left-center'           => esc_attr__( 'Left Center', 'safreen' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'safreen' ),
				'right-top'             => esc_attr__( 'Right Top', 'safreen' ),
				'right-center'          => esc_attr__( 'Right Center', 'safreen' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'safreen' ),
				'center-top'            => esc_attr__( 'Center Top', 'safreen' ),
				'center-center'         => esc_attr__( 'Center Center', 'safreen' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'safreen' ),
				'background-position'   => esc_attr__( 'Background Position', 'safreen' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'safreen' ),
				'on'                    => esc_attr__( 'ON', 'safreen' ),
				'off'                   => esc_attr__( 'OFF', 'safreen' ),
				'all'                   => esc_attr__( 'All', 'safreen' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'safreen' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'safreen' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'safreen' ),
				'greek'                 => esc_attr__( 'Greek', 'safreen' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'safreen' ),
				'khmer'                 => esc_attr__( 'Khmer', 'safreen' ),
				'latin'                 => esc_attr__( 'Latin', 'safreen' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'safreen' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'safreen' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'safreen' ),
				'arabic'                => esc_attr__( 'Arabic', 'safreen' ),
				'bengali'               => esc_attr__( 'Bengali', 'safreen' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'safreen' ),
				'tamil'                 => esc_attr__( 'Tamil', 'safreen' ),
				'telugu'                => esc_attr__( 'Telugu', 'safreen' ),
				'thai'                  => esc_attr__( 'Thai', 'safreen' ),
				'serif'                 => _x( 'Serif', 'font style', 'safreen' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'safreen' ),
				'monospace'             => _x( 'Monospace', 'font style', 'safreen' ),
				'font-family'           => esc_attr__( 'Font Family', 'safreen' ),
				'font-size'             => esc_attr__( 'Font Size', 'safreen' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'safreen' ),
				'line-height'           => esc_attr__( 'Line Height', 'safreen' ),
				'font-style'            => esc_attr__( 'Font Style', 'safreen' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'safreen' ),
				'top'                   => esc_attr__( 'Top', 'safreen' ),
				'bottom'                => esc_attr__( 'Bottom', 'safreen' ),
				'left'                  => esc_attr__( 'Left', 'safreen' ),
				'right'                 => esc_attr__( 'Right', 'safreen' ),
				'center'                => esc_attr__( 'Center', 'safreen' ),
				'justify'               => esc_attr__( 'Justify', 'safreen' ),
				'color'                 => esc_attr__( 'Color', 'safreen' ),
				'add-image'             => esc_attr__( 'Add Image', 'safreen' ),
				'change-image'          => esc_attr__( 'Change Image', 'safreen' ),
				'remove'                => esc_attr__( 'Remove', 'safreen' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'safreen' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'safreen' ),
				'variant'               => esc_attr__( 'Variant', 'safreen' ),
				'subsets'               => esc_attr__( 'Subset', 'safreen' ),
				'size'                  => esc_attr__( 'Size', 'safreen' ),
				'height'                => esc_attr__( 'Height', 'safreen' ),
				'spacing'               => esc_attr__( 'Spacing', 'safreen' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'safreen' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'safreen' ),
				'light'                 => esc_attr__( 'Light 200', 'safreen' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'safreen' ),
				'book'                  => esc_attr__( 'Book 300', 'safreen' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'safreen' ),
				'regular'               => esc_attr__( 'Normal 400', 'safreen' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'safreen' ),
				'medium'                => esc_attr__( 'Medium 500', 'safreen' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'safreen' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'safreen' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'safreen' ),
				'bold'                  => esc_attr__( 'Bold 700', 'safreen' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'safreen' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'safreen' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'safreen' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'safreen' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'safreen' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'safreen' ),
				'add-new'           	=> esc_attr__( 'Add new', 'safreen' ),
				'row'           		=> esc_attr__( 'row', 'safreen' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'safreen' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'safreen' ),
				'back'                  => esc_attr__( 'Back', 'safreen' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'safreen' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'safreen' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'safreen' ),
				'none'                  => esc_attr__( 'None', 'safreen' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'safreen' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'safreen' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'safreen' ),
				'initial'               => esc_attr__( 'Initial', 'safreen' ),
				'select-page'           => esc_attr__( 'Select a Page', 'safreen' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
