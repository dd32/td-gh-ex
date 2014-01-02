<?php
/**
 * Template Name: Three column - Sidebar/Content/Sidebar
 *
 * Page template for
 *
 * @package Aadya
 * @since Aadya 0.1
 */

get_header(); ?>
<?php 
	$col =  aadya_get_content_cols(); 
	$col = 6; //we have to override this to achieve the 2 column effect
?>	
<?php get_sidebar('left'); ?>  
<div class="col-sm-6 col-md-<?php echo $col;?>" role="content">
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div> <!-- .col-md-<?php echo $col;?> .content -->	
<?php get_sidebar(); ?>
<?php get_footer(); ?>

