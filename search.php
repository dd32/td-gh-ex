<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package BOXY
 */

get_header(); ?>
<div id="content" class="site-content container"> 
	<?php do_action('boxy_two_sidebar_left'); ?>	
	<div id="primary" class="content-area <?php boxy_layout_class();?> columns">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf('%1$s: %2$s',__('Search Results For', 'boxy' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php boxy_posts_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php do_action('boxy_two_sidebar_right'); ?>	

	
	
<?php get_footer(); ?>