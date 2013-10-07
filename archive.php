<?php
/**
 * The template for displaying Archive pages.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<?php if( have_posts() ): ?>

				<?php while( have_posts() ): the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-style1'); ?>>

						<header class="entry-header">

							<?php thinkup_input_blogimage1(); ?>

							<?php thinkup_input_blogmeta(); ?>

						</header>

						<?php thinkup_input_blogformat(); ?>

						<div class="entry-content">
							<?php think_input_blogtitle(); ?>
							<?php thinkup_input_blogtext(); ?>
							<?php thinkup_input_readmore(); ?>
						</div>

					<div class="clearboth"></div>
					</article><!-- #post-<?php get_the_ID(); ?> -->	

				<?php endwhile; ?>

				<?php thinkup_input_pagination(); ?>

			<?php else: ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>		

			<?php endif; wp_reset_query(); ?>

<?php get_footer() ?>