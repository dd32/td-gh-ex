<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package a-portfolio
 */

get_header();
?>

<!-- Start blog -->
<section id="blog" class="single section page">
	<div class="container">
		<div class="row">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'archive' );

			endwhile;?>
			
			<?php		
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>
	<div class="row">
		<div class="pagination">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php the_posts_navigation();?>
			</div>
		</div>
	</div>
</div>
</section>

<?php
get_footer();
