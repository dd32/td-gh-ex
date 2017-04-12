<?php
/**
 * Loader Functions
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Enqueue Scripts
 */
if ( ! class_exists( 'AST_Enqueue_Scripts' ) ) {

	/**
	 * Theme Enqueue Scripts
	 */
	class AST_Enqueue_Scripts {

		/**
		 * Constructor
		 */
		public function __construct() {

			add_action( 'ast_get_fonts',      array( $this, 'add_fonts' ), 1 );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 1 );

		}

		/**
		 * Register and Enqueue styles
		 *
		 * @param  string $handle Style handle.
		 * @param  string $src    Style src.
		 * @param  mixed  $deps   Style deps.
		 * @param  string $ver    Style ver.
		 * @param  string $media  Style media.
		 * @return void
		 */
		public static function register_style( $handle = '', $src = '', $deps = '', $ver = '', $media = '' ) {

			// Load minified assets.
			if ( ! SCRIPT_DEBUG ) {
				$src = str_replace( '.css', '.min.css', $src ); 			// Change extension.
				$src = str_replace( 'unminified', 'minified', $src ); 	// Change directory.
			}

			// Register.
			wp_register_style( $handle, $src, $deps, $ver, $media );

			// Enqueue.
			wp_enqueue_style( $handle );

		}

		/**
		 * Register and Enqueue Scripts
		 *
		 * @param  string $handle 		Script handle.
		 * @param  string $src    		Script src.
		 * @param  mixed  $deps   		Script deps.
		 * @param  string $ver    		Script ver.
		 * @param  string $in_footer  	Script in_footer.
		 * @return void
		 */
		public static function register_script( $handle = '', $src = '', $deps = '', $ver = '', $in_footer = '' ) {

			// Load minified assets.
			if ( ! SCRIPT_DEBUG ) {
				$src = str_replace( '.js', '.min.js', $src ); 			// Change extension.
				$src = str_replace( 'unminified', 'minified', $src ); 	// Change directory.
			}

			// Register.
			wp_register_script( $handle, $src, $deps, $ver, $in_footer );

			// Enqueue.
			wp_enqueue_script( $handle );

		}

		/**
		 * Add Fonts
		 */
		public function add_fonts() {

			$font_family = ast_get_option( 'body-font-family' );
			$font_weight = ast_get_option( 'body-font-weight' );

			Ast_Fonts::add_font( $font_family, $font_weight );
		}

		/**
		 * Enqueue Scripts
		 */
		public function enqueue_scripts() {

			// Register styles.
			self::register_style( 'ast-theme-css', 	AST_THEME_URI . 'assets/css/unminified/style.css', 		 array(), AST_THEME_VERSION, 'all' );
			self::register_style( 'ast-fonts', 		AST_THEME_URI . 'assets/css/unminified/astra-fonts.css', array(), AST_THEME_VERSION, 'all' );

			// Inline.
			wp_add_inline_style( 'ast-theme-css', AST_Dynamic_CSS::return_output() );
			wp_add_inline_style( 'ast-theme-css', AST_Dynamic_CSS::return_meta_output( true ) );

			// Fonts - Render Fonts.
			Ast_Fonts::render_fonts();

			self::register_script( 'ast-flexibility', AST_THEME_URI . 'assets/js/unminified/flexibility.js', 		array(), AST_THEME_VERSION, true );
			self::register_script( 'ast-navigation', AST_THEME_URI . 'assets/js/unminified/navigation.js', 			array(), AST_THEME_VERSION, true );
			self::register_script( 'ast-skip-link', AST_THEME_URI . 'assets/js/unminified/skip-link-focus-fix.js', 	array(), AST_THEME_VERSION, true );

			wp_script_add_data( 'ast-flexibility', 'conditional', 'lt IE 9' );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			global $wp_query;

			// Registered localize framework options object 'astra-theme'.
			$ast_localize = array(
				'break_point' => ast_header_break_point(), 	// Header Break Point.
			);

			wp_localize_script( 'ast-navigation', 'ast', apply_filters( 'ast_theme_js_localize', $ast_localize ) );

		}

		/**
		 * Trim CSS
		 *
		 * @since 1.0
		 * @param string $css CSS content to trim.
		 * @return string
		 */
		static public function trim_css( $css = '' ) {

			// Trim white space for faster page loading.
			if ( ! empty( $css ) ) {
				$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
				$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
				$css = str_replace( ', ', ',', $css );
			}

			return $css;
		}

	}

	new AST_Enqueue_Scripts();
}// End if().
