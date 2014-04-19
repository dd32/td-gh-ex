<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Generate
 */

get_header(); ?>

	<section id="primary" <?php content_class(); ?>>
		<main id="main" class="site-main" itemtype="http://schema.org/SearchResultsPage" itemscope="itemscope" itemprop="mainContentOfPage" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'generate' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php generate_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'search' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php do_action('generate_sidebars'); ?>
<?php get_footer(); ?>