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
		protected $textdomain = 'boxy';

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
				'background-color'      => esc_attr__( 'Background Color', 'boxy' ),
				'background-image'      => esc_attr__( 'Background Image', 'boxy' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'boxy' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'boxy' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'boxy' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'boxy' ),
				'inherit'               => esc_attr__( 'Inherit', 'boxy' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'boxy' ),
				'cover'                 => esc_attr__( 'Cover', 'boxy' ),
				'contain'               => esc_attr__( 'Contain', 'boxy' ),
				'background-size'       => esc_attr__( 'Background Size', 'boxy' ),
				'fixed'                 => esc_attr__( 'Fixed', 'boxy' ),
				'scroll'                => esc_attr__( 'Scroll', 'boxy' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'boxy' ),
				'left-top'              => esc_attr__( 'Left Top', 'boxy' ),
				'left-center'           => esc_attr__( 'Left Center', 'boxy' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'boxy' ),
				'right-top'             => esc_attr__( 'Right Top', 'boxy' ),
				'right-center'          => esc_attr__( 'Right Center', 'boxy' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'boxy' ),
				'center-top'            => esc_attr__( 'Center Top', 'boxy' ),
				'center-center'         => esc_attr__( 'Center Center', 'boxy' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'boxy' ),
				'background-position'   => esc_attr__( 'Background Position', 'boxy' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'boxy' ),
				'on'                    => esc_attr__( 'ON', 'boxy' ),
				'off'                   => esc_attr__( 'OFF', 'boxy' ),
				'all'                   => esc_attr__( 'All', 'boxy' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'boxy' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'boxy' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'boxy' ),
				'greek'                 => esc_attr__( 'Greek', 'boxy' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'boxy' ),
				'khmer'                 => esc_attr__( 'Khmer', 'boxy' ),
				'latin'                 => esc_attr__( 'Latin', 'boxy' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'boxy' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'boxy' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'boxy' ),
				'arabic'                => esc_attr__( 'Arabic', 'boxy' ),
				'bengali'               => esc_attr__( 'Bengali', 'boxy' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'boxy' ),
				'tamil'                 => esc_attr__( 'Tamil', 'boxy' ),
				'telugu'                => esc_attr__( 'Telugu', 'boxy' ),
				'thai'                  => esc_attr__( 'Thai', 'boxy' ),
				'serif'                 => _x( 'Serif', 'font style', 'boxy' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'boxy' ),
				'monospace'             => _x( 'Monospace', 'font style', 'boxy' ),
				'font-family'           => esc_attr__( 'Font Family', 'boxy' ),
				'font-size'             => esc_attr__( 'Font Size', 'boxy' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'boxy' ),
				'line-height'           => esc_attr__( 'Line Height', 'boxy' ),
				'font-style'            => esc_attr__( 'Font Style', 'boxy' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'boxy' ),
				'top'                   => esc_attr__( 'Top', 'boxy' ),
				'bottom'                => esc_attr__( 'Bottom', 'boxy' ),
				'left'                  => esc_attr__( 'Left', 'boxy' ),
				'right'                 => esc_attr__( 'Right', 'boxy' ),
				'center'                => esc_attr__( 'Center', 'boxy' ),
				'justify'               => esc_attr__( 'Justify', 'boxy' ),
				'color'                 => esc_attr__( 'Color', 'boxy' ),
				'add-image'             => esc_attr__( 'Add Image', 'boxy' ),
				'change-image'          => esc_attr__( 'Change Image', 'boxy' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'boxy' ),
				'add-file'              => esc_attr__( 'Add File', 'boxy' ),
				'change-file'           => esc_attr__( 'Change File', 'boxy' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'boxy' ),
				'remove'                => esc_attr__( 'Remove', 'boxy' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'boxy' ),
				'variant'               => esc_attr__( 'Variant', 'boxy' ),
				'subsets'               => esc_attr__( 'Subset', 'boxy' ),
				'size'                  => esc_attr__( 'Size', 'boxy' ),
				'height'                => esc_attr__( 'Height', 'boxy' ),
				'spacing'               => esc_attr__( 'Spacing', 'boxy' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'boxy' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'boxy' ),
				'light'                 => esc_attr__( 'Light 200', 'boxy' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'boxy' ),
				'book'                  => esc_attr__( 'Book 300', 'boxy' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'boxy' ),
				'regular'               => esc_attr__( 'Normal 400', 'boxy' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'boxy' ),
				'medium'                => esc_attr__( 'Medium 500', 'boxy' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'boxy' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'boxy' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'boxy' ),
				'bold'                  => esc_attr__( 'Bold 700', 'boxy' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'boxy' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'boxy' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'boxy' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'boxy' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'boxy' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'boxy' ),
				'add-new'           	=> esc_attr__( 'Add new', 'boxy' ),
				'row'           		=> esc_attr__( 'row', 'boxy' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'boxy' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'boxy' ),
				'back'                  => esc_attr__( 'Back', 'boxy' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'boxy' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'boxy' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'boxy' ),
				'none'                  => esc_attr__( 'None', 'boxy' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'boxy' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'boxy' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'boxy' ),
				'initial'               => esc_attr__( 'Initial', 'boxy' ),
				'select-page'           => esc_attr__( 'Select a Page', 'boxy' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'boxy' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'boxy' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'boxy' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'boxy' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
