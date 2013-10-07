<?php
/**
 * Template Name: Blog Style2
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>
			<?php if( have_posts() ): ?>

				<div id="container" class="portfolio-wrapper isotope">

				<?php while( have_posts() ): the_post(); ?>

					<div class="blog-grid element column-2 isotope-item">

					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-style2'); ?>>

						<?php think_input_blogtitle(); ?>

						<header class="entry-header">

							<?php thinkup_input_blogimage2(); ?>
							<?php thinkup_input_blogformat(); ?>

						</header>

						<div class="entry-content">

							<?php thinkup_input_blogtext(); ?>
							<?php thinkup_input_readmore(); ?>

						</div>

						<?php thinkup_input_blogmeta(); ?>

					</article><!-- #post-<?php get_the_ID(); ?> -->	

					</div><div class="clearboth"></div>

				<?php endwhile; ?>

				</div>

				<?php thinkup_input_pagination(); ?>

			<?php else: ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>		

			<?php endif; wp_reset_query(); ?>

<?php get_footer() ?>