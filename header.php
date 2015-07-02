<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package AccessPress Store
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'accesspress-store' ); ?></a>
		<header id="masthead" class="site-header" role="banner">
			<?php if(as_before_top_header_enabled()):?>
				<div class="before-top-header">
					<div class="ak-container clearfix">
						<div class="login-woocommerce">
							<?php 
							if(is_user_logged_in()){ 
								global $current_user;
								get_currentuserinfo();
								?>
								<div class="welcome-user">
									<?php _e('Welcome ', 'accesspress-store');?>
									<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="my-account">
										<span class="user-name">
											<?php echo $current_user->display_name; ?>
										</span>
									</a>
									<?php _e('!', 'accesspress-store');?>
								</div>
								<?php 
							}?>
						</div>
						<?php accesspress_ticker_header_customizer(); ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="top-header clearfix">
				<div class="ak-container clearfix">
					<?php if(is_active_sidebar('header-callto-action')): ?>
						<div class="header-callto">
							<?php dynamic_sidebar('header-callto-action') ?>
						</div>
					<?php endif; ?>
					
					<!-- Cart Link -->
					<?php 
					if(is_woocommerce_activated()):
						echo accesspress_wcmenucart();
					endif;
					?>
					<?php
					if( function_exists( 'YITH_WCWL' ) ){
						$wishlist_url = YITH_WCWL()->get_wishlist_url();
						?>
						<a class="quick-wishlist" href="<?php echo $wishlist_url;?>" title="Wishlist">
							<i class="fa fa-heart"></i>
							<?php echo "(".yith_wcwl_count_products().")";?>
						</a>
						<?php
					}
					?>
					<div class="login-woocommerce">
						<?php 
						if(is_user_logged_in()){ 
							global $current_user;
							get_currentuserinfo();
							?>
							
							<a href="<?php echo wp_logout_url(); ?>" class="logout">
								<?php _e(' LogOut', 'accesspress-store'); ?>
							</a>
							<?php
						} else{
							?>
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="account">
								<?php _e('LogIn',  'accesspress-store'); ?>
							</a>
							<?php
						} ?>
					</div>

					<!-- if enabled from customizer -->
					<?php if(!get_theme_mod('hide_header_product_search')){ ?>
					<div class="search-form">
						<?php get_search_form(); ?>
					</div>
					<?php } ?>
				</div>
			</div>

			<div class="ak-container clearfix">
				<div id="site-branding" class="clearfix">
					<?php accesspress_store_admin_header_image() ?>
				</div><!-- .site-branding -->
				<div class="right-header clearfix">
					<!-- if enabled from customizer -->
					<?php if(is_page('checkout') && get_theme_mod('hide_navigation_checkout')){}else{ ?>
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<a class="menu-toggle">
							<?php _e( 'Menu', 'accesspress-store' ); ?>
						</a>
						<?php 
						wp_nav_menu(array( 
							'theme_location' => 'primary',
							'container_class' => 'store-menu',
							'fallback_cb'     => 'custom_fallback_menu',
							)
						); 
						?>
					</nav><!-- #site-navigation -->
					<?php } ?>
				</div> <!-- right-header -->
			</div>
		</header><!-- #masthead -->
		<div id="content" class="site-content">