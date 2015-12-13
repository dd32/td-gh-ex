<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Avien_Light
 */

get_header(); ?>

	<!--/.container -->
	<div class="container">
	
		<!--/.row -->
		<div class="row">
		
			<!--/.theme-layout-start-->
			<div class="col-md-12 nopadding"> 
			
			<!-- #content -->
			<div id="content" class="site-content col-md-9" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

			<?php endwhile; // End of the loop. ?>

			</div>
			<!--/#content -->
					
			<!-- sidebar right -->	
			<?php get_sidebar(); ?>
			<!-- sidebar right -->
			
		</div><!--/.row -->
		
	</div><!--/.container -->
	
</div><!--/.theme-layout-end-->
<?php get_footer(); ?>
