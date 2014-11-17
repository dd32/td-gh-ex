<?php
/**
 * @package mwsmall
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="mw-go-top"><i class="fa fa-angle-up fa-2x"></i></div>
<div id="page" class="hfeed site">
	<div class="pusty">
		<header id="masthead" class="site-header" role="banner">
			<div class="header-main container">
				<h1 class="site-title">
					<?php 
						$customize_logo = get_theme_mod('logo_mwsmall');
						if ( get_theme_mod('logo_mwsmall')) { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $customize_logo; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></a>
						
					<?php					
					} else { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php
					} ?>
				</h1>				
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					<i class="fa fa-bars"></i>
				</button>
			
				<div class="top-icon">
					<?php 
						$ifb = get_theme_mod('icon_facebook');
						if ( get_theme_mod('icon_facebook') !="") { ?>
							<a target="_blank" href="<?php echo $ifb ?>"><i class="fa fa-facebook"></i></a>
					<?php } ?>
					<?php 
						$itwitter = get_theme_mod('icon_twitter');
						if ( get_theme_mod('icon_twitter') !="") { ?>
							<a target="_blank" href="<?php echo $itwitter ?>"><i class="fa fa-twitter"></i></a>
					<?php } ?>
					<?php 
						$igp = get_theme_mod('icon_google');
						if ( get_theme_mod('icon_google') !="") { ?>
							<a target="_blank" href="<?php echo $igp ?>"><i class="fa fa-google-plus"></i></a>
					<?php } ?>
					<a href="#"><i class="fa fa-search"></i></a>	
				</div>

				<div id="navbarCollapse" class="collapse navbar-collapse">
					<nav id="primary-navigation" class="primary-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'sf-menu nav navbar-nav' ) ); ?>
					</nav>
				</div>				
				
				<div id="search-container" class="search-box-wrapper h0">
					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			
		</header><!-- #masthead -->
		
		<?php if ( get_header_image() ) : ?>
		<div class="mw_header_image">
			<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo get_bloginfo('name'); ?>" />
			<?php if ( '' !== get_bloginfo( 'description' ) ) : ?>
				<h2 class="site-description col-lg-12 col-xs-12"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</div><!-- .mw_header_image -->
		<?php endif; ?>
		
		<div id="mw_full" class="container">