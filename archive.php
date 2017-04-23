<?php
/**
 * The template for displaying Archive pages.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<?php if( have_posts() ): ?>

				<div id="container">

				<?php while( have_posts() ): the_post(); ?>

					<div class="blog-grid element column-3">

					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-style1'); ?>>

						<header class="entry-header">
							<?php alante_thinkup_input_blogimage(); ?>
						</header>		

						<div class="entry-content">
							<?php alante_thinkup_input_blogtitle(); ?>

							<?php alante_thinkup_input_blogmeta_1(); ?>

							<?php alante_thinkup_input_blogtext(); ?>
						</div>

						<footer class="entry-footer">

							<?php alante_thinkup_input_blogmeta_2(); ?>

						</footer>

					</article><!-- #post-<?php get_the_ID(); ?> -->

					</div>

				<?php endwhile; ?>

				</div><div class="clearboth"></div>

				<?php the_posts_pagination(); ?>

			<?php else: ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>		

			<?php endif; ?>

<?php get_footer() ?>