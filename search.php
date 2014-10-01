<?php
/**
 *Search Results pages Template
 */

get_header(); ?>

	<section id="primary" class="site-content">
    
    		 


		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'jatheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php artikler_theme_content_nav( 'nav-above' ); ?>

				<?php get_all_posts(); ?>


			<?php artikler_theme_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'jatheme' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'jatheme' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>