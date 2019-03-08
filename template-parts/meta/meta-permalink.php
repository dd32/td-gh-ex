<?php
/**
 * The template part for displaying post permalink with quick action toggle.
 *
 * @package Aamla
 * @since 1.0.1
 */

?>
<a href="<?php the_permalink(); ?>"<?php aamla_attr( 'post-permalink' ); ?>>
	<div class="quick-action">
		<?php
		switch ( get_post_format() ) {
			case 'audio':
				printf(
					'%1$s',
					aamla_get_icon( [ 'icon' => 'music' ] ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
				break;
			case 'video':
				printf(
					'%1$s',
					aamla_get_icon( [ 'icon' => 'video' ] ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
				break;
			case 'gallery':
				printf(
					'%1$s',
					aamla_get_icon( [ 'icon' => 'images' ] ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
				break;
			default:
				printf(
					'<span class="screen-reader-text">%s</span>',
					esc_html__( 'Read Full Post', 'aamla' )
				);
		}
		?>
	</div>
</a>
