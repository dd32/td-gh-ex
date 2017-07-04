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
				'background-color'      => esc_attr__( 'Background Color', 'ascreen' ),
				'background-image'      => esc_attr__( 'Background Image', 'ascreen' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'ascreen' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'ascreen' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'ascreen' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'ascreen' ),
				'inherit'               => esc_attr__( 'Inherit', 'ascreen' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'ascreen' ),
				'cover'                 => esc_attr__( 'Cover', 'ascreen' ),
				'contain'               => esc_attr__( 'Contain', 'ascreen' ),
				'background-size'       => esc_attr__( 'Background Size', 'ascreen' ),
				'fixed'                 => esc_attr__( 'Fixed', 'ascreen' ),
				'scroll'                => esc_attr__( 'Scroll', 'ascreen' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'ascreen' ),
				'left-top'              => esc_attr__( 'Left Top', 'ascreen' ),
				'left-center'           => esc_attr__( 'Left Center', 'ascreen' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'ascreen' ),
				'right-top'             => esc_attr__( 'Right Top', 'ascreen' ),
				'right-center'          => esc_attr__( 'Right Center', 'ascreen' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'ascreen' ),
				'center-top'            => esc_attr__( 'Center Top', 'ascreen' ),
				'center-center'         => esc_attr__( 'Center Center', 'ascreen' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'ascreen' ),
				'background-position'   => esc_attr__( 'Background Position', 'ascreen' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'ascreen' ),
				'on'                    => esc_attr__( 'ON', 'ascreen' ),
				'off'                   => esc_attr__( 'OFF', 'ascreen' ),
				'all'                   => esc_attr__( 'All', 'ascreen' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'ascreen' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'ascreen' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'ascreen' ),
				'greek'                 => esc_attr__( 'Greek', 'ascreen' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'ascreen' ),
				'khmer'                 => esc_attr__( 'Khmer', 'ascreen' ),
				'latin'                 => esc_attr__( 'Latin', 'ascreen' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'ascreen' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'ascreen' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'ascreen' ),
				'arabic'                => esc_attr__( 'Arabic', 'ascreen' ),
				'bengali'               => esc_attr__( 'Bengali', 'ascreen' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'ascreen' ),
				'tamil'                 => esc_attr__( 'Tamil', 'ascreen' ),
				'telugu'                => esc_attr__( 'Telugu', 'ascreen' ),
				'thai'                  => esc_attr__( 'Thai', 'ascreen' ),
				'serif'                 => _x( 'Serif', 'font style', 'ascreen' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'ascreen' ),
				'monospace'             => _x( 'Monospace', 'font style', 'ascreen' ),
				'font-family'           => esc_attr__( 'Font Family', 'ascreen' ),
				'font-size'             => esc_attr__( 'Font Size', 'ascreen' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'ascreen' ),
				'line-height'           => esc_attr__( 'Line Height', 'ascreen' ),
				'font-style'            => esc_attr__( 'Font Style', 'ascreen' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'ascreen' ),
				'top'                   => esc_attr__( 'Top', 'ascreen' ),
				'bottom'                => esc_attr__( 'Bottom', 'ascreen' ),
				'left'                  => esc_attr__( 'Left', 'ascreen' ),
				'right'                 => esc_attr__( 'Right', 'ascreen' ),
				'center'                => esc_attr__( 'Center', 'ascreen' ),
				'justify'               => esc_attr__( 'Justify', 'ascreen' ),
				'color'                 => esc_attr__( 'Color', 'ascreen' ),
				'add-image'             => esc_attr__( 'Add Image', 'ascreen' ),
				'change-image'          => esc_attr__( 'Change Image', 'ascreen' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'ascreen' ),
				'add-file'              => esc_attr__( 'Add File', 'ascreen' ),
				'change-file'           => esc_attr__( 'Change File', 'ascreen' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'ascreen' ),
				'remove'                => esc_attr__( 'Remove', 'ascreen' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'ascreen' ),
				'variant'               => esc_attr__( 'Variant', 'ascreen' ),
				'subsets'               => esc_attr__( 'Subset', 'ascreen' ),
				'size'                  => esc_attr__( 'Size', 'ascreen' ),
				'height'                => esc_attr__( 'Height', 'ascreen' ),
				'spacing'               => esc_attr__( 'Spacing', 'ascreen' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'ascreen' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'ascreen' ),
				'light'                 => esc_attr__( 'Light 200', 'ascreen' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'ascreen' ),
				'book'                  => esc_attr__( 'Book 300', 'ascreen' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'ascreen' ),
				'regular'               => esc_attr__( 'Normal 400', 'ascreen' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'ascreen' ),
				'medium'                => esc_attr__( 'Medium 500', 'ascreen' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'ascreen' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'ascreen' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'ascreen' ),
				'bold'                  => esc_attr__( 'Bold 700', 'ascreen' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'ascreen' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'ascreen' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'ascreen' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'ascreen' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'ascreen' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'ascreen' ),
				'add-new'           	=> esc_attr__( 'Add new', 'ascreen' ),
				'row'           		=> esc_attr__( 'row', 'ascreen' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'ascreen' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'ascreen' ),
				'back'                  => esc_attr__( 'Back', 'ascreen' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'ascreen' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'ascreen' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'ascreen' ),
				'none'                  => esc_attr__( 'None', 'ascreen' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'ascreen' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'ascreen' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'ascreen' ),
				'initial'               => esc_attr__( 'Initial', 'ascreen' ),
				'select-page'           => esc_attr__( 'Select a Page', 'ascreen' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'ascreen' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'ascreen' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'ascreen' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'ascreen' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
