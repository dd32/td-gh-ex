<?php
/**
 * The Header of the theme.
 *
 * Displays all of the <head> section and everything up till <main id="main"> (i.e. until the end of the header, opens the #container and the #main div elements)
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	 <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<div id="container">
			<header id="masthead" class="site-header" role="banner">
				<a class="screen-reader-text skip-link" href="#main"><?php _e( 'Skip to content', 'bassist' ); ?></a>                               
				<div class="inner">
					<?php if (has_nav_menu('primary') || has_nav_menu('social')): ?>
						<nav id="main-menu" class="site-navigation main-navigation" role="navigation" aria-label='<?php _e( 'Primary Menu ', 'bassist' ); ?>'>
							<button id="nav-button" class="menu-toggle">
								<span class="screen-reader-text"><?php _e( 'Menus', 'bassist' ); ?></span>
								<i id="nav-icon" class="fa fa-bars" aria-hidden="true"></i>
							</button>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'ul', 'menu_class' => 'nav-menu', 'menu_id' => 'nav-menu'  ) ); ?>
						</nav><!--main-menu-->
					<?php endif ?>

					<div id="site-identity" class="site-identity">
						<?php //$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );?>
					   
							<?php if ( has_custom_logo() ) { 
								the_custom_logo();                              
							 } else { ?>
								<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<h1 class="site-title"><?php esc_html( bloginfo( 'name' ) ); ?></h1>
									<p class="site-description"><?php esc_html( bloginfo( 'description' ) ); ?></p>
								</a>
							<?php } ?>
									   
					</div><!--/site-identity-->
				</div><!--/inner-->               
			</header><!--/header-->
			<main id="main" role="main">

