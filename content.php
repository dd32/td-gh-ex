		
	<article id="post-<?php the_ID(); ?>" <?php post_class('content-full'); ?>>
		
		<h2 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
		<div class="postmeta"><?php airballoon_display_postmeta(); ?></div>

		<div class="entry clearfix">
			<?php airballoon_display_thumbnail_index(); ?>
			<?php the_content(__('<span>Read more</span>', 'airballoon-lite')); ?>
			<div class="page-links"><?php wp_link_pages(); ?></div>
		</div>
		
		<div class="postinfo clearfix"><?php airballoon_display_postinfo(); ?></div>

	</article>