<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Accent
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'accent' ); ?></a>

	<header id="masthead" class="site-header" role="banner" >
		<div class="header-image" style="background: url(<?php if (get_header_image() != '') : ?><?php header_image(); ?><?php else : ?><?php echo get_template_directory_uri() . '/images/header.jpg'; ?><?php endif; ?>); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
			<div class="mobile-search">
				<?php get_search_form(); ?>
				<i class="fa fa-2x fa-times mobile-search-close"></i>
			</div>
			<div class="site-branding inner-wrapper">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php if ( get_theme_mod( 'logo' ) ) {
						echo '<img src="' . get_theme_mod( 'logo' ) . '" alt="' . get_bloginfo( 'name' ) . '" />';
					} else { ?>
						<?php bloginfo( 'name' ); ?>
					<?php } ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</div><!-- .header-image -->
		<div class="inner-wrapper">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"></button>
				<a class="search-button" href="#"><i class="fa-lg fa fa-search"></i></a>
				<div class="clear clear-mobile-menu"></div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content inner-wrapper">
