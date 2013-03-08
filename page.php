<?php get_header(); ?>
	
		<!--content-->
		<div id="content_container">
			
			<div id="content">
		
				<div id="left-col">
		

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
					<div class="post-entry">

						<?php the_content(); ?>
						<div class="clear"></div>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'agency' ), 'after' => '' ) ); ?>
						
					</div><!--post-entry end-->
					
					<?php if(of_get_option('comment_page') != "off") { ?>
					<?php comments_template( '', true ); ?>
					<?php } ?>

<?php endwhile; ?>
</div> <!--left-col end-->

<?php get_sidebar(); ?>

	</div> 
</div>
<!--content end-->
	
</div>
<!--wrapper end-->
<?php get_footer(); ?>