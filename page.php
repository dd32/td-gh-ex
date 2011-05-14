<?php get_header(); ?>
		<div id="container">
			<div id="content" role="main">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="front-title"><a href="<?php the_permalink(); ?>" title="<?php printf ( __('Permalink to %s', 'star' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="entry-content">
						<?php
						if ( has_post_thumbnail() ) 
						{
							the_post_thumbnail();// check if the post has a Post Thumbnail assigned to it.
						}
						the_content();	
						wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'star' ), 'after' => '</div>' ) );
						edit_post_link( __( 'Edit', 'star' ), '<span class="edit-link">', '</span>' ); 
						?>
					</div><!-- .entry-content -->
					<?php			
					if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
						<div id="entry-author-info">
							<div id="author-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'star_author_bio_avatar_size', 60 ) ); ?></div><!-- #author-avatar -->
							<div id="author-description">
								<h2><?php printf( esc_attr__( 'About %s', 'star' ), get_the_author() ); ?></h2>
								<?php the_author_meta( 'description' ); ?>
								<div id="author-link"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'star' ), get_the_author() ); ?></a></div><!-- #author-link	-->
							</div><!-- #author-description -->
						</div><!-- #entry-author-info -->
					<?php 
					endif;
					 wp_reset_query();
					?>
				</div><!-- #post-## -->
				<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
			<?php get_sidebar(); ?>
		</div><!-- #container -->
<?php get_footer(); ?>