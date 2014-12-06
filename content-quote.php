<?php
/**
 * The template displaying a quote custom post format
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="before-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<?php if ( !is_single() && get_the_title() === '' ) : ?>

		<span class="clock-icon">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(get_option('date_format')); ?></time>
			</a>
		</span>
	
		<?php else : ?>

			<span class="clock-icon">
				<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(get_option('date_format')); ?></time>
			</span>
			
		<?php endif; ?>
	</div>
	
	<?php if ( is_single() ) : ?>

				<div class="content">
					<?php fkidd_the_content_single(); ?>
				</div>

	<?php else : ?>

				<div class="content">

					<?php fkidd_the_content(); ?>

				</div>

	<?php endif; ?>


	<div class="after-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

<span class="comments-icon">
			<?php comments_popup_link(__( 'No Comments', 'fkidd' ), __( '1 Comment', 'fkidd' ), __( '% Comments', 'fkidd' ), '', __( 'Comments are closed.', 'fkidd' )); ?>
		</span>
<?php endif; ?>
		<span class="quote-icon">
			<a href="<?php echo esc_url( get_post_format_link( 'quote' ) ); ?>" title="<?php echo get_post_format_string( 'quote' ); ?>"><?php echo get_post_format_string( 'quote' ); ?></a>
		</span>
		<?php if ( ! post_password_required() ) : ?>

<?php if ( has_category() ) : ?>
					<span class="category-icon">
						<?php the_category( ', ' ) ?>
					</span>
		<?php endif; ?>
		
		<?php if ( has_tag() ) : ?>
					<span class="tags-icon">
						<?php echo get_the_tag_list( '', ', ','' ); ?>
					</span>
		<?php endif; ?>

<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'fkidd'), '<span class="edit-icon">', '</span>' ); ?>
	</div>
	<?php if ( !is_single() ) : ?>
				<div class="separator">
				</div>
	<?php endif; ?>
</article>
