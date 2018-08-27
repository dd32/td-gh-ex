<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage adventure_travelling
 * @since 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses adventure_travelling_header_style()
 */
function adventure_travelling_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'adventure_travelling_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'adventure_travelling_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'adventure_travelling_custom_header_setup' );

if ( ! function_exists( 'adventure_travelling_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see adventure_travelling_custom_header_setup().
 */
function adventure_travelling_header_style() {

		$header_text_color = get_header_textcolor();
	?>
		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
			.headerbox{
				background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
				background-position: center top;
			}
			<?php endif; ?>	
		</style>
	<?php
}
endif; // adventure_travelling_header_style