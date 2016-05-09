<?php get_header(); ?>

	<article class="page search">
		<h2 class="title"><?php printf( __( 'Search Results for: %s', 'arix' ), get_search_query() ); ?></h2>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h3 class="search-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
			</header>

			<?php the_excerpt( '<span class="read-more">' . __( 'Continue&nbsp;Reading', 'arix' ) . '</span>' ); ?>
		</article>


		<?php endwhile; ?>

		<?php arix_page_nav(); ?>

		<?php else : ?>

			<article id="post-not-found">
				<header>
					<h4><?php _e( 'Sorry, no results were found.', 'arix' ); ?></h4>
				</header>

				<p><?php _e( 'Try another search query.', 'arix' ); ?></p>

				<?php get_search_form(); ?>
			</article>

		<?php endif; ?>

	</article>



<?php get_sidebar(); ?>

<?php get_footer(); ?>