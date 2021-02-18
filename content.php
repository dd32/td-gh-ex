		
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

		<div class="postmeta-wrap clearfix">
			
			<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
				<?php the_post_thumbnail('post-thumbnail'); ?>
			</a>
			
			<div class="postmeta"><?php rubine_display_postmeta(); ?></div>
			
		</div>
		
		<div class="post-content">

			<h2 class="post-title">
				<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
					<?php rubine_display_subtitle(); ?>
					<?php the_title('<span>', '</span>'); ?>
				</a>
			</h2>

			<div class="entry clearfix">
				<?php the_excerpt(); ?>
				<a href="<?php esc_url(the_permalink()) ?>" class="more-link"><?php _e('Read more', 'rubine-lite'); ?></a>
			</div>

		</div>

	</article>