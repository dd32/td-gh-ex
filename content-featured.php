	
	<div class="featured-post">
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="featured-post-thumbnail">
				<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
					<?php the_post_thumbnail('featured-content'); ?>
				</a>
			</div>
			
			<div class="featured-post-content">

				<h2 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>	
			
			</div>

		</article>
		
	</div>