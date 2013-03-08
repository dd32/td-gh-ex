<?php get_header(); ?>

	<!--content-->
<div id="content_container">
	
	<div id="content">
		
		<div id="left-col">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>	

			<div class="post-entry">

			<div class="meta-data">
			
			<?php agency_posted_on(); ?> <?php _e( 'in', 'agency' ); ?> <?php the_category(', '); ?> | <?php comments_popup_link( __( 'Leave a comment', 'agency' ), __( '1 Comment', 'agency' ), __( '% Comments', 'agency' ) ); ?>
			
			</div><!--meta data end-->
			<div class="clear"></div>

						<?php the_content( __( '', 'agency' ) ); ?>
						<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'agency' ), 'after' => '' ) ); ?>
						
						<?php the_tags('Social tagging: ',' > '); ?>
						
				 <nav id="nav-single"> <span class="nav-previous">
            <?php previous_post_link(__( '%link', '<span class="meta-nav">&larr;</span> Previous Post ') ); ?>
            </span> <span class="nav-next">
            <?php next_post_link(__( '%link', 'Next Post <span class="meta-nav">&rarr;</span>') ); ?>
            </span> </nav>
						
					</div><!--post-entry end-->
	

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

</div> <!--left-col end-->

<?php get_sidebar(); ?>


	</div> 
</div>
<!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>