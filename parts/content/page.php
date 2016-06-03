<article id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php while(have_posts()): the_post(); ?>
		<?php the_content();?>
		<?php endwhile; ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php antonine_licence(); ?>	
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
