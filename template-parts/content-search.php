
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h3 class="search-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		</header>

		<div class="post-content">
			<?php the_excerpt(); ?>
		</div>
	</article>
