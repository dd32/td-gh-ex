<?php
/**
 * Template Name: Full-width Page
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

get_header(); ?>
	
	<?php global $Agama; ?>
	
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php if( $Agama->get_meta('_comments') ): ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>