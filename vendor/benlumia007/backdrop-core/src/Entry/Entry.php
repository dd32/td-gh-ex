<?php //phpcs:ignore
/**
 * Backdrop Core ( framework.php )
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Entry;

use Benlumia007\Backdrop\Contracts\Displayable;

/**
 * Site extends SiteContract
 */
class Entry implements Displayable {
	/**
	 * Display display( $args = '' );
	 *
	 * @since 1.0.0
	 * @access public
	 * @param string $args output site information.
	 */
	public static function display( $args = '' ) {
		if ( 'posted-on' === $args ) {
			$date = sprintf( '<span class="entry-date">%1$s</span>', get_the_date( get_option( 'date_format' ) ) );

			$author = sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() );

			printf(
				'<i class="fas fa-user"></i><span class="by-author">%1$s</span><i class="fas fa-calendar-alt"></i><span class="published">%2$s</span>',
				$author, //phpcs:ignore
				$date //phpcs:ignore
			);
			
			if ( ! is_page() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<i class="fas fa-comment"></i><span class="entry-comments">';
					comments_popup_link( sprintf( esc_html__( 'No Comments', 'backdrop-core' ) ) );
				echo '</span>';
			}
		} elseif ( 'entry-title' === $args ) {
			if ( is_404() ) {
				printf( '<h1 class="entry-title">%s</h1>', esc_html__( 'Whoa! You broke something!', 'backdrop-core' ) );
			} elseif ( is_single() || is_page() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} elseif ( is_front_page() && is_home() ) {
				the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>' );
			} elseif ( is_post_type_archive() ) {
				printf( '<h1 class="entry-title">%s</h1>', post_type_archive_title( '', false ) );
			} else {
				the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>' );
			}
		} elseif ( 'taxonomies' === $args ) {
			$cat_list = get_the_category_list( esc_html__( ' | ', 'backdrop-core' ) );
			$tag_list = get_the_tag_list( '', esc_html__( ' | ', 'backdrop-core' ) );
			if ( $cat_list ) {
				printf(
					'<div class="cat-link"><i class="fas fa-folder-open"></i> %1$s <span class="cat-list"l><b><i>%2$s</i></b></span></div>',
					esc_html__( ' Posted In', 'backdrop-core' ),
					$cat_list // phpcs:ignore
				);
			}
			
			if ( $tag_list ) {
				printf(
					'<div class="tag-link"><i class="fas fa-tags"></i> %1$s <span class="tag-list"><b><i>%2$s</i></b></span></div>',
					esc_html__( ' Tagged', 'backdrop-core' ),
					$tag_list // phpcs:ignore
				);
			}
		}
	}
}
