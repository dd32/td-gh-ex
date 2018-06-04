<?php
/*
# =============================================
# archive.php
#
# The template for displaying archive pages
# =============================================
*/
?>

<?php get_header(); ?>

<!--==== Start Blog Section ====-->
<div class="section" id="blog-grid">
	<div class="container-fluid">

		<div class="page-title">
			
			<!-- Display the title -->
			<?php the_archive_title('<h6>', '</h6>') ?>

			<!-- Display tagline, description -->
			<?php 
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) )
					the_wp_archive_description( '<div class="tag-archive-meta">', '</div>' ); ?>

		</div> <!-- /page-title -->

		<div class="row blog-masonry">
			<?php 
			if ( have_posts() ) : 

				/* Start the loop. */
				while ( have_posts() ) : the_post(); 

					/* Include the Post-Format-specific template for the content. */
					get_template_part( 'content', get_post_format() );

				endwhile;

			else :

				get_template_part( 'content', 'none' );

			endif;
			?>
		</div><!-- end row --> 
		
		<!-- Posts navigation -->
		<div class="row">
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
					
					<div class="posts-nav">
								
						<?php echo '<span class="alignleft">' . next_posts_link( '&larr;  ' . __('Older posts', 'akyl')) . '</span>' ; ?>
									
						<?php echo '<span class="alignright">' . previous_posts_link( __('Newer posts', 'akyl') . ' &rarr;') . '</span>'; ?>
						
						<div class="clear"></div>
						
					</div> <!-- /post-nav archive-nav -->
				
				<?php endif; ?>
		</div><!-- end row -->
	</div><!-- end container -->
</div>
<!--==== End Blog Section ====-->

<?php get_footer(); ?>