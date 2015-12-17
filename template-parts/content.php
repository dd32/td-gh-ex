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
			the_content( sprintf(
					__( 'Continue reading &raquo; %s', 'aesblo' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				)				
			);
			
			aesblo_link_pages();
		?>
	</div><!-- .entry-content -->
	
	<?php 
		if ( is_single() && get_the_author_meta( 'description' ) ) {
			get_template_part( 'template-parts/author', 'bio' );
		}
	?>
	
	<footer class="entry-footer">
		<?php aesblo_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->