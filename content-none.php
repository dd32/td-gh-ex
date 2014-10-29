<?php
/**
 * "No posts found" Template
 */
?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'artikler' ); ?></h1>
		</header>

		<div class="entry-content">
			<p><?php _e( 'Not found.', 'artikler' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
