<?php
/**
 * Backdrop Core (custom-query.php)
 *
 * @package        Backdrop Core
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://getbenonit.com)
 * ************************************************************************************************************************
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\CustomQuery;

/**
 * Table of Content
 *
 * 1.0 - Loop (Blog)
 */

/**
 *  1.0 - Loop (Blog)
 *
 * @param string $feature output custom loops.
 */
function display( $feature = '' ) {
	if ( 'custom-blog' === $feature ) {
		$posts_per_page = 2;
		$query          = new \WP_Query(
			array(
				'post_type'           => 'post',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => $posts_per_page,
			)
		);
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>
				<div class="blog-items">
					<?php the_post_thumbnail( 'backdrop-small-thumbnails' ); ?>
					<header class="recent-header">
						<h2 class="recent-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
						<span class="entry-timestamp"><?php echo wp_kses_post( \Benlumia007\Backdrop\Entry\display( 'entry-posted-on' ) ); ?></span>
					</header>
					<div class="entry-excerpt">
						<?php the_excerpt(); ?>
					</div>
				</div>
				<?php
			}
			wp_reset_postdata();
		}
	}
}
