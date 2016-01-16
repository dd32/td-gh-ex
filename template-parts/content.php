<?php
/**
 * The default template for displaying content
 *
 * Used for single, index, archive, and search contents.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( !is_single() ) :
	
			echo '<h1 class="post-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . esc_attr( get_the_title() ) .'">' . get_the_title() . '</a></h1>';
	
		  else:

		  	echo '<h1 class="post-entry-title">' . get_the_title() . '</h1>';
	

		  endif; ?>

	<div class="post-before-content">
		<div class="post-before-content">
			<?php fgymm_show_post_date(); ?>
		</div>
	</div>

	<?php if ( is_single() ) : ?>

				<div class="post-content">
					<?php fgymm_the_content_single(); ?> 
				</div>

	<?php else : ?>

				<div class="post-content">

					<?php fgymm_the_content(); ?>

				</div>

	<?php endif; ?>


	<div class="post-after-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

					<span class="comments-icon">
						<?php comments_popup_link(__( 'No Comments', 'fgymm' ), __( '1 Comment', 'fgymm' ), __( '% Comments', 'fgymm' ), '', __( 'Comments are closed.', 'fgymm' )); ?>
					</span>
		<?php endif; ?>
		<?php if ( ! post_password_required() ) : ?>

				<?php if ( has_category() ) : ?>
					<span class="category-icon"><?php the_category( '</span><span class="category-icon">' ) ?></span>
				<?php endif; ?>
		
				<?php if ( has_tag() ) : ?>
							<?php echo get_the_tag_list( '<span class="tags-icon">', '</span><span class="tags-icon">', '</span>' ); ?>
				<?php endif; ?>

		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'fgymm' ), '<span class="edit-icon">', '</span>' ); ?>
	</div>
	
	<?php if ( !is_single() ) : ?>
				<div class="separator">
				</div>
	<?php endif; ?>
</article>
