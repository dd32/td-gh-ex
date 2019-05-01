<div id="post-<?php the_ID(); ?>" class="post" <?php post_class(); ?>>
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<hr />
	<?php the_excerpt(); ?>
	<hr />
	<div class="level">
		<div class="level-left"><p><?php the_tags( '<span class="tag">', '</span> <span class="tag">', '</span>' ); ?></p></div>
		<div class="level-right"><div class="level-item"><p class="footnote"><?php _e('Posted by', 'atreus'); ?> <a><?php the_author(); ?></a> <?php _e('on', 'atreus'); ?> <?php echo get_the_date(); ?></p></div></div>
	</div>
</div>