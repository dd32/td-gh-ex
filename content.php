<?php
/**
 * The default template for displaying content
 *
 * @since Akyuz 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php akyuz_get_post_header_bar();?>
		
		<?php akyuz_get_post_meta_top_bar();?>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_post_thumbnail('small-feature'); ?>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_post_thumbnail('small-feature'); ?>
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', AKYUZ_TEXT_DOMAIN ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', AKYUZ_TEXT_DOMAIN ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		
		<?php akyuz_get_post_meta_bottom_bar_loop();?>

	</article><!-- #post-<?php the_ID(); ?> -->

	<hr class="hr-entry-bt span-15 last"/>

