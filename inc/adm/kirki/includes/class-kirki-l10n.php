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
				'background-color'      => esc_attr__( 'Background Color', 'beam' ),
				'background-image'      => esc_attr__( 'Background Image', 'beam' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'beam' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'beam' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'beam' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'beam' ),
				'inherit'               => esc_attr__( 'Inherit', 'beam' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'beam' ),
				'cover'                 => esc_attr__( 'Cover', 'beam' ),
				'contain'               => esc_attr__( 'Contain', 'beam' ),
				'background-size'       => esc_attr__( 'Background Size', 'beam' ),
				'fixed'                 => esc_attr__( 'Fixed', 'beam' ),
				'scroll'                => esc_attr__( 'Scroll', 'beam' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'beam' ),
				'left-top'              => esc_attr__( 'Left Top', 'beam' ),
				'left-center'           => esc_attr__( 'Left Center', 'beam' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'beam' ),
				'right-top'             => esc_attr__( 'Right Top', 'beam' ),
				'right-center'          => esc_attr__( 'Right Center', 'beam' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'beam' ),
				'center-top'            => esc_attr__( 'Center Top', 'beam' ),
				'center-center'         => esc_attr__( 'Center Center', 'beam' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'beam' ),
				'background-position'   => esc_attr__( 'Background Position', 'beam' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'beam' ),
				'on'                    => esc_attr__( 'ON', 'beam' ),
				'off'                   => esc_attr__( 'OFF', 'beam' ),
				'all'                   => esc_attr__( 'All', 'beam' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'beam' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'beam' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'beam' ),
				'greek'                 => esc_attr__( 'Greek', 'beam' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'beam' ),
				'khmer'                 => esc_attr__( 'Khmer', 'beam' ),
				'latin'                 => esc_attr__( 'Latin', 'beam' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'beam' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'beam' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'beam' ),
				'arabic'                => esc_attr__( 'Arabic', 'beam' ),
				'bengali'               => esc_attr__( 'Bengali', 'beam' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'beam' ),
				'tamil'                 => esc_attr__( 'Tamil', 'beam' ),
				'telugu'                => esc_attr__( 'Telugu', 'beam' ),
				'thai'                  => esc_attr__( 'Thai', 'beam' ),
				'serif'                 => _x( 'Serif', 'font style', 'beam' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'beam' ),
				'monospace'             => _x( 'Monospace', 'font style', 'beam' ),
				'font-family'           => esc_attr__( 'Font Family', 'beam' ),
				'font-size'             => esc_attr__( 'Font Size', 'beam' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'beam' ),
				'line-height'           => esc_attr__( 'Line Height', 'beam' ),
				'font-style'            => esc_attr__( 'Font Style', 'beam' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'beam' ),
				'top'                   => esc_attr__( 'Top', 'beam' ),
				'bottom'                => esc_attr__( 'Bottom', 'beam' ),
				'left'                  => esc_attr__( 'Left', 'beam' ),
				'right'                 => esc_attr__( 'Right', 'beam' ),
				'center'                => esc_attr__( 'Center', 'beam' ),
				'justify'               => esc_attr__( 'Justify', 'beam' ),
				'color'                 => esc_attr__( 'Color', 'beam' ),
				'add-image'             => esc_attr__( 'Add Image', 'beam' ),
				'change-image'          => esc_attr__( 'Change Image', 'beam' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'beam' ),
				'add-file'              => esc_attr__( 'Add File', 'beam' ),
				'change-file'           => esc_attr__( 'Change File', 'beam' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'beam' ),
				'remove'                => esc_attr__( 'Remove', 'beam' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'beam' ),
				'variant'               => esc_attr__( 'Variant', 'beam' ),
				'subsets'               => esc_attr__( 'Subset', 'beam' ),
				'size'                  => esc_attr__( 'Size', 'beam' ),
				'height'                => esc_attr__( 'Height', 'beam' ),
				'spacing'               => esc_attr__( 'Spacing', 'beam' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'beam' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'beam' ),
				'light'                 => esc_attr__( 'Light 200', 'beam' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'beam' ),
				'book'                  => esc_attr__( 'Book 300', 'beam' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'beam' ),
				'regular'               => esc_attr__( 'Normal 400', 'beam' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'beam' ),
				'medium'                => esc_attr__( 'Medium 500', 'beam' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'beam' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'beam' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'beam' ),
				'bold'                  => esc_attr__( 'Bold 700', 'beam' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'beam' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'beam' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'beam' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'beam' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'beam' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'beam' ),
				'add-new'           	=> esc_attr__( 'Add new', 'beam' ),
				'row'           		=> esc_attr__( 'row', 'beam' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'beam' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'beam' ),
				'back'                  => esc_attr__( 'Back', 'beam' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'beam' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'beam' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'beam' ),
				'none'                  => esc_attr__( 'None', 'beam' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'beam' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'beam' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'beam' ),
				'initial'               => esc_attr__( 'Initial', 'beam' ),
				'select-page'           => esc_attr__( 'Select a Page', 'beam' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'beam' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'beam' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'beam' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'beam' ),
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
