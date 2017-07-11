<?php
/**
 * Add WooCommerce support.
 *
 * @package Best_Business
 */

if ( ! function_exists( 'best_business_add_woocommerce_support' ) ) :

	/**
	 * Register WooCommerce support.
	 *
	 * @since 1.0.5
	 */
	function best_business_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
	}
endif;

add_action( 'after_setup_theme', 'best_business_add_woocommerce_support' );

if ( ! function_exists( 'best_business_start_woocommerce_wrapper' ) ) :

	/**
	 * Start WooCommerce wrapper.
	 *
	 * @since 1.0.5
	 */
	function best_business_start_woocommerce_wrapper() {
		echo '<div id="primary">';
		echo '<main role="main" class="site-main" id="main">';
	}
endif;

if ( ! function_exists( 'best_business_end_woocommerce_wrapper_end' ) ) :

	/**
	 * End WooCommerce wrapper.
	 *
	 * @since 1.0.5
	 */
	function best_business_end_woocommerce_wrapper_end() {
		echo '</main><!-- #main -->';
		echo '</div><!-- #primary -->';
	}
endif;

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'best_business_start_woocommerce_wrapper', 10 );
add_action( 'woocommerce_after_main_content', 'best_business_end_woocommerce_wrapper_end', 10 );

if ( ! function_exists( 'best_business_customize_woocommerce_breadcrumb' ) ) :

	/**
	 * Customize WooCommerce breadcrumb.
	 *
	 * @since 1.0.5
	 *
	 * @param array $defaults Breadcrumb defaults array.
	 * @return array Customized breadcrumb defaults array.
	 */
	function best_business_customize_woocommerce_breadcrumb( $defaults ) {

		$defaults['delimiter']   = '';
		$defaults['before']      = '<li>';
		$defaults['after']       = '</li>';
		$defaults['wrap_before'] = '<div id="breadcrumb" itemprop="breadcrumb"><div class="container"><div class="woo-breadcrumbs breadcrumbs"><ul>';
		$defaults['wrap_after']  = '</ul></div></div></div>';

		return $defaults;

	}
endif;

add_filter( 'woocommerce_breadcrumb_defaults', 'best_business_customize_woocommerce_breadcrumb' );

if ( ! function_exists( 'best_business_customize_woocommerce_hooks' ) ) :

	/**
	 * Customize WooCommerce hooks.
	 *
	 * @since 1.0.5
	 */
	function best_business_customize_woocommerce_hooks() {

		// Breadcrumbs.
		if ( is_woocommerce() || is_product_category() || is_product_tag() ) {
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
			add_action( 'best_business_add_breadcrumb', 'woocommerce_breadcrumb', 7 );
			remove_action( 'best_business_add_breadcrumb', 'best_business_add_breadcrumb', 10 );
		}

		// Sidebar.
		$global_layout = best_business_get_option( 'global_layout' );
		$global_layout = apply_filters( 'best_business_filter_theme_global_layout', $global_layout );

		if ( 'no-sidebar' === $global_layout ) {
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		}
	}
endif;

add_action( 'wp', 'best_business_customize_woocommerce_hooks' );

if ( ! function_exists( 'best_business_woocommerce_add_secondary_sidebar' ) ) :

	/**
	 * Add secondary sidebar.
	 *
	 * @since 1.0.5
	 */
	function best_business_woocommerce_add_secondary_sidebar() {
		$global_layout = best_business_get_option( 'global_layout' );
		$global_layout = apply_filters( 'best_business_filter_theme_global_layout', $global_layout );

		if ( 'three-columns' === $global_layout ) {
			get_sidebar( 'secondary' );
		}
	}
endif;

add_action( 'woocommerce_sidebar', 'best_business_woocommerce_add_secondary_sidebar', 11 );

if ( ! function_exists( 'best_business_woocommerce_fix_global_layout' ) ) :

	/**
	 * Fix global layout.
	 *
	 * @since 1.0.5
	 *
	 * @param array $layout Layout.
	 * @return array Customized layout.
	 */
	function best_business_woocommerce_fix_global_layout( $layout ) {

		if ( is_shop() ) {
			$shop_page_id = get_option( 'woocommerce_shop_page_id' );
			if ( $shop_page_id ) {
				$post_options = get_post_meta( $shop_page_id, 'best_business_settings', true );
				$global_layout = '';

				if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
					$global_layout = $post_options['post_layout'];
				}

				if ( $global_layout ) {
					$layout = esc_attr( $global_layout );
				}
			}
		}

		return $layout;
	}
endif;

add_filter( 'best_business_filter_theme_global_layout', 'best_business_woocommerce_fix_global_layout', 15 );
