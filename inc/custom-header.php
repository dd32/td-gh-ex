<?php
/**
 * @package beetech
 */

function beetech_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'beetech_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 300,
		'flex-height'            => true,
		'wp-head-callback'       => 'beetech_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'beetech_custom_header_setup' );

if ( ! function_exists( 'beetech_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see beetech_custom_header_setup().
 */
function beetech_header_style() {
    $header_text_color = get_header_textcolor();
	$header_text_color = ltrim( $header_text_color, '#' );
	$default_header_text_color = get_theme_support( 'custom-header', 'default-text-color' );
	$default_header_text_color = ltrim( $default_header_text_color, '#' );

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( $default_header_text_color === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
