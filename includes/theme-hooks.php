<?php
/**
 * Functions hooked to custom hook.
 *
 * @package Best_Business
 */

if ( ! function_exists( 'best_business_skip_to_content' ) ) :

	/**
	 * Add skip to content.
	 *
	 * @since 1.0.0
	 */
	function best_business_skip_to_content() {
		?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'best-business' ); ?></a><?php
	}
endif;

add_action( 'best_business_action_before', 'best_business_skip_to_content', 15 );

if ( ! function_exists( 'best_business_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function best_business_site_branding() {

		$contact_number        	= best_business_get_option( 'contact_number' );
		$contact_email         	= best_business_get_option( 'contact_email' );
		$contact_addr         	= best_business_get_option( 'contact_address' );

		$contact_title        	= best_business_get_option( 'contact_number_title' );
		$email_title         	= best_business_get_option( 'contact_email_title' );
		$addr_title         	= best_business_get_option( 'contact_address_title' );
		?>
		<div class="site-branding">

			<?php best_business_the_custom_logo(); ?>

			<?php $show_title = best_business_get_option( 'show_title' ); ?>
			<?php $show_tagline = best_business_get_option( 'show_tagline' ); ?>

			<?php if ( true === $show_title || true === $show_tagline ) : ?>
				<div id="site-identity">
					<?php if ( true === $show_title ) : ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( true === $show_tagline ) : ?>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
				</div><!-- #site-identity -->
			<?php endif; ?>

		</div><!-- .site-branding -->
		<div class="right-head">
			<div id="quick-contact">
				<ul>
					<?php if ( ! empty( $contact_number ) ) : ?>
						<li class="quick-call">
							<?php if ( ! empty( $contact_title ) ) : ?>
								<strong><?php echo esc_html( $contact_title ); ?></strong>
							<?php endif; ?>
							<a href="?php echo esc_url( 'tel:' . preg_replace( '/\D+/', '', $contact_number ) ); ?>"><?php echo esc_html( $contact_number ); ?></a>
						</li>
					<?php endif; ?>

					<?php if ( ! empty( $contact_email ) ) : ?>
						<li class="quick-email">
						<?php if ( ! empty( $email_title ) ) : ?>
							<strong><?php echo esc_html( $email_title ); ?></strong>
						<?php endif; ?>
							<a href="<?php echo esc_url( 'mailto:' . $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a>
						</li>
					<?php endif; ?>

					<?php if ( ! empty( $contact_addr ) ) : ?>
						<li class="quick-address">
							<?php if ( ! empty( $addr_title ) ) : ?>
								<strong><?php echo esc_html( $addr_title ); ?></strong>
							<?php endif; ?>
								<?php echo esc_html( $contact_addr ); ?>
						</li>
					<?php endif; ?>

				</ul>
			</div><!--  .quick-contact -->

			<?php if ( best_business_woocommerce_status() ) : ?>
				<div class="cart-section">
					<div class="shopping-cart-views">
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-contents">
							<i class="fa fa-shopping-bag" aria-hidden="true"></i>
							<span class="cart-value"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
						</a>
					</div><!-- .shopping-cart-views -->
				 </div><!-- .cart-section -->
			<?php endif; ?>
		</div><!-- .right-head -->

	<?php
	}

endif;

add_action( 'best_business_action_header', 'best_business_site_branding' );

if ( ! function_exists( 'best_business_mobile_navigation' ) ) :

	/**
	 * Mobile navigation.
	 *
	 * @since 1.0.0
	 */
	function best_business_mobile_navigation() {
		?>
		<a id="mobile-trigger" href="#mob-menu"><i class="fa fa-bars"></i></a>
		<div id="mob-menu">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => '',
				'fallback_cb'    => 'best_business_primary_navigation_fallback',
			) );
			?>
		</div>
		<?php
	}

endif;

add_action( 'best_business_action_before', 'best_business_mobile_navigation', 20 );

if ( ! function_exists( 'best_business_footer_copyright' ) ) :

	/**
	 * Footer copyright.
	 *
	 * @since 1.0.0
	 */
	function best_business_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'best_business_filter_footer_status', true );

		if ( true !== $footer_status ) {
			return;
		}

		// Copyright text.
		$copyright_text = best_business_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'best_business_filter_copyright_text', $copyright_text );
		?>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<?php
			$footer_menu_content = wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => 'div',
				'container_id'   => 'footer-navigation',
				'depth'          => 1,
				'fallback_cb'    => false,
			) );
			?>
		<?php endif; ?>
		<?php if ( ! empty( $copyright_text ) ) : ?>
			<div class="copyright">
				<?php echo wp_kses_post( $copyright_text ); ?>
			</div>
		<?php endif; ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'best-business' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'best-business' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( '%1$s by %2$s', 'best-business' ), 'Best Business', '<a href="http://axlethemes.com">Axle Themes</a>' ); ?>
		</div>
		<?php
	}

endif;

add_action( 'best_business_action_footer', 'best_business_footer_copyright', 10 );

if ( ! function_exists( 'best_business_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function best_business_add_sidebar() {

		global $post;

		$global_layout = best_business_get_option( 'global_layout' );
		$global_layout = apply_filters( 'best_business_filter_theme_global_layout', $global_layout );

		// Check if single template.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'best_business_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

		// Include secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
				get_sidebar( 'secondary' );
				break;

			default:
				break;
		}

	}

endif;

add_action( 'best_business_action_sidebar', 'best_business_add_sidebar' );

if ( ! function_exists( 'best_business_custom_posts_navigation' ) ) :

	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function best_business_custom_posts_navigation() {

		the_posts_pagination();

	}

endif;

add_action( 'best_business_action_posts_navigation', 'best_business_custom_posts_navigation' );

if ( ! function_exists( 'best_business_add_image_in_single_display' ) ) :

	/**
	 * Add image in single template.
	 *
	 * @since 1.0.0
	 */
	function best_business_add_image_in_single_display() {

		if ( has_post_thumbnail() ) {

			$args = array(
				'class' => 'best-business-post-thumb aligncenter',
			);

			the_post_thumbnail( 'large', $args );
		}

	}

endif;

add_action( 'best_business_single_image', 'best_business_add_image_in_single_display' );

if ( ! function_exists( 'best_business_add_custom_header' ) ) :

	/**
	 * Add custom header.
	 *
	 * @since 1.0.0
	 */
	function best_business_add_custom_header() {

		if ( ( is_front_page() && ! is_home() ) ) {
			return;
		}
		?>
		<div id="custom-header">
			<img src="<?php header_image(); ?>">
			<div class="custom-header-wrapper">
				<div class="container">
					<?php do_action( 'best_business_action_custom_header_title' ); ?>
				</div><!-- .custom-header-content -->
				<?php do_action( 'best_business_add_breadcrumb' ); ?>
			</div><!-- .container -->
		</div><!-- #custom-header -->
		<?php
	}

endif;

add_action( 'best_business_action_before_content', 'best_business_add_custom_header', 6 );

if ( ! function_exists( 'best_business_add_title_in_custom_header' ) ) :

	/**
	 * Add title in custom header.
	 *
	 * @since 1.0.0
	 */
	function best_business_add_title_in_custom_header() {

		echo '<h1 class="page-title">';

		if ( is_home() ) {
			echo esc_html( best_business_get_option( 'blog_page_title' ) );
		} elseif ( is_singular() ) {
			echo single_post_title( '', false );
		} elseif ( is_archive() ) {
			the_archive_title();
		} elseif ( is_search() ) {
			printf( esc_html__( 'Search Results for: %s', 'best-business' ),  get_search_query() );
		} elseif ( is_404() ) {
			esc_html_e( '404 Error', 'best-business' );
		}

		echo '</h1>';

	}

endif;

add_action( 'best_business_action_custom_header_title', 'best_business_add_title_in_custom_header' );

if ( ! function_exists( 'best_business_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function best_business_add_breadcrumb() {

		// Bail if home page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo'<div id="breadcrumb">';
		best_business_breadcrumb();
		echo '</div>';

	}

endif;

add_action( 'best_business_add_breadcrumb', 'best_business_add_breadcrumb', 10 );

if ( ! function_exists( 'best_business_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function best_business_footer_goto_top() {
		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"></i></a>';
	}

endif;

add_action( 'best_business_action_after', 'best_business_footer_goto_top', 20 );

if ( ! function_exists( 'best_business_add_front_page_widget_area' ) ) :

	/**
	 * Add front page widget area.
	 *
	 * @since 1.0.0
	 */
	function best_business_add_front_page_widget_area() {

		if ( is_front_page() && ! is_home() && is_active_sidebar( 'sidebar-front-page-widget-area' ) ) {
			echo '<div id="sidebar-front-page-widget-area" class="widget-area">';
			dynamic_sidebar( 'sidebar-front-page-widget-area' );
			echo '</div><!-- #sidebar-front-page-widget-area -->';
		}

	}

endif;

add_action( 'best_business_action_before_content', 'best_business_add_front_page_widget_area', 7 );

if ( ! function_exists( 'best_business_add_footer_widgets' ) ) :

	/**
	 * Add footer widgets.
	 *
	 * @since 1.0.0
	 */
	function best_business_add_footer_widgets() {

		get_template_part( 'template-parts/footer-widgets' );

	}

endif;

add_action( 'best_business_action_before_footer', 'best_business_add_footer_widgets', 5 );

if ( ! function_exists( 'best_business_add_top_head_content' ) ) :

	/**
	 * Add top head section.
	 *
	 * @since 1.0.0
	 */
	function best_business_add_top_head_content() {
		$contact_number        = best_business_get_option( 'contact_number' );
		$contact_email         = best_business_get_option( 'contact_email' );
		$show_social_in_header = best_business_get_option( 'show_social_in_header' );

		if ( empty( $contact_number ) && empty( $contact_email ) ) {
			$contact_status = false;
		} else {
			$contact_status = true;
		}

		if ( false === has_nav_menu( 'top' ) && ( false === best_business_get_option( 'show_social_in_header' ) || false === has_nav_menu( 'social' ) ) ) {
			return;
		}
		?>
		<div id="tophead">
			<div class="container">
				<nav id="header-nav" class="menu-top-menu-container">
					<?php
						wp_nav_menu(
							array(
							'theme_location' => 'top',
							'menu_class'        => 'menu',
							'fallback_cb'    => 'best_business_primary_navigation_fallback',
							)
						);
					?>
				</nav>
				<?php if ( true === $show_social_in_header && has_nav_menu( 'social' ) ) : ?>
					<div id="header-social">
						<?php the_widget( 'Best_Business_Social_Widget' ); ?>
					</div><!-- .header-social -->
				<?php endif; ?>

			</div><!-- .container -->
		</div><!-- #tophead -->
		<?php
	}

endif;

add_action( 'best_business_action_before_header', 'best_business_add_top_head_content', 5 );
