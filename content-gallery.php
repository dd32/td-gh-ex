<?php
/**
 * The template for displaying posts in the Gallery Post Format on index and archive pages
 *
 * @since Akyuz 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php 
		$format = get_post_format();
		if ( false === $format )
			$format = 'standard';
		?>
		<div class="clear postformatting post-<?php echo $format;?>"></div>

		<?php akyuz_get_post_header_bar();?>
		
		<?php akyuz_get_post_meta_top_bar();?>

	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php if ( post_password_required() ) : ?>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', AKYUZ_TEXT_DOMAIN ) ); ?>

			<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>

				<figure class="gallery-thumb span-15 last">
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</figure><!-- .gallery-thumb -->

				<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, AKYUZ_TEXT_DOMAIN ),
						'href="' . esc_url( get_permalink() ) . '" title="' . sprintf( esc_attr__( 'Permalink to %s', AKYUZ_TEXT_DOMAIN ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						number_format_i18n( $total_images )
					); ?></em></p>
			<?php endif; ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', AKYUZ_TEXT_DOMAIN ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php akyuz_get_post_meta_bottom_bar_loop();?>
	
</article><!-- #post-<?php the_ID(); ?> -->

<hr class="hr-entry-bt span-15 last"/>