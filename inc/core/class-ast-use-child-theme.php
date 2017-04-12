<?php
/**
 * Use child theme
 *
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Use child theme
 */
if ( ! class_exists( 'Ast_Use_Child_Theme' ) && is_admin() ) {

	/**
	 * Use child theme
	 */
	class Ast_Use_Child_Theme {

		/**
		 * Theme
		 *
		 * @var $theme Theme.
		 */
		public $theme;

		/**
		 * Theme
		 *
		 * @var $child_slug Child theme slug.
		 */
		public $child_slug;

		/**
		 * Constructor
		 */
		function __construct() {
			add_action( 'admin_init', array( $this, 'admin_init' ) );
		}

		/**
		 * Admin init
		 */
		function admin_init() {

			// Exit if unauthorized.
			if ( ! current_user_can( 'switch_themes' ) ) {
				return;
			}

			$this->theme = wp_get_theme();

			// Exit if child theme.
			if ( false !== $this->theme->parent() ) {
				return;
			}

			// Exit if no direct access.
			if ( 'direct' != get_filesystem_method() ) {
				return;
			}

			add_action( 'wp_ajax_uct_activate', array( $this, 'activate_child_theme' ) );

		}

		/**
		 * Has child theme?
		 */
		function has_child_theme() {
			$themes           = wp_get_themes();
			$folder_name      = $this->theme->get_stylesheet();
			$this->child_slug = $folder_name . '-child';

			foreach ( $themes as $theme ) {
				if ( $folder_name == $theme->get( 'Template' ) ) {
					$this->child_slug = $theme->get_stylesheet();
					return true;
				}
			}

			return false;
		}

		/**
		 * Activate child theme
		 */
		public static function activate_child_theme() {

			$parent_slug = $this->theme->get_stylesheet();

			// Create child theme.
			if ( ! $this->has_child_theme() ) {
				$this->create_child_theme();
			}

			switch_theme( $this->child_slug );

			// Copy customizer settings, widgets, etc.
			$settings = get_option( 'theme_mods_' . $this->child_slug );

			if ( false === $settings ) {
				$parent_settings = get_option( 'theme_mods_' . $parent_slug );
				update_option( 'theme_mods_' . $this->child_slug, $parent_settings );
			}

			wp_die( esc_html__( 'All done!', 'astra-theme' ) );
		}

		/**
		 * Create child theme
		 */
		function create_child_theme() {

			global $wp_filesystem;

			$parent_dir = $this->theme->get_stylesheet_directory();
			$child_dir  = $parent_dir . '-child';

			if ( wp_mkdir_p( $child_dir ) ) {
				$creds = request_filesystem_credentials( admin_url() );

				// we already have direct access.
				WP_Filesystem( $creds );

				$wp_filesystem->put_contents( $child_dir . '/style.css', $this->style_css() );
				$wp_filesystem->put_contents( $child_dir . '/functions.php', $this->functions_php() );

				$img = $this->theme->get_screenshot( 'relative' );
				if ( false !== $img ) {
					$wp_filesystem->copy( "$parent_dir/$img", "$child_dir/$img" );
				}
			} else {
				wp_die( esc_html__( 'Error: theme folder not writable', 'astra-theme' ) );
			}
		}

		/**
		 * Style CSS
		 */
		function style_css() {
			$name = $this->theme->get( 'Name' ) . ' Child';
			$uri = $this->theme->get( 'ThemeURI' );
			$parent = $this->theme->get_stylesheet();
			$output = "/*
Theme Name:     {$name}
Theme URI:      {$uri}
Template:       {$parent}
Version:        1.0
*/
";
			return apply_filters( 'uct_style_css', $output );
		}

		/**
		 * Functions PHP file
		 */
		function functions_php() {
			$output = "<?php

function child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', AST_THEME_URI . 'style.css' );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' );
";
			return apply_filters( 'astra_child_theme_functions_php', $output );
		}
	}

	new Ast_Use_Child_Theme();
}// End if().
