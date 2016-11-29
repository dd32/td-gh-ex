<article id="post-<?php the_ID(); ?>" resource="?<?php the_ID() ; ?>#id" <?php post_class("single"); ?> vocab="http://schema.org/" typeof="Blog">
	<header class="entry-header">
		<div class="thumbnail"><?PHP
			the_post_thumbnail();
		?></div>
		<?php
			the_title( '<p class="entry-title">', '</p>' );
		?>
	</header>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				__( 'Continue reading %s', 'antonine' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
			
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'antonine' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'antonine' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div>
	
	<footer class="entry-footer">
		<?php antonine_author_meta(); ?><br />
		<?php antonine_entry_meta(); ?><br />
		<?php edit_post_link( __( 'Edit', 'antonine' ), '<span class="edit-link">', '</span>' ); ?><br /><br />
		<?php antonine_licence(); ?>	
	</footer>
</article>
