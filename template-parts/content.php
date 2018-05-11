<?php
/**
 * The default template for displaying content
 *
 * Used for single, index, archive, and search contents.
 *
 * @subpackage ayaspirit
 * @author ayatemplates
 * @since AyaSpirit 1.0.0
 *
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
						<time datetime="<?php the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time>
					</a>
				</span><!-- .clock-icon -->
	
		<?php else : ?>

				<span class="clock-icon">
					<time datetime="<?php the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time>
				</span><!-- .clock-icon -->
			
		<?php endif; ?>

		<?php if ( ! post_password_required() ) : ?>

					<?php if ( has_category() ) : ?>
							<p class="categories-wrapper">
								<?php the_category( ' ' ) ?>
							</p><!-- .categories-wrapper -->						
					<?php endif; ?>
				
					<?php if ( has_tag() ) : ?>
							<p class="tags-wrapper">
									<?php the_tags('', ' ', ''); ?> 
							</p><!-- .tags-wrapper -->						
					<?php endif; ?>

		<?php endif; // ! post_password_required() ?>

	</div><!-- .before-content -->

	<?php if ( is_single() ) : ?>

				<div class="content">
					<?php
						if ( has_post_thumbnail() ) :

							the_post_thumbnail();

						endif;
						
						the_content( esc_html__( 'Read More...', 'ayaspirit') );
					?>
				</div><!-- .content -->

	<?php else : ?>

				<div class="content">
					<?php if ( has_post_thumbnail() ) : ?>
								
								<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
								
					<?php endif;

						  the_content( esc_html__( 'Read More', 'ayaspirit') );
					?>
				</div><!-- .content -->

	<?php endif; ?>

	<div class="after-content">

		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span><!-- .author-icon -->

		<?php edit_post_link( esc_html__( 'Edit', 'ayaspirit' ), '<span class="edit-icon">', '</span>' ); ?>

		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

					<span class="comments-icon">
						<?php comments_popup_link(esc_html__( 'No Comments', 'ayaspirit' ), esc_html__( '1 Comment', 'ayaspirit' ), esc_html__( '% Comments', 'ayaspirit' ), '', esc_html__( 'Comments are closed.', 'ayaspirit' )); ?>
					</span><!-- .comments-icon -->
		
		<?php endif; ?>

	</div><!-- .after-content -->
	
	<?php if ( !is_single() ) : ?>
			<div class="separator">
			</div>
	<?php endif; ?>
</article><!-- #post-## -->
