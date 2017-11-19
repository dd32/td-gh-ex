<?php
/**
 * Blog feed - Grid
 *
 * @package ariel
 */
if ( have_posts() ) :
	/**
	 * Display stickies out of grid container
	 */
	while ( have_posts() ) : the_post();
		if ( is_sticky() && ! is_paged() ) :
			get_template_part( 'parts/entry' );
		endif;
	endwhile; ?>

	<div class="frontpage-grid">
		<div class="row">
			<?php
				while ( have_posts() ) : the_post();
					if ( ! is_sticky() ) :
						get_template_part( 'parts/entry', 'grid' );
					endif;
				endwhile;
			?>
		</div><!-- row -->
	</div><!-- frontpage-grid -->

<?php echo ariel_posts_pagination(); ?>

<?php else: ?>

    <div class="blog-feed-empty"><p><?php esc_html_e('No posts found.', 'ariel'); ?></p></div>
    
<?php endif; // have_posts()

