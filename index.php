<?php get_header(); ?>

         <div id="primary" class="clearfix">

			<div id="content" role="main" class="clearfix">



			<?php if ( have_posts() ) : ?>
            


				<?php /* Start the Loop */ ?>

				<?php while ( have_posts() ) : the_post(); ?>



					<?php get_template_part( 'content', get_post_format() ); ?>



				<?php endwhile; ?>



				<?php azurebasic_content_nav( 'nav-below' ); ?>



			<?php else : ?>



				<article id="post-0" class="post no-results not-found clearfix">

					<header class="entry-header">

						<h1 class="entry-title"><?php _e( 'Nothing Found', 'azurebasic' ); ?></h1>

					</header><!-- .entry-header -->



					<div class="entry-content clearfix">

						<p><?php _e( 'Sorry, but no results were found. Maybe searching will help find a related post.', 'azurebasic' ); ?></p>

						<?php get_search_form(); ?>

					</div><!-- .entry-content -->

				</article><!-- #post-0 -->



			<?php endif; ?>



			</div><!-- #content -->

		</div><!-- #primary -->



<?php get_sidebar(); ?>

<div class="clear"></div><!-- .clear the floats -->

<?php get_footer(); ?>