<?php
/**
 * The template for displaying Archive pages.
 *
 * @since Akyuz 1.0
 */

get_header(); ?>

		<section id="primary" class="span-15 colborder">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', AKYUZ_TEXT_DOMAIN ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', AKYUZ_TEXT_DOMAIN ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', AKYUZ_TEXT_DOMAIN ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', AKYUZ_TEXT_DOMAIN ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', AKYUZ_TEXT_DOMAIN ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', AKYUZ_TEXT_DOMAIN ); ?>
						<?php endif; ?>
					</h1>
				</header>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() );?>

				<?php endwhile; ?>

				<?php if (  $wp_query->max_num_pages > 1 ) : ?>
					<div id="nav-below" class="navigation">
						<div class="pagination">
							<?php if (function_exists("pagination")) {pagination();} ?>
						</div>
					</div><!-- #nav-below -->
				<?php endif; ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', AKYUZ_TEXT_DOMAIN ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', AKYUZ_TEXT_DOMAIN ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>