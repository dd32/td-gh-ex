<?php
/**
* The Header for our theme.
*
* Displays all of the <head> section
*
* @package beam
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

	<?php 
	$opt_custom_style = get_theme_mod( 'opt_custom_style', '' );
		if( $opt_custom_style != '' ) { 
	?>
	<style type="text/css">
	<?php
	//$opt_custom_style = Kirki::get_option( 'bo', 'opt_custom_style' );
	echo $opt_custom_style, PHP_EOL;
	?>
	</style>
	<?php } ?>

	</head>

	<body <?php body_class(); ?>> 

	<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

	<header id="masthead" class="site-header">
	<div class="centeralign-header">
	<div class="site-branding">

	<?php 
	$opt_logo = get_theme_mod( 'opt_logo', '' );
		if( $opt_logo != '' ) { 
	?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo $opt_logo; ?>" class="logo" alt="<?php echo get_bloginfo( 'name' );?>" /></a>
	<?php } else { ?>

	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	<?php } ?>
	</div>

	<?php 
	$opt_menu_visibility = get_theme_mod( 'opt_menu_visibility', 'option-1' );
	if ($opt_menu_visibility == 'option-1') {
	?>

	<div class="navigation-wrap">
	<nav id="site-navigation" class="main-navigation">
	<h1 class="menu-toggle button"><i class="fa fa-bars  icon-2x"></i> <?php //_e( 'Menu', 'beam' ); ?></h1>
	<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'beam' ); ?>"><?php _e( 'Skip to content', 'beam' ); ?></a></div>
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav><!-- #site-navigation -->
	</div>
	<?php	
	}
	?>

	</div><!-- centeralign-header -->
	</header><!-- #header-->