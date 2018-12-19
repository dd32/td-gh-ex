<?php
/**
 * Azauthority Customizer Class
 *
 * 
 * @package  Azauthority
 * @author   Azauthority
 * @author   Azauthority
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Azauthority_Customizer' ) ) :

	/**
	 * The Azauthority Customizer class
	 */
	class Azauthority_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			$this->token = 'azauthority';
			$this->conf_id = $this->token . '_conf_id';
			$this->panel_id = $this->token . '_panel_id';
			$this->includes();

			add_action( 'init', array( $this , 'customize_register' ) );
		
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer along with several other settings.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @since  1.0.0
		 */
		public function customize_register() {

			if ( ! class_exists( 'Azauthority_Kirki' ) ) 			
			return;

			require_once get_template_directory() . '/inc/customizer/include-kirki.php';

			// Load customize options from file
			require_once get_template_directory() . '/inc/customizer/customize-options.php';

			// Kirki Config
			add_filter( 'kirki/my_config/l10n', 	array( $this, 'kirki_ltenn' ) );

			Azauthority_Kirki::add_config( $this->conf_id, array(
				'option_type'	=> 'option',
				'option_name'	=> 'azauthority_options',
				'capability'	=> 'edit_theme_options',
			) );

			$this->_add_panel();
			$this->_add_sections();
			$this->_add_fields();

			add_filter('azauthority_remove_customize_control', array($this, 'remove_controls'));

		}


		public function remove_controls( $controls ) {

			$controls[] = 'azauthority_homepage_control';

			return $controls;
		}

		private function _add_panel() {
			
			Azauthority_Kirki::add_panel( $this->panel_id, array(
			    'priority'    => 200,
			    'title'       => __( 'Theme Options', 'azauthority' )
			) );
		}

		private function _add_sections() {

			$sections = azauthority_get_default_sections( $this->token );	

			if ( ! empty( $sections ) ) {

				foreach ($sections as $key => $section) {

					Azauthority_Kirki::add_section( $key, $section);

				}
			}
			
		}

		private function _add_fields() {

			$fields = azauthority_get_default_fields( $this->token );

			if ( ! empty( $fields ) ) {

				foreach ($fields as $field) {

					Azauthority_Kirki::add_field( $this->conf_id, $field);

				}
			}

		}

		public function azauthority_options() {
			// Merge Theme Options Array from Database with Default Options Array
			$theme_options = wp_parse_args( 
				
				// Get saved theme options from WP database
				get_option( 'azauthority_options', array() ), 
				
				// Merge with Default Options if setting was not saved yet
				azauthority__default_options()
				
			);

			// Return theme options
			return $theme_options;

		}


		public function azauthority_get_option( $setting, $default ) {

	    	$options = get_option( 'azauthority_options' );

	    	$value = $default;

		    if ( isset( $options[ $setting ] ) ) {
		        $value = $options[ $setting ];
		    }

	    	return $value;

		}

		private function includes() {
			require_once  get_template_directory() . '/inc/customizer/class-azauthority-kirki.php';
			
		}

		/**
		 * Translating Kirki strings 
		 * 
		 * @param  		array $l10n
		 * @since 		1.0.0
		 * @return 		array 
		 */
		public static function kirki_ltenn( $l10n ) {

			$l10n['background-color']      = esc_attr__( 'Background Color', 'azauthority' );
			$l10n['background-image']      = esc_attr__( 'Background Image', 'azauthority' );
			$l10n['no-repeat']             = esc_attr__( 'No Repeat', 'azauthority' );
			$l10n['repeat-all']            = esc_attr__( 'Repeat All', 'azauthority' );
			$l10n['repeat-x']              = esc_attr__( 'Repeat Horizontally', 'azauthority' );
			$l10n['repeat-y']              = esc_attr__( 'Repeat Vertically', 'azauthority' );
			$l10n['inherit']               = esc_attr__( 'Inherit', 'azauthority' );
			$l10n['background-repeat']     = esc_attr__( 'Background Repeat', 'azauthority' );
			$l10n['cover']                 = esc_attr__( 'Cover', 'azauthority' );
			$l10n['contain']               = esc_attr__( 'Contain', 'azauthority' );
			$l10n['background-size']       = esc_attr__( 'Background Size', 'azauthority' );
			$l10n['fixed']                 = esc_attr__( 'Fixed', 'azauthority' );
			$l10n['scroll']                = esc_attr__( 'Scroll', 'azauthority' );
			$l10n['background-attachment'] = esc_attr__( 'Background Attachment', 'azauthority' );
			$l10n['left-top']              = esc_attr__( 'Left Top', 'azauthority' );
			$l10n['left-center']           = esc_attr__( 'Left Center', 'azauthority' );
			$l10n['left-bottom']           = esc_attr__( 'Left Bottom', 'azauthority' );
			$l10n['right-top']             = esc_attr__( 'Right Top', 'azauthority' );
			$l10n['right-center']          = esc_attr__( 'Right Center', 'azauthority' );
			$l10n['right-bottom']          = esc_attr__( 'Right Bottom', 'azauthority' );
			$l10n['center-top']            = esc_attr__( 'Center Top', 'azauthority' );
			$l10n['center-center']         = esc_attr__( 'Center Center', 'azauthority' );
			$l10n['center-bottom']         = esc_attr__( 'Center Bottom', 'azauthority' );
			$l10n['background-position']   = esc_attr__( 'Background Position', 'azauthority' );
			$l10n['background-opacity']    = esc_attr__( 'Background Opacity', 'azauthority' );
			$l10n['on']                    = esc_attr__( 'ON', 'azauthority' );
			$l10n['off']                   = esc_attr__( 'OFF', 'azauthority' );
			$l10n['all']                   = esc_attr__( 'All', 'azauthority' );
			$l10n['cyrillic']              = esc_attr__( 'Cyrillic', 'azauthority' );
			$l10n['cyrillic-ext']          = esc_attr__( 'Cyrillic Extended', 'azauthority' );
			$l10n['devanagari']            = esc_attr__( 'Devanagari', 'azauthority' );
			$l10n['greek']                 = esc_attr__( 'Greek', 'azauthority' );
			$l10n['greek-ext']             = esc_attr__( 'Greek Extended', 'azauthority' );
			$l10n['khmer']                 = esc_attr__( 'Khmer', 'azauthority' );
			$l10n['latin']                 = esc_attr__( 'Latin', 'azauthority' );
			$l10n['latin-ext']             = esc_attr__( 'Latin Extended', 'azauthority' );
			$l10n['vietnamese']            = esc_attr__( 'Vietnamese', 'azauthority' );
			$l10n['hebrew']                = esc_attr__( 'Hebrew', 'azauthority' );
			$l10n['arabic']                = esc_attr__( 'Arabic', 'azauthority' );
			$l10n['bengali']               = esc_attr__( 'Bengali', 'azauthority' );
			$l10n['gujarati']              = esc_attr__( 'Gujarati', 'azauthority' );
			$l10n['tamil']                 = esc_attr__( 'Tamil', 'azauthority' );
			$l10n['telugu']                = esc_attr__( 'Telugu', 'azauthority' );
			$l10n['thai']                  = esc_attr__( 'Thai', 'azauthority' );
			$l10n['serif']                 = _x( 'Serif', 'font style', 'azauthority' );
			$l10n['sans-serif']            = _x( 'Sans Serif', 'font style', 'azauthority' );
			$l10n['monospace']             = _x( 'Monospace', 'font style', 'azauthority' );
			$l10n['font-family']           = esc_attr__( 'Font Family', 'azauthority' );
			$l10n['font-size']             = esc_attr__( 'Font Size', 'azauthority' );
			$l10n['font-weight']           = esc_attr__( 'Font Weight', 'azauthority' );
			$l10n['line-height']           = esc_attr__( 'Line Height', 'azauthority' );
			$l10n['font-style']            = esc_attr__( 'Font Style', 'azauthority' );
			$l10n['letter-spacing']        = esc_attr__( 'Letter Spacing', 'azauthority' );
			$l10n['top']                   = esc_attr__( 'Top', 'azauthority' );
			$l10n['bottom']                = esc_attr__( 'Bottom', 'azauthority' );
			$l10n['left']                  = esc_attr__( 'Left', 'azauthority' );
			$l10n['right']                 = esc_attr__( 'Right', 'azauthority' );
			$l10n['color']                 = esc_attr__( 'Color', 'azauthority' );
			$l10n['add-image']             = esc_attr__( 'Add Image', 'azauthority' );
			$l10n['change-image']          = esc_attr__( 'Change Image', 'azauthority' );
			$l10n['remove']                = esc_attr__( 'Remove', 'azauthority' );
			$l10n['no-image-selected']     = esc_attr__( 'No Image Selected', 'azauthority' );
			$l10n['select-font-family']    = esc_attr__( 'Select a font-family', 'azauthority' );
			$l10n['variant']               = esc_attr__( 'Variant', 'azauthority' );
			$l10n['subsets']               = esc_attr__( 'Subset', 'azauthority' );
			$l10n['size']                  = esc_attr__( 'Size', 'azauthority' );
			$l10n['height']                = esc_attr__( 'Height', 'azauthority' );
			$l10n['spacing']               = esc_attr__( 'Spacing', 'azauthority' );
			$l10n['ultra-light']           = esc_attr__( 'Ultra-Light 100', 'azauthority' );
			$l10n['ultra-light-italic']    = esc_attr__( 'Ultra-Light 100 Italic', 'azauthority' );
			$l10n['light']                 = esc_attr__( 'Light 200', 'azauthority' );
			$l10n['light-italic']          = esc_attr__( 'Light 200 Italic', 'azauthority' );
			$l10n['book']                  = esc_attr__( 'Book 300', 'azauthority' );
			$l10n['book-italic']           = esc_attr__( 'Book 300 Italic', 'azauthority' );
			$l10n['regular']               = esc_attr__( 'Normal 400', 'azauthority' );
			$l10n['italic']                = esc_attr__( 'Normal 400 Italic', 'azauthority' );
			$l10n['medium']                = esc_attr__( 'Medium 500', 'azauthority' );
			$l10n['medium-italic']         = esc_attr__( 'Medium 500 Italic', 'azauthority' );
			$l10n['semi-bold']             = esc_attr__( 'Semi-Bold 600', 'azauthority' );
			$l10n['semi-bold-italic']      = esc_attr__( 'Semi-Bold 600 Italic', 'azauthority' );
			$l10n['bold']                  = esc_attr__( 'Bold 700', 'azauthority' );
			$l10n['bold-italic']           = esc_attr__( 'Bold 700 Italic', 'azauthority' );
			$l10n['extra-bold']            = esc_attr__( 'Extra-Bold 800', 'azauthority' );
			$l10n['extra-bold-italic']     = esc_attr__( 'Extra-Bold 800 Italic', 'azauthority' );
			$l10n['ultra-bold']            = esc_attr__( 'Ultra-Bold 900', 'azauthority' );
			$l10n['ultra-bold-italic']     = esc_attr__( 'Ultra-Bold 900 Italic', 'azauthority' );
			$l10n['invalid-value']         = esc_attr__( 'Invalid Value', 'azauthority' );

			return $l10n;

		}

		/**
		 * Hook to remove some controls
		 * 
		 * @param  WP_Customize
		 * @return void
		 */
		// private function _remove_controls( $wp_customize ) {

		// 	$controls = apply_filters('azauthority_remove_customize_control', array() );

		// 	foreach ($controls as $control ) {

		// 		$wp_customize->remove_control($control);

		// 	}
		// }

		// /**
		//  * Get all of the Azauthority theme mods.
		//  * 
		//  *@since 1.0.0
		//  * @return array $azauthority_theme_mods The Azauthority Theme Mods.
		//  */
		public function get_azauthority_theme_mods() {
			$azauthority_theme_mods = array(
				//'background_color'               => azauthority_get_content_background_color(),
				'accent_color'                   => get_theme_mod( 'azauthority_accent_color' ),
				'header_background_color'        => get_theme_mod( 'azauthority_header_background_color' ),
				'header_link_color'              => get_theme_mod( 'azauthority_header_link_color' ),
				'header_link_hover_color'        => get_theme_mod( 'azauthority_header_link_hover_color' ),
				'header_text_color'              => get_theme_mod( 'azauthority_header_text_color' ),
				'footer_background_color'        => get_theme_mod( 'azauthority_footer_background_color' ),
				'widget_footer_background_color' => get_theme_mod( 'azauthority_widget_footer_background_color' ),
				'footer_heading_color'           => get_theme_mod( 'azauthority_footer_heading_color' ),
				'footer_text_color'              => get_theme_mod( 'azauthority_footer_text_color' ),
				'text_color'                     => get_theme_mod( 'azauthority_text_color' ),
				'heading_color'                  => get_theme_mod( 'azauthority_heading_color' ),
				'button_background_color'        => get_theme_mod( 'azauthority_button_background_color' ),
				'button_text_color'              => get_theme_mod( 'azauthority_button_text_color' ),
				'button_alt_background_color'    => get_theme_mod( 'azauthority_button_alt_background_color' ),
				'button_alt_text_color'          => get_theme_mod( 'azauthority_button_alt_text_color' ),
			);

			return apply_filters( 'azauthority_theme_mods', $azauthority_theme_mods );
		}

		/**
		 * Get Customizer css.
		 *
		 * @see get_azauthority_theme_mods()
		 * @since 1.0.0
		 * @return array $styles the css
		 */
		public function get_css() {
			$azauthority_theme_mods = $this->get_azauthority_theme_mods();
			$brighten_factor       = apply_filters( 'azauthority_brighten_factor', 25 );
			$darken_factor         = apply_filters( 'azauthority_darken_factor', -25 );

			$styles                = '
			.main-navigation ul li a,
			.site-title a,
			.site-branding h1 a

			{
				color: ' . $azauthority_theme_mods['header_link_color'] . ';
			}';

			return apply_filters( 'azauthority_customizer_css', $styles );
		}

		/**
		 * Assign Azauthority styles to individual theme mods.
		 *
		 * @return void
		 */
		public function set_azauthority_style_theme_mods() {
			set_theme_mod( 'azauthority_styles', $this->get_css() );
			set_theme_mod( 'azauthority_woocommerce_styles', $this->get_woocommerce_css() );
		}

		/**
		 * Add CSS in <head> for styles handled by the theme customizer
		 * If the Customizer is active pull in the raw css. Otherwise pull in the prepared theme_mods if they exist.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function add_customizer_css() {
			$azauthority_styles             = get_theme_mod( 'azauthority_styles' );
			$azauthority_woocommerce_styles = get_theme_mod( 'azauthority_woocommerce_styles' );

			if ( is_customize_preview() || ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) || ( false === $azauthority_styles && false === $azauthority_woocommerce_styles ) ) {
				wp_add_inline_style( 'azauthority-style', $this->get_css() );
				wp_add_inline_style( 'azauthority-woocommerce-style', $this->get_woocommerce_css() );
			} else {
				wp_add_inline_style( 'azauthority-style', get_theme_mod( 'azauthority_styles' ) );
				wp_add_inline_style( 'azauthority-woocommerce-style', get_theme_mod( 'azauthority_woocommerce_styles' ) );
			}
		}		

		
		/**
		 * Get site logo.
		 *
		 * @since 1.0.0
		 * @return string
		 */
		public function get_site_logo() {
			return azauthority_site_title_or_logo( false );
		}

		/**
		 * Get site name.
		 *
		 * @since 1.0.0
		 * @return string
		 */
		public function get_site_name() {
			return get_bloginfo( 'name', 'display' );
		}

		/**
		 * Get site description.
		 *
		 * @since 1.0.0
		 * @return string
		 */
		public function get_site_description() {
			return get_bloginfo( 'description', 'display' );
		}


		/**
		 * Render homepage components
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function maybe_apply_render_homepage_component() {

			$options = get_theme_mod( 'azauthority_homepage_control' );


			// Use pro options if it is available 
			if ( function_exists ('azauthority_pro_get_homepage_hooks') ) {

				$options = azauthority_pro_get_homepage_hooks();
			}

			$components = array();

			if ( isset( $options ) && '' != $options ) {
			
				$components = $options ;

				// Remove all existing actions on azauthority_homepage.
				remove_all_actions( 'azauthority_homepage' );

				foreach ($components as $k => $v) {

					if ( function_exists( $v ) ) {
							add_action( 'azauthority_homepage', esc_attr( $v ), $k );
					}
				}

			}

		}

	}


endif;

return new Azauthority_Customizer();