<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aari
 */
function aari_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}

add_filter( 'body_class', 'aari_body_classes' );


/*
 * Fatch related post data
 */

if ( ! function_exists( 'aari_related_posts' ) ) :

	function aari_related_posts( $display = 'category', $qty = 5, $images = true, $title = 'Related Posts' ) {
		global $post;
		$show     = false;
		$post_qty = (int) $qty;
		switch ( $display ) :
			case 'tag':
				$tags = wp_get_post_tags( $post->ID );
				if ( $tags ) {
					$show    = true;
					$tag_ids = array();
					foreach ( $tags as $individual_tag ) {
						$tag_ids[] = $individual_tag->term_id;
					}
					$args = array(
						'tag__in'             => $tag_ids,
						'post__not_in'        => array( $post->ID ),
						'posts_per_page'      => $post_qty,
						'ignore_sticky_posts' => 1,
					);
				}
				break;
			default:
				$categories = get_the_category( $post->ID );
				if ( $categories ) {
					$show         = true;
					$category_ids = array();
					foreach ( $categories as $individual_category ) {
						$category_ids[] = $individual_category->term_id;
					}
					$args = array(
						'category__in'        => $category_ids,
						'post__not_in'        => array( $post->ID ),
						'showposts'           => $post_qty,
						'ignore_sticky_posts' => 1,
					);
				}
		endswitch;
		if ( true === $show ) {
			$related = new wp_query( $args );
			if ( $related->have_posts() ) {
				$layout  = '<section class="related_posts section-padding">';
				$layout .= '<div class="container">';
				$layout .= '<div class="row">';
				$layout .= '<h4 class="col-12 title text-center mb-50"> <span>' . wp_strip_all_tags( $title ) . '</span></h4>';

				while ( $related->have_posts() ) {
					$related->the_post();
					$layout .= ' <div class="col-lg-4">';
					$layout .= '<div class="related_posts_item">';
					if ( true === $images ) {
						$layout .= '<a class="post_card_thumbnail" href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( get_the_title() ) . '">' . get_the_post_thumbnail() . '</a>';
					}
					$layout .= '<div class="post_card_body">';
					$layout .= '<h3 class="post_card_title"><a href="' . esc_url( get_permalink() ) . '">' . esc_attr( get_the_title() ) . '</a></h3>';
					$layout .= ' <div class="post_card_meta">' . aari_related_post_ext() . '</div>';
					$layout .= '</div>';
					$layout .= '</div>';
					$layout .= '</div>';
				}

				$layout .= '</div>';
				$layout .= '</div>';
				$layout .= '</section>';
				echo wp_kses_post( $layout );
			}
			wp_reset_postdata();
		}
	}

endif;






/*
 * *
 * WordPress number pagination
 * * */
if ( ! function_exists( 'aari_number_paging_nav' ) ) :

	function aari_number_paging_nav() {

		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links(
			array(
				'base'      => $pagenum_link,
				'format'    => $format,
				'total'     => $GLOBALS['wp_query']->max_num_pages,
				'current'   => $paged,
				'mid_size'  => 1,
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_next' => true,
				'prev_text' => '<span class="jam jam-arrow-left"></span>',
				'next_text' => '<span class="jam jam-arrow-right"></span>',
			)
		);

		if ( $links ) :

			$layout  = '<div class="ogato-pagination text-center">';
			$layout .= '<nav class="navigation pagination">';
			$layout .= '<div class="nav-links">';
			$layout .= $links;
			$layout .= '</div>';
			$layout .= '</nav>';
			$layout .= '</div>';

			echo wp_kses_post( $layout );

		endif;
	}

endif;



/**
 * breadcrumbs
 */
if ( ! function_exists( 'aari_breadcrumbs' ) ) :

	function aari_breadcrumbs() {
		/* === OPTIONS === */
		$text['home']     = 'Home'; // text for the 'Home' link
		$text['category'] = 'Archive by Category "%s"'; // text for a category page
		$text['search']   = 'Search Results for "%s"'; // text for a search results page
		$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
		$text['author']   = 'Articles Posted by %s'; // text for an author page
		$text['404']      = 'Error 404'; // text for the 404 page
		$show_current     = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
		$show_on_home     = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$show_home_link   = 1; // 1 - show the 'Home' link, 0 - don't show
		$show_title       = 1; // 1 - show the title for the links, 0 - don't show
		$delimiter        = ' &raquo; '; // delimiter between crumbs
		$before           = '<span class="current">'; // tag before the current crumb
		$after            = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */
		global $post;
		$home_link   = home_url( '/' );
		$link_before = '<span typeof="v:Breadcrumb">';
		$link_after  = '</span>';
		$link_attr   = ' rel="v:url" property="v:title"';
		$link        = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
		is_singular() === $post ? get_queried_object() : false;
		if ( $post ) {
			$parent_id = $post->post_parent;
			$parent_id = $post->post_parent;
		} else {
			$parent_id = 0;
			$parent_id = 0;
		}
		$frontpage_id = get_option( 'page_on_front' );
		if ( is_home() || is_front_page() ) {
			if ( 1 === $show_on_home ) {
				echo '<div class="breadcrumbs"><a href="' . esc_url( $home_link ) . '">' . wp_kses_post( $text['home'] ) . '</a></div>';
			}
		} else {
			echo wp_kses_post( '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' );
			if ( 1 === $show_home_link ) {
				echo '<a href="' . esc_url( $home_link ) . '" rel="v:url" property="v:title">' . wp_kses_post( $text['home'] ) . '</a>';
				if ( 0 === $frontpage_id || $parent_id !== $frontpage_id ) {
					echo wp_kses_post( $delimiter );
				}
			}
			if ( is_category() ) {
				$this_cat = get_category( get_query_var( 'cat' ), false );
				if ( 0 !== $this_cat->parent ) {
					$cats = get_category_parents( $this_cat->parent, true, $delimiter );
					if ( 0 === $show_current ) {
						$cats = preg_replace( "#^(.+)$delimiter$#", '$1', $cats );
					}
					$cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
					$cats = str_replace( '</a>', '</a>' . $link_after, $cats );
					if ( 0 === $show_title ) {
						$cats = preg_replace( '/ title="(.*?)"/', '', $cats );
					}
					echo wp_kses_post( $cats );
				}
				if ( 1 === $show_current ) {
					echo wp_kses_post( $before ) . sprintf( wp_kses_post( $text['category'] ), single_cat_title( '', false ) ) . wp_kses_post( $after );
				}
			} elseif ( is_search() ) {
				echo wp_kses_post( $before ) . sprintf( wp_kses_post( $text['search'] ), get_search_query() ) . wp_kses_post( $after );
			} elseif ( is_day() ) {
				echo sprintf( wp_kses_post( $link ), wp_kses_post( get_year_link( get_the_time( 'Y' ) ) ), wp_kses_post( get_the_time( 'Y' ) ) ) . wp_kses_post( $delimiter );
				echo sprintf( wp_kses_post( $link ), wp_kses_post( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ), wp_kses_post( get_the_time( 'F' ) ) ) . wp_kses_post( $delimiter );
				echo wp_kses_post( $before . get_the_time( 'd' ) . $after );
			} elseif ( is_month() ) {
				echo sprintf( wp_kses_post( $link ), wp_kses_post( get_year_link( get_the_time( 'Y' ) ) ), wp_kses_post( get_the_time( 'Y' ) ) ) . wp_kses_post( $delimiter );
				echo wp_kses_post( $before . get_the_time( 'F' ) . $after );
			} elseif ( is_year() ) {
				echo wp_kses_post( $before . get_the_time( 'Y' ) . $after );
			} elseif ( is_single() && ! is_attachment() ) {
				if ( 'post' !== get_post_type() ) {
					$post_type = get_post_type_object( get_post_type() );
					$slug      = $post_type->rewrite;
					printf( wp_kses_post( $link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name ) );
					if ( 1 === $show_current ) {
						echo wp_kses_post( $delimiter . $before . get_the_title() . $after );
					}
				} else {
					$cat  = get_the_category();
					$cat  = $cat[0];
					$cats = get_category_parents( $cat, true, $delimiter );
					if ( 0 === $show_current ) {
						$cats = preg_replace( "#^(.+)$delimiter$#", '$1', $cats );
					}
					$cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
					$cats = str_replace( '</a>', '</a>' . $link_after, $cats );
					if ( 0 === $show_title ) {
						$cats = preg_replace( '/ title="(.*?)"/', '', $cats );
					}
					echo wp_kses_post( $cats );
					if ( 1 === $show_current ) {
						echo wp_kses_post( $before . get_the_title() . $after );
					}
				}
			} elseif ( ! is_single() && ! is_page() && get_post_type() !== 'post' && ! is_404() ) {
				$post_type = get_post_type_object( get_post_type() );
				echo wp_kses_post( $before . $post_type->labels->singular_name . $after );
			} elseif ( is_attachment() ) {
				$parent = get_post( $parent_id );
				$cat    = get_the_category( $parent->ID );
				if ( isset( $cat[0] ) ) {
					$cat = $cat[0];
				}
				if ( $cat ) {
					$cats = get_category_parents( $cat, true, $delimiter );
					$cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
					$cats = str_replace( '</a>', '</a>' . $link_after, $cats );
					if ( 0 === $show_title ) {
						$cats = preg_replace( '/ title="(.*?)"/', '', $cats );
					}
					echo wp_kses_post( $cats );
				}

				printf( wp_kses_post( $link, get_permalink( $parent ), $parent->post_title ) );

				if ( 1 === $show_current ) {
					echo wp_kses_post( $delimiter . $before . get_the_title() . $after );
				}
			} elseif ( is_page() && ! $parent_id ) {
				if ( 1 === $show_current ) {
					echo wp_kses_post( $before . get_the_title() . $after );
				}
			} elseif ( is_page() && $parent_id ) {
				if ( $parent_id !== $frontpage_id ) {
					$breadcrumbs = array();
					while ( $parent_id ) {
						$page = get_page( $parent_id );
						if ( $parent_id !== $frontpage_id ) {
							$breadcrumbs[] = sprintf( $link, get_permalink( $page->ID ), get_the_title( $page->ID ) );
						}
						$parent_id = $page->post_parent;
					}
					$breadcrumbs = array_reverse( $breadcrumbs );
					$countbread  = count( $breadcrumbs );
					for ( $i = 0; $i < $countbread; $i++ ) {
						echo wp_kses_post( $breadcrumbs[ $i ] );
						if ( count( $breadcrumbs ) - 1 !== $i ) {
							echo wp_kses_post( $delimiter );
						}
					}
				}
				if ( 1 === $show_current ) {
					if ( 1 === $show_home_link || ( 0 !== $parent_id_2 && $parent_id_2 !== $frontpage_id ) ) {
						echo wp_kses_post( $delimiter );
					}
					echo wp_kses_post( $before ) . wp_kses_post( get_the_title() ) . wp_kses_post( $after );
				}
			} elseif ( is_tag() ) {
				echo wp_kses_post( $before ) . sprintf( wp_kses_post( $text['tag'] ), single_tag_title( '', false ) ) . wp_kses_post( $after );
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				echo wp_kses_post( $before ) . sprintf( wp_kses_post( $text['author'] ), wp_kses_post( $userdata->display_name ) ) . wp_kses_post( $after );
			} elseif ( is_404() ) {
				echo wp_kses_post( $before ) . wp_kses_post( $text['404'] ) . wp_kses_post( $after );
			} elseif ( has_post_format() && ! is_singular() ) {
				echo wp_kses_post( get_post_format_string( get_post_format() ) );
			}
			if ( get_query_var( 'paged' ) ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
					echo wp_kses_post( ' (' );
				}
				echo esc_html__( 'Page', 'aari' ) . ' ' . wp_kses_post( get_query_var( 'paged' ) );
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
					echo wp_kses_post( ')' );
				}
			}
			echo '</div><!-- .breadcrumbs -->';
		}
	}

	// end dimox_breadcrumbs()
endif;





/*
 * Change archive page title
 */

add_filter(
	'get_the_archive_title',
	function ( $title ) {

		if ( is_category() ) {

			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {

			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {

			$title = '<span class="vcard">' . get_the_author() . '</span>';
		}

		return $title;
	}
);


/*
 * Remove migrate js
 */

function aari_dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$scripts->registered['jquery']->deps = array_diff(
			$scripts->registered['jquery']->deps,
			array( 'jquery-migrate' )
		);
	}
}

add_action( 'wp_default_scripts', 'aari_dequeue_jquery_migrate' );

/*
 * create copyright info
 */

function aari_copyright() {
	$all_posts  = get_posts( 'post_status=publish&order=ASC' );
	$first_post = $all_posts[0];
	$first_date = $first_post->post_date_gmt;
	esc_html_e( 'Copyright &copy;  ', 'aari' );
	if ( substr( $first_date, 0, 4 ) === date( 'Y' ) ) {
		echo wp_kses_post( date( 'Y' ) );
	} else {
		echo wp_kses_post( substr( $first_date, 0, 4 ) ) . '-' . wp_kses_post( date( 'Y' ) );
	}
	echo '<span>' . esc_html( get_bloginfo( 'name' ) ) . '.</span>';
	esc_html_e( ' All rights reserved.', 'aari' );
}

/*
 * Get comment depth
 */
function aari_get_comment_depth( $my_comment_id ) {
	$depth_level = 0;
	while ( $my_comment_id > 0 ) { // if you have ideas how we can do it without a loop, please, share it with us in comments
		$my_comment    = get_comment( $my_comment_id );
		$my_comment_id = $my_comment->comment_parent;
		$depth_level++;
	}
	return $depth_level;
}
