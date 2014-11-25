<?php
/**
 * The template displaying an audio custom post format
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
					<?php fkidd_the_content_single(); ?>
				</div>

	<?php else : ?>

				<div class="content">

					<?php fkidd_the_content(); ?>

				</div>

	<?php endif; ?>
<?php if ( !is_single() && get_the_title() === '' ) :
			
				echo '<strong><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="'.__( 'Read More', 'fkidd').'">'.__( 'Read More', 'fkidd').'</a></strong>';
	
		  endif;
	?>

	<div class="after-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<span class="comments-icon">
			<?php comments_popup_link(__( 'No Comments', 'fkidd'), __( '1 Comment', 'fkidd'), __( '% Comments', 'fkidd'), '', __( 'Comments are closed.', 'fkidd')); ?>
		</span>
		<span class="audio-icon">
			<a href="<?php echo esc_url( get_post_format_link( 'audio' ) ); ?>" title="<?php echo get_post_format_string( 'audio' ); ?>"><?php echo get_post_format_string( 'audio' ); ?></a>
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
		<?php edit_post_link( __( 'Edit', 'fkidd'), '<span class="edit-icon">', '</span>' ); ?>
	</div>
	<?php if ( !is_single() ) : ?>
				<div class="separator">
				</div>
	<?php endif; ?>
</article>