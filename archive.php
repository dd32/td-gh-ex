<?php get_header(); ?>
		<div id="container">
			<div id="content" role="main">
<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

<h1 class="tag-page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'star' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'star' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'star' ), get_the_date('Y') ); ?>
<?php elseif ( is_tag() ) : ?>	
			<?php printf( __( 'Tag Archives: %s', 'star' ), '<span>' . single_tag_title( '', false ) . '</span>' );?>
<?php elseif ( is_category() ) : ?>	
			<?php printf( __( 'Category Archives: %s', 'star' ), '<span>' . single_cat_title( '', false ) . '</span>' );?>
<?php elseif ( is_author() ) : ?>	
			<?php printf( __( 'Author Archives: %s', 'star' ), "<span class='vcard'>" . get_the_author() . "</span>" ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'star' ); ?>
<?php endif; ?>
			</h1>

<?php
	rewind_posts();
?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div class="nav navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'star' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'star' ) ); ?></div>
				</div><!-- #nav -->
		<?php endif; ?>
		
<?php while ( have_posts() ) : the_post(); ?>
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
			</div><!-- #post-## -->
<?php
endwhile; // End the loop. Whew. ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div class="nav navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'star' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'star' ) ); ?></div>
				</div><!-- #nav -->
		<?php endif; ?>
			</div><!-- #content -->
			<?php get_sidebar(); ?>
		</div><!-- #container -->
<?php get_footer(); ?>