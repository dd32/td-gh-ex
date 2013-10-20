<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="maincontainer">
 *
 * @subpackage Flat_Thirteen
 * @since WP FlatThirteen 1.3
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/respond.min.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<header id="masthead" class="site-header" role="banner">
		<div id="navbar" class="navbar navbar-fixed-top">
			<div class="navbar-header">				
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if(of_get_option('logo_uploader')=='') 
						echo bloginfo( 'name' );
					  else { ?>
						<img src="<?php echo of_get_option('logo_uploader'); ?>">	
					<?php } ?>
				</a>				
				</div>
				<nav id="site-navigation" class="navigation" role="navigation">
					<h3 class="menu-toggle"><?php _e( 'Menu', 'flatthirteen' ); ?></h3>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'flatthirteen' ); ?>"><?php _e( 'Skip to content', 'flatthirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					<?php if ( get_theme_mod( 'flatthirteen_menusearch_visibility' ) != 1 ) { ?>		
					<?php get_search_form(); ?>
					<?php } ?>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->			
		</header><!-- #masthead -->
		<div id="maincontainer" class="row">