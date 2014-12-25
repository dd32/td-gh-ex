<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage fmuzz
 */

get_header();
 
fmuzz_show_page_header_section(); ?>

<div id="main-content-wrapper">
	<div id="main-content">
	<?php if ( have_posts() ) : ?>

				<?php
				// Start the Loop.
				while ( have_posts() ) :

					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				// End the loop.
				endwhile;
				?>

				<div class="navigation">
					<?php 	global $wp_query;

							$big = 999999999; // need an unlikely integer
				  
							echo paginate_links( array (
												'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
												'format' => '?paged=%#%',
												'current' => max( 1, get_query_var('paged') ),
												'total' => $wp_query->max_num_pages,
												'prev_next' => false,
											) ); ?>
				</div><!-- .navigation -->
				

	<?php  // If no content, include the "No posts found" template.
		   else :
				get_template_part( 'content', 'none' );
			
		  endif; ?>
	</div><!-- #main-content -->

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>