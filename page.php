<?php get_header(); ?>
	<div id="container">
		<div id="content" role="main">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="page-content">
						<?php
						if ( has_post_thumbnail() ) 
						{
							the_post_thumbnail();// check if the post has a Post Thumbnail assigned to it.
						}
						
						the_content();	
						wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'star' ), 'after' => '</div>' ) );
						edit_post_link( __( 'Edit', 'star' ), '<div class="edit-link">', '</div>' ); 
						?>
					</div>
				</div>
				<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>