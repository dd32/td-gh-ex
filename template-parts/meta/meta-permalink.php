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
				printf( '%1$s<span class="action-text">%2$s</span>',
					aamla_get_icon( [ 'icon' => 'music' ] ),
					esc_html__( 'Listen Audio', 'aamla' )
				); // WPCS xss ok. 'aamla_get_icon' returns escaped value.
				break;
			case 'video':
				printf( '%1$s<span class="action-text">%2$s</span>',
					aamla_get_icon( [ 'icon' => 'video' ] ),
					esc_html__( 'Watch Video', 'aamla' )
				); // WPCS xss ok. 'aamla_get_icon' returns escaped value.
				break;
			case 'gallery':
				printf( '%1$s<span class="action-text">%2$s</span>',
					aamla_get_icon( [ 'icon' => 'images' ] ),
					esc_html__( 'View Gallery', 'aamla' )
				); // WPCS xss ok. 'aamla_get_icon' returns escaped value.
				break;
			default:
				printf( '<span class="screen-reader-text">%s</span>',
					esc_html__( 'Read Full Post', 'aamla' )
				);
		}
		?>
	</div>
</a>
