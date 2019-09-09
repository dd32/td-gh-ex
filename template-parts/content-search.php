
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php the_title( '<h3 class="search-title" rel="bookmark"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
		</header>

		<div class="post-content">
			<?php the_excerpt(); ?>
		</div>
	</article>
