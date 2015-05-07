
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php courage_display_thumbnail_single(); ?>
		
		<h2 class="post-title entry-title"><?php the_title(); ?></h2>
		
		<div class="postmeta"><?php courage_display_postmeta(); ?></div>

		<div class="entry clearfix">
			<?php the_content(); ?>
			<!-- <?php trackback_rdf(); ?> -->
			<div class="page-links"><?php wp_link_pages(); ?></div>			
		</div>
		
		<div class="postinfo clearfix"><?php courage_display_postinfo(); ?></div>

	</article>