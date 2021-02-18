<?php
/**
 * Astra Theme Options
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

/**
 * Theme Options
 */
if ( ! class_exists( 'Ast_Theme_Options' ) ) {

	/**
	 * Theme Options
	 */
	class Ast_Theme_Options {

		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;

		/**
		 * Post id.
		 *
		 * @var $instance Post id.
		 */
		public static $post_id = null;

		/**
		 * A static option variable.
		 *
		 * @since 1.0
		 * @access private
		 * @var mixed $db_options
		 */
		private static $db_options;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			// Refresh options variables after customizer save.
			self::refresh();
			add_action( 'init', array( $this, 'update_options' ) );
		}

		/**
		 * Update Options
		 */
		function update_options() {
			self::refresh();
		}

		/**
		 * Set default theme option values
		 *
		 * @since 1.0
		 * @return default values of the theme.
		 */
		public static function defaults() {

			// Defaults list of options.
			return apply_filters( 'ast_theme_defaults', array(

				// Blog Single.
				'blog-single-width'                => 'default',
				'blog-single-max-width'            => 1280,
				'blog-single-meta'                 => array(
				'comments',
				'category',
				'author',
				),
				// Blog.
				'blog-width'                       => 'default',
				'blog-max-width'                   => 1280,
				'blog-post-content'                => 'excerpt',
				'blog-meta'                        => array(
				'comments',
				'category',
				'author',
				),
				// Colors.
				'text-color'                       => '#3a3a3a',
				'link-color'                       => '#0085ba',
				'link-h-color'                     => '#3a3a3a',

				// Buttons.
				'button-color'                     => '',
				'button-h-color'                   => '',
				'button-bg-color'                  => '',
				'button-bg-h-color'                => '',
				'button-radius'                    => 2,
				'button-v-padding'                 => 10,
				'button-h-padding'                 => 40,

				// Footer - Small.
				'footer-sml-layout'                => 'footer-sml-layout-1',
				'footer-sml-section-1'             => 'custom',
				'footer-sml-section-1-credit'      => __( 'Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'astra-theme' ),
				'footer-sml-section-2'             => '',
				'footer-sml-section-2-credit'      => __( 'Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'astra-theme' ),
				'footer-sml-dist-equal-align'      => true,
				'footer-sml-divider'               => 4,
				'footer-sml-divider-color'         => '#fff',
				'footer-layout-width'         	   => 'content',

				// General.
				'site-identity'                    => 'site-title',
				'site-logo'                        => AST_THEME_URI . 'assets/images/logo-white.png',
				'site-tagline'                     => 0,

				// Header - Primary.
				'header-main-rt-section'           => 'none',
				'header-main-rt-section-html'      => __( 'HTML is allowed here' , 'astra-theme' ),
				'header-main-sep'                  => 1,
				'header-main-sep-color'            => '',
				'header-main-layout-width'         => 'content',

				// Site Layout.
				'site-layout'                      => 'ast-full-width-layout',
				'site-content-width'               => 1280,
				'site-layout-outside-bg-color'     => '',
				'site-layout-outside-bg-color-opc' => 1,
				'site-layout-padded-width'         => 1280,
				'site-layout-padded-pad'           => 25,
				'site-layout-padded-bg-img'        => '',
				'site-layout-padded-bg-rep'        => 'no-repeat',
				'site-layout-padded-bg-size'       => 'cover',
				'site-layout-padded-bg-pos'        => 'center center',
				'site-layout-fluid-lr-padding'     => 25,
				'site-layout-box-width'            => 1280,
				'site-layout-box-bg-img'           => '',
				'site-layout-box-bg-rep'           => 'no-repeat',
				'site-layout-box-bg-size'          => 'cover',
				'site-layout-box-bg-atch'          => 'scroll',
				'site-layout-box-bg-pos'           => 'center center',

				// Container.
				'site-content-layout'              => 'plain-container',
				'single-page-content-layout'       => 'plain-container',
				'single-post-content-layout'       => 'content-boxed-container',
				'archive-post-content-layout'      => 'content-boxed-container',

				// Typography.
				'body-font-family'                 => 'inherit',
				'body-font-weight'                 => 'inherit',
				'font-size-body'                   => 15,
				'body-line-height'                 => '',
				'body-text-transform'              => '',
				'font-size-site-title'             => 35,
				'font-size-site-tagline'           => 15,
				'font-size-entry-title'            => 30,
				'font-size-page-title'             => 30,
				'font-size-h1'                     => 48,
				'font-size-h2'                     => 42,
				'font-size-h3'                     => 30,
				'font-size-h4'                     => 20,
				'font-size-h5'                     => 18,
				'font-size-h6'                     => 15,

				// Sidebar.
				'site-sidebar-layout'              => 'right-sidebar',
				'site-sidebar-width'               => 30,
				'single-page-sidebar-layout'  	   => 'no-sidebar',
				'single-post-sidebar-layout'  	   => 'right-sidebar',
				'archive-post-sidebar-layout' 	   => 'right-sidebar',
			) );

		}

		/**
		 * Get theme options from static array()
		 *
		 * @return array 	Return array of theme options.
		 */
		public static function get_options() {
			return self::$db_options;
		}

		/**
		 * Update theme static option array.
		 */
		public static function refresh() {
			self::$db_options = wp_parse_args(
				get_option( AST_THEME_SETTINGS ),
				self::defaults()
			);
		}

		/**
		 * Function to get Supported Custom Posts
		 *
		 * @param  boolean $with_tax Post has taxonomy.
		 * @return array
		 */
		public static function get_supported_posts( $with_tax = false ) {

			/**
			 * Dynamic Sidebars
			 *
			 * Generate dynamic sidebar for each post type.
			 */
			$post_types = get_post_types( array(
				'public' => true,
			), 'objects' );

			$supported_types     = array();
			$supported_types_tax = array();

			foreach ( $post_types as $slug => $post_type ) {

				// Avoid post types.
				if ( 'attachment' === $slug || 'page' === $slug || 'post' === $slug ) {
					continue;
				}

				// Add to supported post type.
				$supported_types[ $slug ] = $post_type->label;

				// Add the taxonomies for the post type.
				$taxonomies = get_object_taxonomies( $slug, 'objects' );
				$another = array();
				foreach ( $taxonomies as $taxonomy_slug => $taxonomy ) {

					if ( ! $taxonomy->public || ! $taxonomy->show_ui || 'post_format' == $taxonomy_slug ) {
						continue;
					}

					$another[] = $taxonomy->label;
				}

				// Add to supported post type.
				if ( count( $another ) ) {
					$supported_types_tax[] = $slug;
				}
			}

			if ( $with_tax ) {
				return $supported_types_tax;
			} else {
				return $supported_types;
			}
		}
	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
$ast_theme_options = Ast_Theme_Options::get_instance();
