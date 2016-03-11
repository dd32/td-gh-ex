<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]><script src="<?php echo ABC_THEME_URL; ?>/js/html5.js"></script><![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page">
		<header id="masthead" role="banner">
			<nav class="top-navigation menus" role="navigation">
				<div class="container">
					<ul class="pull-left">
        				<?php
						$login_url = wp_login_url( get_permalink() );
						if ( class_exists( 'woocommerce' ) ) {
							$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
							if ( $myaccount_page_id ) {
								$login_url = get_permalink( $myaccount_page_id );
							}
						}

	        			if ( is_user_logged_in() ) {
        					$current_user = wp_get_current_user();
        					?>
							<li><p>Welcome, <em><?php echo $current_user->display_name; ?></em></p></li>
							<li><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e( 'Logout', 'abacus' ); ?>"><?php _e( 'Logout', 'abacus' ); ?></a></li>
						<?php } else {
							$login_text = ( get_option( 'users_can_register' ) || 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) ? __( 'Login <span>or</span> Register', 'abacus' ) : __( 'Login', 'abacus' );
							?>
							<li><a href="<?php echo esc_url( $login_url ); ?>" title="<?php echo $login_text; ?>"><?php echo $login_text; ?></a></li>
						<?php } ?>
					</ul>
					<?php
					if ( class_exists( 'woocommerce' ) ) {
						$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
						?>
						<ul class="pull-right">
							<?php
							if ( has_nav_menu( 'top' ) ) {
								wp_nav_menu( array( 'theme_location' => 'top', 'items_wrap' => '%3$s', 'container' => '' ) );
							}
							?>
							<li><a href="<?php echo esc_url( $shop_page_url ); ?>"><?php _e( 'Shop', 'abacus' ); ?></a></li>
							<?php if ( $myaccount_page_id && is_user_logged_in() ) { ?>
								<li><a href="<?php echo esc_url( get_permalink( $myaccount_page_id ) ); ?>"><?php _e( 'My Account', 'abacus' ); ?></a></li>
							<?php } ?>
							<?php //abc_cart_link(); ?>
						</ul>
						<?php
					}
					?>

					<?php
					if ( has_nav_menu( 'social' ) ) {
						wp_nav_menu( array( 'theme_location' => 'social', 'container' => 'div', 'container_id' => 'menu-social', 'container_class' => 'menu', 'menu_id' => 'menu-social-items', 'menu_class' => 'menu-items', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'fallback_cb' => '' ) );
					}
					?>
				</div>
			</nav>

			<div class="container">
				<div class="site-meta">
					<?php
					$tag = ( is_front_page() && is_home() ) ? 'h1' : 'div';
					$icon = get_site_icon_url( '50' );
					$icon_class = ( $icon ) ? ' with-icon' : '';
					?>
					<<?php echo $tag; ?> class="site-title<?php echo $icon_class; ?>">
						<?php
						if ( $icon ) {
							echo '<img class="site-icon" src="' . esc_url( $icon ) . '" alt="" />';
						}
						?>
						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</<?php echo $tag; ?>>

					<div class="site-description"><?php bloginfo( 'description' ); ?></div>
				</div>

				<?php if ( has_nav_menu( 'primary' ) ) { ?>
				<nav class="main-navigation menus" role="navigation">
					<h3 class="screen-reader-text"><?php _e( 'Main menu', 'abacus' ); ?></h3>
					<ul class="primary-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'container' => '' ) ); ?>
					</ul>
				</nav>
				<?php }	?>

				<nav class="nav-icons menus" role="navigation">
					<ul>
						<li class="nav-open-top-menu"><i class="fa fa-bars"></i><span><?php _e( 'Menu', 'abacus' ); ?></span></li>
						<li class="nav-search"><i class="fa fa-search"></i></li>
						<?php
						global $woocommerce;
						if ( ! empty( $woocommerce ) ) {
						?>
						<li class="nav-cart"><a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="cart-button-mobile"><i class="fa fa-shopping-cart"></i></a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>

			<div class="search-bar">
				<div class="container">
					<?php get_search_form(); ?>
				</div>
			</div>
		</header>

		<main id="content" class="site-content">
			<a class="screen-reader-text" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'abacus' ); ?>"><?php _e( 'Skip to content', 'abacus' ); ?></a>