<?php
/**
 * @package BB Wedding Bliss
 * @subpackage bb-wedding-bliss
 * @since bb-wedding-bliss 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses bb_wedding_bliss_header_style()
*/

function bb_wedding_bliss_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'bb_wedding_bliss_custom_header_args', array(

		//'default-image'          => get_template_directory_uri().'/images/banner_bg.jpg',

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'bb_wedding_bliss_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'bb_wedding_bliss_custom_header_setup' );

if ( ! function_exists( 'bb_wedding_bliss_header_style' ) ) :

/**
 * Styles the header image and text displayed on the blog
 *
 * @see bb_wedding_bliss_custom_header_setup().
 */

function bb_wedding_bliss_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		#header{
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>
	</style>
	<?php
}

endif; // bb_wedding_bliss_header_style

