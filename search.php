<?php
/**
 * The template for displaying search results pages.
 *
 * @package Star
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() && strlen( trim( get_search_query() ) ) != 0 ) :
			?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					printf(
						/* Translators: %s: search term.  */
						__( 'Search Results for: %s', 'star' ),
						'<span>' . get_search_query() . '</span>'
					);
					?>
				</h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_post_navigation(); ?>

			<?php
			/* If the search is not visible in the menu, and there is only one page of search results, display a search form on the search page. */
			if ( $GLOBALS['wp_query']->max_num_pages < 2 && ! get_theme_mod( 'star_hide_search' ) ) {
				echo '<span class="screen-reader-text">' . esc_html__( 'Would you like to search again?', 'star' ) . '</span><br/>';
				get_search_form();
			}
			?>
			<br>
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
