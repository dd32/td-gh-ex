<?php
/**
 * Backdrop Core (functions-entry.php)
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General PUblic License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Entry;

/**
 * Table of Content
 *
 *  1.0 - General (Post Thumbnail)
 *  2.0 - General (Entry Posted On)
 *  3.0 - General (Entry Timestamp)
 *  4.0 - General (Entry Title)
 *  5.0 - General (Entry Taxonomies)
 */
/**
 *  1.0 - General (Post Thumbnail)
 *
 * @param array $feature output features.
 */
function display( $feature = '' ) {
	if ( 'entry-post-thumbnail' === $feature ) {
		if ( has_post_thumbnail() ) {
			if ( is_home() ) {
				the_post_thumbnail( 'backdrop-small-thumbnails' );
			} else {
				$size = 'no-sidebar' === get_theme_mod( 'global_layout', 'no-sidebar' ) ? 'large' : 'medium';
				the_post_thumbnail( "backdrop-{$size}-thumbnails" );
			}
		}
	} elseif ( 'entry-posted-on' === $feature ) {
		$date   = sprintf(
			'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			get_the_date( get_option( 'date_format' ) )
		);
		$author = sprintf(
			'<a href="%1$s" title="%2$s">%3$s</a>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr(
				// Translators: 1 = get the author.
				sprintf( __( 'View all posts by %s', 'auspicious' ), get_the_author() )
			),
			get_the_author()
		);
		printf(
			'<span class="by-author">%1$s %2$s %3$s </span><span class="published">%4$s</span>',
			esc_html__( 'Written by ', 'auspicious' ),
			$author, //phpcs:ignore
			esc_html__( 'on', 'auspicious' ),
			$date //phpcs:ignore
		);
	} elseif ( 'entry-title' === $feature ) {
		if ( is_404() ) { ?>
			<h1 class="entry-title"><?php esc_html_e( 'Whoa! You broke something', 'auspicious' ); ?></h1>
			<?php
		} elseif ( is_search() ) {
			?>
			<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'auspicious' ); ?></h1>
			<?php
		} elseif ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>' );
		} else {
			the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>' );
		}
	} elseif ( 'entry-taxonomies' === $feature ) {
		$cat_list = get_the_category_list( esc_html__( ' | ', 'auspicious' ) );
		$tag_list = get_the_tag_list( '', esc_html__( ' | ', 'auspicious' ) );
		if ( $cat_list ) {
			printf(
				'<div class="cat-link"><i class="fa fa-folder-open-o"></i> %1$s <span class="cat-list"l><b><i>%2$s</i></b></span></div>',
				esc_html__( ' Posted In', 'auspicious' ),
				$cat_list
			); // WPCS XSS OK.
		}
		if ( $tag_list ) {
			printf(
				'<div class="tag-link"><i class="fa fa-tags"></i> %1$s <span class="tag-list"><b><i>%2$s</i></b></span></div>',
				esc_html__( ' Tagged', 'auspicious' ),
				$tag_list
			); // WPCS XSS OK.
		}
	}
}
