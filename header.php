<?php
/**
 * The Header template
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */ ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- Main Wrappe -->
<div id="main-wrapper">

	<header id="masthead" class="site-header" role="banner">
		
		<?php if( get_theme_mod('sticky_header', '0') == true ): ?>
			<div class="sticky-header">
				<div class="sticky-header-inner">
					<?php if( get_theme_mod( 'logo' ) ): ?>
						<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							<img src="<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>" class="logo">
						</a>
					<?php else: ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
					<nav role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_class' => 'sticky-nav' ) ); ?>
					</nav><!-- .top-navigation -->
					<div class="mobile-nav">
						<div class="mobile-nav-icons">
							<?php if( class_exists('Woocommerce') ): global $woocommerce; ?>
							<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="fa fa-2x fa-shopping-cart"></a>
							<?php endif; ?>
							<a class="fa fa-2x fa-bars"></a>
						</div>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mobile-nav-menu' ) ); ?>
					</div><!-- .mobile-nav -->
				</div>
			</div>
		<?php else: ?>
		
			<div class="top-nav-wrapper">
				
				<?php if( get_theme_mod( 'agama_top_navigation', '1' ) == '1' || is_customize_preview() ): // Top navigation?>
					<nav id="top-navigation" class="top-navigation col-md-6" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_class' => 'top-nav-menu' ) ); ?>
					</nav><!-- .top-navigation -->
				<?php endif; ?>
				
				<?php if( get_theme_mod( 'top_nav_social', '0' ) == true ): // Social icons ?>
					<div id="top-nav-social" class="col-md-6">
						<?php agama_social_icons( $tip_position = 'bottom' ); ?>
					</div><!-- #top-nav-social -->
				<?php endif; ?>

			</div><!-- .top-wrapper -->
		
			<hgroup>
				<?php if( get_theme_mod( 'logo' ) ): ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<img src="<?php echo esc_url( get_theme_mod( 'logo', '' ) ); ?>" class="logo">
				</a>
				<?php else: ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif; ?>
			</hgroup><!-- hgroup -->
		
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav><!-- #main-navigation -->
			
			<div class="mobile-nav">
				<div class="mobile-nav-icons">
					<?php if( class_exists('Woocommerce') ): global $woocommerce; ?>
					<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="fa fa-2x fa-shopping-cart"></a>
					<?php endif; ?>
					<a class="fa fa-2x fa-bars"></a>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mobile-nav-menu' ) ); ?>
			</div><!-- .mobile-nav -->
		
		<?php endif; // if sticky_header ?>
		
		<!-- Header Image -->
		<?php if ( get_header_image() && get_theme_mod('enable_slider', false) !== '1' ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php esc_url( header_image() ); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
		</a>
		<?php endif; ?><!-- / Header Image -->
	</header><!-- #masthead -->
	
	<?php get_template_part('framework/sliders'); ?>

	<div id="page" class="hfeed site">
		<div id="main" class="wrapper">
			<div class="vision-row">