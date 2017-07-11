<?php
/**
 * Theme functions related to structure.
 *
 * @package Best_Business
 */

if ( ! function_exists( 'best_business_doctype' ) ) :

	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function best_business_doctype() {
		?><!DOCTYPE html><html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'best_business_action_doctype', 'best_business_doctype', 10 );

if ( ! function_exists( 'best_business_head' ) ) :

	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function best_business_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open() ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;

add_action( 'best_business_action_head', 'best_business_head', 10 );

if ( ! function_exists( 'best_business_page_start' ) ) :

	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function best_business_page_start() {
		?><div id="page" class="hfeed site"><?php
	}
endif;

add_action( 'best_business_action_before', 'best_business_page_start' );

if ( ! function_exists( 'best_business_page_end' ) ) :

	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function best_business_page_end() {
		?></div><!-- #page --><?php
	}
endif;

add_action( 'best_business_action_after', 'best_business_page_end' );

if ( ! function_exists( 'best_business_content_start' ) ) :

	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function best_business_content_start() {
		?><div id="content" class="site-content"><div class="container"><div class="inner-wrapper"><?php
	}
endif;

add_action( 'best_business_action_before_content', 'best_business_content_start' );

if ( ! function_exists( 'best_business_content_end' ) ) :

	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function best_business_content_end() {
		?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php
	}
endif;

add_action( 'best_business_action_after_content', 'best_business_content_end' );

if ( ! function_exists( 'best_business_header_start' ) ) :

	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function best_business_header_start() {
		?><header id="masthead" class="site-header" role="banner"><div class="container"><?php
	}
endif;

add_action( 'best_business_action_before_header', 'best_business_header_start' );

if ( ! function_exists( 'best_business_header_end' ) ) :

	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function best_business_header_end() {
		?></div><!-- .container --></header>		
		<div id="main-nav" class="clear-fix">
			<div class="container">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="wrap-menu-content">
					<?php
					wp_nav_menu(
						array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => 'best_business_primary_navigation_fallback',
						)
					);
					?>
				</div><!-- .wrap-menu-content -->
			</nav><!-- #site-navigation -->
			<?php
			$show_search_in_header = best_business_get_option( 'show_search_in_header' );
			if ( true === $show_search_in_header ) : ?>
				<div class="header-search-box">
					<a href="#" class="search-icon"><i class="fa fa-search"></i></a>
					<div class="search-box-wrap">
						<?php get_search_form(); ?>
					</div>
				</div><!-- .header-search-box -->
			<?php endif; ?>
			</div> <!-- .container -->
		</div><!-- #main-nav --><!-- #masthead --><?php
	}
endif;

add_action( 'best_business_action_after_header', 'best_business_header_end' );

if ( ! function_exists( 'best_business_footer_start' ) ) :

	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function best_business_footer_start() {
		$footer_status = apply_filters( 'best_business_filter_footer_status', true );

		if ( true !== $footer_status ) {
			return;
		}

		?><footer id="colophon" class="site-footer" role="contentinfo"><div class="container"><?php
	}
endif;

add_action( 'best_business_action_before_footer', 'best_business_footer_start' );

if ( ! function_exists( 'best_business_footer_end' ) ) :

	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function best_business_footer_end() {
		$footer_status = apply_filters( 'best_business_filter_footer_status', true );

		if ( true !== $footer_status ) {
			return;
		}

		?></div><!-- .container --></footer><!-- #colophon --><?php
	}
endif;

add_action( 'best_business_action_after_footer', 'best_business_footer_end' );
