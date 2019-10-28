<?php
/**
 * Template part for displaying audio posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php
        
        if ( apply_filters( 'batourslight_page_option', true, 'page_title' ) ) :
			if ( is_single() && !get_the_post_thumbnail()) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			elseif ( ! is_single()) :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		endif;

		$content = apply_filters( 'the_content', get_the_content() );
		$audio   = false;

		// Only get audio from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
		}
        
        if ( '' !== get_the_post_thumbnail() && ! is_single() && empty( $audio ) ) {
			get_template_part( 'template-parts/content-tags/content-tag-post-thumbnail' );
		}
	
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				get_template_part( 'template-parts/content-tags/content-tag-posted-on' );
                get_template_part( 'template-parts/content-tags/content-tag-posted-by' );
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
		if ( ! is_single() ) {

			// If not a single post, highlight the audio file.
			if ( ! empty( $audio ) ) {
				
				foreach ( $audio as $audio_html ) {
					
					echo '<div class="entry-audio">';
						echo wp_kses_post(apply_filters( 'batourslight_content_audio_html', $audio_html ));
					echo '</div>';
				}
			};

		};

		if ( is_single() || empty( $audio ) ) {

			the_content( sprintf(
				wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
					 __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ba-tours-light' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ba-tours-light' ),
				'after'  => '</div>',
			) );
		};
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php get_template_part( 'template-parts/content-tags/content-tag-entry-footer' ); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
