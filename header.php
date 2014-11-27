<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything
 *
 * @package Aileron
 */
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="site-wrapper hfeed site">

	<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		<?php
		$aileron_logo = get_theme_mod( 'aileron_logo', '' );
		if ( ! empty( $aileron_logo ) ) :
		?>
		<div class="site-logo">
			<div class="container">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo esc_url( $aileron_logo ); ?>" class="site-logo" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				</a>
			</div>
		</div><!-- .site-logo -->
		<?php endif; ?>

		<?php if ( 'blank' !== get_header_textcolor() ) : ?>
		<div class="site-branding">
			<div class="container">
				<h2 class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
				<h3 class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></h3>
			</div>
		</div><!-- .site-branding -->
		<?php endif; ?>

		<nav id="site-navigation" class="main-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<div class="container">
				<button class="menu-toggle"><?php _e( 'Primary Menu', 'aileron' ); ?></button>
				<?php
				wp_nav_menu( apply_filters( 'aileron_wp_nav_menu_args', array(
					'container' => 'div',
					'container_class' => 'site-primary-menu',
					'theme_location' => 'primary',
					'menu_class' => 'primary-menu sf-menu'
				) ) );
				?>
			</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->