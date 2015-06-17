<?php
/**
 * @package Beach
 */

get_header(); ?>

<div id="primary" class="image-attachment">
	<div id="content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta">
					<?php
						printf( '<span class="meta-prep meta-prep-entry-date">%1$s</span> <time class="entry-date" datetime="%2$s" pubdate>%3$s</time>',
						       __( 'Posted on', 'beach' ),
						       esc_attr( get_the_date( 'c' ) ),
						       esc_html( get_the_date() )
						);
					?>
					<span class="sep"> | </span>
					<?php
						$metadata = wp_get_attachment_metadata();
						printf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
						       wp_get_attachment_url(),
						       __( 'Link to full-size image', 'beach' ),
						       absint( $metadata['width'] ),
						       absint( $metadata['height'] )
						);
					?>
					<span class="sep"> | </span>
					<?php
						printf( '%1$s <a href="%2$s" title="%3$s" rel="gallery">%3$s</a>',
							__( 'Posted in', 'beach' ),
							esc_url( get_permalink( $post->post_parent ) ),
							sprintf( __( 'Return to %s', 'beach' ), esc_html( get_the_title( $post->post_parent ) ) )
						);

						edit_post_link( __( 'Edit', 'beach' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' );
					?>
				</div><!-- .entry-meta -->

				<nav id="image-navigation">
					<span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous' , 'beach' ) ); ?></span>
					<span class="next-image"><?php next_image_link( false, __( 'Next &rarr;' , 'beach' ) ); ?></span>
				</nav><!-- #image-navigation -->
			</header><!-- .entry-header -->

			<div class="entry-content">

				<div class="entry-attachment">
					<div class="attachment">
						<?php
							/**
							 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
							 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
							 */
							$attachments = array_values( get_posts( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
							foreach ( $attachments as $k => $attachment ) {
								if ( $attachment->ID == get_the_ID() )
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
						$attachment_size = apply_filters( 'theme_attachment_size',  800 );
						echo wp_get_attachment_image( get_the_ID(), array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
						?></a>
					</div><!-- .attachment -->

					<?php if ( ! empty( $post->post_excerpt ) ) : ?>
					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div>
					<?php endif; ?>
				</div><!-- .entry-attachment -->

				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'beach' ), 'after' => '</div>' ) ); ?>

			</div><!-- .entry-content -->

			<div class="entry-utility">
				<?php if ( comments_open() && pings_open() ) : // Comments and trackbacks open ?>
					<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'beach' ), get_trackback_url() ); ?>
				<?php elseif ( ! comments_open() && pings_open() ) : // Only trackbacks open ?>
					<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'beach' ), get_trackback_url() ); ?>
				<?php elseif ( comments_open() && ! pings_open() ) : // Only comments open ?>
					<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'beach' ); ?>
				<?php elseif ( ! comments_open() && ! pings_open() ) : // Comments and trackbacks closed ?>
					<?php _e( 'Both comments and trackbacks are currently closed.', 'beach' ); ?>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'beach' ), ' <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</article><!-- #post-## -->

		<?php comments_template(); ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>