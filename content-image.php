<?php
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * @since Akyuz 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'indexed' ); ?>>
		<?php 
		$format = get_post_format();
		if ( false === $format )
			$format = 'standard';
		?>
		<div class="clear postformatting post-<?php echo $format;?>"></div>

		<?php akyuz_get_post_header_bar();?>		
		
		<div class="sa-entry-meta span-15 last">
			<?php $show_sep = false; ?>
			<?php if ('post'== get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php $categories_list = get_the_category_list( __( ' - ', AKYUZ_TEXT_DOMAIN ) );
				if ( $categories_list ):
			?>
			<span class="cat-links">
				<?php printf( __( '%1$s', AKYUZ_TEXT_DOMAIN ), $categories_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if categories ?>
			<?php endif; // End if 'post' == get_post_type() ?>
		</div>

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', AKYUZ_TEXT_DOMAIN ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', AKYUZ_TEXT_DOMAIN ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<?php akyuz_get_post_meta_bottom_bar_loop();?>
		
	</article><!-- #post-<?php the_ID(); ?> -->

	<hr class="hr-entry-bt span-15 last"/>