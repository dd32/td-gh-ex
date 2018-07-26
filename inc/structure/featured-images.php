<?php
/**
 * Featured image elements.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'asagi_post_image' ) ) {
	add_action( 'asagi_after_entry_header', 'asagi_post_image' );
	/**
	 * Prints the Post Image to post excerpts
	 */
	function asagi_post_image() {
		// If there's no featured image, return.
		if ( ! has_post_thumbnail() ) {
			return;
		}

		// If we're not on any single post/page or the 404 template, we must be showing excerpts.
		if ( ! is_singular() && ! is_404() ) {
			echo apply_filters( 'asagi_featured_image_output', sprintf( // WPCS: XSS ok.
				'<div class="post-image">
					<a href="%1$s">
						%2$s
					</a>
				</div>',
				esc_url( get_permalink() ),
				get_the_post_thumbnail(
					get_the_ID(),
					apply_filters( 'asagi_page_header_default_size', 'full' ),
					array(
						'itemprop' => 'image',
					)
				)
			) );
		}
	}
}

if ( ! function_exists( 'asagi_featured_page_header_area' ) ) {
	/**
	 * Build the page header.
	 *
	 *
	 * @param string The featured image container class
	 */
	function asagi_featured_page_header_area( $class ) {
		// Don't run the function unless we're on a page it applies to.
		if ( ! is_singular() ) {
			return;
		}

		// Don't run the function unless we have a post thumbnail.
		if ( ! has_post_thumbnail() ) {
			return;
		}
		?>
		<div class="<?php echo esc_attr( $class ); ?> grid-container grid-parent">
			<?php the_post_thumbnail(
				apply_filters( 'asagi_page_header_default_size', 'full' ),
				array(
					'itemprop' => 'image',
				)
			); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'asagi_featured_page_header' ) ) {
	add_action( 'asagi_after_header', 'asagi_featured_page_header', 10 );
	/**
	 * Add page header above content.
	 *
	 */
	function asagi_featured_page_header() {
		if ( function_exists( 'asagi_page_header' ) ) {
			return;
		}

		if ( is_page() ) {
			asagi_featured_page_header_area( 'page-header-image' );
		} elseif ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
			$blog_header_image =  asagi_get_setting( 'blog_header_image' ); 
			if ($blog_header_image != '') { ?>
			<div class="page-header-image grid-container grid-parent">
				<img src="<?php echo esc_url($blog_header_image); ?>"  />
			</div>
			<?php
			}
		}
	}
}

if ( ! function_exists( 'asagi_featured_page_header_inside_single' ) ) {
	add_action( 'asagi_before_content', 'asagi_featured_page_header_inside_single', 10 );
	/**
	 * Add post header inside content.
	 * Only add to single post.
	 *
	 */
	function asagi_featured_page_header_inside_single() {
		if ( function_exists( 'asagi_page_header' ) ) {
			return;
		}

		if ( is_single() ) {
			asagi_featured_page_header_area( 'page-header-image-single' );
		}
	}
}
