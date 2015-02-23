<?php
/*
 Template Name: Page Sidebar Right
*/
?>

<?php get_header(); ?>
<!-- Content -->
<div class="content">
	<div class="content-container">
		<div class="container">
			<div class="row">
				<div class="eight columns animated fadeInUp">
				
					<div id="primary" class="content-area article">
								<?php while ( have_posts() ) : the_post(); ?>

									<?php get_template_part( 'content', 'page' ); ?>

									<?php
										// If comments are open or we have at least one comment, load up the comment template
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
									?>

								<?php endwhile; // end of the loop. ?>

						
					</div>
				</div>
				<div class="four columns animated fadeInUp">
					<?php get_sidebar(); ?>
				</div>
			</div>
			
			
		</div>
	</div>
</div><!-- /content -->
<?php get_footer(); ?>
