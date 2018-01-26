<?php
/**
 * The default template for displaying content
 *
 * Used for single, index, archive, and search contents.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single() ) : ?>

			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>

	<?php else : ?>
	
			<h1 class="entry-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h1>
	
	<?php endif; ?>

	<div class="before-content">

		<?php if ( !is_single() && get_the_title() === '' ) : ?>

				<span class="clock-icon">
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
						<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(get_option('date_format')); ?></time>
					</a>
				</span><!-- .clock-icon -->
	
		<?php else : ?>

				<span class="clock-icon">
					<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(get_option('date_format')); ?></time>
				</span><!-- .clock-icon -->
			
		<?php endif; ?>

		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span><!-- .author-icon -->

		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

					<span class="comments-icon">
						<?php comments_popup_link(__( 'No Comments', 'artgallery' ), __( '1 Comment', 'artgallery' ), __( '% Comments', 'artgallery' ), '', __( 'Comments are closed.', 'artgallery' )); ?>
					</span><!-- .comments-icon -->
		
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'artgallery' ), '<span class="edit-icon">', '</span>' ); ?>		

	</div><!-- .before-content -->

	<?php if ( is_single() ) : ?>

				<div class="content">
					<?php
						if ( has_post_thumbnail() ) :

							the_post_thumbnail();

						endif;
						
						the_content( __( 'Read More...', 'artgallery') );

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'artgallery' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						  ) );
					?>
				</div><!-- .content -->

	<?php else : ?>

				<div class="content">
					<?php if ( has_post_thumbnail() ) : ?>
								
								<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
								
					<?php endif;

						  the_content( __( 'Read More', 'artgallery') );
					?>
				</div><!-- .content -->

	<?php endif; ?>

	<div class="after-content">

		<?php if ( ! post_password_required() ) : ?>

					<?php if ( has_category() ) : ?>
							<p class="categories-wrapper">
								<span class="category-icon">
								</span><!-- .category-icon -->
								<?php the_category( _x( ', ', 'Used between list items, there is a space after the comma.', 'artgallery' ) ) ?>
							</p><!-- .categories-wrapper -->						
					<?php endif; ?>
				
					<?php if ( has_tag() ) : ?>
							<p class="tags-wrapper">
								<span class="tags-icon">
								</span><!-- .tags-icon -->
								<?php the_tags('', _x( ', ', 'Used between list items, there is a space after the comma.', 'artgallery' ), ''); ?> 
							</p><!-- .tags-wrapper -->						
					<?php endif; ?>

		<?php endif; // ! post_password_required() ?>

	</div><!-- .after-content -->
	
	<?php if ( !is_single() ) : ?>
			<div class="separator">
			</div>
	<?php endif; ?>
</article><!-- #post-## -->
