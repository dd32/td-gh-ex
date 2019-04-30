<div id="post-<?php the_ID(); ?>" class="post-single" <?php post_class(); ?>>
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<p class="footnote">Posted by <a><?php the_author(); ?></a> on <?php echo get_the_date(); ?></p>
	<hr />
	<?php the_content(); ?>
	<p><?php the_tags( '<span class="tag is-medium">', '</span> <span class="tag is-medium">', '</span>' ); ?></p>
	<hr />
</div>