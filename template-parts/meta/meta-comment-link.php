<?php
/**
 * The template part for displaying link to write comment in current post
 *
 * @package Aamla
 * @since 1.0.0
 */

if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
?>
	<span<?php aamla_attr( 'meta-comments-link' ); ?>>
		<?php
		comments_popup_link(
			sprintf(
				/* translators: %s: Name of current post */
				wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'aamla' ), array( 'span' => array( 'class' => array() ) ) ),
				get_the_title()
			)
		);
		?>
	</span><!-- .meta-comments-link -->
<?php
endif;
