<?php
/**
 * The template part for displaying site description
 *
 * @package Aamla
 * @since 1.0.0
 */

$aamla_description = get_bloginfo( 'description', 'display' );
if ( $aamla_description || is_customize_preview() ) : ?>
	<p<?php aamla_attr( 'site-description' ); ?>>
		<?php
		echo $aamla_description; // WPCS xss ok. 'bloginfo' filter run through esc_html.
		?>
	</p>
<?php endif; ?>
