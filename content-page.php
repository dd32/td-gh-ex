<article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class = "entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
			<small class = "entry-metadata">
				| <?php if ( comments_open()) : ?> 
					<?php comments_popup_link('Add Comment','1 Comment','% Comments'); ?>
				<?php else : ?>
					<?php if (!comments_open() && get_comments_number() )?>
						<?php _e('Comments Closed', 'silver-quantum'); ?>
				<?php endif; ?> | 
			<?php edit_post_link(); ?>
			</small>
		<?php the_content(); ?>
		<?php comments_template(); ?>
		
	</div>
	
	<footer class="entry-meta">
	<?php edit_post_link( __( 'Edit', 'silver-quantum' )); ?>
	</footer>
</article>
