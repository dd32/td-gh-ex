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

	<div class="article-wrapper <?php agama_article_wrapper_class(); ?> clearfix">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<header class="entry-header">
				
				<?php // Attachments
				if ( ! post_password_required() && ! is_attachment() && get_the_post_thumbnail() ) :
					// Output Post Thumbnail
					if( get_theme_mod('blog_layout') == 'list' ):
						echo '<figure class="effect-bubba" data-src="'.agama_return_image_src('agama-blog-large').'">';
						echo '<img src='.agama_return_image_src('agama-blog-large').' class="img-responsive">';
						echo '<figcaption>';
							 //agama_thumb_title();
						echo '<p>';
						echo '<a href="'.esc_url( get_permalink() ).'"><i class="fa fa-fw fa-link"></i></a>';
						echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.esc_url( get_permalink() ).'" target="_blank"><i class="fa fa-fw fa-share"></i></a>';
						echo '</p>';
						echo '</figcaption>';
						echo '</figure>';
					else: // If blog grid style
						echo '<figure class="effect-bubba" data-src="'.agama_return_image_src('post-thumbnail').'">';
						echo '<img src='.agama_return_image_src('post-thumbnail').' class="img-responsive">';
						echo '<figcaption>';
							 //agama_thumb_title();
						echo '<p>';
						echo '<a href="'.esc_url( get_permalink() ).'"><i class="fa fa-fw fa-link"></i></a>';
						echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.esc_url( get_permalink() ).'" target="_blank"><i class="fa fa-fw fa-share"></i></a>';
						echo '</p>';
						echo '</figcaption>';
						echo '</figure>';
					endif; 
				endif; ?>
				
				
				<?php if( get_theme_mod('blog_layout', 'list') == 'grid' ): ?>
				
					<?php if ( is_single() ) : ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php else : ?>
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h1>
					<?php endif; // is_single() ?>
					
					<?php
					/**
					 * agama_blog_post_meta hook
					 *
					 * @hooked agama_render_blog_post_meta - 10  (output HTML post meta details)
					 */
					echo '<p class="single-line-meta">';
					do_action( 'agama_blog_post_meta' );
					echo '</p>';
					?>
				
				<?php endif; // blog_layout ?>
				
			</header><!-- .entry-header -->
			
			
			<?php if( !is_sticky() && get_theme_mod('blog_layout', 'list') !== 'list' ): // Separator ?>
			<div class="entry-sep"></div>
			<?php endif; ?>
			
			<div class="article-entry-wrapper">
				
				<?php if ( is_sticky() && is_home() && ! is_paged() ) : // Sticky post ?>
				<div class="featured-post">
					<?php _e( 'Featured post', 'agama' ); ?>
				</div>
				<?php endif; ?>

				
				<?php if ( is_search() ) : // Only display Excerpts for Search ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				<?php else : ?>
				
				<?php
				if( get_theme_mod('blog_layout', 'list') !== 'grid' ):
				/**
				 * agama_blog_post_date_and_format hook
				 *
				 * @hooked agama_render_blog_post_date - 10 (output HML post date & format)
				 */
				do_action( 'agama_blog_post_date_and_format' ); 
				endif;
				?>
				
				<div class="entry-content">
				
					<?php if( get_theme_mod('blog_layout', 'list') == 'list' ): // Post title on list style ?>
						<?php if ( is_single() ) : ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php else : ?>
						<h1 class="entry-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h1>
						<?php endif; // is_single() ?>
						
						<?php
						/**
						 * agama_blog_post_meta hook
						 *
						 * @hooked agama_render_blog_post_meta - 10  (output HTML post meta details)
						 */
						echo '<p class="single-line-meta">';
						do_action( 'agama_blog_post_meta' );
						echo '</p>';
						?>
						
					<?php endif; // get_theme_mod() ?>
					
					<?php if( !is_single() ): // If blog loop, show excerpt content ?>
					
						<?php the_excerpt(); ?>
						
					<?php else: // Else if single post, show full content ?>
					
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'agama' ) ); ?>
						
					<?php endif; ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'agama' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
				
				<?php endif; ?>

				<footer class="entry-meta">
					<?php edit_post_link( __( 'Edit', 'agama' ), '<span class="edit-link">', '</span>' ); ?>
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
								<h2><?php printf( __( 'About %s', 'agama' ), get_the_author() ); ?></h2>
								<p><?php the_author_meta( 'description' ); ?></p>
								<div class="author-link">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
										<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'agama' ), get_the_author() ); ?>
									</a>
								</div><!-- .author-link	-->
							</div><!-- .author-description -->
						</div><!-- .author-info -->
					<?php endif; ?>
				</footer><!-- .entry-meta -->
			</div><!-- .article-content-wrapper -->
		</article><!-- #post -->
	</div><!-- .article-wrapper -->