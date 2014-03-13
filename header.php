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
	<link rel="shortcut icon" href="<?php echo of_get_option('fav_uploader'); ?>"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<?php if( get_header_image() != '' ) : ?>
		<div id="headerimage">
		<img src="<?php header_image(); ?>"   alt="<?php bloginfo( 'name' ); ?>"/>
		</div>

				<?php endif; // header image was removed ?>
		<header id="masthead" class="site-header" role="banner">
		<div id="navbar" class="navbar">
			<div class="navbar-header">				
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if(of_get_option('logo_uploader')=='') 
						echo bloginfo( 'name' );
					  else { ?>
						<img src="<?php echo of_get_option('logo_uploader'); ?>">	
					<?php } ?>
				</a>				
				</div>
				<div class="dropdown searchtoggel">
						<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">+</a>
						<div class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1"><?php get_search_form(); ?>				
							<div id="social">
							<?php if(of_get_option('facebook_link')) {?>
							<a href="<?php echo esc_url(of_get_option('facebook_link')); ?>" class="facebook"><i class="fa fa-facebook"></i></a>
							<?php } ?>
							<?php if(of_get_option('twitter_link')) {?>
							<a href="<?php echo esc_url(of_get_option('twitter_link')); ?>" class="twitter"><i class="fa fa-twitter"></i></a>
							<?php } ?>
							<?php if(of_get_option('gplus_link')) {?>
							<a href="<?php echo esc_url(of_get_option('gplus_link')); ?>" class="gplus"><i class="fa fa-google-plus"></i></a>
							<?php } ?>
							<?php if(of_get_option('rss_link')) {?>
							<a href="<?php echo esc_url(of_get_option('rss_link')); ?>" class="linkedin"><i class="fa fa-rss"></i></a>
							<?php } ?>
							<?php if(of_get_option('youtube_link')) {?>
							<a href="<?php echo esc_url(of_get_option('youtube_link')); ?>" class="youtube"><i class="fa fa-youtube"></i></a>
							<?php } ?>
							<?php if(of_get_option('pinterest_link')) {?>
							<a href="<?php echo esc_url(of_get_option('pinterest_link')); ?>" class="pinterest"><i class="fa fa-pinterest"></i></a>
							<?php } ?>
						</div>
										
						</div>
					</div>
				<nav id="site-navigation" class="navigation" role="navigation">
					<h3 class="menu-toggle"><?php _e( 'Menu', 'flatthirteen' ); ?></h3>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'flatthirteen' ); ?>"><?php _e( 'Skip to content', 'flatthirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					<?php if ( get_theme_mod( 'flatthirteen_menusearch_visibility' ) != 1 ) { ?>		
									
					<?php } ?>
				</nav><!-- #site-navigation -->
				
			</div><!-- #navbar -->			
		</header><!-- #masthead -->
		<div class="bannercode">
			<div class="banner"><?php dynamic_sidebar( 'header-banner' ); ?></div>
		</div>
		<div id="maincontainer" class="row">