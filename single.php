<?php get_header(); ?>
		<div id="container">
			<div id="content" role="main">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="star-date">
							<a href="<?php the_permalink(); ?>"><?php the_time('d') ?><br/><?php the_time('m') ?><br/><?php the_time('y') ?><br/></a>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'star' ), __( '1 Comment', 'star' ), __( '% Comments', 'star' ) ); ?></span>
						</div>
						<h2 class="front-title"><a href="<?php the_permalink(); ?>" title="<?php printf ( __('Permalink to %s', 'star' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="entry-meta">
						<?php if ( count( get_the_category() ) ) : ?>
								<span class="cat-links entry-utility-prep entry-utility-prep-cat-links">
									<?php echo __('Posted by ', 'star');
									the_author_posts_link();
									?>
									<span class="meta-sep">|</span>
									<?php echo get_the_category_list(', '); ?>
								</span>
								<span class="meta-sep">|</span>
						<?php endif;
						$tags_list = get_the_tag_list( '', ', ' );
						if ( $tags_list ):
							?>
							<span class="tag-links">
								<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'star' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
							</span>
							<span class="meta-sep">|</span>
					<?php endif; ?>
					<?php edit_post_link( __( 'Edit', 'star' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->
				<div class="entry-content">
				<?php
				if ( has_post_thumbnail() ) 
				{
				the_post_thumbnail();// check if the post has a Post Thumbnail assigned to it.
				}
				the_content();	
				wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'star' ), 'after' => '</div>' ) ); ?>
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

					$tags = wp_get_post_tags($post->ID);
					if ($tags) {
						$tag_ids = array();
						foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
							$args=array(
							'tag__in' => $tag_ids,
							'post__not_in' => array($post->ID),
							'showposts'=>4, // Number of related posts that will be shown.
							'ignore_sticky_posts'=>1
							);
						$my_query = new wp_query($args);
						if( $my_query->have_posts() ) { ?>
							<div id="related-posts">
								<div id="related-posts-social">
									<h2><?php echo __('Related Posts: ','star');?></h2>
								</div>
								<?php 
								while ($my_query->have_posts()) {
									$my_query->the_post();
									?>
									<div class="related-posts-content">
										<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
											the_post_thumbnail(array(60,60));
										}else 
											echo '<br/> <br/>';
									
										?>
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><br/>
								</div>
							<?php 
									} 		
							echo '</div>';
							}
					}
					 wp_reset_query();
					?>
				</div><!-- #post-## -->
				<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
			<?php get_sidebar(); ?>
		</div><!-- #container -->
<?php get_footer(); ?>