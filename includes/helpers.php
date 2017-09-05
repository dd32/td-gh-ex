<?php
/**
 * Helper functions.
 *
 * @package Best_Commerce
 */

if ( ! function_exists( 'best_commerce_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_commerce_get_global_layout_options() {
		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'best-commerce' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'best-commerce' ),
			'three-columns' => esc_html__( 'Three Columns', 'best-commerce' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'best-commerce' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_commerce_get_category_menu_type_options' ) ) :

	/**
	 * Returns category menu type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_commerce_get_category_menu_type_options() {
		$choices = array(
			'category'    => esc_html__( 'Post Categories', 'best-commerce' ),
			'product_cat' => esc_html__( 'Product Categories', 'best-commerce' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_commerce_get_carousel_status_options' ) ) :

	/**
	 * Returns carousel status options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_commerce_get_carousel_status_options() {
		$choices = array(
			'static-front-page' => esc_html__( 'Static Front Page', 'best-commerce' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_commerce_get_featured_carousel_type' ) ) :

	/**
	 * Returns the featured carousel type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_commerce_get_featured_carousel_type() {
		$choices = array(
			'featured-category'         => esc_html__( 'Post Category', 'best-commerce' ),
			'featured-product-category' => esc_html__( 'Product Category', 'best-commerce' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_commerce_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_commerce_get_archive_layout_options() {
		$choices = array(
			'full'    => esc_html__( 'Full Post', 'best-commerce' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'best-commerce' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_commerce_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable    True for adding No Image option.
	 * @param array $allowed        Allowed image size options.
	 * @param bool  $show_dimension True for showing dimension.
	 * @return array Image size options.
	 */
	function best_commerce_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;

		$choices = array();

		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'best-commerce' );
		}

		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'best-commerce' );
		$choices['medium']    = esc_html__( 'Medium', 'best-commerce' );
		$choices['large']     = esc_html__( 'Large', 'best-commerce' );
		$choices['full']      = esc_html__( 'Full (original)', 'best-commerce' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ) {
					$choices[ $key ] .= ' (' . $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed, true ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;

if ( ! function_exists( 'best_commerce_get_image_alignment_options' ) ) :

	/**
	 * Returns image alignment options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_commerce_get_image_alignment_options() {
		$choices = array(
			'none'   => esc_html_x( 'None', 'alignment', 'best-commerce' ),
			'left'   => esc_html_x( 'Left', 'alignment', 'best-commerce' ),
			'center' => esc_html_x( 'Center', 'alignment', 'best-commerce' ),
			'right'  => esc_html_x( 'Right', 'alignment', 'best-commerce' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_commerce_get_featured_carousel_widget_alignment' ) ) :

	/**
	 * Returns featured carousel widget alignment options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_commerce_get_featured_carousel_widget_alignment() {
		$choices = array(
			'left'  => esc_html_x( 'Left', 'alignment', 'best-commerce' ),
			'right' => esc_html_x( 'Right', 'alignment', 'best-commerce' ),
		);
		return $choices;
	}

endif;
