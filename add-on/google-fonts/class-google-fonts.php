<?php
/**
 * Select/Modify google fonts using theme customizer
 *
 * @package Aamla
 * @since 1.0.1
 */

namespace aamla;

/**
 * Select/Modify google fonts using theme customizer
 *
 * @since  1.0.1
 */
class Google_Fonts {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  1.0.1
	 * @access protected
	 * @var    object
	 */
	protected static $instance = null;

	/**
	 * Holds array of fonts options.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    array
	 */
	public $font_controls = [];

	/**
	 * Holds array of google sans-serif fonts.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    array
	 */
	public $google_sans_fonts = [];

	/**
	 * Holds array of google serif fonts.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    array
	 */
	public $google_serif_fonts = [];

	/**
	 * Constructor method.
	 *
	 * @since  1.0.1
	 */
	public function __construct() {
		$this->font_options = apply_filters( 'aamla_google_fonts_controls', [
			'primary'   => [
				'label' => esc_html__( 'Google Font - 1', 'aamla' ),
			],
			'secondary' => [
				'label' => esc_html__( 'Google Font - 2', 'aamla' ),
			],
			'tertiary'  => [
				'label' => esc_html__( 'Google Font - Extra', 'aamla' ),
			],
		] );
	}

	/**
	 * Returns the instance of this class.
	 *
	 * @since  1.0.1
	 *
	 * @return object Instance of this class.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.1
	 */
	public static function init() {
		add_filter( 'aamla_theme_sections', [ self::get_instance(), 'add_sections' ] );
		add_filter( 'aamla_theme_controls', [ self::get_instance(), 'add_controls' ] );
		add_filter( 'aamla_theme_defaults', [ self::get_instance(), 'set_defaults' ] );
		add_filter( 'aamla_fonts', [ self::get_instance(), 'enqueue_google_fonts' ] );
		add_filter( 'aamla_dynamic_classic_editor_styles', [ self::get_instance(), 'fonts_css' ] );
		add_filter( 'aamla_gutenberg_styles', [ self::get_instance(), 'gutenberg_fonts_css' ] );
		add_filter( 'aamla_inline_styles', [ self::get_instance(), 'fonts_css' ] );
		add_filter( 'aamla_control_class_path', [ self::get_instance(), 'control_path' ], 10, 2 );
		add_filter( 'aamla_sanitized_value', [ self::get_instance(), 'sanitization' ], 10, 4 );
	}

	/**
	 * Add google fonts specific customizer section.
	 *
	 * @since 1.0.1
	 *
	 * @param  array $sections array of theme customizer sections.
	 * @return array Returns array of theme customizer sections.
	 */
	public function add_sections( $sections = [] ) {
		return array_merge( $sections,
			[
				'aamla_google_fonts_section' =>
				[
					'title' => esc_html__( 'Google Fonts', 'aamla' ),
					'panel' => 'aamla_theme_panel',
				],
			]
		);
	}

	/**
	 * Add google fonts specific customizer controls and settings.
	 *
	 * @since 1.0.1
	 *
	 * @param  array $controls array of theme controls and settings.
	 * @return array Returns array of theme controls and settings.
	 */
	public function add_controls( $controls = [] ) {
		$controls = array_merge( $controls,
			[
				[
					'label'   => esc_html__( 'Use Google Fonts', 'aamla' ),
					'section' => 'aamla_google_fonts_section',
					'setting' => 'aamla_use_google_fonts',
					'type'    => 'checkbox',
				],
			]
		);

		foreach ( $this->font_options as $id => $args ) {
			$controls = array_merge( $controls,
				[
					[
						'label'       => $args['label'],
						'section'     => 'aamla_google_fonts_section',
						'setting'     => "aamla_{$id}_google_font",
						'settings'    => [
							'family'    => "aamla_{$id}_font_family",
							'weight'    => "aamla_{$id}_font_weights",
							'selectors' => "aamla_{$id}_font_selectors",
						],
						'class'       => 'aamla\Customize_Google_Fonts',
						'path'        => 'class-customize-google-fonts',
						'js_template' => true,
					],
				]
			);
		}

		return $controls;
	}

	/**
	 * Set default values for google fonts customization options.
	 *
	 * @since 1.0.1
	 *
	 * @param  array $defaults Array of customizer option default values.
	 * @return array Returns Array of customizer option default values.
	 */
	public function set_defaults( $defaults = [] ) {
		$defaults = array_merge( $defaults, [ 'aamla_use_google_fonts' => 1 ] );

		foreach ( $this->font_options as $id => $args ) {
			$defaults = array_merge( $defaults,
				[ "aamla_{$id}_font_weights" => [ '400', '700' ] ]
			);
			if ( 'primary' === $id ) {
				$defaults = array_merge( $defaults, [
					"aamla_{$id}_font_family"    => 'roboto',
					"aamla_{$id}_font_selectors" => 'body',
				] );
			} elseif ( 'secondary' === $id ) {
				$defaults = array_merge( $defaults, [
					"aamla_{$id}_font_family"    => 'lora',
					"aamla_{$id}_font_selectors" => '.site-title, .entry-header-title',
				] );
			} else {
				$defaults = array_merge( $defaults, [
					"aamla_{$id}_font_family"    => 'none',
					"aamla_{$id}_font_selectors" => '',
				] );
			}
		}

		return $defaults;
	}

	/**
	 * Add path to google fonts custom control class.
	 *
	 * @since 1.0.1
	 *
	 * @param  string $path    Control class default path.
	 * @param  string $setting Setting for which control class required.
	 * @return string
	 */
	public function control_path( $path, $setting ) {
		$arr = [];
		foreach ( $this->font_options as $id => $args ) {
			$arr[] = "aamla_{$id}_google_font";
		}
		if ( in_array( $setting, $arr, true ) ) {
			$path = get_template_directory() . '/add-on/google-fonts/class-customize-google-fonts.php';
		}

		return $path;
	}

	/**
	 * Get array of google fonts to be enqueued.
	 *
	 * @since 1.0.1
	 *
	 * @param  array $fonts array of google fonts to be enqueued.
	 * @return array Returns array of theme customizer sections.
	 */
	public function enqueue_google_fonts( $fonts = [] ) {
		if ( ! aamla_get_mod( 'aamla_use_google_fonts', 'none' ) ) {
			return $fonts;
		}
		$google_fonts = [];

		foreach ( $this->font_options as $id => $args ) {
			$get_font = $this->get_font_enqueue_data( $id );
			if ( ! $get_font ) {
				continue;
			}
			if ( array_key_exists( $get_font[0], $google_fonts ) ) {
				$google_fonts[ $get_font[0] ] = array_unique( array_merge( $google_fonts[ $get_font[0] ], $get_font[1] ) );
			} else {
				$google_fonts[ $get_font[0] ] = $get_font[1];
			}
		}

		foreach ( $google_fonts as $font => $weights ) {
			if ( ! empty( $weights ) ) {
				$fonts[] = $font . ':' . implode( ',', $weights );
			} else {
				$fonts[] = $font;
			}
		}

		return $fonts;
	}

	/**
	 * Get array of google fonts to be enqueued.
	 *
	 * @since 1.0.1
	 *
	 * @param  string $css Inline css.
	 * @return string.
	 */
	public function fonts_css( $css ) {
		if ( ! aamla_get_mod( 'aamla_use_google_fonts' ) ) {
			return $css;
		}

		$sans       = $this->get_google_sans_fonts();
		$serif      = $this->get_google_serif_fonts();
		$font_stack = '';
		foreach ( $this->font_options as $id => $args ) {
			$font_selectors = aamla_get_mod( "aamla_{$id}_font_selectors", 'css_selector' );
			$font_base      = aamla_get_mod( "aamla_{$id}_font_family", 'none' );
			if ( 'none' === $font_base ) {
				continue;
			}
			if ( array_key_exists( $font_base, $sans ) ) {
				$font_stack = $sans[ $font_base ]['family'] . ', sans-serif';
			} elseif ( array_key_exists( $font_base, $serif ) ) {
				$font_stack = $serif[ $font_base ]['family'] . ', serif';
			}

			if ( $font_selectors && $font_stack ) {
				$font_css = $font_selectors . '{font-family:%s}';
				$css     .= sprintf( $font_css, $font_stack );
			}
		}

		return $css;
	}

	/**
	 * Get array of google fonts to be enqueued.
	 *
	 * @since 1.0.1
	 *
	 * @param  string $css Inline css.
	 * @return string.
	 */
	public function gutenberg_fonts_css( $css ) {
		if ( ! aamla_get_mod( 'aamla_use_google_fonts', 'none' ) ) {
			return $css;
		}

		$sans       = $this->get_google_sans_fonts();
		$serif      = $this->get_google_serif_fonts();
		$font_stack = '';
		foreach ( $this->font_options as $id => $args ) {
			$font_base = aamla_get_mod( "aamla_{$id}_font_family", 'none' );
			if ( 'none' === $font_base ) {
				continue;
			}
			if ( array_key_exists( $font_base, $sans ) ) {
				$font_stack = $sans[ $font_base ]['family'] . ', sans-serif';
			} elseif ( array_key_exists( $font_base, $serif ) ) {
				$font_stack = $serif[ $font_base ]['family'] . ', serif';
			}

			if ( $font_stack ) {
				/*
				 * We are using a simple approach to assign Primary font to editor body content and
				 * secondary font to entry title. However, more sophisticated approach required to
				 * better reflect front end style customization. Can be done in future updates
				 * (low priority).
				 */
				if ( 'primary' === $id ) {
					$font_css = '.edit-post-visual-editor,.edit-post-visual-editor p {font-family:%s}';
				}
				if ( 'secondary' === $id ) {
					$font_css = '.edit-post-visual-editor .editor-post-title textarea.editor-post-title__input {font-family:%s}';
				}
				$css .= sprintf( $font_css, $font_stack );
			}
		}

		return $css;
	}

	/**
	 * Get google font enqueue data.
	 *
	 * @since 1.0.1
	 *
	 * @param  string $font_type Primary or secondary google font.
	 * @return string
	 */
	public function get_font_enqueue_data( $font_type ) {
		$font_base = aamla_get_mod( "aamla_{$font_type}_font_family", 'none' );

		// Return if 'none' selected.
		if ( 'none' === $font_base ) {
			return '';
		}

		// Get font-family (Font Name).
		$all_google_fonts = array_merge( $this->get_google_sans_fonts(), $this->get_google_serif_fonts() );
		$font_name        = $all_google_fonts[ $font_base ]['family'];

		// Get font weights. If a weight is not supported by font family, get a fallback.
		$weight_id     = "aamla_{$font_type}_font_weights";
		$font_weights  = aamla_get_mod( $weight_id, 'none' );
		$valid_weights = $all_google_fonts[ $font_base ]['variants'];
		$weight_check  = $this->font_weight_fallback();
		$final_weights = [];
		foreach ( $font_weights as $weight ) {
			if ( ! in_array( $weight, $valid_weights, true ) ) {
				$fallback_array = $weight_check[ $weight ];
				foreach ( $fallback_array as $fallback ) {
					if ( in_array( $fallback, $valid_weights, true ) ) {
						$fallback        = esc_html( $fallback );
						$final_weights[] = $fallback;
						if ( in_array( "{$fallback}italic", $valid_weights, true ) ) {
							$final_weights[] = "{$fallback}italic";
						}
						break;
					}
				}
			} else {
				$weight          = esc_html( $weight );
				$final_weights[] = $weight;
				if ( in_array( "{$weight}italic", $valid_weights, true ) ) {
					$final_weights[] = "{$weight}italic";
				}
			}
		}

		return [ esc_html( $font_name ), array_unique( $final_weights ) ];
	}

	/**
	 * Sanitize google fonts customizer options.
	 *
	 * @since 1.0.1
	 *
	 * @param  Mixed                $default Settings default value.
	 * @param  Mixed                $type    Customizer control type.
	 * @param  Mixed                $option  Selected customizer option.
	 * @param  WP_Customize_Setting $setting Setting instance.
	 * @return Mixed Returns sanitized value of customizer option.
	 */
	public function sanitization( $default, $type, $option, $setting ) {
		$family    = [];
		$weight    = [];
		$selectors = [];
		foreach ( $this->font_options as $id => $args ) {
			$family[]    = "aamla_{$id}_font_family";
			$weight[]    = "aamla_{$id}_font_weights";
			$selectors[] = "aamla_{$id}_font_selectors";
		}
		switch ( $type ) {
			case 'font-selection':
				if ( in_array( $setting->id, $family, true ) ) {
					$choices = array_merge( $this->get_google_sans_fonts(), $this->get_google_serif_fonts() );

					if ( array_key_exists( $option, $choices ) || 'none' === $option ) {
						$sanitized_value = $option;
					} else {
						$sanitized_value = $setting->default;
					}
				} elseif ( in_array( $setting->id, $weight, true ) ) {
					$choices         = array_keys( $this->get_font_weights() );
					$sanitized_value = array_intersect( $option, $choices );
				} elseif ( in_array( $setting->id, $selectors, true ) ) {
					$option          = wp_strip_all_tags( $option, true );
					$sanitized_value = str_replace( [ "'", '@' ], '', $option );
				}
				break;

			default:
				$sanitized_value = $setting->default;
				break;
		} // End switch.

		return $sanitized_value;
	}

	/**
	 * Get google fonts array.
	 *
	 * @since 1.0.1
	 *
	 * @return array
	 */
	public function get_google_sans_fonts() {
		if ( empty( $this->google_sans_fonts ) ) {
			require_once get_template_directory() . '/add-on/google-fonts/admin/google-fonts.php';
			$this->google_sans_fonts  = aamla_google_sans_fonts();
			$this->google_serif_fonts = aamla_google_serif_fonts();
		}
		return $this->google_sans_fonts;
	}

	/**
	 * Get google fonts array.
	 *
	 * @since 1.0.1
	 *
	 * @return array
	 */
	public function get_google_serif_fonts() {
		if ( empty( $this->google_serif_fonts ) ) {
			require_once get_template_directory() . '/add-on/google-fonts/admin/google-fonts.php';
			$this->google_sans_fonts  = aamla_google_sans_fonts();
			$this->google_serif_fonts = aamla_google_serif_fonts();
		}
		return $this->google_serif_fonts;
	}

	/**
	 * Get font weight array.
	 *
	 * @since 1.0.1
	 *
	 * @return array
	 */
	public function get_font_weights() {
		return [
			'100' => esc_html__( 'Thin', 'aamla' ),
			'200' => esc_html__( 'Extra Light', 'aamla' ),
			'300' => esc_html__( 'Light', 'aamla' ),
			'400' => esc_html__( 'Normal', 'aamla' ),
			'500' => esc_html__( 'Medium', 'aamla' ),
			'600' => esc_html__( 'Semi Bold', 'aamla' ),
			'700' => esc_html__( 'Bold', 'aamla' ),
			'800' => esc_html__( 'Extra Bold', 'aamla' ),
			'900' => esc_html__( 'Ultra Bold', 'aamla' ),
		];
	}

	/**
	 * Font weight fallback array.
	 *
	 * @since 1.0.1
	 *
	 * @return array
	 */
	public function font_weight_fallback() {
		return [
			'100' => [ '200', '300', '400', '500', '600', '700', '800', '900' ],
			'200' => [ '100', '300', '400', '500', '600', '700', '800', '900' ],
			'300' => [ '200', '100', '400', '500', '600', '700', '800', '900' ],
			'400' => [ '500', '300', '200', '100', '600', '700', '800', '900' ],
			'500' => [ '400', '600', '700', '800', '900', '300', '200', '100' ],
			'600' => [ '700', '800', '900', '500', '400', '300', '200', '100' ],
			'700' => [ '800', '900', '600', '500', '400', '300', '200', '100' ],
			'800' => [ '900', '700', '600', '500', '400', '300', '200', '100' ],
			'900' => [ '800', '700', '600', '500', '400', '300', '200', '100' ],
		];
	}
}

Google_Fonts::init();
