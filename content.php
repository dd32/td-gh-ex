<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */
?>

	<div class="article-wrapper">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<header class="entry-header">
				<?php if ( ! post_password_required() && ! is_attachment() ) :
					the_post_thumbnail();
				endif; ?>

				<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php else : ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
				<?php endif; // is_single() ?>
				<?php if ( comments_open() ) : ?>
					<div class="comments-link">
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', AGAMA_DOMAIN ) . '</span>', __( '1 Reply', AGAMA_DOMAIN ), __( '% Replies', AGAMA_DOMAIN ) ); ?>
					</div><!-- .comments-link -->
				<?php endif; // comments_open() ?>
			</header><!-- .entry-header -->
			
			<?php if( !is_sticky() ): ?><div class="entry-sep"></div><?php endif; ?>
			
			<div class="article-entry-wrapper">
				<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<div class="featured-post">
					<?php _e( 'Featured post', AGAMA_DOMAIN ); ?>
				</div>
				<?php endif; ?>

				<?php if ( is_search() ) : // Only display Excerpts for Search ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				<?php else : ?>
				<div class="entry-content">
					
					
					<?php if( !is_single() ): // If blog loop, show excerpt content ?>
					
						<?php the_excerpt(); ?>
						
					<?php else: // Else if single post, show full content ?>
					
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', AGAMA_DOMAIN ) ); ?>
						
					<?php endif; ?>
					
					
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', AGAMA_DOMAIN ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
				<?php endif; ?>

				<footer class="entry-meta">
					<?php agama_entry_meta(); ?>
					<?php edit_post_link( __( 'Edit', AGAMA_DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
					<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
						<div class="author-info">
							<div class="author-avatar">
								<?php
								/** This filter is documented in author.php */
								$author_bio_avatar_size = apply_filters( 'agama_author_bio_avatar_size', 68 );
								echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
								?>
							</div><!-- .author-avatar -->
							<div class="author-description">
								<h2><?php printf( __( 'About %s', AGAMA_DOMAIN ), get_the_author() ); ?></h2>
								<p><?php the_author_meta( 'description' ); ?></p>
								<div class="author-link">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
										<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', AGAMA_DOMAIN ), get_the_author() ); ?>
									</a>
								</div><!-- .author-link	-->
							</div><!-- .author-description -->
						</div><!-- .author-info -->
					<?php endif; ?>
				</footer><!-- .entry-meta -->
			</div><!-- .article-content-wrapper -->
		</article><!-- #post -->
	</div><!-- .article-wrapper -->