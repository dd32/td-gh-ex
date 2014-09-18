<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package BOXY
 */

get_header(); ?>
<div class="row">

	<section id="primary" class="content-area two-thirds column span9">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'boxy' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php boxy_posts_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		<h3><?php //_e( 'Can\'t find what you\'re looking for? Search again!', 'boxy' ); ?></h3>
		<?php //get_search_form(); ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>
	
<?php get_footer(); ?>