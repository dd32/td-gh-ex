<?php
/**
 * The template for displaying all pages
 */
get_header(); ?>

<?php do_action( 'aagaz_startup_page_header' ); ?>
	<main id="main" role="main">	
		<div class="container">
			<?php
				while ( have_posts() ) : the_post();?>
		            <?php the_post_thumbnail(); ?>
					<h1><?php the_title();?></h1>
					<div class="entry-content"><p><?php the_content(); ?></p></div>
					
					<?php
				        // If comments are open or we have at least one comment, load up the comment template.
				        if ( comments_open() || get_comments_number() ) {
				            comments_template();
				        }
				    ?>

				<?php endwhile; // End of the loop.

				wp_reset_postdata(); ?>
		</div>
	</main>
<?php do_action( 'aagaz_startup_page_footer' ); ?>

<?php get_footer();
