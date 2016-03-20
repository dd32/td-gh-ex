<?php
/**
 * The template for displaying Author bios
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
?>

<div class="author-bio">
		<?php
		/**
		 * Filter the author bio avatar size.
		 * @since Aguafuerte 1.01
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'aguafuerte_author_bio_avatar_size', 72 );
		?>

	<div class="author-description">
		
		<h3>
			<?php
			printf( __('About %s ', 'aguafuerte'), get_the_author());
			?>
		</h3>
		<p>
		<?php
			echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				if ( get_the_author_meta( 'description' ) ) :
					the_author_meta( 'description' ); 
				endif;
			?>
		</p>

		<div class="clearfix"></div>
	</div><!-- .author-description -->
	<div class="clearfix"></div>
</div><!-- .author-bio -->

<div class="clearfix"></div>
