<?php get_header(); ?>

	<!--inside container-->
	<div id="content_container">
		
		<div id="content">
		
			<!-- left-col-->
			<div id="left-col">

			<?php if ( have_posts() ) : ?>
				
				<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>

					<div class="post-head-notfound">
					
						<h1><?php _e( 'Nothing Found', 'agency' ); ?></h1>
					
					</div><!--head end-->
					
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'agency' ); ?></p>
												<div id="search-header"><?php get_search_form(); ?></div><!--search header end-->
					
<?php endif; ?>

</div> <!--left-col end-->

<?php get_sidebar(); ?>

	</div> 
</div> <!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>
