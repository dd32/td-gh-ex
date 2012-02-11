<?php
/**
 * The template for displaying posts in the Status Post Format on index and archive pages
 *
 * @since Akyuz 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php akyuz_get_post_header_bar();?>

		<?php akyuz_get_post_meta_top_bar();?>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<div class="status-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'akyuz_status_avatar', '65' ) ); ?></div>

			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', AKYUZ_TEXT_DOMAIN ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', AKYUZ_TEXT_DOMAIN ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<?php akyuz_get_post_meta_bottom_bar_loop();?>
		
	</article><!-- #post-<?php the_ID(); ?> -->
	
	<hr class="hr-entry-bt span-15 last"/>