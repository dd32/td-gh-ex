<?php
/**
 * Blog feed - List
 *
 * @package ariel
 */
if ( have_posts() ) :
	/**
	 * Display stickies out of list container
	 */
	while ( have_posts() ) : the_post();
		if ( is_sticky() && ! is_paged() ) :
			get_template_part( 'parts/entry' );
		endif;
	endwhile; ?>

	<div class="frontpage-grid">
		<?php
			while ( have_posts() ) : the_post();
				if ( ! is_sticky() ) :
					get_template_part( 'parts/entry', 'list' );
				endif;
			endwhile;
		?>
	</div><!-- frontpage-grid -->

<?php endif; // have_posts()

echo ariel_posts_pagination();