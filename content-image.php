<?php
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * @since Akyuz 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'indexed' ); ?>>
		<div class="clear postformatting post2-image"></div>
		<nav id="nav-single" class="span-24">
			<h3 class="assistive-text"><?php _e( 'Post navigation', AKYUZ_TEXT_DOMAIN ); ?></h3>
			<span class="nav-previous span-3"><?php previous_image_link( false, __( '&larr; Previous' , AKYUZ_TEXT_DOMAIN ) ); ?></span>
			<span class="nav-next span-3 last"><?php next_image_link( false, __( 'Next &rarr;' , AKYUZ_TEXT_DOMAIN ) ); ?></span>
			<br/><br/>
		</nav><!-- #nav-single -->
		
		<?php akyuz_get_post_header_bar();?>		
		
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', AKYUZ_TEXT_DOMAIN ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', AKYUZ_TEXT_DOMAIN ) . '</span>', 'after' => '</div>' ) ); ?>
<?php
	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
	 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
	 */
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )
			break;
	}
	$k++;
	// If there is more than 1 attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>
			<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
				$attachment_size = apply_filters( 'akyuz_attachment_size', 848 );
				echo wp_get_attachment_image( $post->ID, array( $attachment_size, 960 ) ); // filterable image width with 1024px limit for image height.
			?></a>
			<?php if ( !empty( $post->post_excerpt ) ) : ?>
				<div class="entry-caption">
					<?php the_excerpt(); ?>
				</div>	
			<?php endif; ?>

		</div><!-- .entry-content -->

		<?php akyuz_get_post_meta_bottom_bar_loop();?>

	</article><!-- #post-<?php the_ID(); ?> -->


