<?php

/**
 * Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 * Adopted from Dimox
 *
 * @since Audioman
 */
class Adonis_Json_Ld_Schema {
	private $position = 0;
	private $breadcrumb_list = array();
	private $breadcrumb      = array(
		'@context' => 'http://schema.org',
		'@type'    => 'BreadcrumbList',
	);

	function __construct() {
		add_action( 'wp_head', array( $this, 'json_ld_breadcrumbs' ) );
	}

	function adonis_custom_breadcrumbs_json_ld( $show_on_home ) {
		/* === OPTIONS === */
		$text['home']     = __( 'Home', 'adonis' ); // text for the 'Home' link
		$text['category'] = __( '%1$s Archive for %2$s', 'adonis' ); // text for a category page
		$text['search']   = __( '%1$sSearch results for: %2$s', 'adonis' ); // text for a search results page
		$text['tag']      = __( '%1$sPosts tagged %2$s', 'adonis' ); // text for a tag page
		$text['author']   = __( '%1$sView all posts by %2$s', 'adonis' ); // text for an author page
		$text['404']      = __( 'Error 404', 'adonis' ); // text for the 404 page

		$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before       = '<span class="breadcrumb-current">'; // tag before the current crumb
		$after        = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post, $paged, $page;
		$home_link  = home_url( '/' );

		if ( is_front_page() ) {
			if ( $show_on_home ) {
				$this->breadcrumb_list[] = $this->add_crumbs( $text['home'], esc_url( $home_link ) );
			}
		} else {
			$this->breadcrumb_list[] = $this->add_crumbs( $text['home'], esc_url( $home_link ) );
			if ( is_home() ) {
				if ( 1 == $show_current ) {
					$this->breadcrumb_list[] = $this->add_crumbs( get_the_title( get_option( 'page_for_posts', true ) ), esc_url( $home_link ) );
				}
			} elseif ( is_category() ) {
				$this_cat = get_category( get_query_var( 'cat' ), false );
				if ( 0 != $this_cat->parent ) {
					$cats = get_category_parents( $this_cat->parent, true, false );
					$pos  = strpos( $cats, '<a' );
					preg_match( '/<a[^>]*>(.*?)<\/a>/i', $cats, $matches );
					while ( false !== $pos ) {
						$href = substr( $cats, 0, $pos ) . substr( $cats, strpos( $cats, 'href="', $pos ) + 6 );
						$href = substr( $href, 0, strpos( $href, '"', $pos ) ) . substr( $href, strpos( $href, '</a>', $pos ) + 4 );
						$pos  = strpos( $href, '<a' );
					}
					$this->breadcrumb_list[] = $this->add_crumbs( $matches[1], $href );
				}
				$this->breadcrumb_list[] = $this->add_crumbs( sprintf( $text['category'], '<span class="archive-text">', '&nbsp</span>' . single_cat_title( '', false ) ) );

			} elseif ( is_search() ) {
				$this->breadcrumb_list[] = $this->add_crumbs( sprintf( $text['search'], '<span class="search-text">', '&nbsp</span>' . get_search_query() ) );

			} elseif ( is_day() ) {

				$this->breadcrumb_list[] = $this->add_crumbs( get_the_time( 'Y' ), get_year_link( get_the_time( 'Y' ) ) );
				$this->breadcrumb_list[] = $this->add_crumbs( get_the_time( 'F' ), get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) );
				$this->breadcrumb_list[] = $this->add_crumbs( get_the_time( 'd' ) );

			} elseif ( is_month() ) {
				$this->breadcrumb_list[] = $this->add_crumbs( get_the_time( 'Y' ), get_year_link( get_the_time( 'Y' ) ) );
				$this->breadcrumb_list[] = $this->add_crumbs( get_the_time( 'F' ) );

			} elseif ( is_year() ) {
				$this->breadcrumb_list[] = $this->add_crumbs( get_the_time( 'Y' ) );

			} elseif ( is_single() && ! is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object( get_post_type() );
					$post_link = get_post_type_archive_link( $post_type->name );

					$this->breadcrumb_list[] = $this->add_crumbs( $post_type->labels->singular_name, $post_link );
					if ( 1 == $show_current ) {
						$this->breadcrumb_list[] = $this->add_crumbs( get_the_title() );
					}
				} else {
					$cat  = get_the_category();
					$cat  = $cat[0];
					$cats = get_category_parents( $cat, true, '' );
					if ( 0 == $show_current ) {
							$cats = preg_replace( '#^(.+)$#', '$1', $cats );
					}
					$pos = strpos( $cats, '<a' );
					preg_match( '/<a[^>]*>(.*?)<\/a>/i', $cats, $matches );
					while ( false !== $pos ) {
						$href = substr( $cats, 0, $pos ) . substr( $cats, strpos( $cats, 'href="', $pos ) + 6 );
						$href = substr( $href, 0, strpos( $href, '"', $pos ) ) . substr( $href, strpos( $href, '</a>', $pos ) + 4 );
						$pos  = strpos( $href, '<a' );
					}
					$this->breadcrumb_list[] = $this->add_crumbs( $matches[1], $href );
					if ( 1 == $show_current ) {
						$this->breadcrumb_list[] = $this->add_crumbs( get_the_title() );
					}
				}
			} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {
				$post_type = get_post_type_object( get_post_type() );
				isset( $post_type->labels->singular_name ) ? $this->breadcrumb_list[] = $this->add_crumbs( $post_type->labels->singular_name )
				: '';
			} elseif ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				$cat    = get_the_category( $parent->ID );

				if ( isset( $cat[0] ) ) {
					$cat = $cat[0];
				}

				if ( $cat ) {
					$cats = get_category_parents( $cat, true );
					$pos  = strpos( $cats, '<a' );
					preg_match( '/<a[^>]*>(.*?)<\/a>/i', $cats, $matches );
					while ( false !== $pos ) {
						$href = substr( $cats, 0, $pos ) . substr( $cats, strpos( $cats, 'href="', $pos ) + 6 );
						$href = substr( $href, 0, strpos( $href, '"', $pos ) ) . substr( $href, strpos( $href, '</a>', $pos ) + 4 );
						$pos  = strpos( $href, '<a' );
					}
					$this->breadcrumb_list[] = $this->add_crumbs( $matches[1], $href );
				}
				$this->breadcrumb_list[] = $this->add_crumbs( $parent->post_title, get_permalink( $parent ) );
				if ( 1 == $show_current ) {
					$this->breadcrumb_list[] = $this->add_crumbs( get_the_title() );
				}
			} elseif ( is_page() && ! $post->post_parent ) {
				if ( 1 == $show_current ) {
					$this->breadcrumb_list[] = $this->add_crumbs( get_the_title() );
				}
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id   = $post->post_parent;
				$breadcrumbs = array();
				while ( $parent_id ) {
						$page_child         = get_post( $parent_id );
						$breadcrumbs_link[] = get_permalink( $page_child->ID );
						$breadcrumbs_name[] = get_the_title( $page_child->ID );
						$parent_id          = $page_child->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					$this->breadcrumb_list[] = $this->add_crumbs( $breadcrumbs_name[ $i ], $breadcrumbs_link[ $i ] );
				}
				if ( 1 == $show_current ) {
					$this->breadcrumb_list[] = $this->add_crumbs( get_the_title() );
				}
			} elseif ( is_tag() ) {
				$this->breadcrumb_list[] = $this->add_crumbs( sprintf( $text['tag'], '<span class="tag-text">', '&nbsp</span>' . single_tag_title( '', false ) ) );

			} elseif ( is_author() ) {
				global $author;
				$userdata          = get_userdata( $author );
				$this->breadcrumb_list[] = $this->add_crumbs( sprintf( $text['author'], '<span class="author-text">', '&nbsp</span>' . $userdata->display_name ) );

			} elseif ( is_404() ) {
				$this->breadcrumb_list[] = $this->add_crumbs( $text['404'] );

			}
			if ( get_query_var( 'paged' ) ) {
				$this->breadcrumb_list[] = $this->add_crumbs( sprintf( __( 'Page %s', 'adonis' ), max( $paged, $page ) ) );
			}
		}
		$this->breadcrumb['itemListElement'] = $this->breadcrumb_list;
		return $this->breadcrumb;

	} // end adonis_breadcrumb_lists

	function add_crumbs( $name, $url = '' ) {
		$this->position = $this->position + 1;
		if ( '' !== $url ) {
			$item['@id'] = $url;
		}
		$item['name'] = $name;
		$data         = array(
			'@type'    => 'ListItem',
			'position' => $this->position,
			'item'     => $item,
		);
		return $data;
	}

	function json_ld_breadcrumbs() {

		if ( get_theme_mod( 'adonis_breadcrumb_option', 1 ) ) {
			$show_on_home = get_theme_mod( 'adonis_breadcrumb_on_homepage' ) ? '1' : '0';

			$breadcrumb = $this->adonis_custom_breadcrumbs_json_ld( $show_on_home );
			echo '<script type="application/ld+json">';
			echo json_encode( $breadcrumb );
			echo '</script>';
		}
	}

}

new Adonis_Json_Ld_Schema();
