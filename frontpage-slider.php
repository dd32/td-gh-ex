<?php
/**
 * Front Page Slider
 *
 */
 
	// Get Child Pages
	$query_arguments = array(
		'post_type' => 'page',
		'posts_per_page' => '-1',
		'post_parent' => (int)$post->ID,
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	$zee_slider_query = new WP_Query($query_arguments);
	
	if ($zee_slider_query->have_posts()) :
	
	// Limit the number of words in slideshow page excerpts
	add_filter('excerpt_length', 'airballoon_slideshow_excerpt_length');


	// Display Slider
	?>
	<div id="frontpage-slider-container" class="clearfix">
		
		<div id="frontpage-slider-wrap" class="clearfix">
			
			<div id="frontpage-slider" class="zeeflexslider">
				
				<ul class="zeeslides">
			
			<?php while ($zee_slider_query->have_posts()) : $zee_slider_query->the_post(); ?>
			
				<li id="slide-<?php the_ID(); ?>" class="zeeslide">

					<?php // Display Post Thumbnail or default thumbnail
					if ( has_post_thumbnail() ) : ?>
					
						<div class="slide-image">
							<?php the_post_thumbnail('frontpage_slider_image'); ?>
						</div>

					<?php else: ?>
						
						<div class="slide-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/default-slider-image.png" class="wp-post-image" alt="default-image" />
						</div>
						
					<?php endif;?>
					
					<div class="slide-entry">
						
						<h2 class="slide-title">
							<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>
						
						<div class="slide-excerpt">
							<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><span><?php the_excerpt(); ?></span></a>
						</div>
					
					</div>

				</li>

			<?php endwhile; ?>
			
				</ul>
				
			</div>
			<div class="frontpage-slider-controls"></div>
			
		</div>
		
	</div>
	
<?php
	
	// Remove excerpt filter
	remove_filter('excerpt_length', 'airballoon_slideshow_excerpt_length');
		
	else : ?>
	
	<p class="frontpage-slider-empty-posts">
		<?php _e('There are no child pages to be displayed in the slider. To set up the slider, add a few child pages to the page with the Business Front Page template assigned. The slideshow will then display all child pages with their featured images.', 'airballoon-lite'); ?>
	</p>
	
<?php endif;
	
	// Reset Postdata
	wp_reset_postdata();
	
?>