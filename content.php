<article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_sticky() && is_home() && is_paged()) : ?>
		<?php _e('Featured Post','silverquantum'); ?>
	<?php endif; ?>
		<?php the_post_thumbnail(); ?>
			<?php if ( is_single()) : ?>
				<h1 class = "entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h1 class = "entry-title">
					<a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h1>
			<?php endif; ?>
			<small class = "entry-metadata">
			Posted On <a href = "<?php the_permalink(); ?>"><?php the_date(); ?></a> |
				<?php if ( comments_open()) : ?> 
					<?php comments_popup_link('Add Comment','1 Comment','% Comments'); ?>
				<?php else : ?>
					<?php if (!comments_open() && get_comments_number() )?>
						<?php _e('Comments Closed', 'silverquantum'); ?>
				<?php endif; ?> | 
			<?php edit_post_link(); ?>
			</small>
			<?php if ( is_search()) : ?>
				<div class = "entry-summary">
					<?php the_excerpt(); ?> 
				</div>
			<?php else : ?>
				<div class = "entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'silverquantum' ), 'after' => '</div>' ) ); ?>
				</div>
			<?php endif; ?>
			<small><?php the_tags(); ?></small>
		<footer class = "entry-meta">
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'silverquantum_author_bio_avatar_size', 68 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'silverquantum' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'silverquantum' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer>	
</article>