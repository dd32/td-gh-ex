<?php get_header(); ?>
		<div id="container">
			<div id="content" role="main">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php if ( ! empty( $post->post_parent ) ) : ?>
						<h1 class="tag-page-title"><a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php esc_attr( printf( __( 'Return to %s', 'star' ), get_the_title( $post->post_parent ) ) ); ?>" rel="gallery">
						<?php /* translators: %s - title of parent post */
							printf( __( '<span class="meta-nav">&larr;</span> %s', 'star' ), get_the_title( $post->post_parent ) ); ?></a>
						</h1>
					<?php endif; ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="front-title"><?php the_title(); ?></h2>
					<div class="entry-meta">
					<?php echo __('Posted by ', 'star');
					the_author_posts_link();
					echo __(' on ','star'); ?>
					<?php the_time('d') ?> <?php the_time('m') ?> <?php the_time('Y') ?>
						<?php
							if ( wp_attachment_is_image() ) {
								echo ' <span class="meta-sep">|</span> ';
								$metadata = wp_get_attachment_metadata();
								printf( __( 'Full size is %s pixels', 'star'),
									sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
										wp_get_attachment_url(),
										esc_attr( __('Link to full-size image', 'star') ),
										$metadata['width'],
										$metadata['height']
									)
								);
							}
						?>
						<?php edit_post_link( __( 'Edit', 'star' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-meta -->
						<div class="entry-content">
							<?php if ( wp_attachment_is_image() ) :
								$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
								foreach ( $attachments as $k => $attachment ) {
									if ( $attachment->ID == $post->ID )
										break;
								}
								$k++;
								// If there is more than 1 image attachment in a gallery
								if ( count( $attachments ) > 1 ) {
									if ( isset( $attachments[ $k ] ) )
										// get the URL of the next image attachment
										$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
									else
										// or get the URL of the first image attachment
										$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
								} else {
									// or, if there's only 1 image attachment, get the URL of the image
									$next_attachment_url = wp_get_attachment_url();
								}
							?>
						<?php
							$attachment_size = apply_filters( 'star_attachment_size', 900 );
							echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
						?>
						<div id="nav-attachment" class="navigation">
							<div class="nav-previous"><?php previous_image_link( false ); ?></div>
							<div class="nav-next"><?php next_image_link( false ); ?></div>
						</div><!-- #nav -->
<?php else : ?>
			<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
<?php endif; ?>
				<div class="entry-caption"><?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?></div>
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'star' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'star' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
<?php comments_template(); ?>
<?php endwhile; ?>
			</div><!-- #content -->
			<?php get_sidebar(); ?>
		</div><!-- #container -->
<?php get_footer(); ?>