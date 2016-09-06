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
		protected $textdomain = 'greenr';

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
				'background-color'      => esc_attr__( 'Background Color', 'greenr' ),
				'background-image'      => esc_attr__( 'Background Image', 'greenr' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'greenr' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'greenr' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'greenr' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'greenr' ),
				'inherit'               => esc_attr__( 'Inherit', 'greenr' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'greenr' ),
				'cover'                 => esc_attr__( 'Cover', 'greenr' ),
				'contain'               => esc_attr__( 'Contain', 'greenr' ),
				'background-size'       => esc_attr__( 'Background Size', 'greenr' ),
				'fixed'                 => esc_attr__( 'Fixed', 'greenr' ),
				'scroll'                => esc_attr__( 'Scroll', 'greenr' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'greenr' ),
				'left-top'              => esc_attr__( 'Left Top', 'greenr' ),
				'left-center'           => esc_attr__( 'Left Center', 'greenr' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'greenr' ),
				'right-top'             => esc_attr__( 'Right Top', 'greenr' ),
				'right-center'          => esc_attr__( 'Right Center', 'greenr' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'greenr' ),
				'center-top'            => esc_attr__( 'Center Top', 'greenr' ),
				'center-center'         => esc_attr__( 'Center Center', 'greenr' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'greenr' ),
				'background-position'   => esc_attr__( 'Background Position', 'greenr' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'greenr' ),
				'on'                    => esc_attr__( 'ON', 'greenr' ),
				'off'                   => esc_attr__( 'OFF', 'greenr' ),
				'all'                   => esc_attr__( 'All', 'greenr' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'greenr' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'greenr' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'greenr' ),
				'greek'                 => esc_attr__( 'Greek', 'greenr' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'greenr' ),
				'khmer'                 => esc_attr__( 'Khmer', 'greenr' ),
				'latin'                 => esc_attr__( 'Latin', 'greenr' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'greenr' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'greenr' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'greenr' ),
				'arabic'                => esc_attr__( 'Arabic', 'greenr' ),
				'bengali'               => esc_attr__( 'Bengali', 'greenr' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'greenr' ),
				'tamil'                 => esc_attr__( 'Tamil', 'greenr' ),
				'telugu'                => esc_attr__( 'Telugu', 'greenr' ),
				'thai'                  => esc_attr__( 'Thai', 'greenr' ),
				'serif'                 => _x( 'Serif', 'font style', 'greenr' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'greenr' ),
				'monospace'             => _x( 'Monospace', 'font style', 'greenr' ),
				'font-family'           => esc_attr__( 'Font Family', 'greenr' ),
				'font-size'             => esc_attr__( 'Font Size', 'greenr' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'greenr' ),
				'line-height'           => esc_attr__( 'Line Height', 'greenr' ),
				'font-style'            => esc_attr__( 'Font Style', 'greenr' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'greenr' ),
				'top'                   => esc_attr__( 'Top', 'greenr' ),
				'bottom'                => esc_attr__( 'Bottom', 'greenr' ),
				'left'                  => esc_attr__( 'Left', 'greenr' ),
				'right'                 => esc_attr__( 'Right', 'greenr' ),
				'center'                => esc_attr__( 'Center', 'greenr' ),
				'justify'               => esc_attr__( 'Justify', 'greenr' ),
				'color'                 => esc_attr__( 'Color', 'greenr' ),
				'add-image'             => esc_attr__( 'Add Image', 'greenr' ),
				'change-image'          => esc_attr__( 'Change Image', 'greenr' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'greenr' ),
				'add-file'              => esc_attr__( 'Add File', 'greenr' ),
				'change-file'           => esc_attr__( 'Change File', 'greenr' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'greenr' ),
				'remove'                => esc_attr__( 'Remove', 'greenr' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'greenr' ),
				'variant'               => esc_attr__( 'Variant', 'greenr' ),
				'subsets'               => esc_attr__( 'Subset', 'greenr' ),
				'size'                  => esc_attr__( 'Size', 'greenr' ),
				'height'                => esc_attr__( 'Height', 'greenr' ),
				'spacing'               => esc_attr__( 'Spacing', 'greenr' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'greenr' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'greenr' ),
				'light'                 => esc_attr__( 'Light 200', 'greenr' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'greenr' ),
				'book'                  => esc_attr__( 'Book 300', 'greenr' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'greenr' ),
				'regular'               => esc_attr__( 'Normal 400', 'greenr' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'greenr' ),
				'medium'                => esc_attr__( 'Medium 500', 'greenr' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'greenr' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'greenr' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'greenr' ),
				'bold'                  => esc_attr__( 'Bold 700', 'greenr' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'greenr' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'greenr' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'greenr' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'greenr' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'greenr' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'greenr' ),
				'add-new'           	=> esc_attr__( 'Add new', 'greenr' ),
				'row'           		=> esc_attr__( 'row', 'greenr' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'greenr' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'greenr' ),
				'back'                  => esc_attr__( 'Back', 'greenr' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'greenr' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'greenr' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'greenr' ),
				'none'                  => esc_attr__( 'None', 'greenr' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'greenr' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'greenr' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'greenr' ),
				'initial'               => esc_attr__( 'Initial', 'greenr' ),
				'select-page'           => esc_attr__( 'Select a Page', 'greenr' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'greenr' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'greenr' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'greenr' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'greenr' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
