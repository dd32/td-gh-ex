<?php
/**
* The template for displaying image attachments
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Bassist
* @since Bassist 1.0.0
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="attachment-meta">
			<?php 
			$post_title = get_the_title( $post->post_parent );

			if ( empty( $post_title ) || 0 == $post->post_parent )
				printf('<time class="entry-date" datetime="%1$s"><span class="fa fa-clock-o" aria-hidden="true"></span>%2$s</time>', esc_attr( get_the_date('c')), esc_html(get_the_date()));

			else {
				// Translators: There is a space after "on".
				_e('Published on ','bassist');
				printf('<time class="entry-date" datetime="%1$s"><span class="fa fa-clock-o" aria-hidden="true"></span>%2$s</time>', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );
				// Translators: There is a space before and after "in".
				_e( ' in ', 'bassist');
				printf('<a href="%1$s" class="parent-post-link" title="%2$s" rel="gallery"><span class="fa fa-camera" aria-hidden="true"></span>%3$s</a>',
					esc_url( get_permalink( $post->post_parent) ),
					// Translators: There is a space after "Return to:".
					the_title_attribute( array( 'before' => __('Return to: ', 'bassist'), 'echo' => 0, 'post' => $post->post_parent) ),
					$post_title
				);
			}

			$metadata = wp_get_attachment_metadata();
			printf( '<a href="%1$s" class="full-size-link" title="%2$s"><span class="fa fa-search-plus" aria-hidden="true"></span>%3$s (%4$s &times; %5$s)</a>',
				esc_url( wp_get_attachment_url() ),
				esc_attr__( 'Link to full-size image', 'bassist' ),
				__( 'Full resolution', 'bassist' ),
				$metadata['width'],
				$metadata['height'] );

				edit_post_link('<span class="fa fa-pencil" aria-hidden="true"></span>'. __('Edit', 'bassist') );
			?>
		</div><!-- .attachment-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<nav id="image-navigation" class="navigation image-navigation attachment-meta">
			<div class="nav-links">
				<div class="nav-previous"><?php previous_image_link(false, '<span class="meta-nav fa fa-long-arrow-left" aria-hidden="true"></span>'.__('Previous', 'bassist' ) ); ?></div>
				<div class="nav-next"><?php next_image_link( false, __( 'Next', 'bassist' ).'<span class="meta-nav fa fa-long-arrow-right" aria-hidden="true"></span>' ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- .image-navigation -->

		<div class="entry-attachment">
			<?php
				/**
				 * Filter the default Bassist image attachment size.
				 * @since Bassist 1.0.0
				 * @param string $image_size Image size. Default 'large'.
				 */
				$image_size = apply_filters( 'bassist_attachment_size', 'large');

				echo wp_get_attachment_image( get_the_ID(), $image_size );
			?>

			<?php if ( has_excerpt() ) : ?>
				<div class="entry-caption">
					<?php the_excerpt(); ?>
				</div><!-- .entry-caption -->
			<?php endif; ?>
		</div><!-- .entry-attachment -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->
