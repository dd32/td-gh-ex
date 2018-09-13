<?php
/**
 * Ad_Booster Class
 *
 * @author   BoosterWP
 * @since    1.0.0
 * @package  adbooster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Ad_Booster' ) ) :

	/**
	 * The main Ad_Booster class
	 */
	class Ad_Booster {


		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ));

			add_action( 'after_setup_theme',       array( $this, 'setup' ) );
			add_action( 'widgets_init',            array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts',      array( $this, 'scripts' ), 10 );
			add_action( 'wp_enqueue_scripts',         array( $this, 'child_scripts' ), 30 );
			add_filter( 'body_class',                 array( $this, 'body_classes' ) );
			add_filter( 'wp_page_menu_args',          array( $this, 'page_menu_args' ) );

			add_filter( 'navigation_markup_template', array( $this, 'navigation_markup_template' ) );
			add_action( 'enqueue_embed_scripts',      array( $this, 'print_embed_styles' ) );

			add_filter( 'get_the_archive_title', array( $this, 'the_archive_title' ) );
		}

		public static function get_theme_slug() {

			global $adbooster_slug;

			return $adbooster_slug;

		}

		public function setup() {

			// Loads wp-content/themes/azonbooster/languages/it_IT.mo.
			load_theme_textdomain( 'adbooster', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			/**
			 * Enable support for site logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 60,
				'flex-width'  => true,
				'flex-height' => true,
			) );

			// This theme uses wp_nav_menu() in two locations.
			register_nav_menus( array(
				'primary'   => __( 'Primary Menu', 'adbooster' ),
				'secondary' => __( 'Secondary Menu', 'adbooster' ),
				'footer'  => __( 'Footer Menu', 'adbooster' ),
			) );

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			) );

			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support( 'site-logo', array( 'size' => 'full' ) );

			// Declare support for title theme feature.
			add_theme_support( 'title-tag' );

			// Declare support for selective refreshing of widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );


		}

		public function widgets_init() {

			$sidebar_args['sidebar'] = array(
				'name'          => __( 'Sidebar', 'adbooster' ),
				'id'            => 'sidebar-1',
				'description'   => ''
			);

			$sidebar_args['header'] = array(
				'name'        => __( 'Banner Header', 'adbooster' ),
				'id'          => 'header-1',
				'description' => __( 'Widgets added to this region will appear on the banner header location. Recommend max-width: 728px and max-height: 90px', 'adbooster' ),
			);
			$sidebar_args['before-loop'] = array(
				'name'        => __( 'Before loop', 'adbooster' ),
				'id'          => 'before-loop',
				'description' => __( 'Widgets added to this region will appear before post loop', 'adbooster' ),
			);

			$sidebar_args['after-loop'] = array(
				'name'        => __( 'After loop', 'adbooster' ),
				'id'          => 'after-loop',
				'description' => __( 'Widgets added to this region will appear after post loop', 'adbooster' ),
			);

			$sidebar_args['before-single'] = array(
				'name'        => __( 'Before Single Post', 'adbooster' ),
				'id'          => 'before-single-post',
				'description' => __( 'Widgets added to this region will appear before single post.', 'adbooster' ),
			);

			$sidebar_args['after-single'] = array(
				'name'        => __( 'After Single Post', 'adbooster' ),
				'id'          => 'after-single-post',
				'description' => __( 'Widgets added to this region will appear after single post', 'adbooster' ),
			);

			$rows    = intval( apply_filters( 'adbooster_footer_widget_rows', 1 ) );
			$regions = intval( apply_filters( 'adbooster_footer_widget_columns', 4 ) );

			for ( $row = 1; $row <= $rows; $row++ ) {
				for ( $region = 1; $region <= $regions; $region++ ) {
					$footer_n = $region + $regions * ( $row - 1 ); // Defines footer sidebar ID.
					$footer   = sprintf( 'footer_%d', $footer_n );

					if ( 1 == $rows ) {
						// translators: %1$d: Number area
						$footer_region_name = sprintf( __( 'Footer Column %1$d', 'adbooster' ), $region );
						// translators: %1$d: Row number, %2$d: Column number
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', 'adbooster' ), $region );
					} else {
						// translators: %1$d: Row number
						$footer_region_name = sprintf( __( 'Footer Row %1$d - Column %2$d', 'adbooster' ), $row, $region );
						// translators: %1$d: Row number, %2$d: Column number
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of footer row %2$d.', 'adbooster' ), $region, $row );
					}

					$sidebar_args[ $footer ] = array(
						'name'        => $footer_region_name,
						'id'          => sprintf( 'footer-%d', $footer_n ),
						'description' => $footer_region_description,
					);
				}
			}

			foreach ( $sidebar_args as $sidebar => $args ) {
				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<span class="gamma widget-title">',
					'after_title'   => '</span>',
				);

				/**
				 * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See the list below.
				 *
				 * 'adbooster_header_widget_tags'
				 * 'adbooster_sidebar_widget_tags'
				 *
				 * 'adbooster_footer_1_widget_tags'
				 * 'adbooster_footer_2_widget_tags'
				 * 'adbooster_footer_3_widget_tags'
				 * 'adbooster_footer_4_widget_tags'
				 */
				$filter_hook = sprintf( 'adbooster_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}

		}

		public function scripts() {

			global $adbooster_version;

			/**
			 * Styles
			 */
			wp_enqueue_style( 'adbooster-style', get_template_directory_uri() . '/style.css', '', $adbooster_version );

			/**
			 * Fonts
			 */
			$google_fonts = apply_filters( 'adbooster_google_font_families', array(
				'pt-serif' => 'PT+Serif:400,400i,700,700i',
			) );

			$query_args = array(
				'family' => implode( '|', $google_fonts ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

			wp_enqueue_style( 'adbooster-fonts', $fonts_url, array(), null );

			/**
			 * Scripts
			 */
			wp_enqueue_script( 'adbooster-script', get_template_directory_uri() . '/assets/js/script.min.js', array( 'jquery' ), '20120206', true );
			

			/**
			 * Scripts
			 */
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}


		}

		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 * primary css and the separate WooCommerce css.
		 *
		 * @since  1.0.0
		 */
		public function child_scripts() {
			if ( is_child_theme() ) {
				wp_enqueue_style( 'adbooster-child-style', get_stylesheet_uri(), '' );
			}
		}

		/**
		 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
		 *
		 * @param array $args Configuration arguments.
		 * @return array
		 */
		public function page_menu_args( $args ) {
			$args['show_home'] = true;
			return $args;
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

			

			/**
			 * What is this?!
			 * Take the blue pill, close this file and forget you saw the following code.
			 * Or take the red pill, filter adbooster_make_me_cute and see how deep the rabbit hole goes...
			 */
			$cute = apply_filters( 'adbooster_make_me_cute', false );

			if ( true === $cute ) {
				$classes[] = 'adbooster-cute';
			}

			// If our main sidebar doesn't contain widgets, adjust the layout to be full-width.
			if ( ! is_active_sidebar( 'sidebar-1' ) ) {
				$classes[] = 'adbooster-full-width-content';
			}

			// Add class when using homepage template + featured image
			if ( is_page_template( 'template-homepage.php' ) && has_post_thumbnail() ) {
				$classes[] = 'has-post-thumbnail';
			}

			// Wide header for the billboard size
			$wide_header = apply_filters( 'adbooster_wide_header', false );

			if ( $wide_header ) {

				$classes[] = 'wide-header';

			}

			return $classes;
		}

		/**
		 * Custom navigation markup template hooked into `navigation_markup_template` filter hook.
		 */
		public function navigation_markup_template() {
			$template  = '<nav id="post-navigation" class="navigation %1$s" role="navigation" aria-label="' . esc_html__( 'Post Navigation', 'adbooster' ) . '">';
			$template .= '<span class="screen-reader-text">%2$s</span>';
			$template .= '<div class="nav-links">%3$s</div>';
			$template .= '</nav>';

			return apply_filters( 'adbooster_navigation_markup_template', $template );
		}

		/**
		 * Add styles for embeds
		 */
		public function print_embed_styles() {
			wp_enqueue_style( 'source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,700,900' );
			$accent_color     = get_theme_mod( 'adbooster_accent_color' );
			$background_color = adbooster_get_content_background_color();
			?>
			<style type="text/css">
				.wp-embed {
					padding: 2.618em !important;
					border: 0 !important;
					border-radius: 3px !important;
					font-family: "Source Sans Pro", "Open Sans", sans-serif !important;
					-webkit-font-smoothing: antialiased;
					background-color: <?php echo esc_html( adbooster_adjust_color_brightness( $background_color, -7 ) ); ?> !important;
				}

				.wp-embed .wp-embed-featured-image {
					margin-bottom: 2.618em;
				}

				.wp-embed .wp-embed-featured-image img,
				.wp-embed .wp-embed-featured-image.square {
					min-width: 100%;
					margin-bottom: .618em;
				}
			</style>
			<?php
		}

		public function the_archive_title() {
			if ( is_category() ) {
				/* translators: Category archive title. 1: Category name */
				$title = single_cat_title( '', false );
			} elseif ( is_tag() ) {
				/* translators: Tag archive title. 1: Tag name */
				$title = single_tag_title( '', false );
			} elseif ( is_author() ) {
				/* translators: Author archive title. 1: Author name */
				$title ='<span class="vcard">' . get_the_author() . '</span>';
			} elseif ( is_year() ) {
				/* translators: Yearly archive title. 1: Year */
				$title = get_the_date( _x( 'Y', 'yearly archives date format', 'adbooster' ) );

			} elseif ( is_month() ) {
				/* translators: Monthly archive title. 1: Month name and year */
				$title = get_the_date( _x( 'F Y', 'monthly archives date format', 'adbooster' ) );
			} elseif ( is_day() ) {
				/* translators: Daily archive title. 1: Date */
				$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'adbooster' ) );

			} elseif ( is_tax( 'post_format' ) ) {
				if ( is_tax( 'post_format', 'post-format-aside' ) ) {
					$title = _x( 'Asides', 'post format archive title', 'adbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
					$title = _x( 'Galleries', 'post format archive title', 'adbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
					$title = _x( 'Images', 'post format archive title', 'adbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
					$title = _x( 'Videos', 'post format archive title', 'adbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
					$title = _x( 'Quotes', 'post format archive title', 'adbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
					$title = _x( 'Links', 'post format archive title', 'adbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
					$title = _x( 'Statuses', 'post format archive title', 'adbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
					$title = _x( 'Audio', 'post format archive title', 'adbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
					$title = _x( 'Chats', 'post format archive title', 'adbooster' );
				}
			} elseif ( is_post_type_archive() ) {
				/* translators: Post type archive title. 1: Post type name */
				$title =  post_type_archive_title( '', false );
			} elseif ( is_tax() ) {
				$tax = get_taxonomy( get_queried_object()->taxonomy );
				/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
				$title = sprintf( __( '%1$s: %2$s', 'adbooster' ), $tax->labels->singular_name, single_term_title( '', false ) );
			} else {

				$title = '';
			}

			return $title;
		}

		public function register_required_plugins() {

			$plugins =  array(
				array(
					'name'      => 'Kirki',
					'slug'      => 'kirki',
					'required'  => false,
				),

			);
			$config = array(
				'id'           => 'adbooster',                 // Unique ID for hashing notices for multiple instances of TGMPA.
				'default_path' => '',                      // Default absolute path to bundled plugins.
				'menu'         => 'tgmpa-install-plugins', // Menu slug.
				'parent_slug'  => 'themes.php',            // Parent menu slug.
				'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices'  => true,                    // Show admin notices or not.
				'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
				'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => false,                   // Automatically activate plugins after installation or not.
				
			);

			if ( function_exists( 'tgmpa' ) ) {
				// require plugins 
				tgmpa( $plugins, $config );
			}
			

		}

	}

endif;

return new Ad_Booster();