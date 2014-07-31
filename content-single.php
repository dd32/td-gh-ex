
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

		<div class="postmeta-wrap clearfix">
		
			<?php the_post_thumbnail('post-thumbnail'); ?>
			
			<div class="postmeta"><?php rubine_display_postmeta(); ?></div>
		
		</div>
		
		<div class="post-content">

			<h2 class="post-title">
				<?php rubine_display_subtitle(); ?>
				<?php the_title('<span>', '</span>'); ?>
			</h2>

			<div class="entry clearfix">
				<?php the_content(); ?>
				<!-- <?php trackback_rdf(); ?> -->
				<div class="page-links"><?php wp_link_pages(); ?></div>			
			</div>
			
			<div class="meta-tags clearfix"><?php rubine_display_post_tags(); ?></div>

		</div>

	</article>