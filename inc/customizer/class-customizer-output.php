<?php 
/**
 * Ad_Booster_Customizer_Output renders 
 * customize option for theme.
 *
 * @package adbooster
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Ad_Booster_Customizer_Output' ) ) {

	class Ad_Booster_Customizer_Output {

		public function __construct() {

			add_filter( 'body_class', array( $this, 'body_classes' ) );
			add_filter( 'post_class', array( $this, 'thumbnail_position' ) );

			add_filter( 'adbooster_show_excerpt', array( $this, 'show_excerpt' ) );
			add_filter( 'excerpt_length', array( $this, 'custom_excerpt_length'), 999 );
			add_filter( 'excerpt_more', array( $this, 'custom_excerpt_more' ) );

			add_filter( 'adbooster_show_post_thumbnail', array( $this, 'show_post_thumbnail' ), 10);
			add_filter( 'adbooster_show_post_thumbnail', array( $this, 'show_single_post_thumbnail' ), 999);
			add_filter( 'post_class', array( $this, 'hide_post_thumbnail' ) );
			add_filter( 'adbooster_show_post_nav', array( $this, 'show_post_nav'));

			add_filter( 'adbooster_show_readmore', array( $this, 'show_readmore' ) );
			add_filter( 'adbooster_readmore_link_label', array( $this, 'change_readmore_label' ) );

			// Footer Widget
			add_filter( 'adbooster_footer_widget_columns', array( $this, 'footer_widget_columns' ) );
			add_filter( 'adbooster_footer_widget_rows', array( $this, 'footer_widget_rows' ) );

			// Post meta data
			add_filter( 'adbooster_enable_post_metadata', array( $this, 'single_post_meta_data' ) );

			add_filter( 'adbooster_enable_modified', array( $this, 'enable_modified_date' ) );


			// Date prefix
			add_filter( 'adbooster_prefix_post_metadata', array( $this, 'date_prefix' ) );

			add_filter( 'adbooster_thumbnail_size', array( $this, 'thumbnail_size' ), 10 );

			
		}

		/**
		 * Hooked to filter post metat data
		 *
		 * @since 1.2.0
		 * @param  array $metadata
		 * @return array
		 */
		public function single_post_meta_data( $metadata ) {

			if ( is_single() ) {

				$metadata = adbooster_get_option( 'blog_single_post_metadata', array() );

			} elseif ( is_archive() || is_home() ) {

				$metadata = adbooster_get_option( 'blog_posts_metadata', array() );
			}

			return $metadata;
		}

		/**
		 * Enable modified date?
		 *
		 * @since 1.2.0
		 * @return boolean
		 */
		public function enable_modified_date() {
			if ( is_single() ) {

				return adbooster_get_option( 'blog_single_post_modified_date', false );

			} elseif ( is_archive() || is_home() ) {

				return adbooster_get_option( 'blog_posts_modified_date', false );

			}
		}

		/**
		 * Hooked to filter date archive prefix
		 *
		 * @since 1.2.0
		 * @return [type] [description]
		 */
		public function date_prefix( $archive_prefix ) {

			$date_prefix = adbooster_get_option( 'blog_posts_date_prefix', '');

			if ( $date_prefix != '' ) {
				$archive_prefix['date'] = $archive_prefix['modified'] = $date_prefix;
			}

			return $archive_prefix;
		}

		public function body_classes( $classes ) {

			$sidebar = adbooster_get_option('blog_layout', 'right') . '-sidebar';

			$classes[] = $sidebar;

			if ( $sidebar === 'none-sidebar' ) {

				remove_action( 'adbooster_sidebar',        'adbooster_get_sidebar',          10 );

			} 

			return $classes;
		}

		public function thumbnail_position( $classes ) {

			if ( is_archive() || is_home() ) {

				$classes[] = 'thumbnail-on-' . adbooster_get_option('blog_layout_thumbnail_pos', 'left');

			}

			return $classes;
		}

		/**
		 * Apply filter adbooster_thumbnail_size base on
		 * Thumbnail position
		 *
		 * @since 1.0
		 * @return void
		 */
		public function thumbnail_size( $size ) {

			if ( ! is_single() ) {
				$pos = adbooster_get_option('blog_layout_thumbnail_pos', 'left');

				switch ( $pos ) {
					case 'left':
					case 'right':
						$size = 'medium';
						break;
					
					case 'top':
						$size = 'large';
						break;
				}
			}

			return $size;
			
		}

		public function custom_excerpt_length( $length ) {

			if ( is_admin() ) {
				return $length;
			}

			return adbooster_get_option('blog_post_excerpt_length', 20);

		}

		public function show_excerpt( $show ) {

			$enable = adbooster_get_option('blog_post_show_excerpt', 'on');

			if ( $enable == 'on' ) {
				return true;
			}

			return false;
			
		}

		public function custom_excerpt_more( $more  ) {

			if ( is_admin() ) {
				return $more;
			}

			return adbooster_get_option('blog_post_show_excerpt_more', '[...]');
		}

		public function show_readmore( $show ) {

			return adbooster_get_option( 'blog_post_show_readmore', true);
		}

		public function change_readmore_label() {

			return adbooster_get_option( 'blog_post_show_readmore_label', esc_html__( 'Continue reading &rarr;', 'adbooster' ) );
		}

		public function show_post_thumbnail( $show ) {

			return adbooster_get_option('blog_post_show_thumbnail', true);

		}

		public function show_post_nav( $show ) {

			return adbooster_get_option('blog_single_post_show_nav', true);
		}

		public function show_single_post_thumbnail( $show ) {

			if ( is_single() )

				return adbooster_get_option('blog_single_post_show_thumbnail', false);

			return $show;

		}

		public function hide_post_thumbnail( $classes ) {

			if ( ! $this->show_post_thumbnail( true ) ){

				$classes[] = "disable-thumbnail";
			}

			

			return $classes;
		}

		public function footer_widget_columns( $col ) {

			return adbooster_get_option('blog_footer_widget_cols', 4);

		}

		public function footer_widget_rows( $row ) {

			return adbooster_get_option('blog_footer_widget_rows', 1);

		}

	}
} // end if
new Ad_Booster_Customizer_Output();