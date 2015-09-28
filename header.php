<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bhost
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- .container is main centered wrapper -->
<div class="container">
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bhost' ); ?></a>

		<div class="row">
			<header id="masthead" class="site-header twelve columns" role="banner">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php bloginfo( 'description'); ?></p>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation hvr-bounce-to-bottom hvr-bounce-to-right" role="navigation">
					<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'bhost' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'bhost_default_menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		</div>
		
	<div class="row">
		<div id="content" class="site-content">
