<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Bayn Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bayn_lite_header_style()
 */
function bayn_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'bayn_lite_custom_header_args', array(
		'default-text-color' => 'fff',
		'width'              => 1920,
		'height'             => 500,
		'flex-width'         => true,
		'flex-height'        => true,
		'default-image'      => get_template_directory_uri() . '/images/header.jpg',
		'wp-head-callback'   => 'bayn_lite_header_style',
	) ) );
	register_default_headers( array(
		'work-space' => array(
			'url'           => '%s/images/header.jpg',
			'thumbnail_url' => '%s/images/header.jpg',
			'description'   => esc_html__( 'Work Space', 'bayn-lite' ),
		),
	) );
}

add_action( 'after_setup_theme', 'bayn_lite_custom_header_setup' );

if ( ! function_exists( 'bayn_lite_header_style' ) ) :
	/**
	 * Show the header image and optionally hide the site title, site description.
	 */
	function bayn_lite_header_style() {
		?>
		<style id="bayn-lite-header-css">
			<?php if ( has_header_image() ) : ?>
				.page-header {
					background: url(<?php echo esc_url( get_header_image() ); ?>) center no-repeat;
				}
			<?php endif; ?>
			<?php if ( ! display_header_text() ) : ?>
				.site-title,
				.site-description {
					clip: rect(1px, 1px, 1px, 1px);
					position: absolute;
				}
			<?php else : ?>
				.page-header .entry-title,
				.page-header a {
					color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
				}
			<?php endif; ?>
		</style>
		<?php
	}
endif;

/**
 * Use featured image for the header image on single post/page.
 *
 * @param string $image Header image URL.
 *
 * @return string
 */
function bayn_lite_header_image_singular( $image ) {
	/**
	 * Allow developers to bypass the featured image with filter.
	 *
	 * @param bool
	 */
	if ( false === apply_filters( 'bayn_lite_header_image_singular', true ) ) {
		return $image;
	}

	/**
	 * List of supported post types that use featured image for the header image.
	 */
	$post_types = array( 'post', 'page' );

	$post_types = apply_filters( 'bayn_lite_header_image_post_types', $post_types );
	if ( ! is_singular( $post_types ) || ! has_post_thumbnail() ) {
		return $image;
	}

	$thumbnail = get_the_post_thumbnail_url( null, 'full' );
	if ( $thumbnail ) {
		$image = $thumbnail;
	}

	return $image;
}

add_filter( 'theme_mod_header_image', 'bayn_lite_header_image_singular' );
