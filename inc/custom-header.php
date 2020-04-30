<?php
/**
* custom-header.php
*
* @author    Franchi Design
* @package   Atomy

	<?php the_header_image_tag(); ?>
 */


function atomy_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'atomy_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'atomy_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'atomy_custom_header_setup' );

if ( ! function_exists( 'atomy_header_style' ) ) :

	function atomy_header_style() {
		$header_text_color = get_header_textcolor();

		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

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
