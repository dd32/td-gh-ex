<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package appsetter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?></head>

<body <?php body_class(); ?>>
							<?php 
								$appsetter_show_desc = get_theme_mod('appsetter_show_desc');
							?>
<div canvas="container">

	<div id="page" class="site">
			
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'appsetter' ); ?></a>

			<header id="masthead" class="site-header" role="banner">
				<div class="headerbg">		
				<div class="row">

					<div class="col-md-6">
						<div class="site-branding">
							<i class="menu-toggle fa fa-bars"></i>
							
							<?php
								if ( is_front_page() && is_home() ) : 
									if ( function_exists( 'the_custom_logo' ) ) {
										the_custom_logo();
									}
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php if ($appsetter_show_desc == 1) { ?><p class="site-desc"><?php bloginfo( 'description' ); ?></p><?php } ?>
							<?php else : 
									if ( function_exists( 'the_custom_logo' ) ) {
										the_custom_logo();
									}
								?>
								<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
								<?php if ($appsetter_show_desc == 1) { ?><p class="site-desc"><?php bloginfo( 'description' ); ?></p><?php } ?>
							<?php
								endif;
							?>
						</div><!-- .site-branding -->
					</div>

					<div class="col-md-6">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</nav><!-- #site-navigation -->
					</div>

				</div>

			</header><!-- #masthead -->

		</div>

		<div id="content" class="site-content">

