		
	<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post clearfix'); ?>>

		<div class="entry-meta-wrap postmeta-wrap clearfix">
			
			<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
				<?php the_post_thumbnail('post-thumbnail'); ?>
			</a>
			
			<div class="entry-meta postmeta"><?php rubine_display_postmeta(); ?></div>
			
		</div>
		
		<div class="post-content">

			<h1 class="entry-title post-title">
				<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
					<?php rubine_display_subtitle(); ?>
					<?php the_title('<span>', '</span>'); ?>
				</a>
			</h1>

			<div class="entry clearfix">
				<?php the_excerpt(); ?>
				<a href="<?php esc_url(the_permalink()) ?>" class="more-link"><?php esc_html_e( 'Read more', 'rubine-lite' ); ?></a>
			</div>

		</div>

	</article>