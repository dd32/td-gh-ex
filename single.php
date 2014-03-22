<?php
/**
 * The Template for displaying all single posts.
 *
 * @package URVR
 */

get_header(); ?>
<div class="row">

	<?php if( isset( $urvr['layout'] ) && $urvr['layout'] == 2 ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>

	<div id="primary" class="content-area two-thirds column span9">
		<main id="main" class="site-main" role="main">

		<?php if ( $urvr['breadcrumb'] && function_exists( 'urvr_breadcrumbs' ) ) : ?>			
			<div id="breadcrumb" role="navigation">
				<?php urvr_breadcrumbs(); ?>
			</div>
		<?php endif; ?>
		
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php urvr_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if( isset( $urvr['layout'] ) && $urvr['layout'] == 3 ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>

	<?php if( ! isset( $urvr['layout'] ) ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
	
<?php get_footer(); ?>