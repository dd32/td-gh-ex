<?php get_header(); ?>
	<div id="container">
		<div id="content" role="main">
			<div id="post-0" class="no-results">
					<h2 class="front-title"><?php _e( 'Nothing Found', 'star' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'star' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
			</div><!-- #post- 0 -->
			</div><!-- #content -->
			<?php get_sidebar(); ?>
		</div><!-- #container -->
<?php get_footer(); ?>