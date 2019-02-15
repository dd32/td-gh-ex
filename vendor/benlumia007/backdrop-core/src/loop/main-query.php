<?php
/**
 * Backdrop Core (main-query.php)
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General PUblic License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\MainQuery;

/**
 * Table of Content
 *
 *  1.0 - Loop (Content Post Format)
 *  2.0 - Loop (Content Single)
 *  3.0 - Loop (Content Page)
 *  4.0 - Loop (Content Archive)
 *  5.0 - Loop (Content Jetpack Portfolio)
 *  6.0 - Loop (Content Archive Jetpack Portfolio)
 */

/**
 *  1.0 - Loop (Content Post Format)
 *
 * @param string $feature outputs loops.
 */
function display( $feature = '' ) {
	if ( 'content-post-format' === $feature ) {
		if ( have_posts() ) : ?>
		<div class="outer-grid">
			<?php
			while ( have_posts() ) :
				the_post();
					?>
						<div class="inner-grid">
							<?php
							get_template_part( 'views/content/content', get_post_format() );
							?>
						</div>
					<?php
		endwhile; ?>
					</div>
					<?php
				the_posts_pagination();
		else :
				get_template_part( 'views/content/content', 'none' );
		endif;
	} elseif ( 'content-single' === $feature ) {
		while ( have_posts() ) :
			the_post();
				get_template_part( 'views/content/content', 'single' );
		endwhile;
			the_post_navigation(
				array(
					'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__( 'Next', 'auspicious' ) . '</span><span class="post-title">%title</span>',
					'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Previous', 'auspicious' ) . '</span><span class="post-title">%title</span>',
				)
			);
		comments_template();
	} elseif ( 'content-page' === $feature ) {
		while ( have_posts() ) :
			the_post();
				get_template_part( 'views/content/content', 'page' );
		endwhile;
		comments_template();
	} elseif ( 'content-archive' === $feature ) {
		if ( have_posts() ) : ?>
		<header class="archive-header">
			<h1 class="archive-title"><?php the_archive_title(); ?></h1>
		</header>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'views/content/content', get_post_format() );
		endwhile;
			the_posts_pagination();
		else :
			get_template_part( 'views/content/content', 'none' );
		endif;
	} elseif ( 'jetpack-portfolio' === $feature ) {
		while ( have_posts() ) :
			the_post();
			get_template_part( 'views/jetpack-portfolio/content', 'jetpack-portfolio' );
		endwhile;
		the_posts_navigation(
			array(
				'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Older', 'auspicious' ) . '</span><span class="post-title">Projects</span>',
				'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__( 'Newer', 'auspicious' ) . '</span><span class="post-title">Projects</span>',
			)
		);
		comments_template();
	} elseif ( 'jetpack-portfolio-archive' === $feature ) {
		if ( have_posts() ) :
			get_template_part( 'views/jetpack-portfolio/content', 'archive-jetpack-portfolio' );
			the_posts_navigation(
				array(
					'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Older', 'auspicious' ) . '</span><span class="post-title">Projects</span>',
					'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__( 'Newer', 'auspicious' ) . '</span><span class="post-title">Projects</span>',
				)
			);
		else :
			get_template_part( 'views/content/content', 'none' );
		endif;
	}
}
