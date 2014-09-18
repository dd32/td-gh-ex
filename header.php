<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package BOXY
 */
global $boxy;
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
	<?php do_action( 'before' ); ?>
	<?php if( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" style="position: absolute;" />
	<?php endif; ?>
	<header id="masthead" class="site-header header-wrap" role="banner">
		<div class="container">
			<div class="row">
				<div class="span6">
					<div class="logo site-branding">
						<?php if( isset( $boxy['site-title'] ) && isset( $boxy['custom-logo'] ) && $boxy['site-title'] ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $boxy['custom-logo']['url']; ?>" alt="logo" ></a></h1>
						<?php else : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>
						<?php if( isset( $boxy['site-description'] ) && $boxy['site-description'] != 0 ) : ?>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif; ?>
					</div>
				</div>

				<div class="span6">
					<div class="top-right">
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<div class="nav-wrap">
		<div class="container">
			<div class="row">
				<nav id="site-navigation" class="main-navigation span12" role="navigation">
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'boxy' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</div>	
<?php	if (! is_front_page() ) : ?>
	<div id="content" class="site-content container">
<?php endif; ?>