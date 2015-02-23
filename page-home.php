<?php
/*
 Template Name: Homepage
*/
?>
<?php get_header(); ?>

<?php get_template_part( 'home-slider' ); ?>

<div class="content-container">
	<div class="container">
		<div class="row">
			<div class="eight columns animated fadeInUp">
			
				<div id="primary" class="content-area article">
					<main id="main" class="site-main" role="main">
						<?php 
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array( 'post_type' => 'post', 'posts_per_page' => 5, 'paged' => $paged );
							$wp_query = new WP_Query($args); 
						?>
						<?php if ( have_posts() ) : ?>
							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php
									get_template_part( 'content');
								?>
							<?php endwhile; ?>
							
							<div class="container">
								<?php the_posts_navigation(); ?>
							</div>

							<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
							
						<?php endif; ?>
					</main><!-- #main -->
					
				</div>
			</div>
			<div class="four columns animated fadeInUp">
				<?php get_sidebar(); ?>
			</div>
		</div>
		
		
	</div>
</div>
<?php get_footer(); ?>
