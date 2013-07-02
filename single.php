<?php get_header(); ?>
	<div id="container">
		<div id="content" role="main">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="star-date">
							<a href="<?php the_permalink(); ?>"><?php the_time('d') ?><br/><?php the_time('m') ?><br/><?php the_time('y') ?><br/></a>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'star' ), __( '1 Comment', 'star' ), __( '% Comments', 'star' ) ); ?></span>
						</div>
						<div class="entry-content">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();// check if the post has a Post Thumbnail assigned to it.
							}
							the_content();	
							wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'star' ), 'after' => '</div>' ) ); ?>
						</div>
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
					<?php edit_post_link( __( 'Edit', 'star' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
				</div>
				<?php comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>