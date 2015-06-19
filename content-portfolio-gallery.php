<?php
/**
 * Template used for displaying portfolio gallery in a carousel
 *
 * @package Argent
 */

$gallery = get_post_gallery( $post->ID, false ); // Get the first gallery
$images = explode( ',', $gallery['ids'] ); // Get the gallery image IDs
?>

	<div class="slick">
		<div class="slick-slider">

		<?php
		foreach( $images as $image ) :

			// Get the attachment's caption stored in post_excerpt
			$excerpt = get_post_field( 'post_excerpt', $image );

			// Only show a caption if there is one
			if ( ! empty( $excerpt ) ) {
				$image_excerpt_caption = '<div class="carousel-caption">'. $excerpt .'</div>';
			} else {
				$image_excerpt_caption = null;
			}

			// Output the image with captions
			echo '<div> ' . $image_excerpt_caption . ' <img src=" ' . esc_url( wp_get_attachment_image_src( $image, 'full' )[0] ) . ' " /></div>';

		endforeach;
		?>
		</div><!-- .slick-slider -->
	</div><!-- .slick -->
