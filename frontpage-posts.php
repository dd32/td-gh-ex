<?php
/**
 * Front Page Latest Posts
 *
 */
 
	// Get latest three posts
	$query_arguments = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'showposts' => 3,
		'caller_get_posts' => 1,
		'orderby' => 'date'
	);
	$zee_posts_query = new WP_Query($query_arguments);

	if ($zee_posts_query->have_posts()) :
	
	// Limit the number of words in slideshow page excerpts
	add_filter('excerpt_length', 'airballoon_frontpage_posts_excerpt_length');

	// Display latest Posts
	?>
		<div id="frontpage-posts" class="clearfix">
			
			<?php // Get Theme Options from Database
			$theme_options = airballoon_theme_options();
			
			 // Show Front Page Posts Headline
			if ( isset($theme_options['front_page_posts_title']) and $theme_options['front_page_posts_title'] == true ) : ?>

				<h2 id="frontpage-posts-title" class="page-title">
					<?php echo esc_attr($theme_options['front_page_posts_title']); ?>
				</h2>

			<?php endif;

			// Post Loop
			while ($zee_posts_query->have_posts()) : $zee_posts_query->the_post();
		
				get_template_part( 'content', 'frontpage-posts' );
			
			endwhile;
			?>

		</div>
	
<?php
	// Remove excerpt filter
	remove_filter('excerpt_length', 'airballoon_frontpage_posts_excerpt_length');

	endif;
	
	// Reset Postdata
	wp_reset_postdata();
	
?>