<?php
/**
 * The template part for displaying posts.
 *
 * @package aesblo
 * @since 1.0.0
 */
 ?>
 <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
 	<header class="entry-header">
		<?php aesblo_entry_header(); ?>
	</header><!-- .entry-header -->
	
	<div class="entry-content clearfix">
		<?php 
			the_content();
			aesblo_link_pages();
		?>
	</div><!-- .entry-content -->
	
	<?php edit_post_link( __( 'Edit', 'aesblo' ), '<footer class="entry-footer"><ol><li class="edit-link"><span class="fa fa-pencil-square-o"></span>', '</li></ol></footer><!-- .entry-footer -->' ); ?>
</article><!-- #post-## -->