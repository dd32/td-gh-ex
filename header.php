<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ansia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if(ansia_options('_show_loader', '0') == 1 ) : ?>
	<div class="ansiaLoader">
		<?php ansia_loadingPage(); ?>
	</div>
<?php endif; ?>
<div id="page" class="site <?php echo esc_attr(ansia_options('_site_structure', 'fullwidth')); ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ansia' ); ?></a>
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) : ?>
		<header id="masthead" class="site-header">
			<div class="site-branding">
				<div class="site-branding-inner" style="background-image:url(<?php header_image(); ?>);"></div>
					<?php if ( function_exists( 'the_custom_logo' ) ) : ?>
					<div class="ansiaLogo" itemscope itemtype="http://schema.org/Organization">
						<?php the_custom_logo(); ?>
					<?php endif;
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$ansia_description = get_bloginfo( 'description', 'display' );
					if ( $ansia_description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $ansia_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div>
			</div><!-- .site-branding -->
			
			<div class="ansia-menu">
				<div class="ansia-menu-wrapper">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'ansia' ); ?><i class="fa fa-lg spaceLeft fa-bars" aria-hidden="true"></i></button>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						?>
					</nav><!-- #site-navigation -->
					<div class="ansia-button">
						<div class="ansia-search"></div>
						<div class="ansia-cart"></div>
					</div><!-- .ansia-button -->
				</div><!-- .ansia-menu-wrapper -->
			</div><!-- .ansia-menu -->
		</header><!-- #masthead -->
	<?php endif; ?>

	<div class="ansia-big-content <?php echo esc_attr(ansia_options('_site_structure', 'fullwidth')); ?>">
		<div class="ansia-content">
			<div id="content" class="site-content">
