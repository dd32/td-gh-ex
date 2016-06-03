<article id="post-<?php the_ID(); ?>" resource="?<?php the_ID() ; ?>#id" <?php post_class(); ?> vocab="http://schema.org/" typeof="Blog">
	<header class="entry-header">
		<div class="thumbnail"><?PHP
			the_post_thumbnail();
		?></div>
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header>
	
	<div class="entry-content">
		<p><?php echo __("Posted on", "antonine") . " " . $post->post_date; ?></p>
		<br />
		<?php
			the_content( sprintf(
				__( 'Continue reading %s', 'antonine' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		?>
	</div>
	
	<footer class="entry-footer">
		<?php antonine_author_meta(); ?><br />
		<?php antonine_entry_meta(); ?><br />
		<?php edit_post_link( __( 'Edit', 'antonine' ), '<span class="edit-link">', '</span>' ); ?><br /><br />
		<?php antonine_licence(); ?>	
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
