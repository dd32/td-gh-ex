<?php
/**
 * The Template for displaying all single posts.
 *
 * @since Akyuz 1.0
 */

get_header(); ?>

		<div id="primary" class="span-15 colborder">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', AKYUZ_TEXT_DOMAIN ); ?></h3>
						<span class="nav-previous span-7">
							<?php previous_post_link( ); ?>
						</span>
						<span class="nav-next span-7 last">
							<?php next_post_link( ); ?>
						</span>
					</nav><!-- #nav-single -->
					<hr class="divider span-15 last"/>
					
					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>