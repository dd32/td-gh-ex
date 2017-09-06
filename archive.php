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
			
			<!-- Generating the title -->
			<?php
				if ( is_category() ) {

					$title = __( 'Category', 'akyl' ) . single_cat_title( ' : ', false );

				} elseif ( is_tag() ) {

					$title = __( 'Tag', 'akyl' ) . single_tag_title( ' : ', false );

				} elseif (  is_day() ) {

					$title = __( 'Date', 'akyl' ) . ' : ' . get_the_date();
					
				} elseif ( is_month() ) {

					$title = __( 'Month', 'akyl' ) . ' : ' . get_the_date('F Y');
					
				} elseif ( is_year() ) {

					$title = __( 'Year', 'akyl' ) . ' : ' . get_the_date('Y');
					
				} elseif ( is_author() ) {

					$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
					$title = __( 'Author', 'akyl' ) . ' : ' . $curauth->display_name;
					
				} else {

					$title = __( 'Archive', 'akyl' );

				}
			?>
			
			<!-- Display the title -->
			<h6><?php echo $title; ?></h6>
			
			<!-- Display tagline, description -->
			<?php
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) )
					echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
			?>

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
								
						<?php echo '<span class="alignleft">' . get_next_posts_link( '&larr;  ' . __('Older posts', 'akyl')) . '</span>' ; ?>
									
						<?php echo '<span class="alignright">' . get_previous_posts_link( __('Newer posts', 'akyl') . ' &rarr;') . '</span>'; ?>
						
						<div class="clear"></div>
						
					</div> <!-- /post-nav archive-nav -->
				
				<?php endif; ?>
		</div><!-- end row -->
	</div><!-- end container -->
</div>
<!--==== End Blog Section ====-->

<?php get_footer(); ?>