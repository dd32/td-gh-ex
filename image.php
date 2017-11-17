<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 *  Images / Attachments content template
 */
/*! ** DO NOT EDIT THIS FILE! It will be overwritten when the theme is updated! ** */

	$sb_layout = weaverx_page_lead( 'image' );

	// and next the content area.
	weaverx_sb_precontent('image');

	// content for images (Attachments, really)

	weaverx_post_count_clear(); the_post();
	?>
	<nav id="nav-above">
		<h3 class="assistive-text"><?php echo __( 'Image navigation','weaver-xtreme'); ?></h3>
		<span class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous' ,'weaver-xtreme') ); ?></span>
		<span class="nav-next"><?php next_image_link( false, __( 'Next &rarr;' ,'weaver-xtreme') ); ?></span>
	</nav><!-- #nav-above -->

	<article id="post-<?php the_ID(); ?>" <?php post_class('page-image'); ?>>
			<?php weaverx_page_title( ); ?>
		<div class="entry-meta <?php weaverx_text_class( 'post_info_top', true); ?>">
		<?php
		$metadata = wp_get_attachment_metadata();
		printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>','weaver-xtreme'),
			esc_attr( get_the_time() ),
			get_the_date(),
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height'],
			esc_url( get_permalink( $post->post_parent ) ),
			esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
			get_the_title( $post->post_parent )
		);
		weaverx_link_pages();	// <!--nextpage-->
		?>
		</div><!-- .entry-meta -->

		</header><!-- .entry-header -->

		<div class="entry-content clearfix">
			<div class="entry-attachment">
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
			<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"
				rel="attachment"><?php $attachment_size = apply_filters( 'weaverx_attachment_size', 'large' );
				echo wp_get_attachment_image( $post->ID,  $attachment_size ); // filterable image width with 1024px limit for image height.?>
			</a>
			<?php
			if ( ! empty( $post->post_excerpt ) ) { ?>
				<div class="entry-caption">
			<?php
				weaverx_the_post_excerpt();
			?>
				</div>
			<?php
			}
			?>
			</div><!-- .entry-attachment -->
			<div class="entry-description">
				<?php
				weaverx_the_post_full();
				weaverx_link_pages();	// <!--nextpage-->
				?>
			</div><!-- .entry-description -->
		</div><!-- .entry-content -->

	</article><!-- #post-<?php the_ID(); ?> -->
	<nav id="nav-below">
		<h3 class="assistive-text"><?php echo __( 'Image navigation','weaver-xtreme'); ?></h3>
		<span class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous' ,'weaver-xtreme') ); ?></span>
		<span class="nav-next"><?php next_image_link( false, __( 'Next &rarr;' ,'weaver-xtreme') ); ?></span>
	</nav><!-- #nav-below -->
	<?php
	if (weaverx_getopt_checked('allow_attachment_comments'))
		comments_template();

	weaverx_sb_postcontent('image');

	weaverx_page_tail( 'image', $sb_layout );    // end of page wrap
?>
