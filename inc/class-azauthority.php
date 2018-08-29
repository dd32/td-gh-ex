<?php
/**
 * Az_Authority Class
 *
 * @author   Az_Authority
 * @since    1.0.0
 * @package  Az_Authority
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Az_Authority' ) ) :

	class Az_Authority {
		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10 );
			add_filter( 'body_class', array( $this, 'body_classes' ) );
			add_filter( 'post_class', array( $this, 'post_classes' ) );
		}

		public function setup(){
			/*
			 * Load Localisation files.
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

			// Loads wp-content/themes/azauthority/languages/it_IT.mo.
			load_theme_textdomain( 'azauthority', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			/**
			 * Enable support for site logo
			 */
			add_theme_support( 'custom-logo', apply_filters( 'azauthority_custom_logo_args', array(
				'height'      => 45,
				'width'       => 210,
				'flex-width'  => true,
			) ) );

			// This theme uses wp_nav_menu() in two locations.
			register_nav_menus( apply_filters( 'azauthority_register_nav_menus', array(
				'primary'   => __( 'Primary Menu', 'azauthority' ),
				'footer'  => __( 'Footer Menu', 'azauthority' ),
			) ) );

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', apply_filters( 'azauthority_html5_args', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			) ) );

			// Setup the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'azauthority_custom_background_args', array(
				'default-color' => apply_filters( 'azauthority_default_background_color', 'ffffff' ),
				'default-image' => '',
			) ) );

			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support( 'site-logo', apply_filters( 'azauthority_site_logo_args', array(
				'size' => 'full'
			) ) );

			// Declare support for title theme feature.
			add_theme_support( 'title-tag' );

			// Declare support for selective refreshing of widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );		

		}


		/**
		 * Register widget area.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {
			$sidebar_args['sidebar'] = array(
				'name'          => __( 'Sidebar', 'azauthority' ),
				'id'            => 'sidebar-1',
				'description'   => ''
			);

			$rows    = intval( apply_filters( 'azauthority_footer_widget_rows', 1 ) );
			$regions = intval( apply_filters( 'azauthority_footer_widget_columns', 4 ) );

			for ( $row = 1; $row <= $rows; $row++ ) {
				for ( $region = 1; $region <= $regions; $region++ ) {
					$footer_n = $region + $regions * ( $row - 1 ); // Defines footer sidebar ID.
					$footer   = sprintf( 'footer_%d', $footer_n );

					if ( 1 == $rows ) {
						/* translators: %1$d: Number Columns */
						$footer_region_name = sprintf( __( 'Footer Column %1$d', 'azauthority' ), $region );

						/* translators: %1$d: Number Columns */
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', 'azauthority' ), $region );
					} else {

						/* translators: %1$d: Number Columns */
						/* translators: %2$d: Number Columns */
						$footer_region_name = sprintf( __( 'Footer Row %1$d - Column %2$d', 'azauthority' ), $row, $region );

						/* translators: %1$d: Number Columns */
						/* translators: %2$d: Number Columns */
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of footer row %2$d.', 'azauthority' ), $region, $row );
					}

					$sidebar_args[ $footer ] = array(
						'name'        => $footer_region_name,
						'id'          => sprintf( 'footer-%d', $footer_n ),
						'description' => $footer_region_description,
					);
				}
			}

			$sidebar_args = apply_filters( 'azauthority_sidebar_args', $sidebar_args );

			foreach ( $sidebar_args as $sidebar => $args ) {
				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-title">',
					'after_title'   => '</div>',
				);

				/**
				 * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See the list below.
				 *
				 * 'azauthority_header_widget_tags'
				 * 'azauthority_sidebar_widget_tags'
				 *
				 * 'azauthority_footer_1_widget_tags'
				 * 'azauthority_footer_2_widget_tags'
				 * 'azauthority_footer_3_widget_tags'
				 * 'azauthority_footer_4_widget_tags'
				 */
				$filter_hook = sprintf( 'azauthority_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}
		}

		public function scripts() {

			global $azauthority_version;

			/**
			 * Styles
			 */
			wp_enqueue_style( 'azauthority-style', get_template_directory_uri() . '/style.css', '', $azauthority_version );		

			/**
			 * Fonts
			 */
			$google_fonts = apply_filters( 'azauthority_google_font_families', array(
				'montserrat' => 'Montserrat:400,300,300italic,400italic,600,700,900',
			) );

			$query_args = array(
				'family' => implode( '|', $google_fonts ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

			wp_enqueue_style( 'azauthority-fonts', $fonts_url, array(), null );

			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_script( 'azauthority-script', get_template_directory_uri() . '/assets/js/script' . $suffix . '.js', array('jquery'), $azauthority_version, true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @return array
		 */
		public function body_classes( $classes ) {

			// Adds a class of group-blog to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			$layout = azauthority_get_theme_option( 'azauthority_sidebar_layout', 'none' );

			$post_style = apply_filters( 'azauthority_blog_post_style', 'post-list' );

			if ( $post_style != '' && 'none' == $layout ) {
				$classes[] = $post_style;
			}

			// Add sidebar if #template-homepage.php
			if ( ! is_page_template( 'template-homepage.php' ) ) {

				$classes[] = $layout . '-sidebar';
			}
			

			return $classes;
		}

		public function post_classes( $classes ) {

			$header_on = azauthority_enable_single_header_bg();

			if ( $header_on ) {
				$classes[] = 'has-thumbnail';
			} else {
				$classes[] = 'no-thumbnail';
			}

			return $classes;
		}
	}

endif;

return new Az_Authority();