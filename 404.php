<?php get_header(); ?>
	<div id="container">
		<div id="content" role="main">
			<div id="post-0" class="post">
				<h2 class="post-title"><?php _e( 'Nothing Found', 'star' ); ?></h2>
				<div class="404">
					<?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'star' ); ?>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>