<?php
/**
 * The Template for displaying all single posts.
 *
 * @subpackage Flat_Thirteen
 * @since WP FlatThirteen 1.3
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php /* The loop */ ?>
			<div class="col-md-7 singlepost">				
				
				<?php while ( have_posts() ) : the_post(); ?>			
					<?php get_template_part( 'content', get_post_format() ); ?>
			<div class="clear"></div>
			</div>
			<div  class="col-md-2 randomposts" >
			<h2><span class="catcolor">You may also Like</span></h2>		
			<?php get_template_part( 'content', 'random' ); ?>
			</div>
			
				<?php get_sidebar(); ?>			
				<?php twentythirteen_post_nav(); ?>				
				<?php comments_template(); ?>

			<?php endwhile; ?>
			
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>