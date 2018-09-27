<?php
/**
 * The template part for displaying an Author biography
 *
 * 
 * @package Adelin
 * @since Adelin 1.0
 */
?>

<div class="author-info">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the Adelin author bio avatar size.
		 *
		 * @since Adelin 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'adelin_author_bio_avatar_size', 120 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<div class="author-title"><span class="author-heading entry-meta"><?php esc_html_e( 'Written by', 'adelin' ); ?></span>
			<h3><?php echo get_the_author(); ?></h3>
		</div>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p>
		<p>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php 
				/* translators: %s: Name of author */ 
				printf( esc_html__( 'View all posts by %s', 'adelin' ), get_the_author() ); ?>
			</a>
		</p><!-- .author-bio -->
	</div><!-- .author-description -->
</div><!-- .author-info -->
