<?php get_header(); ?>

	<!--content-->
<div id="content">
		
	<div id="left-col">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
				
					<div class="post-head-single">
					
						<h1><?php the_title(); ?></h1>
					
					</div><!--post-heading end-->

			<div class="meta-data">
			
			<?php application_posted_on(); ?> in <?php the_category(', '); ?> | <?php comments_popup_link( __( 'Leave a comment', 'application' ), __( '1 Comment', 'application' ), __( '% Comments', 'application' ) ); ?>
			
			</div><!--meta data end-->

			<div class="post-entry">

						<?php the_content( __( '', 'application' ) ); ?>
						<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'application' ), 'after' => '' ) ); ?>
						
						<?php the_tags('Social tagging: ',' > '); ?>
						
					</div><!--post-entry end-->
	

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

</div> <!--left-col end-->

<?php get_sidebar(); ?>

</div> <!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>