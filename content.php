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
			
				echo '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a></h1>';
	
			endif;
	?>

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
					<?php fmuzz_the_content_single(); ?> 
				</div>

	<?php else : ?>

				<div class="content">

					<?php fmuzz_the_content(); ?>

				</div>

	<?php endif; ?>
<?php if ( !is_single() && get_the_title() === '' ) :
			
				echo '<strong><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="'.__( 'Read More', 'fmuzz' ).'">'.__( 'Read More', 'fmuzz' ).'</a></strong>';
	
		  endif;
	?>

	<div class="after-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<span class="comments-icon">
			<?php comments_popup_link(__( 'No Comments', 'fmuzz' ), __( '1 Comment', 'fmuzz' ), __( '% Comments', 'fmuzz' ), '', __( 'Comments are closed.', 'fmuzz' )); ?>
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
		<?php edit_post_link( __( 'Edit', 'fmuzz' ), '<span class="edit-icon">', '</span>' ); ?>
	</div>
	
	<?php if ( !is_single() ) : ?>
				<div class="separator">
				</div>
	<?php endif; ?>
</article>
