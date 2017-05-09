<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package  basepress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php do_action( 'basepress_entry_meta_header' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content entry-excerpt clearfix">
		<?php the_excerpt(); ?>
		<?php basepress_more_link(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php do_action( 'basepress_entry_meta_footer' ); ?>
	</footer><!-- .entry-footer -->

</article>
