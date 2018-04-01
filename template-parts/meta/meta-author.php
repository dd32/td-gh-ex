<?php
/**
 * The template part for displaying current post author name
 *
 * This template can be used outside main loop.
 *
 * @package Aamla
 * @since 1.0.0
 */

global $post;
?>

<span<?php aamla_attr( 'meta-author' ); ?>>
	<span class="by"><?php esc_html_e( 'By', 'aamla' ); ?></span>
	<span<?php aamla_attr( 'meta-author-url' ); ?>>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post->post_author ) ) ); ?>"<?php aamla_attr( 'url' ); ?>><span<?php aamla_attr( 'name', false ); ?>> <?php echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?></span></a>
	</span><!-- .meta-author-url -->
</span><!-- .meta-author -->
