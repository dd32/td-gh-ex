<article class="news-item-content">
	<div <?php post_class(); ?>>                    
		<div class="news-item text-center">
			<div class="news-text-wrap row">
				<?php balanced_blog_thumb_img( 'balanced-blog-archive', 'col-md-6', true ); ?>
				<div class="col-md-6">
					<h2>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<?php
					$categories_list = get_the_category_list( ' ' );
					// Make sure there's more than one category before displaying.
					if ( $categories_list ) {
						echo '<div class="cat-links"><span class="space-right"></span>' . $categories_list . '</div>';
					}
					?>
					<span class="author-meta">
						<span class="author-meta-by"><?php esc_html_e( 'By', 'balanced-blog' ); ?></span>
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
							<?php the_author(); ?>
						</a>
					</span>
					<?php balanced_blog_widget_date_comments(); ?>
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div><!-- .post-excerpt -->
				</div>
			</div><!-- .news-item -->
		</div>
</article>
