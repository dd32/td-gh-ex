<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bayn Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bayn-lite' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-header__top">
			<div class="site-branding<?php echo esc_attr( bayn_lite_logo_class() ); ?>">
				<?php the_custom_logo(); ?>

				<div class="site-name">
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

					<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; // WPCS: XSS OK. ?></p>
					<?php endif; ?>
				</div>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'bayn-lite' ); ?></button>
				<?php wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id' => 'primary-menu',
				) ); ?>
			</nav><!-- #site-navigation -->
		</div>
		<?php if ( is_front_page() ) : ?>
			<?php get_template_part( 'template-parts/slider' ); ?>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
