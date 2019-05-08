<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Academic_Hub
 */

?>
<!doctype html>
<?php academic_hub_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
	<?php academic_hub_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php academic_hub_head_bottom(); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php academic_hub_body_top(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html__( 'Skip to content', 'academic-hub' ); ?></a>

	<?php $academic_hub_header_image = esc_url( get_header_image()); ?>

	<div class="header-bottom">
			<div class="academic-hub-container">

				<div class="logo">
					<?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
					<figure class="logo-image">
						<?php the_custom_logo(); ?>
					</figure>
					<?php endif; ?>

					<div class="logo-text site-branding">
						<?php
						if ( ( is_front_page() && is_home() ) || ( is_front_page() && !is_home() ) ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div>
				</div>
				<div class="site-navigation-wrapper">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<div class="menu-toggle">
							<i class="fa fa-bars"></i>
						</div>
						<?php
							wp_nav_menu( array(
							'theme_location' 	=> 'menu-1',
							'menu_id'        	=> 'menu-1',
						) );
						
						?>
					</nav><!-- #site-navigation -->

					<?php $logo_position = get_theme_mod( 'academic_hub_logo_position', 'left-logo-right-menu' ); ?>

					<?php if ( $logo_position == 'center-logo-below-menu' ): ?>
						<div class="header-action-container">

							<?php if( ( get_theme_mod( 'academic_hub_header_cart', '' ) !=  '1' ) && class_exists( 'WooCommerce' ) ) :
							$cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url();
							?>

							<div class="cart-wrap">
								<div class="academic-hub-cart-views">
									<a href="<?php echo esc_url( $cart_url ); ?>" class="wcmenucart-contents">
										<i class="fa fa-opencart"></i>
										<span class="cart-value"><?php echo wp_kses_data ( WC()->cart->get_cart_contents_count() ); ?></span>
									</a>
								</div>
								<?php the_widget( 'WC_Widget_Cart', '' ); ?>
							</div>
							<?php endif; ?>

							<?php if( get_theme_mod( 'academic_hub_header_search', '' ) !=  '1' ) : ?>
							<div class="search-wrap">
								<div class="search-icon">
									<i class="fa fa-search"></i>
								</div>
								<div class="search-box">
									<?php get_search_form(); ?>
								</div>
							</div>
							<?php endif; ?>
						</div>
					<?php endif ?>
				</div>

				<div class="header-action-container">
					<?php if( ( get_theme_mod( 'academic_hub_header_cart', '' ) !=  '1' ) && class_exists( 'WooCommerce' ) ) : ?>
					<div class="cart-wrap">
						<div class="academic-hub-cart-views">

							<?php $cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url(); ?>

							<a href="<?php echo esc_url( $cart_url ); ?>" class="wcmenucart-contents">
								<i class="fa fa-opencart"></i>
								<span class="cart-value"><?php echo wp_kses_data ( WC()->cart->get_cart_contents_count() ); ?></span>
							</a>
						</div>
						<?php the_widget( 'WC_Widget_Cart', '' ); ?>
					</div>
					<?php endif; ?>

					<?php if( get_theme_mod( 'academic_hub_header_search', '' ) !=  '1' ) : ?>
					<div class="search-wrap">
						<div class="search-icon">
							<i class="fa fa-search"></i>
						</div>
						<div class="search-box">
							<?php get_search_form(); ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->


	<?php academic_hub_content_before(); ?>
	<div id="content" class="site-content">
