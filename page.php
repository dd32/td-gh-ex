<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package BBird Under
 */

get_header(); ?>


	
		<main id="primary" class="site-main large-8 columns" role="main">
                   

			<?php while ( have_posts() ) : the_post(); ?>
                      <?php             
                    if ( has_post_thumbnail() ) {
                            the_post_thumbnail('page-featured-image');
                } 
                ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
                    
                    <?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
                    
			<?php endwhile; // end of the loop. ?>
                    


		</main><!-- #main -->
                

	

<?php get_sidebar(); ?>
<?php get_footer(); ?>
