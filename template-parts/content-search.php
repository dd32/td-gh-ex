<?php
/**
 * The template part for displaying results in search pages
 *
 * @package aesblo
 * @since 1.0.0
 */
 ?>
 <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
 	<header class="entry-header">
		<?php aesblo_entry_header(); ?>
	</header><!-- .entry-header -->
	
	<div class="entry-content entry-excerpt clearfix">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php aesblo_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->