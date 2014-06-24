		
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		
		<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('frontpage_posts_image'); ?></a>
		
		<h3 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		
		<div class="entry clearfix">
			<?php the_excerpt(); ?>
		</div>

	</article>