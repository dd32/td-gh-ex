<?php
/**
 * The template part for displaying current post author information.
 *
 * This template can be used outside main loop.
 *
 * @package Aamla
 * @since 1.0.0
 */

global $post;
?>

<div<?php aamla_attr( 'entry-author' ); ?>>
	<div<?php aamla_attr( 'entry-author-avatar' ); ?>><?php echo get_avatar( get_the_author_meta( 'user_email', $post->post_author ), 120 ); ?></div>
	<div<?php aamla_attr( 'entry-author-description' ); ?>>
		<h2<?php aamla_attr( 'entry-author-title' ); ?>><?php echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?></h2>

		<div<?php aamla_attr( 'entry-author-bio' ); ?>>
			<?php echo esc_html( get_the_author_meta( 'description', $post->post_author ) ); ?>
			<a<?php aamla_attr( 'entry-author-link' ); ?> href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post->post_author ) ) ); ?>" rel="author">
				<?php
				/* translators: %s: post author */
				printf( esc_html__( 'View all posts by %s', 'aamla' ), esc_html( get_the_author_meta( 'display_name', $post->post_author ) ) );
				?>
			</a>
		</div><!-- .entry-author-bio -->
	</div><!-- .entry-author-description -->
</div><!-- .entry-author -->
