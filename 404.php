<?php get_header(); ?>

<!--create your own error 404 page-->
<div id="maincontent">
<article>

	<div id="content" role="main">

			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title"><?php _e( 'Not Found', 'anIMass' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->

		</div><!-- #content -->
<div class="post2">
	</div>			

</article>
<!--include sidebar-->
<?php get_sidebar(); ?>    
<!--include footer-->     
<?php get_footer(); ?>