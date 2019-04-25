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

		<style type="text/css" id="acuarela-preview-css">
			.logged-in #masthead {
				top: 0;
			}
		</style>
	<?php
	endif;

	$header_image = get_header_image();
	$text_color   = get_header_textcolor();
	$acuarela_theme_options = acuarela_get_options();

	// If no custom options for header are set, let's bail.
	if ( ! acuarela_get_options() ) :
		return;
	endif;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="acuarela-header-css">
	<?php if ( ! has_custom_logo() ) : ?>
		.home-link {
			display: block;
		} 
	<?php else : ?>
		.home-link {
			display:flex;
			flex-direction: column;
		}

	<?php endif;

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

if ( ( has_custom_logo() && $acuarela_theme_options['show_site_title'] && $acuarela_theme_options['show_site_description'] ) || ( has_custom_logo() && $acuarela_theme_options['show_site_title'] ) || ( has_custom_logo() && $acuarela_theme_options['show_site_description'] ) ) : ?>
	#masthead {
		position: static;
	}
<?php endif;

// Has the title been hidden?
if ( ! $acuarela_theme_options['show_site_title'] ) : ?>
	.site-title {
		position: absolute;
		width: 0;
		height: 0;
		clip: rect(1px, 1px, 1px, 1px);
	}
<?php endif;

if ( ! $acuarela_theme_options['show_site_description'] ) : ?>

	.site-description {
		position: absolute;
		width: 0;
		height: 0;
		clip: rect(1px, 1px, 1px, 1px);
	}

<?php endif;

if ( empty( $header_image ) ) : ?>
	.site-header .home-link {
		min-height: 2em;
	}

	@media (max-width: 767px) {
	.site-header .home-link {
		min-height: 0;
	}
	}
	@media (max-width: 359px) {
	.site-header .home-link  {
		min-height: 0;
	}
	}
<?php endif;

// If the user has set a custom color for the text, use that.
if ( get_theme_support( 'custom-header', 'default-text-color' ) != $text_color ) : ?>
	.site-title {
		color: #<?php echo esc_attr( $text_color ); ?>;
	}
<?php endif; ?>
	</style>
<?php
}
