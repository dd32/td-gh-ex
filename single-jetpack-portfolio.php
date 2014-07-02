<?php
/**
 * The Template for displaying all single portfolio items.
 *
 * @package Aperture
 */

get_header(); ?>

<?php $pagesize = get_theme_mod( 'aperture_portfolio_pagesize' ); ?>

<?php if ( $pagesize == 'fullwidth' ) { ?>
	<div id="primary" class="content-area-fullwidth single-portfolio">
		<main id="main" class="site-main" role="main">
<?php } elseif ( is_active_sidebar( 'right-sidebar' ) ) { ?>
	<div id="primary" class="content-area single-portfolio">
		<main id="main" class="site-main" role="main">
<?php } else { ?>
	<div id="primary" class="content-area-no-sidebar single-portfolio">
		<main id="main" class="site-main" role="main">
<?php } ?>

		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single-portfolio' ); ?>

				<?php get_template_part( 'after', 'post' ); ?>
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

			<?php aperture_post_nav(); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( $pagesize != 'fullwidth' ) { 
	get_sidebar( 'right' ); } ?>
<?php get_footer(); ?>
