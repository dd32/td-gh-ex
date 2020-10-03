<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package undedicated
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'undedicated' ); ?></a>

	<header id="masthead" class="site-header wrap" role="banner">

		<div class="site-branding">
		<!-- Your site title as branding in the menu -->
		<?php if ( ! has_custom_logo() ) { ?>

				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
				<?php endif;
	
				$undedicated_description = get_bloginfo( 'description', 'display' );
				if ( $undedicated_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html($undedicated_description); /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
		
		<?php } else {
			the_custom_logo();
		} ?><!-- end custom logo -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation menu-primary" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
	

	<div id="content" class="site-content wrap">
