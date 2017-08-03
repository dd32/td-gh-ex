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

<?php endif; // have_posts()

echo ariel_posts_pagination();
