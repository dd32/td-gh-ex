<?php
/**
 * The template displaying a link custom post format
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="before-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<span class="clock-icon">
			<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(get_option('date_format')); ?></time>
		</span>
	</div>
	
	<?php if ( is_single() ) : ?>

				<div class="content">
					<?php tishonator_the_content_single(); ?>
				</div>

	<?php else : ?>
				<div class="content">
					<?php tishonator_the_content(); ?>
				</div>
	<?php endif; ?>
	<div class="after-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<span class="comments-icon">
			<?php comments_popup_link(__( 'No Comments', 'tishonator' ), __( '1 Comment', 'tishonator' ), __( '% Comments', 'tishonator' ), '', __( 'Comments are closed.', 'tishonator' )); ?>
		</span>
		<span class="link-icon">
			<a href="<?php echo esc_url( get_post_format_link( 'link' ) ); ?>" title="<?php echo get_post_format_string( 'link' ); ?>"><?php echo get_post_format_string( 'link' ); ?></a>
		</span>
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
		<?php edit_post_link( __( 'Edit', 'tishonator' ), '<span class="edit-icon">', '</span>' ); ?>
	</div>
	<?php if ( !is_single() ) : ?>
				<div class="separator">
				</div>
	<?php endif; ?>
</article>
