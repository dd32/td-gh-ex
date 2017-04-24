<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package basicstore
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'basicstore' ); ?></a>

	<header id="site-header">

		<nav class="navbar navbar-default navbar-fixed-top">

			<div class="container">

				<div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"><?php _e( 'Toggle navigation', 'basicstore' ); ?></span>
            <span class="icon-bar <?php echo navbar_toggle_check_cart_items(); ?>"></span>
            <span class="icon-bar <?php echo navbar_toggle_check_cart_items(); ?>"></span>
            <span class="icon-bar <?php echo navbar_toggle_check_cart_items(); ?>"></span>
          </button>

					<?php	if (get_theme_mod('custom_logo') === "" || get_theme_mod('custom_logo') === false ) : ?>
          	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
					<?php else: ?>
						<a class="navbar-brand nav-brand-img" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		          <img src='<?php echo esc_url( display_site_logo() ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
						</a>
					<?php endif; ?>

        </div><!-- #navbar-header -->

				<div id="navbar" class="collapse navbar-collapse">

					<?php
						wp_nav_menu( array(
							'theme_location'    => 'primary-left',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker())
						);
		      ?>

					<form role="search" method="get" class="woocommerce-product-search search-form navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>">

						<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
						<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field form-control" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

						<button class="btn btn-link" type="submit" aria-label="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" title="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>">
					     <i class="glyphicon glyphicon-search"></i>
					  </button>
						<input type="hidden" name="post_type" value="product" />

					</form>

					<?php
						wp_nav_menu( array(
							'theme_location'    => 'primary-right',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'nav navbar-nav navbar-right',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker())
						);
		      ?>

				</div><!-- #navbar -->

			</div><!-- .container -->

		</nav><!-- .navbar -->

	</header><!-- #site-header -->

	<section id="site-content" class="site-content">

		<?php if ( get_post_meta(get_the_ID(),'jumbotron-title',true) || get_post_meta(get_the_ID(),'jumbotron-subtitle',true ) ) : ?>
		<div id="site-jumbotron" class="jumbotron text-center">

			<div class="container">

				<h1><?php echo get_post_meta(get_the_ID(),'jumbotron-title',true);?></h1>
				<p><?php echo get_post_meta(get_the_ID(),'jumbotron-subtitle',true);?></p>

			</div><!-- .container -->

		</div><!-- #site-jumbotron -->
		<?php endif; ?>

		<div class="container">

			<div class="row">
