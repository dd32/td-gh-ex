<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package ansia
 */
/**
 * Set up the WordPress core custom header feature.
 *
 * @uses ansia_header_style()
 */
function ansia_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ansia_custom_header_args', array(
		'default-text-color'     => 'ffffff',
		'default-image'          => get_template_directory_uri() . '/images/ansia-theme-header-example.jpg',
		'width'                  => 1920,
		'height'                 => 400,
		'flex-height'            => true,
		'flex-width'             => true,
		'wp-head-callback'       => 'ansia_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'ansia_custom_header_setup' );
if ( ! function_exists( 'ansia_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see ansia_custom_header_setup().
	 */
	function ansia_header_style() {
		$header_text_color = get_header_textcolor();
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
			.site-description:before,
			.site-description:after {
				background-color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;