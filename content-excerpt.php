		
	<article id="post-<?php the_ID(); ?>" <?php post_class('content-excerpt'); ?>>
		
		<h2 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
		<div class="postmeta"><?php airballoon_display_postmeta(); ?></div>

		<div class="entry clearfix">
			<?php airballoon_display_thumbnail_index(); ?>
			<?php the_excerpt(); ?>
			<a href="<?php esc_url(the_permalink()) ?>" class="more-link"><?php _e('Read more', 'airballoon-lite'); ?></a>
		</div>
		
		<div class="postinfo clearfix"><?php airballoon_display_postinfo(); ?></div>

	</article>