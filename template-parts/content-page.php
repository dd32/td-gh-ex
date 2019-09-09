
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php the_title( '<h2 class="title">', '</h2>' ); ?>
		</header>

		<div class="post-content">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			the_content();
			?>
		</div>

		<footer>
			<?php wp_link_pages(); ?>
			<?php edit_post_link( __( 'Edit', 'arix' ) ); ?>
		</footer>
	</article>
