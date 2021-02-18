<?php
/**
 * Class For Breadcrumbs
 *
 * @package Kadence Framework Classes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Kadence_Breadcrumbs' ) ) {
	/**
	 * Kadence Breadcrumbs Class
	 */
	class Kadence_Breadcrumbs {
		/**
		 * Instance Control
		 *
		 * @var array
		 */
		protected static $instance = null;

		/**
		 * Breadcrumb separator.
		 *
		 * @var string/null
		 */
		private $sep = null;

		/**
		 * Breadcrumb link.
		 *
		 * @var string/null
		 */
		private $link = null;

		/**
		 * Breadcrumb settings.
		 *
		 * @var array
		 */
		private $settings = array();

		/**
		 * Local breadcrumb args.
		 *
		 * @var array
		 */
		private $args = array();

		/**
		 * Breadcrumb post types.
		 *
		 * @var array
		 */
		private $post_types = array();

		/**
		 * Singleton instance Control
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Get the breadcrumbs.
		 *
		 * @param array $args Arguments.
		 * @return string
		 */
		public function get_breadcrumb( $args = array() ) {
			$this->args = apply_filters(
				'kadence_local_breadcrumb_args',
				wp_parse_args(
					$args,
					array(
						'home_title'     => 'Home',
						'404_title'      => 'Error 404',
						'search_title'   => 'Search results for',
						'page'           => 'Page',
						'show_shop'      => true,
						'color_style'    => '',
						'blog_id'        => '',
						'portfolio_id'   => '',
						'staff_id'       => '',
						'testimonial_id' => '',
					)
				)
			);
			$this->settings = wp_parse_args(
				apply_filters( 'kadence_breadcrumb_args', array() ),
				array(
					'home'             => true,
					'before'           => '<span class="kad-breadcurrent">',
					'after'            => '</span>',
					'home_link'        => home_url( '/' ),
					'wrap_before'      => '<div id="kadbreadcrumbs" class="color_gray"><div class="kt-breadcrumb-container container" ' . ( $this->args['color_style'] ? 'style="' . esc_attr( $this->args['color_style'] ) . '"' : '' ) . '>',
					'wrap_after'       => '</div></div>',
					'delimiter'        => apply_filters( 'kadence_breadcrumb_delimiter', '&raquo;' ),
					'delimiter_before' => '<span class="bc-delimiter">',
					'delimiter_after'  => '</span>',
					'link_before'      => '<span>',
					'link_after'       => '</span>',
					'link_in_before'   => '<span>',
					'link_in_after'    => '</span>',
				)
			);
			$this->post_types = wp_parse_args(
				apply_filters( 'kadence_breadcrumb_post_types', array() ),
				array(
					'product'      => array(
						'post_type'     => 'product',
						'taxonomy'      => 'product_cat',
						'archive_page'  => 'shop',
						'archive_label' => '',
					),
					'portfolio'    => array(
						'post_type'     => 'portfolio',
						'taxonomy'      => 'portfolio-type',
						'archive_page'  => $this->args['portfolio_id'],
						'archive_label' => '',
					),
					'post'         => array(
						'post_type'     => 'post',
						'taxonomy'      => 'category',
						'archive_page'  => $this->args['blog_id'],
						'archive_label' => '',
					),
					'staff'        => array(
						'post_type'     => 'staff',
						'taxonomy'      => 'staff-group',
						'archive_page'  => $this->args['staff_id'],
						'archive_label' => '',
					),
					'testimonial'  => array(
						'post_type'     => 'testimonial',
						'taxonomy'      => 'testimonial-group',
						'archive_page'  => $this->args['testimonial_id'],
						'archive_label' => '',
					),
					'tribe_events' => array(
						'post_type'     => 'tribe_events',
						'taxonomy'      => '',
						'archive_page'  => 'tribe_events',
						'archive_label' => '',
					),
					'event'        => array(
						'post_type'     => 'event',
						'taxonomy'      => 'event-category',
						'archive_page'  => '',
						'archive_label' => '',
					),
					'podcast'      => array(
						'post_type'     => 'podcast',
						'taxonomy'      => 'series',
						'archive_page'  => '',
						'archive_label' => '',
					),
					'course'      => array(
						'post_type'     => 'course',
						'taxonomy'      => 'course_cat',
						'archive_page'  => get_option( 'lifterlms_shop_page_id' ),
						'archive_label' => '',
					),
					'lesson'      => array(
						'post_type'     => 'lesson',
						'taxonomy'      => '',
						'custom'        => 'liferlms',
						'archive_page'  => get_option( 'lifterlms_shop_page_id' ),
						'archive_label' => '',
					),
				)
			);
			$html = '';

			if ( ! is_front_page() ) {
				$html .= $this->settings['wrap_before'];
				if ( $this->settings['home'] ) {
					$html .= $this->get_crumbs_frontpage() . $this->get_sep();
				}
				$html = apply_filters( 'kadence_breadcrumbs_after_home', $html );
				if ( is_home() ) {
					$html .= $this->get_crumbs_home();
				} elseif ( is_404() ) {
					$html .= $this->get_crumbs_404();
				} elseif ( is_search() ) {
					$html .= $this->get_crumbs_search();
				} elseif ( is_attachment() ) {
					$html .= $this->get_crumbs_attachment();
				} elseif ( function_exists( 'is_shop' ) && is_shop() ) {
					$html .= $this->get_crumbs_shop();
				} elseif ( is_single() && ! is_attachment() ) {
					$html .= $this->get_crumbs_single();
				} elseif ( is_page() ) {
					$html .= $this->get_crumbs_page();
				} elseif ( function_exists( 'is_product_category' ) && is_product_category() ) {
					$html .= $this->get_crumbs_product_category();
				} elseif ( function_exists( 'is_product_tag' ) && is_product_tag() ) {
					$html .= $this->get_crumbs_product_tag();
				} elseif ( is_category() ) {
					$html .= $this->get_crumbs_category();
				} elseif ( is_tag() ) {
					$html .= $this->get_crumbs_tag();
				} elseif ( is_tax() ) {
					$html .= $this->get_crumbs_tax();
				} elseif ( is_date() ) {
					$html .= $this->get_crumbs_date();
				} elseif ( is_author() ) {
					$html .= $this->get_crumbs_author();
				} else {
					$html .= $this->settings['before'] . get_the_title() . $this->settings['after'];
				}

				if ( get_query_var( 'paged' ) ) {
					$html .= ' - ' . $this->args['page'] . ' ' . esc_html( get_query_var( 'paged' ) );
				}

				$html .= $this->settings['wrap_after'];
			}
			/**
			 * Change the breadcrumbs HTML output.
			 *
			 * @param string      $html   HTML output.
			 */
			return apply_filters( 'kadence_breadcrumb_html', $html );
		}
		/**
		 * Get Separator
		 */
		public function get_sep() {
			if ( is_null( $this->sep ) ) {
				$this->sep = ' ' . $this->settings['delimiter_before'] . $this->settings['delimiter'] . $this->settings['delimiter_after'] . ' ';
			}
			return $this->sep;
		}
		/**
		 * Get link string
		 */
		public function get_link() {
			if ( is_null( $this->link ) ) {
				$this->link = $this->settings['link_before'] . '<a href="%1$s" itemprop="url" ' . ( $this->args['color_style'] ? 'style="' . esc_attr( $this->args['color_style'] ) . '"' : '' ) . '>' . $this->settings['link_in_before'] . '%2$s' . $this->settings['link_in_after'] . '</a>' . $this->settings['link_after'];
			}
			return $this->link;
		}
		/**
		 * Get Breadcrumb Term Title
		 *
		 * @param object $term the current term.
		 */
		private function get_breadcrumb_term_title( $term ) {
			$title = '';
			if ( class_exists( 'WPSEO_Taxonomy_Meta' ) ) {
				$title = WPSEO_Taxonomy_Meta::get_term_meta( $term, $term->taxonomy, 'bctitle' );
			} elseif ( class_exists( 'RankMath' ) ) {
				$title = get_metadata( 'term', $term->term_id, 'rank_math_breadcrumb_title', false );
				if ( is_array( $title ) && ! empty( $title ) ) {
					$title = $title[0];
				}
			}
			if ( ! is_string( $title ) || '' === $title ) {
				$title = $term->name;
			}

			return $title;
		}
		/**
		 * Get Home Breadcrumb
		 */
		private function get_crumbs_frontpage() {
			return $this->settings['link_before'] . '<a href="' . esc_url( $this->settings['home_link'] ) . '" itemprop="url" class="kad-bc-home" ' . ( $this->args['color_style'] ? 'style="' . esc_attr( $this->args['color_style'] ) . '"' : '' ) . '>' . $this->settings['link_in_before'] . esc_html( $this->args['home_title'] ) . $this->settings['link_in_after'] . '</a>' . $this->settings['link_after'];
		}

		/**
		 * Get Home Breadcrumb
		 */
		private function get_crumbs_home() {
			return $this->settings['before'] . get_the_title( get_option( 'page_for_posts' ) ) . $this->settings['after'];
		}

		/**
		 * Get 404 Breadcrumb
		 */
		private function get_crumbs_404() {
			return $this->settings['before'] . $this->args['404_title'] . $this->settings['after'];
		}

		/**
		 * Get search Breadcrumb
		 */
		private function get_crumbs_search() {
			return $this->settings['before'] . $this->args['search_title'] . ' "' . get_search_query() . '"' . $this->settings['after'];
		}

		/**
		 * Get attachment Breadcrumb
		 */
		private function get_crumbs_attachment() {
			global $post;
			$parent_id    = $post->post_parent;
			$html         = '';
			$parentcrumbs = array();

			if ( $parent_id ) {
				while ( $parent_id ) {
					$page           = get_page( $parent_id );
					$parentcrumbs[] = sprintf( $this->get_link(), get_permalink( $page->ID ), get_the_title( $page->ID ) ) . $this->get_sep();
					$parent_id      = $page->post_parent;
				}
			}
			$parentcrumbs = array_reverse( $parentcrumbs );
			foreach ( $parentcrumbs as $parentcrumb ) {
				$html .= $parentcrumb;
			}
			$html .= $this->settings['before'] . get_the_title() . $this->settings['after'];
			return $html;
		}

		/**
		 * Get shop page Breadcrumb
		 */
		private function get_crumbs_shop() {
			$shop_page_id = wc_get_page_id( 'shop' );
			$page_title   = get_the_title( $shop_page_id );
			return $this->settings['before'] . $page_title . $this->settings['after'];
		}

		/**
		 * Get shop Breadcrumb
		 */
		private function get_shop_crumb() {
			$shop_page_id = wc_get_page_id( 'shop' );
			$shop_page    = get_post( $shop_page_id );
			$shop_bread   = '';
			if ( get_option( 'page_on_front' ) !== $shop_page_id ) {
				$shop_bread = sprintf( $this->get_link(), get_permalink( $shop_page ), get_the_title( $shop_page_id ) ) . $this->get_sep();
			}
			return $shop_bread;
		}

		/**
		 * Get product category
		 */
		private function get_crumbs_product_category() {
			$html = '';
			if ( $this->args['show_shop'] ) {
				$html .= $this->get_shop_crumb();
			}
			$ancestors = get_ancestors( get_queried_object()->term_id, 'product_cat' );
			$ancestors = array_reverse( $ancestors );
			foreach ( $ancestors as $ancestor ) {
				$ancestor = get_term( $ancestor, 'product_cat' );
				$html    .= sprintf( $this->get_link(), get_term_link( $ancestor->slug, 'product_cat' ), $this->get_breadcrumb_term_title( $ancestor ) ) . $this->get_sep();
			}
			return $html . $this->settings['before'] . $this->get_breadcrumb_term_title( get_queried_object() ) . $this->settings['after'];
		}
		/**
		 * Get product tag
		 */
		private function get_crumbs_product_tag() {
			$html = '';
			if ( $this->args['show_shop'] ) {
				$html .= $this->get_shop_crumb();
			}
			return $html . $this->settings['before'] . $this->get_breadcrumb_term_title( get_queried_object() ) . $this->settings['after'];
		}

		/**
		 * Get archive Breadcrumb
		 *
		 * @param mixed  $archive_page the archive page for breadcrumbs.
		 * @param string $archive_label the archive page label for breadcrumbs.
		 */
		private function get_archive_crumb( $archive_page, $archive_label = '' ) {
			$html = '';
			if ( is_numeric( $archive_page ) ) {
				// Check if page ID.
				$parent_page_link = get_page_link( $archive_page );
				if ( $parent_page_link ) {
					$html .= sprintf( $this->get_link(), $parent_page_link, get_the_title( $archive_page ) ) . $this->get_sep();
				}
			} elseif ( 'shop' === $archive_page ) {
				$html .= $this->get_shop_crumb();
			} elseif ( 'tribe_events' === $archive_page ) {
				// Check for tribe.
				$html .= sprintf( $this->get_link(), tribe_get_events_link(), tribe_get_event_label_plural() ) . $this->get_sep();
			} elseif ( filter_var( $archive_page, FILTER_VALIDATE_URL ) ) {
				// Check if url.
				$parent_title = ( ! empty( $archive_label ) ? $archive_label : 'Archive' );
				$html        .= sprintf( $this->get_link(), $archive_page, $parent_title ) . $this->get_sep();
			}
			return $html;
		}
		/**
		 * Get main tax.
		 *
		 * @param string $taxonomy the taxonomy name.
		 * @param number $post_id the post id.
		 */
		private function get_taxonomy_main( $taxonomy, $post_id ) {
			$main_term = '';
			$terms     = wp_get_post_terms(
				$post_id,
				$taxonomy,
				array(
					'orderby' => 'parent',
					'order'   => 'DESC',
				)
			);
			if ( $terms && ! is_wp_error( $terms ) ) {
				if ( is_array( $terms ) ) {
					$main_term = $terms[0];
				}
			}
			return $main_term;
		}

		/**
		 * Get tax Breadcrumb
		 *
		 * @param string $taxonomy the taxonomy type for breadcrumbs.
		 */
		private function get_taxonomy_crumb( $taxonomy ) {
			global $post;
			$html      = '';
			$main_term = '';
			if ( class_exists( 'WPSEO_Primary_Term' ) ) {
				$wpseo_term = new WPSEO_Primary_Term( $taxonomy, $post->ID );
				$wpseo_term = $wpseo_term->get_primary_term();
				$wpseo_term = get_term( $wpseo_term );
				if ( is_wp_error( $wpseo_term ) ) {
					$main_term = $this->get_taxonomy_main( $taxonomy, $post->ID );
				} else {
					$main_term = $wpseo_term;
				}
			} elseif ( class_exists( 'RankMath' ) ) {
				$wpseo_term = get_post_meta( $post->ID, 'rank_math_primary_category', true );
				if ( $wpseo_term ) {
					$wpseo_term = get_term( $wpseo_term );
					if ( is_wp_error( $wpseo_term ) ) {
						$main_term = $this->get_taxonomy_main( $taxonomy, $post->ID );
					} else {
						$main_term = $wpseo_term;
					}
				} else {
					$main_term = $this->get_taxonomy_main( $taxonomy, $post->ID );
				}
			} else {
				$main_term = $this->get_taxonomy_main( $taxonomy, $post->ID );
			}
			if ( $main_term ) {
				$ancestors = get_ancestors( $main_term->term_id, $taxonomy );
				$ancestors = array_reverse( $ancestors );
				foreach ( $ancestors as $ancestor ) {
					$ancestor = get_term( $ancestor, $taxonomy );
					$html    .= sprintf( $this->get_link(), get_term_link( $ancestor->slug, $taxonomy ), $this->get_breadcrumb_term_title( $ancestor ) ) . $this->get_sep();
				}
				$html .= sprintf( $this->get_link(), get_term_link( $main_term->slug, $taxonomy ), $this->get_breadcrumb_term_title( $main_term ) ) . $this->get_sep();
			}
			return $html;
		}


		/**
		 * Get Custom Breadcrumb
		 *
		 * @param string $custom the custom string for breadcrumbs.
		 */
		private function get_custom_crumb( $custom ) {
			global $post;
			$html      = '';
			if ( 'liferlms' === $custom ) {
				$parent_course = get_post_meta( $post->ID, '_llms_parent_course', true );
				if ( $parent_course ) {
					$html .= sprintf( $this->get_link(), get_permalink( $parent_course ), get_the_title( $parent_course ) ) . $this->get_sep();
				}
			}
			return $html;
		}

		/**
		 * Get category
		 */
		private function get_crumbs_category() {
			$html = '';
			if ( $this->post_types['post']['archive_page'] ) {
				$html .= $this->get_archive_crumb( $this->post_types['post']['archive_page'], $this->post_types['post']['archive_label'] );
			}
			$ancestors = get_ancestors( get_queried_object()->term_id, 'product_cat' );
			$ancestors = array_reverse( $ancestors );
			foreach ( $ancestors as $ancestor ) {
				$ancestor = get_term( $ancestor, 'product_cat' );
				$html    .= sprintf( $this->get_link(), get_term_link( $ancestor->slug, 'product_cat' ), $this->get_breadcrumb_term_title( $ancestor ) ) . $this->get_sep();
			}
			return $html . $this->settings['before'] . $this->get_breadcrumb_term_title( get_queried_object() ) . $this->settings['after'];
		}

		/**
		 * Get tag
		 */
		private function get_crumbs_tag() {
			$html = '';
			if ( $this->post_types['post']['archive_page'] ) {
				$html .= $this->get_archive_crumb( $this->post_types['post']['archive_page'], $this->post_types['post']['archive_label'] );
			}
			return $html . $this->settings['before'] . $this->get_breadcrumb_term_title( get_queried_object() ) . $this->settings['after'];
		}

		/**
		 * Get author
		 */
		private function get_crumbs_author() {
			global $author;
			$html = '';
			if ( $this->post_types['post']['archive_page'] ) {
				$html .= $this->get_archive_crumb( $this->post_types['post']['archive_page'], $this->post_types['post']['archive_label'] );
			}
			$userdata = get_userdata( $author );
			return $html . $this->settings['before'] . $userdata->display_name . $this->settings['after'];
		}
		/**
		 * Get date
		 */
		private function get_crumbs_date() {
			$html = '';
			if ( $this->post_types['post']['archive_page'] ) {
				$html .= $this->get_archive_crumb( $this->post_types['post']['archive_page'], $this->post_types['post']['archive_label'] );
			}
			if ( is_day() ) {
				$html .= sprintf( $this->get_link(), get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $this->get_sep();
				$html .= sprintf( $this->get_link(), get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $this->get_sep();
				$title = get_the_time( 'd' );
			} elseif ( is_month() ) {
				$html .= sprintf( $this->get_link(), get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $this->get_sep();
				$title = get_the_time( 'F' );
			} else {
				$title = get_the_time( 'Y' );
			}
			return $html . $this->settings['before'] . $title . $this->settings['after'];
		}
		/**
		 * Get tax
		 */
		private function get_crumbs_tax() {
			$html = '';
			if ( is_tax( 'portfolio-type' ) || is_tax( 'portfolio-tag' ) ) {
				if ( $this->post_types['portfolio']['archive_page'] ) {
					$html .= $this->get_archive_crumb( $this->post_types['portfolio']['archive_page'], $this->post_types['portfolio']['archive_label'] );
				}
			} elseif ( is_tax( 'staff-group' ) ) {
				if ( $this->post_types['staff']['archive_page'] ) {
					$html .= $this->get_archive_crumb( $this->post_types['staff']['archive_page'], $this->post_types['staff']['archive_label'] );
				}
			} elseif ( is_tax( 'testimonial-group' ) ) {
				if ( $this->post_types['testimonial']['archive_page'] ) {
					$html .= $this->get_archive_crumb( $this->post_types['testimonial']['archive_page'], $this->post_types['testimonial']['archive_label'] );
				}
			} elseif ( is_tax( 'event-category' ) ) {
				if ( $this->post_types['event']['archive_page'] ) {
					$html .= $this->get_archive_crumb( $this->post_types['event']['archive_page'], $this->post_types['event']['archive_label'] );
				}
			} elseif ( is_tax( 'series' ) ) {
				if ( $this->post_types['podcast']['archive_page'] ) {
					$html .= $this->get_archive_crumb( $this->post_types['podcast']['archive_page'], $this->post_types['podcast']['archive_label'] );
				}
			}
			return $html . $this->settings['before'] . $this->get_breadcrumb_term_title( get_queried_object() ) . $this->settings['after'];
		}
		/**
		 * Get page
		 */
		private function get_crumbs_page() {
			global $post;
			$html         = '';
			$parent_id    = $post->post_parent;
			$parentcrumbs = array();
			if ( $parent_id ) {
				while ( $parent_id ) {
					$page           = get_page( $parent_id );
					$parentcrumbs[] = sprintf( $this->get_link(), get_permalink( $page->ID ), get_the_title( $page->ID ) ) . $this->get_sep();
					$parent_id      = $page->post_parent;
				}
			}
			$parentcrumbs = array_reverse( $parentcrumbs );
			foreach ( $parentcrumbs as $parentcrumb ) {
				$html .= $parentcrumb;
			}
			return $html . $this->settings['before'] . get_the_title() . $this->settings['after'];
		}
		/**
		 * Get single
		 */
		private function get_crumbs_single() {
			$html      = '';
			$post_type = get_post_type();
			if ( isset( $this->post_types[ $post_type ] ) ) {
				// Archive Page.
				$html .= $this->get_archive_crumb( $this->post_types[ $post_type ]['archive_page'], $this->post_types[ $post_type ]['archive_label'] );
				// Tax Page.
				$html .= $this->get_taxonomy_crumb( $this->post_types[ $post_type ]['taxonomy'] );
				// Custom Parent.
				if ( isset( $this->post_types[ $post_type ]['custom'] ) ) {
					$html .= $this->get_custom_crumb( $this->post_types[ $post_type ]['custom'] );
				}
			}
			return $html . $this->settings['before'] . get_the_title() . $this->settings['after'];
		}

	}
	Kadence_Breadcrumbs::get_instance();
}
