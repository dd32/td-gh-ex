<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Actinia
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-152606366-2"></script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'actinia' ); ?></a>

	<header id="masthead" class="site-header">
		<?php if ( ! is_404() ): ?>
			<button class="searchform-toggle" aria-expanded="false" aria-controls="searchForm"></button>
			<?php get_search_form(); ?>
		<?php endif; ?>
		
		<nav id="site-navigation" class="main-navigation">
			<?php
			if ( has_nav_menu( 'primary' ) && ! is_404() ) :
				?>
				<button class="menu-toggle-btn" aria-expanded="false" aria-controls="primary-menu"><?php esc_html_e( 'Menu', 'actinia' ); ?></button>
				<?php
				wp_nav_menu(
					array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => '__return_false',
					)
				);
			endif;
			?>
		</nav><!-- #site-navigation -->

		<div class="site-branding" style="<?php if ( get_header_image() ) : ?> background-image:url('<?php header_image(); ?>');<?php endif; ?>">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</h1>
			<?php
			$actinia_description = get_bloginfo( 'description', 'display' );
			if ( $actinia_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $actinia_description; ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

<div id="content" class="site-content">
