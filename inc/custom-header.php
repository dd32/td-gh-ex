<?php
/**
 * Acuarela header styles
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */

/**
 * Implements Acuarela's header styles.
 *
 @since Acuarela 1.0
 */
function acuarela_header_style() {
	if ( is_customize_preview() ) : ?>

		<style id="acuarela-preview-css" type="text/css">
			.logged-in #masthead {
				top: 0;
			}
		</style>
	<?php
	endif;

	$header_image = get_header_image();
	$header_text_color   = get_header_textcolor();
	$acuarela_theme_options = acuarela_get_options();

	// If no custom options for header are set, let's bail.
	if ( ! acuarela_get_options() && ! has_custom_logo() ) :
		return;
	endif;

	// If we get this far, we have custom styles.
	?>
	<style id="acuarela-header-css" type="text/css">
<?php
		if ( has_custom_logo() ) : ?>
			@media (max-width: 880px) {
				.title-description {
					position: absolute;
					width: 0;
					height: 0;
					clip: rect(1px, 1px, 1px, 1px);
				}
			}
<?php 	endif;

		// Have both the title and the tagline been hidden?
		if ( 'blanck' === $header_text_color || ! display_header_text() ) : ?>
			.title-description {
				position: absolute;
				width: 0;
				height: 0;
				clip: rect(1px, 1px, 1px, 1px);
			}

			#navigation {
				margin: 0 auto;
			}

<?php 	endif;

		// Has only the title been hidden?
		if ( $acuarela_theme_options['hide_site_title'] ) : ?>
			.site-title {
				position: absolute;
				width: 0;
				height: 0;
				clip: rect(1px, 1px, 1px, 1px);
			}
<?php 	endif;

		// Has only the site description been hidden?
		if ( $acuarela_theme_options['hide_site_description'] ) : ?>
			.site-description {
				position: absolute;
				width: 0;
				height: 0;
				clip: rect(1px, 1px, 1px, 1px);
			}
<?php 	endif;

if ( ! empty( $header_image ) ) : ?>
	.site-header {
		background: url(<?php header_image(); ?>) no-repeat scroll top;
		background-size: 1920px auto;
	}
	@media (max-width: 767px) {
		.site-header {
			background-size: 768px auto;
		}
	}
	@media (max-width: 359px) {
		.site-header {
			background-size: 360px auto;
		}
	}
<?php endif;

// If the user has set a custom color for the text, use that.
if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color ) : ?>
	.site-title {
		color: #<?php echo esc_attr( $header_text_color ); ?>;
	}
<?php endif; ?>
	</style>
<?php
}
