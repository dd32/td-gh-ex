<?php
/**
 * The template part for displaying tags of current post
 *
 * @package Aamla
 * @since 1.0.0
 */

$aamla_tags_list = get_the_tag_list( '', esc_html_x( ', ', 'Used between tags list items, there is a space after the comma.', 'aamla' ) );

if ( $aamla_tags_list ) :
	?>
	<span<?php aamla_attr( 'meta-tags' ); ?>>
		<?php
		printf(
			'<span class="meta-title">%s</span>',
			aamla_get_icon( [ 'icon' => 'tags' ] ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
		echo $aamla_tags_list; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
	</span><!-- .meta-tags -->
	<?php
endif;
