<?php get_header(); ?>

	<article id="post-not-found" class="page 404">
		<header>
			<h2 class="title"><?php _e( '404 - Page Was Not Found', 'arix' ); ?></h2>
		</header>

		<div class="post-content">
			<p><?php _e( 'Unfortunately, the page you were looking for could not be found. Try searching!', 'arix' ); ?></p>
		</div>

		<?php get_search_form(); ?>
	</article>



<?php get_sidebar(); ?>

<?php get_footer(); ?>