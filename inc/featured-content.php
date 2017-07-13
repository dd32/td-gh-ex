<?php
/**
 * The template used for displaying the featured content.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>

<?php if ( get_option( 'arba_featured_content_enable' ) != '' ): ?>
	<?php
	// Only on homepage.
	if( is_home() && !is_paged() ):
	?>
		<div id="featured-content" class="featured-content">
			<div class="featured-content__posts clearfix">
				<?php
				// Start the query.
				$featured_content_tag_name = get_option( 'arba_featured_content_tag_name' );
				$featured_posts = new WP_Query( array(
					'tag'=> $featured_content_tag_name,
					'ignore_sticky_posts'=> 1,
					'showposts' => 2
				) );
				?>
					<?php
					// If have featured posts.
					if ( $featured_posts->have_posts() ):
					?>
						<?php
						// Start the loop.
						while( $featured_posts->have_posts() ): $featured_posts->the_post();
						?>
							<?php
							// Get the content featured.
							get_template_part( 'template-parts/content-featured' );
							?>
						<?php
						// End the loop.
						endwhile;
						?>
					<?php
					// End if.
					endif;
					?>
				<?php
				// Restore original Post Data.
				wp_reset_postdata();
				?>
			</div><!-- .featured-content__posts -->
		</div><!-- #featured-content -->
	<?php
	// End if.
	endif;
	?>
<?php endif; ?>